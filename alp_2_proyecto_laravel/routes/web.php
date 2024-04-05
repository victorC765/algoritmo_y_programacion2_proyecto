<?php
use App\Http\Controllers\CrudController;
use App\Http\Controllers\NominaController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/cierre1',function(){
    return view('cierre');
});
Route::get('/menu',function(){
    return view('menu');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/evaluacion', [CrudController::class, 'index'])->name("crud.index");

Route::get('/lista', [NominaController::class, 'index'])->name("nomina.index");

Route::get('/estudiante/{id}/calificaciones', [NominaController::class, 'mostrarCalificaciones']);

Route::post('/añadir_nota',[NominaController::class,'create' ])->name("nomina.create");

//ruta para el insert into
Route::post('/añadir_evaluacion', [CrudController::class, 'create'])->name("crud.create");


Route::post('/modificar_evaluacion', [CrudController::class, 'update'])->name("crud.update");


Route::get("/eliminar_evaluacion_{idevaliaciones}", [CrudController::class, 'delete'])->name("crud.delete");