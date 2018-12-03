<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/rec.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/Contraseña.js"></script>
</head>

<body>
    <div class="row justify-content-center">
        <img src="bannerac.png" alt="" class="w-100" style="border:3px solid gray; height:100px">
    </div>
    <div class="page-header pb-2 pt-2 encabezado">
        <h3 class="display-4 lead mx-5">Recuperar Contraseña</h3>
    </div>
    <div class="container mt-3" style="border:1px solid gray">
        <h3 class="display-4 lead">
            Restablecimiento de contraseña
        </h3>
        <p class="lead">
            Pon tu número de control/económico aquí abajo. Te enviaremos un mensaje con tu nombre y tu contraseña a tu correo electrónico.
        </p>
        <div class="row justify-content-center">
            <label for="correo" class="lead">
                Número:
            </label>
        </div>
        <form method="post">
        <div class="row justify-content-center">
                <input class="mb-2 ml-2 w-50 align-text-center" type="text"name="numero" placeholder="Número de control/Número económico">
        </div>
        <div class="row justify-content-center mb-3 mt-3">
            <input type="submit" value="Enviar" name="recuperarbtn" class="btn btn-primary w-50">
            </form>
            <div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-label="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabel">
                                        Mensaje del Sistema
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="mens">
                                   Alumno registrado!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal"onclick="window.location.href='login.php'">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="row justify-content-center mb-3 mt-3">
                <p>Si aún asi no puedes ingresar, <a href="registrar.php">crea una nueva cuenta</a></p>
            </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['recuperarbtn']))
{
    $nocontrol =strip_tags($_POST['numero']);
    require_once("php/Clases/alumno.php");
    require_once("php/Clases/maestro.php");
    $alumno = new Alumno();
    $maestro = new Maestro();
    $existeMaestro =  $maestro->MaestroExists($nocontrol);
    $existe = $alumno->AlumnoExists($nocontrol);  
    if($existe>0)
    {
    $alumno->ObtenerDatos($nocontrol,$alumno);
    $correo = $alumno->Correo;
    $nombre = $alumno->Nombre;
    $contraseña = $alumno->Contraseña;
    date_default_timezone_set('Etc/UTC');
    require_once 'mail/src/PHPMailer.php';
    require_once 'mail/src/Exception.php';
    require_once 'mail/src/SMTP.php';
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
    $mail->Subject = utf8_decode('Recuperación de contraseña');
    $mail->msgHTML("La contraseña de tu cuenta en Asesora-TEC es: ".$contraseña);
    $mail->AltBody = 'This is a plain-text message body';
    //$mail->addAttachment('images/phpmailer_mini.png');
    //send the message, check for errors
    
    if (!$mail->send()) {
      //  echo "Mailer Error: " . $mail->ErrorInfo;
      echo "<p class='lead'style='color:red'>Error al enviar el mensaje </p>";
    } else {
      echo "<p class='lead'style='color:green'>Mensaje enviado!</p>";
    }
  }
  else if($existeMaestro>0)
  {
    $maestro->ObtenerDatos($nocontrol,$maestro);
    $correo = $maestro->Correo;
    echo $correo;
    $nombre = $maestro->Nombre;
    $contraseña = $maestro->Contraseña;
    date_default_timezone_set('Etc/UTC');
    require_once 'mail/src/PHPMailer.php';
    require_once 'mail/src/Exception.php';
    require_once 'mail/src/SMTP.php';
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
    $mail->Subject = utf8_decode('Recuperación de contraseña');
    $mail->msgHTML("La contraseña de tu cuenta en Asesora-TEC es: ".$contraseña);
    $mail->AltBody = 'This is a plain-text message body';
    //$mail->addAttachment('images/phpmailer_mini.png');
    //send the message, check for errors
    
    if (!$mail->send()) {
      //  echo "Mailer Error: " . $mail->ErrorInfo;
      echo "<p class='lead'style='color:red'>Error al enviar el mensaje </p>";
    } else {
      echo "<p class='lead'style='color:green'>Mensaje enviado!</p>";
    } 
  }
  else
  {
    echo "<p class='lead'style='color:red'>Tu número de control/económico no esta registrado en el sistema </p>"; 
  }
}
?>