<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar cuenta</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mensaje.js"></script>
</head>
<body>
    <div class="page-header pb-2 pt-2">
        <h1 class="lead display-3 justify-content-center">Registrar una cuenta <img src="add.png" alt="Login"></h1>
</div>        
<div class="container mt-3 forma">
    <div class="row justify-content-center" style="border:1px solid white;">
        <div class="col">
            <div class="row  mt-4 justify-content-center">
                <p class="lead mx-2">Información de la cuenta:
                </p>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead" placeholder="Usuario">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead" placeholder="Número económico">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead" placeholder="Apellido Paterno">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="text" class="cajas lead" placeholder="Apellido Materno">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row ">
                    <input type="text" class="cajas lead" placeholder="Nombre">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="row">
                    <input type="radio" name="sexo" id="" class="radio my-2 mx-3 lead">
                    <label for="hombre" class="radio lead">Hombre</label>
                    <input type="radio" name="sexo" id="" class="radio my-2 mx-3 lead">
                    <label for="mujer" class="radio lead">Mujer</label>
                    <input type="radio" name="sexo" id="" class="radio my-2 mx-3 lead">
                    <label for="No binario" class="radio lead">No binario</label>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container mt-3 forma">
    <div class="row" style="border:1px solid white;">
        <div class="col">
            <div class="row  mt-4 justify-content-center">
                <p class="lead">Información del usuario:
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="row my-2 ">
                    <label for="depto"class=lead>Departamento:</label>
                    <select name="depto" id="depto" class="lead">
                        <option value="Ing. en Sistemas Computacionales">Ciencias Básicas</option>
                        <option value="Ing. Electromecánica">Especialidad en Desarrollo Web</option>
                        <option value="Ing. Civil">Especialidad en seguridad en TIC'S</option>
                        <option value="Contabilidad">Especialidad en Investigación</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="mb-2 container w-100">
    <div class="row  justify-content-center">
        <input type="submit" value="Registrarme" id="registrarbtn" class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje">
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
                        Usuario Registrado
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary lead" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>