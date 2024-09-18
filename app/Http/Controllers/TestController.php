<?php


namespace App\Http\Controllers;

use App\Models\Mission; // Ensure you import the Mission model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $date = $request->input('date'); // Fetch the date parameter from the request

        Log::info('Test route hit with date: ' . $date); // Log the date for debugging

        try {
            // Fetch missions by date
            $missions = Mission::whereDate('mission_start', $date)
                ->orWhereDate('mission_end', $date)
                ->get();

            // Return the missions in a JSON response
            return response()->json(['missions' => $missions]);
        } catch (\Exception $e) {
            // Log the error and return an error response
            Log::error('Error fetching missions by date: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch missions'], 500);
        }
    }
}
