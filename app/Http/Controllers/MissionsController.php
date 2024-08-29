<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;

class MissionsController extends Controller
{
    public function index()
    {
        $missions = Mission::with('cars', 'driver')->get();

        return view('admin.missions.missions', compact('missions'));
    }

    public function create()
    {
        $cars = Car::all();
        $drivers = Driver::all();
        return view('admin.missions.create', compact('cars', 'drivers'));
    }

        public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'type' => 'required|in:transportation,mission,evenements',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission_start' => 'nullable|date',
            'mission_end' => 'nullable|date',
            'crew_leader' => 'nullable|string|max:255',
            'crew_name' => 'nullable|string|max:255',
            'status' => 'nullable|in:ongoing,scheduled,completed',
            'fuel_tokens' => 'nullable|integer',
            'distance' => 'nullable|integer',
            'car_id' => 'nullable|exists:cars,id',
            'car_ids' => 'nullable|array',
            'car_ids.*' => 'exists:cars,id',
        ]);

        // Get the driver for a specific car if applicable
        $driver_id = null;
        if ($request->car_id) {
            $driver = Driver::where('car_id', $request->car_id)->first();
            $driver_id = $driver ? $driver->id : null;
        }

        // Create the mission
        $mission = Mission::create($request->except('car_ids'));

        // Handle car assignments based on mission type
        if ($request->type === 'evenements' && $request->has('car_ids')) {
            $mission->cars()->sync($request->car_ids);
        } elseif ($request->car_id) {
            $mission->car_id = $request->car_id;
        }

        // Set the driver ID if available
        if ($driver_id) {
            $mission->driver_id = $driver_id;
        }

        // Save the mission
        $mission->save();

        return redirect()->route('admin.missions.index')->with('success', 'Mission created successfully!');
    }

}