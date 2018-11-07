function inicializarHora  () {
    var fecha = new Date();
    var Hora = fecha.getHours();
    var minutos = fecha.getMinutes();
    var segundos = fecha.getSeconds();
    var mesActual = fecha.getMonth();
    var diaActual = fecha.getDay();
    var diaDelMes = fecha.getDate();
    var aActual = fecha.getFullYear();
    var amOpm;
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var esteMes = meses[mesActual];
    var diasDeLaSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Sábado"]
    var diaDeHoy = diasDeLaSemana[diaActual];
    amOpm = (Hora > 12) ? "pm" : "am";
    Hora = (Hora > 12) ? Hora - 12 : Hora;
    Hora = (Hora<10)?"0"+Hora:Hora;
    var h = Hora.toString();
}