$(document).ready(function(){
    $("#guardarbtn").click(function(){
        var codigo = $("#codigo").val();
        var nom = $("#nombrem").val();
        var tipo = $("#tipo").val();
        var semestre = $("#semestre").val(); 
        var mens = $("#mens"); 
        $.ajax({
            url: 'php/guardarmateria.php', 
            method: 'POST',
            data:{
                noc : codigo,
                nom : nom,
                tp: tipo,
                sem: semestre
            },
            success: function (data){
                mens.text(data);
            }
        });
    });
});