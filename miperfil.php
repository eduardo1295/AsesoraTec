<!DOCTYPE html>
<html lang="en">
    <?php 
    require_once('php/Clases/alumno.php');
    $alumno = new Alumno();
    $nocontrol = $_GET['nc'];
    $alumno->ObtenerDatos($nocontrol,$alumno);
    $nombre = $alumno->Nombre;
    $pass = $alumno->Contraseña;
    $correo= $alumno->Correo;
    $appat = $alumno->Ap_Pat;
    $apmat = $alumno->Ap_Mat;
    $sexo = $alumno->Sexo;
    $semestre = $alumno->Semestre;
    $carrera = $alumno->Carrera;
    ?>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi perfil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/miperfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="js/mensaje.js"></script>
</head>
<body class="contenedor">
    <div class="page-header pb-2 pt-2">
            <h1 class="lead display-3 justify-content-center">Ver mi perfil <img src="asesor.png" alt="Login"></h1>
    </div>        
    <div class="container mt-3 forma">
        <div class="row justify-content-center" style="border:1px solid white;">
            <div class="col">
                <div class="row  mt-4 justify-content-center">
                    <p class="lead mx-2">Información de la cuenta:
                    </p>
                </div>
        <form action="guardar.php" method="post">
         <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" value="<?php echo $nocontrol?>" class="cajas lead" name="nocontrol" placeholder="Número de control"maxlength=8 required>
                        </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="password"  value="<?php echo $pass?>" class="cajas lead  ml-4"name="contraseña" id=pass placeholder="Contraseña"maxlength=20 required>
                        <a class="btn btn-success" onclick="mostrar()"><i class="ojo fas fa fa-eye fa-fw"></i></a>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text"  value="<?php echo $appat?>" class="cajas lead"name="appat" placeholder="Apellido Paterno"maxlength=50 required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" value="<?php echo $apmat?>" class="cajas lead" name="apmat" placeholder="Apellido Materno"maxlength=50 required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row ">
                        <input type="text" value="<?php echo $nombre?>" class="cajas lead" name="nombre" placeholder="Nombre"required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row ">
                 <input type="e-mail" value="<?php echo $correo?>" name="correo" class="cajas lead"maxlength=128 placeholder="Correo"required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="radio" name="sexo" id="" class="radio my-2 mx-3 lead">
                        <label for="hombre" class="radio lead">Hombre</label>
                        <input type="radio" name="sexo" id="" class="radio my-2 mx-3 lead">
                        <label for="mujer" class="radio lead">Mujer</label>
                        <input type="radio" name="sexo" id="" class="radio my-2 mx-3 lead">
                        <label for="No binario" class="radio lead">No binario</label>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
    <div class="container mt-3 forma">
        <div class="row" style="border:1px solid white;">
            <div class="col">
                <div class="row  mt-4 justify-content-center">
                    <p class="lead">Información del usuario:
                    </p>
                </div>
                <div class="row justify-content-center">
                    <div class="row my-2 ">
                        <select name="carrera" value="<?php echo $carrera?>" id="" class="lead">
                          <option value="Ing. en Sistemas Computacionales">Ing. en Sistemas Computacionales</option>
                            <option value="Ing. Electromecánica">Ing. Electromecánica</option>
                            <option value="Ing. Civil">Ing. Civil</option>
                            <option value="Contabilidad">Contabilidad</option>
                        </select>
                    </div>
                    <div class="row my-3 justify-content-center">
                        <div class="row">
                            <input type="text" value="<?php echo $semestre?>" class="cajas lead"maxlength=2 name="semestre"placeholder="Semestre" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2 mt-2 container w-100">
        <div class="row  justify-content-center">
            <input type="submit" value="Guardar" name="guardarbtn" id="guardarbtn"class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje">
        </div>
     </div>
     </form>
    </body>
 
<script>
  function mostrar(){
      var tipo = document.getElementById("pass");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
</html>