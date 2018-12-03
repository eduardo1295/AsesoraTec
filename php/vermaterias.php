<?php 
require_once('Clases/conexion.php');
$conn = abrirBD();
$tabla ="";
$query = "SELECT *FROM materias";
if(isset($_POST['busqueda']))
{
	$q=$conn->real_escape_string($_POST['busqueda']);
	$query="SELECT * FROM materias WHERE 
		Codigo LIKE '%".$q."%' OR
		Nombre LIKE '%".$q."%' OR
		Tipo LIKE '%".$q."%' OR
        Semestre LIKE '%".$q."%'";
}
$buscarmaterias=$conn->query($query);
if ($buscarmaterias->num_rows > 0)
{
    
	$tabla.= 
	'<table class="table table-striped">
    <thead class="encabezado">
    <tr>
        <th class="lead">Codigo</th>
        <th class="lead">Nombre</th>
        <th class="lead">Tipo</th>
        <th class="lead">Semestre</th>
    </tr>
</thead>';
	while($fila= $buscarmaterias->fetch_assoc())
	{
		$tabla.=
		'<tr>
        <td><a data-toggle="tooltip" title="Selecciona el codigo" href="perfilmateria.php?cod='.$fila['Codigo'].'">'.$fila['Codigo'].'</a></td>
            <td>'.utf8_encode($fila['Nombre']).'</td>
			<td>'.utf8_encode($fila['Tipo']).'</td>
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