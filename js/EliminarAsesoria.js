$(document).ready(function(){
    var mens = $("#mens");
    var noco = nocontrol;
    var codA = codigo;
    $("#eliminar").click(function(){
        $.ajax({
            url: 'php/eliminarA.php', 
            method: 'POST',
            data:{
                noc : noco,
                cod:codA
            },
            success: function (data){
            mens.text(data);
            }
        })
    });
    });