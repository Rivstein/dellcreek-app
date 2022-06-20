<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Otp;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    /**
     * Get all users page
     */
    public function users()
    {
        $users = User::all();
        return view('admin.user_security.users', compact(
            'users'
        ));
    }

    /**
     * Get create user page
     */
    public function user_create()
    {
        $roles = Role::all();

        return view('admin.user_security.create', compact(
            'roles'
        ));
    }

    /**
     * Get edit user page
     */
    public function user_edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('admin.user_security.edit', compact(
            'user',
            'roles',
        ));
    }

    /**
     * Create user 
     */
    public function create(Request $request)
    {
        // create a one time password and hash it
        $otp = Str::random(10);
        $password = Hash::make($otp);

        // create user
        $this->validator($request,null);
        $data = $request->all();
        $roles = $data['roles'];
        unset($data['roles']);
        $data['created_by'] = auth()->user()->id;
        $data['password'] = $password;

        $user = User::create($data);

        // create otp
        Otp::create([
            'otp' => $otp,
            'user_id' => $user->id
        ]);

        // sync roles
        $user->syncRoles($roles);

        return redirect('users')->with('success-message', 'User ' . $user->name . ' has been created successfully');
    }

    /**
     * Update user
     */
    public function update(Request $request, $id)
    {
        $this->validator($request, $id);
        $data = $request->all();
        $roles = $data['roles'];

        $data = [
            'updated_by' => auth()->user()->id,
        ];
        // update user info
        $user = User::find($id);

        // sync roles
        $user->syncRoles($roles);
        $user->update($data);

        return redirect('users')->with('info-message', $user->name . ' information updated');
    }

    /**
     * Soft delete user
     */
    public function delete($id)
    {
        $user = User::find($id);
        $roles = $user->roles()->get()->toArray();

        // dettach roles
        $user->detachRoles($roles);

        // delete user info
        $user->delete();

        return redirect('users')->with('info-message', $user->name . ' deleted');
    }

    /**
     * Validation form
     */
    private function validator($request, $id)
    {

        if ($request->method() == 'PATCH') {
            $rules = [
                'name' => 'required',
                'phone_number' => ['required', 'unique:users,phone_number,' . $id],
            ];
        } else {
            $rules = [
                'name' => 'required',
                'phone_number' => ['required', 'unique:users'],
                'email' => ['required', 'unique:users']
            ];
        }

        return $request->validate($rules);
    }
}
