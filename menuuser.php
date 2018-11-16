<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if($_SESSION['usuariologeado']!='SI'){
    header("Location: login.php");
}
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
    <title>Ver mis asesorías</title>
    <link rel="stylesheet" href="css/ejemplo13bs.css">
    <link rel="stylesheet" href="css/tabla.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="ccs/menuusuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="angular.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/ejemplo24.js"></script>
    <link rel="stylesheet" href="css/ejemplo23.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-verde fixed-top">
        <button type="button" class="navbar-toggler" data-toggle="collapse" 
        data-target="#nav-content" aria-control="nav-content"
            aria-expanded="false" aria-label="toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand">
            <h1 class="lead display-4">Ver Usuarios</h1>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="nav-content"></div>
        <ul class="navbar-nav">
        </ul>
        <form action="" class="form-inline" role="search">
            <div class="dropdown">
                <button id="usuario" class="btn btn-primary dropdown-toggle lead mx-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-user fa-fw"></span><?php echo $nombrecompleto?>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuario">
                    <a href="a" class="dropdown-item lead">Cambiar de cuenta</a>
                    <a href="a" class="dropdown-item lead">Mi perfil</a>
                </div>
            </div>
            <div class="dropdown">
                <button id="acercade" class="btn btn-primary dropdown-toggle  lead" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-cog fa-fw"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acercade">
                    <a href="a" class="dropdown-item lead">Nuestra historia</a>
                    <a href="a" class="dropdown-item lead">Nuestro Equipo</a>
                    <a href="a" class="dropdown-item lead">Contacto</a>
                </div>
            </div>
        </form>
        </div>
    </nav>
    <br>
    <div class="row justify-content-center " id="contenedors">    
        <button type="button"class="mt-2 mr-5 btn btn-primary navegacion"
        style="border:0; background-color:transparent;cursor:pointer;" value=""
        data-toggle="popover" data-content="Ver Alumnos" title="Ver Alumnos"onclick="window.location.href='menualumnos.php'">
        <img  src="alumno.png" width="240px"height="240px"></button>
        
        <button type="button"class="mt-2 mr-5 btn btn-primary navegacion"
        style="border:0; background-color:transparent;cursor:pointer;" value=""
        data-toggle="popover" data-content="Ver Maestros" title="Ver Maestros"onclick="window.location.href='menumaestros.php'">
        <img  src="icono.ico" width="240px"height="240px"></button>
    </div>
    <div class="contenedor">
        <div id="contenido1">
            <span class="lead" id="texto1">Ver Alumnos</span>
        </div>
        <div id="contenido2">
            <span class="lead" id="texto2">Ver Maestros</span>
        </div>
    </div>


    <script>
            app = angular.module('myApp',[]);
            app.controller('customersCtrl',function($scope,$http){
                $http.get("noti.php?id=0").then(function(response){
                    $scope.valores = response.data;
                })
            });
    </script>
</body>
    <div class="row justify-content-end mt-5">    
        <button type="button"class="mt-2 mr-5 btn btn-primary navegacion"
        style="border:0; background-color:transparent;cursor:pointer;" 
        value=""data-toggle="tooltip" title="Página anterior"onclick="window.location.href='menu1.php'"><img  src="css/return.png" width="120px"height="120px"></button>
    </div>

</html>