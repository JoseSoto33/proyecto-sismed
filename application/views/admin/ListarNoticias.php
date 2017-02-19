<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Listado de noticias</h1>
			</div>
			<div class="col-sm-12 table-buttons">
				<a class="btn btn-success" href="<?php echo base_url(); ?>Noticia/AgregarNoticia"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
			</div>
			<div class="col-sm-12 table-responsive">
				<table id="lista_noticias" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>URL</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>URL</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;

							foreach ($noticias->result_array() as $key => $noticia) {
								
								echo "<tr>";
								echo "<td>".$cont++."</td>";
								echo "<td>".$noticia["titulo"]."</td>";
								echo "<td>".$noticia["descripcion"]."</td>";
								echo "<td><a href=\"".$noticia["url"]."\" target=\"_blank\">".$noticia["url"]."</a></td>";
								echo "<td> </td>";
								echo "</tr>";
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
		$("#lista_noticias").DataTable( {
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