<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Listado de noticias</h1>
			</div>
			<div class="col-sm-12 table-buttons">
				<a class="btn btn-success" href="<?php echo base_url(); ?>Noticia/AgregarNoticia"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
			</div>
			<input type="hidden" name="base_url" id="base_url" value="<?= base_url(); ?>">
			<div class="col-sm-12 table-responsive">
				<table id="lista_noticias" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>URL</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>URL</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;

							if ($noticias->num_rows() > 0) {
								
								foreach ($noticias->result_array() as $key => $noticia) {
									
									echo "<tr>";
									echo "<td>".$cont++."</td>";
									echo "<td>".$noticia["titulo"]."</td>";
									echo "<td>".$noticia["descripcion"]."</td>";
									echo "<td><a href=\"".$noticia["url"]."\" target=\"_blank\">".$noticia["url"]."</a></td>";
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
									
									//---Boton editar---
									echo "<a class=\"btn btn-sm btn-success editar-noticia\" href=\"".base_url("Noticia/ModificarNoticia/".md5('sismed'.$noticia["id"]))."\" title=\"Editar noticia\">";
									echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
									echo "</a>";

									//---Boton eliminar---
									echo "<a class=\"btn btn-sm btn-danger eliminar-noticia\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarNoticia\" title=\"Eliminar noticia\" data-idnoticia=\"".md5('sismed'.$noticia["id"])."\" data-titulo=\"".$noticia["titulo"]."\">";
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

<!-- Eliminar Evento -->
<div class="modal fade" id="EliminarNoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar noticia</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<h3 id="delete-title">¿Está seguro que desea eliminar la noticia "<span id="la-noticia"></span>"?</h3>
        		<div id="delete-message" class="alert hidden"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-noticia" class="btn btn-principal-2" data-idnoticia="">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-noticias.js"></script>
<?php include('footer.php') ?>