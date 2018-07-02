<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de Citas
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Citas</li>
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
					<div class="col-xs-12 col-sm-6">
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
									echo "<td class=\"listafecha\">".strftime('%d de %B de %Y', strtotime($cita["fecha_cita"]))."</td>";
									echo "<td>".$cita["cedula"]."</td>";
									echo "<td class=\"listanombre\">".$cita["nombre1"]."</td>";
									echo "<td class=\"listaapellido\">".$cita["apellido1"]."</td>";
									echo "<td>".strftime('%d de %B de %Y', strtotime($cita["fecha_creacion"]))."</td>";
									echo "<td>";
									switch ((int) $cita["estatus"]) {
										case 0:
											$str = "<span class=\"label label-warning\">Pendiente</span>";
											break;
										
										case 1:
											$str = "<span class=\"label label-info\">Agendada-Hoy</span>";
											break;

										case 2:
											$str = "<span class=\"label label-success\">Atendida</span>";
											break;

										case 3:
											$str = "<span class=\"label label-danger\">Cancelado</span>";
											break;

										case 4:
											$str = "<span class=\"label label-danger\">Anulado</span>";
											break;
									}
									echo $str;								
									echo "</td>";									
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
									//---Boton ver detalles---
									echo "<a href=\"#\" class=\"btn btn-xs btn-info detalle-cita\" role=\"button\"data-toggle=\"popover\" data-trigger=\"hover\" data-container=\"body\" data-placement=\"left\" title=\"Motivo cita\" data-content=\"".$cita["motivo"]."\" >";
									echo "<span class=\"glyphicon glyphicon-eye-open\"></span>";
									echo "</a>";

									//---Boton editar---
									if ((int) $cita["estatus"]!=2 ){
										echo "<a class=\"btn btn-xs btn-success editar-cita\" href=\"".base_url("Citas/ModificarCitaNutricion/".md5('sismed'.$cita["id"]))."\" title=\"Editar cita\">";
										echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
										echo "</a>";
									}
									//---Boton PDF-----
									if ((bool) $cita["examen_lb"] ){
										echo "<a class=\"btn btn-xs btn-default pdf-cita\" href=\"".base_url("Pdf/GenerarOrdenExamen/".$cita["id"])."\" target=\"_blank\" title=\"Ver pdf cita\">";
										echo "<span class=\"glyphicon glyphicon-print\"></span>";
										echo "</a>";
									}

									//---Boton eliminar---
									if ((int) $cita["estatus"]!=3 && (int) $cita["estatus"]!=4 && (int) $cita["estatus"]!=2){
										echo "<a class=\"btn btn-xs btn-danger eliminar-cita\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarCita\" title=\"Eliminar cita\" data-idcita=\"".md5('sismed'.$cita["id"])."\" data-nombre1=\"".$cita["nombre1"]."\">";
										echo "<span class=\"glyphicon glyphicon-trash\"></span>";
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
</section>


<!-- Modal PDF-->
<?php if(get_cookie("message") != null){ ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">PDF: Orden de exámen</h4>
      </div>
      <div class="modal-body">
      	<iframe class="vistaPdf" src="<?php echo base_url("Pdf/GenerarOrdenExamen/".$this->input->cookie('id_cita')); ?>">
      		
      	</iframe>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
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
        		<h3 id="delete-title">¿Está seguro que desea Cancelar la cita de "<span id="nom_paciente"></span>" para la fecha <span id="fecha_cita" ></span>?</h3>
        		<div id="delete-message" class="alert"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-cita" class="btn btn-primary" data-idevento="">Cancelar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-citas.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		if ($("#myModal").length >0) {
			$("#myModal").modal("show");
		}
	});
</script>