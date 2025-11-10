<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Alert</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #dc3545;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            margin: -30px -30px 20px -30px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .alert-badge {
            background-color: #ffc107;
            color: #000;
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            font-weight: bold;
            margin-top: 10px;
        }

        .booking-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #dc3545;
        }

        .booking-details h2 {
            color: #dc3545;
            margin-top: 0;
            font-size: 18px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: bold;
            color: #555;
        }

        .detail-value {
            color: #333;
        }

        .guest-info {
            background-color: #e3f2fd;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #2196f3;
        }

        .guest-info h3 {
            margin-top: 0;
            color: #1976d2;
            font-size: 16px;
        }

        .action-required {
            background-color: #fff3cd;
            padding: 15px;
            border-left: 4px solid #ffc107;
            margin: 20px 0;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
            color: #777;
            font-size: 14px;
        }

        .amount {
            font-size: 24px;
            font-weight: bold;
            color: #28a745;
        }

        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #0082c2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🔔 New Booking Alert</h1>
            <span class="alert-badge">ACTION REQUIRED</span>
        </div>

        <p><strong>Hello Admin,</strong></p>

        <p>A new booking has been submitted on Nike Lake Resort. Please review the details below and send the payment
            link to the guest.</p>

        <div class="action-required">
            <strong>⚠️ Next Step:</strong> Send payment link to the guest to complete the reservation.
        </div>

        <div class="guest-info">
            <h3>👤 Guest Information</h3>
            <div class="detail-row">
                <span class="detail-label">Name:</span>
                <span class="detail-value">{{ $bookingData['guest_name'] }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Email:</span>
                <span class="detail-value">{{ $bookingData['guest_email'] }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Phone:</span>
                <span class="detail-value">{{ $bookingData['guest_phone'] }}</span>
            </div>
        </div>

        <div class="booking-details">
            <h2>📋 Booking Details</h2>

            <div class="detail-row">
                <span class="detail-label">Reference Number:</span>
                <span class="detail-value"><strong>{{ $bookingData['ref_num'] }}</strong></span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Room Type:</span>
                <span class="detail-value">{{ $bookingData['room'] }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Number of Rooms:</span>
                <span class="detail-value">{{ $bookingData['num_of_rooms'] }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Check-in Date:</span>
                <span class="detail-value">{{ $bookingData['checkin'] }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Check-out Date:</span>
                <span class="detail-value">{{ $bookingData['checkout'] }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Total Amount:</span>
                <span class="amount">₦{{ number_format($bookingData['amount'], 2) }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Payment Status:</span>
                <span class="detail-value"
                    style="color: #ff9800; font-weight: bold;">{{ $bookingData['payment_status'] }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Booking Date:</span>
                <span class="detail-value">{{ $bookingData['created_at'] }}</span>
            </div>
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $bookingData['admin_dashboard_url'] }}" class="button">View in Admin Dashboard</a>
        </div>

        <p><strong>Action Required:</strong></p>
        <ol>
            <li>Review the booking details carefully</li>
            <li>Verify room availability for the selected dates</li>
            <li>Send the payment link to <strong>{{ $bookingData['guest_email'] }}</strong></li>
            <li>Update the booking status once payment is received</li>
        </ol>

        <div class="footer">
            <p><strong>Nike Lake Resort - Admin Panel</strong></p>
            <p style="font-size: 12px; color: #999;">This is an automated notification from your booking system.</p>
        </div>
    </div>
</body>

</html>
