<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('php/Clases/maestro.php');
require_once('php/Clases/conexion.php');
if($_SESSION['maestrologeado']!='SI'){
    header("Location: login.php");
}
$maestro = new maestro();
$nocontrol= $_SESSION['noeconomico'];
$maestro->ObtenerDatos($nocontrol,$maestro);
$nc = $nocontrol;

$maestro = new maestro();
$nocontrol= $_SESSION['noeconomico'];
$maestro->ObtenerDatos($nocontrol,$maestro);
$nc = $nocontrol;
$nombre = utf8_encode($maestro->Nombre);
$appat =  utf8_encode($maestro->Ap_Pat);
$apmat =  utf8_encode($maestro->Ap_Mat);
$nombrecompleto = $nombre." ".$appat." ".$apmat;


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asesora-TEC</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tablaasesoria.css">
    <link rel="stylesheet" href="css/asesoriasd.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/reloj.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/Filtrarmaestro.js"></script>
</head>

<body>
<div class="row justify-content-center">
    <img src="bannerac.png" alt="" class="w-100" style="border:3px solid gray;">
</div>
    <div class="row"style="background:blue;"> 
        <div class="page-header encabezado w-100 py-3 col"style="color:white">
        <div class="row">
        <h1 class="lead display-4 ml-4">Mis asesorías</h1>
        </div>          
        </div>
        <div class="col mt-4" style="background:blue">
            <div class="row justify-content-end mr-2 mt-1">
                <div class="dropdown ">
                    <button id="usuario" class="btn btn-primary dropdown-toggle lead mx-3" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-user fa-fw"></span>
                        <?php echo $nombrecompleto?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuario">
                        <a href='miperfil.php' class="dropdown-item lead">Mi perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <input type="hidden" name="">

            <section class="w-100" id="tabla">

            </section>

        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Seguro que desea eliminar
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger" name="eliminar" id="eliminar" data-dismiss="modal">Confirmar</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="mens">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <button type="button" class="mt-2 mr-5 btn btn-primary navegacion" style="border:0; background-color:transparent;cursor:pointer;"
            value="" data-toggle="tooltip" title="Página anterior" onclick="window.location.href='menu1.php'"><img src="css/return.png"
                width="120px" height="120px"></button>
    </div>
    <?php


?>

</body>

</html>