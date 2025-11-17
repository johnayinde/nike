<?php

namespace App\Models;

use App\Traits\PaystackApiTrait;
use App\Traits\RoomBookingTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Booking extends Model
{
    use PaystackApiTrait, RoomBookingTrait;

    protected $guarded = ['id'];
    protected $dates = ['checkin', 'checkout'];

    protected $casts = [
        'checkin' => 'datetime',
        'checkout' => 'datetime',
        'amount' => 'decimal:2',
    ];

    protected static function booted()
    {
        // Update room group reservations when booking payment status changes to paid
        static::updated(function ($booking) {
            if ($booking->isDirty('payment_status') && $booking->isPaid()) {
                $booking->updateRoomGroupReservations('add');
            }
        });

        // Handle booking deletion
        static::deleted(function ($booking) {
            if ($booking->isPaid()) {
                $booking->updateRoomGroupReservations('remove');
            }
        });
    }

    /**
     * Get the user that owns the booking
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room_group()
    {
        return $this->belongsTo(RoomGroup::class, 'room', 'name');
    }

    /**
     * Check if booking is pending payment
     */
    public function isPending(): bool
    {
        $status = strtolower($this->payment_status ?? '');
        return in_array($status, ['pending', 'unpaid', '']) || $this->payment_status === null;
    }

    /**
     * Check if booking has been paid
     */
    public function isPaid(): bool
    {
        $status = strtolower($this->payment_status ?? '');
        return in_array($status, ['paid', 'successful']);
    }

    /**
     * Generate Paystack payment link
     */
    public function generatePaystackPaymentLink(): ?string
    {
        // Check if payment link already exists and is valid
        if ($this->payment_link && filter_var($this->payment_link, FILTER_VALIDATE_URL)) {
            return $this->payment_link;
        }

        if (!$this->user || !$this->user->email) {
            Log::error('Payment link generation failed: Missing user or email', [
                'booking_id' => $this->id,
                'user_id' => $this->user_id
            ]);
            return null;
        }

        $data = [
            'amount' => $this->amount,
            'reference' => $this->ref_num,
            'email' => $this->user->email,
            'booking_id' => $this->id,
            'callback_url' => route('payment.callback')
        ];

        $result = $this->initializePaystackPayment($data);

        if (isset($result->status) && $result->status === true) {
            $paymentLink = $result->authorization_url ?? null;
            
            // Store the payment link in the database
            if ($paymentLink) {
                $this->update(['payment_link' => $paymentLink]);
            }
            
            return $paymentLink;
        }

        Log::error('Payment link generation failed', [
            'booking_id' => $this->id,
            'error' => $result->msg ?? 'Unknown error'
        ]);

        return null;
    }

    /**
     * Generate payment link (fallback to local payment page)
     */
    public function generatePaymentLink(): string
    {
        return route('payment.process', ['booking' => $this->id, 'ref' => $this->ref_num]);
    }

    /**
     * Update room group reservation counts
     */
    public function updateRoomGroupReservations(string $action = 'add')
    {
        if (!$this->room) {
            return;
        }

        $roomGroup = RoomGroup::where('name', $this->room)->first();
        if (!$roomGroup) {
            return;
        }

        $currentReserved = $roomGroup->no_of_reserved_rooms ?? 0;

        if ($action === 'add' && $this->checkin > now()) {
            // Only add to reserved if check-in is in the future
            $roomGroup->update([
                'no_of_reserved_rooms' => $currentReserved + $this->num_of_rooms
            ]);
        } elseif ($action === 'remove') {
            // Remove from reserved count
            $roomGroup->update([
                'no_of_reserved_rooms' => max(0, $currentReserved - $this->num_of_rooms)
            ]);
        }
    }
}
