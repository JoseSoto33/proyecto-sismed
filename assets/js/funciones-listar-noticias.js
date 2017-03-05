$(document).ready(function(){

	var url = $("#base_url").val();

	var tabla = $("#lista_noticias").DataTable( {
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

     $(".table-responsive").on("click", "#lista_noticias tbody tr td .detalle-noticia", function(e){

        var idnoticia = $(this).data("idnoticia");        

        var request;
        if (request) {
            request.abort();
        }

        $("#portada-noticia").attr('src',url+"assets/img/loading.gif");
        $("#titulo-noticia").html('');
        $("#descripcion-noticia").html('');
       
        request = $.ajax({
            url: url+"Noticia/VerNoticia",
            type: "POST",
            dataType: "json",
            data: "id="+idnoticia
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
                
                if (response['img'] != null) {

                    $("#portada-noticia").attr('src',url+"assets/img/noticias/"+response['img']);
                }else{
                    $("#portada-noticia").attr('src',url+"assets/img/noticias/Noticias.png");
                }

                if (response['url'] != null) {
                    $("a#link").attr("href",response['url']).removeClass("hidden");
                }else{
                    $("a#link").attr("src","").addClass("hidden");
                }

                $("#titulo-noticia").html(response['titulo']);
                $("#descripcion-noticia").html(response['descripcion']);                
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

    $(".table-responsive").on("click", "#lista_noticias tbody tr td .eliminar-noticia", function(e){

    	var idnoticia = $(this).data("idnoticia"); 
    	var titulo = $(this).data("titulo"); 

        $("#delete-message").hide();

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
            	$("#delete-message").removeClass('alert-danger').addClass('alert-success').html(response['message']).show();
            	$("#accion-eliminar-noticia").attr('disabled','disabled');
                tabla.row($("#fila_"+idnoticia)).remove().draw();
            	
            }else{
            	//alert(response['message']);
            	$("#delete-message").removeClass('alert-success').addClass('alert-danger').html(response['message']).show();
            }
            
            setTimeout( function(){

                $('#EliminarNoticia').modal('hide');
            }, 5000);

            setTimeout( function(){
                $("#delete-message").hide();
                $("#delete-title").show();
                $("#accion-eliminar-noticia").removeAttr('disabled');
            }, 6000);

        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
    });
});