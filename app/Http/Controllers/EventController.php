<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.webapp.events', compact('events'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.webapp.editevent', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_start' => 'nullable|date',
            'event_end' => 'nullable|date',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }

    public function show($id)
    {
        $event = Event::with('missions')->findOrFail($id);
        return view('admin.webapp.eventdetails', compact('event'));
    }
}