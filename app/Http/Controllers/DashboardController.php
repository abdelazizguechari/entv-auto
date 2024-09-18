<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Carsm;
use App\Models\Event;
use App\Models\Mission;
use App\Models\User;
use Carbon\Carbon;
use App\Models\MissionArchive;
use App\Models\Department;
use App\Models\ConducteurConger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




class DashboardController extends Controller
{
    public function updatesection() {
        $data = Department::where('id', 2)->first();
        return view ('admin.sections.section',compact('data'));
    }

    public function update(Request $request, $id)
{
    // Find the department by its ID
    $department = Department::findOrFail($id);

    // Validate the incoming request
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'nb_employes' => 'required|integer',
        'responsable' => 'required|string|max:255',
        'localisation' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telephone' => 'required|string|max:15',
    ]);

   
    $department->update($validatedData);

    $notification = [
        'message' => 'section informatin update successfully.',
        'alert-type' => 'success'
    ];

    
    return redirect()->route('admin.dashboard')->with($notification);
}

public function AdminDashboard() {

    $data = Department::where('id', 2)->first();
    $carnumber = Carsm::where('status' , 'active')->count();
    $driverumber = Driver::where('status' , 'active')->count();
   
    $users = User::all(); $currentUserId = auth()->user();
    
    $missions = Mission::whereDate('mission_start', Carbon::today())->get();

    return view ('admin.index',compact('data','carnumber','driverumber','missions','currentUserId','users'));

}



public function mindex()
{
    $archives = MissionArchive::all(); // Fetch all mission archives

    return view('admin.gestion.archive.missionarchive', compact('archives'));
}


public function show($id)
{
   
    $archive = MissionArchive::findOrFail($id);
    return view('admin.gestion.archive.show', compact('archive'));
}

public function archive($id)
{
    // Find the mission by ID
    $mission = Mission::findOrFail($id);

    // Check if the mission is already archived
    if ($mission->status === 'completed') {
        return redirect()->back()->with('error', 'Mission is already archived.');
    }

    // Debugging statement
    Log::info("Archiving mission with ID: {$mission->id}");

    // Archive the mission
    MissionArchive::create([
        'mission_id' => $mission->id,
        'type' => 'mission',
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

    // Optionally, delete the mission from the original table
    $mission->delete();

    $notification = [
        'message' => 'Mission archived successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
}
  

}
