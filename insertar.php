<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
if(isset($_POST['registrarbtn']))
{
    require('php/Clases/alumno.php');
    $alumno = new Alumno();
    $alumno->setNo_Control($_POST['nocontrol']);
    $alumno->setContraseña($_POST['contraseña']);
    $alumno->setNombre($_POST['nombre']);
    $alumno->setAp_Pat($_POST['appat']);
    $alumno->setAp_Mat($_POST['apmat']);
    $alumno->setCarrera($_POST['carrera']);
    $alumno->setSemestre($_POST['semestre']);
    $alumno->setSexo("Hombre");
    $alumno->setCorreo($_POST['correo']);
    $existe = $alumno->AlumnoExists($_POST['nocontrol']);
    if($existe==0)
    {
        $alumno->InsertarAlumno($alumno);
        header('Refresh: 3; URL=login.php');
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
                   Redireccionando
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
        header('Refresh: 3; URL=registrar.php');
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
                    Redireccionando
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
}
?>

</body>
</html>

