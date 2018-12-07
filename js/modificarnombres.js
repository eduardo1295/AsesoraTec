$(document).ready(function(){
    $("#cambiar").click(function(){
        var opcion1 = $("#jefes").val();
        var nombre = $("#txtnombre").val();
        var mens = $("#mens");
        $.ajax({
            url: 'php/cambiarnombre.php', 
            method: 'POST',
            data:{
                op1 : opcion1,
                nm: nombre
            },
            success: function (data) {
                mens.text(data);
            }
        });
    });
});

