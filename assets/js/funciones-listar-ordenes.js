$(document).ready(function(){

	var url = $("#base_url").val();

	var tabla = $("#lista-ordenes").DataTable( {
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

    $(".table-responsive").on("click", "#lista-ordenes tbody tr td .detalle-orden", function(e){

        var idorden = $(this).data("idorden");        

        var request;
        if (request) {
            request.abort();
        }

        $("#VerOrden .modal-body").html('');

        request = $.ajax({
            url: url+"Examenes/VerOrden",
            type: "POST",
            dataType: "json",
            data: "id="+idorden
        });

        request.done(function (response, textStatus, jqXHR){            
            console.log(response);
            if (response['result'] == true) {
                $("#VerOrden .modal-body").html(response['view']);
            }else{
            	alert(response['message']);
            }
            
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
    });

    $(".table-responsive").on("click", "#lista-ordenes tbody tr td .eliminar-orden", function(e){

    	var idorden = $(this).data("idorden"); 
    	var paciente = $(this).data("paciente"); 

        $("#delete-message").hide();

    	$("#el-paciente").html(paciente);
    	$("#accion-eliminar-orden").data('idorden', idorden);
    });

    $(".modal-footer").on("click", "#accion-eliminar-orden", function(e){

        var idorden = $(this).data("idorden");        

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Examenes/EliminarOrden",
            type: "POST",
            dataType: "json",
            data: "id="+idorden
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
            	
            	$("#delete-title").hide();
            	$("#delete-message").removeClass('alert-danger').addClass('alert-success').removeClass('hidden').html(response['message']).show();
            	$("#accion-eliminar-orden").attr('disabled','disabled');

                tabla.row($("#fila_"+idorden)).remove().draw();           	

            }else{
            	//alert(response['message']);
            	$("#delete-message").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response['message']).show();
            }
            
            setTimeout( function(){

                $('#Eliminarorden').modal('hide');
            }, 5000);

            setTimeout( function(){
                $("#delete-message").hide();
                $("#delete-title").show();
                $("#accion-eliminar-orden").removeAttr('disabled');
            }, 6000);
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
    });

    $("#VerOrden").on("click", ".modal-body .row .col-xs-12 #realizarExamen", function(e) {
        if ($("input[name=tipo_examen]").is(":checked")) {
            var base_url    = $("#base_url").val(),
                tipo_examen = $("input[name=tipo_examen]:checked").val(),
                id_orden    = $("#id_orden").val();
            window.location = base_url + "Examenes/AgregarExamen/" + tipo_examen + "/" + id_orden;
        }else{
            alert("Seleccione un examen...");
        }
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