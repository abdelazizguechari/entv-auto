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
        // Validate the request input
        $request->validate([
            'stocks.*.category' => 'required|string',
            'stocks.*.quantity' => 'required|integer|min:0',
            'stocks.*.price' => 'required|numeric|min:0',
        ]);

        // Iterate over the stocks input and create new Stock entries
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update([
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);

        activity()
            ->causedBy(auth()->user())
            ->performedOn($stock)
            ->log('Stock mis à jour: ' . $stock->category . ', Quantity: ' . $stock->quantity);

        $notification = [
            'message' => 'Stock mis à jour avec succès.',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.stock')->with($notification);
    }



    public function delete($id) {
        $stock = Stock::findOrFail($id);

        activity()
            ->causedBy(auth()->user())
            ->performedOn($stock)
            ->log('Article supprimé: ' . $stock->category);

        $stock->delete();

        $notification = [
            'message' => 'Element supprimé avec succes.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        return view('admin.gestion.stock.editstock', compact('stock'));
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
        
        // Add headers to the CSV
        fputcsv($handle, ['ID', 'Name', 'Category', 'Quantity', 'Price', 'Total Price', 'Description', 'Created At', 'Updated At']);
        
        // Add data to the CSV
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
    
    // Show import form
    public function showImportForm()
    {
        return view('admin.gestion.stock.impoststock'); // Create this view for the import form
    }

    // Import stock data from Excel (CSV)
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('file');
        $handle = fopen($file, 'r');
        
        // Skip the header row
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
                ]
            );
        }
        
        fclose($handle);
        
        return redirect()->route('import.stock')->with('success', 'Données importées avec succès');
    }
}