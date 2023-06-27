<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ArtistasController extends Controller
{
    public function index(Cuenta $cuenta)
    {
        if(Gate::denies('cuenta-login')){
            return redirect()->route('index.welcome');
        }
        return view('artistas.index', compact('cuenta'));
    }
}
