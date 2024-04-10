<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NominaController extends Controller
{
    public function index(Request $request)
    {
        $datan = DB::select("SELECT es.idestudiantes, p.nombre, p.apellido, p.cedula, p.fecha_nacimiento
        FROM estudiantes es 
        JOIN personas p ON p.idpersonas = es.personas_idpersonas WHERE `secciones_idsecciones`=?;",[ $request -> seccion]);
        $datae = DB::select("SELECT * FROM `evaluaciones` WHERE 1");
        $selec = DB::select("SELECT * FROM `secciones` WHERE 1");
        $topCa = DB::select('SELECT p.nombre, p.apellido, p.cedula, es.idestudiantes,ev.idevaluaciones, ev.tema,ev.tipo_evaluacion, n.calificacion, n.idestudiantes_evaluaciones
        FROM estudiantes es
        JOIN personas p ON es.personas_idpersonas = p.idpersonas
        JOIN estudiantes_evaluaciones n ON es.idestudiantes = n.estudiantes_idestudiantes
        JOIN evaluaciones ev ON n.evaluaciones_idevaluaciones = ev.idevaluaciones
        
        WHERE es.idestudiantes = ?
        ORDER BY ev.idevaluaciones ASC', [ $request -> idestudiantes]);
    
        return view("nomina", ['est' => $datan, 'eval' => $datae, 'cali' => $topCa, 'sel' => $selec]);
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
    public function update(Request $request){
      try{
         $sql=DB::update("UPDATE  `estudiantes_evaluaciones` SET  `calificacion`=?  WHERE `idestudiantes_evaluaciones`=?",
         [
           $request->nota,
           
           $request->idestudiantes_evaluaciones
          
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
