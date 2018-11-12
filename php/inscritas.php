<?php 
session_start();
require_once('Clases/conexion.php');
require_once('Clases/asesoria.php');
$conn = abrirBD();
$tabla ="";
$nocontrol = $_SESSION['nocontrol'];


$query = "SELECT *FROM ASESORIASREG WHERE CONTROL_ALUMNO=$nocontrol";
if(isset($_POST['busqueda']))
{
	$q=$conn->real_escape_string($_POST['busqueda']);
	$query="SELECT CODIGO_ASESORIA FROM ASESORIASREG WHERE 
		CODIGO_ASESORIA LIKE '%".$q."%' AND CONTROL_ALUMNO=$nocontrol";
}
$buscarAsesorias=$conn->query($query);
if ($buscarAsesorias->num_rows > 0)
{

	$tabla.= 
	'<table class="table table-striped">.
    <thead class="encabezado">
    <tr>
		<th class="lead">Codigo</th>
		<th class="lead">Maestro</th>
		<th class="lead">Materia</th>
		<th class="lead">Departamento</th>
		<th class="lead">Semestre</th>
    </tr>
</thead>';
	while($fila= $buscarAsesorias->fetch_assoc())
	{
		$asesoria = new Asesoria();
		$asesoria->ObtenerAsesoria($fila['Codigo_Asesoria'],$asesoria);
		$tabla.=
		'<tr>
		<td><a href="horario.php?cod='.$fila['Codigo_Asesoria'].'">'.$fila['Codigo_Asesoria'].'</a></td>
		<td>'.utf8_encode($asesoria->Nom_Maestro).'</td>
		<td>'.utf8_encode($asesoria->Nombre).'</td>
		<td>'.utf8_encode($asesoria->Departamento).'</td>
		<td>'.$asesoria->Semestre.'</td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>