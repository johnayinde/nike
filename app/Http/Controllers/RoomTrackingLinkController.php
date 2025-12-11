<?php

namespace App\Http\Controllers;

use App\Models\RoomGroup;
use App\Models\RoomTrackingLink;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RoomTrackingLinkController extends Controller
{
    /**
     * Display all tracking links
     */
    public function index()
    {
        $trackingLinks = RoomTrackingLink::with('roomGroup')
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate totals
        $totalClicks = $trackingLinks->sum('clicks');
        $totalUniqueClicks = $trackingLinks->sum('unique_clicks');
        $totalBookings = $trackingLinks->sum('bookings_count');
        $totalRevenue = $trackingLinks->sum('revenue_generated');
        $totalNights = $trackingLinks->sum('total_nights_booked');

        // Direct bookings (without tracking)
        $directBookings = Booking::whereNull('tracking_link_id')
            ->where('payment_status', 'Paid')
            ->count();

        $directRevenue = Booking::whereNull('tracking_link_id')
            ->where('payment_status', 'Paid')
            ->sum('amount');

        return view('admin.room-tracking-links.index', compact(
            'trackingLinks',
            'totalClicks',
            'totalUniqueClicks',
            'totalBookings',
            'totalRevenue',
            'totalNights',
            'directBookings',
            'directRevenue'
        ));
    }

    /**
     * Store a new tracking link
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'link_name' => 'required|string|max:200',
            'link_code' => 'nullable|string|max:100|alpha_dash',
            'room_group_id' => 'nullable|exists:room_groups,id',
            'description' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Generate or validate link code
        $linkCode = $request->link_code
            ? $request->link_code
            : RoomTrackingLink::generateUniqueCode($request->link_name);

        // Check if code already exists
        if (RoomTrackingLink::where('link_code', $linkCode)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Link code already exists. Please use a different code.'
            ], 422);
        }

        // Generate full URL
        if ($request->room_group_id) {
            $roomGroup = RoomGroup::find($request->room_group_id);
            $fullUrl = url('/rooms/' . $roomGroup->slug) . '?ref=' . $linkCode;
        } else {
            $fullUrl = url('/booking') . '?ref=' . $linkCode;
        }

        $trackingLink = RoomTrackingLink::create([
            'room_group_id' => $request->room_group_id,
            'user_id' => Auth::id(),
            'link_code' => $linkCode,
            'link_name' => $request->link_name,
            'description' => $request->description,
            'full_url' => $fullUrl,
            'status' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Tracking link created successfully',
            'data' => $trackingLink
        ]);
    }

    /**
     * Show single tracking link with analytics
     */
    public function show($linkId)
    {
        $trackingLink = RoomTrackingLink::with(['roomGroup', 'bookings' => function ($query) {
            $query->where('payment_status', 'Paid')
                ->orderBy('created_at', 'desc')
                ->limit(50);
        }])->findOrFail($linkId);

        // Get daily stats for last 30 days
        $dailyStats = DB::table('room_tracking_visits')
            ->where('tracking_link_id', $linkId)
            ->where('visited_at', '>=', now()->subDays(30))
            ->select(
                DB::raw('DATE(visited_at) as date'),
                DB::raw('COUNT(*) as clicks'),
                DB::raw('SUM(is_unique) as unique_clicks')
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Get monthly booking stats
        $monthlyBookings = DB::table('bookings')
            ->where('tracking_link_id', $linkId)
            ->where('payment_status', 'Paid')
            ->where('created_at', '>=', now()->subMonths(12))
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('COUNT(*) as bookings'),
                DB::raw('SUM(amount) as revenue')
            )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        return view('admin.room-tracking-links.show', compact(
            'trackingLink',
            'dailyStats',
            'monthlyBookings'
        ));
    }

    /**
     * Update tracking link
     */
    public function update(Request $request, $linkId)
    {
        $trackingLink = RoomTrackingLink::findOrFail($linkId);

        $validator = Validator::make($request->all(), [
            'link_name' => 'nullable|string|max:200',
            'description' => 'nullable|string|max:500',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $trackingLink->update($request->only(['link_name', 'description', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'Tracking link updated successfully',
            'data' => $trackingLink
        ]);
    }

    /**
     * Delete tracking link
     */
    public function destroy($linkId)
    {
        $trackingLink = RoomTrackingLink::findOrFail($linkId);

        // Don't delete if there are associated bookings
        if ($trackingLink->bookings_count > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete tracking link with existing bookings. Deactivate instead.'
            ], 422);
        }

        $trackingLink->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tracking link deleted successfully'
        ]);
    }

    /**
     * Get analytics dashboard
     */
    public function analytics()
    {
        $trackingLinks = RoomTrackingLink::with('roomGroup')->get();

        // Group by room type
        $byRoomType = DB::table('room_tracking_links')
            ->leftJoin('room_groups', 'room_tracking_links.room_group_id', '=', 'room_groups.id')
            ->select(
                DB::raw('COALESCE(room_groups.name, "All Rooms") as room_name'),
                DB::raw('COUNT(room_tracking_links.id) as link_count'),
                DB::raw('SUM(room_tracking_links.clicks) as total_clicks'),
                DB::raw('SUM(room_tracking_links.bookings_count) as total_bookings'),
                DB::raw('SUM(room_tracking_links.revenue_generated) as total_revenue')
            )
            ->groupBy('room_groups.name')
            ->get();

        // Top performing links
        $topLinks = RoomTrackingLink::with('roomGroup')
            ->orderBy('revenue_generated', 'desc')
            ->limit(10)
            ->get();

        return view('admin.room-tracking-links.analytics', compact(
            'trackingLinks',
            'byRoomType',
            'topLinks'
        ));
    }
}
