<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Editar asesoría</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <style>
    .copyright{
        background: blue;
        color: white;
    }
    
    </style>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/AgregarAsesoria.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <script src=""></script>
</head>
<?php
session_start();
require_once('php/Clases/conexion.php');
require_once('php/Clases/maestro.php');
if(isset($_SESSION['maestrologeado'])){
    $codigo = $_POST['codigo'];
    $tipo = utf8_decode($_POST['tipo']);
    $conexion = abrirBD();
    $maestro = new maestro();
    $existe = $maestro->MaestroExists($_SESSION['noeconomico']);
    if($existe != 1){
        session_destroy();
        header("Location: login.php");  
    }
    $nocontrol= $_SESSION['noeconomico'];
    $maestro->ObtenerDatos($nocontrol,$maestro);
    $nc = $nocontrol;
    $nombre = utf8_encode($maestro->Nombre);
    $appat =  utf8_encode($maestro->Ap_Pat);
    $apmat =  utf8_encode($maestro->Ap_Mat);
    $nombrecompleto = $nombre." ".$appat." ".$apmat;
    $SQL = "SELECT * FROM ASESORIAS WHERE Codigo= '$codigo'";
    $resultado = $conexion->query($SQL);
    $conexion->close();
    $infoAsesoria = array();
    while($resul = mysqli_fetch_array($resultado)){ 
        array_push($infoAsesoria,$resul[0]);
        array_push($infoAsesoria,$resul[1]);
        array_push($infoAsesoria,$resul[2]);
        array_push($infoAsesoria,$resul[3]);
        array_push($infoAsesoria,$resul[4]);
    }

    $conexion = abrirBD();
    $SQL = "SELECT noControl,Nombre FROM ASESORADOS WHERE codigo= '$codigo'";
    $resultado = $conexion->query($SQL);
    $infoAsesorado= array();
    while($resul = mysqli_fetch_array($resultado)){ 
            array_push($infoAsesorado,$resul[0]);
            array_push($infoAsesorado,$resul[1]);
        }
    
    
    $conexion->close();
    $conexion = abrirBD();
    $SQL = "SELECT Lunes,Martes,Miercoles,Jueves,Viernes FROM Horarios WHERE Cod_Materia= '$codigo'";
    $resultado = $conexion->query($SQL);
    $conexion->close();
    $infoAux= array();
    while($resul = mysqli_fetch_array($resultado)){ 
        array_push($infoAux,$resul[0]);
        array_push($infoAux,$resul[1]);
        array_push($infoAux,$resul[2]);
        array_push($infoAux,$resul[3]);
        array_push($infoAux,$resul[4]);
    }
    $infoHora= array();
    $infoSalon= array();
    for($x=0; $x < 5 ; $x++){
        $valor = explode(" ",$infoAux[$x]);
        array_push($infoHora,$valor[0]);
        array_push($infoSalon,$valor[1]);
    }
}
else {
    
}
?>
<body>
    <input id="EditarCodigo" type="hidden" name="" value="<?php echo $codigo?>">
    <input id="EditarTipo" type="hidden" name="" value="<?php echo utf8_encode($tipo)?>">
    
    <div class="row justify-content-center">
    <img src="bannerac.png" alt="" class="w-100" style="border:3px solid gray;">
</div>
    <div class="row"style="background:blue;"> 
        <div class="page-header encabezado w-100 py-3 col"style="color:white">
        <div class="row">
        <h1 class="lead display-4 ml-4">Editar asesoría</h1>
        </div>          
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
    
    <div class="container mt-3 forma">
        <div class="row justify-content-center" style="border:1px solid white;">
            <div class="col">
            
                <div class="row  mt-4 justify-content-center">
                    <p class="lead mx-2">Información de la asesoría:
                    </p>
                </div>
                <div class="control row ml-5 pl-2  text-white">
                    Tipo Asignatura:
                </div>
                <div class="row  justify-content-center">
                    <div class="row" id="tip">
                        <select name="" id="tipo" class="lead" disabled="false">
                        <option value="Ciencias Básicas">Ciencias Básicas</option>
                        <option value="Asignatura de la Carrera">Asignatura de la Carrera</option>
                        <option value="Asignatura Equivalentes">Asignatura Equivalentes</option>
                        <option value="Económico Administrativo">Económico Administrativo</option>
                        </select>
                    </div>
                </div>
                <div class="control row ml-5 pl-2  text-white">
                    Código:
                </div>
                <div class="row  justify-content-center">
                    <div class="row" id="co">

                    </div>
                </div>
                <div class="row ml-5 pl-2 mt-3 text-white">
                    Nombre Asesoría:
                </div>
                <div class="row  justify-content-center">
                    <div class="row" id="nom">
                        <input type="text" class="cajas lead" id="nombrea" placeholder="Nombre de la asesoría">
                    </div>
                </div>
                <div class="row ml-5 pl-2 mt-3 text-white">
                    Semestre:
                </div>
                <div class="row  justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="semestre" placeholder="Semestre" value="1" readonly>
                    </div>
                </div>
                
                <div class="row  mt-4  justify-content-center">
                        <p class="lead mx-2">Agregar asesor *Opcional*:
                        </p>
                    </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="asesor" placeholder="Alumno a Impartir" value="<?php if(isset($infoAsesorado[1])){echo utf8_encode($infoAsesorado[1]);}?>">
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="nocontrol" placeholder="Numero de control" value="<?php if(isset($infoAsesorado[0])){echo utf8_encode($infoAsesorado[0]);}?>">
                    </div>
                </div>
                <br>
            </div>
            
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
    <h1 id="titulo_tabla">Horario: </h1> 
    </div>
    <table class="table	">
        <thead class="encabezado">
            <tr>
            <th class="lead"></th>
            <th class="lead">Lunes</th>
            <th class="lead">Martes</th>
            <th class="lead">Miercoles</th>
            <th class="lead">Jueves</th>
            <th class="lead">Viernes</th>
            </tr>
        </thead>
        <tr>
            <td>Horario</td>
            <td><input type="text" name="" value="<?php echo $infoHora[0] ?>" id="h1"></td>
            <td><input type="text" name="" value="<?php echo $infoHora[1] ?>" id="h2"></td>
            <td><input type="text" name="" value="<?php echo $infoHora[2] ?>" id="h3"></td>
            <td><input type="text" name="" value="<?php echo $infoHora[3] ?>" id="h4"></td>
            <td><input type="text" name="" value="<?php echo $infoHora[4] ?>" id="h5"></td>
        </tr>
        <tr>
            <td>Salon</td>
            <td><input type="text" name=""value="<?php echo $infoSalon[0] ?>" id="s1"></td>
            <td><input type="text" name=""value="<?php echo $infoSalon[1] ?>" id="s2"></td>
            <td><input type="text" name=""value="<?php echo $infoSalon[2] ?>" id="s3"></td>
            <td><input type="text" name=""value="<?php echo $infoSalon[3] ?>" id="s4"></td>
            <td><input type="text" name=""value="<?php echo $infoSalon[4] ?>" id="s5"></td>
        </tr>
    </table>
    <br>
    
        <div class="row  justify-content-center">
                <input type="submit" value="Editar asesoría" id="editarbtn" class="form-control btn btn-primary"
                    data-toggle="modal" data-target="#mensaje">
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
                                <button type="button" class="btn btn-primary lead" data-dismiss="modal" id="mensajes">Aceptar</button>
                            </div>
                        </div>
                    </div>
               
            </div>
            
        </div>
        <div class="row justify-content-end">
                <button type="button" class="mt-2 mr-5 btn btn-primary navegacion" style="border:0; background-color:transparent;cursor:pointer;"
                    value="" data-toggle="tooltip" title="Página anterior" onclick="window.location.href='verasesorias.php'"><img
                        class="hola" src="css/return.png"></button>
            </div>
    
    <div class="copyright"style="left:0;bottom:0;width:100%;">
                <div class="container">
                    <div class="col py-3">
                        <div class="col text-center">
                            Instituto Tecnológico de La Paz. &copy;
                            
                        </div>
                    </div>
                </div>
    </div>


</body>

</html>
