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
                var diasDeLaSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]
                var diaDeHoy = diasDeLaSemana[diaActual];
                var amOpm;
                if (h > 12)
                    amOpm = "pm."
                else
                    amOpm = "am.";
                m = corregirHora(m);
                s = corregirHora(s);
                document.getElementById('fecha').innerHTML = "Hoy es " + diaDeHoy + " " + diaDelMes + " de " + esteMes + " del " + aActual;
                document.getElementById('reloj').innerHTML = "Hora Actual: " + h + ":" + m + ":" + s + " " + amOpm;
                var t = setTimeout(function () { crearReloj() }, 1000);
            }
            function corregirHora(i) {
                if (i < 10) { i = "0" + i };
                return i;
            }