<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('php/Clases/conexion.php');
require_once('php/Clases/alumno.php');
require_once('php/Clases/asesoria.php');
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
$asesoria = new Asesoria();
$codigo = $_GET['cod'];
$existe = $asesoria->AsesoriaExiste($codigo);
if(!isset($_GET['cod'])){
    header("Location: menu1.php");
}
if($existe==0)
{
    header("Location: menu1.php");
}
$codAsesoria = $_GET['cod'];
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
                $select = "SELECT NO_MAESTRO,NOMBRE_MATERIA,TIPO,SEMESTRE FROM ASESORIAS WHERE CODIGO='$codAsesoria'";
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
                <div class="col-md-2">
                <p class="lead">Semestre: <?php echo $semestre;?></p>
                </div>
                <div class="col-md-2">
                <form method="post">
                    <p class="lead">Inscribirme:<button type="submit"class="btn btn-primary navegacion"name="inscribir" style="border:0; background-color:transparent;cursor:pointer;"data-toggle="modal"data-target="#mensaje" value=""data-toggle="tooltip" title="Inscribirme"><img src="css/addb.png" width="30px"height="30px"></button></p>
                </form>
                </div>
            </div>
        <div class="row">
            <table class="table table-striped">
                <thead class="tabla">
                    <tr>
                        <th class="lead">Codigo</th>
                        <th class="lead">Lunes</th>
                        <th class="lead">Martes</th>
                        <th class="lead">Miércoles</th>
                        <th class="lead">Jueves</th>
                        <th class="lead">Viernes</th> 
                    </tr>
                    <?php
                    $codigo = "";
                    $lunes ="";
                    $martes ="";
                    $miercoles="";
                    $jueves="";
                    $viernes = "";
                        while($row=mysqli_fetch_array($resultado)){
                    ?>
                    <tr class="alert alert-primary">
                    <td><?php $codigo = $row[0];echo $row[0]; ?></td>
                    <td><?php $lunes = $row[2]; echo $row[2]; ?></td>
                    <td><?php $martes = $row[3]; echo $row[3]; ?></td>
                    <td><?php $miercoles = $row[4];echo $row[4]; ?></td>
                    <td><?php $jueves = $row[5]; echo $row[5]; ?></td>
                    <td><?php $viernes = $row[6];echo $row[6];}?></td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <?php
if(isset($_POST['inscribir']))
{
require_once('php/Clases/alumno.php');
$alumno = new Alumno();
$res = $alumno->YaInscrito($nc,$codAsesoria);
    if($res ==0)
    {
    $horalunes = explode(" ",$lunes);
    $horamartes = explode(" ",$martes);
    $horamiercoles = explode(" ",$miercoles);
    $horajueves = explode(" ",$jueves);
    $horaviernes = explode(" ",$viernes);
    $dialunes = $horalunes[0];
    $diamartes = $horamartes[0];
    $diamiercoles = $horamiercoles[0];
    $diajueves = $horajueves[0];
    $diaviernes = $horaviernes[0];
    if(!isset($dialunes))
        $dialunes="0-0";  
    if($diamartes=="")
        $diamartes="0-0";  
    if($diamiercoles=="")
        $diamiercoles="0-0";  
    if($diajueves=="")
        $diajueves="0-0";  
    if($diaviernes=="")
        $diaviernes="0-0";  
        $sql = "SELECT CODIGO_ASESORIA FROM ASESORIASREG WHERE CONTROL_ALUMNO=$nc";
    $conn = abrirBD();
    $res = $conn->query($sql);
    $conn->close();
    $valor = 0;
    while($renglon = mysqli_fetch_array($res))
    {
        $cA= $renglon[0];
        $consulta2 = "SELECT LUNES,MARTES,MIERCOLES,JUEVES,VIERNES FROM HORARIOS WHERE COD_MATERIA='$cA'";
        $conn = abrirBD();
        $r = $conn->query($consulta2);
        $conn->close();
        while($ren = mysqli_fetch_array($r))
        {
            $lunesH= $ren[0];
            $inicioLunes = "";
            $finLunes ="";
            $band = false;
            for($i = 0;$i<strlen($lunesH);$i++)
            {
                if($band == false)
                    $inicioLunes.= $lunesH[$i];
                else
                $finLunes.= $lunesH[$i];
                if($lunesH[$i] == "-")
                    $band=true;
            }
            echo $inicioLunes;
            $martesH = $ren[1];
            $miercolesH = $ren[2];
            $juevesH = $ren[3];
            $viernesH = $ren[4];
        }
    }
    if($valor == 1)
    {
        echo '<div class="alert alert-danger alert-dismissible mt-5">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong> Esta asesoría se te cruza con otra de tu carga!
      </div>';
    }
    else{
        $alumno->InscribirAsesoria($nc,$codAsesoria);
        echo '<div class="alert alert-success alert-dismissible mt-5">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Exito!</strong> Te has registrado en esta asesoría!
        </div>';
    }
  }
  else
  {
      echo '<div class="alert alert-danger alert-dismissible mt-5">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error!</strong> Ya estabas registrado en esta asesoría!
    </div>';
  }
}
?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
    <div class="row justify-content-end"style="left:0;bottom:0;width:100%;position:fixed;">
    <button type="button"class=" mt-5 btn btn-primary navegacion"style="border:0; background-color:transparent;cursor:pointer;" value=""data-toggle="tooltip" title="Página anterior"onclick="window.location.href='asesoriasd.php'"><img  src="css/return.png" width="120px"height="120px"></button>
    </div>
</body>
</html>
