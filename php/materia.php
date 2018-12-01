<?php
require_once('Clases/conexion.php');
if(isset($_POST['opcion'])){
    if ($_POST['opcion'] == "codigos") {
        $buscar = utf8_decode($_POST['busca']);
        $conexion = abrirBD();
        $SQL = "SELECT Codigo FROM materias WHERE Tipo = ?";
        $sentencia_preparada1 = $conexion->prepare($SQL);
        $sentencia_preparada1->bind_param("s",$cod);
        $cod = $buscar;
        $sentencia_preparada1->execute();
        $sentencia_preparada1->bind_result($nombre);
        if(isset($_POST['edit'])){
            if($_POST['edit'] != "si")
                $codigo = '<select name="codigo" id="codigo" class="lead">';
            else 
                $codigo = '<select name="codigo" id="codigo" class="lead" disabled="true">';
        }
        while( $fila = $sentencia_preparada1->fetch()){
            $codigo .= '<option value="'.$nombre.'">'.$nombre.'</option>';
        }
        $conexion->close();
        echo $codigo;
    }
    elseif($_POST['opcion'] == "nombre"){
        $buscar = utf8_decode($_POST['busca']);
        $conexion = abrirBD();
        $SQL = "SELECT Nombre FROM materias WHERE Tipo = ?";
        $sentencia_preparada1 = $conexion->prepare($SQL);
        $sentencia_preparada1->bind_param("s",$cod);
        $cod = $buscar;
        $sentencia_preparada1->execute();
        $sentencia_preparada1->bind_result($nombre);
        if($_POST['edit'] != "si")
            $codigo = '<select name="codigo" id="nombrea" class="lead">';
        else 
        $codigo = '<select name="codigo" id="nombrea" class="lead" disabled="true">';
        while ($fila= $sentencia_preparada1->fetch()) {
            $codigo .= '<option value="'.utf8_encode($nombre).'">'. utf8_encode($nombre).'</option>';
        }
        $conexion->close();
        echo $codigo;
    }
    
    elseif($_POST['opcion'] == "buscarPorCodigo"){
        $valor = $_POST['codigobuscar'];
        $conexion = abrirBD();
        $SQL = "SELECT nombre,Semestre FROM materias WHERE codigo = ?";
        $sentencia_preparada1 = $conexion->prepare($SQL);
        $sentencia_preparada1->bind_param("s",$cod);
        $cod = $valor;
        $sentencia_preparada1->execute();
        $sentencia_preparada1->bind_result($nombre,$semestre);
        while( $fila = $sentencia_preparada1->fetch()){
            $resultado =    utf8_encode($nombre)."-".$semestre ;
        }

        echo $resultado;
    }
    elseif($_POST['opcion'] == "buscarPorNombre"){
        $valor = $_POST['Nombrebuscar'];
        $conexion = abrirBD();
        $SQL = "SELECT Codigo,Semestre FROM materias WHERE Nombre ="."'".utf8_decode($valor)."'";
        $result = $conexion->query($SQL);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                
                $resultado = $row["Codigo"]."*".$row['Semestre'];
            }
        }
        echo $resultado	;
    }
}
?>