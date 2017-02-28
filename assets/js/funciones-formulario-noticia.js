$(document).ready(function(){

	$('#registro-noticia').validator();	

	 $("#guardar").on("click", function(){

        $(this).attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });
});