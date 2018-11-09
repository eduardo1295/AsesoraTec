<!DOCTYPE html>
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
$nombre = $alumno->Nombre;
$appat = $alumno->Ap_Pat;
$apmat = $alumno->Ap_Mat;
$nombrecompleto = $nombre." ".$appat." ".$apmat;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir evidencia</title>
    <link rel="stylesheet" href="css/evidencia.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="dropzone/dropzone.css">
    <script src="dropzone/dropzone.js"></script>
    <script src="dropzone/dropzone-config.js"></script>

</head>
<body>
<div class="row">
        <nav class="navbar navbar-expand navbar-dark fixed-top encabezado">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-content" aria-control="nav-content"
                aria-expanded="false" aria-label="toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="#" class="navbar-brand">
                <h1 class="lead display-4">Subir mi evidencia</h1>
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
<div class="row justify-content-center elegir">
<form  action="php/receptor.php" class="dropzone needsclick dz-clickable" id="subirImagen">
<div class="dz-mesaage needsclick">
<h5 class="lead">Arrastre su archivo aquí o click para seleccionar</h5>
</div>
</form>
</form>
</div>
</body>
</html>