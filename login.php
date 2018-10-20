<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/prueba2.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mensaje.js"></script>
</head>

<body class="contenedor">
    <div class="page-header pb-2 pt-2">
        <h1 class="display-3 lead">Asesora-TEC</h1>
    </div>
    <div class="row justify-content-center mt-2">
        <img src="asesor.png" alt="Login">
    </div>
        <div class="row d-block m-4 justify-content-center">
            <div class="login">
                <div class="row mt-4 justify-content-center">
                    <h2 class="lead display-4">Iniciar Sesión</h2>
                </div>
                <form action="logU.php"method="POST">
                <div class="row justify-content-center">
                    <input class="m-2" type="text" name="usuario" placeholder="Usuario">
                </div>
                <div class="row justify-content-center">
                    <input class="m-2" type="password" placeholder="Contraseña">
                </div>
                <div class="row justify-content-center">
                    <input type="submit" class="btn btn-primary boton mx-5 mb-3 mt-3 lead">Ingresar</a>
                </div>
                </form>
                <div class="row mx-1">
                    <div class="col">
                        <input type="button" id="btnregistrar" value="Registrarme" class="btn btn-link" data-toggle="modal" data-target="#mensaje">
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
                                    <div class="modal-body">
                                        Soy un:
                                        <div class="row mt-2">
                                            <div class="col">
                                                <a href="registrarmaestro.php" class="btn btn-primary boton lead">Maestro</a>
                                            </div>
                                            <div class="col">
                                                <a href="registrar.php" class="btn btn-primary boton lead">Alumno</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary lead" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <a href="recuperar.php" id="olvide" class="btn btn-link" value="">Olvide mi contraseña</a>
                    </div>
                </div>
            </div>
        </div>
</body>

</html> 
