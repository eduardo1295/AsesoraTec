<!DOCTYPE html>
<html lang="en">
<?php 
require_once('php/Clases/conexion.php');
session_start();
if($_SESSION['maestrologeado']!='SI'){
    header("Location: login.php");
}
require_once('php/Clases/maestro.php');
$maestro = new maestro();
$nocontrol= $_SESSION['noeconomico'];
$maestro->ObtenerDatos($nocontrol,$maestro);
$nc = $nocontrol;
$nombre = utf8_encode($maestro->Nombre);
$appat =  utf8_encode($maestro->Ap_Pat);
$apmat =  utf8_encode($maestro->Ap_Mat);
$nombrecompleto = $nombre." ".$appat." ".$apmat;

if(isset($_POST['eliminar'])) {
    $conexion = abrirBD();
    $codi = $_POST['codigo'];
    $SQL= "UPDATE asesorias SET Activo = 'No' WHERE codigo=? AND No_Maestro = ?";
    $sentencia_preparada1 = $conexion->prepare($SQL);
    $sentencia_preparada1->bind_param("ss",$cod,$nom);
    $cod =$codi;
    $nom = $nombrecompleto;
    $sentencia_preparada1->execute();
    $conexion->close();
}
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
        <img src="bannerac.png" alt="" class="w-100 ml-2 mr-2" style="border:3px solid gray;">
    </div>
    <div class="row">
        <nav class="page-header encabezado w-100 ml-3 py-3 col"style="color:white">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-content" aria-control="nav-content"
                aria-expanded="false" aria-label="toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="#" class="navbar-brand">
                <h1 class="lead display-4">Mis asesorias</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="nav-content"></div>
            <ul class="navbar-nav">
            </ul>
            <form action="" class="form-inline" role="search">
                <div class="dropdown">
                    <button id="usuario" class="btn btn-primary dropdown-toggle lead mx-3" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-user fa-fw"></span>
                        <?php echo $nombrecompleto?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuario">
                        <a href="a" class="dropdown-item lead">Cambiar de cuenta</a>
                        <a href='miperfil.php' class="dropdown-item lead">Mi perfil</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button id="acercade" class="btn btn-primary dropdown-toggle  lead" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-cog fa-fw"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acercade">
                        <a href="a" class="dropdown-item lead">Nuestra historia</a>
                        <a href="a" class="dropdown-item lead">Nuestro Equipo</a>
                        <a href="a" class="dropdown-item lead">Contacto</a>
                    </div>
                </div>
            </form>
        </nav>
    </div>
    <div class="row justify-content-center filtros">
        <div class="alert alert-primary w-100 text-center">
            <h4 class="lead">
                Buscar:
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                La búsqueda puede ser por cualquier columna de la tabla!
                <button class="btn btn-info ml-5" class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje"><i
                        class="fa fa-question"></i></button>
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
                                3. En la pantalla de horarios selecciona el botón "Inscribirme" despúes de revisar los
                                horarios
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
    <div class="row">
        <div class="alert alert-primary w-100 text-center">
            <h4 class="lead">
                Selecciona el código de la asesoria para ver el horario!
            </h4>
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
                        <button type="submit" class="btn btn-danger" name="eliminar" form="eliminar">Confirmar</button>
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