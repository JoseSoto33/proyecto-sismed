<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Agregar nueva noticia</h1>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<?php echo (isset($mensaje)) ? $mensaje : "" ;?>
				<?= form_open(
	      				base_url()."Noticia/AgregarNoticia",
	      				'class="form-basic" id="registro-noticia"'
	      				); ?>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="titulo" class="control-label">Títitulo</label>
						    <input type="text" class="form-control" id="titulo" name="titulo" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{3,}" placeholder="" required="required">
						</div>						
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="url" class="control-label">Enlace</label>
						    <input type="text" class="form-control" id="url" name="url" pattern="https?://.+" title="Introduzca una dirección válida" placeholder="http://www.paginaweb.com" required="required">
						</div>
					</div>			
					<div class="col-sm-12">			
						<div class="form-group">
							<label for="descripcion" class="control-label">Descripción</label>
						    <textarea class="form-control" name="descripcion" id="descripcion" required="required"></textarea>
						</div>
					</div>
					
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="submit" class="btn btn-form btn-lg btn-block">Guardar</button>
							<button type="button" class="btn btn-second-2 btn-lg btn-block">Volver</button>
						</div>						
					</div>
				<?= form_close();?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$('#registro-noticia').validator();	
		});
</script>	

<?php include('footer.php') ?>