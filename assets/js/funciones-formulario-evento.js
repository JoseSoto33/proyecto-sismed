$(document).ready(function(){

	var nav = navigator.userAgent.toLowerCase(); //La variable nav almacenará la información del navegador del usuario

    if(nav.indexOf("firefox") != -1){   //En caso de que el usuario este usando el navegador MozillaFirefox
        
        $("#fecha_inicio").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput

        $("#fecha_fin").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput
    }	

    $("#hora_inicio").mask("99:99",{placeholder:"00:00"});
	$("#hora_fin").mask("99:99",{placeholder:"00:00"});    

	$('#registro-evento').validator();

	$("#registro-evento").on("submit", function(){

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

    $("#img-change").on("click", function(){
        
        if ($("#img-change").is(":checked")) {

            $("#imagen-content figure").hide();
            $("#imagen-content h4").hide();
            $("#imagen-content .form-group").removeClass("hidden");
        }else{
            $("#imagen-content figure").show();
            $("#imagen-content h4").show();
            $("#imagen-content .form-group").addClass("hidden");
        }
    });
});