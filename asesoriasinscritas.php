<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if($_SESSION['logeado']!='SI'){
    header("Location: login.php");
}
require_once('php/Clases/alumno.php');
$alumno = new Alumno();
$nocontrol= $_SESSION['nocontrol'];
$alumno->ObtenerDatos($nocontrol,$alumno);
$nc = $nocontrol;
$nombre = utf8_encode($alumno->Nombre);
$appat = utf8_encode($alumno->Ap_Pat);
$apmat = utf8_encode($alumno->Ap_Mat);
$semestre = $alumno->Semestre;
$nombrecompleto = $nombre." ".$appat." ".$apmat;

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Asesora-TEC</title>
    <script src="js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/tablaa.css">
   <link rel="stylesheet" href="css/asesoriasds.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/reloj.js"></script>
        <script src="js/FiltrarInscritas.js"></script>
    <script src="js/EliminarAsesoria.js"></script>
</head>
<body>
<div class="row">
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
                        <span
                         class="fas fa-user fa-fw"></span>
                        <?php echo $nombrecompleto?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuario">
                        <a href='miperfil.php' class="dropdown-item lead">Mi perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row justify-content-center filtros">
            <div class="w-100 text-center">
            <h4 class="lead">
                Selecciona el código de una asesoría para mas acciones!
            </h4>
            <a href="cargaasesoria.php" class="lead">Generar reporte de horario</a>
        </div>
        </div>
        <input type="hidden" name="" id="noecon">
    <div class="container-fluid">
        <div class="row">
            <section class="w-100" id="tabla">

            </section>
        </div>
    </div>

    <div class="row justify-content-end">    
        <button type="button"class="mt-2 mr-5 btn btn-primary fixed-bottom navegacion"id="regresar"style="border:0; background-color:transparent;cursor:pointer; position:relative; min-height:100%;" value=""data-toggle="tooltip" title="Página anterior"onclick="window.location.href='menu1.php'"><img  src="css/return.png" width="120px"height="120px"></button>
    </div>
    
    <div class="modal fade" id="mensa" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalLabel">
                                Mensaje del Sistema
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="" name="">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="mens">
                        ¿Seguro que quieres darte de baja?
                        </div>
                        <div class="modal-footer">
                        <form method="post">
                            <button type="submit" class="btn btn-primary lead" id=""name="darbaja">Aceptar</button></div>
                            <input type="hidden" name="codigoAs" id="codigo">
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="contra" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalLabel">
                                Mensaje del Sistema
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="" name="">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="mensContra">
                            <div class="row justify-content-center">
                              Ingresa la clave de hoy
                
                              <input type="text" name="" id="contraseñaA">
                              <p class="lead" id="res"></p>
                              <button type="button" class="btn btn-success lead" id="regContra" name="">Aceptar</button>
                           </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary lead"   data-dismiss="modal" onclick="window.location.href='asesoriasinscritas.php'"id=""name="">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
<script language="javascript">
$(document).ready(function(){
    $("button").click(function(){
        var id = this.id;
        if(id=="registrarAs"){
            var btnCodigo = document.getElementsByName(this.name);
           var codigobtn = btnCodigo[0].name.toString();
           var arr = codigobtn.split('*');
            var texto = document.getElementById('codigo');
            var noecon = document.getElementById('noecon');
            noecon.value = arr[1];
            texto.value = arr[0];
        }
        
    });
    $("#regContra").click(function(){
        var contra = $("#contraseñaA").val();
        var codigo = $("#codigo").val();
        var noecon = $("#noecon").val();
        var res = $("#mensContra");
        var fecha = new Date();
        var fechaHoy = fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear();
        $.ajax({
            url: 'php/asistencia.php', 
            cache: false,
            method: 'POST',
            data:{
                pass : contra,
                cod : codigo,
                ne: noecon,
                fe:fechaHoy
            },
            success: function (data){
                res.text(data);
            }
        });

    });
    $("#eliminar").click(function(){
        var nameButton = document.getElementsByName(this.name);
        var codigo = nameButton[0].name.toString();
        var oculto = document.getElementById('codigo');
        oculto.value = codigo;
    });
});
</script>
<?php 
if(isset($_POST['darbaja']))
{
    require_once('php/Clases/alumno.php');
    $nocontrol = $_SESSION['nocontrol'];
    $codAsesoria = $_POST['codigoAs'];
    if($codAsesoria=="")
        echo "No tiene nada";
    echo $codAsesoria;
    $alumno = new Alumno();
    $alumno->EliminarAsesoria($nocontrol,$codAsesoria);
    echo "Te diste de baja de esta asesoría!";
}
?>
</body>
</html>