<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RoomTrackingLink;
use App\Models\RoomTrackingVisit;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CaptureRoomTrackingLink
{
    public function handle(Request $request, Closure $next)
    {
        // Check if there's a ref parameter
        if ($request->has('ref')) {
            $refCode = $request->get('ref');

            // Find the tracking link
            $trackingLink = RoomTrackingLink::where('link_code', $refCode)
                ->where('status', 1)
                ->first();

            if ($trackingLink) {
                // Store in session (30 days = 43200 minutes)
                session(['room_tracking_ref' => $refCode], 43200);
                session(['room_tracking_link_id' => $trackingLink->id], 43200);

                // Get or create visitor ID
                $visitorId = $request->cookie('room_visitor_id');
                if (!$visitorId) {
                    $visitorId = Str::uuid()->toString();
                    Cookie::queue('room_visitor_id', $visitorId, 43200); // 30 days
                }

                // Check if this is a unique visit (not visited in last 24 hours)
                $recentVisit = RoomTrackingVisit::where('tracking_link_id', $trackingLink->id)
                    ->where('visitor_id', $visitorId)
                    ->where('visited_at', '>', now()->subDay())
                    ->exists();

                $isUnique = !$recentVisit;

                // Determine which room group they're viewing
                $roomGroupViewed = null;
                if ($request->route() && $request->route()->parameter('slug')) {
                    $slug = $request->route()->parameter('slug');
                    $roomGroup = \App\Models\RoomGroup::where('slug', $slug)->first();
                    if ($roomGroup) {
                        $roomGroupViewed = $roomGroup->name;
                    }
                }

                // Record the visit
                RoomTrackingVisit::create([
                    'tracking_link_id' => $trackingLink->id,
                    'visitor_ip' => $request->ip(),
                    'visitor_id' => $visitorId,
                    'user_agent' => $request->userAgent(),
                    'referer_url' => $request->headers->get('referer'),
                    'room_group_viewed' => $roomGroupViewed,
                    'is_unique' => $isUnique,
                    'visited_at' => now(),
                ]);

                // Update click counts
                $trackingLink->incrementClicks($isUnique);
            }
        }

        return $next($request);
    }
}
