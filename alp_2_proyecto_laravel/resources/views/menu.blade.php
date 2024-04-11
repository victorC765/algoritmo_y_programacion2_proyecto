<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>menu</title>
</head>
<body>
    <div class="conteiner">
        <div class="circulo"> 
            <ul>
                <li>
                    <a href="./lista">
                        <div>
                            <img src="{{ asset('img/lista-de-verificacion.png') }}" alt="lista" width="135" height="135" />
                        </div>
                        <div>Nomina estudiantil</div>
                    </a>
                </li>
                <li>
                    <a href="./evaluacion">
                        <div>
                            <img src="{{ asset('img/evaluation_8921149.png') }}" alt="icono de evaluacion" width="135" height="135" />
                        </div>
                        <div>Evaluaciones</div>
                    </a>
                </li>
                <li>
                    <a href="./estado_estudiantil">
                        <div>
                            <img src="{{ asset('img/estudiante.png') }}" alt="icono de estado de estudiantil" width="135" height="135" />
                        </div>
                        <div><br/>Estado estudiantil</div>
                    </a>
                </li>
                <li>
                    <a href="./crearmateria">
                        <div>
                            <img src="{{ asset('img/literature.png') }}" alt="icono de libro" width="135" height="135" />
                        </div>
                        <div><br/>Crear Materia</div>
                    </a>
                </li>
                <li>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">          
                    <div>
                            <img src="{{ asset('img/salida-de-emergencia.png') }}" alt="icono de estado de estudiantil" width="135" height="135" />
                        </div>
                        <div><br/>cierre de curso</div>
                    </a>
                  
                </li>
            </ul>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Contenido de la modal -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="/"><button type="button" class="btn btn-primary">Aceptar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
