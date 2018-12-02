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
	$(document).on("click","#putos",function(){
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
	});
	$(document).on("click","#elim",function(){
		var cod = $(this).val();
		codigoEliminar = cod;
	});	

	$(document).on("click","#eliminar",function(){
		var datoeliminar = codigoEliminar;
		$.ajax({
				url: 'php/eliminarMat.php', 
				method: 'POST',
				data:{
					cod : datoeliminar,
				},
				success: function (){
					$("#tabla").load('php/busqueda.php');
				}
			});
		
	});
});
