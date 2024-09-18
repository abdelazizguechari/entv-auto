<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Carsm;
use App\Models\Driver;
use App\Models\Stock;
use App\Models\Maintenance;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\MaintenanceArchive;
use Carbon\Carbon;
use App\Models\MaintenanceStock;

class MaintenanceController extends Controller
{
    public function addCarmantenance($immatriculation) 
    {
        $car = Carsm::findOrFail($immatriculation);
        $mantanance = Maintenance::all(); 
        $chauffeur = Driver::where('voiture_id', $immatriculation)->first();

        // Log activity for viewing maintenance addition page
        // activity()
        //     ->causedBy(Auth::user())
        //     ->withProperties(['immatriculation' => $immatriculation])
        //     ->log('Viewed car maintenance addition page');

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
            $car->status = 'inactive';
            $car->save();

            // Log car status change
            // activity()
            //     ->causedBy(Auth::user())
            //     ->performedOn($car)
            //     ->withProperties(['status' => 'inactive'])
            //     ->log('Car status changed to inactive');
        }

        // Log maintenance creation
        activity()
            ->causedBy(Auth::user())
            ->performedOn($maintenance)
            ->log('Maintenance crée pour la voiture : ' . $request->immatriculation);

        $notification = [
            'message' => 'car ajouter on maintenance success.',
            'alert-type' => 'success'
        ];

        return redirect()->route('Datain.maintenance')->with($notification);
    }

    public function Datainmaintenance()
    {
        $data = Maintenance::join('drivers', 'maintenance.driver_id', '=', 'drivers.id')
            ->select('maintenance.*', 'drivers.nom as driver_name')
            ->where('maintenance.status', 'inwork')
            ->get();

        // Log data retrieval
        // activity()
        //     ->causedBy(Auth::user())
        //     ->log('Fetched data for cars currently in maintenance');

        return view('admin.gestion.CarInMaintenance', compact('data'));
    }

    public function print($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $pdf = PDF::loadView('admin.gestion.maintenanceprint', compact('maintenance'));

        activity()
            ->causedBy(Auth::user())
            ->performedOn($maintenance)
            ->log('PDF generé pour la maintenance : ' . $id);

        return $pdf->download('maintenance_report.pdf');
    }

    public function complete($id)
    {
        $maintenance = Maintenance::findOrFail($id);

        $maintenance->status = 'completed';
        $maintenance->end_date = Carbon::now();
        $maintenance->save();

        MaintenanceArchive::create([
            'maintenance_id' => $maintenance->id,
            'maintenance_type' => $maintenance->maintenance_type,
            'start_date' => $maintenance->start_date,
            'end_date' => $maintenance->end_date,
            'description' => $maintenance->description,
            'categorie_panne' => $maintenance->categorie_panne,
            'cost' => $maintenance->cost,
            'created_at' => $maintenance->created_at,
            'updated_at' => $maintenance->updated_at,
        ]);

        activity()
            ->causedBy(Auth::user())
            ->performedOn($maintenance)
            ->log('Maintenance completé et archive crée : ' . $id);

        $notification = [
            'message' => 'car ajouter on maintenance success.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function maintenancearchive()
    {
        $Marchive = MaintenanceArchive::all();

        // Log archive view access
        // activity()
        //     ->causedBy(Auth::user())
        //     ->log('Accessed maintenance archive');

        return view('admin.gestion.archive.MaintenanceArchive', compact('Marchive'));
    }

    public function Manintern()
    {
        $data = Maintenance::join('drivers', 'maintenance.driver_id', '=', 'drivers.id')
            ->select('maintenance.*', 'drivers.nom as driver_name')
            ->where('maintenance.status', 'inwork')
            ->where('maintenance_type', 'inside')
            ->get();

        // Log retrieval of internal maintenance data
        // activity()
        //     ->causedBy(Auth::user())
        //     ->log('Fetched data for internal maintenance');

        return view('admin.gestion.Manintern', compact('data'));
    }

    public function maintenacegestion($id)
    {
        $data = Maintenance::findOrFail($id);
        $stock = Stock::all();

        // Log maintenance management view access
        // activity()
        //     ->causedBy(Auth::user())
        //     ->withProperties(['maintenance_id' => $id])
        //     ->log('Accessed maintenance management view');

        return view('admin.gestion.Maintenance', compact('data', 'stock'));
    }

    public function addStockToMaintenance(Request $request)
    {
        $request->validate([
            'maintenance_id' => 'required|exists:maintenance,id',
            'stocks' => 'required|array',
            'stocks.*.quantity' => 'required|integer|min:1',
        ]);

        $maintenanceId = $request->input('maintenance_id');
        $totalCost = 0;

        foreach ($request->input('stocks') as $stockId => $stockData) {
            $quantity = $stockData['quantity'];
            $stockItem = Stock::find($stockId);

            if ($stockItem->quantity < $quantity) {
                return back()->withErrors("Insufficient stock for item: " . $stockItem->name);
            }

            $itemCost = $stockItem->price * $quantity;
            $totalCost += $itemCost;

            $stockItem->quantity -= $quantity;
            $stockItem->save();

            // Log stock item addition to maintenance
            activity()
                ->causedBy(Auth::user())
                ->performedOn($stockItem)
                ->withProperties(['maintenance_id' => $maintenanceId, 'quantity' => $quantity])
                ->log('Article stock ajouté à la maintenance : ' . $stockItem->name);

            MaintenanceStock::create([
                'maintenance_id' => $maintenanceId,
                'stock_id' => $stockId,
                'quantity' => $quantity,
                'price' => $stockItem->price,
                'total_cost' => $itemCost,
            ]);
        }

        $maintenance = Maintenance::find($maintenanceId);
        $maintenance->cost = $totalCost;
        $maintenance->save();

        // Log total maintenance cost update
        // activity()
        //     ->causedBy(Auth::user())
        //     ->performedOn($maintenance)
        //     ->log('Updated maintenance total cost');

        return redirect()->back()->with('success', 'Stock added to maintenance successfully!');
    }

    public function nosintern()
    {
        $data = MaintenanceStock::join('maintenance', 'maintenance_stocks.maintenance_id', '=', 'maintenance.id')
            ->join('stock', 'maintenance_stocks.stock_id', '=', 'stock.id')
            ->select('maintenance_stocks.*', 'maintenance.immatriculation', 'stock.name as stock_name', 'stock.category', 'stock.price')
            ->get();

        // Log retrieval of stock in maintenance
        // activity()
        //     ->causedBy(Auth::user()) 
        //     ->log('Fetched stock data for internal maintenance');

        return view('admin.gestion.nosintern', compact('data'));
    }
}
