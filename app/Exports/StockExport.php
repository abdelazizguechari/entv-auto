<?php

namespace App\Exports;



use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;

class StockExport implements FromCollection
{
    public function collection()
    {
        return Stock::all();  // Fetch all users from the database
    }
}
