<?php

// app/Console/Commands/ArchiveExpiredMissions.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mission;
use App\Models\MissionArchive;
use Carbon\Carbon;

class ArchiveExpiredMissions extends Command
{
    protected $signature = 'missions:archive-expired';
    protected $description = 'Archive missions that have ended and update their status to completed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get today's date
        $today = Carbon::today();

        // Find missions where mission_end is today and status is not completed
        $missions = Mission::whereDate('mission_end', $today)
                           ->where('status', 'completed')
                           ->get();

        foreach ($missions as $mission) {
            // Create a new archive record
            MissionArchive::create([
                'mission_id' => $mission->id,
                'type' => $mission->mission_type,
                'name' => $mission->name,
                'description' => $mission->description,
                'mission_start' => $mission->mission_start,
                'mission_end' => $mission->mission_end,
                'crew_leader' => $mission->crew_leader,
                'crew_name' => $mission->crew_name,
                'status' => 'completed',
                'fuel_tokens' => $mission->fuel_tokens,
                'fuel_tokens_used' => $mission->fuel_tokens_used,
                'distance' => $mission->distance,
                'car_id' => $mission->car_id,
                'driver_id' => $mission->driver_id,
            ]);

            // Update mission status to completed
            $mission->update([
                'status' => 'completed'
            ]);
        }

        $this->info('Expired missions have been archived successfully.');
    }
}
