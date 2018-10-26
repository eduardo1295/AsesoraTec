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
    <script src="js/InsertarAlumno.js"></script>
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
        <form action="contraseña.php" method="post">
        <div class="row justify-content-center">
                <input class="mb-2 ml-2 w-50 align-text-center" type="text" name="id" id="nocontrol" placeholder="Número de control/Número económico">
        </div>
        <div class="row justify-content-center mb-3 mt-3">
            <input type="submit" value="Enviar" id="registrarbtn" class="btn btn-primary w-50">
        </div>
        </form>
        <div class="row justify-content-center mb-3 mt-3">
                <p>Si aún asi no puedes ingresar, <a href="registrar.html">crea una nueva cuenta</a></p>
            </div>
    </div>
</body>
</html>