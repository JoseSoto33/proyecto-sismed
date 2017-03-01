$(document).ready(function(){

	$('#registro-noticia').validator();	

	 $("#registro-noticia").on("submit", function(){

        $(this).attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });
});