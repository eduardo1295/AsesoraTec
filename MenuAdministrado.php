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
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/mno.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/reloj.js"></script>


</head>

<body>
    <div class="row justify-content-center">
        <img src="banner.png" alt="" class="w-100 ml-2 mr-2" style="border:3px solid gray;">
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
                <?php echo $nombrecompleto?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuario">
                <a href='miperfil.php' class="dropdown-item lead">Mi perfil</a>
            </div>
        </div>
    </div>
</div>
</div>
    <div class="row">
        <div class="barra w-25 col">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active lead" href="#">
                        <i class="fas fa-home fa-fw"></i>Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" href="asesoriasa.php">
                        <i class="fas fa fa-eye fa-fw"></i>Ver las asesorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" data-toggle="collapse" href="#item-5">
                        <i class="fas fa fa-eye fa-fw"></i>Ver Usuarios</a>
                        <div id="item-5" class="collapse">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link active lead" href="menualumnos.php">
                                    <i class="fas fa fa-cog fa-fw"></i>Alumnos</a>
                            </li>
                            <li class="nav-item lead">
                                <a class="nav-link lead" href="menumaestros.php">
                                    <i class="fas fa-cog fa-fw"></i>Maestros</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" data-toggle="collapse" href="#item-2">
                        <i class="fas fa fa-file fa-fw"></i> Generar Reporte</a>
                        <div id="item-2" class="collapse">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link active lead"  href="documentosi.php">
                                    <i class="fas fa fa-file fa-fw"></i>Reporte de Departamento de Sistemas</a>
                            </li>
                            <li class="nav-item lead">
                                <a class="nav-link lead" href="documentocb.php">
                                    <i class="fas fa-file fa-fw"></i>Reporte de Ciencias Basicas</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" data-toggle="collapse" href="#item-9">
                        <i class="fas fa fa-file fa-fw"></i> Generar Horarios</a>
                        <div id="item-9" class="collapse">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link active lead"  href="listadoalumnos.php">
                                    <i class="fas fa fa-file fa-fw"></i>Horarios Alumnos</a>
                            </li>
                            <li class="nav-item lead">
                                <a class="nav-link lead" href="listadosmaestros.php">
                                    <i class="fas fa-file fa-fw"></i>Horarios Maestros</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" data-toggle="collapse" href="#item-3">
                        <i class="fas fa fa-male fa-fw"></i>Agregar Usuarios</a>
                        <div id="item-3" class="collapse">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link active lead" href="registrar.php">
                                    <i class="fas fa fa-cog fa-fw"></i>Alumnos</a>
                            </li>
                            <li class="nav-item lead">
                                <a class="nav-link lead" href="registrarmaestro.php">
                                    <i class="fas fa-cog fa-fw"></i>Maestros</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" data-toggle="collapse" href="#item-8">
                        <i class="fas fa fa-book fa-fw"></i>Materias</a>
                        <div id="item-8" class="collapse">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link active lead" href="agregarmateria.php">
                                    <i class="fas fa fa-book fa-fw"></i>Agregar Materia</a>
                            </li>
                            <li class="nav-item lead">
                                <a class="nav-link lead" href="menumaterias.php">
                                    <i class="fas fa fa-book fa-fw"></i>Ver Materias</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" data-toggle="collapse" href="#item-1">
                        <i class="fas fa fa-user fa-fw"></i>Mi cuenta</a>
                    <div id="item-1" class="collapse">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link active lead" data-toggle="modal" href="#cerrar">
                                    <i class="fas fa fa-power-off fa-fw"></i>Cerrar Sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link lead" data-toggle="modal" href="#eliminar">
                                    <i class="fas fa fa-trash fa-fw"></i>Eliminar mi cuenta</a>
                            </li>
                    </div>
                </li>
            </ul>
            <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
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
                                ¿Seguro que desea eliminar su cuenta?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-danger lead" href='#' id="eliminar">Aceptar</a>
                            <button type="button" class="btn btn-primary lead" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="cerrar" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
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
                                ¿Seguro que desea cerrar la sesión?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary lead" href="php/cerrarsesion.php">Aceptar</a>
                            <button type="button" class="btn btn-primary lead" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relleno w-100 mb-0">
        <script type="text/javascript">
            function crearReloj2() {
                var canvas = document.getElementById("canvas");
                var ctx = canvas.getContext("2d");
                var color = 'blue';
                ctx.strokeStyle = 'blue';
                ctx.lineWidth = 17;
                ctx.lineCap = 'round';
                ctx.shadowBlur = 15;
                ctx.shadowColor = 'black';
                function degToRoad(degree) {
                    var factor = Math.PI / 180;
                    return factor * degree;
                }

                function renderTime() {
                    var now = new Date();
                    var today = now.toDateString();
                    
                    var hours = now.getHours();
                    var amOpm;
                    if (hours > 12)
                    amOpm = "pm."
                    else
                    amOpm = "am.";
                    var time = "       "+now.toLocaleTimeString()+" "+amOpm;
                    var minutes = now.getMinutes();
                    var seconds = now.getSeconds();
                    var milliseconds = now.getMilliseconds();

                    var ahora = new Date();
                    var mesActual = ahora.getMonth();
                    var diaDelMes = ahora.getDate();
                    var aActual = ahora.getFullYear();
                    
                    var newSconds = seconds + (milliseconds / 1000);
                    var hoy =" "+diaDelMes+"/"+mesActual+"/"+aActual;
                    //background
                    var gradient = ctx.createRadialGradient(250, 250, 1, 250, 250, 300);
                    gradient.addColorStop(0, 'white');
                    gradient.addColorStop(1, 'white');

                    ctx.fillStyle = gradient;
                    //ctx.fillStyle = '#333333';
                    ctx.fillRect(0, 0, 500, 500);

                    //hours
                    ctx.beginPath();
                    ctx.arc(250, 250, 150, degToRoad(270), degToRoad((hours * 15) - 90));
                    ctx.stroke();

                    //minutes
                    ctx.beginPath();
                    ctx.arc(250, 250, 120, degToRoad(270), degToRoad((minutes * 6) - 90));
                    ctx.stroke();

                    //seconds

                    ctx.beginPath();
                    ctx.arc(250, 250, 90, degToRoad(270), degToRoad((newSconds * 6) - 90));
                    ctx.stroke();

                    //date
                    ctx.fillStyle = color;
                    ctx.font = '24px Verdana';
                    ctx.fillText(hoy, 170, 250);

                    //time
                    ctx.fillStyle = color;
                    ctx.font = '16px Arial';
                    ctx.fillText(time, 170, 280);
                }
                setInterval(renderTime, 40);
            }
        </script>
        </head>


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