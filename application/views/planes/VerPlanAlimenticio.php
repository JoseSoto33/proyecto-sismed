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
	<div class="col-xs-12 col-sm-6">
		<div class="box box-primary">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<a class="btn btn-success" href="<?php echo base_url(); ?>PlanesAlimenticios/AgregarPlanAlimenticio"><span class="glyphicon glyphicon-plus"></span>Nuevo Plan</a>
					</div>	
				</div>				
			</div>
			<div class="box-body ">
				<?php var_dump($recomendaciones);
			  	foreach ($recomendaciones as $key => $recomendacion) {  ?>
			 	<div role="tabpanel" class="tab-pane" id="<?php echo strtolower(str_replace(" ", "_",$recomendacion['descripcion']))?>">
			 		<ol>
					<?php foreach ($detalles_recomendacion[$recomendacion['id']] as $key => $lista) { ?> 
						<li>
							<?php echo $lista['descripcion']; ?>
						</li>	
					<?php } ?>
				 	</ol>
				 	<div class="table-responsive">
					 	<table class="table table-hover table-bordered">
		  					<thead>
		  						<tr class="active">
		  							<th class="text-center">Alimentos</th>
		  							<th class="text-center">Permitidos</th>
		  							<th class="text-center">Evitar</th>
		  						</tr>
		  					</thead>
		  					<tbody>
		  						<?php foreach ($cuadro_recomendaciones[$recomendacion['id']] as $key => $cuadro) {?>
			  					<tr>
			  						<td class="active"><?php echo $cuadro['alimento']; ?></td>
			  						<td><?php echo $cuadro['permitidos']; ?></td>
			  						<td><?php echo $cuadro['evitar']; ?></td>
			  					</tr>
			  					<?php }?>
		  					</tbody>
						</table>
					</div>
			 	</div>
				<?php } ?>
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
      	<button type="button" id="accion-eliminar-plan" class="btn btn-primary" data-idplan="">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-plan.js"></script>
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