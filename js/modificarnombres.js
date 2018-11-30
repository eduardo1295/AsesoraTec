$(document).ready(function(){
    $("#cambiar").click(function(){
        var opcion1 = $("#jefes").val();
        var nombre = $("#txtnombre").val();
        $.ajax({
            url: 'php/cambiarnombre.php', 
            method: 'POST',
            data:{
                op1 : opcion1,
                nm: nombre
            },
        });
    });
});

