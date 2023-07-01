<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CuentasRequest;
use App\Models\Cuenta;
use App\Models\Imagen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function hub()
    {
        $imagen = Imagen::all();
        $cuenta = Cuenta::all();

        return view('index.welcome', compact(['imagen', 'cuenta']));
    }

    public function search(Request $request)
    {
        $search = $request->search;  
        
        $imagen = Imagen::where(function($query) use ($search){

            $query->where('cuenta_user', 'like', "$search");
        })
        ->orWhereHas('cuenta', function($query) use ($search){
            $query->where('user', 'like', "$search");
        })
        ->get();

        return view('index.welcome', compact('imagen', 'search'));
    }

    public function login()
    {
        
        return view('auth.login');
    }

    public function registrar()
    {
        return view('auth.registrar');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CuentasRequest $request)
    {
        $request->validate([
            'user' => [
                'required',
                Rule::unique('cuentas')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
        ], [
            'user.unique' => 'El nombre de usuario ya está en uso.',
        ]);
    

        $cuenta = new Cuenta();
        $cuenta->user = $request->user;
        $cuenta->nombre = $request->nombre;
        $cuenta->apellido = $request->apellido;
        $cuenta->password = Hash::make($request->password);
        $cuenta->perfil_id = 2;


        $cuenta->save();
        return redirect()->route('index.welcome');

    }
    

    // public function index($cuenta)
    // {
    //     $$cuenta = Cuenta::find($$cuenta);
        
    //     return view('artistas.index',[
    //         'cuenta' => $cuenta,
    //     ]);
    // }
}
