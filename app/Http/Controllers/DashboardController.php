<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mezcal;

class DashboardController extends Controller
{
    public function index()
    {
        $mezcales = Mezcal::all();
        return view('dashboard', compact('mezcales'));
    }
}
