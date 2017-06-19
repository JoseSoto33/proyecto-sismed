$(document).ready(function(){

	var url = $("#base_url").val();

	var tabla = $("#lista-patologias").DataTable( {
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

     if ($("#alert-message").length) {

        setTimeout( function(){                  
            $("#alert-message").hide('fast');  
        }, 10000);
    }


    $(".table-responsive").on("click", "#lista-patologias tbody tr td .eliminar-patologia", function(e){

    	var idpatologia = $(this).data("idpatologia"); 
    	var nombre = $(this).data("nombre"); 
        var action = $(this).data("action");

        $("#delete-message").hide();

        $("#action-title").html(action);
    	$("#la-patologia").html(nombre);
    	$("#accion-eliminar-patologia").data('idpatologia', idpatologia);
        $("#accion-eliminar-patologia").data('action', action);
    });

    $(".modal-footer").on("click", "#accion-eliminar-patologia", function(e){

        var idpatologia = $(this).data("idpatologia");    
        var action = $(this).data("action");      

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Patologia/EliminarPatologia",
            type: "POST",
            dataType: "json",
            data: "id="+idpatologia+"&action="+action
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
            	
            	$("#delete-title").hide();
            	$("#delete-message").removeClass('alert-danger').addClass('alert-success').removeClass('hidden').html(response['message']).show();
            	$("#accion-eliminar-patologia").attr('disabled','disabled');

                //tabla.row($("#fila_"+idpatologia)).remove().draw(); 
                setTimeout( function(){                  
                     window.location.href = url+"Patologia/ListarPatologias";  
                }, 5000);          	

            }else{
            	//alert(response['message']);
            	$("#delete-message").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response['message']).show();
            }
            
            setTimeout( function(){

                $('#EliminarPatologia').modal('hide');
            }, 5000);

            setTimeout( function(){
                $("#delete-message").hide();
                $("#delete-title").show();
                $("#accion-eliminar-patologia").removeAttr('disabled');
            }, 6000);
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
    });

    function dump(obj) {

        var out = "";
        for (var i in obj) {
            out += i + ": " + obj[i] + "\n";
        }

        alert(out);

        // or, if you wanted to avoid alerts...

        /*var pre = document.createElement("pre");
        pre.innerHTML = out;
        document.body.appendChild(pre)*/
    }
});