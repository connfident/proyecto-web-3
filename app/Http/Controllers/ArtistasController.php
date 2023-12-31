<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Imagen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistasController extends Controller
{
    public function index(Cuenta $cuenta, Imagen $imagen)
    {
        if(Gate::denies('cuenta-login') && Gate::denies('admin-login')){
            return redirect()->route('index.welcome');
        }

        if($cuenta->perfil_id == 1){
            return redirect()->route('index.welcome');
        }
        
        return view('artistas.index', compact(['cuenta', 'imagen']));
    }

    public function indexban(Cuenta $cuenta){

        if((Auth::user()->perfil_id == 2 && Auth::user()->user != $cuenta->user)){
            return redirect()->route('artistas.index', compact('cuenta'));
        }

        return view('artistas.indexban', compact('cuenta'));
    }

    public function destroy(Imagen $imagen){
        $imagen->delete();
        return redirect()->route('artistas.index');
    }

    /* public function MostrarImagenes()
    {
        $user = Auth::user()->user;
        $imagen = $user;
    } */
}
