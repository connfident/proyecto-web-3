<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagenesRequest;
use App\Http\Requests\EditFotoRequest;
use App\Http\Requests\BanFotoRequest;
use App\Models\Imagen;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\NullableType;
use Symfony\Component\Routing\Route;

class ImagenesController extends Controller
{
  public function storage(ImagenesRequest $request, Cuenta $cuenta)
  {   
      $imagen = new Imagen();
      $file = $request->file('archivo');
  
      $fileName = $file->getClientOriginalName();
      Storage::putFileAs('archivo', $file, $fileName);
  
      Storage::setVisibility($fileName, 'public');
  
      $imagen->titulo = $request->input('titulo');
      $imagen->archivo = $fileName;
      $imagen->baneada = false;
      $imagen->motivo_ban = null; 
      $imagen->cuenta_user = Auth::user()->user;
      $imagen->save();
      
      $cuenta = Auth::user()->user;
      
      return redirect()->route('artistas.index', compact('cuenta')); 

  }

    public function destroy(Imagen $imagen, Cuenta $cuenta, Request $request)
    {
      $cuenta->user = $imagen->cuenta_user;
      $imagen->delete();
      return redirect()->route('artistas.index', compact('cuenta'));
      
    }

    public function update(EditFotoRequest $request, Imagen $imagen){

      $cuenta = Auth::user()->user;
      $imagen->titulo = $request->titulo;
      $imagen->save();
      return redirect()->route('artistas.index', compact('cuenta'));

    }

    public function banear(BanFotoRequest $request, Imagen $imagen, Cuenta $cuenta){

      if(Gate::denies('admin-login')){
        return redirect()->route('index.welcome');
      }

      $cuenta->user = $imagen->cuenta_user;
      $imagen->baneada = 1;
      $imagen->motivo_ban = $request->motivo_ban;
      $imagen->save();

      return redirect()->route('artistas.index', compact('cuenta'));

    }

    public function desbanear(Request $request, Imagen $imagen, Cuenta $cuenta){

      if(Gate::denies('admin-login')){
        return redirect()->route('index.welcome');
      }

      $cuenta->user = $imagen->cuenta_user;
      $imagen->baneada = 0;
      $imagen->motivo_ban = null;
      $imagen->save();

      return redirect()->route('artistas.indexban', compact('cuenta'));

    }


}
