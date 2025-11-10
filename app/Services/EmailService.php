<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailService
{
    /**
     * Send email using the specified template and content
     *
     * @param string $email The recipient email address
     * @param string $template The mailable class name to use
     * @param array $content The data to pass to the email template
     * @return bool Returns true if email sent successfully, false otherwise
     */
    public function sendEmail($email, $template, $content = [])
    {
        try {
            // Dynamically instantiate the mailable class
            $mailableClass = "App\\Mail\\{$template}";

            if (!class_exists($mailableClass)) {
                Log::error("Mailable class {$mailableClass} does not exist");
                return false;
            }

            // Send the email
            Mail::to($email)->send(new $mailableClass($content));

            Log::info("Email sent successfully to {$email} using {$template}");
            return true;
        } catch (\Exception $e) {
            Log::error("Failed to send email to {$email}: " . $e->getMessage());
            return false;
        }
    }
}
