$(document).ready(function(){

	var url = $("#base_url").val();

	var tabla = $("#lista-citas").DataTable( {
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

    /*$(".table-responsive").on("click", "#lista-citas tbody tr td .detalle-cita", function(e){

        var idcita = $(this).data("idcita");        

        var request;
        if (request) {
            request.abort();
        }

        $("#portada-cita").attr('src',url+"assets/img/loading.gif");
        $("#titulo-cita").html('');
    	$("#descripcion-cita").html('');
    	$("#fecha_inicio").html('');
    	$("#hora_inicio").html('');
    	$("#fecha_fin").html('');
    	$("#hora_fin").html('');

        request = $.ajax({
            url: url+"cita/Vercita",
            type: "POST",
            dataType: "json",
            data: "id="+idcita
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
            	
            	if (response['img'] != null) {

            		$("#portada-cita").attr('src',url+"assets/img/citas/"+response['img']);
            	}else{
            		$("#portada-cita").attr('src',url+"assets/img/citas.jpg");
            	}

            	$("#titulo-cita").html(response['titulo']);
            	$("#descripcion-cita").html(response['descripcion']);
            	$("#fecha_inicio").html(response['fecha_inicio']);
            	$("#hora_inicio").html(response['hora_inicio']);
            	$("#fecha_fin").html(response['fecha_fin']);
            	$("#hora_fin").html(response['hora_fin']);
            }else{
            	alert(response['message']);
            }
            
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
    });*/

    $(".table-responsive").on("click", "#lista-citas tbody tr td .eliminar-cita", function(e){

    	var idcita = $(this).data("idcita"),
            fila= $(this).closest("tr"),
            nombre= fila.find(".listanombre").text(),
            apellido= fila.find(".listaapellido").text(),
            fecha= fila.find(".listafecha").text();
        $("#delete-message").hide();

    	$("#nom_paciente").html(nombre + " " + apellido);
        $("#fecha_cita").html(fecha);
    	$("#accion-eliminar-cita").data('idcita', idcita);
    });

    $(".modal-footer").on("click", "#accion-eliminar-cita", function(e){

        var idcita = $(this).data("idcita");        

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"citas/CancelarCita",
            type: "POST",
            dataType: "json",
            data: "id="+idcita
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
            	
            	$("#delete-title").hide();
            	$("#delete-message").removeClass('alert-danger').addClass('alert-success').removeClass('hidden').html(response['message']).show();
            	$("#accion-eliminar-cita").attr('disabled','disabled');
                setTimeout(function() {
                    window.location=  url+"Citas/ListarCitas"; 
                }, 2000);

            }else{
            	//alert(response['message']);
            	$("#delete-message").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response['message']).show();
            }
            
            setTimeout( function(){

                $('#Eliminarcita').modal('hide');
            }, 5000);

            setTimeout( function(){
                $("#delete-message").hide();
                $("#delete-title").show();
                $("#accion-eliminar-cita").removeAttr('disabled');
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

    $(".table-responsive").on("click", "#lista-citas tbody tr td .detalle-cita",function(e){
        e.preventDefault();
    });
    
    $("#lista-citas tbody tr td .detalle-cita").each(function(i,v){
        var titulo=$(this).attr("title"),
            contenido=$(this).data("content"),
            popover= {
                title: titulo,
                content: contenido,
                trigger: "hover",
                plasement: "left",
            }
        $(this).popover(popover);
    });
});