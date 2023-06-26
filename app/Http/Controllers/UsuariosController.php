<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    public function autenticar(Request $request)
    {
        $user = $request->user;
        $password = $request->password;
        
        if (Auth::attempt(['user' => $user, 'password' => $password, 'activo' => true])) {
            return redirect()->route('index.welcome');
        }

        return back()->withErrors([
            'user' => 'Credenciales Incorrectas',
        ])->onlyInput('user');
    }

}