$(document).ready(function(){

	var url = $("#base_url").val();

	$(".table").DataTable( {
    "language": {
        	"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
    	}
    });

    $(".table-responsive").on("click", "#lista-eventos tbody tr td .detalle-evento", function(e){

        var idevento = $(this).data("idevento");        

        var request;
        if (request) {
            request.abort();
        }

        $("#portada-evento").attr('src','');
        $("#titulo-evento").html('');
    	$("#descripcion-evento").html('');
    	$("#fecha_inicio").html('');
    	$("#hora_inicio").html('');
    	$("#fecha_fin").html('');
    	$("#hora_fin").html('');

        request = $.ajax({
            url: url+"Evento/VerEvento",
            type: "POST",
            dataType: "json",
            data: "id="+idevento
        });

        request.done(function (response, textStatus, jqXHR){            
            
            if (response['result'] == true) {
            	
            	if (response['img'] != null) {

            		$("#portada-evento").attr('src',response['img']);
            	}else{
            		$("#portada-evento").attr('src',url+"assets/img/Eventos.jpg");
            	}

            	$("#titulo-evento").html(response['titulo']);
            	$("#descripcion-evento").html(response['descripcion']);
            	$("#fecha_inicio").html(response['fecha_inicio']);
            	$("#hora_inicio").html(response['hora_inicio']);
            	$("#fecha_fin").html(response['fecha_fin']);
            	$("#hora_fin").html(response['hora_fin']);
            };

            //dump(response);
            
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            alert(thrown);
        });

        e.preventDefault();
    });

    function dump(obj) {

        var out = "";
        for (var i in obj) {
            out += i + ": " + obj[i] + "\n";
        }

        alert(out);

        // or, if you wanted to avoid alerts...

        /*var pre = document.createElement("pre");
        pre.innerHTML = out;
        document.body.appendChild(pre)*/
    }
});