<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Muestra el formulario para crear una nueva materia.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Aquí puedes retornar una vista que contenga el formulario para crear una nueva materia.
        return view('materia.create');
    }
}