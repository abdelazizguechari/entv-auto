<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Driver;
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

        Car::create($validatedData);

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
        $cars = Car::with('driver')->latest()->get();
        return view('admin.webapp.Ourcars', compact('cars'));
    }


    public function delete($immatriculation)
    {
        $car = Car::findOrFail($immatriculation);
        $car->delete();
        return redirect()->back()->with('success', 'Car deleted successfully');
    }

    public function edit($immatriculation)
    {
        $car = Car::findOrFail($immatriculation);
        $drivers = Driver::all();
        return view('admin.webapp.editcar', compact('car', 'drivers'));
    }

    public function update(Request $request, $immatriculation)
    {
        $car = Car::findOrFail($immatriculation);
        $car->immatriculation = $request->input('immatriculation');
        $car->modele = $request->input('modele');
        $car->kilometrage = $request->input('kilometrage');
        $car->type_carburant = $request->input('type_carburant');
        $car->driver_id = $request->input('driver_id');
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }
}
