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
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Asesora-TEC</title>
    <link rel="stylesheet" href="css/mno.css">
    <link rel="stylesheet" href="css/tablaalumnos.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/materiasdisponibles.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<div class="row justify-content-center">
<img src="bannerac.png" alt="" class="w-100 ml-2 mr-2" style="border:3px solid gray;">
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
    <br>
    <div class="row justify-content-center filtros">
            <div class="w-100 text-center">
                <h4 class="lead">
                    Buscar: 
                    <input type="text" name="busqueda" id="busqueda"placeholder="Buscar">  
                    La búsqueda puede ser por cualquier columna de la tabla!
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
</body>

</html>