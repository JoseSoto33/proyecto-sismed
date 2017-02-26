<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Listado de usuarios</h1>
			</div>
			<div class="col-xs-12">
				<?php if(get_cookie("message") != null) { ?>
					<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php 
							echo $this->input->cookie('message'); 
							delete_cookie('message');
						?>
					</div>					
				<?php } ?>
			</div>	
			<div class="col-sm-12 table-buttons">
				<a class="btn btn-success" href="<?php echo base_url(); ?>Usuario/AgregarUsuario"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
			</div>
			<div class="col-sm-12 table-responsive">
				<table id="lista_usuarios" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Cédula</th>
						<th>Nombre</th>
						<th>Especialidad</th>
						<th>Estatus</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Cédula</th>
						<th>Nombre</th>
						<th>Especialidad</th>
						<th>Estatus</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;

							if ($usuarios->num_rows() > 0) {
								
								foreach ($usuarios->result_array() as $key => $usuario) {
									
									echo "<tr id=\"fila_".md5('sismed'.$usuario["id"])."\">";
									echo "<td>".$cont++."</td>";
									echo "<td>".$usuario["cedula"]."</td>";
									echo "<td>".$usuario["nombre1"]." ".$usuario["nombre2"]." ".$usuario["apellido1"]." ".$usuario["apellido2"]."</td>";
									echo "<td>".$usuario["especialidad"]."</td>";
									echo "<td>";
									echo ($usuario["status"] == 't') ? "<span class=\"label label-success\">Activo</span>":"<span class=\"label label-danger\">Inactivo</span>";
									echo "</td>";
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
									//---Boton ver detalles---
									echo "<a class=\"btn btn-sm btn-info detalle-usuario\" href=\"".base_url("Usuario/PerfilUsuario/".md5('sismed'.$usuario["id"]))."\" data-toggle=\"modal\" title=\"Ver detalles\">";
									echo "<span class=\"glyphicon glyphicon-search\"></span>";
									echo "</a>";

									//---Boton editar---
									echo "<a class=\"btn btn-sm btn-success editar-usuario\" href=\"".base_url("Usuario/ModificarUsuario/".md5('sismed'.$usuario["id"]))."\" title=\"Editar usuario\">";
									echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
									echo "</a>";

									if ($usuario["status"] == 't') {
										
									//---Boton Inhabilitar---
									echo "<a class=\"btn btn-sm btn-danger in-hab-usuario\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarUsuario\" title=\"Eliminar usuario\" data-idusuario=\"".md5('sismed'.$usuario["id"])."\" data-titulo=\"".$usuario["nombre1"]." ".$usuario["apellido1"]."\">";
									echo "<span class=\"glyphicon glyphicon-ban-circle\"></span>";
									echo "</a>";

									}else{

									//---Boton habilitar---
									echo "<a class=\"btn btn-sm btn-danger in-hab-usuario\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarUsuario\" title=\"Eliminar usuario\" data-idusuario=\"".md5('sismed'.$usuario["id"])."\" data-titulo=\"".$usuario["nombre1"]." ".$usuario["apellido1"]."\">";
									echo "<span class=\"glyphicon glyphicon-ban-circle\"></span>";
									echo "</a>";
									}
									echo "</div>";
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
		$("#lista_usuarios").DataTable( {
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

        if ($(".alert").length) {

        	setTimeout( function(){                  
                $(".alert").hide('fast');  //Recargar la página luego de 5 segundos
            }, 15000);
    }
	});
</script>
<?php include('footer.php') ?>