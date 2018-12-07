<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Materia</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <link rel="stylesheet" href="css/registrara.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/agregarmateria.js"></script>
    <script src="js/ToolTip.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="contenedor">
<div class="row justify-content-center">
        <img src="bannerac.png" alt="" class="w-100 ml-2 mr-2" style="border:3px solid gray; height:100px">
    </div>
    <div class="page-header pb-2 pt-2">
        <h1 class="lead display-3 justify-content-center">Registrar una Materia <img id="logo" src="alumno.png" alt="Login"></h1>
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
                        <input type="text" class="cajas lead" id="codigo" placeholder="Codigo de la Materia" maxlength=8
                            required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" class="cajas lead" id="nombrem" placeholder="Nombre Materia" maxlength=20
                        required onkeypress="return soloLetras(event)">
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" class="cajas lead" id="tipo" placeholder="Tipo" maxlength=50
                        required onkeypress="return soloLetras(event)">
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" class="cajas lead .validanumericos" id="semestre" placeholder="Semestre" maxlength=50
                            required>
                    </div>
                </div>
                
            </div>
        </div>
        </div>
        <div class="mb-2 mt-2 container w-100">
        <div class="row  justify-content-center">
            <button type="submit" value="Registrar" id="registrarm" class="btn btn-success lead w-50" data-toggle="modal"
                data-target="#mensaje">Agregar</button>
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
                            Materia Registrada!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary lead" data-dismiss="modal" onclick="window.location.href=MenuAdministrado">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
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
</html>