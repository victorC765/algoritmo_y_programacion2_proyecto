<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index(){
        $data=DB::select("SELECT * FROM `evaluaciones` WHERE 1");
        return view("layout")->with("datos",$data);}

    public function create(Request $request){
         try {
            $sql=DB::insert(" INSERT INTO `evaluaciones` ( `idevaluaciones`,`tema`, `tipo_evaluacion`, `ponderacion`, `fecha`, `profesores_idprofesores`) values(?,?,?,?,?,?)",
            [
              $request->idevaluaciones,
              $request->tema,
              $request->tipo_evaluacion,
              $request->ponderacion,
              $request->fecha,
              1,
            ]);
         }catch(\Throwable $th){
            $sql = 0;
         }
          if($sql == true){
            return back()->with("añadido","evaluación añadida correctamente");
          }else{
            return back()->with("error","Error al añadir la evaluación");
          }
        
        ;}
        public function update(Request $request)
        {
            try {
                $sql = DB::update("UPDATE `evaluaciones` SET `tema`=?,`tipo_evaluacion`=?,`ponderacion`=?,`fecha`=?,`profesores_idprofesores`=? WHERE `idevaluaciones`=?", [
                   
                    $request->tema,
                    $request->tipo_evaluacion,
                    $request->ponderacion,
                    $request->fecha,
                    1,
                    $request->idevaluaciones,
                ]);
        
                if ($sql == true) {
                    return back()->with("añadido", "Evaluación modificada correctamente");
                } else {
                    return back()->with("error", "Error al modificar la evaluación");
                }
            } catch (\Throwable $th) {
                return back()->with("error", "Error al modificar la evaluación: ");
            }
        }
        public function delete($idevaluaciones){
            try {
                $sql = DB::delete("DELETE FROM `evaluaciones` WHERE `idevaluaciones`=?", [$idevaluaciones]);
                if ($sql == true) {
                    return back()->with("añadido", "Evaluación eliminada correctamente");
                } else {
                    return back()->with("error", "Error al eliminar la evaluación");
                }
            } catch (\Throwable $th) {
                return back()->with("error", "Error al eliminar la evaluación: ");
            }
        }
        
}
