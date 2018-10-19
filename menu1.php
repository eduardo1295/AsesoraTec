<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asesora-TEC</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ejemplo13bs.css">
    <link rel="stylesheet" href="css/menu1.css">
    <link rel="stylesheet" href="css/reloj.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/reloj.js"></script>


</head>

<body>
    <div class="row">
            <nav class="navbar navbar-expand navbar-dark fixed-top encabezado">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-content" aria-control="nav-content"
                        aria-expanded="false" aria-label="toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="#" class="navbar-brand">
                        <h1 class="lead display-4">Asesora-TEC</h1>
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
                </nav>
    </div>
    <div class="row mt-5">
        <div class="barra w-25 col">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active lead" href="#">
                        <i class="fas fa-home fa-fw"></i>Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" href="asesoriaalumno.html">
                        <i class="fas fa fa-eye fa-fw"></i>Ver mis asesorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" href="#">
                        <i class="fas fa fa-search-plus fa-fw"></i>Inscribirme en Asesoría</a>
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
            function crearReloj2() {
                var canvas = document.getElementById("canvas");
                var ctx = canvas.getContext("2d");
                var color = 'midnightblue';
                ctx.strokeStyle = 'midnightblue';
                ctx.lineWidth = 17;
                ctx.lineCap = 'round';
                ctx.shadowBlur = 15;
                ctx.shadowColor = 'black';
                function degToRoad(degree) {
                    var factor = Math.PI / 180;
                    return factor * degree;
                }

                function renderTime() {
                    var now = new Date();
                    var today = now.toDateString();
                    
                    var hours = now.getHours();
                    var amOpm;
                    if (hours > 12)
                    amOpm = "pm."
                    else
                    amOpm = "am.";
                    var time = "       "+now.toLocaleTimeString()+" "+amOpm;
                    var minutes = now.getMinutes();
                    var seconds = now.getSeconds();
                    var milliseconds = now.getMilliseconds();

                    var ahora = new Date();
                    var mesActual = ahora.getMonth();
                    var diaDelMes = ahora.getDate();
                    var aActual = ahora.getFullYear();
                    
                    var newSconds = seconds + (milliseconds / 1000);
                    var hoy =" "+diaDelMes+"/"+mesActual+"/"+aActual;
                    //background
                    var gradient = ctx.createRadialGradient(250, 250, 1, 250, 250, 300);
                    gradient.addColorStop(0, 'white');
                    gradient.addColorStop(1, 'white');

                    ctx.fillStyle = gradient;
                    //ctx.fillStyle = '#333333';
                    ctx.fillRect(0, 0, 500, 500);

                    //hours
                    ctx.beginPath();
                    ctx.arc(250, 250, 150, degToRoad(270), degToRoad((hours * 15) - 90));
                    ctx.stroke();

                    //minutes
                    ctx.beginPath();
                    ctx.arc(250, 250, 120, degToRoad(270), degToRoad((minutes * 6) - 90));
                    ctx.stroke();

                    //seconds

                    ctx.beginPath();
                    ctx.arc(250, 250, 90, degToRoad(270), degToRoad((newSconds * 6) - 90));
                    ctx.stroke();

                    //date
                    ctx.fillStyle = color;
                    ctx.font = '24px Verdana';
                    ctx.fillText(hoy, 170, 250);

                    //time
                    ctx.fillStyle = color;
                    ctx.font = '16px Arial';
                    ctx.fillText(time, 170, 280);
                }
                setInterval(renderTime, 40);
            }
        </script>
        </head>

        <body onLoad="crearReloj2()">
            <div class="row justify-content-center">
                <canvas id="canvas" width="500px" height="500px"></canvas>
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
    </div>
</body>

</html>