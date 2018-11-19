$(obtener_registros());

function obtener_registros(busqueda)
{
	$.ajax({
		url : 'php/inscritas.php',
		type : 'POST',
		dataType : 'html',
		data : { busqueda: busqueda },
		})

	.done(function(resultado){
		$("#tabla").html(resultado);
	})
}

$(document).on('keyup', '#buscar', function()
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
