<?php 
$ruta = 'img/';
$nombreArchivo =$_FILES["file"]['name'];
move_uploaded_file($_FILES['file']['tmp_name'],$ruta.$nombreArchivo);
if (is_uploaded_file($_FILES["userfile"]["tmp_name"]))
{
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
    {
        # Cogemos la anchura y altura de la imagen
        $info=getimagesize($_FILES["userfile"]["tmp_name"]);
        //echo "<BR>".$info[0]; //anchura
        //echo "<BR>".$info[1]; //altura
        //echo "<BR>".$info[2]; //1-GIF, 2-JPG, 3-PNG
        //echo "<BR>".$info[3]; //cadena de texto para el tag <img
 
        # Escapa caracteres especiales
        $imagenEscapes=$mysqli->real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));
 
        # Agregamos la imagen a la base de datos
        $sql="INSERT INTO  EVIDENCIA (COD_ASESORIA,anchura,altura,tipo,imagen) VALUES (TI2,".$info[0].",".$info[1].",'".$_FILES["userfile"]["type"]."','".$imagenEscapes."')";
        $mysqli->query($sql);
 
        # Cogemos el identificador con que se ha guardado
        $id=$mysqli->insert_id;
 
        # Mostramos la imagen agregada
        echo "<div class='mensaje'>Imagen agregada con el id ".$id."</div>";
    }else{
        echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
    }
}
?>