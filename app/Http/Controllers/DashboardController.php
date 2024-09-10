<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Carsm;
use App\Models\Department;
use App\Models\ConducteurConger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




class DashboardController extends Controller
{
    public function updatesection() {
        $data = Department::where('id', 2)->first();
        return view ('admin.sections.section',compact('data'));
    }

    public function update(Request $request, $id)
{
    // Find the department by its ID
    $department = Department::findOrFail($id);

    // Validate the incoming request
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'nb_employes' => 'required|integer',
        'responsable' => 'required|string|max:255',
        'localisation' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telephone' => 'required|string|max:15',
    ]);

   
    $department->update($validatedData);

    $notification = [
        'message' => 'section informatin update successfully.',
        'alert-type' => 'success'
    ];

    
    return redirect()->route('admin.dashboard')->with($notification);
}

}
