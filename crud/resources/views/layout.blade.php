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
                    <form action="{{route("crud.create")}}" method="s">
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
        <tbody >
            @foreach ($datos as $item)
            <tr class="p-3 text-center">
                <td scope="row">{{$item->idevaluaciones}}</td>
                <td>{{$item->tema}}</td>
                <td>{{$item->tipo_evaluacion}}</td>
                <td>{{$item->ponderacion}}%</td>
                <td>{{$item->fecha}}</td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EditarModal"  class="btn btn-warning btn"><img width="27" height="30" src="https://img.icons8.com/dusk/64/edit--v1.png" alt="edit--v1"/></a>
                    <a href="" class="btn btn-danger btn"><img width="27" height="30" src="https://img.icons8.com/dusk/64/delete--v1.png" alt="delete--v1"/></a>
                </td>
            </tr>
            @endforeach
           
              
              <!-- Modal para editar registros-->
              <div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
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
                              <input type="text" class="form-control" name="idevaluaciones" >
                            </div>
                            <div class="mb-3">
                              <label for="temadelaevaluacion" class="form-label">Tema:</label>
                              <input type="text" class="form-control"  name="tema" >
                            </div>
                            <div class="mb-3">
                            <label for="tipodelaevaluacion" class="form-label">Tipo de Evaluacion:</label>
                            <select class="form-select" aria-label="Default select example"  name="tipo_evaluacion">
                                <option selected>elija el tipo de evaluación</option>
                                <option value="examen">examen</option>
                                <option value="taller">taller</option>
                                <option value="exposición">exposición</option>
                                <option value="debate">debate</option>
                              </select>
                            </div>  
                            <div class="mb-3">
                                <label for="ponderaciondeevaluacion" class="form-label">Ponderación:</label>
                                <select class="form-select" aria-label="Default select example"  name="ponderacion">
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
                                    <input type="date" class="form-control"  name="fecha">>    
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
        </tbody>
      </table>
    </div>
      <script>
         $('#EditarModal{{$item->idevaluaciones}}').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract info from data-* attributes
                // Use the ID to fetch data and populate the modal
            });

      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>