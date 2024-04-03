<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <h1>estudiantes</h1>
 
    <table class="table borderless">
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
                  <div class="modal-dialog modal-xl">
                    
                      
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" >{{$estudiante->nombre}} {{$estudiante->apellido}}</h1> 
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                     
                      <div class="modal-body">
                        <h4>caficaciones</h4>
                        @foreach ($eval as $item)
                              <div class="m">
                                <div class="m">
                                {{$item->tema}}
                              </div>
                                <div class="m">
                                {{$item->tipo_evaluacion}}
                              </div>
                              <form action="{{route("nomina.create")}}" method="post">
                              @csrfs
                              <div>
                                <input type="text" value="{{$item->idevaluaciones}}" name="idevaluaciones" >
                              </div>
                                  <div class="i">
                                <input type="text" value="{{$estudiante->idestudiantes}}" name="idestudiantes">
                              </div>
                              
                                <div class="i">
                                  <label for="" >nota</label>
                                <input type="number" name="nota" min="0" max="100">
                                <button class="btn btn-info" type="submit">cargar</button>
                                </form>
                              </div>
                            </div>
                        @endforeach
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
     
                <!-- Modal -->
               
          
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<style>
  .m{
  display: flex;
  margin: 20px;
  }
  .i{
    width: 100%;
  }
</style>
</html>