<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
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
            background-color: #0082c2;
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

        .booking-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .booking-details h2 {
            color: #0082c2;
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

        .highlight {
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
            color: #0082c2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🏨 Booking Confirmation</h1>
        </div>

        <p>Dear {{ $bookingData['guest_name'] }},</p>

        <p>Thank you for choosing <strong>Nike Lake Resort</strong>! Your booking request has been received
            successfully.</p>

        <div class="highlight">
            <strong>⏰ What's Next?</strong><br>
            You will receive a payment link shortly to complete your reservation. Please check your email for the
            payment instructions.
        </div>

        <div class="booking-details">
            <h2>📋 Booking Details</h2>

            <div class="detail-row">
                <span class="detail-label">Reference Number:</span>
                <span class="detail-value"><strong>{{ $bookingData['ref_num'] }}</strong></span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Guest Name:</span>
                <span class="detail-value">{{ $bookingData['guest_name'] }}</span>
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
        </div>

        <p><strong>Important Notes:</strong></p>
        <ul>
            <li>Check-in time is 2:00 PM</li>
            <li>Check-out time is 12:00 PM</li>
            <li>Please bring a valid photo ID at check-in</li>
            <li>Keep your reference number handy for all communications</li>
        </ul>

        <p>If you have any questions or need to make changes to your booking, please contact us immediately.</p>

        <div class="footer">
            <p><strong>Nike Lake Resort</strong><br>
                Email: info@nikelakeresort.com<br>
                Phone: +234 XXX XXX XXXX</p>
            <p style="font-size: 12px; color: #999;">This is an automated email. Please do not reply directly to this
                message.</p>
        </div>
    </div>
</body>

</html>
