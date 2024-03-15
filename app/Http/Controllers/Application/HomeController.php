<?php

namespace App\Http\Controllers\Application;

use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function login () {
        return view('app.auth.login');
    }

    public function register () {
        return view('app.auth.register');
    }

    public function dash () {
        $users = User::with('roles')->get();
        return view('app.dashboard', [
            'users' => $users,
        ]);
    }

    public function registerrequest (Request $request) {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required|regex:/^[A-z\s]+$/',
            'email' => 'required|regex:/^[A-z0-9.$!%]+@[a-z]+.[A-z]{2,}$/|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        
        return redirect()->route('loginpage');
    }

    public function logvalidate (Request $request) {
        // dd($request->all());
        $user = User::where('email', $request->email)->get();
        switch ($request) {
            case ($user !== null && Auth::attempt(['email' => $request->email, 'password' => $request->password])):
                return redirect()->route('dash');
                break;
            
            default:
                throw ValidationException::withMessages(['email' => trans('auth.failed')]);
                break;
        }
    }

    public function profile (Request $request) {
        // dd('found');
        return view('app.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function logoutrequest () {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
