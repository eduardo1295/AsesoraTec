$(document).ready(function(){
    var mens = $("#mens");
    $("button").click(function(){
        var id = this.id;
        if(id=="darbaja")
        {
        var codigo = document.getElementsByName(this.name);
        var codi = codigo[0].name.toString();
       
        $.ajax({
            url: 'php/eliminarA.php', 
            method: 'POST',
            data:{
                cod:codi
            },
            success: function (data){
            mens.text(data);
            }
        })
    }
 });
});