<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/nomina.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Nomina Estudiantil</title>
</head>
<body>
  <div class="cont">
  <h1 class="n">estudiantes</h1>
    <div class="box">
    <table class="table borderless " style="margin: 0%">
        <thead>
          <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">cedula</th>
            <th scope="col">Accion</th>
           
          </tr>
        </thead>
        @foreach ($est as $estudiante)
        <tbody>
           
            <tr>
                <td>{{ $estudiante->idestudiantes }}</td>
                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->apellido }}</td>
                <td>{{ $estudiante->cedula }}</td>
                <td> <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $estudiante->idestudiantes }}">
                  calificaciones
                </button>
                <div class="modal fade" id="exampleModal{{ $estudiante->idestudiantes }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" >{{$estudiante->nombre}} {{$estudiante->apellido}}</h1> 
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                     
                      <div class="modal-body">
                        <h4>caficaciones</h4>
                     
                              <div >
                                <table class="table">
                                  <thead>
                                    <tr>
                                    <th>evaluaciones</th>
                                    <th>tipo de evaluación</th>
                                    <th>Acción</th>
                                  </tr>
                                  </thead>
                                  @foreach ($eval as $item)
                                  <tbody>
                                <tr>
                                  <td>{{$item->tema}}</td>
                                  <td>{{$item->tipo_evaluacion}}</td>
                                  <td><button type="button" class="btn btn-primary" onclick="abrirSegundaModal('#modalPequeña{{ $estudiante->idestudiantes }}')">
                                    <img width="30" height="30" src="https://img.icons8.com/ios-filled/50/plus.png" alt="plus"/>
                                  </button>
                                  <div class="modal fade"  id="modalPequeña{{ $estudiante->idestudiantes }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ModalPequeñaLabel">

                                    <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                      <div class="fondo-difuminado">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Cargar Nota</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <form action="{{route("nomina.create")}}" method="post">
                              @csrf
                              <div>
                                <input  type="hidden" value="{{$item->idevaluaciones}}" name="idevaluaciones" >
                              </div>
                                  <div class="i">
                                <input  type="hidden" value="{{$estudiante->idestudiantes}}" name="idestudiantes">
                              </div>
                              
                                <div>
                                  <label for="" >nota</label>
                                <input type="number" name="nota" min="0" max="100">
                                <button class="btn btn-info" type="submit">cargar</button>
                                </form>
                              </div>
                            </div>
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
                            
                              </div>
                          
                    
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
             
                </div>
              
              </td>
          
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
        </div>
                <!-- Modal -->
               <script>
              function abrirSegundaModal(idModal) {
  var modalElement = document.querySelector(idModal);
  var modalInstance = new bootstrap.Modal(modalElement);
  modalInstance.show();
} 
               </script>
          
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>