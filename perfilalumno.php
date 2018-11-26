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

$numcontrol = $_GET['cod'];
$sql = "SELECT nocontrol,pass,Nombre,Ap_Pat,Ap_Mat,Carrera,SEMESTRE,Correo FROM alumno WHERE nocontrol='$numcontrol'";
$conn = abrirBD();
$resultado = $conn->query($sql);
while($resul = mysqli_fetch_array($resultado)){ 
    $numcontrol = $resul[0];
    $contraseña = $resul[1];
    $Nombrea = $resul[2];
    $Ape_pat = $resul[3];
    $Ape_mat = $resul[4];
    $Carrera = $resul[5];
    $semestre = $resul[6];
    $correo = $resul[7];
    }
$conn->close();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumnos Datos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/miperfil.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/ModificarPerfil.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/mensaje.js"></script>
</head>
<body class="contenedor">
    <div class="row justify-content-center">
        <img src="banner.png" alt="" class="w-100 ml-2 mr-2" style="border:3px solid gray; height:100px">
    </div>
    <div class="page-header pb-2 pt-2">
            <h1 class="lead display-3 justify-content-center">Información Alumno <img src="alumno.png" alt="Login"></h1>
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
                        <input type="text" value="<?php echo $numcontrol;?>" class="cajas lead" id="nocontrol" placeholder="Número de control"maxlength=8 required>
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
                        <input type="text" value="<?php echo $Nombrea;?>" class="cajas lead" id="nombre" placeholder="Nombre"required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row ">
                        <input type="e-mail" value="<?php echo $correo?>" id="correo" class="cajas lead"maxlength=128 placeholder="Correo"required>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="radio" name="sexo" id="sexo" class="radio my-2 mx-3 lead">
                        <label for="hombre" class="radio lead">Hombre</label>
                        <input type="radio" name="sexo" id="sexo" class="radio my-2 mx-3 lead">
                        <label for="mujer" class="radio lead">Mujer</label>
                        <input type="radio" name="sexo" id="sexo" class="radio my-2 mx-3 lead">
                        <label for="No binario" class="radio lead">No binario</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3 forma">
        <div class="row" style="border:1px solid white;">
            <div class="col">
                <div class="row  mt-4 justify-content-center">
                    <p class="lead">Información del usuario:
                    </p>
                </div>
                <div class="row justify-content-center">
                    <div class="row my-2 ">
                        <select id="carrera" value="<?php echo $Carrera?>" class="lead">
                          <option value="Ing. en Sistemas Computacionales">Ing. en Sistemas Computacionales</option>
                            <option value="Ing. Electromecánica">Ing. Electromecánica</option>
                            <option value="Ing. Civil">Ing. Civil</option>
                            <option value="Contabilidad">Contabilidad</option>
                        </select>
                    </div>
                    <div class="row my-3 justify-content-center">
                        <div class="row">
                            <input type="text" value="<?php echo $semestre?>" class="cajas lead"maxlength=2 id="semestre"placeholder="Semestre" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2 mt-2 container w-100">
        <div class="row  justify-content-center">
            <input type="submit" value="Guardar"  id="guardarbtn"class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje">
            <input type="submit" value="Borrar"  id="eliminarbtn"class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje">
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
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal" onclick="window.location.href='menualumnos.php'">Aceptar</button>
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
    $("#eliminarbtn").click(function(){
    window.location.href='eliminaralumno.php?nc=<?php echo $numcontrol;?>';
    });
});

</script>
</html>