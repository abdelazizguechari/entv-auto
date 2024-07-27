<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;

class Admincontroller extends Controller
{

    
public function AdminDashboard() {
    return view ('admin.index');

}



public function Addcar() {
    return view ('admin.adding.car_add');

}

public function Addmission() {
    return view ('admin.adding.mission_add');

}


public function Adminlogin() {
    return view ('admin.admin_login');

}

public function Adminprofile() {


    $id = Auth::user()->id ;
    $profiledata = User::find($id);
    return view ('admin.admin_profile' ,compact('profiledata'));
}


public function updateprofil(Request $request) {
    $id = Auth::user()->id;
    $data = User::find($id);

    
    $data->name = $request->username;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;

   
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uplode/admin_images'), $filename);
        $data->photo = $filename;
    }

    $data->save();
    $notification = array ('message' => 'profile update' ,
    'alert-type' => 'succse' 
    
    ) ;

    return redirect()->back()->with('success', 'Profile updated successfully');
}


public function changpassword () {
    return view ('admin.changepassword');
}



public function draiveradd() {

    return view('admin.adding.draiver_add');
}


public function adminsigne() {

    return view('admin.signe');
}


// public function adminsingedata(request $request) {

// $request -> validate([

//     'name' => 'string|max(50)|requiard' ,
//     'username' => 'string|max(50)|requiard' ,
//     'phone' =>'string|max(50)|requiard' ,
//     'email' =>'email|max(50)|requiard' ,
//     'address' =>'string|max(50)|requiard' ,
//     'mat' => 'string|max(50)|requiard' ,
//     'password' => 'string|max(50)|requiard' ,

// ]);

// $request = new user


    
// }
 

public function Adminlogout(Request $request): RedirectResponse
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/admin/login');
}
};

