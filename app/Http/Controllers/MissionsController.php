<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Car;
use App\Models\Driver;

class MissionsController extends Controller
{
    public function index()
    {
        $missions = Mission::all();
        return view('admin.webapp.missions', compact('missions'));
    }


    public function createTransportation()
    {
        $cars = Car::all();
        $drivers = Driver::all();
        return view('admin.webapp.createtransportation', compact('cars', 'drivers'));
    }

    public function createMission()
    {
        $cars = Car::all();
        $drivers = Driver::all();
        return view('admin.webapp.createmission', compact('cars', 'drivers'));
    }

    public function createEvents()
    {
        $cars = Car::all();
        $drivers = Driver::all();
        return view('admin.webapp.createevents', compact('cars', 'drivers'));
    }

    public function storeTransportation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission_start' => 'nullable|date',
            'mission_end' => 'nullable|date',
            'crew_leader' => 'nullable|string|max:255',
            'crew_name' => 'nullable|string|max:255',
            'status' => 'required|in:ongoing,scheduled,completed',
            'fuel_tokens' => 'required|integer|min:0',
            // 'fuel_tokens_used' => 'required|integer|min:0',
            'distance' => 'required|integer|min:0',
            'car_id' => 'nullable|string|max:255',
            'driver_id' => 'nullable|integer|exists:driver,id',
        ]);

        Mission::create($request->all());

        return redirect()->route('missions.index')->with('success', 'Transportation mission created successfully.');
    }

    public function storeMission(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission_start' => 'nullable|date',
            'mission_end' => 'nullable|date',
            'crew_leader' => 'nullable|string|max:255',
            'crew_name' => 'nullable|string|max:255',
            'status' => 'required|in:ongoing,scheduled,completed',
            'fuel_tokens' => 'required|integer|min:0',
            // 'fuel_tokens_used' => 'required|integer|min:0',
            'distance' => 'required|integer|min:0',
            'car_id' => 'nullable|string|max:255',
            'driver_id' => 'nullable|integer|exists:driver,id',
        ]);

        Mission::create($request->all());

        return redirect()->route('missions.index')->with('success', 'Mission created successfully.');
    }

    public function storeEvents(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission_start' => 'nullable|date',
            'mission_end' => 'nullable|date',
            'crew_leader' => 'nullable|string|max:255',
            'crew_name' => 'nullable|string|max:255',
            'status' => 'required|in:ongoing,scheduled,completed',
            'fuel_tokens' => 'required|integer|min:0',
            // 'fuel_tokens_used' => 'required|integer|min:0',
            'distance' => 'required|integer|min:0',
            'cars' => 'required|array',
            'cars.*' => 'string|exists:cars,immatriculation',
            'drivers' => 'required|array',
            'drivers.*' => 'integer|exists:driver,id',
        ]);

        $mission = Mission::create($request->except(['cars', 'drivers']));

        $mission->cars()->attach($request->cars);
        $mission->drivers()->attach($request->drivers);

        return redirect()->route('missions.index')->with('success', 'Event mission created successfully.');
    }

    public function edit($id)
    {
        $mission = Mission::with(['cars', 'drivers'])->findOrFail($id);
        $cars = Car::all();
        $drivers = Driver::all();
        return view('admin.webapp.editmission', compact('mission', 'cars', 'drivers'));
    }

    public function update(Request $request, $id)
    {
        $mission = Mission::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission_start' => 'nullable|date',
            'mission_end' => 'nullable|date',
            'crew_leader' => 'nullable|string|max:255',
            'crew_name' => 'nullable|string|max:255',
            'status' => 'required|in:ongoing,scheduled,completed',
            'fuel_tokens' => 'required|integer|min:0',
            // 'fuel_tokens_used' => 'required|integer|min:0',
            'distance' => 'required|integer|min:0',
            'car_id' => 'nullable|string|max:255',
            'driver_id' => 'nullable|integer|exists:driver,id',
            'cars' => 'nullable|array',
            'cars.*' => 'string|exists:cars,immatriculation',
            'drivers' => 'nullable|array',
            'drivers.*' => 'integer|exists:driver,id',
        ]);

        $mission->update($request->except(['cars', 'drivers']));

        if ($mission->type === 'event') {
            $mission->cars()->sync($request->cars);
            $mission->drivers()->sync($request->drivers);
        }

        return redirect()->route('missions.index')->with('success', 'Mission updated successfully.');
    }

    public function destroy($id)
    {
        $mission = Mission::findOrFail($id);
        $mission->delete();

        return redirect()->route('missions.index')->with('success', 'Mission deleted successfully.');
    }
}