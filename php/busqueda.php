<?php 
require_once('Clases/conexion.php');
$conn = abrirBD();
$tabla ="";
$query = "SELECT *FROM ASESORIAS";
if(isset($_POST['busqueda']))
{
	$q=$conn->real_escape_string($_POST['busqueda']);
	$query="SELECT * FROM ASESORIAS WHERE 
		CODIGO LIKE '%".$q."%' OR
		NO_MAESTRO LIKE '%".$q."%' OR
		NOMBRE_MATERIA LIKE '%".$q."%' OR
		SEMESTRE LIKE '%".$q."%' OR
		DEPARTAMENTO LIKE '%".$q."%'";
}
$buscarAsesorias=$conn->query($query);
if ($buscarAsesorias->num_rows > 0)
{
    
	$tabla.= 
	'<table class="table table-striped">
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
		$tabla.=
		'<tr>
        <td><a href="horario.php?cod='.$fila['Codigo'].'">'.$fila['Codigo'].'</a></td>
        <td>'.utf8_encode($fila['No_Maestro']).'</td>
			<td>'.utf8_encode($fila['Nombre_Materia']).'</td>
			<td>'.utf8_encode($fila['Departamento']).'</td>
			<td>'.$fila['Semestre'].'</td>
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