<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Listado de sesiones</h1>
			</div>
			<div class="col-sm-12 table-buttons">				
			</div>
			<div class="col-sm-12 table-responsive">
				<table class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Usuario</th>
						<th>Fecha de inicio</th>
						<th>Fecha de cierre</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Usuario</th>
						<th>Fecha de inicio</th>
						<th>Fecha de cierre</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;

							if ($sesiones->num_rows() > 0) {

								setlocale(LC_TIME,"esp");
								
								foreach ($sesiones->result_array() as $key => $sesion) {
									
									echo "<tr>";
									echo "<td>".$cont++."</td>";
									echo "<td>".$sesion["nombre1"]." ".$sesion["nombre2"]." ".$sesion["apellido1"]." ".$sesion["apellido2"]."</td>";
									echo "<td>".strftime('%d de %B de %Y', strtotime($sesion["inicio"]))." a las ".date('h:i:s a', strtotime($sesion["inicio"]))."</td>";
									echo "<td>".strftime('%d de %B de %Y', strtotime($sesion["fin"]))." a las ".date('h:i:s a', strtotime($sesion["fin"]))."</td>";
									echo "<td>";
									
									echo "<a class=\"btn btn-xs btn-info detalle-sesion\" href=\"#\" data-toggle=\"modal\" data-target=\"#DetalleSesion\" title=\"Ver detalles\" data-idsesion=\"".md5('sismed'.$sesion["id"])."\">";
									echo "<span class=\"glyphicon glyphicon-search\"></span>";
									echo "</a>";

									echo "</td>";
									echo "</tr>";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
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
	});
</script>
<?php include('footer.php') ?>