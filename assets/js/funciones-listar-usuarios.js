$(document).ready(function(){

	var base_url = $("#base_url").val();
	var action;

	$("#lista_usuarios").DataTable( {
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

    if ($(".alert").length) {

    	setTimeout( function(){                  
            $(".alert").hide('fast');  //Recargar la página luego de 5 segundos
        }, 15000);
	}

	$("#lista_usuarios").on("click", "tbody tr td div a.in-hab-usuario", function(e) {
		//alert('alerta');
		var username = $(this).data('username');
		//var id = $(this).data('idusuario');
		action = $(this).data('action');

		$("#delete-message").hide();

		$("#accion-eliminar-usuario").data('idusuario', $(this).data('idusuario'));
		$("span#accion").html(action);
		$("span#el-usuario").html(username);

		if (action == "habilitar") {
			$("#myModalLabel").html("Habilitar usuario");
		}else if(action == "inhabilitar"){
			$("#myModalLabel").html("Inhabilitar usuario");
		}
		
	});

	$("#accion-eliminar-usuario").on('click', function(e) {
		//alert($(this).data('idusuario')+" - "+action);
		$(this).attr('disabled', 'disabled');

		var idusuario = $(this).data("idusuario");        

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: base_url+"Usuario/EliminarUsuario",
            type: "POST",
            dataType: "json",
            data: "id="+idusuario+"&action="+action
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
            	
            	$("#delete-title").hide();
            	$("#delete-message").removeClass('alert-danger').addClass('alert-success').html(response['message']).show();

            	if (action == "habilitar") {
        			$("#fila_"+idusuario).removeClass('danger');
        			$("#fila_"+idusuario+" td div").children(".in-hab-usuario").removeClass('btn-primary').addClass('btn-danger').attr('title','Inhabilitar usuario').data('action','inhabilitar');
        			$("#fila_"+idusuario+" td div .in-hab-usuario span").removeClass("glyphicon-ok").addClass("glyphicon-remove");
            	}else{
            		$("#fila_"+idusuario).addClass('danger');
            		$("#fila_"+idusuario+" td div").children(".in-hab-usuario").removeClass('btn-danger').addClass('btn-primary').attr('title','Habilitar usuario').data('action','habilitar');
            		$("#fila_"+idusuario+" td div .in-hab-usuario span").removeClass("glyphicon-remove").addClass("glyphicon-ok");
            	}
            		            	
            }else{
            	//alert(response['message']);
            	$("#delete-message").removeClass('alert-success').addClass('alert-danger').html(response['message']).show();
            }

            setTimeout( function(){

            	$('#EliminarUsuario').modal('hide');
            }, 5000);

            setTimeout( function(){
            	$("#delete-message").hide();
            	$("#delete-title").show();
                $("#accion-eliminar-usuario").removeAttr('disabled');
            }, 6000);
            
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
	});

});