$(document).ready(function(){

	var url = $("#base_url").val();
    var patologias = [];                 //Array que almacenará la información de las patologías asociadas a la vacuna
    var otras_patologias = [];           //Array que almacenará la información de las patologías no asociadas a la vacuna
    var ids_patologias_delete = [];      //Array que almacenará los ID's de las patologías que se desean eliminar
    var idvacuna;                        //Almacena el ID de la vacuna cuyos detalles se muestran en el modal

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
    }else{

        $(".alert").hide();
    }

    /** Ver detalles de vacuna **/

    $(".table-responsive").on("click", "#lista-vacunas tbody tr td .ver-vacuna", function(e){

        idvacuna = $(this).data("idvacuna"); 
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
                        
            patologias = response["patologias"];
            esquemas = response["esquemas"];
            var list_patologias = "";
            var list_esquemas = "";

            $("#lista-patologias").html(listarPatologias(patologias, list_patologias));

            $("#accordion").html(listarEsquemas(esquemas, list_esquemas));

            $("#cant_patologias").val(patologias.length);
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
    });

    /** --Ver detalles de vacuna-- **/


    /** Ver-Editar nombre vacuna **/

    var vacuna_nombre;

    $('#edicion-nombre').validator();

    $("#editar-vacuna").on("click", function(e){

        vacuna_nombre = $("#vac_nombre").val();
        $("#vac_nombre").removeAttr("readonly");
        $("#fen-buttons").removeClass("hidden").children(".btn").removeAttr("disabled");
    });

    $("#form-editar-nombre").on("click", ".form-group #c_vac_nombre", function(e){

        //$("#vac_nombre").val(vacuna_nombre);
        $("#vac_nombre").val(vacuna_nombre).attr("readonly","readonly").trigger("focusout");
        $("#fen-buttons").addClass("hidden").children(".btn").attr("disabled");
    });


    $("#edicion-nombre").on("submit", function(e){

        e.preventDefault();

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Vacuna/ModificarNombreVacuna",
            type: "POST",
            dataType: "json",
            data: "id="+idvacuna+"&nuevo_nombre="+$("#vac_nombre").val()
        });

        request.done(function (response, textStatus, jqXHR){ 

            vacuna_nombre = $("#vac_nombre").val();

            if (response['status'] == true) {
                $("#edit-message").addClass("alert-success").show().children("span").html(response["message"]);

                setTimeout( function(){                  
                    $("#edit-message").hide('fast');  
                }, 10000);

            }else{
                $("#edit-message").addClass("alert-danger").show().children("span").html(response["message"]);
            }
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        $(this).attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });

    /** --Ver-Editar nombre vacuna-- **/


    /** Ver-Editar patologías **/

    $("#editar-vacuna-patologias").on("click", function(e){

        var str_options = "";

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Patologia/ExtraerPatologia",
            type: "POST",
            dataType: "json",
            data: "id_vacuna="+idvacuna
        });

        request.done(function (response, textStatus, jqXHR){ 

            str_options += "<option value=\"\">Seleccionar patología</option>";

            $.each(response, function(i, v){

                str_options += "<option value=\""+v["id"]+"\">"+v["nombre"]+"</option>";
            });

            $("#list-patologias").html(str_options);
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        $("#lista-patologias .list-group-item .eliminar-patologia").removeClass("hidden");
        $("#select-parologias").removeClass("hidden");
        $("#lista-buttons").removeClass("hidden").children("button").removeAttr("disabled");
        $("#a_lista").attr("disabled","disabled");
    });

    $("#list-patologias").on("change", function(e){

        if ($(this).val().trim() == "") {
            $("#a_lista").attr("disabled","disabled");
        }else{
            $("#a_lista").removeAttr("disabled","disabled");
        }        
    });

    $("#c_lista").on("click", function(e){
        
        if ($("#cant_patologias").val() > 0) {

            $("#lista-patologias .list-group-item .eliminar-patologia").addClass("hidden");
            $("#select-parologias").addClass("hidden");
            $("#lista-buttons").addClass("hidden").children("button").attr("disabled");
            $("#select-message").removeClass("alert-danger").hide().children("span").html("");
        }else{
            $("#select-message").addClass("alert-danger").show().children("span").html("Debe haber al menos una patología asociada a esta vacuna...");
        }
    });

    $("#a_lista").on("click", function(e){

        var id_patologia = $("#list-patologias").val();

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Vacuna/AgregarPatologiaVacuna",
            type: "POST",
            dataType: "json",
            data: "id_vacuna="+idvacuna+"&id_patologia="+id_patologia
        });

        request.done(function (response, textStatus, jqXHR){ 
            
            if (response['status'] == true) {                

                $("#cant_patologias").val(response['patologias'].length);

                $("#lista-patologias").html(listarPatologias(response['patologias'], ""));

                $("#editar-vacuna-patologias").trigger("click");

            }else{
                $("#edit-message").addClass("alert-danger").show().children("span").html(response["message"]);
            }
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });        

    });

    $("#lista-patologias").on("click", ".list-group-item .eliminar-patologia", function(e){

        $("#lista-patologias .list-group-item .eliminar-patologia").addClass("disabled");

        var id_patologia = $(this).data("idpatologia");

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Vacuna/EliminarPatologiaVacuna",
            type: "POST",
            dataType: "json",
            data: "id_vacuna="+idvacuna+"&id_patologia="+id_patologia
        });

        request.done(function (response, textStatus, jqXHR){ 
            

            if (response['status'] == true) {                

                $("#cant_patologias").val(response['patologias'].length);

                $("#lista-patologias").html(listarPatologias(response['patologias'], ""));

                $("#editar-vacuna-patologias").trigger("click");

            }else{
                $("#edit-message").addClass("alert-danger").show().children("span").html(response["message"]);
            }
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        }); 

        $("#lista-patologias .list-group-item .eliminar-patologia").removeClass("disabled");

    });

    /** --Ver-Editar patologías-- **/


    /** Ver-Editar esquemas **/

    $('#edicion-esquema').validator();

    $("#edicion-esquema").on("submit", function(e){

        e.preventDefault();

        $(this).attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });

    $("#accordion").on("click", ".panel .panel-heading .panel-title .btn-group .editar-esquema", function(e){

        var idesquema = $(this).data("idesquema");

        $("#accion").val("e");

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Vacuna/VerEsquema",
            type: "POST",
            dataType: "json",
            data: "id="+idesquema
        });

        request.done(function (response, textStatus, jqXHR){            
                        
            //console.log(response);
            
            /** Carga datos en el select de Esquema **/
            activarSelect($("#esquema option"),response["esquema"]);

            /** Carga datos en el campo Cantidad de dosis **/
            $("#cant_dosis").val(response["cant_dosis"]);

            /** Carga datos en el campo intervalo de la dosis **/
            $("#intervalo").val(response["intervalo"]);

            /** Carga datos en el campo período del intervalo de dosis **/
            activarSelect($("#interperiodo option"),response["intervalo_periodo"]);

            /** Carga datos en el campo vía de administración **/
            activarSelect($("#via_administracion option"),response["via_administracion"]);

            /** Carga datos en el campo Edad mínima **/
            $("#eminima").val(response["min_edad_aplicacion"]);

            /** Carga datos en el campo período de Edad mínima **/
            activarSelect($("#eminperiodo option"),response["min_edad_periodo"]);

            /** Carga datos en el campo Edad máxima **/
            $("#emaxima").val(response["max_edad_aplicacion"]);

            /** Carga datos en el campo período de Edad máxima **/
            activarSelect($("#emaxperiodo option"),response["max_edad_periodo"]);

            //$("#edicion-esquemas .chosen-select").chosen({width: "100%"});
            //$("#edicion-esquemas .chosen-select").trigger("chosen:updated");

        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();


        $("#accordion").hide();
        $("#lista-esquemas").removeClass("hidden");
    });

    $("#lista-esquemas").on("click", ".form-group .btn-default", function(e){

        e.preventDefault();

        $("#lista-esquemas input").each(function(i, v){            
            this.value = "";
        });

        $("#lista-esquemas select").each(function(i, v){
            this.value = "";
        });

        $("#lista-esquemas").addClass("hidden");
        $("#accordion").show();
    });

    $("#agregar-esquema").on("click", function(e){

        $("#lista-esquemas input").each(function(i, v){            
            this.value = "";
        });

        $("#lista-esquemas select").each(function(i, v){
            this.value = "";
        });

        $("#accion").val("a");
        $("#accordion").hide();
        $("#lista-esquemas").removeClass("hidden");
    });

    /** --Ver-Editar esquemas-- **/

    
    /** Eliminar vacunas **/
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

    /** --Eliminar vacunas-- **/


    /** Funciones **/

    function activarSelect(element, value) {

        element.each(function(index, val){                

            if (this.value === value) {
                this.selected = true;
                //this.defaultSelected = true;
                //this.setAttribute("selected", "selected");
                //dump(this);
                //element.val(value);
                //return false;
            }
        });
    }

    function listarEsquemas(elements, str) {

        $.each(elements, function(index, value){

                str += "<div class=\"panel panel-default\">";
                str += "<div class=\"panel-heading\" role=\"tab\" id=\"heading"+index+"\">";
                str += "<h4 class=\"panel-title\">";
                str += value["esquema"];
                str += "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";                
                str += "<a class=\"collapsed btn btn-xs btn-info\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse"+index+"\" aria-expanded=\"false\" aria-controls=\"collapse"+index+"\">";
                str += "<span class=\"glyphicon glyphicon-plus\"></span>";
                str += "</a>";
                str += "<a href=\"#\" id=\"editar-esquema"+index+"\" class=\"btn btn-xs btn-success editar-esquema\" data-idesquema=\""+value["id"]+"\" >";
                str += "<span class=\"glyphicon glyphicon-pencil\"></span>";
                str += "</a>";
                str += "<a href=\"#\" id=\"eliminar-esquema"+index+"\" class=\"btn btn-xs btn-danger eliminar-esquema\" data-idesquema=\""+value["id"]+"\" >";
                str += "<span class=\"glyphicon glyphicon-trash\"></span>";
                str += "</a>";
                str += "</div>";
                str += "</h4>";
                str += "</div>";
                str += "<div id=\"collapse"+index+"\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading"+index+"\">";
                str += "<div class=\"panel-body\">";
                str += "<ul id=\"esquema"+index+"\">";
                str += "<li><b>Esquema:</b> "+value["esquema"]+".</li>";
                str += "<li><b>Cantidad de dosis:</b> "+value["cant_dosis"]+".</b></li>";
                str += "<li><b>Vía de administración:</b> "+value["via_administracion"]+".</b></li>";
                str += "<li><b>Edad mínima:</b> "+value["min_edad_aplicacion"]+" "+value["min_edad_periodo"]+".</li>";
                str += "<li><b>Edad máxima:</b> "+value["max_edad_aplicacion"]+" "+value["max_edad_periodo"]+".</li>";
                str += "<li><b>Intervalo de aplicación:</b> "+value["intervalo"]+" "+value["intervalo_periodo"]+".</b></li>";
                str += "</ul>";
                str += "</div>";
                str += "</div>";
                str += "</div>";                
            });

        return str;
    }
    function listarPatologias(elements, str) {

        $.each(elements, function(index, value){

                str += "<li class=\"list-group-item\">";
                str += value["nombre"];
                str += "<button class=\"btn btn-xs btn-danger pull-right eliminar-patologia hidden\" data-idpatologia=\""+value["id_patologia"]+"\">";
                str += "<span class=\"glyphicon glyphicon-remove\"></span>";
                str += "</button>";
                str += "</li>";              
            });

        return str;
    }

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

    /** -Funciones- **/
});