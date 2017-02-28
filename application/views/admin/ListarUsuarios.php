<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Listado de usuarios</h1>
			</div>
			<div class="col-xs-12 col-sm-3 table-buttons">
				<a class="btn btn-success" href="<?php echo base_url(); ?>Usuario/AgregarUsuario"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
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
			<input type="hidden" name="base_url" id="base_url" value="<?= base_url(); ?>">
			<div class="col-sm-12 table-responsive">
				<table id="lista_usuarios" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Cédula</th>
						<th>Username</th>
						<th>Nombre completo</th>
						<th>Especialidad</th>
						<!--<th>Estatus</th>-->
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Cédula</th>
						<th>Username</th>
						<th>Nombre completo</th>
						<th>Especialidad</th>
						<!--<th>Estatus</th>-->
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;

							if ($usuarios->num_rows() > 0) {
								
								foreach ($usuarios->result_array() as $key => $usuario) {
									
									echo ($usuario["status"] == 't')? "<tr id=\"fila_".md5('sismed'.$usuario["id"])."\">" : "<tr id=\"fila_".md5('sismed'.$usuario["id"])."\" class=\"danger\">";
									echo "<td>".$cont++."</td>";
									echo "<td>".$usuario["cedula"]."</td>";
									echo "<td>".$usuario["username"]."</td>";
									echo "<td>".$usuario["nombre1"]." ".$usuario["nombre2"]." ".$usuario["apellido1"]." ".$usuario["apellido2"]."</td>";
									echo "<td>".$usuario["especialidad"]."</td>";
									/*echo "<td>";
									echo ($usuario["status"] == 't') ? "<span class=\"label label-success\">Activo</span>":"<span class=\"label label-danger\">Inactivo</span>";
									echo "</td>";*/
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
									//---Boton ver detalles---
									echo "<a class=\"btn btn-sm btn-info detalle-usuario\" href=\"".base_url("Usuario/PerfilUsuario/".md5('sismed'.$usuario["id"]))."\" data-toggle=\"modal\" title=\"Ver detalles\">";
									echo "<span class=\"glyphicon glyphicon-search\"></span>";
									echo "</a>";

									//---Boton editar---
									echo "<a class=\"btn btn-sm btn-success editar-usuario\" href=\"".base_url("Usuario/ModificarUsuario/".md5('sismed'.$usuario["id"]))."\" title=\"Editar usuario\">";
									echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
									echo "</a>";

									if ($usuario["status"] === "t") {
										
									//---Boton Inhabilitar---
									echo "<a class=\"btn btn-sm btn-danger in-hab-usuario\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarUsuario\" title=\"Inhabilitar usuario\" data-idusuario=\"".md5('sismed'.$usuario["id"])."\" data-username=\"".$usuario["username"]."\" data-action=\"inhabilitar\">";
									echo "<span class=\"glyphicon glyphicon-remove\"></span>";
									echo "</a>";

									}elseif ($usuario["status"] === "f"){

									//---Boton habilitar---
									echo "<a class=\"btn btn-sm btn-primary in-hab-usuario\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarUsuario\" title=\"Hanbilitar usuario\" data-idusuario=\"".md5('sismed'.$usuario["id"])."\" data-username=\"".$usuario["username"]."\" data-action=\"habilitar\">";
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
</div>

<!-- Eliminar Evento -->
<div class="modal fade" id="EliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<h3 id="delete-title">¿Está seguro que desea <span id="accion"></span> al usuario "<span id="el-usuario"></span>"?</h3>
        		<div id="delete-message" class="alert"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-usuario" class="btn btn-principal-2" data-idusuario="">Aceptar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-usuarios.js"></script>
<?php include('footer.php') ?>