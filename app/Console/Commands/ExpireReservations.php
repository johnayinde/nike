<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ExpireReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire reservations where checkout date has passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        // Find all paid reservations where checkout date has passed and status is not already expired
        $expiredCount = Booking::where('payment_status', 'Paid')
            ->where('checkout', '<', $today)
            ->whereNotIn('order_status', ['Expired', 'Cancelled', 'Failed'])
            ->update([
                'order_status' => 'Expired',
            ]);

        $this->info("Expired {$expiredCount} reservation(s).");

        return Command::SUCCESS;
    }
}
