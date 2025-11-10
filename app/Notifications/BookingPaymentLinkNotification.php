<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingPaymentLinkNotification extends Notification
{
    use Queueable;

    public $booking;
    public $paymentLink;

    /**
     * Create a new notification instance.
     */
    public function __construct(Booking $booking, ?string $paymentLink = null)
    {
        $this->booking = $booking;
        $this->paymentLink = $paymentLink ?? $booking->generatePaymentLink();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Option 1: Use custom Blade template (uncomment to use)
        // return (new MailMessage)
        //     ->subject('Complete Your Booking Payment - Landmark Nike Lake Resort')
        //     ->from(config('mail.from.address'), 'Landmark Nike Lake Resort')
        //     ->view('emails.booking-payment-link', [
        //         'booking' => $this->booking,
        //         'paymentLink' => $this->paymentLink
        //     ]);

        // Option 2: Use Markdown template (current)
        return (new MailMessage)
                    ->subject('Complete Your Booking Payment - Landmark Nike Lake Resort')
                    ->from(config('mail.from.address'), 'Landmark Nike Lake Resort')
                    ->greeting('Hello ' . $notifiable->first_name . '!')
                    ->line('Thank you for choosing **Landmark Nike Lake Resort**. We are delighted to host you!')
                    ->line('Your booking reservation has been confirmed and is now pending payment.')
                    ->line('---')
                    ->line('### 📋 Booking Details')
                    ->line('**Reference Number:** ' . $this->booking->ref_num)
                    ->line('**Room Type:** ' . $this->booking->room)
                    ->line('**Number of Rooms:** ' . $this->booking->num_of_rooms)
                    ->line('**Check-in Date:** ' . $this->booking->checkin->format('l, F j, Y'))
                    ->line('**Check-out Date:** ' . $this->booking->checkout->format('l, F j, Y'))
                    ->line('**Duration:** ' . $this->booking->checkin->diffInDays($this->booking->checkout) . ' night(s)')
                    ->line('---')
                    ->line('### 💰 Payment Information')
                    ->line('**Total Amount:** ₦' . number_format($this->booking->amount, 2))
                    ->line('---')
                    ->action('💳 Complete Payment Now', $this->paymentLink)
                    ->line('Please click the button above to proceed with your secure payment through Paystack.')
                    ->line('Your reservation will be automatically confirmed once payment is received.')
                    ->line('---')
                    ->line('**Need Assistance?**')
                    ->line('If you have any questions or need to modify your booking, please don\'t hesitate to contact us.')
                    ->line('📧 Email: ' . config('mail.from.address'))
                    ->line('📞 Phone: +234 XXX XXX XXXX') // Add your phone number
                    ->line('---')
                    ->line('We look forward to welcoming you to Landmark Nike Lake Resort!')
                    ->salutation('Warm regards,  
**The Landmark Nike Lake Resort Team**  
*Experience Luxury. Embrace Comfort.*');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'booking_id' => $this->booking->id,
            'ref_num' => $this->booking->ref_num,
            'amount' => $this->booking->amount,
            'payment_link' => $this->paymentLink,
        ];
    }
}

