$(document).ready(function(){

	var nav = navigator.userAgent.toLowerCase(); //La variable nav almacenará la información del navegador del usuario

    if(nav.indexOf("firefox") != -1){   //En caso de que el usuario este usando el navegador MozillaFirefox
        
        $("#fecha_inicio").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput

        $("#fecha_fin").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput
    }	

    $("#hora_inicio").mask("99:99",{placeholder:"00:00"});
	$("#hora_fin").mask("99:99",{placeholder:"00:00"});    

	$('#registro-evento').validator();

	$("#guardar").on("click", function(){

        $(this).attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });

    $("#imagen").fileinput({
        language: "es",
        fileType: "image",
        showUpload: false,
        browseLabel: 'Examinar &hellip;',
        removeLabel: 'Remover'
    });
});