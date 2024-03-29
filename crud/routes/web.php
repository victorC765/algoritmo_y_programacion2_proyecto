<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CrudController::class, 'index'])->name("crud.index");
//ruta para el insert into
Route::post('/añadir_evaluacion', [CrudController::class, 'create'])->name("crud.create");


Route::post('/modificar_evaluacion', [CrudController::class, 'update'])->name("crud.update");


Route::get("/eliminar_evaluacion_{idevaliaciones}", [CrudController::class, 'delete'])->name("crud.delete");