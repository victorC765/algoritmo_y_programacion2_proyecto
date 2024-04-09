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
  <header>
    <button class="btn btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"> ≡ </button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Lista de Navegación</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <a href="./evaluacion"><button class="btn btn-success"> <img src="{{ asset('img/evaluation_8921149.png') }}" alt="icono de evaluacion" width="135" height="135" /></button></a>
  </div>
</div>
  </header>
  <div class="cont">
  <h1 class="n"><img width="80" height="80" src="https://img.icons8.com/plasticine/100/graduation-cap.png" alt="graduation-cap"/>Estudiantes</h1>
    <div class="box">
      <div class="sel">
      <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
          <option selected>Selecione una sección</option>
          <option value="1">Sección A</option>
          <option value="2">Sección B</option>
          <option value="3">Sección C</option>
        </select>
        <label for="floatingSelect">Secciones</label>
      </div>
      <button class="btn btn-danger">🔍</button>
    </div>
    <table class="table  table-hover" style="margin: 0%">
        <thead>
          <tr class="table-primary">
            <th scope="col" class="p-3">#</th>
            <th scope="col" class="p-3">Nombre</th>
            <th scope="col" class="p-3">Apellido</th>
            <th scope="col" class="p-3">Cedula</th>
            <th scope="col" class="p-3">Calificaciones</th>
           
          </tr>
        </thead>
        @foreach ($est as $estudiante)
        <tbody>
           
            <tr>
                <td>{{ $estudiante->idestudiantes }}</td>
                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->apellido }}</td>
                <td>{{ $estudiante->cedula }}</td>
                <td class="d-flex align-items-center">
                  
               
                <form action="/lista" method="GET"  id="miFormulario">
                  <div>
                      <input type="hidden" value="{{ $estudiante->idestudiantes }}" name="idestudiantes">
                  </div>
                  <button type="submit" class="btn btn-warning m-1"><img width="40" height="40" src="https://img.icons8.com/plasticine/100/recurring-appointment.png" alt="recurring-appointment"/></button>
                </form>
               
                  <button type="submit" class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $estudiante->idestudiantes }}">
                  <img width="40" height="40" src="https://img.icons8.com/dusk/64/visible--v1.png" alt="visible--v1"/>
                </button>
             
             
                <div class="modal fade" id="exampleModal{{ $estudiante->idestudiantes }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" ><span>Estudiantes: {{$estudiante->nombre}} {{$estudiante->apellido}}</span><br> <span>Cedula: {{$estudiante->cedula}}</span></h1> 
                        <button type="button " class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                     
                      <div class="modal-body">
                        <div class="eva">
                        <h3 class="mdt"><img width="60" height="60" src="https://img.icons8.com/dusk/64/exam.png" alt="exam"/>Evaluaciones</h3>
                     
                              <div class="table-container">
                                <table class="table">
                                  <thead>
                                    <tr>
                                    <th >Acción</th>
                                    <th>evaluaciones</th>
                                    <th>tipo de evaluación</th>
                                  </tr>
                                 
                                  </thead>
                                 
                                  <tbody>
                                    @foreach ($eval as $item)
                                <tr>
                                   <td><button type="button" class="btn btn-success" onclick="abrirSegundaModal('#modalPequeña{{$item->idevaluaciones}}{{ $estudiante->idestudiantes }}')">
                                    <img width="40" height="40" src="https://img.icons8.com/dotty/80/add.png" alt="add"/>
                                  </button>
                                  <div class="modal fade"  id="modalPequeña{{$item->idevaluaciones}}{{ $estudiante->idestudiantes }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ModalPequeñaLabel">

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
                                
                                <td>{{$item->tema}}</td>
                                  <td>{{$item->tipo_evaluacion}}</td>
                                    </tr>
                                    @endforeach
                                  
                            </tbody>
                            </table>
                            <table class="table">
                              <tr>
                                 <th >Notas</th>
                              </tr>
                             
                                @foreach ($cali as $xd)
                                <tr>
                                       <td > {{ $xd->calificacion }}</td>
                                  </tr>
                                @endforeach
                             
                             </table>
                            
                              </div>
                          
                    
                      </div>
                    </div>
                  </div>
             
                </div>
              </div>
              
              </td>
          
              </tr>
              @endforeach
              
                 
           
            </tbody>
           
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