<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterContoller extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:6', 'max:128', 'string'],
            'username' => ['required', 'min:6', 'unique:users,username', 'string'],
            'password' => ['min:8', 'required', 'confirmed', 'string'],
            'email' => ['required', 'email', 'string', 'lowercase', 'unique:users,email']
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);
        event(new Registered(user: $user));
        return redirect()->route('login')->with('succes', 'Your account has been created. Enter your credentials to login.');

    }
}
