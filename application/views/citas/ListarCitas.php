<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de eventos
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Eventos</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<a class="btn btn-success" href="<?php echo base_url(); ?>Citas/AgregarCitaNutricion"><span class="glyphicon glyphicon-plus"></span>Nueva cita</a>
					</div>
					<div class="col-xs-12 col-sm-9">
						<?php if(get_cookie("message") != null) { ?>
							<div id="alert-message" class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?php 
									echo $this->input->cookie('message'); 
									delete_cookie('message');
								?>
							</div>					
						<?php } ?>
					</div>	
				</div>				
			</div>
			<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
			<div class="box-body table-responsive">
				<table id="lista-citas" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Fecha pautada</th>
						<th>Cédula</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Fecha de creación</th>
						<th>Status</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Fecha pautada</th>
						<th>Cédula</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Fecha de creación</th>
						<th>Status</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;
							if ($citas->num_rows() > 0) {
								
								setlocale(LC_TIME,"esp"); 

								foreach ($citas->result_array() as $key => $cita) {
									
									echo "<tr id=\"fila_".md5('sismed'.$cita["id"])."\">";
									echo "<td>".$cont++."</td>";
									echo "<td>".strftime('%d de %B de %Y', strtotime($cita["fecha_cita"]))."</td>";
									echo "<td>".$cita["cedula"]."</td>";
									echo "<td>".$cita["nombre1"]."</td>";
									echo "<td>".$cita["apellido1"]."</td>";
									echo "<td>".strftime('%d de %B de %Y', strtotime($cita["fecha_creacion"]))."</td>";
									echo "<td>";
									switch ($cita["estatus"]) {
										case 0:
											echo "Pendiente";
											break;
										
										case 1:
											echo "Realizada";
											break;

										case 2:
											echo "Cancelada";
											break;
									}										
									echo "</td>";									
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
									//---Boton ver detalles---
									echo "<a class=\"btn btn-xs btn-info detalle-evento\" href=\"#\" data-toggle=\"modal\" data-target=\"#VerEvento\" title=\"Ver detalles\" data-idevento=\"".md5('sismed'.$cita["id"])."\">";
									echo "<span class=\"glyphicon glyphicon-search\"></span>";
									echo "</a>";

									//---Boton editar---
									echo "<a class=\"btn btn-xs btn-success editar-evento\" href=\"".base_url("Evento/ModificarEvento/".md5('sismed'.$cita["id"]))."\" title=\"Editar evento\">";
									echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
									echo "</a>";

									//---Boton eliminar---
									echo "<a class=\"btn btn-xs btn-danger eliminar-evento\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarEvento\" title=\"Eliminar evento\" data-idevento=\"".md5('sismed'.$cita["id"])."\" data-nombre1=\"".$cita["nombre1"]."\">";
									echo "<span class=\"glyphicon glyphicon-trash\"></span>";
									echo "</a>";

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
</section>



<!-- Eliminar Evento -->
<div class="modal fade" id="EliminarCita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar cita</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<h3 id="delete-title">¿Está seguro que desea eliminar la cita "<span id="la-cita"></span>"?</h3>
        		<div id="delete-message" class="alert"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-cita" class="btn btn-primary" data-idevento="">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-citas.js"></script>