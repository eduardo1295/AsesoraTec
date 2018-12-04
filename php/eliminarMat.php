<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
require_once('Clases/maestro.php');
require_once('Clases/alumno.php');
require_once('Clases/asesoria.php');
require_once('Clases/conexion.php');

if (isset($_POST['cod'])) {
    $conexion = abrirBD();
    $codi = $_POST['cod'];
    $asesoria = new asesoria();
    $asesoria->ObtenerAsesoria($codi,$asesoria);

    $nc = $_SESSION['noeconomico'];
    $SQL = "SELECT Control_Alumno FROM asesoriasreg WHERE Codigo_Asesoria = ? AND NOECON = ?";
    $sentencia_preparada1 = $conexion->prepare($SQL);
    $sentencia_preparada1->bind_param("ss",$cod,$nom);
    $cod =$codi;
    $nom = $nc;
    $sentencia_preparada1->execute();
    $sentencia_preparada1->bind_result($Control_Alumno);
    while($sentencia_preparada1->fetch()){
    $alumno = new alumno();
    $alumno->ObtenerDatos($Control_Alumno,$alumno);
    $correo = $alumno->Correo;
    $nombre = $alumno->Nombre;
    $contraseña = $alumno->Contraseña;
    date_default_timezone_set('Etc/UTC');
    require_once '../mail/src/PHPMailer.php';
    require_once '../mail/src/Exception.php';
    require_once '../mail/src/SMTP.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "fernandoinzv@gmail.com";
    $mail->Password = "inzunza123";
    $mail->setFrom('fernandoinzv@gmail.com', 'Administrador de Asesora-TEC');
    //$mail->addReplyTo('pruebas22@itlp.edu.mx', 'Jose Rodriguez');
    $mail->addAddress($correo, $nombre);
    $mail->Subject = utf8_decode('Aviso');
    $mail->msgHTML( 'El maestro '.$asesoria->Nom_Maestro. utf8_decode(' ha eliminado la asesoría ').$asesoria->Nombre);
    $mail->AltBody = 'This is a plain-text message body';
    //$mail->addAttachment('images/phpmailer_mini.png');
    //send the message, check for errors
    
    if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
      echo "<p class='lead'style='color:red'>Error al enviar el mensaje </p>";
    } else {
      echo "<p class='lead'style='color:green'>Mensaje enviado!</p>";
    }
    }
    $conexion->close();
    $conexion = abrirBD();
    $SQL= "DELETE FROM asesorias WHERE codigo=? AND NOECON = ?";
    $sentencia_preparada1 = $conexion->prepare($SQL);
    $sentencia_preparada1->bind_param("ss",$cod,$nom);
    $cod =$codi;
    $nom = $nc;
    $sentencia_preparada1->execute();
    $conexion->close();

    $conexion = abrirBD();
    $SQL= "DELETE FROM horarios WHERE Cod_Materia=? AND NOECON = ?";
    $sentencia_preparada1 = $conexion->prepare($SQL);
    $sentencia_preparada1->bind_param("ss",$cod,$nom);
    $cod =$codi;
    $nom = $nc;
    $sentencia_preparada1->execute();
    $conexion->close();
    
    $conexion = abrirBD();
    $SQL= "DELETE FROM asesoriasreg WHERE Codigo_Asesoria=? AND NOECON = ?";
    $sentencia_preparada1 = $conexion->prepare($SQL);
    $sentencia_preparada1->bind_param("ss",$cod,$nom);
    $cod =$codi;
    $nom = $nc;
    $sentencia_preparada1->execute();
    $conexion->close();

    $conexion = abrirBD();
    $SQL= "DELETE FROM asesorados WHERE codigo=? AND NOECON = ?";
    $sentencia_preparada1 = $conexion->prepare($SQL);
    $sentencia_preparada1->bind_param("ss",$cod,$nom);
    $cod =$codi;
    $nom = $nc;
    $sentencia_preparada1->execute();
    $conexion->close();

    $conexion = abrirBD();
    $SQL= "DELETE FROM pass WHERE Codigo_Asesoria=? AND NOECON = ?";
    $sentencia_preparada1 = $conexion->prepare($SQL);
    $sentencia_preparada1->bind_param("ss",$cod,$nom);
    $cod =$codi;
    $nom = $nc;
    $sentencia_preparada1->execute();
    $conexion->close();
}
else {
    echo "Nel";
}


?>