$(document).ready(function(){

	$('#registro-patologia').validator();	

	$("#registro-patologia").on("submit", function(){

        $("#guardar").attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });

    $("#accordion").on("show.bs.collapse", ".collapse", function(e){
        
        $(this).parent(".panel").find(".panel-heading .panel-title a span").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    });

    $("#accordion").on("hide.bs.collapse", ".collapse", function(e){
        
        $(this).parent(".panel").find(".panel-heading .panel-title a span").addClass("glyphicon-plus").removeClass("glyphicon-minus");
    });
});