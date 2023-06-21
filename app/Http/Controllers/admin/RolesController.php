<?php

namespace App\Http\Controllers\admin;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class RolesController extends Controller
{
   
    public function index()
    {
      $roles = Role::all();
      return view('content.Admin.Admin-showrole')->with('roles',$roles);
    }

    public function create()
    {
        return view('content.Admin.Admin-addrole');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255|unique:roles,name',
        ]);

        $role = Role::create([
            'name' => $request->input('nom'),
            'guard_name' => 'web' // Update the guard name as per your configuration
        ]);
    
        // Assign the permissions to the role
        $permissions = $request->input('permissions', []);
        foreach ($permissions as $type => $actions) {
            foreach ($actions as $action => $value) {
                if ($value) {
                    $permissionName = $type . '.' . $action;
                    $permission = Permission::where('name', $permissionName)->first();
                    if ($permission) {
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }
    

        toastr()->success("Ajout de Role ".$request->input('nom')."  avec succes");
        return redirect()->route("admin.roles.index");
    }


    public function show(Role $role)
    {
    }

    public function edit($roleId)
    {
        
    }

    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role->update($validatedData);
        $role->permissions()->sync($request->input('permissions'));

        // Redirect to the show route or return a JSON response
        // Example: return redirect()->route('roles.show', $role->id);
    }

    public function destroy($roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->permissions()->detach();
        $role->delete();
        toastr()->success("le Role ".$role->name." est supprimé avec succes");
        return redirect()->back();
 
    }
}


