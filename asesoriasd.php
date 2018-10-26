<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('php/Clases/alumno.php');
$alumno = new Alumno();
$nocontrol= $_SESSION['nocontrol'];
$alumno->ObtenerDatos($nocontrol,$alumno);
$nc = $nocontrol;
$nombre = $alumno->Nombre;
$appat = $alumno->Ap_Pat;
$apmat = $alumno->Ap_Mat;
$semestre = $alumno->Semestre;
$nombrecompleto = $nombre." ".$appat." ".$apmat;
require_once('php/Clases/conexion.php');
 try
 {
$conn = abrirBD();
$where = "WHERE SEMESTRE<=$semestre";
$texto = "";
if(isset($_POST['buscar'])){
    $filtro = $_POST['filtro'];
    $seleccion;
    $texto = "'".$_POST['busqueda']."'";
    if($filtro == 'Ninguno')
    {
        $seleccion = "";
        $texto ="";
        
    }
    else if($filtro == 'Código')
    {
        $seleccion = "CODIGO";
        $where = $where." AND CODIGO=";
    }
    else if($filtro =='Maestro')
    {
        $seleccion = 'NO_MAESTRO';
        $where = $where." AND NO_MAESTRO=";
    }
    else if($filtro == 'Semestre')
    {
        $seleccion = "SEMESTRE";
        $where = $where." AND SEMESTRE=";
    }
    else if($filtro =='Materia')
    {
    $seleccion = 'NOMBRE_MATERIA';
    $where = $where." AND NOMBRE_MATERIA=";
    }
    echo $texto;
}
$sql = "SELECT * FROM ASESORIAS ".$where.$texto;
echo $sql;
$result = mysqli_query($conn,$sql);
}
 catch(Exception $e)
 {
  $error = $e->getMessage();
  echo $error;
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
    <script src="js/Filtrar.js"></script>
</head>
<body>
 <div class="row">
            <nav class="navbar navbar-expand navbar-dark fixed-top encabezado">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-content" aria-control="nav-content"
                        aria-expanded="false" aria-label="toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="#" class="navbar-brand">
                        <h1 class="lead display-4">Asesorías disponibles</h1>
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
                                <a href='miperfil.php?nc=<?php echo $nc;?>' class="dropdown-item lead">Mi perfil</a>
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
                </nav>
    </div>
        <div class="row justify-content-center filtros">
            <div class="alert alert-primary w-100">
            <h4 class="lead">
                Buscar: 
            <input type="text" name="busqueda" id="busqueda"placeholder="Buscar">  
            <h4 class="lead ml-4">
La busqueda es por cualquier columna de la tabla!
            </h4>
            </h4>
            </div>
        </div>
    <div class="container-fluid">
        <div class="row">
            <section class="w-100" id="tabla">

            </section>
        </div>
    </div>
<?php

?>    

</body>
</html>