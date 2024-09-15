<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
        'name' => $request->name,
        'group_name' => $request->group_name,
    ]);

    activity()
        ->causedBy(auth()->user())
        ->performedOn($permission)
        ->log('New permission created: ' . $permission->name);

    $notification = [
        'message' => 'Permission created successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.permission')->with($notification);
}


public function editpermission($id) {

    $edit = Permission::findOrFail($id);
    return view('admin.role.editpermission',compact('edit'));
}


public function updatepermission(Request $request) {
    $per_id = $request->id;
    $permission = Permission::findOrFail($per_id);

    $permission->update([
        'name' => $request->name,
        'group_name' => $request->group_name,
    ]);

    activity()
        ->causedBy(auth()->user())
        ->performedOn($permission)
        ->log('Permission updated: ' . $permission->name);

    $notification = [
        'message' => 'Permission updated successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.permission')->with($notification);
}


public function delatepermission($id) {
    $permission = Permission::findOrFail($id);

    if ($permission) {
        $permissionName = $permission->name;
        $permission->delete();

        activity()
            ->causedBy(auth()->user())
            ->performedOn($permission)
            ->log('Permission deleted: ' . $permissionName);

        $notification = [
            'message' => 'Permission deleted successfully.',
            'alert-type' => 'success'
        ];
    } else {
        $notification = [
            'message' => 'Permission not found.',
            'alert-type' => 'error'
        ];
    }

    return redirect()->back()->with($notification);
}

public function allrole() {
    $role = Role::all();
    return view('admin.role.allrole',compact('role'));
 }


public function addrole () {
    return view ('admin.role.addrole');
}

public function storerole(Request $request) {
    $role = Role::create([
        'name' => $request->name,
    ]);

    activity()
        ->causedBy(auth()->user())
        ->performedOn($role)
        ->log('New role created: ' . $role->name);

    $notification = [
        'message' => 'Role created successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.role')->with($notification);
}


public function editrole($id) {

    $edit = Role::findOrFail($id);
    return view('admin.role.editrole',compact('edit'));
}


public function updaterole(Request $request) {
    $per_id = $request->id;
    $role = Role::findOrFail($per_id);

    $role->update([
        'name' => $request->name,
    ]);

    activity()
        ->causedBy(auth()->user())
        ->performedOn($role)
        ->log('Role updated: ' . $role->name);

    $notification = [
        'message' => 'Role updated successfully.',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.role')->with($notification);
}


public function delaterole($id) {
    $role = Role::findOrFail($id);
    if (!is_null($role)) {
        $roleName = $role->name;
        $role->delete();
        
        activity()
            ->causedBy(auth()->user())
            ->performedOn($role)
            ->log('Role deleted: ' . $roleName);
    }

    $notification = [
        'message' => 'Role deleted successfully.',
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

        $roleId = $request->role_id;
        $permissions = $request->permissions ?? [];

        if (empty($permissions)) {
            $notification = [
                'message' => 'No permissions selected.',
                'alert-type' => 'warning'
            ];
            return redirect()->back()->with($notification);
        }

        $role = Role::findOrFail($roleId);
        $roleName = $role->name;

        $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
    
        $data = [];
        foreach ($permissions as $permissionId) {
            $data[] = [
                'role_id' => $roleId,
                'permission_id' => $permissionId
            ];
        }

        DB::table('role_has_permissions')->insert($data);

        activity()
            ->causedBy(auth()->user())
            ->log('Assigned permissions to role: ' . $roleName . '. Permissions: ' . implode(', ', $permissionNames));

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
    

    public function adminroleupdate(Request $request, $id) {
        $role = Role::findOrFail($id);
        $permissions = $request->permissions;
    
        if (!empty($permissions)) {
            $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
            $role->syncPermissions($permissionNames);
        } else {
            $role->syncPermissions([]);
        }
    
        activity()
            ->causedBy(auth()->user())
            ->log('Updated permissions for role: ' . $role->name . '. Permissions: ' . implode(', ', $permissionNames));
    
        $notification = [
            'message' => 'Role permissions updated successfully.',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('all.roles.permission')->with($notification);
    }
    

    public function admindeleterole($id) {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
            
            activity()
                ->causedBy(auth()->user())
                ->log('Deleted role: ' . $role->name);
        }
    
        $notification = [
            'message' => 'Role deleted successfully.',
            'alert-type' => 'success'
        ];
    
        return redirect()->back()->with($notification);
    }    
}