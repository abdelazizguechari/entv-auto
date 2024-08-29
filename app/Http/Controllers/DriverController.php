<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Carsm;
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
            'prenom' => 'nullable|string|max:255',  // Corrected this line
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
    
        return redirect()->route('driver.create')->with('success', 'Conducteur ajouté avec succès.');
    }

    public function create()
    {
        
        return view('admin.draiveradd');
    }
  

   
}