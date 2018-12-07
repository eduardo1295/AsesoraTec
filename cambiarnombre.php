<!DOCTYPE html>
<html lang="es">
<?php 
session_start();

if($_SESSION['usuariologeado']!='SI'){
    header("Location: login.php");
}
require_once('php/Clases/conexion.php');
require_once('php/Clases/admin.php');
$admin = new Admin();
$usuario= $_SESSION['usuario'];
$admin->ObtenerDatos($usuario,$admin);
$nc = $admin;
$nombre = $admin->Nombre;
$appat = $admin->Ap_Pat;
$apmat = $admin->Ap_Mat;
$nombrecompleto = $nombre." ".$appat." ".$apmat;
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asesora-TEC</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reloj.css">
    <link rel="stylesheet" href="css/sidebars.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/mno.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/modificarnombres.js"></script>
    <script src="js/reloj.js"></script>


</head>

<body>
<div class="row justify-content-center">
<img src="bannerac.png" alt="" class="w-100 ml-2 mr-2" style="border:3px solid gray;">
</div>
<div class="row"style="background:blue;"> 
<div class="page-header encabezado w-100 ml-3 py-3 col"style="color:white">
    <h1 class="lead display-4 ml-1 mr-2">Asesora-TEC</h1>
</div>
<div class="col mt-4" style="background:blue">
    <div class="row justify-content-end mr-2 mt-1">
        <div class="dropdown ">
            <button id="usuario" class="btn btn-primary dropdown-toggle lead mx-3" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-user fa-fw"></span>
                <?php echo utf8_encode(utf8_decode($nombrecompleto))?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuario">
                <a href='miperfil.php' class="dropdown-item lead">Mi perfil</a>
            </div>
        </div>
    </div>
</div>
</div>
<br>
<div class="row justify-content-center">
    <div class="w-100 text-center">
        <select name="jefes" id="jefes">
            <option id="opcion1" value="JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACION">JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACION</option>
            <option id="opcion1" value"PRESIDENTE DE ACADEMIA DE SISTEMAS Y COMPUTACION">PRESIDENTE DE ACADEMIA DE SISTEMAS Y COMPUTACION</option>
            <option id="opcion1" value="JEFE DEL DEPTO. DE CS. BASICAS">JEFE DEL DEPTO. DE CS. BASICAS</option>
            <option id="opcion1" value="PRESIDENTE ACADEMIA DE CS. BASICAS">PRESIDENTE ACADEMIA DE CS. BASICAS</option>
            
        </select>
        <input type="text" id="txtnombre" value="">
        <input type="submit" value="Cambiar Nombre" class="btn btn-success lead" id="cambiar" data-toggle="modal" data-target="#mensaje">
    </div>
    </div>
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal" onclick="window.location.href='cambiarnombre.php'">Aceptar</button>
                                </div>
                            </div>
                        </div>
            </div>
    <br>
    <div class="row justify-content-end mt-5">    
        <button type="button"class="mt-2 mr-5 btn btn-primary navegacion"
        style="border:0; background-color:transparent;cursor:pointer;" 
        value=""data-toggle="tooltip" title="Página anterior"onclick="window.location.href='menuadministrado.php'"><img  src="css/return.png" width="120px"height="120px"></button>
    </div>

    <div class="relleno w-100 mb-0">
        <body onLoad="crearReloj2()">
            <div class="row justify-content-center">
                <canvas id="canvas" class="lead" width="500px" height="500px"></canvas>
            </div>
            <div class="copyright"style="left:0;bottom:0;width:100%;position:fixed;">
                <div class="container">
                    <div class="col py-3">
                        <div class="col text-center">
                            Instituto Tecnológico de La Paz. &copy;
                            <a class="btn btn-block btn-social btn-twitter d-inline">
                                <span class="fa fa-twitter"></span>
                            </a>
                            <a class="btn btn-block btn-social btn-twitter d-inline"style="color:white" href="https://www.facebook.com/itlapaz/">
                                <span class="fa fa-facebook"></span>
                            </a>
                            <a class="btn btn-block btn-social btn-twitter d-inline">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
</div>
</body>
</html>