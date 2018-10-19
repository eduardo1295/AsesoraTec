<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asesora-TEC</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ejemplo13bs.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/ejemplo06.css">

    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/reloj.js"></script>


</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-verde fixed-top">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-content" aria-control="nav-content"
            aria-expanded="false" aria-label="toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand">
            <h1 class="lead display-5">Asesora-TEC</h1>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="nav-content"></div>
        <ul class="navbar-nav">
        </ul>
        <form action="" class="form-inline" role="search">
            <div class="dropdown">
                <button id="usuario" class="btn btn-primary dropdown-toggle lead mx-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-user fa-fw"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuario">
                    <a href="a" class="dropdown-item lead">Cambiar de cuenta</a>
                    <a href="a" class="dropdown-item lead">Mi perfil</a>
                </div>
            </div>
            <div class="dropdown">
                <button id="acercade" class="btn btn-primary dropdown-toggle  lead" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-cog fa-fw"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acercade">
                    <a href="a" class="dropdown-item lead">Nuestra historia</a>
                    <a href="a" class="dropdown-item lead">Nuestro Equipo</a>
                    <a href="a" class="dropdown-item lead">Contacto</a>
                </div>
            </div>
        </form>
        </div>
    </nav>
    <div class="row">
        <div class="barra w-25 col">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active lead" href="#">
                        <i class="fas fa-home fa-fw"></i>Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" href="verasesorias.html">
                        <i class="fas fa fa-eye fa-fw"></i>Ver mis asesorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" href="agregarasesoria.html">
                        <i class="fas fa fa-search-plus fa-fw"></i>Agregar Asesoría</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" data-toggle="collapse" href="#item-1">
                        <i class="fas fa fa-user fa-fw"></i>Mi cuenta</a>
                    <div id="item-1" class="collapse">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link active lead" href="#">
                                    <i class="fas fa fa-power-off fa-fw"></i>Cerrar Sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link lead" href="#">
                                    <i class="fas fa fa-trash fa-fw"></i>Eliminar mi cuenta</a>
                            </li>
                            <li class="nav-item lead">
                                <a class="nav-link lead" href="#">
                                    <i class="fas fa-cog fa-fw"></i>Modificar Perfil</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
    </div>
    <div class="relleno w-100 mb-0">
        <script type="text/javascript">

            function crearReloj() {
                var ahora = new Date();
                var h = ahora.getHours();
                var m = ahora.getMinutes();
                var s = ahora.getSeconds();
                var mesActual = ahora.getMonth();
                var diaActual = ahora.getDay();
                var diaDelMes = ahora.getDate();
                var aActual = ahora.getFullYear();
                var amOpm;
                var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
                var esteMes = meses[mesActual];
                var diasDeLaSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Sábado"]
                var diaDeHoy = diasDeLaSemana[diaActual];
                var amOpm;
                if (h > 12)
                    amOpm = "pm."
                else
                    amOpm = "am.";
                m = corregirHora(m);
                s = corregirHora(s);
                document.getElementById('fecha').innerHTML = "Hoy es " + diaDeHoy + " " + diaDelMes + " de " + esteMes + " del " + aActual;
                document.getElementById('reloj').innerHTML ="Hora Actual: "+ h + ":" + m + ":" + s + " " + amOpm;
                var t = setTimeout(function () { crearReloj() }, 1000);
            }
            function corregirHora(i) {
                if (i < 10) { i = "0" + i };
                return i;
            }
        </script>
        </head>

        <body onLoad="crearReloj()">
            <div class="container--fluid">
                <div class="row justify-content-center mt-5 lead pt-4 pb-4 bg-verde">
                    <div id="fecha"></div>
                </div>
                <div class="row justify-content-center mt-3 lead pt-4 pb-4 bg-verde">
                    <div id="reloj"></div>
                </div>
            </div>
        </body>

</html>

</div>
<div class="copyright">
    <div class="container">
        <div class="col py-3">
            <div class="col text-center">
                Copyright 2018. &copy;
                <a class="btn btn-block btn-social btn-twitter d-inline">
                    <span class="fa fa-twitter"></span>
                </a>
                <a class="btn btn-block btn-social btn-twitter d-inline">
                    <span class="fa fa-facebook"></span>
                </a>
                <a class="btn btn-block btn-social btn-twitter d-inline">
                    <span class="fa fa-instagram"></span>
                </a>
            </div>
        </div>
    </div>
</div>
</body>

</html>