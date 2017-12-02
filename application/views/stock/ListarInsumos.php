<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de Insumos
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Insumos</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
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
				</div>				
			</div>
			<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
			<div class="box-body table-responsive">
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
									
									if($insumo["status"] === 'f')
									{
										echo "<tr class=\"danger\" id=\"fila_".md5('sismed'.$insumo["id"])."\">";

									}else{
										echo "<tr id=\"fila_".md5('sismed'.$insumo["id"])."\">";
									}
									echo "<td>".$cont++."</td>";
									echo "<td>".$insumo["insumo"]."</td>";
									echo "<td>".$insumo["tipo_insumo"]."</td>";	
									echo "<td>".str_replace("-", "", $insumo["contenido"])."</td>";	
									echo "<td>".$insumo["disponibilidad"]." ".$insumo["unidad_medida"]."</td>";				
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";

									if($insumo["status"] === 't')
									{

									//--Boton ver lote//
										echo "<a class=\"btn btn-xs btn-primary ver-lotes\" data-toggle=\"modal\" data-target=\"#VerLote\" title=\"Ver lotes\" data-idinsumo=\"".md5('sismed'.$insumo["id"])."\" data-nombre=\"".$insumo["insumo"]."\">";
										echo "<span class=\"glyphicon glyphicon-search\"></span>";
										echo "</a>";
									//---Boton editar---
										echo "<a class=\"btn btn-xs btn-success editar-insumo\" href=\"".base_url("Inventario/ModificarInsumo/".md5('sismed'.$insumo["id"]))."_stock\" title=\"Editar insumo\">";
										echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
										echo "</a>";

									//---Boton deshabilitar---
										echo "<a class=\"btn btn-xs btn-danger eliminar-insumo\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarInsumo\" title=\"Eliminar insumo\" data-idinsumo=\"".md5('sismed'.$insumo["id"])."\" data-nombre=\"".$insumo["insumo"]."\" data-action=\"deshabilitar\">";
										echo "<span class=\"glyphicon glyphicon-remove\"></span>";
										echo "</a>";

								    }else{

								    //---Boton habilitar---
								    	echo "<a class=\"btn btn-xs btn-success eliminar-insumo\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarInsumo\" title=\"Eliminar insumo\" data-idinsumo=\"".md5('sismed'.$insumo["id"])."\" data-nombre=\"".$insumo["insumo"]."\" data-action=\"habilitar\">";
										echo "<span class=\"glyphicon glyphicon-ok\"></span>";
										echo "</a>";
								    }

									//---Boton Añadir lote---
									/*echo "<a class=\"btn btn-sm btn-success añadir-lote\" href=\"".base_url("Inventario/ModificarInsumo/".md5('sismed'.$insumo["id"]))."\" title=\"Añadir lote\">";
									echo "<span class=\"glyphicon glyphicon-plus-sign\"></span>";
									echo "</a>";


									//---Boton Descontar lote---
									echo "<a class=\"btn btn-sm btn-danger descontar-lote\" href=\"".base_url("Inventario/ModificarInsumo/".md5('sismed'.$insumo["id"]))."\" title=\"Descontar lote\">";
									echo "<span class=\"glyphicon glyphicon-minus-sign\"></span>";
									echo "</a>";
									*/
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

<!-- Eliminar insumo -->
<div class="modal fade" id="VerLote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Listado de lotes</h4>
      </div>
      <div class="modal-body">
        <div class="row">        	
        	<div class="col-xs-12 table-responsive">
        		<h3 id="lote-title">Lotes de <span id="el-lote-insumo"></span></h3>
        		<table id="insumo-lotes" class="table table-bordered table-hover table-striped">
        			<thead>
        				<th>Cantidad</th>
        				<th>Fecha de elaboración</th>
        				<th>Fecha de vencimiento</th>
        				<th></th>
        			</thead>
        			<tbody>
        				
        			</tbody>
        			<tfoot>
        				<th>Cantidad</th>
        				<th>Fecha de elaboración</th>
        				<th>Fecha de vencimiento</th>
        				<th></th>
        			</tfoot>
        		</table>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
        		<h3 id="delete-title">¿Está seguro que desea <span id="action-title"></span> este insumo "<span id="el-insumo"></span>"?</h3>
        		<div id="delete-message" class="alert"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-insumo" class="btn btn-principal-2" data-idinsumo="" data-accion="">Aceptar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-insumos.js"></script>
