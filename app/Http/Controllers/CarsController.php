<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::with('driver')->get();

        return view('admin.cars.cars', compact('cars'));
    }

    public function create()
    {
        $cars = Car::with('driver')->get();
        return view('admin.missions.create', compact('cars'));
    }
}