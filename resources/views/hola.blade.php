<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hola</title>
</head>
<body>
    <h1>hola crack</h1>
    <h2>esto no funciona</h2>
    
    
    <div class="conteiner">
   <div class="circulo"> 
    <ul>
        <li>
            <a href="./nomina">
                <div>
                    <Image src="/icons/lista-de-verificacion.png"  alt="icono de nomina estudiantil" width="170" height="80" />
                </div>
                <div>Nomina estudiantil</div>
            </a>
        </li>
        <li>
            <a href="./evaluacion">
                <div>
                    <Image src="/icons/evaluation_8921149.png"  alt="icono de evaluacion" width="170" height="80" />
                </div>
                <div>Evaluaciones</div>
            </a>
        </li>
        <li>
            <a href="./estado_estudiantil">
                <div>
                    <Image src="/icons/estudiante.png"  alt="icono de estado de estudiantil" width="170" height="80" />
                </div>
                <div><br/>Estado estudiantil</div>
            </a>
        </li>
        <li>
            <a href="./cerrar">
                <div>
                    <Image src="/icons/salida-de-emergencia.png"  alt="icono de cierre de curso" width="170" height="80"/>
                </div>
                <h1>Cierre de curso</h1>
            </a>
        </li>
      </ul>
   </div>
 </div>

</Layout>

<style>

.conteiner{
    display: flex;
    justify-content: center;
    height: 1010px;
    align-items: center;
}

.circulo{
    height: 550px;
    width: 750px;
    background-color: #317874;
    border-radius: 450px;
    }

*{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

ul {
    width: 100%;
    max-width: 800px;
    height: 250px;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 24.5%;
    left: 44.5%;
    transform: translate(-50%,50%);
    margin: 80px;
    padding: 30px 0;
    background: #499986;
    display: flex;
    border-radius: 30px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, .3); 
    filter:drop-shadow(-4px  4px  0.4rem);
}

ul li{
    list-style: none;
    justify-content: center;
    text-align: center;
    display: block;
}
ul li a{
    text-decoration: none;
    padding:  45px;
    height: 250px;
    display: block;
}
a:hover{
    background-color: #1b4147;
    opacity: 0.8;
    padding: 30px;
    border-radius: 30px;
}
  
</style>
</body>
</html>