<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller
{
    public function storage(Request $request)
    {
        $imagen = new Imagen();
        $file = $request->file('archivo');
    
        $fileName = $file->getClientOriginalName();
        Storage::putFileAs(
          'archivo', $file, $fileName
        );
    
        Storage::setVisibility($fileName, 'public');
    
        $imagen->titulo = 'Hola'; // Hay que vincular a formulario
        $imagen->archivo = $fileName;
        $imagen->baneada = false;
        $imagen->motivo_ban = 'Nada'; // Hay que vincular a formulario
        $imagen->cuenta_user = 'soren123'; // Hay que vincular a formulario
        $imagen->save();
        return redirect()->route('index.welcome'); // Tiene que retornar a vista de perfil 
    }
}
