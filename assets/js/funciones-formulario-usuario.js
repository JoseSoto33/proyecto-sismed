$(document).ready(function(){

	var nav = navigator.userAgent.toLowerCase(); //La variable nav almacenará la información del navegador del usuario

    if(nav.indexOf("firefox") != -1){   //En caso de que el usuario este usando el navegador MozillaFirefox
        
        $("#fecha_nacimiento").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput
    }

    $("#telef_personal").mask("(9999) 999-99-99");
    $("#telef_emergencia").mask("(9999) 999-99-99");

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
});