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
        <button class="btn btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
            aria-controls="offcanvasWithBothOptions"> ≡ </button>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Lista de Navegación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <a href="./evaluacion"><button class="btn btn-success"> <img
                            src="{{ asset('img/evaluation_8921149.png') }}" alt="icono de evaluacion" width="135"
                            height="135" /></button></a>
            </div>
        </div>
    </header>
    <div class="cont">
        <h1 class="n"><img width="80" height="80"
                src="https://img.icons8.com/plasticine/100/graduation-cap.png" alt="graduation-cap" />Estudiantes</h1>
        <div class="box">
           
              <form action="{{route('nomina.index')}}" method="GET">
                <div class="sel">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" name="seccion" aria-label="Floating label select example">
                        <option selected>Selecione una sección</option>
                        @foreach ($sel as $se)
                        <option value="{{$se->idsecciones}}">{{$se->nombre_seccion}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Secciones</label>
                </div>
                <button class="btn btn-danger">🔍</button></div>

              </form>

            
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
                            <form action="{{route('nomina.mandar')}}" method="get">
                            <td>{{ $estudiante->idestudiantes }}</td>
                            <td name="nombre">{{ $estudiante->nombre }}</td>
                            <td name="apellido">{{ $estudiante->apellido }}</td>
                            <td name="cedula">{{ $estudiante->cedula }}</td>
                            <td class="d-flex align-items-center">
                               
                                    @csrf
                                    <div>
                                        <input type="hidden" value="{{ $estudiante->idestudiantes }}" name="idestudiantes">
                                        <input type="hidden" value="{{ $estudiante->nombre }}" name="nombre">
                                        <input type="hidden" value="{{ $estudiante->apellido}}" name="apellido">
                                        <input type="hidden" value="{{ $estudiante->cedula}}" name="cedula">
                                        </div>
                               
                                <a href="./nota">
                                <button type="submit" class="btn btn-info m-1">
                                    <img width="40" height="40"
                                        src="https://img.icons8.com/dusk/64/visible--v1.png" alt="visible--v1" />
                                </button>
                          
                            </form>
                            </a>
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
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
