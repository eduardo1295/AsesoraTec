<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/recuperar.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/Contraseña.js"></script>
</head>

<body>
    <div class="page-header pb-2 pt-2">
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
require_once('php/Clases/alumno.php');
require_once('php/Clases/maestro.php');
$numero = $_POST['numero'];
$alumno = new Alumno();
$existe = $alumno->AlumnoExists($numero);
$maestro = new Maestro();
$existe2 = $maestro->MaestroExists($numero);
if($existe>0)
{
    $alumno->ObtenerDatos($numero,$alumno);
    $correo = $alumno->Correo;
    $contraseña = $alumno->Contraseña;
    $mail_username="fernandoinzv@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
	$mail_userpassword="inzunza123";//Tu contraseña de gmail
	$mail_addAddress=$correo;//correo electronico que recibira el mensaje
	$template="email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
				/*Inicio captura de datos enviados por $_POST para enviar el correo */
    $mail_setFromEmail="fernandoinzv@gmail.com";
	$mail_setFromName="Asesora-TEC";
	$txt_message=utf8_encode("Tu contrasena olvidada es: $contraseña");
    $mail_subject=utf8_encode("Recuperacion de contrasena");
    include("sendmail.php");
    sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);
}
else if($existe2>0)
{
    $maestro->ObtenerDatos($numero,$maestro);
    $correo = $maestro->Correo;
    $contraseña = $maestro->Contraseña;
}
else{
    echo "El número seleccionado no existe!";
}
}
?>