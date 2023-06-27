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
    
        $imagen->titulo = 'Hola'; // Vincular a base de datos
        $imagen->archivo = $fileName;
        $imagen->baneada = false;
        $imagen->motivo_ban = 'Nada'; // Vincular a base de datos
        $imagen->cuenta_user = 'soren123'; // Vincular a base de datos
        $imagen->save();
        return redirect()->route('index.welcome');
    }
}
