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
        foreach ($request->input('stocks') as $stock) {
            Stock::create([
                'category' => $stock['category'],  // Make sure this matches the validation field name
                'quantity' => $stock['quantity'],
                'price' => $stock['price'],
            ]);
        }
    
        // Set notification message
        $notification = [
            'message' => 'Stock created successfully.',
            'alert-type' => 'success'
        ];
    
        // Redirect back with the notification
        return redirect()->route('all.stock')->with($notification);
    }


    public function allstock(){

        $stock = Stock::all();
        return view('admin.gestion.stock.allstock',compact('stock'));
    }


    public function delete($id) {
        $types = Stock::findOrFail($id)->delete();
        $notification = [
            'message' => 'element deleted successfully.',
            'alert-type' => 'success'
        ];
        
        return redirect()->back()->with($notification);
    }

    public function impoststock(){
        return view('admin.gestion.stock.impoststock');
    }

    public function export() {
        return Excel::download(new StockExport, 'Stock.xlsx');
    }

    
}