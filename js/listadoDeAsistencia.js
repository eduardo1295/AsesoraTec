$(document).ready(function(){
    $.ajax({
        type: "POST",
        url: "php/listadoDeAsistencia.php",
        data: {
            opcion: "Asesorias"
        },
        success: function(response)
        {
            $('#asesoria').html(response).fadeIn();
        }
    });

    $("#asesoria").change(function(){
        var cod = $("#asesoria").val();
        if(cod != ""){
            $.ajax({
                type: "POST",
                url: "php/listadoDeAsistencia.php",
                data: {
                    opcion: "Fecha",
                    code : cod
                },
                success: function(response)
                {
                    $('#fecha').html(response).fadeIn();
                }
            });
        }
        
        
    });
    $("#fecha").change(function(){
        var fec = $("#fecha").val();
        if(fec != ""){
            var datos = fec.split('*');
            fecha = datos[0];
            cod = datos[1];
            $.ajax({
                type: "POST",
                url: "php/listadoDeAsistencia.php",
                data: {
                    opcion: "Agregar",
                    code : cod,
                    fech : fecha
                },
                success: function(response)
                {
                    $('#tabla').html(response);
                }
            });
        }
    });
    
});

