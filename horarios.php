<html lang="es">
<?php
session_start();
require_once('php/Clases/Alumno.php');
if($_SESSION['logeado']!='SI'){
    header("Location: login.php");
}
$alumno = new Alumno();
$nocontrol= $_SESSION['nocontrol'];
$alumno->ObtenerDatos($nocontrol,$alumno);
$nc = $nocontrol;
$nombre = $alumno->Nombre;
$appat = $alumno->Ap_Pat;
$apmat = $alumno->Ap_Mat;
$nombrecompleto = $nombre." ".$appat." ".$apmat;
$codigo = $_GET['codigo'];
if(!isset($_GET['codigo'])){
    echo $codigo;
}
$codAsesoria = $_GET['codigo'];
$sql = "SELECT * FROM HORARIOS WHERE COD_MATERIA='$codAsesoria'";
$conn = abrirBD();
$resultado = $conn->query($sql);
$conn->close();
?>
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Horario</title>
    <link rel="stylesheet" href="css/tablahorarios.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript">
        var nocontrol = '<?php echo $_SESSION['nocontrol']?>';
         var codigo = '<?php echo $_GET['codigo']?>';
    </script>
    <script src="js/EliminarAsesoria.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<div class="row">
            <nav class="navbar navbar-expand navbar-dark fixed-top encabezado">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-content" aria-control="nav-content"
                        aria-expanded="false" aria-label="toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="#" class="navbar-brand">
                        <h1 class="lead display-4">Mis asesorías</h1>
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
                                <a href='miperfil.php' class="dropdown-item lead">Mi perfil</a>
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
    <div class="container-fluid">
            <div class="row info alert alert-primary ">
                <?php 
                $conn = abrirBD();
                $select = "SELECT NO_MAESTRO,NOMBRE_MATERIA,DEPARTAMENTO,SEMESTRE FROM ASESORIAS WHERE CODIGO='$codAsesoria'";
                $rs = $conn->query($select);
               while($resul = mysqli_fetch_array($rs)){ 
                $nom_maestro = $resul[0];
                $nombre_materia = $resul[1];
                $departamento = $resul[2];
                $semestre = $resul[3];
               }   
                ?>    
                <div class="col-md-3">
                <p class="lead">Maestro: <?php echo utf8_encode($nom_maestro);?></p>
                </div>
                <div class="col-md-2">
                <p class="lead">Materia: <?php echo utf8_encode($nombre_materia);?></p>
                </div>
                <div class="col-md-3">
                <p class="lead">Departamento: <?php echo utf8_encode($departamento);?></p>
                </div>
                <div class="col-md-2">
                <p class="lead">Semestre: <?php echo $semestre;?></p>
                </div>
                <div class="col-md-2">
                <form  method="post"><p class="lead">Darme de baja:<button type="button"class=" btn btn-primary"style="border:0; background-color:transparent;cursor:pointer;" id="eliminar" data-target="#mensaje"data-toggle="modal"><img src="css/delete.png" width="30px"height="30px"></button></p></form>
                </div>      
            </div>
        <div class="row">
            <table class="table table-striped">
                <thead class="tabla">
                    <tr>
                        <th class="lead">Código</th>
                        <th class="lead">Lunes</th>
                        <th class="lead">Martes</th>
                        <th class="lead">Miércoles</th>
                        <th class="lead">Jueves</th>
                        <th class="lead">Viernes</th> 
                    </tr>
                    <?php
                        while($row=mysqli_fetch_array($resultado)){
                    ?>
                    <tr class="alert alert-primary">
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                    <td><?php echo $row[5];}?></td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>


<div class="row justify-content-end">    
  <div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalLabel">
                                Mensaje del Sistema
                            </h4>
                        </div>
                        <div class="modal-body" id="mens">
                            Alumno registrado!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary lead" data-dismiss="modal" onclick="window.location.href='asesoriasinscritas.php'">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
</div>
<div class="row justify-content-end">    
  <button type="button"class="mt-5 mr-5 btn btn-primary navegacion"style="border:0; background-color:transparent;cursor:pointer;position:absolute;" value=""data-toggle="tooltip" title="Página anterior"onclick="window.location.href='asesoriasiscritas.php'"><img  src="css/return.png" width="120px"height="120px"></button>
</div>
</body>
</html>