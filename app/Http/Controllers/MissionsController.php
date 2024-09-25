<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Carsm;
use App\Models\Driver;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\MissionArchive;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class MissionsController extends Controller
{  

    public function index()
    {
        $today = \Carbon\Carbon::today();
        
        // Retrieve missions where the start date is today and group by date
        $missions = Mission::whereDoesntHave('events')
            ->whereDate('mission_start', $today)
            ->get()
            ->groupBy(function($mission) {
                return \Carbon\Carbon::parse($mission->mission_start)->format('Y-m-d'); // Group by date
            });
        
        // Translation array
        $statusTranslations = [
            'ongoing' => 'En cours',
            'scheduled' => 'Planifié',
            'completed' => 'Terminé',
        ];
        
        // Translate statuses
        foreach ($missions as $date => $missionsByDate) {
            foreach ($missionsByDate as $mission) {
                $mission->status = $statusTranslations[$mission->status] ?? $mission->status;
            }
        }
    
        // Return the view with the grouped missions
        return view('admin.webapp.missions', compact('missions'));
    }

    public function indexTransportation()
    {
        $missions = Mission::where('type', 'transportation')->with(['car', 'driver'])->get();
        return view('admin.webapp.transportation', compact('missions'));
    }

    public function createTransportation()
    {
        $cars = Carsm::all();
        if ($cars->isEmpty()) {
            Log::info('No cars available');
        }
        return view('admin.webapp.createtransportation', compact('cars'));
    }

   public function createMission(Request $request)
    {
        $cars = Carsm::whereDoesntHave('missions')
        ->where('status', 'active')
        ->get();
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
        // Use try-catch to handle exceptions
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'mission_start' => 'required|date',
                'mission_end' => 'required|date|after_or_equal:mission_start',
                'status' => 'required|in:ongoing,scheduled,completed',
                'fuel_tokens' => 'required|integer|min:0',
                'distance' => 'required|integer|min:0',
                'car_id' => 'required|string|exists:cars,immatriculation',
            ]);
    
            // Return validation errors if any
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            // Create the mission
            $data = $request->all();
            $data['type'] = 'transportation';
            $mission = Mission::create($data);
    
            // Log the activity
            activity()
                ->causedBy(auth()->user())
                ->performedOn($mission)
                ->log('mission transportation crée');
    
            // Return success response
            return response()->json(['success' => true, 'message' => 'Transportation mission created successfully.']);
    
        } catch (\Exception $e) {
            // Handle any other exceptions
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
    
    public function storeMission(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'mission_type' => 'required|string',
            'lieu_mission' => 'required|string',
            'mission_start' => 'required|date',
            'mission_end' => 'nullable|date|after_or_equal:mission_start',
            'crew_leader' => 'required|string|max:255',
            'crew_name' => 'required|string|max:255',
            'status' => 'required|in:ongoing,scheduled,completed',
            'fuel_tokens' => 'required|integer|min:0',
            'distance' => 'required|integer|min:0',
            'car_id' => 'required|string|exists:cars,immatriculation',
            'event_id' => 'nullable|exists:events,id',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'description.required' => 'La description est obligatoire.',
            'mission_type.required' => 'Le type de mission est obligatoire.',
            'lieu_mission.required' => 'Le lieu de la mission est obligatoire.',
            'mission_start.required' => 'La date de début de la mission est obligatoire.',
            'mission_start.date' => 'La date de début de la mission doit être une date valide.',
            'mission_end.date' => 'La date de fin de la mission doit être une date valide.',
            'mission_end.after_or_equal' => 'La date de fin de la mission doit être après ou égale à la date de début.',
            'crew_leader.required' => 'Le chef d\'équipe est obligatoire.',
            'crew_name.required' => 'Le nom de l\'équipe est obligatoire.',
            'status.required' => 'Le statut est obligatoire.',
            'status.in' => 'Le statut doit être l\'un des suivants: ongoing, scheduled, completed.',
            'fuel_tokens.required' => 'Le nombre de jetons de carburant est obligatoire.',
            'fuel_tokens.integer' => 'Le nombre de jetons de carburant doit être un nombre entier.',
            'fuel_tokens.min' => 'Le nombre de jetons de carburant doit être supérieur ou égal à 0.',
            'distance.required' => 'La distance est obligatoire.',
            'distance.integer' => 'La distance doit être un nombre entier.',
            'distance.min' => 'La distance doit être supérieure ou égale à 0.',
            'car_id.required' => 'Le numéro d\'immatriculation de la voiture est obligatoire.',
            'car_id.exists' => 'Le numéro d\'immatriculation de la voiture doit exister dans la base de données.',
            'event_id.exists' => 'L\'événement sélectionné doit exister dans la base de données.',
        ]);


    
        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Retrieve validated data
        $data = $request->all();
        $data['type'] = 'mission';
    
        // Create the mission record
        $mission = Mission::create($data);
    
        // Handle archiving if status is 'completed'
        if ($data['status'] === 'completed') {
            MissionArchive::create([
                'mission_id' => $mission->id,
                'type' => 'mission',
                'name' => $data['name'],
                'description' => $data['description'],
                'mission_start' => $data['mission_start'],
                'mission_end' => $data['mission_end'],
                'crew_leader' => $data['crew_leader'],
                'crew_name' => $data['crew_name'],
                'status' => $data['status'],
                'fuel_tokens' => $data['fuel_tokens'],
                'fuel_tokens_used' => 0, // Adjust if needed
                'distance' => $data['distance'],
                'car_id' => $data['car_id'],
                'driver_id' => $request->driver_id ?? null,
            ]);
        }
    
        // Handle adding to event if requested
        if ($request->input('action') == 'add_to_event' && $request->has('event_id') && $request->input('event_id')) {
            $event = Event::find($request->input('event_id'));
            if ($event) {
                $event->missions()->attach($mission->id);
                return response()->json(['success' => true, 'message' => 'Mission ajoutée à l\'événement avec succès.']);
            }
        }
    
        // Log activity
        activity()
            ->causedBy(auth()->user())
            ->performedOn($mission)
            ->log('création de mission.');
    
        // Send notification and redirect
        $notification = [
            'message' => 'Mission créée avec succès.',
            'alert-type' => 'success'
        ];
    
        return redirect()->back()->with($notification);
    }
    

    
    public function deleted($id) {
        $Mission= Mission::findOrFail($id);
        $Mission->delete();

        activity()
        ->on($Mission)
        ->causedBy(Auth::user())
        ->withProperties(['attributes' => $Mission])
        ->log('mission supprimé');

    $notification = [
        'message' => 'mission supremier successfully.',
        'alert-type' => 'success'
    ];
    return redirect()->back()->with($notification);

    }
    
    
    public function updateMission(Request $request, $id)
    {
        $mission = Mission::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission_type' => 'nullable|string',
            'lieu_mission' => 'nullable|string',
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

        $mission->update($data);

        if ($request->input('action') == 'add_to_event' && $request->has('event_id') && $request->input('event_id')) {
            $event = Event::find($request->input('event_id'));
            $event->missions()->attach($mission->id);
            return redirect()->back()->with('success', 'Mission updated and added to event successfully.');
        }

        activity()
        ->causedBy(auth()->user())
        ->performedOn($mission)
        ->log('mission updated');

        return redirect()->route('missions.index')->with('success', 'Mission updated successfully.');
    }

    public function editMission($id)
    {
        $mission = Mission::findOrFail($id);
        $cars = Carsm::all();

        return view('admin.webapp.editmission', compact('mission', 'cars'));
    }


    public function updateTransportation(Request $request, $id)
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

        $data = $request->all();
        $data['type'] = 'transportation'; 

        $mission->update($data);

        activity()
        ->causedBy(auth()->user())
        ->performedOn($mission)
        ->log('mission mis à jour');

        return redirect()->route('missions.index.transportation')->with('success', 'Transportation mission updated successfully.');
    } 
    public function editTransportation($id)
    {
        $mission = Mission::findOrFail($id);
        $cars = Carsm::all();

        return view('admin.webapp.edittransportation', compact('mission', 'cars'));
    }
 

    public function storeEvents(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string', // Made description required
            'event_start' => 'required|date',
            'event_end' => 'required|date',
            // Custom validation to ensure event_start is not after event_end
            'event_start' => ['required', 'date', function ($attribute, $value, $fail) use ($request) {
                if ($request->event_end && $value > $request->event_end) {
                    $fail('La date de début de l\'événement ne peut pas être après la date de fin.');
                }
            }],
        ], [
            // Custom error messages in French
            'name.required' => 'Le nom est obligatoire.',
            'description.required' => 'La description est obligatoire.',
            'event_start.date' => 'La date de début de l\'événement doit être une date valide.',
            'event_end.date' => 'La date de fin de l\'événement doit être une date valide.',
        ]);

        $event = Event::create($request->all());

        activity()
        ->causedBy(auth()->user())
        ->performedOn($event)
        ->log('eventement crée');

        if ($request->query('redirect_to_add_mission')) {
            return redirect()->route('missions.create.mission', ['event_id' => $event->id, 'from_event' => true])
                            ->with('success', 'Event created successfully. Now add missions to the event.');
        }

        return redirect()->route('missions.index')->with('success', 'Event created successfully.');
    }


    public function destroy($id)
    {
        $mission = Mission::findOrFail($id);
        $missionType = $mission->type;
        $missionName = $mission->name;
        $mission->delete();

        $logMessage = '';

        if ($missionType == 'transportation') {
            $logMessage = "Mission transportation '{$missionName}' supprimé.";
        } else if ($missionType == 'mission') {
            $logMessage = " mission '{$missionName}' supprimé.";
        }

        activity()
            ->causedBy(auth()->user())
            ->performedOn($mission)
            ->log($logMessage);

        if ($missionType == 'transportation') {
            return redirect()->route('missions.index.transportation')->with('success', 'mission transportation supprimé avec succes.');
        } else {
            return redirect()->route('missions.index')->with('success', 'Mission supprimé avec succes.');
        }
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


    public function fetchByDate(Request $request)
    {
        $date = $request->input('date'); // Ensure the correct parameter name
    
        // Log the date being fetched
        Log::info('Fetching missions for date: ' . $date);
    
        try {
            // Validate the date format (optional)
            $this->validate($request, [
                'date' => 'required|date_format:Y-m-d',
            ]);
    
            // Fetch missions by date
            $missions = Mission::whereDate('mission_start', $date)
                ->orWhereDate('mission_end', $date)
                ->get();
    
            // Check if missions were found
            if ($missions->isEmpty()) {
                Log::info('No missions found for date: ' . $date);
            }
    
            return response()->json(['missions' => $missions]);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Validation error: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid date format'], 422);
    
        } catch (\Exception $e) {
            // Log the error and return a response
            Log::error('Error fetching missions by date: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch missions'], 500);
        }
    }   
}