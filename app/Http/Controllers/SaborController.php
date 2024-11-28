<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mezcal; // Usando el modelo Mezcal en lugar de Sabor

class SaborController extends Controller
{
    public function index()
    {
        $mezcales = Mezcal::all();
        return view('sabores', compact('mezcales'));
    }
}
