var codigoEliminar = 0;

$(obtener_registros());

function obtener_registros(busqueda)
{
	$.ajax({
		url : 'php/busqueda.php',
		type : 'POST',
		dataType : 'html',
		data : { busqueda: busqueda },
		})

	.done(function(resultado){
		$("#tabla").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
$(document).ready(function(){
	$("button").click(function(){
		var id = $(this).attr('id');
		if(id == 'putos'){
		var codigo = $(this).val();
		var fe = new Date();
		var fecha = fe.getDate().toString()+"/"+(fe.getMonth()+1).toString()+"/"+fe.getFullYear().toString();
		var clave = "";
		var mens = $("#mens");
		var p = $("#aaaa");
		for(let x=0; x< 6; x++){
			var aleatorio = Math.round(Math.random()*10);
			clave += aleatorio.toString();
		}
		$.ajax({
			url: 'php/claveasistencia.php', 
			method: 'POST',
			data:{
				contra : clave,
				ap: codigo,
				fec: fecha
			},
			success: function (hola){
				mens.text(hola);
				
			}
		});

		}
		else if(id == "elit"){
			codigoEliminar = $(this).val();
		}
		else if(id == "eliminar"){
			var codigo = codigoEliminar;
			console.log(codigo);
			$.post("php/eliminarMat.php",
    		{
    		    name: "elimina",
    		    cod: codigo
    		},
    		function(data, status){
				location.reload();
			});

			
			
		}
	});
});
