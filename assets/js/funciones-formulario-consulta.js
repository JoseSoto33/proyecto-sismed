$(document).ready(function(){

	$('#registro-consulta').validator();	

	 $("#registro-consulta").on("submit", function(){

        $("#guardar").attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });

});