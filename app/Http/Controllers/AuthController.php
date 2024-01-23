<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direcciones;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros',
        ]);
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();
        
        $direccion = Direcciones::create([
            'pais' => $request->pais,
            'ciudad' => $request->ciudad,
            'calle' => $request->calle,
            'numero' => $request->numero,
            'cp' => $request->cp,
            'id_usuario' => $user->id,
            'provincia' => $request->provincia
        ]);

        $direccion->save();

        auth()->login($user);

        return redirect()->route('home');
    }
}
