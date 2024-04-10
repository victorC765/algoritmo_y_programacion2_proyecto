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
            <div class="sel">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Selecione una sección</option>
                        @foreach ($sel as $se)
                        <option value="{{$se->nombre_seccion}}">{{$se->nombre_seccion}}</option>
                        @endforeach
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


                                <form action="/lista" method="GET" id="miFormulario">
                                    <div>
                                        <input type="hidden" value="{{ $estudiante->idestudiantes }}"
                                            name="idestudiantes">
                                   

                                <button type="submit" class="btn btn-info m-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $estudiante->idestudiantes }}">
                                    <img width="40" height="40"
                                        src="https://img.icons8.com/dusk/64/visible--v1.png" alt="visible--v1" />
                                </button>
                              </div>
                            </form>


                                <div class="modal fade" id="exampleModal{{ $estudiante->idestudiantes }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"><span>Estudiantes:
                                                        {{ $estudiante->nombre }}
                                                        {{ $estudiante->apellido }}</span><br> <span>Cedula:
                                                        {{ $estudiante->cedula }}</span></h1>
                                                <button type="button " class="btn-close btn-danger"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="eva">
                                                    <h3 class="mdt"><img width="60" height="60"
                                                            src="https://img.icons8.com/dusk/64/exam.png"
                                                            alt="exam" />Evaluaciones</h3>


                                                    <button type="button" class="btn btn-success"
                                                        onclick="abrirSegundaModal('#modalPequeña{{ $estudiante->idestudiantes }}')">
                                                        <img width="50" height="50"
                                                            src="https://img.icons8.com/dusk/64/add-property--v1.png"
                                                            alt="add-property--v1" />Añadir Nota
                                                    </button>
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr class="table-danger">
                                                              <th>#</th>
                                                                <th>evaluaciones</th>
                                                                <th>tipo de evaluación</th>
                                                                <th>Notas</th>
                                                                <th>Acción</th>
                                                            </tr>

                                                        </thead>

                                                        <tbody>
                                                            @foreach ($cali as $xd)
                                                                <tr>
                                                                    <td>{{ $xd->idestudiantes_evaluaciones }}</td>
                                                                    <td>{{ $xd->tema }}</td>
                                                                    <td>{{ $xd->tipo_evaluacion }}</td>
                                                                    <td> {{ $xd->calificacion }}</td>
                                                                    <td>
                                                                        <button class="btn btn-warning"
                                                                            onclick="abrirSegundaModal('#staticBackdrop{{ $xd->idestudiantes_evaluaciones }}{{ $estudiante->idestudiantes }}')"><img
                                                                                width="27" height="30"
                                                                                src="https://img.icons8.com/dusk/64/edit--v1.png"
                                                                                alt="edit--v1" /></button>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade"
                                                                            id="staticBackdrop{{ $xd->idestudiantes_evaluaciones }}{{ $estudiante->idestudiantes }}"
                                                                            data-bs-keyboard="false" tabindex="-1"
                                                                            aria-labelledby="staticBackdropLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog modal-sm">
                                                                                
                                                                                    <div class=" modal-content ">
                                                                                      <div class="modal-content-custom">
                                                                                        <div class="modal-header">
                                                                                            <h1 class="modal-title fs-5"
                                                                                                id="staticBackdropLabel">
                                                                                                 Editar Nota</h1>
                                                                                            <button type="button"
                                                                                                class="btn-close"
                                                                                                data-bs-dismiss="modal"
                                                                                                aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="{{route('nomina.update')}} " method="POST">
                                                                                            @csrf
                                                                                            <div class="modal-body">

                                                                                                <input type="hidden"
                                                                                                    value="{{  $xd->idestudiantes_evaluaciones}}"
                                                                                                    name="idestudiantes_evaluaciones">
                                                                                                <label>nota:</label>
                                                                                                <input type="number"
                                                                                                    class="form-control"
                                                                                                    name="nota"><br>


                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                                <button
                                                                                                    class="btn btn-info"
                                                                                                    type="submit">cargar</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                    <div class="modal fade"
                                                        id="modalPequeña{{ $estudiante->idestudiantes }}"
                                                        data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                        aria-labelledby="ModalPequeñaLabel">

                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="fondo-difuminado">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="exampleModalLabel">Cargar Nota</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('nomina.create') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div>
                                                                                <label>Evaluación:</label>
                                                                                <select
                                                                                    class="form-select"name="idevaluaciones">
                                                                                    <option selected>Selecione una
                                                                                        Evaluación</option>
                                                                                    @foreach ($eval as $val)
                                                                                        <option
                                                                                            value="{{ $val->idevaluaciones }}">
                                                                                            {{ $val->tema }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <input type="hidden"
                                                                                value="{{ $estudiante->idestudiantes }}"
                                                                                name="idestudiantes">
                                                                            <label>nota:</label>
                                                                            <input type="number" class="form-control"
                                                                                name="nota"><br>
                                                                            <button class="btn btn-info"
                                                                                type="submit">cargar</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
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
