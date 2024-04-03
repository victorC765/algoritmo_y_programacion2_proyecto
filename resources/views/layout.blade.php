<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <h1  class="text-center p-3">Carga de Evaluaciones</h1>
    @if (session("añadido"))
    <div class="alert alert-success">{{ session("añadido") }}</div>
    @endif
    @if (session("error"))
    <div class="alert alert-danger">{{ session("error") }}</div>
    @endif

    <script>
      let res=function()
      {
        let nolsa=confirm("¿esta seguro de eliminar esta evaluación?");

        return nolsa;
      }
    </script>
    <div class="p-5 table-responsive">
        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#AñadirModal">Añadir Nueva Evaluación</button>

        <div class="modal fade" id="AñadirModal" tabindex="-1" aria-labelledby="AñadirModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="AñadirModalLabel">Añadir Evaluaciones</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("crud.create")}}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="temadelaevaluacion" class="form-label">Tema:</label>
                          <input type="text" class="form-control" name="tema" id="tema">
                        </div>
                        <div class="mb-3">
                        <label for="tipodelaevaluacion" class="form-label">Tipo de Evaluacion:</label>
                        <select class="form-select" aria-label="Default select example" name="tipo_evaluacion">
                            <option selected>elija el tipo de evaluación</option>
                            <option value="examen">examen</option>
                            <option value="taller">taller</option>
                            <option value="exposición">exposición</option>
                            <option value="debate">debate</option>
                          </select>
                        </div>  
                        <div class="mb-3">
                            <label for="ponderaciondeevaluacion" class="form-label">Ponderación:</label>
                            <select class="form-select" aria-label="Default select example" name="ponderacion">
                                <option selected>elija la ponderación de la evaluación</option>
                                <option value="5">5%</option>
                                <option value="10">10%</option>
                                <option value="15">15%</option>
                                <option value="20">20%</option>
                                <option value="25">25%</option>
                              </select>
                            </div> 
                            <div class="mb-3">
                                
                                <label for="fechadelaevaluacion" class="form-label">Fecha:</label>
                                <input type="date" class="form-control" name="fecha" id="fecha">    
                            </div> 
                       
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                              </div>
                      </form>
                </div>
               
              </div>
            </div>
          </div>
    <table class="table table-striped table-hover table-bordered">
        <thead >
          <tr class="text-center">
            <div >
            <th class="bg-success p-3 text-white" scope="col">ID</th>
            <th class="bg-success p-3 text-white"scope="col">tema</th>
            <th class="bg-success p-3 text-white"scope="col">tipo de evaluacion</th>
            <th class="bg-success p-3 text-white"scope="col">ponderación</th>
            <th class="bg-success p-3 text-white"scope="col">fecha</th>
            <th class="bg-success p-3 text-white"scope="col">Acción</th>
        </div>
          </tr>
        </thead>
        @foreach ($datos as $item)
        <tbody >
            <tr class="p-3">
                <td scope="row">{{$item->idevaluaciones}}</td>
                <td >{{$item->tema}}</td>
                <td>{{$item->tipo_evaluacion}}</td>
                <td>{{$item->ponderacion}}%</td>
                <td>{{$item->fecha}}</td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EditarModal{{$item->idevaluaciones}}"  class="btn btn-warning btn"><img width="27" height="30" src="https://img.icons8.com/dusk/64/edit--v1.png" alt="edit--v1"/></a>
                    <a href="{{route("crud.delete",$item->idevaluaciones)}}" onClick="return res()" class="btn btn-danger btn"><img width="27" height="30" src="https://img.icons8.com/dusk/64/delete--v1.png" alt="delete--v1"/></a>
                    <div class="modal fade" id="EditarModal{{$item->idevaluaciones}}" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="EditarModalLabel">Editar Evaluaciones</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form action="{{route("crud.update")}}" method="post">
                                  @csrf
                                  <div class="mb-3">
                                    <label for="iddelaevaluacion" class="form-label">ID:</label>
                                    <input type="text" class="form-control" name="idevaluaciones" value="{{$item->idevaluaciones}}" >
                                  </div>
                                  <div class="mb-3">
                                    <label for="temadelaevaluacion" class="form-label">Tema:</label>
                                    <input type="text" class="form-control"  name="tema" value="{{$item->tema}}" >
                                  </div>
                                  <div class="mb-3">
                                  <label for="tipodelaevaluacion" class="form-label">Tipo de Evaluacion:</label>
                                  <select class="form-select" aria-label="Default select example"  name="tipo_evaluacion" value="{{$item->tipo_evaluacion}}">
                                      <option selected>elija el tipo de evaluación</option>
                                      <option value="examen">examen</option>
                                      <option value="taller">taller</option>
                                      <option value="exposición">exposición</option>
                                      <option value="debate">debate</option>
                                    </select>
                                  </div>  
                                  <div class="mb-3">
                                      <label for="ponderaciondeevaluacion" class="form-label">Ponderación:</label>
                                      <select class="form-select" aria-label="Default select example"  name="ponderacion" value="{{$item->ponderacion}}">
                                          <option selected>elija la ponderación de la evaluación</option>
                                          <option value="5">5%</option>
                                          <option value="10">10%</option>
                                          <option value="15">15%</option>
                                          <option value="20">20%</option>
                                          <option value="25">25%</option>
                                        </select>
                                      </div> 
                                      <div class="mb-3">
                                          
                                          <label for="fechadelaevaluacion" class="form-label">Fecha:</label>
                                          <input type="date" class="form-control"  name="fecha" value="{{$item->fecha}}">    
                                      </div> 
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                                          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                  
                                </form>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
            
          
       
        
           
              
              <!-- Modal para editar registros-->
             
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>