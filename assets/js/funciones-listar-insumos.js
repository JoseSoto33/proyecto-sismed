$(document).ready(function(){

	var url = $("#base_url").val();

	var tabla = $("#listar-insumos").DataTable( {
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


    $(".table-responsive").on("click", "#listar-insumos tbody tr td .eliminar-insumo", function(e){

    	var idinsumo = $(this).data("idinsumo"); //lo que va en data viene del html data-idinsumo del ListarInsumos
    	var nombre = $(this).data("nombre"); 
        var action = $(this).data("action");

        $("#delete-message").hide();
        
        $("#action-title").html(action);
    	$("#el-insumo").html(nombre);
    	$("#accion-eliminar-insumo").data('idinsumo', idinsumo);
        $("#accion-eliminar-insumo").data('action', action);
    });

    $(".modal-footer").on("click", "#accion-eliminar-insumo", function(e){

        var idinsumo = $(this).data("idinsumo"); 
        var action = $(this).data("action");       

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Inventario/EliminarInsumo",
            type: "POST",
            dataType: "json",
            data: "id="+idinsumo+"&action="+action
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
            	
            	$("#delete-title").hide();
            	$("#delete-message").removeClass('alert-danger').addClass('alert-success').removeClass('hidden').html(response['message']).show();
            	$("#accion-eliminar-insumo").attr('disabled','disabled');                

                setTimeout( function(){                  
                     window.location.href = url+"Inventario/ListarInsumos";  
                }, 5000);
                
            }else{
            	//alert(response['message']);
            	$("#delete-message").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response['message']).show();
            }
            
            setTimeout( function(){

                $('#EliminarInsumo').modal('hide');
            }, 5000);

            setTimeout( function(){
                $("#delete-message").hide();
                $("#delete-title").show();
                $("#accion-eliminar-insumo").removeAttr('disabled');
            }, 6000);
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
    });

    $(".table-responsive").on("click", "#listar-insumos tbody tr td .ver-lotes", function(e){

        var idinsumo = $(this).data("idinsumo"); //lo que va en data viene del html data-idinsumo del ListarInsumos
        var nombre = $(this).data("nombre"); 
        var html = "<tr><td colspan=\"4\" align=\"center\"><img src=\""+url+"assets/img/default.gif\"></td></tr>";

        $("#insumo-lotes tbody").html(html);
        $("#el-lote-insumo").html(nombre);

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Inventario/ExtraerLotes",
            type: "POST",
            dataType: "json",
            data: "id="+idinsumo
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
                
                html = "";

                $.each(response['data'], function(index, value){

                    html += "<tr>";
                    html += "<td>"+value['cantidad']+" "+value['unidad_medida']+"</td>";
                    html += "<td>"+value['fecha_elaboracion']+"</td>";
                    html += "<td>"+value['fecha_vencimiento']+"</td>";
                    html += "<td>";
                    html += "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";

                    //---Boton Añadir lote---
                    html += "<a class=\"btn btn-sm btn-success añadir-lote\" href=\""+url+"Inventario/ModificarInsumo/"+idinsumo+"\" title=\"Añadir lote\">";
                    html += "<span class=\"glyphicon glyphicon-plus-sign\"></span>";
                    html += "</a>";

                    //---Boton Descontar lote---
                    html += "<a class=\"btn btn-sm btn-danger descontar-lote\" href=\""+url+"Inventario/ModificarInsumo/"+idinsumo+"\" title=\"Descontar lote\">";
                    html += "<span class=\"glyphicon glyphicon-minus-sign\"></span>";
                    html += "</a>";

                    html += "</div>";                    
                    html += "</td>";
                    html += "</tr>";
                });

                $("#insumo-lotes tbody").html(html);
                       
            }else{
                //alert(response['message']);
                $("#delete-message").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response['message']).show();
            }
            
            
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });
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