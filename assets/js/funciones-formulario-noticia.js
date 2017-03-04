$(document).ready(function(){

	$('#registro-noticia').validator();	

	 $("#registro-noticia").on("submit", function(){

        $("#guardar").attr("disabled","disabled");
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