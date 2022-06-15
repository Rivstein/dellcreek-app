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
     * Show single role/permission
     */
    public function show($type, $id)
    {
        $model = app("App\Models\\$type");
        $value = $model::find($id);

        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.user_security.'.$type, compact(
            'value',
            'type',
            'roles',
            'permissions'
        ));
    }

    /**
     * Update
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
     * Delete
     */
    public function delete($type, $id)
    {
        $model = app("App\Models\\$type");
        $value = $model::find($id);
        $value->delete();
        return redirect('access_control/manager/'.$type)->with('warning-message',$type.' deleted');
    }
}
