<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Carsm;
use App\Models\Driverspam;
use App\Models\ConducteurConger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Models\Activity;

class DriverController extends Controller
{
    public function store(Request $request)
    {
        // Define validation rules and custom messages
        $rules = [
            'nom' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'assurance_num' => 'nullable|string|max:15', // Maximum length of 15 for assurance number
            'permis_conduire' => 'required|string|unique:drivers|max:15', // Maximum length of 15 for permis number
            'telephone' => 'nullable|string|max:13', // Maximum length of 13 for telephone number
            'num_cas_urgance' => 'nullable|string|max:255',
            'nom_cas_urgance' => 'nullable|string|max:255',
            'email' => 'required|email|unique:drivers',
            'status' => 'nullable|in:active,inactive',
            'adresse' => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'voiture_id' => 'required|string|exists:cars,immatriculation',
            'matricule' => 'required|string|max:4', // Required and at most 4 characters
        ];
    
        $messages = [
            'permis_conduire.unique' => 'Le numéro de permis est déjà utilisé.',
            'permis_conduire.max' => 'Le numéro de permis ne doit pas dépasser 15 caractères.',
            'matricule.max' => 'Le matricule ne doit pas dépasser 4 caractères.',
            'assurance_num.max' => 'Le numéro d\'assurance ne doit pas dépasser 15 caractères.',
            'telephone.max' => 'Le numéro de téléphone ne doit pas dépasser 13 caractères.',
            'date_naissance.after' => 'Vous devez avoir au moins 18 ans.',
        ];
    
        // Validate the request
        $validatedData = $request->validate($rules, $messages);
    
        // Check if the driver is at least 18 years old
        if ($request->has('date_naissance')) {
            $birthDate = new \DateTime($request->input('date_naissance'));
            $currentDate = new \DateTime();
            $age = $currentDate->diff($birthDate)->y;
    
            if ($age < 18) {
                return redirect()->back()->withErrors([
                    'date_naissance' => 'Vous devez avoir au moins 18 ans.',
                ])->withInput();
            }
        }
    
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photoPath;
        }
    
        // Create the driver record
        $driver = Driver::create($validatedData);
    
        // Log activity
        activity()
            ->causedBy(auth()->user())
            ->performedOn($driver)
            ->log('Conducteur créé');
    
        // Set notification message
        $notification = [
            'message' => 'Conducteur créé avec succès.',
            'alert-type' => 'success'
        ];
    
        // Redirect with success notification
        return redirect()->route('our.drivers')->with($notification);
    }
    
    public function create()
    {
        return view('admin.draiveradd');
    }

    public function ourdrivers()
    {
        $drivers = Driver::where('status', 'active')->get();
        return view('admin.webapp.Ourdrivers', compact('drivers'));
    }

    public function deletedriver($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        activity()
            ->causedBy(auth()->user())
            ->performedOn($driver)
            ->log('Conducteur supprimé');

        $notification = [
            'message' => 'Driver deleted successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function editdriver($id)
    {
        $driver = Driver::findOrFail($id);
        $cars = Carsm::all();
        return view('admin.webapp.driveredit', compact('driver', 'cars'));
    }

    public function updatedriver(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'assurance_num' => 'required|string|max:255',
            'permis_conduire' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'voiture_id' => 'nullable|string',
            'nom_cas_urgance' => 'required|string|max:255',
            'num_cas_urgance' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $driver = Driver::findOrFail($id);
        $driver->nom = $request->input('nom');
        $driver->prenom = $request->input('prenom');
        $driver->assurance_num = $request->input('assurance_num');
        $driver->permis_conduire = $request->input('permis_conduire');
        $driver->telephone = $request->input('telephone');
        $driver->email = $request->input('email');
        $driver->adresse = $request->input('adresse');
        $driver->date_naissance = $request->input('date_naissance');
        $driver->voiture_id = $request->input('voiture_id');
        $driver->nom_cas_urgance = $request->input('nom_cas_urgance');
        $driver->num_cas_urgance = $request->input('num_cas_urgance');

        if ($request->hasFile('photo')) {
            if ($driver->photo && Storage::exists('public/' . $driver->photo)) {
                Storage::delete('public/' . $driver->photo);
            }

            $photoPath = $request->file('photo')->store('drivers', 'public');
            $driver->photo = $photoPath;
        }

        $driver->save();

        activity()
            ->causedBy(auth()->user())
            ->performedOn($driver)
            ->log('Conducteur mis à jour');

        $notification = [
            'message' => 'Driver updated successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('our.drivers', $id)->with($notification);
    }

    public function conducteurconge($id)
    {
        $driverdata = Driver::findOrFail($id);
        return view('admin.webapp.conducteurconge', compact('driverdata'));
    }

    public function addconger(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

        $driver->update([
            'status' => 'inactive',
            'voiture_id' => null
        ]);

        $addconger = new ConducteurConger();
        $addconger->driver_id = $request->driver_id;
        $addconger->type_conger = $request->type_conger;
        $addconger->start_date = $request->start_date;
        $addconger->end_date = $request->end_date;
        $addconger->save();

        activity()
            ->causedBy(auth()->user())
            ->performedOn($driver)
            ->log('Conducteur entrant en conge');

        $notification = [
            'message' => 'Driver added to leave successfully and car has been freed up.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function driverconger()
    {
        $data = ConducteurConger::join('drivers', 'conducteur_conger.driver_id', '=', 'drivers.id')
            ->select(
                'conducteur_conger.*',
                'drivers.nom',
                'drivers.prenom',
                'drivers.assurance_num',
                'drivers.permis_conduire',
                'drivers.telephone',
                'drivers.email',
                'drivers.status',
                'drivers.adresse'
            )
            ->get();

        return view('admin.gestion.driver.Congerdriver', compact('data'));
    }

    public function driver()
    {
        $driver = Driver::count();
        return view('admin.index', compact('driver'));
    }

    public function Addintoqtr($id)
    {

        $data = Driver::findOrFail($id);
    
 
        $voitureImmatriculation = $data->voiture->immatriculation ?? 'N/A';
 
        $user = auth()->user();
  
        return view('admin.webapp.driver.Qtrdriver', compact('data', 'voitureImmatriculation', 'user'));
    }
    
    public function driverdetailes($id)
    {
        $data = Driver::findOrFail($id);
        return view('admin.webapp.driver.driverdetailes', compact('data'));
    }



    // Add this method to your ReportController
public function reportDriver(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'driver_id' => 'required|exists:drivers,id',
        'raison' => 'required|string',
        'date_singler' => 'required|date',
        'justification' => 'nullable|string',
        'singler_par' => 'required|exists:users,id',
    ]);

    // Create the report record
    $report = new Driverspam();
    $report->driver_id = $validatedData['driver_id'];
    $report->raison = $validatedData['raison'];
    $report->date_singler = $validatedData['date_singler'];
    $report->justification = $validatedData['justification'];
    $report->singler_par = $validatedData['singler_par'];
    $report->save();

    // Log activity
    activity()
        ->causedBy(auth()->user())
        ->performedOn($report)
        ->log('Conducteur signalé');

    // Set notification message
    $notification = [
        'message' => 'Conducteur signalé avec succès.',
        'alert-type' => 'success'
    ];

    // Redirect with success notification
    return redirect()->back()->with($notification);
}

public function Condqtr(){

    $data = Driverspam::with('driver')->get();
    return view('admin.gestion.driver.driverspam', compact('data'));

}



public function deleteRecord($id)
{
    try {
        $record = Driverspam::findOrFail($id);
        
   
        $record->delete();

        activity()
            ->causedBy(auth()->user())
            ->performedOn($record)
            ->log(' Driverspam supprimé');

     
        $notification = [
            'message' => 'Signalement supprimé avec succès.',
            'alert-type' => 'success'
        ];
        
        return redirect()->back()->with($notification);
    } catch (\Exception $e) {
 
        Log::error('Error deleting Driverspam record', ['id' => $id, 'error' => $e->getMessage()]);

        
        $notification = [
            'message' => 'Une erreur s\'est produite lors de la suppression du signalement.',
            'alert-type' => 'error'
        ];
        
        return redirect()->back()->with($notification);
    }
}



    
}
