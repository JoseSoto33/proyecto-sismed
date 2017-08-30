$(document).ready(function(){

	var url = $("#base_url").val();
    var patologias;
    var ids_patologias_delete = [];

	var tabla = $("#lista-vacunas").DataTable( {
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

    var tabla2 = $("#vacuna_esquemas").DataTable( {
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

    $(".table-responsive").on("click", "#lista-vacunas tbody tr td .ver-vacuna", function(e){

        var idvacuna = $(this).data("idvacuna"); 
        var nombre = $(this).data("nombre");

        $("#vac_nombre").val(nombre);

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Vacuna/VerVacuna",
            type: "POST",
            dataType: "json",
            data: "id="+idvacuna
        });

        request.done(function (response, textStatus, jqXHR){            
                        
            console.log(response);

            patologias = response["patologias"];
            esquemas = response["esquemas"];
            var list_patologias = "";
            var list_esquemas = "";

            $.each(patologias, function(index, value){

                list_patologias += "<li class=\"list-group-item\">";
                list_patologias += value["nombre"];
                list_patologias += "<button class=\"btn btn-xs btn-danger pull-right eliminar-patologia hidden\" data-idpatologia=\""+value["id_patologia"]+"\">";
                list_patologias += "<span class=\"glyphicon glyphicon-remove\"></span>";
                list_patologias += "</button>";
                list_patologias += "</li>";
            });

            $("#lista-patologias").html(list_patologias);

            $.each(esquemas, function(index, value){

                list_esquemas += "<div class=\"panel panel-default\">";
                list_esquemas += "<div class=\"panel-heading\" role=\"tab\" id=\"heading"+index+"\">";
                list_esquemas += "<h4 class=\"panel-title\">";
                list_esquemas += value["esquema"];
                list_esquemas += "<a class=\"collapsed pull-right\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse"+index+"\" aria-expanded=\"false\" aria-controls=\"collapse"+index+"\">";
                list_esquemas += "<span class=\"glyphicon glyphicon-plus\"></span>";
                list_esquemas += "</a>";
                list_esquemas += "</h4>";
                list_esquemas += "</div>";
                list_esquemas += "<div id=\"collapse"+index+"\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading"+index+"\">";
                list_esquemas += "<div class=\"panel-body\">";
                list_esquemas += "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
                list_esquemas += "<a  href=\"#\" id=\"eliminar-esquema"+index+"\" class=\"btn btn-xs btn-success editar-esquema data-idesquema=\""+value["id"]+"\" \">";
                list_esquemas += "<span class=\"glyphicon glyphicon-pencil\"></span>";
                list_esquemas += "</a>";
                list_esquemas += "<a  href=\"#\" id=\"eliminar-esquema"+index+"\" class=\"btn btn-xs btn-danger eliminar-esquema data-idesquema=\""+value["id"]+"\" \">";
                list_esquemas += "<span class=\"glyphicon glyphicon-trash\"></span>";
                list_esquemas += "</a>";
                list_esquemas += "</div>";
                list_esquemas += "<ul id=\"esquema"+index+"\">";
                list_esquemas += "<li><b>Esquema:</b> "+value["esquema"]+".</li>";
                list_esquemas += "<li><b>Cantidad de dosis:</b> "+value["cant_dosis"]+".</b></li>";
                list_esquemas += "<li><b>Vía de administración:</b> "+value["via_administracion"]+".</b></li>";
                list_esquemas += "<li><b>Edad mínima:</b> "+value["min_edad_aplicacion"]+" "+value["min_edad_periodo"]+".</li>";
                list_esquemas += "<li><b>Edad máxima:</b> "+value["max_edad_aplicacion"]+" "+value["max_edad_periodo"]+".</li>";
                list_esquemas += "<li><b>Intervalo de aplicación:</b> "+value["intervalo"]+" "+value["intervalo_periodo"]+".</b></li>";
                list_esquemas += "</ul>";

                list_esquemas += "<div id=\"form_esquema"+index+"\">";
                list_esquemas += "<div class=\"row\">";
                list_esquemas += "<div class=\"col-xs-6\">";
                list_esquemas += "<div class=\"form-group\">";
                list_esquemas += "<label class=\"control-label\" for=\"esquema1\"><span class=\"red\">*</span>Esquema:</label>";
                list_esquemas += "<select class=\"form-control chosen-select select-esquema\" id=\"esquema1\" data-dosis=\"cant_dosis1\" data-intervalo=\"intervalo1\" data-pintervalo=\"interperiodo1\" name=\"esquema\" data-placeholder=\"Seleccionar esquema...\">";
                list_esquemas += "<option></option>";
                list_esquemas += "<option value=\"Única\">Única</option>";
                list_esquemas += "<option value=\"Dosis\">Dosis</option>";
                list_esquemas += "<option value=\"Refuerzo\">Refuerzo</option>";
                list_esquemas += "</select>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "<div class=\"col-xs-6\">";
                list_esquemas += "<div class=\"form-group\">";
                list_esquemas += "<label class=\"control-label\" for=\"cant_dosis1\"><span class=\"red\">*</span>Cantidad de dosis:</label>";
                list_esquemas += "<input type=\"number\" id=\"cant_dosis1\" name=\"cant_dosis\" min=\"1\" class=\"form-control\" required pattern=\"[1-9]{1,4}\" value=\"\" >";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "<div class=\"col-xs-12\">";
                list_esquemas += "<div class=\"form-group\">";
                list_esquemas += "<div class=\"row\">";
                list_esquemas += "<label class=\"col-xs-12 control-label\" for=\"intervalo1\"><span class=\"red\">*</span>Intervalo:</label>";
                list_esquemas += "<div class=\"col-xs-6\">";
                list_esquemas += "<input type=\"number\" id=\"intervalo1\" name=\"intervalo\" min=\"1\" class=\"form-control\" required>";
                list_esquemas += "</div>";
                list_esquemas += "<div class=\"col-xs-6\">";
                list_esquemas += "<select class=\"form-control chosen-select\" id=\"interperiodo1\" name=\"interperiodo\" data-placeholder=\"Periodo...\">";
                list_esquemas += "<option></option>";
                list_esquemas += "<option value=\"Hora(s)\">Hora(s)</option>";
                list_esquemas += "<option value=\"Día(s)\">Día(s)</option>";
                list_esquemas += "<option value=\"Semana(s)\">Semana(s)</option>";
                list_esquemas += "<option value=\"Mese(s)\">Mese(s)</option>";
                list_esquemas += "<option value=\"Año(s)\">Año(s)</option>";
                list_esquemas += "</select>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "<div class=\"col-xs-12\">";
                list_esquemas += "<div class=\"form-group\">";
                list_esquemas += "<label class=\"control-label\" for=\"via_administracion1\"><span class=\"red\">*</span>Vía de administración:</label> ";
                list_esquemas += "<select class=\"form-control chosen-select\" id=\"via_administracion1\" name=\"via_administracion\" data-placeholder=\"Seleccionar...\">";
                list_esquemas += "<option></option>";
                list_esquemas += "<option value=\"Oral\">Oral</option>";
                list_esquemas += "<option value=\"Intramuscular\">Intramuscular</option>";
                list_esquemas += "<option value=\"Subcutánea\">Subcutánea</option>";
                list_esquemas += "<option value=\"Endovenosa\">Endovenosa</option>";
                list_esquemas += "<option value=\"Intradérmica\">Intradérmica</option>";
                list_esquemas += "</select>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "<div class=\"col-md-12\">";
                list_esquemas += "<div class=\"form-group\">";
                list_esquemas += "<div class=\"row\">";
                list_esquemas += "<label class=\"col-xs-12 control-label\" for=\"eminima1\"><span class=\"red\">*</span>Edad mínima:</label>";
                list_esquemas += "<div class=\"col-xs-6\">";
                list_esquemas += "<input type=\"number\" id=\"eminima1\" name=\"eminima\" min=\"1\" class=\"form-control\" required>";
                list_esquemas += "</div>";
                list_esquemas += "<div class=\"col-xs-6\">";
                list_esquemas += "<select class=\"form-control chosen-select\" id=\"eminperiodo1\" name=\"eminperiodo\" data-placeholder=\"Periodo...\">";
                list_esquemas += "<option></option>";
                list_esquemas += "<option value=\"Hora(s)\">Hora(s)</option>";
                list_esquemas += "<option value=\"Día(s)\">Día(s)</option>";
                list_esquemas += "<option value=\"Semana(s)\">Semana(s)</option>";
                list_esquemas += "<option value=\"Mese(s)\">Mese(s)</option>";
                list_esquemas += "<option value=\"Año(s)\">Año(s)</option>";
                list_esquemas += "</select>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "<div class=\"col-md-12\">";
                list_esquemas += "<div class=\"form-group\">";
                list_esquemas += "<div class=\"row\">";
                list_esquemas += "<label class=\"col-xs-12 control-label\" for=\"emaxima1\"><span class=\"red\">*</span>Edad máxima:</label>";
                list_esquemas += "<div class=\"col-xs-6\">";
                list_esquemas += "<input type=\"number\" id=\"emaxima1\" name=\"emaxima\" min=\"1\" class=\"form-control\" required>                                      ";
                list_esquemas += "</div>";
                list_esquemas += "<div class=\"col-xs-6\">";
                list_esquemas += "<select class=\"form-control chosen-select\" id=\"emaxperiodo1\" name=\"emaxperiodo\" data-placeholder=\"Periodo...\">";
                list_esquemas += "<option></option>";
                list_esquemas += "<option value=\"Hora(s)\">Hora(s)</option>";
                list_esquemas += "<option value=\"Día(s)\">Día(s)</option>";
                list_esquemas += "<option value=\"Semana(s)\">Semana(s)</option>";
                list_esquemas += "<option value=\"Mese(s)\">Mese(s)</option>";
                list_esquemas += "<option value=\"Año(s)\">Año(s)</option>";
                list_esquemas += "</select>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";

                list_esquemas += "</div>";
                list_esquemas += "</div>";
                list_esquemas += "</div>";

                /*list_esquemas += "<button class=\"btn btn-xs btn-danger pull-right eliminar-patologia hidden\" data-idpatologia=\""+value["id_patologia"]+"\">";
                list_esquemas += "<span class=\"glyphicon glyphicon-remove\"></span>";
                list_esquemas += "</button>";*/
                //list_esquemas += "</tr>";
            });

            $("#accordion").html(list_esquemas);
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
    });

    $(".table-responsive").on("click", "#lista-vacunas tbody tr td .eliminar-vacuna", function(e){

    	var idvacuna = $(this).data("idvacuna"); 
    	var nombre = $(this).data("nombre"); 
        var action = $(this).data("action");

        $("#delete-message").hide();

        $("#action-title").html(action);
    	$("#la-vauna").html(nombre);
    	$("#accion-eliminar-vauna").data('idvacuna', idvacuna);
        $("#accion-eliminar-vauna").data('action', action);
    });

    $("#editar-vacuna").on("click", function(e){

        $("#vac_nombre").removeAttr("readonly");
        $("#fen-buttons").removeClass("hidden").children(".btn").removeAttr("disabled");
    });

    $("#form-editar-nombre").on("click", ".form-group #c_vac_nombre", function(e){

        $("#vac_nombre").attr("readonly","readonly");
        $("#fen-buttons").addClass("hidden").children(".btn").attr("disabled");
    });

    $(".modal-footer").on("click", "#accion-eliminar-vauna", function(e){

        var idvacuna = $(this).data("idvacuna");    
        var action = $(this).data("action");      

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Vacuna/EliminarVacuna",
            type: "POST",
            dataType: "json",
            data: "id="+idvacuna+"&action="+action
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
            	
            	$("#delete-title").hide();
            	$("#delete-message").removeClass('alert-danger').addClass('alert-success').removeClass('hidden').html(response['message']).show();
            	$("#accion-eliminar-vacuna").attr('disabled','disabled');

                //tabla.row($("#fila_"+idpatologia)).remove().draw(); 
                setTimeout( function(){                  
                     window.location.href = url+"Vacuna/ListarVacunas";  
                }, 5000);          	

            }else{
            	//alert(response['message']);
            	$("#delete-message").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response['message']).show();
            }
            
            setTimeout( function(){

                $('#EliminarVacuna').modal('hide');
            }, 5000);

            setTimeout( function(){
                $("#delete-message").hide();
                $("#delete-title").show();
                $("#accion-eliminar-vacuna").removeAttr('disabled');
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