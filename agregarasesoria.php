<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar asesoría</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pruebaregistrar.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/AgregarAsesoria.js"></script>
    <script src=""></script>
</head>

<body>
    <div class="page-header pb-2 pt-2">
        <h1 class="lead display-3 justify-content-center">Agregar una asesoría
            <img src="agregar.png" alt="Login">
        </h1>
    </div>
    
        <div class="container mt-3 forma">
            <div class="row justify-content-center" style="border:1px solid white;">
                <div class="col">
                    <div class="row  mt-4 justify-content-center">
                        <p class="lead mx-2">Información de la asesoría:
                        </p>
                    </div>
                    <div class="row my-3 justify-content-center">
                        <div class="row">
                            <input type="text" class="cajas lead" id="codigo" placeholder="Código">
                        </div>
                    </div>
                    <div class="row my-3 justify-content-center">
                        <div class="row">
                            <input type="text" class="cajas lead" id="nombrea" placeholder="Nombre de la asesoría">
                        </div>
                    </div>
                    <div class="row my-3 justify-content-center">
                        <div class="row">
                            <input type="text" class="cajas lead" id="semestre" placeholder="Semestre">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="row my-2 ">
                            <label for="depto"></label>
                            <select name="depto" id="depto" class="lead">
                                <option value="Ciencias Básicas">Ciencias Básicas</option>
                                <option value="Especialidad en Desarrollo Web">Especialidad en Desarrollo Web</option>
                                <option value="Especialidad en seguridad en TIC'S">Especialidad en seguridad en TIC'S</option>
                                <option value="Especialidad en Investigación">Especialidad en Investigación</option>
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
                <div class="col">
                    <input type="submit" value="Agregar asesoría" id="registrarbtn" class="btn btn-primary lead" data-toggle="modal" data-target="#mensaje">
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
                                    Asesoría agregada a la lista
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary lead" data-dismiss="modal">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <button type="submit" value="" id="registrarbtn" class="btn btn-primary lead mx-4 ">
                        <i class="fas fa fa-mail-reply lead" onclick="window.location.href='menu2.html'"> Página anterior</i>
                    </button>
                </div>
            </div>
        </div>

</body>

</html>