<?php 
session_start();
require_once('Clases/conexion.php');
require_once('Clases/maestro.php');
$conn = abrirBD();
$tabla ="";
$query = "";
if(isset($_SESSION['maestrologeado'])){
	$maestro = new maestro();
	$nocontrol= $_SESSION['noeconomico'];	
	$maestro->ObtenerDatos($nocontrol,$maestro);
	$nc = $nocontrol;
	$nombre = utf8_encode($maestro->Nombre);
	$appat =  utf8_encode($maestro->Ap_Pat);
	$apmat =  utf8_encode($maestro->Ap_Mat);
	$nombrecompleto = $nombre." ".$appat." ".$apmat;
	$query= "SELECT `Nombre_Materia`,`Lunes`,`Martes`,`Miercoles`,`Jueves`,`Viernes`,Codigo,Tipo FROM asesorias,horarios WHERE horarios.NOECON= '$nocontrol' AND codigo = Cod_materia";
	
	$buscarAsesorias=$conn->query($query);
	if ($buscarAsesorias->num_rows > 0)
	{
	$tabla.= 
	'<table class="table table-striped">
    <thead class="encabezado">
    <tr>
		<th class="lead"><div class="d-flex justify-content-center">Materia</div></th>
		<th class="lead"><div class="d-flex justify-content-center">Lunes</div></th>
		<th class="lead"><div class="d-flex justify-content-center">Martes</div></th>
		<th class="lead"><div class="d-flex justify-content-center">Miercoles</div></th>
		<th class="lead"><div class="d-flex justify-content-center">Jueves</div></th>
		<th class="lead"><div class="d-flex justify-content-center">Viernes</div></th>
		<th class="lead"><div class="d-flex justify-content-center">Acción</div></th>
		
    </tr>
	</thead>';

	while($fila= $buscarAsesorias->fetch_assoc())
	{
		$tabla.=
		'<td name="codigo">
			<div class="d-flex justify-content-center">'.utf8_encode($fila['Nombre_Materia']).'</div></td>
			<td><div class="d-flex justify-content-center">'.$fila['Lunes'].'</div></td>
			<td><div class="d-flex justify-content-center">'.$fila['Martes'].'</div></td>
			<td><div class="d-flex justify-content-center">'.$fila['Miercoles'].'</div></td>
			<td><div class="d-flex justify-content-center">'.$fila['Jueves'].'</div></td>
			<td><div class="d-flex justify-content-center">'.$fila['Viernes'].'</div></td>
			<td>
				<div class="d-flex justify-content-center">
				<form action="EditarAsesoria.php" method="post"> 
				<input type="hidden" name="codigo" value="'.$fila['Codigo'].'">
				<input type="hidden" name="tipo" value="'.utf8_encode($fila['Tipo']).'">
				<button type="submit" name="editar"class="btn btn-info btn-sm mr-1">Editar</button>
				</form>
				<form id="eliminar" action="" method="post"> 
				<input type="hidden" name="codigo" value="'.$fila['Codigo'].'">
				<button type="button" name="eliminar" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#exampleModal" >Eliminar</button>
				</form>
				<form id="asistencia" action="documento1.php" method="get"> 
				<button type="submit" name="eliminar" value="'.$fila['Codigo'].'" class="btn btn-success btn-sm mr-1">Lista asistencia</button>
				</form>
				<button type="submit" name="eliminar" value="'.$fila['Codigo'].'" class="btn btn-warning btn-sm">Clave Asitencia</button>
				</div>
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
	$query = "SELECT * FROM HORARIOS";
	if(isset($_POST['busqueda']))
	{
		$q=$conn->real_escape_string($_POST['busqueda']);
		$query="SELECT * FROM HORARIOS WHERE 
			COD_MATERIA LIKE '%".$q."%' OR
			MAESTRO LIKE '%".$q."%' OR
			LUNES LIKE '%".$q."%' OR
			MARTES LIKE '%".$q."%' OR
			MIERCOLES LIKE '%".$q."%' OR
			JUEVES LIKE '%".$q."%' OR
			VIERNES LIKE '%".$q."%'";
	}	
	require_once('Clases/asesoria.php');
	$asesoria = new Asesoria();
	$buscarAsesorias=$conn->query($query);
	if ($buscarAsesorias->num_rows > 0)
	{
	$tabla.= 
	'<table class="table table-striped">
    <thead class="encabezado">
    <tr>
		<th class="lead">Código</th>
		<th class="lead">Nombre</th>
		<th class="lead">Maestro</th>
        <th class="lead">Lunes</th>
        <th class="lead">Martes</th>
		<th class="lead">Miércoles</th>
		<th class="lead">Jueves</th>
		<th class="lead">Viernes</th>
		<th class="lead">Acción</th>
    </tr>
	</thead>';
	while($fila= $buscarAsesorias->fetch_assoc())
	{
		$asesoria->ObtenerAsesoria($fila['Cod_Materia'],$asesoria);
		$codigo = $fila['Cod_Materia'];
		$tabla.=
		'<tr>
		<td>'.$fila['Cod_Materia'].'</td>
		<td>'.utf8_encode($asesoria->Nombre).'</td>
		<td>'.utf8_encode($fila['Maestro']).'</td>
			<td>'.utf8_encode($fila['Lunes']).'</td>
			<td>'.utf8_encode($fila['Martes']).'</td>
			<td>'.$fila['Miercoles'].'</td>
			<td>'.$fila['Jueves'].'</td>
			<td>'.$fila['Viernes'].'</td>
			<td><button class="btn btn-success" name='.$codigo.'*'.$fila['NOECON'].' id="inscribir"data-toggle="modal"data-target="#mensaje">Inscribirme</button></td></tr>';
	}
$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}
}
echo $tabla; 
?>