$(document).ready(function(){
    $("#guardarbtn").click(function(){
        var noeco = $("#noeconomico").val();
        var pass = $("#pass").val();
        var appat = $("#appat").val();
        var apmat = $("#apmat").val();
        var nombre  = $("#nombre").val();
        var depart = $("#departamento").val();
        var correo = $("#correo").val();
        var mens = $("#mens"); 
        $.ajax({
            url: 'php/guardarmaestro.php', 
            method: 'POST',
            data:{
                noc : noeco,
                pwd :pass,
                ap: appat,
                am : apmat,
                nom: nombre,
                dep: depart,
                email:correo
            },
            success: function (data){
                mens.text(data);
            }
        });
    });
});