$(document).ready(function(){
    $("#registrarm").click(function(){
        var noecon = $("#noec").val();
        var appat = $("#appatm").val();
        var pass = $("#passm").val();
        var nombre  = $("#nombrem").val();
        var apmat = $("#apmatm").val();
        var correo = $("#correom").val();
        var depto = $("#depto").val();
        var mens = $("#mens"); 
        $.ajax({
            url: 'php/insertarmaestro.php', 
            method: 'POST',
            data:{
                noec : noecon,
                ap: appat,
                pwd :pass,
                nom: nombre,
                am : apmat,
                email:correo,
                dep: depto
                
            },
            success: function (data){
                mens.text(data);
            }
        });
    });
});