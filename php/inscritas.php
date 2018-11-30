<?php 
session_start();
require_once('Clases/conexion.php');
require_once('Clases/asesoria.php');
$conn = abrirBD();
$tabla ="";
$nocontrol = $_SESSION['nocontrol'];
$query = "SELECT *FROM ASESORIASREG WHERE CONTROL_ALUMNO='$nocontrol'";
if(isset($_POST['buscar']))
{
	$q=$conn->real_escape_string($_POST['buscar']);
	$query= "SELECT * FROM ASESORIASREG WHERE 
		CODIGO_ASESORIA LIKE '%".$q."%'";
}
$buscarAsesorias=$conn->query($query);
if($buscarAsesorias->num_rows > 0)
{

	$tabla.= 
	'<div class="row pl-1"><table class="table table-striped">.
    <thead class="encabezado">
    <tr>
		<th class="lead">Codigo</th>
		<th class="lead">Maestro</th>
		<th class="lead">Nombre</th>
		<th class="lead">Lunes</th>
		<th class="lead">Martes</th>
		<th class="lead">Miercoles</th>
		<th class="lead">Jueves</th>
		<th class="lead">Viernes</th>
		<th class="lead">Acción</th>
    </tr>
	</thead>';
	while($fila= $buscarAsesorias->fetch_assoc())
	{
		$cod = $fila['Codigo_Asesoria'];
		$SQL = "SELECT * FROM HORARIOS WHERE COD_MATERIA ='$cod'";
		$res = $conn->query($SQL);
		$asesoria = new Asesoria();
		$asesoria->ObtenerAsesoria($fila['Codigo_Asesoria'],$asesoria);
		$activa = $asesoria->Activo;
		while($row = $res->fetch_assoc())
		{
			if($activa=="Si")
			{
			$tabla.=
			'<tr>
			<td><a href="horarios.php?codigo='.$fila['Codigo_Asesoria'].'&ne='.$fila['NOECON'].'">'.$fila['Codigo_Asesoria'].'</a></td>
			<td>'.utf8_encode($asesoria->Nom_Maestro).'</td>
			<td>'.utf8_encode($asesoria->Nombre).'</td>
			<td>'.utf8_encode($row['Lunes']).'</td>
			<td>'.utf8_encode($row['Martes']).'</td>
			<td>'.utf8_encode($row['Miercoles']).'</td>
			<td>'.utf8_encode($row['Jueves']).'</td>
			<td>'.utf8_encode($row['Viernes']).'</td>
			<td><button class="btn btn-danger" name="'.$fila['Codigo_Asesoria'].'" id="darbaja" data-toggle="modal" data-target="#mensaje">Dar de baja</button><button class="btn btn-success ml-1" name='.$fila['Codigo_Asesoria'].' id="asistencias">Asistencias</button><button class="btn btn-info ml-1" name='.$fila['Codigo_Asesoria'].' id="registrarAs">Reg. asistencia</button></td>
			</tr>
			';	
			}
		}
		
		
	}
	$tabla.='</table></div>';
	
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}
echo $tabla;
?>