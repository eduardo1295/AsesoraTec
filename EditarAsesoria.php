<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar asesoría</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
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
    $codigo = $_GET['cod'];
    
    $conexion = abrirBD();
    $maestro = new maestro();
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
    $SQL = "SELECT noControl,Nombre FROM ASESORADOS WHERE NoAsesoria= '$codigo'";
    $resultado = $conexion->query($SQL);
    $conexion->close();
    $infoAsesorado= array();
    while($resul = mysqli_fetch_array($resultado)){ 
        array_push($infoAsesorado,$resul[0]);
        array_push($infoAsesorado,$resul[1]);
    }
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
    <div class="page-header pb-2 pt-2">
        <h1 class="lead display-3 justify-content-center">Editar Asesoría
            <img src="agregar.png" alt="Login">
        </h1>
    </div>
    <div class="container mt-3 forma">
        <div class="row justify-content-center" style="border:1px solid white;">
            <div class="col">
                <div class="row  mt-4 justify-content-center">
                    <p class="lead mx-2">Información de la asesoría:
                    </p>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="codigo" placeholder="Código" readonly value="<?php echo $infoAsesoria[0]?>" >
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="nombrea" placeholder="Nombre de la asesoría" value="<?php echo $infoAsesoria[2]?>">
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="semestre" placeholder="Semestre" value="<?php echo $infoAsesoria[4]?>">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="row my-2 ">
                        <label for="depto"></label>
                        <select name="depto" id="depto" class="lead">
                            <option value="<?php echo $infoAsesoria[3]?>"><?php echo $infoAsesoria[3]?></option>
                            <option value="Especialidad en Desarrollo Web">Especialidad en Desarrollo Web</option>
                            <option value="Especialidad en seguridad en TIC'S">Especialidad en seguridad en TIC'S</option>
                            <option value="Especialidad en Investigación">Especialidad en Investigación</option>
                        </select>
                    </div>
                </div>
                <div class="row  mt-4 justify-content-center">
                        <p class="lead mx-2">Agregar asesor *Opcional*:
                        </p>
                    </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="asesor" placeholder="Alumno a Impartir" value="<?php if(isset($infoAsesorado[0])) echo $infoAsesorado[0]?>">
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="row">
                        <input type="text" class="cajas lead" id="nocontrol" placeholder="Numero de control" value="<?php if(isset($infoAsesorado[1])) echo $infoAsesorado[1]?>">
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
            <td><input type="text" name="" id="h1" value="<?php echo $infoSalon[0]?>" ></td>
            <td><input type="text" name="" id="h2" value="<?php echo $infoSalon[1]?>" ></td>
            <td><input type="text" name="" id="h3" value="<?php echo $infoSalon[2]?>" ></td>
            <td><input type="text" name="" id="h4" value="<?php echo $infoSalon[3]?>" ></td>
            <td><input type="text" name="" id="h5" value="<?php echo $infoSalon[4]?>" ></td>
        </tr>
        <tr>
            <td>Salon</td>
            <td><input type="text" name="" id="s1" value="<?php echo $infoHora[0]?>"></td>
            <td><input type="text" name="" id="s2" value="<?php echo $infoHora[1]?>"></td>
            <td><input type="text" name="" id="s3" value="<?php echo $infoHora[2]?>"></td>
            <td><input type="text" name="" id="s4" value="<?php echo $infoHora[3]?>"></td>
            <td><input type="text" name="" id="s5" value="<?php echo $infoHora[4]?>"></td>
        </tr>
    </table>
    <br>
    <br>
    <div class="mb-2 container w-100">
        <div class="row  justify-content-center">
            <div class="col">
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
                                Asesoría agregada a la lista
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary lead" data-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="button" class="mt-2 mr-5 btn btn-primary navegacion" style="border:0; background-color:transparent;cursor:pointer;"
                    value="" data-toggle="tooltip" title="Página anterior" onclick="window.location.href='menu2.php'"><img
                        class="hola" src="css/return.png"></button>
            </div>
        </div>
    </div>


</body>

</html>