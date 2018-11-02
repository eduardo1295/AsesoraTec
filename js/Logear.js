$(document).ready(function(){
    $("#ingresar").click(function(){
        var nocontrol = $("#numero").val();
        var pass = $("#contra").val(); 
        $.ajax({
            url: 'logU.php', 
            method: 'POST',
            data:{
                noc : nocontrol,
                contra: pass
            },
            success: function (data){
            }
        });
    });
});