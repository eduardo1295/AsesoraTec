<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar cuenta</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <link rel="stylesheet" href="css/maestro.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/InsertarMaestro.js"></script>
</head>
<body>
<div class="row justify-content-center">
        <img src="banner.png" alt="" class="w-100" style="border:3px solid gray; height:100px">
    </div>
    <div class="page-header pb-2 pt-2">
        <h1 class="lead display-3 justify-content-center">Registrar una cuenta <img src="asesor.png" alt="Login"></h1>
</div>        
<div class="container mt-3 forma">
    <div class="row justify-content-center" style="border:1px solid white;">
        <div class="col">
            <div class="row  mt-4 justify-content-center">
                <p class="lead mx-2">Información de la cuenta:
                </p>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead validanumericos" placeholder="Número económico" id="noec" maxlength=8 required>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead ml-4" placeholder="Contraseña" id="passm"maxlength=20 required>
                    <a class="btn btn-success" onclick="mostrar()"><i class="ojo fas fa fa-eye fa-fw"></i></a>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead" placeholder="Apellido Paterno" id="appatm"maxlength=50 required onkeypress="return soloLetras(event)">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead" placeholder="Apellido Materno"id="apmatm"maxlength=50 required onkeypress="return soloLetras(event)">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row ">
                    <input type="text" class="cajas lead" placeholder="Nombre"maxlength=50 id="nombrem"required onkeypress="return soloLetras(event)">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row ">
                    <input type="email" class="cajas lead" placeholder="Correo"id="correom" maxlength=128 required>
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
                    <select  id="depto" class="lead">
                        <option value="Ing. Sistemas Computacionales">Ing. Sistemas Computacionales</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mb-2 mt-2 container w-100">
    <div class="row  justify-content-center">
        <button type="submit" id="registrarm" class="btn btn-primary lead w-50" data-toggle="modal" data-target="#mensaje"> Registrarme</button>
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
                                Maestro registrado!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal">Aceptar</button>
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
      var tipo = document.getElementById("passm");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<script language="javascript">
$(function(){

$('.validanumericos').keypress(function(e) {
  if(isNaN(this.value + String.fromCharCode(e.charCode))) 
   return false;
})
.on("cut copy paste",function(e){
  e.preventDefault();
});

});
</script>
