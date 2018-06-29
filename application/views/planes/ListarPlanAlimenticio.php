<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de plan alimenticio
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">plan alimenticio</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<a class="btn btn-success" href="<?php echo base_url(); ?>PlanesAlimenticios/AgregarPlanAlimenticio"><span class="glyphicon glyphicon-plus"></span>Nuevo Plan</a>
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
				<table id="lista-planes" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Fecha de creación</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Fecha de creación</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;
							if ($plan_alimenticio->num_rows() > 0) {
								setlocale(LC_TIME,"esp"); 

								foreach ($plan_alimenticio->result_array() as $key => $plan) {
									
									echo "<tr id=\"fila_".md5('sismed'.$plan["id"])."\">";
									echo "<td>".$cont++."</td>";
									echo "<td>".strftime('%d de %B de %Y', strtotime($plan["fecha_creacion"]))."</td>";
								
									echo  " <td> <div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
									//---Boton ver detalles---
									echo "<a href=\"#\" class=\"btn btn-xs btn-info prescripcion-plan\" role=\"button\"data-toggle=\"popover\" data-trigger=\"hover\" data-container=\"body\" data-placement=\"left\" title=\"Prescripcion plan\" data-content=\"".$plan["prescripcion_dietetica"]."\" >";
									echo "<span class=\"glyphicon glyphicon-eye-open\"></span>";
									echo "</a>";

									//---Boton editar---
									echo "<a class=\"btn btn-xs btn-success editar-planes\" href=\"".base_url("PlanesAlimenticios/ModificarPlanAlimenticio/".md5('sismed'.$plan["id"]))."\" title=\"Editar planes\">";
									echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
									echo "</a>";

									//---Boton eliminar---
									echo "<a class=\"btn btn-xs btn-danger eliminar-plan\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarPlan\" title=\"Eliminar plan\" data-idcita=\"".md5('sismed'.$plan["id"])."\" data-nombre1=\"".$plan["id"]."\">";
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
<div class="modal fade" id="EliminarPlan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar plan</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<h3 id="delete-title">¿Está seguro que desea eliminar el plan?</h3>
        		<div id="delete-message" class="alert"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-plan" class="btn btn-primary" data-idevento="">Eliminar</button>
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
		$(".table-responsive").on("click", "#lista-planes tbody tr td .prescripcion-plan",function(e){
	        e.preventDefault();
	    });
	    
	    $("#lista-planes tbody tr td .prescripcion-plan").each(function(i,v){
	    	var titulo=$(this).attr("title"),
	            contenido=$(this).data("content"),
	            popover= {
	                title: titulo,
	                content: contenido,
	                trigger: "hover",
	                plasement: "left",
	            }
	        $(this).popover(popover);
	    })
	});
</script>