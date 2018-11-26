<?php 
session_start();

if((isset($_SESSION['logeado']) && isset($_SESSION['maestrologeado'])) == false)
{
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--asd-->
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<script>
$(document).ready(function(){
$('#myModal').modal('show')
});
</script>
<?php 
header("Refresh: 3; URL=login.php");
    require('php/Clases/alumno.php');
    require('php/Clases/maestro.php');
    if (isset($_SESSION['nocontrol'])) {
        $alumno =new Alumno();
        $nocontrol = $_SESSION['nocontrol'];
        $alumno->EliminarAlumno($nocontrol);
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
                    <div class="row mt-2 justify-content-center lead">
                   Usuario eliminado exitosamente!<br>
                   Redireccionando..
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
    else if (isset($_SESSION['noeconomico'])) {
        $maestro = new maestro();
        $noecon = $_SESSION['noeconomico'];
        $maestro->EliminarMaestro($noecon);
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
                    <div class="row mt-2 justify-content-center lead">
                   Usuario eliminado exitosamente!<br>
                   Redireccionando..
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
    
session_destroy();
?>
</body>
</html>
