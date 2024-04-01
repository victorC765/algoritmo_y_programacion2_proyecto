<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\NominaController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;


Route::get('/', [CrudController::class, 'index'])->name("crud.index");

Route::get('/lista', [NominaController::class, 'index'])->name("nomina.index");

Route::get('/estudiante/{id}/calificaciones', [NominaController::class, 'mostrarCalificaciones']);

Route::post('/añadir_nota',[NominaController::class,'create' ])->name("nomina.create");

//ruta para el insert into
Route::post('/añadir_evaluacion', [CrudController::class, 'create'])->name("crud.create");


Route::post('/modificar_evaluacion', [CrudController::class, 'update'])->name("crud.update");


Route::get("/eliminar_evaluacion_{idevaliaciones}", [CrudController::class, 'delete'])->name("crud.delete");