$(document).ready(function(){

	var url = $("#base_url").val();

	$("#lista_noticias").DataTable( {
    "language": {
        	"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
    	}
    });

    $(".table-responsive").on("click", "#lista_noticias tbody tr td .eliminar-noticia", function(e){

    	var idnoticia = $(this).data("idnoticia"); 
    	var titulo = $(this).data("titulo"); 

    	$("#la-noticia").html(titulo);
    	$("#accion-eliminar-noticia").data('idnoticia', idnoticia);
    });

    $(".modal-footer").on("click", "#accion-eliminar-noticia", function(e){

        var idnoticia = $(this).data("idnoticia");        

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Noticia/EliminarNoticia",
            type: "POST",
            dataType: "json",
            data: "id="+idnoticia
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
            	
            	$("#delete-title").hide();
            	$("#delete-message").removeClass('alert-danger').addClass('alert-success').show().html(response['message']);
            	$("#accion-eliminar-noticia").attr('disabled','disabled');
            	setTimeout( function(){                  
                    location.reload();  //Recargar la página luego de 5 segundos
                }, 5000);

            }else{
            	//alert(response['message']);
            	$("#delete-message").removeClass('alert-success').addClass('alert-danger').show().html(response['message']);
            }
            
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
    });
});