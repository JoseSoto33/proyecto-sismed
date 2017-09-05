<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Listado de evento</h1>
			</div>
			<div class="col-xs-12 col-sm-3 table-buttons">
				<a class="btn btn-success" href="<?php echo base_url(); ?>Evento/AgregarEvento"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
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
				<table id="lista-eventos" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>Fecha</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>Fecha</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;
							if ($eventos->num_rows() > 0) {
								
								setlocale(LC_TIME,"esp"); 

								foreach ($eventos->result_array() as $key => $evento) {
									
									echo "<tr id=\"fila_".md5('sismed'.$evento["id"])."\">";
									echo "<td>".$cont++."</td>";
									echo "<td>".$evento["titulo"]."</td>";
									echo "<td>";
									if (strlen($evento["descripcion"]) > 75) {
										echo substr($evento["descripcion"], 0, 75)."...";
									}else{
										echo $evento["descripcion"];
									}											
									echo "</td>";
									echo "<td>".strftime('%d de %B de %Y', strtotime($evento["fecha_hora_inicio"]))."</td>";
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
									//---Boton ver detalles---
									echo "<a class=\"btn btn-xs btn-info detalle-evento\" href=\"#\" data-toggle=\"modal\" data-target=\"#VerEvento\" title=\"Ver detalles\" data-idevento=\"".md5('sismed'.$evento["id"])."\">";
									echo "<span class=\"glyphicon glyphicon-search\"></span>";
									echo "</a>";

									//---Boton editar---
									echo "<a class=\"btn btn-xs btn-success editar-evento\" href=\"".base_url("Evento/ModificarEvento/".md5('sismed'.$evento["id"]))."\" title=\"Editar evento\">";
									echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
									echo "</a>";

									//---Boton eliminar---
									echo "<a class=\"btn btn-xs btn-danger eliminar-evento\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarEvento\" title=\"Eliminar evento\" data-idevento=\"".md5('sismed'.$evento["id"])."\" data-titulo=\"".$evento["titulo"]."\">";
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

<!-- Ver Evento -->
<div class="modal fade" id="VerEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles del evento</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<figure class="img-portada">
        			<img id="portada-evento" src="" class="img-responsive img-thumbnail">
        		</figure>
        		<div class="caption">
			        <h3 id="titulo-evento"></h3>
			        <p id="descripcion-evento"></p>				        
			    </div>
			    <div class="col-xs-12 col-sm-6">			    	
			    	<h5><strong>Comienza el:</strong></h5>
			    	<blockquote>
			    		<small>
			    			<span class="glyphicon glyphicon-calendar"></span>
			    			<span id="fecha_inicio"></span>
			    		</small>
			    		<small>
			    			<span class="glyphicon glyphicon-time"></span>
			    			<span id="hora_inicio"></span>
			    		</small>
			    	</blockquote>
			    </div>
			    <div class="col-xs-12 col-sm-6">			    	
			    	<h5><strong>Finaliza el:</strong></h5>
			    	<blockquote>
			    		<small>
			    			<span class="glyphicon glyphicon-calendar"></span> 
			    			<span id="fecha_fin"></span>
		    			</small>
			    		<small>
			    			<span class="glyphicon glyphicon-time"></span>
			    			<span id="hora_fin"></span>
			    		</small>
			    	</blockquote>
			    </div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-principal" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Eliminar Evento -->
<div class="modal fade" id="EliminarEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar evento</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<h3 id="delete-title">¿Está seguro que desea eliminar el evento "<span id="el-evento"></span>"?</h3>
        		<div id="delete-message" class="alert"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-evento" class="btn btn-principal-2" data-idevento="">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-eventos.js"></script>
<?php include('footer.php') ?>