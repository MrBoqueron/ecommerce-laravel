<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Direcciones;

class PerfilController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $direcciones = Direcciones::where('id_usuario', auth()->user()->id)->get();

        return view('perfil.index', compact('user', 'direcciones'));
    }
}
