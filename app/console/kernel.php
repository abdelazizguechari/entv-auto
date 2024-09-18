<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [];

    protected function schedule(Schedule $schedule)
    {
        // Schedule a task to run daily to check for upcoming holidays
        $schedule->call(function () {
            // Add your logic for checking and sending notifications here
            $today = now();
            $endOfMonth = $today->copy()->endOfMonth();

            // Fetch holidays that end within the next 7 days
            $holidays = \App\Models\ConducteurConger::where('end_date', '>=', $today)
                ->where('end_date', '<=', $endOfMonth)
                ->get();

            foreach ($holidays as $holiday) {
                $expiryDate = $holiday->end_date->format('d M Y');
                $message = "{$holiday->driver->name} has a holiday ending on {$expiryDate}.";

                $notification = new \App\Notifications\ExpiryNotification('Holiday', $expiryDate, $holiday->driver->name);
                $holiday->driver->notify($notification);
            }
        })->daily();
    }

    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
