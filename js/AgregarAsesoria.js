var bandera = true;
$(document).ready(function(){
    if($("#EditarCodigo").length > 0){
        /*var codigo = $("#EditarCodigo").val();*/
        $("#tipo").val($("#EditarTipo").val());
        $(Agregar_Codigos());
        /*$(buscar_Por_codigo(codigo));*/
    }
    else{
        $(Agregar_Codigos());
    }
    
    
    $("#tipo").change(function(){
        $(Agregar_Codigos());
    });

    $("#co").change(function(){
        var codigo = $("#codigo").val();
        $(buscar_Por_codigo(codigo));
        
    });

    $("#nom").change(function(){
        
        var Nombre = $("#nombrea").val();
        $.ajax({
            url : 'php/materia.php',
            type : 'POST',
            dataType : 'html',
            data : { opcion: "buscarPorNombre",
                    Nombrebuscar: Nombre
                },
            })
        .done(function(resultado){
            var res = resultado.split('*');
            $("#codigo").val(res[0]);
            $("#semestre").val(res[1]);
        })
        
        
    });
    $("#registrarbtn").click(function(){
        var cod = $("#codigo").val();
        var nom = $("#nombrea").val();
        var tip = $("#tipo").val();
        var mens = $("#mens");
        var sem = $("#semestre").val();
        var aseso = $("#asesor").val();
        var nocontrol = $("#nocontrol").val();
        var horario = new Array();
        var salon = new Array();
        for (let index = 1; index <= 5; index++) {
            var hora = $("#h"+index);
            var salo = $("#s"+index);
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
                tipo : tip,
                semestre : sem,
                horario: horario,
                salon: salon,
                asesor: aseso,
                nocontrol: nocontrol
            },
            success: function (data){
                if(data == ""){
                    console.log("putos");
                }
                mens.text(data);
            }
        });
    });
    $("#editarbtn").click(function(){
        var cod = $("#codigo").val();
        var nom = $("#nombrea").val();
        var tip = $("#tipo").val();
        var mens = $("#mens");
        var sem = $("#semestre").val();
        var aseso = $("#asesor").val();
        var nocontrol = $("#nocontrol").val();
        var horario = new Array();
        var salon = new Array();
        for (let index = 1; index <= 5; index++) {
            var hora = $("#h"+index);
            var salo = $("#s"+index);
            horario.push(hora.val());
            salon.push(salo.val());
        }
        $.ajax({
            url: 'php/asesoria.php', 
            method: 'POST',
            data:{
                opcion : "Editar", 
                codigo : cod,
                nombre: nom,
                tipo : tip,
                semestre : sem,
                horario: horario,
                salon: salon,
                asesor: aseso,
                nocontrol: nocontrol
            },
            success: function (data){
                mens.text(data);
            }
        });
    });
});


function Agregar_Codigos()
{   
    var dato = $("#tipo").val();
	$.ajax({
		url : 'php/materia.php',
		type : 'POST',
		dataType : 'html',
        data : { opcion: "codigos",
                busca: dato},
		})
	.done(function(resultado){
        $("#co").html(resultado);
        
        $(Agregar_Nombre_Materia(dato));
	})
}
function Agregar_Nombre_Materia(dato)
{   
	$.ajax({
		url : 'php/materia.php',
		type : 'POST',
		dataType : 'html',
        data : { opcion: "nombre",
                busca: dato},
		})
	.done(function(resultado){
        $("#nom").html(resultado);
        if($("#EditarCodigo").length > 0 && bandera == true){
            bandera = false;
            var codigo = $("#EditarCodigo").val();
            buscar_Por_codigo(codigo);
        }
	})
}

function buscar_Por_codigo(codigo){
    $.ajax({
        url : 'php/materia.php',
        type : 'POST',
        dataType : 'html',
        data : { opcion: "buscarPorCodigo",
                codigobuscar: codigo
            },
        })
    .done(function(resultado){
        var res = resultado.split('-');
        $("#nombrea").val(res[0]);
        $("#semestre").val(res[1]);
    })
}