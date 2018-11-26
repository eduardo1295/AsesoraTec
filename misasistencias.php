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
$alumno->ObtenerDatos($nocontrol,$alumno);
$nc = $nocontrol;
$nombre = $alumno->Nombre;
$appat = $alumno->Ap_Pat;
$apmat = $alumno->Ap_Mat;
$nombrecompleto = $nombre." ".$appat." ".$apmat;
$codAsesoria = $_GET['codA'];
$asesoria = new Asesoria();
$existe = $asesoria->AsesoriaExiste($codAsesoria);
$registrado = $asesoria->EstoyRegistrado($codAsesoria,$nc);
if($existe == 0)
{
    header("Location: menu1.php");
}
if($registrado == 0)
{
    header("Location: menu1.php");
}
$sql = "SELECT CODIGO_ASESORIA,FECHA,PASSWORDDIA FROM ASISTENCIASREG WHERE CODIGO_ASESORIA='$codAsesoria' AND CONTROL_ALUMNO='$nc'";
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
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
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
            <table class="table table-striped ml-1">
                <thead class="tabla">
                    <tr style="background:blue;color:white;">
                        <th style="border:1px solid white;"class="lead">Asesoría</th>
                        <th style="border:1px solid white;"class="lead">Fecha</th>
                        <th style="border:1px solid white;"class="lead">Contraseña ingresada</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_array($resultado)){ ?>
                    <tr>
                        <td><?php echo $row[0];?></td>
                        <td><?php echo $row[1];?></td>
                        <td><?php echo $row[2];}?></td>
                    </tr>
            </table>
        </div>
</body>
</html>