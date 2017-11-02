$(document).ready(function(){

	var nav = navigator.userAgent.toLowerCase(); //La variable nav almacenará la información del navegador del usuario

    if(nav.indexOf("firefox") != -1){   //En caso de que el usuario este usando el navegador MozillaFirefox
        
        $("#fecha_elaboracion").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput
    }
    $('#registro-insumo').validator();
    $("#fecha_vencimiento").mask("9999-99-99",{placeholder:"AAAA-MM-DD"});
    $(".form-part").slideUp();
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

    $("#tipo_insumo").on("change",function(){
        var valor = "#"+$(this).val();
        $(".form-part").find(".form-control").attr('disabled','disabled');
        $(".form-part").find(".form-control").attr("required",false);
        $(".form-part").slideUp();
        $(valor).find(".form-control").removeAttr("disabled");
        $(valor).find(".form-control").attr("required","required");
        console.log($(valor).find(".form-control"));
        $(valor).slideDown();
       
        
     });

});