<!DOCTYPE html>
<html lang="es">
<?php 
session_start();
if($_SESSION['logeado']!='SI'){
    header("Location: login.php");
}
require_once('php/Clases/alumno.php');
require_once('php/Clases/asesoria.php');
$alumno = new Alumno();
$nocontrol= $_SESSION['nocontrol'];
$existe = $alumno->AlumnoExists($nocontrol);
if($existe == 0)
{
    header("Location: login.php");
}
$alumno->ObtenerDatos($nocontrol,$alumno);
$nc = $nocontrol;
$nombre = $alumno->Nombre;
$appat = $alumno->Ap_Pat;
$apmat = $alumno->Ap_Mat;
$nombrecompleto = utf8_encode($nombre." ".$appat." ".$apmat);
$codAsesoria = $_GET['codA'];
$noecon = $_GET['ne'];
$_SESSION['codigo'] = $codAsesoria."*".$noecon;
$asesoria = new Asesoria();
$existe = $asesoria->AsesoriaExiste($codAsesoria,$noecon);
$registrado = $asesoria->EstoyRegistrado($codAsesoria,$nc);
if($existe == 0)
{
    header("Location: menu1.php");
}

if($registrado == 0)
{
    header("Location: menu1.php");
}
$sql = "SELECT CODIGO_ASESORIA,FECHA,PASSWORDDIA FROM ASISTENCIASREG WHERE CODIGO_ASESORIA='$codAsesoria' AND CONTROL_ALUMNO='$nc' AND NOECON='$noecon'";
$conn = abrirBD();
$resultado = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis asistencias</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/FiltrarAsistencias.js"></script>
</head>
<body>
<div class="row justify-content-center">
        <img src="bannerac.png" alt="" class="w-100" style="border:3px solid gray;">
    </div>
    <div class="row"style="background:blue;"> 
        <div class="page-header encabezado w-100 ml-3 py-3 col"style="color:white">
                <h1 class="lead display-4 ml-1 mr-2">Mis asistencias</h1>
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
    <div class="row justify-content-center mt-2">
        <p class="lead">La búsqueda puede ser por cualquier columna!<input type="text" class="ml-3 text-center" name="" id="busqueda" placeholder="Buscar"></p>
       
    </div>
    <div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabel">
                                        Registrar la asistencia de hoy
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" id="" name="" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="mens">
                                    <div class="row justify-content-center">
                                    <p class="lead">Ingresa la contraseña que te proporcionó tu maestro</p>
                                       <input type="text" name="" id="contra">
                                    </div>    
                               <div class="row justify-content-center mt-2" id="res">
                                   
                               </div>
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-success lead" id="regAsis" >Registrar</button>
                                    <button type="button" class="btn btn-secondary lead"data-dismiss="modal">Cerrar</button>

                                </div>
                            </div>
                        </div>
                    </div>
    </div>
    <div class="container-fluid">
            <div class="row">
                <section class="w-100" id="tabla">

                </section>
            </div>
    </div>
        <div class="row justify-content-center">
            <a href=""class="lead" data-toggle="modal" data-target="#mensaje" onclick="limpiar()">Registrar asistencia de hoy</a>
        </div>
        <div class="row justify-content-end">    
        <button type="button"class="mt-2 mr-5 btn btn-primary navegacion"style="border:0; background-color:transparent;cursor:pointer;" value=""data-toggle="tooltip" title="Página anterior"onclick="window.location.href='asesoriasinscritas.php'"><img  src="css/return.png" width="120px"height="120px"></button>
    </div>
</body>
</html>
<script>
$(document).ready(function(){
    $("#regAsis").click(function(){
        var noecon ='<?php echo $noecon?>';
        var contra = $("#contra").val();
        var codigo = '<?php echo $codAsesoria?>';
        var fecha = new Date();
        var resultado = $("#res");
        var fechaHoy = fecha.getDate() +"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear();
        $.ajax({
            url: 'php/asistencia.php', 
            method: 'POST',
            data:{
               ne:noecon,
               pass:contra,
               fecha:fechaHoy,
               cod:codigo
            },
            success: function (data){
                resultado.html(data);
                $("#tabla").load('php/asistencias.php');
            }
        });
    });
});
function limpiar(){
            var mensaje = document.getElementById('res');
            var textContra = document.getElementById('contra');
            contra.value="";
            res.innerHTML="";
        }
</script>