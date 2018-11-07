$(document).ready(function(){
    $("#registrarbtn").click(function(){
        var cod = $("#codigo").val();
        var nom = $("#nombrea").val();
        var dep = $("#depto").val();
        var mens = $("#mens");
        var sem = $("#semestre").val();
        var horario = new Array();
        var salon = new Array();
        for (let index = 1; index <= 5; index++) {
            var hora = $("#h"+index);
            var salo = $("#h"+index);
            horario.push(hora.val());
            salon.push(salo.val());
        }
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