$(document).ready(function(){

	$('#registro-vacuna').validator();

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
        var str_per = "";
        var str_es = "";
        var str_va = "";
        var request;

        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Vacunas/extraer2",
            type: "POST",
            dataType: "json",
            data: "tabla1=periodo&tabla2=esquema&tabla3=via_administracion"
        });

        request.done(function (response, textStatus, jqXHR){
            
            cantidad++;
            $.each(response[0],function(key, value){
                str_per += "<option value=\""+value.id+"\">"+value.descripcion+"</option>";
            });
            $.each(response[1],function(key, value){
                str_es += "<option value=\""+value.id+"\">"+value.descripcion+"</option>";
            });
            $.each(response[2],function(key, value){
                str_va += "<option value=\""+value.id+"\">"+value.descripcion+"</option>";
            });

            str += "<div id=\"esquema_"+cantidad+"\" class=\"col-md-12 esquema-content esquema_"+cantidad+"\">";
            str += "<div class=\"row\">";                                 
            str += "<div class=\"col-xs-6\">";
            str += "<div class=\"form-group\">";
            str += "<label class=\"control-label\" for=\"esquema1\"><span class=\"red\">*</span>Esquema:</label>";
            str += "<select class=\"form-control chosen-select select-esquema\" id=\"esquema"+cantidad+"\" data-dosis=\"cant_dosis"+cantidad+"\" data-intervalo=\"intervalo"+cantidad+"\" data-pintervalo=\"interperiodo"+cantidad+"\" name=\"esquema[]\">";
            str += "<option value=\"\">Seleccionar esquema</option>";
            str +=  str_es;
            str += "</select>"; 
            str += "</div>";
            str += "</div>";
            str += "<div class=\"col-xs-5\">";
            str += "<div class=\"form-group\">";
            str += "<label class=\"control-label\" for=\"cant_dosis"+cantidad+"\"><span class=\"red\">*</span>Cantidad de dosis:</label>";            
            str += "<input type=\"number\" id=\"cant_dosis"+cantidad+"\" name=\"cant_dosis[]\" min=\"1\" class=\"form-control\" required>";            
            str += "</div>";
            str += "</div>";
            str += "<div class=\"col-xs-1\">";
            str += "<button class=\"btn btn-danger btn-remove\" data-dismiss=\"esquema_"+cantidad+"\" title=\"Eliminar esquema\">";
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
            str += "<select class=\"form-control chosen-select\" id=\"interperiodo"+cantidad+"\" name=\"interperiodo[]\">";
            str += "<option value=\"\">Periodo</option>";
            str += str_per;
            str += "</select>";                                       
            str += "</div>";
            str += "</div>";
            str += "</div>";
            str += "</div>";
            str += "<div class=\"col-xs-6\">";
            str += "<div class=\"form-group\">";
            str += "<label class=\"control-label\" for=\"via_administracion"+cantidad+"\"><span class=\"red\">*</span>Vía de administración:</label>";            
            str += "<select class=\"form-control chosen-select\" id=\"via_administracion"+cantidad+"\" name=\"via_administracion[]\">";
            str += "<option value=\"\">Administración</option>";
            str += str_va;
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
            str += "<select class=\"form-control chosen-select\" id=\"eminperiodo"+cantidad+"\" name=\"eminperiodo[]\">";
            str += "<option value=\"\">Periodo</option>";
            str += str_per;
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
            str += "<select class=\"form-control chosen-select\" id=\"emaxperiodo"+cantidad+"\" name=\"emaxperiodo[]\">";
            str += "<option value=\"\">Periodo</option>";
            str += str_per;
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

            //formFull();
            
        });
    });
    
    $("#lista-esquemas").on("click", ".esquema-content .btn-remove", function(e){

        e.preventDefault();

        var cantidad = $("#can-esquemas").val();
        var id_remove = $(this).data('dismiss');

        $("#"+id_remove).remove();

        $("#can-esquemas").val(--cantidad);
    });

    function generarSelectEnfermedades(cantidad){
        var str = "";
        var request;

        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Vacunas/extraer",
            type: "POST",
            dataType: "json",
            data: "tabla=enfermedad"
        });

        request.done(function (response, textStatus, jqXHR){
            
            for (var i = 1; i <= cantidad; i++) {
        
                str += "<div class=\"col-xs-6\">";
                str += "<div class=\"form-group\">";
                str += "<label class=\"control-label\" for=\"enfermedad1\"><span class=\"red\">*</span>Enfermedad "+i+":</label>";
                str += "<select class=\"form-control chosen-select\" id=\"enfermedad"+i+"\" name=\"enfermedad[]\" data-nro=\""+i+"\">";
                str += "<option value=\"\">Seleccionar enfermedad</option>";
                    
                    $.each(response,function(key, value){
                        str += "<option value=\""+value.id+"\">"+value.descripcion+"</option>";
                    });

                str += "</select>";
                str += "</div>";
                str += "</div>";
            }

            $("#list_cant_enfermedades .col-xs-12").html(str);
            $("#list_cant_enfermedades .chosen-select").chosen();
            $("#list_cant_enfermedades .chosen-select").trigger("chosen:updated");
            
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
        });
        
    }
});