<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Link - Landmark Nike Lake Resort</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .header p {
            margin: 10px 0 0;
            font-size: 16px;
            opacity: 0.9;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }
        .details-box {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .details-box h3 {
            margin: 0 0 15px;
            color: #667eea;
            font-size: 18px;
        }
        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .detail-item:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: 600;
            color: #666;
        }
        .detail-value {
            color: #333;
            text-align: right;
        }
        .amount-box {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin: 30px 0;
        }
        .amount-box .label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 5px;
        }
        .amount-box .amount {
            font-size: 36px;
            font-weight: 700;
        }
        .cta-button {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 15px 40px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin: 20px 0;
            text-align: center;
        }
        .cta-button:hover {
            background: #5568d3;
        }
        .button-container {
            text-align: center;
        }
        .footer {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }
        .footer-links {
            margin: 20px 0;
        }
        .footer-links a {
            color: #667eea;
            text-decoration: none;
            margin: 0 10px;
        }
        .social-icons {
            margin: 20px 0;
        }
        .note {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>🏨 Landmark Nike Lake Resort</h1>
            <p>Experience Luxury. Embrace Comfort.</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">Hello {{ $booking->user->first_name }}!</div>
            
            <p>Thank you for choosing <strong>Landmark Nike Lake Resort</strong>. We are delighted to host you!</p>
            
            <p>Your booking reservation has been confirmed and is now pending payment. Please complete your payment to secure your reservation.</p>

            <!-- Booking Details -->
            <div class="details-box">
                <h3>📋 Booking Details</h3>
                <div class="detail-item">
                    <span class="detail-label">Reference Number:</span>
                    <span class="detail-value">{{ $booking->ref_num }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Room Type:</span>
                    <span class="detail-value">{{ $booking->room }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Number of Rooms:</span>
                    <span class="detail-value">{{ $booking->num_of_rooms }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Check-in:</span>
                    <span class="detail-value">{{ $booking->checkin->format('l, F j, Y') }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Check-out:</span>
                    <span class="detail-value">{{ $booking->checkout->format('l, F j, Y') }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Duration:</span>
                    <span class="detail-value">{{ $booking->checkin->diffInDays($booking->checkout) }} night(s)</span>
                </div>
            </div>

            <!-- Amount -->
            <div class="amount-box">
                <div class="label">Total Amount</div>
                <div class="amount">₦{{ number_format($booking->amount, 2) }}</div>
            </div>

            <!-- CTA Button -->
            <div class="button-container">
                <a href="{{ $paymentLink }}" class="cta-button">💳 Complete Payment Now</a>
            </div>

            <p style="text-align: center; color: #666; font-size: 14px; margin-top: 20px;">
                Click the button above to proceed with your secure payment through Paystack.
            </p>

            <!-- Note -->
            <div class="note">
                <strong>⚡ Important:</strong> Your reservation will be automatically confirmed once payment is received. Payment link expires in 48 hours.
            </div>

            <hr style="border: none; border-top: 1px solid #e0e0e0; margin: 30px 0;">

            <h4>Need Assistance?</h4>
            <p>If you have any questions or need to modify your booking, please don't hesitate to contact us:</p>
            <ul style="list-style: none; padding: 0;">
                <li>📧 Email: {{ config('mail.from.address') }}</li>
                <li>📞 Phone: +234 XXX XXX XXXX</li>
                <li>🌐 Website: www.landmarknikelake.com</li>
            </ul>

            <p style="margin-top: 30px;">We look forward to welcoming you!</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0; font-weight: 600; color: #333;">Landmark Nike Lake Resort</p>
            <p style="margin: 5px 0; color: #666; font-size: 14px;">Enugu, Nigeria</p>
            
            <div class="footer-links">
                <a href="#">About Us</a> |
                <a href="#">Rooms</a> |
                <a href="#">Contact</a> |
                <a href="#">Terms</a>
            </div>

            <p style="font-size: 12px; color: #999; margin-top: 20px;">
                © {{ date('Y') }} Landmark Nike Lake Resort. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
