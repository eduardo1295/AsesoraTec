<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar cuenta</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mensaje.js"></script>
</head>
<body>
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
            <form action='insertarmaestro.php'method="post">
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead" placeholder="Número económico" name="noec" maxlength=8 required>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead ml-4" placeholder="Contraseña" name="passm"maxlength=20 required>
                    <a class="btn btn-success" onclick="mostrar()"><i class="ojo fas fa fa-eye fa-fw"></i></a>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead" placeholder="Apellido Paterno" name="appatm"maxlength=50 required>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead" placeholder="Apellido Materno"name="apmatm"maxlength=50 required>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row ">
                    <input type="text" class="cajas lead" placeholder="Nombre"maxlength=50 name="nombrem"required>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row ">
                    <input type="email" class="cajas lead" placeholder="Correo"name="correom" maxlength=128 required>
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
                    <label for="depto"class=lead>Departamento:</label>
                    <select name="depto" id="depto" class="lead">
                        <option value="Ing. en Sistemas Computacionales">Ciencias Básicas</option>
                        <option value="Ing. Electromecánica">Especialidad en Desarrollo Web</option>
                        <option value="Ing. Civil">Especialidad en seguridad en TIC'S</option>
                        <option value="Contabilidad">Especialidad en Investigación</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mb-2 mt-2 container w-100">
    <div class="row  justify-content-center">
        <input type="submit" value="Registrarme" name="registrarm" class="btn btn-primary lead h-50" data-toggle="modal" data-target="#mensaje">
    </div>
</div>
</form>
</body>
</html>
<script>
if(history.forward(1))
{
    window.location.href='login.php';
}
</script>
<script>
  function mostrar(){
      var tipo = document.getElementById("passm");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
