# Paystack Webhook Setup Guide

## Overview
The webhook automatically updates booking status when customers complete payment through Paystack.

## Webhook Details

**Webhook URL:** `https://yourdomain.com/webhooks/paystack`

**Supported Events:**
- `charge.success` - Payment completed successfully
- `charge.failed` - Payment failed

## Setup Instructions

### 1. Configure Paystack Dashboard

1. Login to your [Paystack Dashboard](https://dashboard.paystack.com/)
2. Go to **Settings** → **Webhooks**
3. Add your webhook URL: `https://yourdomain.com/webhooks/paystack`
4. Make sure your domain is publicly accessible (not localhost)

### 2. Test Locally (Development)

For local testing, use a service like [ngrok](https://ngrok.com/):

```bash
# Start ngrok tunnel
ngrok http 8000

# Use the ngrok URL in Paystack dashboard
# Example: https://abc123.ngrok.io/webhooks/paystack
```

### 3. Verify Configuration

Check your `.env` file has:
```env
PAYSTACK_SECRET_KEY=sk_live_your_secret_key
PAYSTACK_PUBLIC_KEY=pk_live_your_public_key
PAYSTACK_URL=https://api.paystack.co
```

## How It Works

### Payment Flow

1. **Customer initiates payment**
   - Admin sends payment link via Filament panel
   - Customer receives email with Paystack payment link

2. **Customer completes payment**
   - Customer clicks link and pays on Paystack
   - Paystack processes payment

3. **Webhook notification**
   - Paystack sends `charge.success` event to webhook URL
   - Webhook verifies signature for security
   - Webhook verifies transaction with Paystack API

4. **Booking updated**
   - `payment_status` → `'Paid'`
   - `order_status` → `'Reserved'`
   - `posted` → `'Yes'`
   - `raveref` → Paystack reference

## Security Features

✅ **Signature Verification** - Validates webhook is from Paystack
✅ **Transaction Verification** - Confirms payment with Paystack API
✅ **Amount Validation** - Ensures paid amount matches booking amount
✅ **Duplicate Prevention** - Ignores already processed payments
✅ **Error Logging** - Tracks all webhook activities

## Testing the Webhook

### Manual Test (Development)

```bash
# Create test booking
php artisan tinker
$booking = App\Models\Booking::first();
echo "Reference: " . $booking->ref_num;
```

### Simulate Webhook Event

```bash
curl -X POST http://localhost/webhooks/paystack \
  -H "Content-Type: application/json" \
  -H "x-paystack-signature: your_test_signature" \
  -d '{
    "event": "charge.success",
    "data": {
      "reference": "BOOKING_REF_NUMBER",
      "amount": 3400000,
      "status": "success"
    }
  }'
```

## Monitoring

### Check Webhook Logs

```bash
# View Laravel logs
tail -f storage/logs/laravel.log | grep -i webhook

# Search for specific booking
tail -f storage/logs/laravel.log | grep "booking_id"
```

### Paystack Dashboard

1. Go to **Transactions** in Paystack dashboard
2. Click on a transaction
3. Scroll to **Webhook Logs** section
4. Verify delivery status and response codes

## Troubleshooting

### Common Issues

**Issue: Webhook not receiving events**
- ✓ Check URL is publicly accessible
- ✓ Verify HTTPS is enabled (required for production)
- ✓ Check Paystack dashboard webhook configuration
- ✓ Review webhook logs in Paystack dashboard

**Issue: Signature verification fails**
- ✓ Ensure `PAYSTACK_SECRET_KEY` is correct in `.env`
- ✓ Check no extra spaces in secret key
- ✓ Verify webhook URL matches exactly

**Issue: Booking not updated**
- ✓ Check reference number matches: `ref_num` in database
- ✓ Verify amount in kobo (multiply by 100)
- ✓ Check Laravel logs for errors
- ✓ Ensure booking exists before payment

**Issue: localhost testing**
- ✓ Use ngrok or similar tunnel service
- ✓ Update webhook URL in Paystack dashboard
- ✓ Restart ngrok if it times out

## Expected Responses

### Successful Processing
```json
HTTP 200 OK
{
  "message": "Payment processed successfully",
  "booking_id": 123
}
```

### Invalid Signature
```json
HTTP 401 Unauthorized
{
  "error": "Invalid signature"
}
```

### Booking Not Found
```json
HTTP 404 Not Found
{
  "message": "Booking not found"
}
```

## Database Changes

When webhook processes successful payment:

```sql
UPDATE bookings SET
  payment_status = 'Paid',
  order_status = 'Reserved',
  posted = 'Yes',
  raveref = 'paystack_reference'
WHERE ref_num = 'BOOKING_REFERENCE';
```

## Production Checklist

- [ ] Webhook URL is HTTPS (required by Paystack)
- [ ] Secret key is from live Paystack account
- [ ] Webhook URL configured in Paystack dashboard
- [ ] Test payment completed successfully
- [ ] Logs show webhook received and processed
- [ ] Booking status updated correctly
- [ ] Email notifications working (optional)

## Support

For issues related to:
- **Paystack API**: support@paystack.com
- **Application**: Check Laravel logs at `storage/logs/laravel.log`
