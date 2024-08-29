<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function index()
    {
        $drivers = Driver::with('car')->get();
        return view('admin.drivers.drivers', compact('drivers'));
    } 
}