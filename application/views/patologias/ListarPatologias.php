<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de Patologías
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Patologías</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<a class="btn btn-success" href="<?php echo base_url(); ?>patologia/Agregarpatologia"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
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
				<table id="lista-patologias" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;
							if ($patologias->num_rows() > 0) {
								
								setlocale(LC_TIME,"esp"); 

								foreach ($patologias->result_array() as $key => $patologia) {
									
									if($patologia["status"] === 'f')
									{
										echo "<tr class=\"danger\" id=\"fila_".md5('sismed'.$patologia["id"])."\">";

									}else{
										echo "<tr id=\"fila_".md5('sismed'.$patologia["id"])."\">";
									}
									echo "<td>".$cont++."</td>";
									echo "<td>".$patologia["nombre"]."</td>";
									echo "<td>";
									if (strlen($patologia["descripcion"]) > 75) {
										echo substr($patologia["descripcion"], 0, 75)."...";
									}else{
										echo $patologia["descripcion"];
									}											
									echo "</td>";

									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";

									if($patologia["status"] === 't')
									{

									//---Boton editar---
										echo "<a class=\"btn btn-xs btn-success editar-patologia\" href=\"".base_url("Patologia/ModificarPatologia/".md5('sismed'.$patologia["id"]))."\" title=\"Editar patologia\">";
										echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
										echo "</a>";

									//---Boton eliminar---
										echo "<a class=\"btn btn-xs btn-danger eliminar-patologia\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarPatologia\" title=\"Eliminar patologia\" data-idpatologia=\"".md5('sismed'.$patologia["id"])."\" data-nombre=\"".$patologia["nombre"]."\" data-action=\"deshabilitar\">";
										echo "<span class=\"glyphicon glyphicon-trash\"></span>";
										echo "</a>";

								    }else{

								    //---Boton habilitar---
								    	echo "<a class=\"btn btn-xs btn-success eliminar-patologia\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarPatologia\" title=\"Eliminar patologia\" data-idpatologia=\"".md5('sismed'.$patologia["id"])."\" data-nombre=\"".$patologia["nombre"]."\" data-action=\"habilitar\">";
										echo "<span class=\"glyphicon glyphicon-ok\"></span>";
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



<!-- Eliminar patologia -->
<div class="modal fade" id="EliminarPatologia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar patologia</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<h3 id="delete-title">¿Está seguro que desea <span id="action-title"></span> la patologia "<span id="la-patologia"></span>"?</h3>
        		<div id="delete-message" class="alert"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-patologia" class="btn btn-principal-2" data-idpatologia="" data-accion="">Aceptar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-patologias.js"></script>
