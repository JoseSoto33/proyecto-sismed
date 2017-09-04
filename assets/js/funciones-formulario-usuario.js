$(document).ready(function(){

	var nav = navigator.userAgent.toLowerCase(); //La variable nav almacenará la información del navegador del usuario

    if(nav.indexOf("firefox") != -1){   //En caso de que el usuario este usando el navegador MozillaFirefox
        
        $("#fecha_nacimiento").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput
    }

    $("#telef_personal").mask("(9999) 999-99-99");
    $("#telef_emergencia").mask("(9999) 999-99-99");

    $("#accordion").on("show.bs.collapse", ".collapse", function(e){
        
        $(this).parent(".panel").find(".panel-heading .panel-title a span").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    });

    $("#accordion").on("hide.bs.collapse", ".collapse", function(e){
        
        $(this).parent(".panel").find(".panel-heading .panel-title a span").addClass("glyphicon-plus").removeClass("glyphicon-minus");
    });
    
    $("#especialidad").chosen({
    		no_results_text: "Sin resultados por:",
    		allow_single_deselect: true
    	});

    $("#tipo_usuario").chosen({
    		no_results_text: "Sin resultados por:",
    		allow_single_deselect: true
    	});


    $("#grado_instruccion").chosen({
    		no_results_text: "Sin resultados por:",
    		allow_single_deselect: true
    	});

	$('#registro-usuario').validator();

    $("#registro-usuario").on("submit", function(){

        $("#guardar").attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });

    $("#imagen").fileinput({
        language: "es",
        fileType: "image",
        showUpload: false,
        showRemove: false,
        browseLabel: 'Examinar &hellip;'
    });

    $("#img-change").on("click", function(){
        
        if ($("#img-change").is(":checked")) {

            $("#imagen-content figure").hide();
            $("#imagen-content h4").hide();
            $("#imagen-content #input-imagen").removeClass("hidden");
        }else{
            $("#imagen-content figure").show();
            $("#imagen-content h4").show();
            $("#imagen-content #input-imagen").addClass("hidden");
        }
    });

});