<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Carsm;
use App\Models\ConducteurConger;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




class DriverController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'assurance_num' => 'nullable|string|max:255',
            'permis_conduire' => 'required|string|unique:drivers',
            'telephone' => 'nullable|string|max:255',
            'num_cas_urgance' => 'nullable|string|max:255',
            'nom_cas_urgance' => 'nullable|string|max:255',
            'email' => 'required|email|unique:drivers',
            'status' => 'nullable|in:active,inactive',
            'adresse' => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'voiture_id' => 'required|string|exists:cars,immatriculation',
        ]);
    
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photoPath;
        }
    
        Driver::create($validatedData);
    
        $notification = [
            'message' => 'Driver created successfully.', // Updated message
            'alert-type' => 'success'
        ];
    
        return redirect()->back()->with($notification);
    }

    public function create()
    {
        
        return view('admin.draiveradd');
    }
  


    public function ourdrivers() {

       $drivers = Driver::all();
       return view('admin.webapp.Ourdrivers',compact('drivers'));
    
    }

    public function deletedriver($id) {
        $types = Driver::findOrFail($id)->delete();
        $notification = [
            'message' => 'driver deleted successfully.',
            'alert-type' => 'success'
        ];
        
        return redirect()->back()->with($notification);
    }

    public function editdriver($id)
    {

        $driver = Driver::findOrFail($id);
        $cars = Carsm::all();
        return view('admin.webapp.driveredit', compact('driver','cars'));
    }
    
    public function updatedriver(Request $request, $id)
    {
        
        $request->validate([
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

        $notification = [
            'message' => 'car deleted successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('our.drivers', $id)->with($notification);
    }


    public function conducteurconge($id) {
    
        $driverdata = Driver::findOrFail($id);
        return view ('admin.webapp.conducteurconge',compact('driverdata'));
    }
}