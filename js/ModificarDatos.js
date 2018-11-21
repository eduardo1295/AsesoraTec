$(document).ready(function () {
    $("#guardarbtn").click(function () {
        var nocontrol = $("#nocontrol").val();
        var appat = $("#appat").val();
        var pass = $("#pass").val();
        var nombre = $("#nombre").val();
        var apmat = $("#apmat").val();
        var correo = $("#correo").val();
        var carrera = $("#carrera").val();
        var semestre = $("#semestre").val();
        var hombre = $("#hombre").prop('checked');
        var mujer = $("#mujer").prop('checked');
        var ninguno = $("#ninguno").prop('checked');
        var sexo = "";
        if (hombre)
            sexo = "Hombre";
        else if (mujer)
            sexo = "Mujer";
        else if (ninguno)
            sexo = "No binario";
        var mens = $("#mens");
        $.ajax({
            url: 'php/guardar.php',
            method: 'POST',
            data: {
                noc: nocontrol,
                ap: appat,
                pwd: pass,
                nom: nombre,
                am: apmat,
                email: correo,
                car: carrera,
                sem: semestre,
                sex: sexo
            },
            success: function (data) {
                mens.text(data);
            }
        });
    });
});