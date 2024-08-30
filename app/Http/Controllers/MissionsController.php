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
            'distance' => 'required|integer|min:0',
            'car_id' => 'required|string|exists:cars,immatriculation',
        ]);

        $data = $request->except(['car_id']);
        $data['type'] = 'transportation'; 

        $mission = Mission::create($data);

        $drivers = Driver::where('voiture_id', $request->car_id)->get();
        $mission->cars()->attach($request->car_id);
        $mission->drivers()->attach($drivers);

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
            'distance' => 'required|integer|min:0',
            'car_id' => 'required|string|exists:cars,immatriculation',
        ]);

        $data = $request->except(['car_id']);
        $data['type'] = 'mission'; 
        $mission = Mission::create($data);

        $drivers = Driver::where('voiture_id', $request->car_id)->get();
        $mission->cars()->attach($request->car_id);
        $mission->drivers()->attach($drivers);

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
            'distance' => 'required|integer|min:0',
            'cars' => 'required|array',
            'cars.*' => 'string|exists:cars,immatriculation',
        ]);

        $data = $request->except(['cars']);
        $data['type'] = 'evenements'; 

        $mission = Mission::create($data);

        $mission->cars()->attach($request->cars);

        $drivers = Driver::whereIn('voiture_id', $request->cars)->get();
        $mission->drivers()->attach($drivers);

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
            'distance' => 'required|integer|min:0',
            'car_id' => 'required|array',
            'car_id.*' => 'string|exists:cars,immatriculation',
        ]);

        $mission->update($request->except(['car_id']));

        $mission->cars()->sync($request->car_id);

        $drivers = Driver::whereIn('voiture_id', $request->car_id)->get();
        $mission->drivers()->sync($drivers);

        return redirect()->route('missions.index')->with('success', 'Mission updated successfully.');
    }

    public function destroy($id)
    {
        $mission = Mission::findOrFail($id);
        $mission->delete();

        return redirect()->route('missions.index')->with('success', 'Mission deleted successfully.');
    }

    public function getDriversByCars(Request $request)
    {
        $cars = $request->input('cars');
        $drivers = Driver::whereIn('voiture_id', $cars)->get();
        return response()->json($drivers);
    }
}