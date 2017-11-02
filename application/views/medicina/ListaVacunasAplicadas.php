<table id="lista-vacunas-aplicadas" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
	<thead>
		<th>Nº</th>
		<th>Vacuna</th>
		<th>Esquema</th>
		<th>Fecha de aplicación</th>
		<th>Fecha de próxima aplicación</th>
	</thead>
	<tbody>
		<?php if(count($vacunas_aplicadas) > 0) {
			$cont = 1;
			foreach ($vacunas_aplicadas as $key => $v_aplic) {?>
			<tr>
				<td><?php echo $cont++; ?></td>
				<td><?php echo $v_aplic['nombre_vacuna']; ?></td>
				<td><?php echo ($v_aplic['esquema'] == "Única")? $v_aplic['esquema'] : $v_aplic['esquema']." #".$v_aplic['nro_dosis']; ?></td>
				<td><?php echo strftime('%d de %B de %Y', strtotime($v_aplic['fecha_vacunacion'])); ?></td>
				<td><?php echo (!empty($v_aplic['prox_fecha_vacunacion']))? strftime('%d de %B de %Y', strtotime($v_aplic['prox_fecha_vacunacion'])) : "No aplica"; ?></td>
			</tr>
			<?php } ?>

		<?php }?>
	</tbody>	      				
	<tfoot>
		<th>Nº</th>
		<th>Vacuna</th>
		<th>Esquema</th>
		<th>Fecha de aplicación</th>
		<th>Fecha de próxima aplicación</th>
	</tfoot>
</table>
<script type="text/javascript">
$(document).ready(function(){

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
     * @var DataTable tablaVacunasAplicadas Tabla de las vacuans aplicadas al paciente
     */
    var tablaVacunasAplicadas = $('#lista-vacunas-aplicadas').DataTable({        
        "language": language
    });
});
</script>