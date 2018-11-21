<?php 
require_once('Clases/conexion.php');
$conn = abrirBD();
$tabla ="";
$query = "SELECT *FROM maestros";
if(isset($_POST['busqueda']))
{
	$q=$conn->real_escape_string($_POST['busqueda']);
	$query="SELECT * FROM maestros WHERE 
		NoECON LIKE '%".$q."%' OR
		PASS LIKE '%".$q."%' OR
		NOMBRE LIKE '%".$q."%' OR
        AP_PAT LIKE '%".$q."%' OR
        AP_MAT LIKE '%".$q."%' OR
        DEPARTAMENTO LIKE '%".$q."%' OR
		CORREO LIKE '%".$q."%'";
}
$buscarAlumnos=$conn->query($query);
if ($buscarAlumnos->num_rows > 0)
{
    
	$tabla.= 
	'<table class="table table-striped">
    <thead class="encabezado">
    <tr>
        <th class="lead">NoEconomico</th>
        <th class="lead">Contraseña</th>
        <th class="lead">Nombre</th>
        <th class="lead">Apellido_Paterno</th>
        <th class="lead">Apellido_Materno</th>
        <th class="lead">Departamento</th>
        <th class="lead">Correo</th>
    </tr>
</thead>';
	while($fila= $buscarAlumnos->fetch_assoc())
	{
		$tabla.=
		'<tr>
        <td><a href="perfilmaestro.php?cod='.$fila['noecon'].'">'.$fila['noecon'].'</a></td>
            <td>'.utf8_encode($fila['pass']).'</td>
			<td>'.utf8_encode($fila['Nombre']).'</td>
			<td>'.utf8_encode($fila['Ap_Pat']).'</td>
            <td>'.utf8_encode($fila['Ap_Mat']).'</td>
            <td>'.utf8_encode($fila['Departamento']).'</td>
			<td>'.$fila['Correo'].'</td>
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