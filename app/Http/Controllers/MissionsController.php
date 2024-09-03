<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Event;

class MissionsController extends Controller
{
    public function index()
    {
        $missions = Mission::where('type', 'mission')->with(['car', 'driver'])->get();
        return view('admin.webapp.missions', compact('missions'));
    }

    public function indexTransportation()
    {
        $missions = Mission::where('type', 'transportation')->with(['car', 'driver'])->get();
        return view('admin.webapp.transportation', compact('missions'));
    }

    public function createTransportation()
    {
        $cars = Car::all();
        if ($cars->isEmpty()) {
            \Log::info('No cars available');
        }
        return view('admin.webapp.createtransportation', compact('cars'));
    }

   public function createMission(Request $request)
{
    $cars = Car::all();
    $events = Event::all();
    $eventId = $request->input('event_id');
    $fromEvent = $request->input('from_event', false);
    return view('admin.webapp.createmission', compact('cars', 'events', 'eventId', 'fromEvent'));
}

    public function createEvents()
    {
        $missions = Mission::all();
        return view('admin.webapp.createevents', compact('missions'));
    }

    public function storeTransportation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission_start' => 'nullable|date',
            'mission_end' => 'nullable|date',
            'status' => 'required|in:ongoing,scheduled,completed',
            'fuel_tokens' => 'required|integer|min:0',
            'distance' => 'required|integer|min:0',
            'car_id' => 'required|string|exists:cars,immatriculation',
        ]);

        $data = $request->all();
        $data['type'] = 'transportation'; 

        $mission = Mission::create($data);

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
            'event_id' => 'nullable|exists:events,id',
        ]);

        $data = $request->all();
        $data['type'] = 'mission'; 
        $mission = Mission::create($data);

        if ($request->input('action') == 'add_to_event' && $request->has('event_id') && $request->input('event_id')) {
            $event = Event::find($request->input('event_id'));
            $event->missions()->attach($mission->id);
            return redirect()->back()->with('success', 'Mission added to event successfully. You can add more missions.');
        }

        return redirect()->route('missions.index')->with('success', 'Mission created successfully.');
    }
    public function storeEvents(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_start' => 'nullable|date',
            'event_end' => 'nullable|date',
        ]);

        $event = Event::create($request->all());

        if ($request->query('redirect_to_add_mission')) {
            return redirect()->route('missions.create.mission', ['event_id' => $event->id, 'from_event' => true])
                            ->with('success', 'Event created successfully. Now add missions to the event.');
        }

        return redirect()->route('missions.index')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $mission = Mission::findOrFail($id);
        $cars = Car::with('driver')->get(); 

        if ($mission->type == 'transportation') {
            return view('admin.webapp.edittransportation', compact('mission', 'cars'));
        } else {
            return view('admin.webapp.editmission', compact('mission', 'cars'));
        }
    }

    public function update(Request $request, $id)
    {
        $mission = Mission::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission_start' => 'nullable|date',
            'mission_end' => 'nullable|date',
            'status' => 'required|in:ongoing,scheduled,completed',
            'fuel_tokens' => 'required|integer|min:0',
            'distance' => 'required|integer|min:0',
            'car_id' => 'required|string|exists:cars,immatriculation',
        ]);

        $mission->update($request->all());

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

    public function showEvents()
    {
        $events = Event::with('missions')->get();
        return view('admin.webapp.events', compact('events'));
    }
}