<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NominaController extends Controller
{
    public function index()
    {
        $datan = DB::select("SELECT es.idestudiantes, p.nombre, p.apellido, p.cedula, p.fecha_nacimiento
        FROM estudiantes es 
        JOIN personas p ON p.idpersonas = es.personas_idpersonas;");
        $datae = DB::select("SELECT * FROM `evaluaciones` WHERE 1");
        return view("nomina", ['est' => $datan, 'eval' => $datae]);
    }

    public function mostrarCalificaciones($id)
    {
        $topCalificaciones = DB::table('estudiantes_evaluaciones')
            ->select('estudiantes_idestudiantes', DB::raw('MAX(calificacion) as max_calificacion'))
            ->where('estudiantes_idestudiantes', $id)
            ->groupBy('estudiantes_idestudiantes')
            ->get();
    
        return view('nomina')->with('calificaciones', $topCalificaciones);
    }

    public function create(Request $request){
        try{
           $sql=DB::insert("INSERT INTO `estudiantes_evaluaciones`( `estudiantes_idestudiantes`, `evaluaciones_idevaluaciones`, `calificacion`)  values(?,?,?)",
           [
             $request->idestudiantes,
             $request->idevaluaciones,
             $request->nota,
            
           ]);
        }catch(\Throwable $th){
            $sql = 0;
         }
          if($sql == true){
            return back()->with("añadido","evaluación añadida correctamente");
          }else{
            return back()->with("error","Error al añadir la evaluación");
          }
    }
}
