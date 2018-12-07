$(document).ready(function () {
    $("#guardarbtn").click(function () {
        var nocontrol = $("#nocontrol").val();
        var appat = $("#appat").val();
        var pass = $("#pass").val();
        var nombre = $("#nombre").val();
        var apmat = $("#apmat").val();
        var correo = $("#correo").val();
        var carrera = $("#carrera").val();
        var mess = $("#mens");
        $.ajax({
            url: 'php/guardarmaestro.php',
            method: 'POST',
            data: {
                noc: nocontrol,
                ap: appat,
                pwd: pass,
                nom: nombre,
                ap: appat,
                am: apmat,
                email: correo,
                dep: carrera,
            },
            success: function (data) {
              mess.text(data);
            }
        });
    });
});