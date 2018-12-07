$(document).ready(function(){
    $("#registrarm").click(function(){
        var codigo = $("#codigo").val();
        var nombrem = $("#nombrem").val();
        var tipo = $("#tipo").val();
        var semestre = $("#semestre").val();
        var mens = $("#mens"); 
        $.ajax({
            url: 'php/insertarmateria.php', 
            method: 'POST',
            data:{
                cod : codigo,
                nm: nombrem,
                tp :tipo,
                sem : semestre
            },
            success: function (data){
                mens.text(data);
            }
        });
    });
});