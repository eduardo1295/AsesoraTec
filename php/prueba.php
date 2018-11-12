<?php
require_once('Clases/maestro.php');
$maestro = new Maestro();

  $maestro->ObtenerDatos('33',$maestro);
  
  echo($maestro->Nombre);
  
?>