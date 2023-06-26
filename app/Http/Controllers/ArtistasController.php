<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class ArtistasController extends Controller
{
    public function index(Cuenta $cuenta)
    {
        return view('artistas.index', compact('cuenta'));
    }
}
