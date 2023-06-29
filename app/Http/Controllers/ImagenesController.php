<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagenesRequest;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller
{
  public function storage(ImagenesRequest $request)
  {   
      $imagen = new Imagen();
      $file = $request->file('archivo');
  
      $fileName = $file->getClientOriginalName();
      Storage::putFileAs('archivo', $file, $fileName);
  
      Storage::setVisibility($fileName, 'public');
  
      $imagen->titulo = $request->input('titulo');
      $imagen->archivo = $fileName;
      $imagen->baneada = false;
      $imagen->motivo_ban = "nada"; // Hay que vincular a formulario
      $imagen->cuenta_user = Auth::user()->user;
      $imagen->save();
      
      // return $request -> archivo('archivo')->store('public/images')->redirect()->route('index.welcome');
      return redirect()->route('index.welcome'); // Tiene que retornar a vista de perfil

  }
}
