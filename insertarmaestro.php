<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar usuario</title>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<script>
$(document).ready(function(){
$('#myModal').modal('show')
});
</script>
<body>
<?php 
require('php/Clases/maestro.php');
$maestro = new Maestro();
$maestro->setNo_Economico($_POST['noec']);
$maestro->setContraseña($_POST['passm']);
$maestro->setNombre($_POST['nombrem']);
$maestro->setAp_Pat($_POST['appatm']);
$maestro->setAp_Mat($_POST['apmatm']);
$maestro->setDepartamento($_POST['depto']);
$maestro->setCorreo($_POST['correom']);
echo $maestro->No_Economico;
echo $maestro->Contraseña;
echo $maestro->Nombre;
$existe = $maestro->MaestroExists($_POST['noec']);

if($existe==0)
{
    $maestro->InsertarMaestro($maestro);
    header('Refresh: 5; URL=login.php');
    echo '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
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
            <div class="modal-body">
                <div class="row mt-2 justify-content-center">
               Usuario creado exitosamente!<br>
               Redireccionando <div class="progress">
               <div class="progress-bar bg-warning" aria-valuemin="0"
               aria-valuemax="100" aria-valuenow="75" style="width:75%"></div>
       </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary lead" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
</div>';
}
else
{
    header('Refresh: 4; URL=registrar.php');
    echo '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
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
            <div class="modal-body">
                <div class="row mt-2 justify-content-center">
                El usuario ya existe!<br>
                Redireccionando<div class="progress">
                <div class="progress-bar bg-warning" aria-valuemin="0"
                aria-valuemax="100" aria-valuenow="75" style="width:75%"></div>
        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary lead" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
</div>';
    //echo '<p class="alert alert-warning agileits" role="alert">El número de control ya existe!<p>';
}
?>
</body>
</html>
