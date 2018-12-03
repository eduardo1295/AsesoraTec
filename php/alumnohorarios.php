<?php 
require_once('Clases/conexion.php');
$conn = abrirBD();
$tabla ="";
$query = "SELECT *FROM alumno";
if(isset($_POST['busqueda']))
{
	$q=$conn->real_escape_string($_POST['busqueda']);
	$query="SELECT * FROM alumno WHERE 
		NoControl LIKE '%".$q."%' OR
		PASS LIKE '%".$q."%' OR
		NOMBRE LIKE '%".$q."%' OR
        AP_PAT LIKE '%".$q."%' OR
        AP_MAT LIKE '%".$q."%' OR
        CARRERA LIKE '%".$q."%' OR
        SEMESTRE LIKE '%".$q."%' OR
        CORREO LIKE '%".$q."%' OR
		SEXO LIKE '%".$q."%'";
}
$buscarAlumnos=$conn->query($query);
if ($buscarAlumnos->num_rows > 0)
{
    
	$tabla.= 
	'<table class="table table-striped">
    <thead class="encabezado">
    <tr>
        <th class="lead">NoControl</th>
        <th class="lead">Contraseña</th>
        <th class="lead">Nombre</th>
        <th class="lead">Apellido_Paterno</th>
        <th class="lead">Apellido_Materno</th>
        <th class="lead">Carrera</th>
        <th class="lead">Semestre</th>
        <th class="lead">Correo</th>
        <th class="lead">Sexo</th>
    </tr>
</thead>';
	while($fila= $buscarAlumnos->fetch_assoc())
	{
		$tabla.=
		'<tr>
        <td><a href="documentoha.php?cod='.$fila['nocontrol'].'">'.$fila['nocontrol'].'</a></td>
            <td>'.utf8_encode($fila['pass']).'</td>
			<td>'.utf8_encode($fila['Nombre']).'</td>
			<td>'.utf8_encode($fila['Ap_Pat']).'</td>
            <td>'.utf8_encode($fila['Ap_Mat']).'</td>
            <td>'.utf8_encode($fila['Carrera']).'</td>
			<td>'.utf8_encode($fila['Semestre']).'</td>
			<td>'.utf8_encode($fila['Correo']).'</td>
			<td>'.$fila['Sexo'].'</td>
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