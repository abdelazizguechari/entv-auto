<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Car;
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
            'permis_conduire' => 'required|string|unique:driver',
            'telephone' => 'nullable|string|max:255',
            'num_cas_urgance' => 'nullable|string|max:255',
            'nom_cas_urgance' => 'nullable|string|max:255',
            'email' => 'required|email|unique:driver',
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
    
        return redirect()->route('driver.create')->with('success', 'Conducteur ajouté avec succès.');
    }

    public function create()
    {       
        return view('admin.draiveradd');
    }

    public function index()
    {
        $drivers = Driver::latest()->get();
        return view('admin.webapp.Ourdrivers', compact('drivers'));
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('admin.webapp.editdriver', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);
        $driver->update($request->all());
        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully');
    }

    public function delete($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully');
    }
}
  