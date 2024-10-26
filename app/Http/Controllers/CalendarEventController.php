<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarEvent;

class CalendarEventController extends Controller
{
    public function index()
    {
        // Fetch all events
        $events = CalendarEvent::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        // Validate and create a new event
        $event = CalendarEvent::create($request->all());
        return response()->json($event, 201);
    }

    public function update(Request $request, $id)
    {
        // Update an existing event
        $event = CalendarEvent::findOrFail($id);
        $event->update($request->all());
        return response()->json($event);
    }

    public function destroy($id)
    {
        // Delete an event
        $event = CalendarEvent::findOrFail($id);
        $event->delete();
        return response()->json(null, 204);
    }
}
