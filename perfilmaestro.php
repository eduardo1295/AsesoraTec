<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('php/Clases/admin.php');
require_once('php/Clases/conexion.php');
if($_SESSION['usuariologeado']!='SI'){
    header("Location: login.php");
}

$admin = new Admin();
$usuario= $_SESSION['usuario'];
$admin->ObtenerDatos($usuario,$admin);
$nc = $admin;
$nombre = $admin->Nombre;
$appat = $admin->Ap_Pat;
$apmat = $admin->Ap_Mat;
$nombrecompleto = $nombre." ".$appat." ".$apmat;

$numeco = $_GET['cod'];
$sql = "SELECT noecon,pass,Nombre,Ap_Pat,Ap_Mat,Departamento,Correo FROM maestros WHERE noecon='$numeco'";
$conn = abrirBD();
$resultado = $conn->query($sql);
while($resul = mysqli_fetch_array($resultado)){ 
    $numeco = $resul[0];
    $contraseña = $resul[1];
    $Nombrem = $resul[2];
    $Ape_pat = $resul[3];
    $Ape_mat = $resul[4];
    $Departamento = $resul[5];
    $correo = $resul[6];
    }
$conn->close();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maestro Datos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/miperfil.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/modificarperfilmaestro.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/mensaje.js"></script>
</head>
<body class="contenedor">
<div class="row justify-content-center">
        <img src="banner.png" alt="" class="w-100 ml-2 mr-2" style="border:3px solid gray; height:100px">
    </div>
<div class="page-header pb-2 pt-2">
            <h1 class="lead display-3 justify-content-center">Informacion Maestro<img src="asesor.png" alt="Login"></h1>
    </div>        
    <div class="container mt-3 forma">
        <div class="row justify-content-center" style="border:1px solid white;">
            <div class="col">
                <div class="row  mt-4 justify-content-center">
                    <p class="lead mx-2">Información de la cuenta:
                    </p>
                </div>

         <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" value="<?php echo $numeco;?>" class="cajas lead" id="noeconomico" placeholder="Número de Economico"maxlength=8 required readonly>
                        </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="password"  value="<?php echo $contraseña;?>" class="cajas lead  ml-4" id=pass placeholder="Contraseña"maxlength=20 required>
                        <a class="btn btn-success" onclick="mostrar()"><i class="ojo fas fa fa-eye fa-fw"></i></a>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text"  value="<?php echo $Ape_pat;?>" class="cajas lead"id="appat" placeholder="Apellido Paterno"maxlength=50 required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center" required>
                    <div class="row">
                        <input type="text" value="<?php echo $Ape_mat;?>" class="cajas lead" id="apmat" placeholder="Apellido Materno"maxlength=50 required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row ">
                        <input type="text" value="<?php echo $Nombrem;?>" class="cajas lead" id="nombre" placeholder="Departamento"required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row ">
                 <input type="e-mail" value="<?php echo $Departamento;?>" id="departamento" class="cajas lead"maxlength=128 placeholder="Correo"required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row ">
                 <input type="e-mail" value="<?php echo $correo;?>" id="correo" class="cajas lead"maxlength=128 placeholder="Correo"required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2 mt-2 container w-100">
        <div class="row  justify-content-center">
            <input type="submit" value="Guardar"  id="guardarbtn"class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje">
            <input type="submit" value="Borrar"  id="borrarbtn"class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje">
            <div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
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
                                <div class="modal-body" id="mens">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal" onclick="window.location.href='menumaestros.php'">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
     </div>
</body>
<script>
  function mostrar(){
      var tipo = document.getElementById("pass");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
<script language="javascript">
$(document).ready(function(){
    $("#borrarbtn").click(function(){
    window.location.href='eliminarmaestro.php?nc=<?php echo $numeco;?>';
    });
});

</script>
</html>