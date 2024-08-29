<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Carsm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class CarController extends Controller
{
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'immatriculation' => 'required|string|max:255|unique:cars',
            'marque' => 'nullable|string|max:255',
            'modele' => 'nullable|string|max:255',
            'etat' => 'nullable|string|max:255',
            'kilometrage' => 'nullable|integer',
            'datem' => 'nullable|string|max:255',
            'couleur' => 'nullable|string|max:255',
            'type_carburant' => 'nullable|string|max:255',
            'transmission' => 'nullable|string|max:255',
            'puissance' => 'nullable|integer',
            'nombre_portes' => 'nullable|integer',
            'nombre_places' => 'nullable|integer',
            'prix' => 'nullable|numeric',
            'date_achat' => 'nullable|date',
            'proprietaire' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Carsm::create($validatedData);

        return redirect()->route('car.create')->with('success', 'Car details have been saved successfully.');
    }



    public function create()
    {
        return view('admin.adding.car_add');
    }

    public function ourcars()
    {
        return view('admin.webapp.Ourcars');
    }


    
    public function cardata()
    {
        $car = Carsm::latest()->get();
        return view('admin.webapp.Ourcars', compact('car')->with('car',$car));
    }
    
}
