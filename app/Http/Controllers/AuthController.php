<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->password === $request->password) {
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            
            return redirect('/productos')->with('success', 'Login exitoso');
        }

        return back()->with('error', 'Credenciales incorrectas');
    }

    public function logout()
    {
        Session::forget('user_id');
        Session::forget('user_name');
        Session::flush();
        
        return redirect('/login')->with('success', 'Sesión cerrada');
    }
}