<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="anum">
        <span ><h1 class="ti">  CIERRE</h1> </span>
        <span><p>Esta seguro que desea cerrar el curso?</p></span>
        <div>
            <a href="http://localhost:4321/"><button class="boton" >si</button></a>
       
            <a href="/menu"><button id="de" class="boton">no</button></a>
        </div>
    
</div>
</main>
</body>
<style>
       body{
        background-color: black;
    }
   
   .anum{
    text-align: center;
    background-color: rgb(255, 205, 216);
    width: 100%;
    max-width: 400px;
    height: 380px;
    position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  border-radius:30px ;
    
   }
   .ti{
    padding: 20px;
    font-size: 30px;
    background-color: #ff3a3a;
    border-top-left-radius:30px ;
    border-top-right-radius:30px ;
      }
      p{
        font-size: 23px;
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 50px;
        margin-bottom: 50px;
      }
    .boton{
        width: 90px;
        top: 30px;
      padding: 8px;
        border-radius: 7px;
        color: aliceblue;
        background-color: rgb(57, 64, 250);
        margin: 30px;
        
    }
    #de{
        background-color: #ff3a3a;
    }
    #de:hover{
        background-color: blueviolet;
    }
    .boton:hover{
        background-color: rgb(111, 21, 195);
    }
   
</style>
</html>