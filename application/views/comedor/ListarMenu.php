<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de menú
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Menu Comedor</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<a class="btn btn-success" href="<?php echo base_url(); ?>MenuComedor/AgregarMenuComedor"><span class="glyphicon glyphicon-plus"></span>Nuevo menú</a>
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
						<th>Fecha inicio</th>
						<th>Fecha fin</th>
						<th>Status</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Fecha inicio</th>
						<th>Fecha fin</th>
						<th>Status</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;
							if (!empty($comedor)) {
								setlocale(LC_TIME,"esp"); 

								foreach ($comedor as $key => $semana) {
							
									
									echo "<tr id=\"fila_".md5('sismed'.$semana["id"])."\">";
									echo "<td>".$cont++."</td>";
									echo "<td class=\"listafecha\">".strftime('%d de %B de %Y', strtotime($semana["fecha_inicio"]))."</td>";
									echo "<td class=\"listafecha1\">".strftime('%d de %B de %Y', strtotime($semana["fecha_fin"]))."</td>";
									
									echo "<td>";
									switch ((int) $semana["estatus"]) {
										case 0:
											$str = "<span class=\"label label-warning\">En curso</span>";
											break;
										
										case 1:
											$str = "<span class=\"label label-primary\">Finalizado</span>";
											break;
									}
									echo $str;								
									echo "</td>";									
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
									//---Boton ver detalles---
									echo "<a href=\"".base_url("MenuComedor/ListarComedor/".md5('sismed'.$semana["id"]))."\" class=\"btn btn-xs btn-info detalle-menu\" title=\"Descripcion menu\">";
									echo "<span class=\"glyphicon glyphicon-eye-open\"></span>";
									echo "</a>";					

									//---Boton de Pdf---
									echo "<div class=\"btn-group\">";
									  echo "<button type=\"button\" class=\"btn btn-xs btn-default pdf-comedor dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">";
									echo "<span class=\"glyphicon glyphicon-print\"></span>";									  
									  echo "</button>";
									  echo "<ul class=\"dropdown-menu dropdown-menu-right\">";
									    echo "<li><a href=\"".base_url("Pdf/GenerarMenuComedorAlmuerzo/".$semana["id"])."\" target=\"_blank\">Almuerzo</a></li>";
									    echo "<li><a href=\"".base_url("Pdf/GenerarMenuComedorCena/".$semana["id"])."\" target=\"_blank\">Cena</a></li>";
									  echo "</ul>";
									echo "</div>";
									
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
        		<h3 id="delete-title">¿Está seguro que desea eliminar la cita de "<span id="nom_paciente"></span>" para la fecha <span id="fecha_cita" ></span>?</h3>
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
<script type="text/javascript">
	$(document).ready(function(){
		$(".table-responsive").on("click", "#lista-citas tbody tr td .detalle-cita",function(e){
	        e.preventDefault();
	    });
	});
</script>
