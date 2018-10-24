$(document).ready(function(){
    $("#registrarbtn").click(function(){
        var cod = $("#codigo").val();
        var nom = $("#nombrea").val();
        var dep = $("#depto").val();
        var mens = $("#mens"); 
        $.ajax({
            url: 'php/asesoria.php', 
            method: 'POST',
            data:{
                opcion : "Agregar", 
                codigo : cod,
                nombre: nom,
                departamento : dep
            },
            success: function (data){
                mens.text(data);
            }
        });
    });
});