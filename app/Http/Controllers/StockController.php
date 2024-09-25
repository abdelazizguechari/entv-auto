<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Exports\StockExport;
use Maatwebsite\Excel\Facades\Excel;



class StockController extends Controller
{



    public function addstock(){
        return view('admin.gestion.stock.addstock');
    }


    public function store(Request $request)
    {
    
        $request->validate([
            'stocks.*.category' => 'required|string',
            'stocks.*.quantity' => 'required|integer|min:0',
            'stocks.*.price' => 'required|numeric|min:0',
        ]);

      
        foreach ($request->input('stocks') as $stockData) {
            $stock = Stock::create([
                'category' => $stockData['category'], 
                'quantity' => $stockData['quantity'],
                'price' => $stockData['price'],
            ]);

            activity()
                ->causedBy(auth()->user())
                ->performedOn($stock)
                ->log('Stock ajouté: ' . $stock->category . ', Quantity: ' . $stock->quantity);
        }

        $notification = [
            'message' => 'Stock crée avec succes.',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.stock')->with($notification);
    }


    public function allstock(){

        $stock = Stock::all();
        return view('admin.gestion.stock.allstock',compact('stock'));
    }


    public function delete($id) {
        $stock = Stock::findOrFail($id);

        activity()
            ->causedBy(auth()->user())
            ->performedOn($stock)
            ->log('Stock supprimé: ' . $stock->category);

        $stock->delete();

        $notification = [
            'message' => 'Element supprimé avec succes.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function impoststock(){
        return view('admin.gestion.stock.impoststock');
    }

   

    public function exportExcel()
    {
        $stocks = Stock::all();
        
        $csvFileName = 'stock_export_' . date('Ymd') . '.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        );
        
        $handle = fopen('php://output', 'w');
        
 
        fputcsv($handle, ['ID', 'Name', 'Category', 'Quantity', 'Price', 'Total Price', 'Description', 'Created At', 'Updated At']);
        
      
        foreach ($stocks as $stock) {
            fputcsv($handle, [
                $stock->id,
                $stock->name,
                $stock->category,
                $stock->quantity,
                $stock->price,
                $stock->prix_total,
                $stock->description,
                $stock->created_at,
                $stock->updated_at,
            ]);
        }
        
        fclose($handle);
        
        return response()->stream(
            function() {},
            200,
            $headers
        );
    }
    

    public function showImportForm()
    {
        return view('admin.gestion.stock.impoststock'); 
    }


    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('file');
        $handle = fopen($file, 'r');
        
     
        fgetcsv($handle);
        
        while (($row = fgetcsv($handle)) !== false) {
            Stock::updateOrCreate(
                ['id' => $row[0]], 
                [
                    'name' => $row[1],
                    'category' => $row[2],
                    'quantity' => $row[3],
                    'price' => $row[4],
                    'description' => $row[6],
                    // Note: `prix_total` is a virtual column, so it will be computed based on `quantity` and `price`
                ]
            );
        }
        
        fclose($handle);
        
        return redirect()->route('import.stock')->with('success', 'Données importées avec succès');
    }
}