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
            $("#alert-message").slideUp('fast');  
        }, 10000);
    }else{

        $(".alert").hide();
    }

    $("#lista-esquemas").hide();

    /** Cuando el modal de detalles de vacuna **/

    $('#DetallesVacuna').on('hide.bs.modal', function (e) {
      
      cerrarEdicion();
    });

    /** --Cuando el modal de detalles de vacuna-- **/


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
                $("#edit-message").addClass("alert-success").slideDown(250).children("span").html(response["message"]);

                setTimeout( function(){                  
                    $("#edit-message").slideUp('fast');  
                }, 10000);

            }else{
                $("#edit-message").addClass("alert-danger").slideDown(250).children("span").html(response["message"]);
            }
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });
    });

    /** --Ver-Editar nombre vacuna-- **/


    /** Ver-Editar patologías **/

    $("#list-patologias").chosen({width: "100%"});

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

            str_options += "<option></option>";

            $.each(response, function(i, v){

                str_options += "<option value=\""+v["id"]+"\">"+v["nombre"]+"</option>";
            });

            $("#list-patologias").html(str_options);
            $("#list-patologias").chosen({width: "100%"});
            $("#list-patologias").trigger("chosen:updated");
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
            $("#select-message").removeClass("alert-danger").slideUp(250).children("span").html("");
        }else{
            $("#select-message").addClass("alert-danger").slideDown(250).children("span").html("Debe haber al menos una patología asociada a esta vacuna...");
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

                $("#fila_"+idvacuna+" .cel-patologias").html(mostrarPatologias(response['patologias']));

                $("#editar-vacuna-patologias").trigger("click");

                $("#select-message").removeClass("alert-danger").slideUp(250).children("span").html("");

            }else{
                $("#edit-message").addClass("alert-danger").slideDown(250).children("span").html(response["message"]);
            }

            $("#list-patologias").chosen({width: "100%"});
            $("#list-patologias").trigger("chosen:updated");
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

                $("#fila_"+idvacuna+" .cel-patologias").html(mostrarPatologias(response['patologias']));

                $("#editar-vacuna-patologias").trigger("click");

            }else{
                $("#edit-message").addClass("alert-danger").slideDown(250).children("span").html(response["message"]);
            }

            $("#list-patologias").chosen({width: "100%"});
            $("#list-patologias").trigger("chosen:updated");
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

        //alert($("#s_esquema").hasClass("disabled"));

        if (!$("#s_esquema").hasClass("disabled")) {

            var sub_url;
            var data = "";

            var idesquema = $("#s_esquema").data("idesquema");

            var accion = $("#accion").val();

            if (accion == "e") {

                sub_url = "Esquema/EditarEsquema";

            }else if (accion == "a"){

                sub_url = "Esquema/AgregarEsquema";
            }        

            if (idesquema != "") {
                data += "id_esquema="+idesquema+"&";   
            }

            data += "id_vacuna="+idvacuna+"&"+$("#edicion-esquema").serialize();

            var request;
            if (request) {
                request.abort();
            }

            request = $.ajax({
                url: url+sub_url,
                type: "POST",
                dataType: "json",
                data: data
            });

            request.done(function (response, textStatus, jqXHR){            
                            
                if (response['status'] == true) { 

                    $("#accordion").html(listarEsquemas(response['esquemas'], ""));

                    //$("#esquema-message").addClass("alert-success").show(500).children("span").html(response["message"]);
                    $("#esquema-message").addClass("alert-success").slideDown(250).children("span").html(response["message"]);
                    $("#panel_"+idesquema).removeClass("panel-default").addClass("panel-success");

                    setTimeout( function(){
                        //$("#esquema-message").removeClass("alert-success").hide(500).children("span").html("");
                        $("#esquema-message").removeClass("alert-success").slideUp(250).children("span").html("");
                        $("#panel_"+idesquema).removeClass("panel-success").addClass("panel-default");
                    }, 6000);  


                    $("#c_esquema").trigger("click");

                }else{
                    $("#esquema-message").addClass("alert-danger").slideDown(250).children("span").html(response["message"]);
                }

            });

            request.fail(function (jqXHR, textStatus, thrown){
                alert('Error: '+textStatus);
                alert(thrown);
            });            

        }
    });

    $("#accordion").on("click", ".panel .panel-heading .panel-title .btn-group .collapsed", function(e){
        $(this).addClass("btn-warning").removeClass("btn-info").children("span").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    });

    $("#accordion").on("click", ".panel .panel-heading .panel-title .btn-group .btn-warning", function(e){
        $(this).removeClass("btn-warning").addClass("btn-info").children("span").addClass("glyphicon-plus").removeClass("glyphicon-minus");
    });

    $("#accordion").on("click", ".panel .panel-heading .panel-title .btn-group .editar-esquema", function(e){

        var idesquema = $(this).data("idesquema");
        $("#s_esquema").data("idesquema",idesquema);

        $("#accion").val("e");
        $("#e_title").html("Editar esquema");

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Esquema/VerEsquema",
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

            validarSelectEsquema();

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

        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();


        $("#accordion").slideUp(250);

        setTimeout( function(){
            $("#lista-esquemas").slideDown(350);
        }, 270);
    });

    $("#lista-esquemas").on("click", ".form-group .btn-default", function(e){

        e.preventDefault();

        $("#s_esquema").data("idesquema","");

        $("#lista-esquemas input").each(function(i, v){            
            this.value = "";
        });

        $("#lista-esquemas select").each(function(i, v){
            this.value = "";
        });

        validarSelectEsquema();

        $("#lista-esquemas").slideUp(500);

        setTimeout( function(){            
            $("#accordion").slideDown(250);
        }, 270);

    });

    $("#agregar-esquema").on("click", function(e){

        $("#lista-esquemas input").each(function(i, v){            
            this.value = "";
        });

        $("#lista-esquemas select").each(function(i, v){
            this.value = "";
        });

        validarSelectEsquema();

        $("#accion").val("a");        
        $("#e_title").html("Agregar nuevo esquema");
        $("#accordion").slideUp(250);

        setTimeout( function(){    
            $("#lista-esquemas").slideDown(350);
        }, 270);

    });

    $("#accordion").on("click", ".panel .panel-heading .panel-title .btn-group .eliminar-esquema", function(e){

        $("#accordion .panel .panel-heading .panel-title .btn-group .eliminar-esquema").addClass("disabled");

        var id_esquema = $(this).data("idesquema");

        var request;
        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: url+"Esquema/EliminarEsquema",
            type: "POST",
            dataType: "json",
            data: "id_vacuna="+idvacuna+"&id_esquema="+id_esquema
        });

        request.done(function (response, textStatus, jqXHR){ 
            

            if (response['status'] == true) { 

                    $("#esquema-message").addClass("alert-success").show(500).children("span").html(response["message"]);

                    setTimeout( function(){
                        $("#esquema-message").removeClass("alert-success").hide(500).children("span").html("");
                    }, 6000);  

                    $("#accordion").html(listarEsquemas(response['esquemas'], ""));

                }else{
                    $("#esquema-message").addClass("alert-danger").show(500).children("span").html(response["message"]);
                }
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        }); 

        $("#accordion .panel .panel-heading .panel-title .btn-group .eliminar-esquema").removeClass("disabled");

    });

    $("#esquema").on("change", function(){

        validarSelectEsquema();        
    });

    /** --Ver-Editar esquemas-- **/

    
    /** Eliminar vacunas **/
    $(".table-responsive").on("click", "#lista-vacunas tbody tr td .eliminar-vacuna", function(e){

    	var idvacuna = $(this).data("idvacuna"); 
    	var nombre = $(this).data("nombre"); 
        var action = $(this).data("action");

        $("#delete-message").slideUp(250);

        $("#action-title").html(action);
    	$("#la-vacuna").html(nombre);
    	$("#accion-eliminar-vacuna").data('idvacuna', idvacuna);
        $("#accion-eliminar-vacuna").data('action', action);
    });    

    $("#accion-eliminar-vacuna").on("click", function(e){

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
            	
            	$("#delete-title").slideUp(250);
            	$("#delete-message").removeClass('alert-danger').addClass('alert-success').removeClass('hidden').html(response['message']).slideDown(250);
            	$("#accion-eliminar-vacuna").attr('disabled','disabled');

                //tabla.row($("#fila_"+idpatologia)).remove().draw(); 
                setTimeout( function(){                  
                     window.location.href = url+"Vacuna/ListarVacunas";  
                }, 5000);          	

            }else{
            	//alert(response['message']);
            	$("#delete-message").removeClass('alert-success').addClass('alert-danger').removeClass('hidden').html(response['message']).slideDown(250);
            }
            
            setTimeout( function(){

                $('#EliminarVacuna').modal('hide');
            }, 5000);

            setTimeout( function(){
                $("#delete-message").slideUp(250);
                $("#delete-title").slideDown(250);
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

    function cerrarEdicion() {

        $("#c_vac_nombre").trigger("click");
        $("#c_lista").trigger("click");
        $("#c_esquema").trigger("click");
    }

    function validarSelectEsquema() {

        if ($("#esquema").val() == "Única") {
            $("#cant_dosis").val(1).attr("readonly","readonly");
            $("#intervalo").val(1).attr("readonly","readonly");
            $("#interperiodo").val("Día(s)").hide();
            $("#sub_interperiodo").removeClass("hidden").val($("#interperiodo").val());
        }else{
            $("#cant_dosis").removeAttr("readonly");
            $("#intervalo").removeAttr("readonly");
            $("#sub_interperiodo").addClass("hidden").val($("#interperiodo").val());
            $("#interperiodo").show();
        }
    }

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

                str += "<div id=\"panel_"+value["id"]+"\" class=\"panel panel-default\">";
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

    function mostrarPatologias(element) {

        var p = "";

        $.each(element, function(i, patologia){

            p += patologia["nombre"];

            if (i == (element.length - 1)) {
                p += ".";
            }else{
                p += ", ";
            }
        });

        return p;
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