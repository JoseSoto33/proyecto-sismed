<?php include('doctor/header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Listado de Insumo</h1>
			</div>
			<div class="col-xs-12 col-sm-3 table-buttons">
				<a class="btn btn-success" href="<?php echo base_url(); ?>Inventario/AgregarInsumo"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
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
			<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
			<div class="col-sm-12 table-responsive">
				<table id="listar-insumos" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Insumo</th>
						<th>Tipo de Insumo</th>
						<th>Contenido</th>
						<th>Disponibildad</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Insumo</th>
						<th>Tipo de Insumo</th>
						<th>Contenido</th>
						<th>Disponibilidad</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;

							if ($insumos->num_rows() > 0) {
								setlocale(LC_TIME,"esp"); 

								foreach ($insumos->result_array() as $key => $insumo) {
									
									echo "<tr id=\"fila_".md5('sismed'.$insumo["id"])."\">";
									echo "<td>".$cont++."</td>";
									echo "<td>".$insumo["insumo"]."</td>";
									echo "<td>".$insumo["tipo_insumo"]."</td>";	
									echo "<td>".$insumo["contenido"]."</td>";	
									echo "<td>".$insumo["disponibilidad"]."</td>";				
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";

									//---Boton editar---
									echo "<a class=\"btn btn-sm btn-success editar-insumo\" href=\"".base_url("Insumo/ModificarInsumo/".md5('sismed'.$insumo["id"]))."\" title=\"Editar insumo\">";
									echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
									echo "</a>";

									//---Boton eliminar---
									echo "<a class=\"btn btn-sm btn-danger eliminar-insumo\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarInsumo\" title=\"Eliminar insumo\" data-idinsumo=\"".md5('sismed'.$insumo["id"])."\" data-nombre=\"".$insumo["insumo"]."\">";
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
</div>



<!-- Eliminar insumo -->
<div class="modal fade" id="EliminarInsumo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar insumo</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<h3 id="delete-title">¿Está seguro que desea eliminar este insumo "<span id="el-insumo"></span>"?</h3>
        		<div id="delete-message" class="alert"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-insumo" class="btn btn-principal-2" data-idinsumo="">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-insumos.js"></script>

<?php include('doctor/footer.php') ?>
