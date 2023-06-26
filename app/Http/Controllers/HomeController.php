<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CuentasRequest;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Hash;
use Gate;

class HomeController extends Controller
{
    public function hub()
    {
        return view('index.welcome');
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
