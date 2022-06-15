<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class AccessControlController extends Controller
{
    public function index($type)
    {
        if($type == 'role' || $type == 'permission'){
            $model = app("App\Models\\$type");
            $items = $model::all();
        }
        else{
            abort(404);
        }

        return view('admin.user_security.access_control',compact(
            'type',
            'items'
        ));
    }

    /**
     * Store role/permission
     */
    public function store(Request $request, $type)
    {
        $request->validate([
            'name' => 'unique:'.$type.'s'
        ]);

        $model = app("App\Models\\$type");

        if($type == 'role' || $type == 'permission'){
            $model::create($request->all());
        }
        else{
            abort(403);
        }

        return back()->with('success-message', 'New '.$type.' created');
    }

    /**
     * Show role
     */
    public function showRole($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();

        return view('admin.user_security.role', compact(
            'role',
            'permissions'
        ));
    }

    /**
     * Show permission
     */
    public function showPermission($id)
    {
        $permission = Permission::find($id);

        return view('admin.user_security.permission', compact(
            'permission'
        ));
    }

    /**
     * Update role/permission
     */
    public function update(Request $request, $type, $id)
    {
        $request->validate([
            'name' => 'unique:'.$type.'s,name,'.$id
        ]);

        $model = app("App\Models\\$type");
        $value = $model::find($id);
        $value->update($request->all());
        return back()->with('info-message',ucfirst($type).' updated');
    }

    /**
     * Delete role/permission
     */
    public function delete($type, $id)
    {
        $model = app("App\Models\\$type");
        $value = $model::find($id);
        $value->delete();
        return redirect('access_control/manager/'.$type)->with('warning-message',$type.' deleted');
    }

    /**
     * sync a role's permissions
     */
    public function rolePermissions(Request $request, $id)
    {
        $role = Role::find($id);
        $permissions = $request->input('permissions');

        $role->syncPermissions($permissions);

        return back()->with('info-message', 'Permissions updated');
    }

    /**
     * sync a permission's roles
     */
    public function permissionRoles(Request $request, $id)
    {
        $permission = Permission::find($id);
        $roles = $request->input('roles');

        $permission->roles()->sync($roles);

        return back()->with('info-message', 'Roles updated');
    }
}
