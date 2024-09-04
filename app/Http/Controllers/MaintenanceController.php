<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Carsm;
use App\Models\Driver;
use App\Models\Maintenance;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf as PDF;




class MaintenanceController extends Controller
{
    public function addCarmantenance($immatriculation) 
    {
        $car = Carsm::findOrFail($immatriculation);
        $mantanance = Maintenance::all(); 
        $chauffeur = Driver::where('voiture_id', $immatriculation)->first();

        return view('admin.gestion.addCarmantenance', compact('car', 'mantanance', 'chauffeur'));
    }

public function store(Request $request)
{
   
    $maintenance = Maintenance::create([
        'immatriculation' => $request->immatriculation,
        'driver_id' => $request->driver_id, 
        'categorie_panne' => $request->categorie_panne,
        'maintenance_type' => $request->maintenance_type,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'description' => $request->description,
        'cost' => $request->cost,
    ]);

   
    $car = Carsm::where('immatriculation', $request->immatriculation)->first();
    if ($car) {
        $car->status='inactive';
        $car->save();
    }


    $notification = [
        'message' => 'car ajouter on maintenance success.',
        'alert-type' => 'success'
    ];

    return redirect()->route('Datain.maintenance')->with($notification);
}

 public function Datainmaintenance () {
 
    

    $data = Maintenance::join('drivers', 'maintenance.driver_id', '=', 'drivers.id')
    ->select('maintenance.*', 'drivers.nom as driver_name') 
    ->get();

    return view('admin.gestion.CarInMaintenance',compact('data'));
 }




 public function print($id)
 {
     $maintenance = Maintenance::findOrFail($id);
     $pdf = PDF::loadView('admin.gestion.maintenanceprint', compact('maintenance'));
     return $pdf->download('maintenance_report.pdf'); // This will download the PDF
 }

}