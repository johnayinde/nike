<div style="padding: 0; margin: 0;">
    <!-- Header Section with Reference -->
    <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 24px; color: white;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
            <div>
                <h2 style="margin: 0; font-size: 24px; font-weight: 700;">Booking Details</h2>
                <p style="margin: 8px 0 0 0; font-size: 14px; opacity: 0.9;">Reference: <strong>{{ $record->ref_num }}</strong></p>
            </div>
            <div style="text-align: right;">
                <div style="background: rgba(255, 255, 255, 0.2); padding: 8px 16px; border-radius: 20px; display: inline-block;">
                    <span style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Total Amount</span>
                    <div style="font-size: 28px; font-weight: 700; margin-top: 4px;">₦{{ number_format($record->amount, 2) }}</div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding: 24px; background: white;">
        <!-- Customer Information Card -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin-bottom: 24px;">
            <h3 style="margin: 0 0 16px 0; font-size: 18px; font-weight: 600; color: #1e293b; display: flex; align-items: center;">
                <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Customer Information
            </h3>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
                <div>
                    <p style="margin: 0; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px;">Full Name</p>
                    <p style="margin: 4px 0 0 0; font-size: 16px; font-weight: 600; color: #0f172a;">
                        {{ $record->user ? $record->user->first_name . ' ' . $record->user->last_name : 'N/A' }}
                    </p>
                </div>
                <div>
                    <p style="margin: 0; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px;">Phone Number</p>
                    <p style="margin: 4px 0 0 0; font-size: 16px; font-weight: 600; color: #0f172a;">{{ $record->user?->phone ?? 'N/A' }}</p>
                </div>
                <div style="grid-column: span 2;">
                    <p style="margin: 0; font-size: 12px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px;">Email Address</p>
                    <p style="margin: 4px 0 0 0; font-size: 16px; font-weight: 600; color: #0f172a;">{{ $record->user?->email ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Booking Details Card -->
        <div style="background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; padding: 20px; margin-bottom: 24px;">
            <h3 style="margin: 0 0 16px 0; font-size: 18px; font-weight: 600; color: #1e293b; display: flex; align-items: center;">
                <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                Reservation Details
            </h3>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
                <div>
                    <p style="margin: 0; font-size: 12px; color: #15803d; text-transform: uppercase; letter-spacing: 0.5px;">Room Type</p>
                    <p style="margin: 4px 0 0 0; font-size: 16px; font-weight: 600; color: #0f172a;">{{ $record->room }}</p>
                </div>
                <div>
                    <p style="margin: 0; font-size: 12px; color: #15803d; text-transform: uppercase; letter-spacing: 0.5px;">Number of Rooms</p>
                    <p style="margin: 4px 0 0 0; font-size: 16px; font-weight: 600; color: #0f172a;">{{ $record->num_of_rooms }}</p>
                </div>
                <div>
                    <p style="margin: 0; font-size: 12px; color: #15803d; text-transform: uppercase; letter-spacing: 0.5px;">Check-in Date</p>
                    <p style="margin: 4px 0 0 0; font-size: 16px; font-weight: 600; color: #0f172a;">{{ $record->checkin->format('F j, Y') }}</p>
                </div>
                <div>
                    <p style="margin: 0; font-size: 12px; color: #15803d; text-transform: uppercase; letter-spacing: 0.5px;">Check-out Date</p>
                    <p style="margin: 4px 0 0 0; font-size: 16px; font-weight: 600; color: #0f172a;">{{ $record->checkout->format('F j, Y') }}</p>
                </div>
                <div style="grid-column: span 2;">
                    <p style="margin: 0; font-size: 12px; color: #15803d; text-transform: uppercase; letter-spacing: 0.5px;">Duration</p>
                    <p style="margin: 4px 0 0 0; font-size: 16px; font-weight: 600; color: #0f172a;">
                        {{ $record->checkin->diffInDays($record->checkout) }} night(s)
                    </p>
                </div>
            </div>
        </div>

        <!-- Status & Payment Card -->
        <div style="background: #fef3c7; border: 1px solid #fde68a; border-radius: 8px; padding: 20px; margin-bottom: 24px;">
            <h3 style="margin: 0 0 16px 0; font-size: 18px; font-weight: 600; color: #1e293b; display: flex; align-items: center;">
                <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Status Information
            </h3>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
                <div>
                    <p style="margin: 0; font-size: 12px; color: #92400e; text-transform: uppercase; letter-spacing: 0.5px;">Payment Status</p>
                    <p style="margin: 8px 0 0 0;">
                        <span style="display: inline-block; padding: 6px 12px; border-radius: 20px; font-size: 14px; font-weight: 600;
                            {{ in_array($record->payment_status, ['paid', 'successful']) ? 'background: #22c55e; color: white;' : 
                               ($record->payment_status === 'pending' ? 'background: #eab308; color: white;' : 'background: #ef4444; color: white;') }}">
                            {{ ucfirst($record->payment_status ?? 'pending') }}
                        </span>
                    </p>
                </div>
                <div>
                    <p style="margin: 0; font-size: 12px; color: #92400e; text-transform: uppercase; letter-spacing: 0.5px;">Order Status</p>
                    <p style="margin: 8px 0 0 0;">
                        <span style="display: inline-block; padding: 6px 12px; border-radius: 20px; font-size: 14px; font-weight: 600;
                            {{ $record->order_status === 'confirmed' ? 'background: #22c55e; color: white;' : 
                               ($record->order_status === 'pending' ? 'background: #eab308; color: white;' : 'background: #ef4444; color: white;') }}">
                            {{ ucfirst($record->order_status ?? 'pending') }}
                        </span>
                    </p>
                </div>
                <div>
                    <p style="margin: 0; font-size: 12px; color: #92400e; text-transform: uppercase; letter-spacing: 0.5px;">Rave Ref</p>
                    <p style="margin: 4px 0 0 0; font-size: 14px; font-weight: 600; color: #0f172a;">{{ $record->raveref ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Timestamps -->
        <div style="background: #f1f5f9; border-radius: 8px; padding: 16px; margin-bottom: 0;">
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
                <div>
                    <p style="margin: 0; font-size: 11px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px;">Booked At</p>
                    <p style="margin: 4px 0 0 0; font-size: 14px; color: #475569;">{{ $record->created_at->format('F j, Y - H:i A') }}</p>
                </div>
                <div>
                    <p style="margin: 0; font-size: 11px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px;">Last Updated</p>
                    <p style="margin: 4px 0 0 0; font-size: 14px; color: #475569;">{{ $record->updated_at->format('F j, Y - H:i A') }}</p>
                </div>
            </div>
        </div>

        @if($record->isPending())
        <!-- Payment Info Notice -->
        <div style="background: #fef3c7; border: 1px solid #fde68a; border-radius: 8px; padding: 12px; margin-top: 16px; display: flex; align-items: center; gap: 10px;">
            <svg style="width: 20px; height: 20px; flex-shrink: 0; color: #92400e;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p style="margin: 0; font-size: 14px; color: #92400e;">
                <strong>Payment Pending:</strong> Send a payment link to <strong>{{ $record->user?->email }}</strong> to complete this booking.
            </p>
        </div>
        @endif
    </div>
</div>

@if($record->isPending())
    <input type="hidden" id="booking-id-{{ $record->id }}" value="{{ $record->id }}">
@endif
