<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Agregar nueva noticia</h1>
			</div>
			<div class="col-xs-12">
				<?= validation_errors("<div class=\"alert alert-danger\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>", "</div>"); ?>
				<?php if(isset($mensaje) && !empty($mensaje)) { ?>
					<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?= $mensaje; ?>
					</div>					
				<?php } ?>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<?= form_open(
	      				base_url()."Noticia/".$this->uri->segment(2, 0),
	      				'class="form-basic" id="registro-noticia"'
	      				); ?>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="titulo" class="control-label"><span class="red">*</span> Títitulo</label>
						    <input type="text" class="form-control" id="titulo" name="titulo" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{5,}" placeholder="" value="<?php echo set_value('titulo'); ?>" required="required">
						    <div class="help-block with-errors">
							</div>
						</div>						
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="url" class="control-label">Enlace</label>
						    <input type="text" class="form-control" id="url" name="url" pattern="https?://.+" title="Introduzca una dirección válida" placeholder="http://www.paginaweb.com" value="<?php echo set_value('url'); ?>" data-pattern-error="Introduzca una dirección Válida">
						    <div class="help-block with-errors">
							</div>
						</div>
					</div>			
					<div class="col-sm-12">			
						<div class="form-group">
							<label for="descripcion" class="control-label"><span class="red">*</span> Descripción</label>
						    <textarea class="form-control" name="descripcion" id="descripcion" minlength="12" maxlength="" required="required" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{12,}"></textarea>
						    <div class="help-block with-errors">
							</div>
						</div>
					</div>
					<div class="col-sm-12">						
						<small> 
							<span class="red2">Los campos con (*) son obligatorios.</span>
						</small>
					</div>
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="submit" class="btn btn-form btn-lg btn-block">Guardar</button>
							<a href="javascript:history.back(1)" class="btn btn-second-2 btn-lg btn-block">Volver</a>
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