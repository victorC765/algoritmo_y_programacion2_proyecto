<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class listaController extends Controller
{
    public function nomina()
    {
        return view('nomina');
    }
}
