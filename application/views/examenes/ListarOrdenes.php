<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de órdenes
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Órdenes</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<a class="btn btn-success" href="<?php echo base_url(); ?>Examenes/AgregarOrdenExamen"><span class="glyphicon glyphicon-plus"></span>Nueva orden</a>
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
				<table id="lista-ordenes" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Cédula</th>
						<th>Paciente</th>
						<th>Fecha a entregar</th>
						<th>Estatus</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Cédula</th>
						<th>Paciente</th>
						<th>Fecha a entregar</th>
						<th>Estatus</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;
							if (count($ordenes) > 0) {
								
								setlocale(LC_TIME,"esp");

								foreach ($ordenes as $key => $orden) {
									//var_dump($orden);
									echo "<tr id=\"fila_".md5('sismed'.$orden["id"])."\">";
									echo "<td>".$cont++."</td>";
									echo "<td>".$orden["cedula"]."</td>";
									echo "<td>" . $orden["nombre1"] . " " . $orden["apellido1"] . "</td>";
									echo "<td>".strftime('%d de %B de %Y', strtotime($orden["fecha_entrega_pautada"]))."</td>";
									echo "<td>";
									echo ($orden["entregado"] === 't')? "<span class=\"label label-success\">Entregado</span>" : "<span class=\"label label-warning\">pendiente</span>";
									echo "</td>";
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
									//---Boton ver detalles---
									echo "<a class=\"btn btn-xs btn-info detalle-orden\" href=\"#\" data-toggle=\"modal\" data-target=\"#VerOrden\" title=\"Ver detalles\" data-idorden=\"".md5('sismed'.$orden["id"])."\">";
									echo "<span class=\"glyphicon glyphicon-search\"></span>";
									echo "</a>";

									//---Boton editar---
									echo "<a class=\"btn btn-xs btn-success editar-orden\" href=\"".base_url("Examenes/ModificarOrden/".md5('sismed'.$orden["id"]))."\" title=\"Editar orden\">";
									echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
									echo "</a>";

									//---Boton eliminar---
									echo "<a class=\"btn btn-xs btn-danger eliminar-orden\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarOrden\" title=\"Eliminar orden\" data-idorden=\"".md5('sismed'.$orden["id"])."\" data-paciente=\"".$orden["nombre1"] . " " . $orden["apellido1"]."\">";
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

<!-- Ver orden -->
<div class="modal fade" id="VerOrden" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles de la orden</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<div class="col-xs-12 col-sm-6">			    	
			    	<h5><strong>Datos del paciente:</strong></h5>
			    	<blockquote>
			    		<small>
			    			<span class="glyphicon glyphicon-credit-card"></span> 
			    			<span id="cedula"></span>
		    			</small>
		    			<small>
			    			<span class="glyphicon glyphicon-user"></span> 
			    			<span id="nombre"></span>
		    			</small>
			    		<small>
			    			<span class="glyphicon glyphicon-envelope"></span>
			    			<span id="email"></span>
			    		</small>
			    		<small>
			    			<span class="glyphicon glyphicon-adjust"></span>
			    			<span id="sexo"></span>
			    		</small>
			    	</blockquote>
			    </div>
			    <div class="col-xs-12 col-sm-6">			    	
			    	<h5><strong>Fecha de entrega pautada:</strong></h5>
			    	<blockquote>
			    		<small>
			    			<span class="glyphicon glyphicon-calendar"></span>
			    			<span id="fecha_entrega_pautada"></span>
			    		</small>
			    		<small>
			    			<span class="glyphicon glyphicon-info-sign"></span>
			    			<span id="status"></span>
			    		</small>
			    	</blockquote>
			    </div>
			    <div class="col-xs-12">			    	
			    	<h5><strong>Examenes solicitados:</strong></h5>
			    	<blockquote>
			    		<small>
			    			<span class="glyphicon glyphicon-calendar"></span>
			    			<span id="examenes"></span>
			    		</small>
			    	</blockquote>
			    </div>
			    
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Eliminar orden -->
<div class="modal fade" id="EliminarOrden" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar orden</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<h3 id="delete-title">¿Está seguro que desea eliminar la orden del paciente "<span id="el-paciente"></span>"?</h3>
        		<div id="delete-message" class="alert"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-orden" class="btn btn-primary" data-idorden="">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-ordenes.js"></script>