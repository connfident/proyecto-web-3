<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;

class AdminController extends Controller
{
    public function index(Cuenta $cuenta){

        if(Gate::denies('admin-login')){
            return redirect()->route('index.welcome');
        }

        return view('admin.index', compact('cuenta'));
    }
    
    public function listarArtistas(Cuenta $cuenta){

        if(Gate::denies('admin-login') && (Gate::denies('cuenta-login'))) {
            return redirect()->route('index.welcome');
        }
        
        $cuenta = Cuenta::all();
        return view('admin.artistaslista', compact('cuenta'));
    }

    public function perfiles(Perfil $perfil){

        if(Gate::denies('admin-login')) {
            return redirect()->route('index.welcome');
        }
        
        $perfil = Perfil::all();
        return view('admin.perfiles', compact('perfil'));
    }
    
    public function update(Request $request, Cuenta $cuenta)
    {
        $cuenta->user;
        $cuenta->nombre = $request->nombre; 
        $cuenta->apellido = $request->apellido; 
        $cuenta->save();
        return redirect()->route('admin.artistaslista', compact('cuenta'));
    }
}
