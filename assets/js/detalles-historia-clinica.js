$(document).ready(function(){

	/**
	 * @var json[] colums Las columnas que se mostrarán en la tabla
	 */
	var columns = [ //Columnas a mostrar
            { "data": "fecha_creacion" },//Promera columna: posición 'fecha_creación'
            {//Secunda columna: Botón para desplegar información
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": '<button class=\'btn btn-success btn-sm pull-right\'><span class=\'glyphicon glyphicon-plus\'></span></button>'
            }
        ];

    /**
     * @var json language Configuración del lenguaje que se muestra en las opciones de la tabla
     */
    var language = {//Configuración de idioma
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

	/**
	 * @var DataTable tablaConsultasCurativas Tabla de las consultas curativas
	 */
	var tablaConsultasCurativas = $('#lista-cons-cur').DataTable({
        "ajax": {//Extrae los tados a través de Ajax
        	"url": $("#base_url").val()+"Consulta/ListarConsultas",//Ruta del request
        	"type": "POST",//Tipo de reques (POST)
        	"dataType": "json",//Tipo de datos a obtener (objeto JSON)
        	"data": {//Datos que se envían por POST
        		"cod_historia": $("#cod_historia").val(),
        		"tipo_cons": $('#lista-cons-cur').data('tipo_cons')
        	},
        	"dataSrc": ""//Posición del arreglo de datos por defecto a procesar
        },
        "columns": columns,
        "language": language
    });

	/**
	 * @var DataTable tablaConsultasPreventivas Tabla de las consultas preventivas
	 */
    var tablaConsultasPreventivas = $('#lista-cons-prev').DataTable({
        "ajax": {//Extrae los tados a través de Ajax
        	"url": $("#base_url").val()+"Consulta/ListarConsultas",//Ruta del request
        	"type": "POST",//Tipo de reques (POST)
        	"dataType": "json",//Tipo de datos a obtener (objeto JSON)
        	"data": {//Datos que se envían por POST
        		"cod_historia": $("#cod_historia").val(),
        		"tipo_cons": $('#lista-cons-prev').data('tipo_cons')
        	},
        	"dataSrc": ""//Posición del arreglo de datos por defecto a procesar
        },
        "columns": columns,
        "language": language
    });

	/**
	 * Genera una sub tabla con los detalles de la consulta curativa
	 *
	 * @param json data Objeto con los datos originales de la fila
	 *
	 * @return string
	 */
	function detallesConsCur ( data ) {
	    return '<table cellpadding="5" class="table table-bordered table-condensed" cellspacing="0" border="0" style="padding-left:50px;">'+
	    	'<tr>'+
	    		'<th colspan="2" align="center" class="success">'+
                    'Detalles de la consulta'+
                    '<a class="btn btn-sm btn-info pull-right" href="'+$("#base_url").val()+'Consulta/ModificarConsulta/'+data.id+'_'+data.cod_historia+'_'+data.tipo+'">'+
                        '<span class="glyphicon glyphicon-pencil"></span>'+
                    '</a>'+
                '</th>'+
	    	'</tr>'+
	    	'<tr>'+
	            '<th width="30%">Motivo de la consulta:</td>'+
	            '<td width="70%">'+data.motivo+'</td>'+
	        '</tr>'+
	        '<tr>'+
	            '<th width="30%">Enfermedad actual:</td>'+
	            '<td width="70%">'+data.enfermedad_actual+'</td>'+
	        '</tr>'+
	        '<tr>'+
	            '<th width="30%">Digestivo:</td>'+
	            '<td width="70%">'+data.digestivo+'</td>'+
	        '</tr>'+
	        '<tr>'+
	            '<th width="30%">Examen médico general:</td>'+
	            '<td width="70%">'+data.examen_medico_general+'</td>'+
	        '</tr>'+
	    '</table>';
	}

    /**
     * Genera una sub tabla con los detalles de la consulta preventiva
     *
     * @param json data Objeto con los datos originales de la fila
     *
     * @return string
     */
    function detallesConsPrev ( data ) {
        return '<table cellpadding="5" class="table table-bordered table-condensed" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<th colspan="2" class="success">'+
                    'Detalles de la consulta'+
                    '<a class="btn btn-sm btn-info pull-right" href="'+$("#base_url").val()+'Consulta/ModificarConsulta/'+data.id+'_'+data.cod_historia+'_'+data.tipo+'">'+
                        '<span class="glyphicon glyphicon-pencil"></span>'+
                    '</a>'+
                '</th>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Motivo de la consulta:</th>'+
                '<td width="70%">'+data.motivo+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Enfermedad actual:</th>'+
                '<td width="70%">'+data.enfermedad_actual+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Digestivo:</th>'+
                '<td width="70%">'+data.digestivo+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Examen médico general:</th>'+
                '<td width="70%">'+data.examen_medico_general+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Urogenital:</th>'+
                '<td width="70%">'+data.urogenital+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Cardiopulmonar:</th>'+
                '<td width="70%">'+data.cardiopulmonar+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Locomotor:</th>'+
                '<td width="70%">'+data.locomotor+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Neuropsiquicos:</th>'+
                '<td width="70%">'+data.neuropsiquicos+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Otros:</th>'+
                '<td width="70%">'+data.otros+'</td>'+
            '</tr>'+            
            '<tr>'+
                '<td colspan="2">'+
                    '<table cellpadding="5" class="table table-bordered table-condensed" cellspacing="0" border="0" style="padding-left:50px;">'+
                        '<tr>'+
                            '<th colspan="6" class="active">Examen Físico:</th>'+
                        '</tr>'+
                        '<tr>'+
                            '<th>Talla:</th>'+
                            '<th>Peso:</th>'+
                            '<th>Tens. Arterial:</th>'+
                            '<th>Pulso:</th>'+
                            '<th>Resp.:</th>'+
                            '<th>Temperatura:</th>'+
                        '</tr>'+
                         '<tr>'+
                            '<td>'+data.ef_talla+' cm</td>'+
                            '<td>'+data.ef_peso+' Kg</td>'+
                            '<td>'+data.ef_ta+' mm Hg</td>'+
                            '<td>'+data.ef_pulso+' lpm</td>'+
                            '<td>'+data.ef_resp+' rpm</td>'+
                            '<td>'+data.ef_temp+' ºC</td>'+
                        '</tr>'+
                    '</table>'+
                '</td>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Impresion Diagnostica:</th>'+
                '<td width="70%">'+data.impresion_diagnostica+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th width="30%">Tratamiento:</th>'+
                '<td width="70%">'+data.tratamiento+'</td>'+
            '</tr>'+
        '</table>';
    }
	

    $('#lista-cons-cur tbody').on('click', 'td.details-control .btn', function () {
        var tr = $(this).parent('td.details-control').closest('tr');	        
        var row = tablaConsultasCurativas.row(tr);
 
        if (row.child.isShown()) {
            // Esta fila ya está abierta - cerrarla
            row.child.hide();
            tr.removeClass('shown');
            $(this).removeClass('btn-danger').addClass('btn-success').children('.glyphicon').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        }
        else {
            // Abrir esta fila
            row.child(detallesConsCur(row.data())).show();
            tr.addClass('shown');
            $(this).removeClass('btn-success').addClass('btn-danger').children('.glyphicon').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });

     $('#lista-cons-prev tbody').on('click', 'td.details-control .btn', function () {
        var tr = $(this).parent('td.details-control').closest('tr');
        var row = tablaConsultasPreventivas.row(tr);
 
        if (row.child.isShown()) {
            // Esta fila ya está abierta - cerrarla
            row.child.hide();
            tr.removeClass('shown');
            $(this).removeClass('btn-danger').addClass('btn-success').children('.glyphicon').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        }
        else {
            // Abrir esta fila
            row.child(detallesConsPrev(row.data())).show();
            tr.addClass('shown');
            $(this).removeClass('btn-success').addClass('btn-danger').children('.glyphicon').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    

});