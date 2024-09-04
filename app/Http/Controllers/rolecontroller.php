<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class rolecontroller extends Controller
{
 public function allpermission() {
    $permission = Permission::all();
    return view('admin.role.allpermission',compact('permission'));
 }


public function addpermission () {
    return view ('admin.role.addpermission');
}

public function storepermission(Request $request) {
    $permission = Permission::create([
        'name' => $request->name ,
        'group_name' => $request ->group_name,
    ]);

    $notification = [
        'message' => 'permission created successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.permission')->with($notification);
}

public function editpermission($id) {

    $edit = Permission::findOrFail($id);
    return view('admin.role.editpermission',compact('edit'));
}


public function updatepermission (Request $request){

    $per_id = $request->id;

    Permission::findOrFail($per_id)->update([
        'name' => $request->name ,
        'group_name' => $request ->group_name,
    ]);

    $notification = [
        'message' => 'permission update successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.permission')->with($notification);
}

public function delatepermission($id) {

    Permission::findOrFail($id)->delete(); 
    $notification = [
        'message' => 'permission update successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);

}



// role methouds


public function allrole() {
    $role = Role::all();
    return view('admin.role.allrole',compact('role'));
 }


public function addrole () {
    return view ('admin.role.addrole');
}

public function storerole(Request $request) {
    $role = Role::create([
        'name' => $request->name ,
        
    ]);

    $notification = [
        'message' => 'role created successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.role')->with($notification);
}

public function editrole($id) {

    $edit = Role::findOrFail($id);
    return view('admin.role.editrole',compact('edit'));
}


public function updaterole (Request $request){

    $per_id = $request->id;

    Role::findOrFail($per_id)->update([
        'name' => $request->name ,
    
    ]);

    $notification = [
        'message' => 'Role update successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.role')->with($notification);
}

public function delaterole($id) {

    Role::findOrFail($id)->delete(); 
    $notification = [
        'message' => 'role delete successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);

}


    public function addrolespermission() {
        $roles = Role::all();
        $permissions = Permission::all(); 
        $permission_group = User::getPermissionGroup();
        
        return view('admin.role.rolesetup.addrolepermission', compact('roles', 'permission_group'));
    }

    public function rolePermissionStore(Request $request) {
       
        $request->validate([
            'role_id' => 'required|integer',
            'permissions' => 'required|array',
            'permissions.*' => 'integer',
        ]);

        $permissions = $request->permissions ?? []; 

        if (empty($permissions)) {
            
            $notification = [
                'message' => 'No permissions selected.',
                'alert-type' => 'warning'
            ];

            return redirect()->back()->with($notification);
        }

        $data = [];
        foreach ($permissions as $permissionId) {
            $data[] = [
                'role_id' => $request->role_id,
                'permission_id' => $permissionId
            ];
        }

        DB::table('role_has_permissions')->insert($data);

        $notification = [
            'message' => 'Role permissions added successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.roles.permission')->with($notification);
    }



    public function allrolespermission() {

        $roles = Role::all();

        return view('admin.role.rolesetup.allrolespermission', compact('roles'));
     }

     


     public function admineditrole($id) {

        $role = Role::findOrFail($id);
        $permissions = Permission::all(); 
        $permission_group = User::getPermissionGroup();
        
        return view('admin.role.rolesetup.editrolepermission', compact('permission_group', 'permissions','role'));

    }
    

    public function adminroleupdate(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permissions;
    
        if (!empty($permissions)) {
            // Convert permission IDs to names
            $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
            $role->syncPermissions($permissionNames);
        } else {
            // Optional: Clear all permissions if the permissions array is empty
            $role->syncPermissions([]);
        }
    
        $notification = [
            'message' => 'Role permissions updated successfully.',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('all.roles.permission')->with($notification);
    }



    public function admindeleterole($id) {
    $role = Role::findOrFail($id);
if (!is_null($role)) {
    $role ->delete();
}


$notification = [
    'message' => 'Role permissions deleted successfully.',
    'alert-type' => 'success'
];

return redirect()->back()->with($notification);

    }

    
    

}
