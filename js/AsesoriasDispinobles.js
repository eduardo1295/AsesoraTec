$(document).ready(function(){
    $("#mostrar").click(function(){
        var cod = $("#codigo").val();
        var as1 = $("#asesoria"); 
        var as2 = $("#asesoria1");
        $.ajax({
            url: 'php/asesoriad.php', 
            method: 'POST',
            data:{
                codigo : cod
            },
            success: function (data){
                as1.text(data);
            }
        });
    });
});