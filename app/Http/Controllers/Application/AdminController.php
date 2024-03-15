<?php

namespace App\Http\Controllers\Application;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AdminController extends Controller
{
    public function index ($id) {
        $user = User::with('roles')->find($id);
        $roles = Role::get();

        // dd(in_array(3, $user->roles->pluck('id')->toArray()));
        // dd($user->roles->pluck('id')->toArray());
        // in_array($role->id, $user->roles->pluck('id'))
        return view('app.profile.editUser', [
            'id' => $id, 
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function edit (Request $request) {
        // dd($request->all());
        User::find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('dash');
    }

    public function roles (Request $request) {
        // dd($request->role);
        
            // $role_name = Role::find($role)->name;
        // User::find($request->user)->roles()->sync(json_encode($request->role));
            User::find($request->user)->roles()->sync($request->input('role'));
        return redirect()->route('dash');
    }

    public function reset ($id) {
        // dd($id);
        User::find($id)->update([
            'password' => '123456',
        ]);
        return redirect()->route('dash');
    }

    public function delete ($id) {
        // dd($id);
        User::find($id)->delete();
        return redirect()->route('dash');
    }
}
