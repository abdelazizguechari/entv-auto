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
            'assurance_type'=> 'nullable|string|max:255',
            'next_assurance_date' => 'nullable|date',
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
    
        $notification = [
            'message' => 'Car created successfully.',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('admin.ourcars')->with($notification);
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
        return view('admin.webapp.Ourcars', compact('car'));
    }

    public function edit($immatriculation) {

        $types = Carsm::findOrFail($immatriculation);
        return view('admin.webapp.car_edit',compact('types'));

    }  
    
    public function deleteCar($immatriculation) {

        $types = Carsm::findOrFail($immatriculation)->delete();
        $notification = [
            'message' => 'car deleted successfully.',
            'alert-type' => 'success'
        ];
        
        return redirect()->back()->with($notification);

    } 


    
    public function updateCar(Request $request, $immatriculation)
    {
      
        $car = Carsm::findOrFail($immatriculation);
    
    
        $car->update([
            'etat' => $request->etat,
            'kilometrage' => $request->kilometrage,
            'assurance_type' => $request->assurance_type,
            'next_assurance_date' => $request->next_assurance_date,
            'type_carburant' => $request->type_carburant,
            'couleur' => $request->couleur,
            'description' => $request->description,
        ]);
    
    
        $notification = [
            'message' => 'Car updated successfully.',
            'alert-type' => 'success'
        ];
    
        
        return redirect()->route('admin.ourcars')->with($notification);
    }
    
    

}
