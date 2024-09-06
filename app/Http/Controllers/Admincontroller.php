<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

    User::whereId(auth()->user()->id)->update([
        'password' => Hash::make($request->new_password)
    ]);


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


public function addadmin() {

    $Role = Role::all();
    return view('admin.role.adminsetup.addadmin',compact('Role')); 
}


public function Ouradmins() {


    
        $alladmin = User::where('role','admin')->
        where('id' ,'!=' ,auth()->id())
        ->get();
    
    
       
    
    
    return view('admin.role.adminsetup.ouradmin',compact('alladmin')); 
}



public function Saveadmin(Request $request) {
   
   
   
    $user = new User();
    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->mat= $request->mat;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->birthday = $request->birthday;
    $user->password = Hash::make( $request->password);
    $user->role = 'admin';
    $user->status = 'active';

  
    if ($request->roles) {
        $role = Role::find($request->roles);
        if ($role) {
            $user->save(); 
            $user->assignRole($role); 
            $notification = [
                'message' => 'Admin created and role assigned successfully.',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Role not found.',
                'alert-type' => 'error'
            ];
        }
    } else {
        $user->save(); 
    }

    return redirect()->route('Our.admins')->with($notification);
}



public function Delateadmin($id) {

    $Delateadmin = User::findOrFail($id)->delete();


    $notification = [
        'message' => 'Admin Deleted .',
        'alert-type' => 'success'
    ];


    return redirect()->back()->with($notification);
}


public function Editadmin($id){

    $user = User::findOrFail($id);
    $Role = Role::all();

    return view('admin.role.adminsetup.Editadmin',compact('user','Role'));

}

public function Updateadmin(Request $request ,$id){

    $user = User::findOrFail($id);
    $user->update([


        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'mat'=> $request->mat,
        'email' => $request->email,
        'phone' => $request->phone,
    ]);

    $user->roles()->detach();

    if ($request->roles) {
        $role = Role::find($request->roles);
        if ($role) {
            $user->save(); 
            $user->assignRole($role); 
            $notification = [
                'message' => 'Admin created and role assigned successfully.',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Role not found.',
                'alert-type' => 'error'
            ];
        }
    }

    $notification = [
        'message' => 'Admin inforamtion update',
        'alert-type' => 'success'
    ];


    return redirect()->route('Our.admins')->with($notification);

}


};

