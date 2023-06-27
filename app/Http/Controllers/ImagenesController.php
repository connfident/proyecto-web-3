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
    
        $imagen->titulo = 'Hola';
        $imagen->foto = $fileName;
        $imagen->baneada = false;
        $imagen->motivo_ban = 'Nada';
        $imagen->cuenta_user = 'soren123';
        $imagen->save();
    }
}
