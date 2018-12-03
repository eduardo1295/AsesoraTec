<?php
session_start();
require_once('Clases/conexion.php');
require_once('Clases/alumno.php');
$conn = abrirBD();
$tabla ="";
$nocontrol = $_SESSION['nocontrol'];
$concatenados = $_SESSION['codigo'];
$arr = explode("*",$concatenados);
$codigo = $arr[0];
$noecon = $arr[1];
$query = "SELECT * FROM ASISTENCIASREG WHERE CONTROL_ALUMNO=$nocontrol AND NOECON='$noecon' AND CODIGO_ASESORIA='$codigo'";

if(isset($_POST['busqueda']))
{
    $q=$conn->real_escape_string($_POST['busqueda']);
    $query="SELECT * FROM ASISTENCIASREG WHERE 
        FECHA LIKE '%".$q."%'AND CONTROL_ALUMNO=$nocontrol AND NOECON='$noecon' AND CODIGO_ASESORIA='$codigo' OR PASSWORDDIA LIKE '%".$q."%' AND CONTROL_ALUMNO=$nocontrol AND NOECON='$noecon' AND CODIGO_ASESORIA='$codigo'";
}	
$verasistencias = $conn->query($query);
if($verasistencias->num_rows > 0)
{
    $tabla.='<div class="row">
    <table class="table table-striped">
        <thead class="tabla">
                    <tr style="background:blue;color:white;">
                        <th style="border:1px solid white;"class="lead">Fecha</th>
                        <th style="border:1px solid white;"class="lead">Contraseña ingresada</th>
                    </tr>
        </thead>';
    while($row = $verasistencias->fetch_assoc())
    {
        $tabla.='
        <tr>
            <td>'.$row['Fecha'].'</td>
            <td>'.$row['PasswordDia'].'</td>
        </tr>';
    }
$tabla.='</table></div>';
}
else{
    $tabla="No se encontraron coincidencias";
}
echo $tabla;
?>