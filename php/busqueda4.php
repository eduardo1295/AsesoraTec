<?php 
session_start();
require_once('Clases/conexion.php');
require_once('Clases/maestro.php');
$conn = abrirBD();
$tabla ="";
$query = "";
if(isset($_SESSION['usuariologueado'])){
    require_once('php/Clases/admin.php');
    $admin = new Admin();
    $usuario= $_SESSION['usuario'];
    $admin->ObtenerDatos($usuario,$admin);
    $nc = $admin;
    $nombre = $admin->Nombre;
    $appat = $admin->Ap_Pat;
    $apmat = $admin->Ap_Mat;
    $nombrecompleto = $nombre." ".$appat." ".$apmat;
	$query = "SELECT Codigo,Nombre_Materia,Tipo,Semestre FROM ASESORIAS WHERE No_Maestro = '$nombrecompleto' AND Activo = 'Si'";
	$buscarAsesorias=$conn->query($query);
	if ($buscarAsesorias->num_rows > 0)
	{
	$tabla.= 
	'<table class="table table-striped">
    <thead class="encabezado">
    <tr>
		<th class="lead">
		<div class="d-flex justify-content-center">Codigo</div></th>
        <th class="lead"><div class="d-flex justify-content-center">Materia</div></th>
        <th class="lead"><div class="d-flex justify-content-center">Tipo</div></th>
		<th class="lead"><div class="d-flex justify-content-center">Semestre</div></th>
		<th class="lead"><div class="d-flex justify-content-center">Accion</div></th>
    </tr>
	</thead>';
	while($fila= $buscarAsesorias->fetch_assoc())
	{
		/*<td><a href="EditarAsesoria.php?cod='.$fila['Codigo'].'">'.$fila['Codigo'].'</a></td>*/
		$tabla.=
		
		'<tr>
		<td>
		<div class="d-flex justify-content-center">
		'.$fila['Codigo'].'
		</div>
		</td>
			<td name="codigo">
			<div class="d-flex justify-content-center">
			'.utf8_encode($fila['Nombre_Materia']).'
			</div>
			</td>
			<td>
				<div class="d-flex justify-content-center">
					'.utf8_encode($fila['Tipo']).'
					
				</div>
				</td>
			<td>
			<div class="d-flex justify-content-center">
			'.$fila['Semestre'].'
			</div>
			</td>
			<td>
				<div class="d-flex justify-content-center">
				<form action="EditarAsesoria.php" method="post"> 
				<input type="hidden" name="codigo" value="'.$fila['Codigo'].'">
				<input type="hidden" name="tipo" value="'.utf8_encode($fila['Tipo']).'">
				<button type="submit" name="editar"class="btn btn-info btn-sm mr-1">Editar</button>
				</form>
				<form id="eliminar" action="" method="post"> 
				<input type="hidden" name="codigo" value="'.$fila['Codigo'].'">
				<button type="button" name="eliminar" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" >Eliminar</button>
				</div>
				</form>
				
			</td>
		 </tr>
		';
	}
	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}
}
else {
	$query = "SELECT *FROM ASESORIAS";
	if(isset($_POST['busqueda']))
	{
		$q=$conn->real_escape_string($_POST['busqueda']);
		$query="SELECT * FROM ASESORIAS WHERE 
			CODIGO LIKE '%".$q."%' OR
			NO_MAESTRO LIKE '%".$q."%' OR
			NOMBRE_MATERIA LIKE '%".$q."%' OR
			SEMESTRE LIKE '%".$q."%' OR
			Tipo LIKE '%".$q."%' OR
			NOECON LIKE '%".$q."%'";
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
        <th class="lead">Tipo</th>
		<th class="lead">Semestre</th>
		<th class="lead">NoEconomico</th>
    </tr>
	</thead>';
	while($fila= $buscarAsesorias->fetch_assoc())
	{
		$tabla.=
		'<tr>
        <td><a data-toggle="tooltip" title="Selecciona el codigo" href="editarasesoriasa.php?cod='.$fila['Codigo'].'& tipo='.$fila['Tipo']. '& NOECON='.$fila['NOECON'].'">'
        .$fila['Codigo'].'</a></td>
			<td>'.utf8_encode($fila['No_Maestro']).'</td>
			<td>'.utf8_encode($fila['Nombre_Materia']).'</td>
			<td>'.utf8_encode($fila['Tipo']).'</td>
			<td>'.($fila['Semestre']).'</td>
			<td>'.$fila['NOECON'].'</td>
		 </tr>
		';
	}

$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}
}
echo $tabla;
?>