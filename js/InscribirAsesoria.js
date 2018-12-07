$(document).ready(function(){
    $("button").click(function(){
        var id = this.id;
        if(id=="inscribir")
        {
        var mens = $("#mens");
        var cod = document.getElementsByName(this.name);
        var dato = cod[0].name.toString();
        var aux = dato.split('*');
        var auxcod = aux[0];
        var auxnoecon = aux[1];;
        $.ajax({
            url: 'php/inscribir.php', 
            cache: false,
            method: 'POST',
            data:{
                codigo : auxcod,
                noecon : auxnoecon
            },
            success: function (data){
                mens.text(data);
                $("#mensaje").modal('show');
            }
        });
    }
    });
});
