<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

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
    

}
