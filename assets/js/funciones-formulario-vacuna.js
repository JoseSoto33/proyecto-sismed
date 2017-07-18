$(document).ready(function(){

	var url = $("#base_url").val();

	$('#registro-vacuna').validator();

	$('#registro-vacuna .chosen-select').chosen();

	$("#registro-vacuna").on("submit", function(){

        $(this).attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });

    $('#cant_enfermedad').on('keyup',function(){

        var cantidad = $(this).val();
        
        generarSelectEnfermedades(cantidad);
    });

    $('#cant_enfermedad').on('change',function(){

        var cantidad = $(this).val();
        
        generarSelectEnfermedades(cantidad);
    });

    $("#add_esquema").on("click", function(e){

        e.preventDefault();

        var cantidad = $("#can-esquemas").val();
        var str = "";

        cantidad++;

        str += "<div id=\"esquema_"+cantidad+"\" class=\"col-md-12 esquema-content esquema_"+cantidad+"\">";
        str += "<div class=\"row\">";                                 
        str += "<div class=\"col-xs-6\">";
        str += "<div class=\"form-group\">";
        str += "<label class=\"control-label\" for=\"esquema1\"><span class=\"red\">*</span>Esquema:</label>";
        str += "<select class=\"form-control chosen-select select-esquema\" id=\"esquema"+cantidad+"\" data-dosis=\"cant_dosis"+cantidad+"\" data-intervalo=\"intervalo"+cantidad+"\" data-pintervalo=\"interperiodo"+cantidad+"\" name=\"esquema[]\" data-placeholder=\"Seleccionar esquema...\">";
        str += "<option></option>";
        str += "<option value=\"Única\">Única</option>";
		str += "<option value=\"Dosis\">Dosis</option>";
		str += "<option value=\"Refuerzo\">Refuerzo</option>";
        str += "</select>"; 
        str += "</div>";
        str += "</div>";
        str += "<div class=\"col-xs-4\">";
        str += "<div class=\"form-group\">";
        str += "<label class=\"control-label\" for=\"cant_dosis"+cantidad+"\"><span class=\"red\">*</span>Cantidad de dosis:</label>";            
        str += "<input type=\"number\" id=\"cant_dosis"+cantidad+"\" name=\"cant_dosis[]\" min=\"1\" class=\"form-control\" required>";            
        str += "</div>";
        str += "</div>";
        str += "<div class=\"col-xs-2\">";
        str += "<button class=\"btn btn-danger btn-remove pull-right\" data-dismiss=\"esquema_"+cantidad+"\" title=\"Eliminar esquema\">";
        str += "<span class=\"glyphicon glyphicon-remove\"></span>";
        str += "</button>";
        str += "</div>";
        str += "</div>";
        str += "<div class=\"row\">";
        str += "<div class=\"col-xs-6\">";
        str += "<div class=\"form-group\">";
        str += "<div class=\"row\">";
        str += "<label class=\"col-xs-12 control-label\" for=\"intervalo"+cantidad+"\"><span class=\"red\">*</span>Intervalo:</label>";
        str += "<div class=\"col-xs-6\">";
        str += "<input type=\"number\" id=\"intervalo"+cantidad+"\" name=\"intervalo[]\" min=\"1\" class=\"form-control\" required>";                                      
        str += "</div>";
        str += "<div class=\"col-xs-6\">";
        str += "<select class=\"form-control chosen-select\" id=\"interperiodo"+cantidad+"\" name=\"interperiodo[]\" data-placeholder=\"Periodo...\">";
        str += "<option></option>";
        str += "<option value=\"Hora(s)\">Hora(s)</option>";
		str += "<option value=\"Día(s)\">Día(s)</option>";
		str += "<option value=\"Semana(s)\">Semana(s)</option>";
		str += "<option value=\"Mese(s)\">Mese(s)</option>";
		str += "<option value=\"Año(s)\">Año(s)</option>";
        str += "</select>";                                       
        str += "</div>";
        str += "</div>";
        str += "</div>";
        str += "</div>";
        str += "<div class=\"col-xs-6\">";
        str += "<div class=\"form-group\">";
        str += "<label class=\"control-label\" for=\"via_administracion"+cantidad+"\"><span class=\"red\">*</span>Vía de administración:</label>";            
        str += "<select class=\"form-control chosen-select\" id=\"via_administracion"+cantidad+"\" name=\"via_administracion[]\" data-placeholder=\"Seleccionar...\">";
        str += "<option></option>";
		str += "<option value=\"Oral\">Oral</option>";
		str += "<option value=\"Intramuscular\">Intramuscular</option>";
		str += "<option value=\"Subcutánea\">Subcutánea</option>";
		str += "<option value=\"Endovenosa\">Endovenosa</option>";
		str += "<option value=\"Intradérmica\">Intradérmica</option>";
        str += "</select>"; 
        str += "</div>";
        str += "</div>";
        str += "</div>";
        str += "<div class=\"row\">";
        str += "<div class=\"col-xs-6\">";
        str += "<div class=\"form-group\">";
        str += "<div class=\"row\">";
        str += "<label class=\"col-xs-12 control-label\" for=\"eminima"+cantidad+"\"><span class=\"red\">*</span>Edad mínima:</label>";
        str += "<div class=\"col-xs-6\">";
        str += "<input type=\"number\" id=\"eminima"+cantidad+"\" name=\"eminima[]\" min=\"1\" class=\"form-control\" required>";                                      
        str += "</div>";
        str += "<div class=\"col-xs-6\">";
        str += "<select class=\"form-control chosen-select\" id=\"eminperiodo"+cantidad+"\" name=\"eminperiodo[]\" data-placeholder=\"Periodo...\">";
        str += "<option></option>";
        str += "<option value=\"Hora(s)\">Hora(s)</option>";
		str += "<option value=\"Día(s)\">Día(s)</option>";
		str += "<option value=\"Semana(s)\">Semana(s)</option>";
		str += "<option value=\"Mese(s)\">Mese(s)</option>";
		str += "<option value=\"Año(s)\">Año(s)</option>";
        str += "</select>";                                       
        str += "</div>";
        str += "</div>";
        str += "</div>";
        str += "</div>";
        str += "<div class=\"col-xs-6\">";
        str += "<div class=\"form-group\">";
        str += "<div class=\"row\">";
        str += "<label class=\"col-xs-12 control-label\" for=\"emaxima"+cantidad+"\"><span class=\"red\">*</span>Edad máxima:</label>";
        str += "<div class=\"col-xs-6\">";
        str += "<input type=\"number\" id=\"emaxima"+cantidad+"\" name=\"emaxima[]\" min=\"1\" class=\"form-control\" required>";                                      
        str += "</div>";
        str += "<div class=\"col-xs-6\">";
        str += "<select class=\"form-control chosen-select\" id=\"emaxperiodo"+cantidad+"\" name=\"emaxperiodo[]\" data-placeholder=\"Periodo...\">";
        str += "<option></option>";
        str += "<option value=\"Hora(s)\">Hora(s)</option>";
		str += "<option value=\"Día(s)\">Día(s)</option>";
		str += "<option value=\"Semana(s)\">Semana(s)</option>";
		str += "<option value=\"Mese(s)\">Mese(s)</option>";
		str += "<option value=\"Año(s)\">Año(s)</option>";
        str += "</select>";                                       
        str += "</div>";
        str += "</div>";
        str += "</div>";
        str += "</div>";
        str += "</div>";
        str += "</div>";             
        

        $("#lista-esquemas").append(str);
        $("#lista-esquemas .chosen-select").chosen();
        $("#lista-esquemas .chosen-select").trigger("chosen:updated");
        $("#can-esquemas").val(cantidad);

    });
    
    $("#lista-esquemas").on("click", ".esquema-content .btn-remove", function(e){

        e.preventDefault();

        var cantidad = $("#can-esquemas").val();
        var id_remove = $(this).data('dismiss');

        $("#"+id_remove).remove();

        $("#can-esquemas").val(--cantidad);
    });

    $("#lista-esquemas").on("change", ".esquema-content .form-group .select-esquema", function(){

        var valor = $(this).val();
        var dosis = $(this).data('dosis');
        var intervalo = $(this).data('intervalo');
        var pintervalo = $(this).data('pintervalo');

        console.log("Input dosis: "+dosis+" -- Input intervalo: "+intervalo+" -- Input pintervalo: "+pintervalo);

        if (valor == "Única") {
            $("#"+dosis).val(1).attr("readonly","readonly");
            $("#"+intervalo).val(1).attr("readonly","readonly");
            $("#"+pintervalo).val("Día(s)").attr("readonly","readonly").addClass("disabled");
        }else{
            $("#"+dosis).val(1).removeAttr("readonly");
            $("#"+intervalo).val(1).removeAttr("readonly");
            $("#"+pintervalo).val("Día(s)").removeAttr("readonly").removeClass("disabled");
        }
    });

    function generarSelectEnfermedades(cantidad){
        var str = "";
        var request;

        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Patologia/ExtraerPatologia",
            type: "POST",
            dataType: "json"
        });

        request.done(function (response, textStatus, jqXHR){
            
            for (var i = 1; i <= cantidad; i++) {
        
                str += "<div class=\"col-xs-6\">";
                str += "<div class=\"form-group\">";
                str += "<label class=\"control-label\" for=\"enfermedad1\"><span class=\"red\">*</span>Enfermedad "+i+":</label>";
                str += "<select class=\"form-control chosen-select\" id=\"enfermedad"+i+"\" name=\"enfermedad[]\" data-nro=\""+i+"\" data-placeholder=\"Seleccionar enfermedad...\">";
                str += "<option></option>";
                    
                    $.each(response,function(key, value){
                        str += "<option value=\""+value.id+"\">"+value.nombre+"</option>";
                    });

                str += "</select>";
                str += "</div>";
                str += "</div>";
            }

            $("#list_cant_enfermedades").html(str);
            $("#list_cant_enfermedades .chosen-select").chosen();
            $("#list_cant_enfermedades .chosen-select").trigger("chosen:updated");
            
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
        });
        
    }
});