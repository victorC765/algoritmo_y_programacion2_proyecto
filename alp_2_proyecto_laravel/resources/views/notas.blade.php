<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/nomina.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="eva">
      
        <a href="./lista"><button class="btn"><img width="100" height="100" src="https://img.icons8.com/clouds/100/back.png" alt="back"/></button></a>
        <h3 class="mdt"><img width="60" height="60" src="https://img.icons8.com/dusk/64/exam.png"
                alt="exam" />Evaluaciones</h3>
                
                <div class="uni">
       
        <div class="esp">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPequeña">
            <img width="50" height="50" src="https://img.icons8.com/dusk/64/add-property--v1.png"
                alt="add-property--v1" />Añadir Nota
        </button>
    </div>
    
    <h4 class="p-3">ID del Estudiante: {{ $idestudiantes }}   </h4>
    <h4 class="p-3">Nombre: {{ $nombre }} {{ $apellido }}   </h4>
    <h4 class="p-3">cedula: {{ $cedula }}</h4>
    <h4 class="p-3">cedula: {{ $seccion}}</h4>
    </div>
        <div class="modal fade" id="modalPequeña" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="ModalPequeñaLabel">

            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-content-custom">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cargar Nota</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('nomina.create') }}" method="POST">
                                @csrf
                                <div>
                                    <label>Evaluación:</label>
                                    <select class="form-select"name="idevaluaciones">
                                        <option selected>Selecione una
                                            Evaluación</option>
                                        @foreach ($eval as $val)
                                            <option value="{{ $val->idevaluaciones }}">
                                                {{ $val->tema }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" value="{{ $idestudiantes }}" name="idestudiantes">
                                <label>nota:</label>
                                <input type="number" class="form-control" name="nota"><br>
                                <button class="btn btn-info" type="submit">cargar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <td>{{ $xd->calificacion }}</td>
                        <td>
                            <button class="btn btn-warning"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $xd->idestudiantes_evaluaciones }}"><img
                                    width="27" height="30" src="https://img.icons8.com/dusk/64/edit--v1.png"
                                    alt="edit--v1" /></button>
                            <!-- Modal -->
                            <div class="modal fade"
                                id="staticBackdrop{{ $xd->idestudiantes_evaluaciones }}"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm">

                                    <div class=" modal-content ">
                                        <div class="modal-content-custom">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                    Editar Nota</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('nomina.update') }} " method="POST">
                                                @csrf
                                                <div class="modal-body">

                                                    <input type="hidden" value="{{ $xd->idestudiantes_evaluaciones }}"
                                                        name="idestudiantes_evaluaciones">
                                                    <label>nota:</label>
                                                    <input type="number" class="form-control" name="nota"><br>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-info" type="submit">cargar</button>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
