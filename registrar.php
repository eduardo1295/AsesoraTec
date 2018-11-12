<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <link rel="stylesheet" href="css/registrara.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/InsertarAlumno.js"></script>
    <script src="js/ToolTip.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="contenedor">
    <div class="page-header pb-2 pt-2">
            <h1 class="lead display-3 justify-content-center">Registrar una cuenta <img src="add.png" alt="Login"></h1>
    </div>        
    <div class="container mt-3 forma">
        <div class="row justify-content-center" style="border:1px solid white;">
            <div class="col">
                <div class="row  mt-4 justify-content-center">
                    <p class="lead mx-2">Información de la cuenta:
                    </p>
                </div>
         <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" class="cajas lead" id="nocontrol" placeholder="Número de control"maxlength=8 required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="password" class="cajas lead ml-4" id="pass" placeholder="Contraseña"maxlength=20 required>
                        <a class="btn btn-success" onclick="mostrar()" data-toggle="tooltip" title="Mostrar/Ocultar contraseña"data-placement="right"><i class="ojo fas fa fa-eye fa-fw"></i></a>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" class="cajas lead"id="appat" placeholder="Apellido Paterno"maxlength=50 required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" class="cajas lead" id="apmat" placeholder="Apellido Materno"maxlength=50 required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row ">
                        <input type="text" class="cajas lead" id="nombre" placeholder="Nombre"required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row ">
                 <input type="e-mail" id="correo" class="cajas lead"maxlength=128 placeholder="Correo"required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="radio"  name="radio"value="Hombre" id="sexo" checked class="radio my-2 mx-3 lead">
                        <label for="hombre" name="radio"class="radio lead">Hombre</label>
                        <input type="radio"name="radio"value="Mujer" id="sexo" class="radio my-2 mx-3 lead">
                        <label for="mujer"name="radio" class="radio lead">Mujer</label>
                        <input type="radio"name="radio" id="sexo"  class="radio my-2 mx-3 lead">
                        <label for="No binario" value="No binario" class="radio lead">No binario</label>
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
                        <select id="carrera" class="lead">
                            <option value="Ing. en Sistemas Computacionales">Ing. en Sistemas Computacionales</option>
                            <option value="Ing. Electromecánica">Ing. Electromecánica</option>
                            <option value="Ing. Civil">Ing. Civil</option>
                            <option value="Contabilidad">Contabilidad</option>
                        </select>
                    </div>
                    <div class="row my-3 justify-content-center">
                        <div class="row">
                            <input type="text" class="cajas lead"maxlength=2 id="semestre"placeholder="Semestre" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2 mt-2 container w-100">
        <div class="row  justify-content-center">
            <button type="submit" value="Registrarme" id="registrara" class="btn btn-primary lead w-50" data-toggle="modal" data-target="#mensaje">Registrarme</button>
            <div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabel">
                                        Mensaje del Sistema
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="mens">
                                   Alumno registrado!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal"onclick="window.location.href='login.php'">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
     </div>
    </body>
</html>
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