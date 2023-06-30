<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CuentasRequest;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Gate;

class CuentasController extends Controller
{
    public function autenticar(Request $request)
    {
        $user = $request->user;
        $password = $request->password;
        
        if (Auth::attempt(['user' => $user, 'password' => $password])) {
            return redirect()->route('index.welcome');
        }

        return back()->withErrors([
            'user' => 'Credenciales Incorrectas',
        ])->onlyInput('user');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index.welcome');
    }

    public function destroy(Cuenta $cuenta){
        if(Gate::denies('admin-login')){
            return redirect()->route('index.welcome');
        }
        $cuenta->delete();
        return redirect()->route('admin.artistaslista');
    }

}