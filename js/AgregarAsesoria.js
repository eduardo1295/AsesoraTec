$(document).ready(function(){
    $("#registrarbtn").click(function(){
        var cod = $("#codigo").val();
        var nom = $("#nombrea").val();
        var dep = $("#depto").val();
        var mens = $("#mens");
        var sem = $("#semestre").val();
        $.ajax({
            url: 'php/asesoria.php', 
            method: 'POST',
            data:{
                opcion : "Agregar", 
                codigo : cod,
                nombre: nom,
                departamento : dep,
                semestre : sem
            },
            success: function (data){
                mens.text(data);
            }
        });
    });
});