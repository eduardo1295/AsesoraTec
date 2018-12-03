<?php 
session_start();
require_once('Clases/conexion.php');
require_once('Clases/asesoria.php');
$conn = abrirBD();
$tabla ="";
$nocontrol = $_SESSION['nocontrol'];
$query = "SELECT * FROM ASESORIASREG WHERE CONTROL_ALUMNO='$nocontrol'";
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
	'<div class="row pl-1"><table class="table table-striped w-100 ml-1">
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
		$SQL = "SELECT * FROM HORARIOS WHERE COD_MATERIA  ='$cod'";
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
			<td>'.$fila['Codigo_Asesoria'].'</td>
			<td>'.utf8_encode($asesoria->Nom_Maestro).'</td>
			<td>'.utf8_encode($asesoria->Nombre).'</td>
			<td>'.utf8_encode($row['Lunes']).'</td>
			<td>'.utf8_encode($row['Martes']).'</td>
			<td>'.utf8_encode($row['Miercoles']).'</td>
			<td>'.utf8_encode($row['Jueves']).'</td>
			<td>'.utf8_encode($row['Viernes']).'</td>
			<td><a class="btn btn-success btn-sm mr-1" name="'.$fila['Codigo_Asesoria'].'" id="asistencias" href="misasistencias.php?codA='.$fila['Codigo_Asesoria'].'&ne='.$fila['NOECON'].'">Ver asistencias</a>
			<button type="button"id="darbaja" class="btn btn-danger btn-sm mr-1" data-id="'.$fila['Codigo_Asesoria'].'">Eliminar</button></td>
			</td>
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