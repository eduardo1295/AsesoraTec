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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/maestrosdisponibles.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-verde fixed-top">
        <button type="button" class="navbar-toggler" data-toggle="collapse" 
        data-target="#nav-content" aria-control="nav-content"
            aria-expanded="false" aria-label="toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand">
            <h1 class="lead display-4">Ver Maestros</h1>
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
    <div class="row justify-content-center filtros">
            <div class="alert alert-primary w-100 text-center">
            <h4 class="lead">
                Buscar: 
            <input type="text" name="busqueda" id="busqueda"placeholder="Buscar">  
La búsqueda puede ser por cualquier columna de la tabla!
<button class="btn btn-info ml-5" class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje"><i class="fa fa-question"></i></button>
<div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabel">
                                        Ayuda del Sistema
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="mens">
                                  Para inscribirte en una asesoria sigue estos pasos: <br>
                                    1. Busca la asesoría de tu interés y selecciona el código <br>
                                    2. El código te llevará al horario de la asesoria <br>
                                    3. En la pantalla de horarios selecciona "Inscribirme" despúes de revisar los horarios
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </h4>
            </div>
        </div>
    <div class="container-fluid">
        <div class="row">
        <section class="w-100" id="tabla">

        </section>
        </div>
    </div>
    <div class="row justify-content-end mt-5">    
        <button type="button"class="mt-2 mr-5 btn btn-primary navegacion"
        style="border:0; background-color:transparent;cursor:pointer;" 
        value=""data-toggle="tooltip" title="Página anterior"onclick="window.location.href='menuadministrado.php'"><img  src="css/return.png" width="120px"height="120px"></button>
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

</html>