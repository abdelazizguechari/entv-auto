<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class Admincontroller extends Controller
{

    
public function AdminDashboard() {
    return view ('admin.index');

}

public function caladner() {
    return view ('admin.webapp.calander');

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

    
    $data->firstname = $request->firstname;
    $data->lastname = $request->lastname;
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


public function passwordupdate(Request $request)
{
    // Validate the request data
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed|min:6',
    ]);

    // Check if the old password is correct
    if (!Hash::check($request->old_password, auth()->user()->password)) {
        $notification = [
            'message' => 'Old password does not match.',
            'alert-type' => 'error'
        ];
        return back()->with($notification);
    }

    // Update the password in the database
    User::whereId(auth()->user()->id)->update([
        'password' => Hash::make($request->new_password)
    ]);

    // Return with success notification
    $notification = [
        'message' => 'Password changed successfully.',
        'alert-type' => 'success'
    ];
    return back()->with($notification);
}

public function changpassword () {

    $id = Auth::user()->id ;
    $profiledata = User::find($id);
    return view ('admin.changepassword',compact('profiledata'));
}



public function draiveradd() {

    return view('admin.draiveradd');
}

public function faq() {
    return view('admin.faq');
}

public function adminsigne() {

    return view('admin.signe');
}


public function usersigne(Request $request) {
   
    
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'willaya' => 'required|string|max:255',
            'mat' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'birthday' => 'required|date', 
        ]);

       

        $user = User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'willaya' => $request->input('willaya'),
            'mat' => $request->input('mat'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),  
            'birthday' => $request->input('birthday'),
        ]);

        Auth::login($user);

        return redirect()->route('admin.login');
    }

 

public function Adminlogout(Request $request): RedirectResponse
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/admin/login');
}
};

