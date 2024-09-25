<?php


namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $date = $request->input('date');

        Log::info('Test route hit with date: ' . $date); 

        try {
            $missions = Mission::whereDate('mission_start', $date)
                ->orWhereDate('mission_end', $date)
                ->get();

            return response()->json(['missions' => $missions]);
        } catch (\Exception $e) {
            Log::error('Error fetching missions by date: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch missions'], 500);
        }
    }
}
