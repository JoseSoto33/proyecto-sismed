<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1><?php echo $titulo; ?></h1>
			</div>
			<div class="col-xs-12">
				<?php echo validation_errors("<div class=\"alert alert-danger\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>", "</div>"); ?>
				<?php if(isset($mensaje) && !empty($mensaje)) { ?>
					<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $mensaje; ?>
					</div>					
				<?php } ?>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<?php

					$url =  base_url()."Noticia/".$this->uri->segment(2, 0);
					if ($this->uri->segment(3, 0) != "0") {
						$url .= "/".$this->uri->segment(3, 0);
					}

					echo form_open_multipart(
	      				$url,
	      				'class="form-basic" id="registro-noticia"'
	      				); ?>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="titulo" class="control-label"><span class="red">*</span> Títitulo</label>
						    <input type="text" class="form-control" id="titulo" name="titulo" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{5,}" placeholder="" value="<?php echo (isset($noticia['titulo']))? $noticia['titulo'] : set_value('titulo'); ?>" required="required">
						    <div class="help-block with-errors">
							</div>
						</div>						
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="url" class="control-label">Enlace</label>
						    <input type="text" class="form-control" id="url" name="url" pattern="https?://.+" title="Introduzca una dirección válida" placeholder="http://www.paginaweb.com" value="<?php echo (isset($noticia['url']))? $noticia['url'] : set_value('url'); ?>" data-pattern-error="Introduzca una dirección Válida">
						    <div class="help-block with-errors">
							</div>
						</div>
					</div>			
					<div class="col-sm-12">			
						<div class="form-group">
							<label for="descripcion" class="control-label"><span class="red">*</span> Descripción</label>
						    <textarea class="form-control" name="descripcion" id="descripcion" minlength="12" maxlength="" required="required" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{12,}"><?php echo (isset($noticia['descripcion']))? trim($noticia['descripcion']) : trim(set_value('descripcion')); ?></textarea>
						    <div class="help-block with-errors">
							</div>
						</div>
					</div>
					<?php 
						if (isset($noticia)) {
					?>
					<div class="col-xs-12" id="imagen-content">
						<?php if (isset($noticia['img']) && ($noticia['img']) != null || $noticia['img'] != "") { ?>
						<figure>
							<img src="<?php echo base_url().'assets/img/noticias/'.$noticia['img']; ?>" alt="<?php echo $noticia['img']; ?>">
						</figure>
						<?php }else{ ?>
						<h4>No ha cargado una imagen para esta noticia...</h4>
						<?php } ?>
						<div class="checkbox">
						    <label>
						        <input type="checkbox" name="img-change" id="img-change" value="1"> Editar imagen
						    </label>
    					</div>
						<div class="form-group hidden">
							<label for="imagen" class="control-label">Imagen</label>
							<input name="imagen" id="imagen" class="form-control" type="file" accept="image/*" >
						</div>
					</div>
					<?php 
						}else{
					?>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="imagen" class="control-label">Imagen</label>
							<input name="imagen" id="imagen" class="form-control" type="file" accept="image/*">
						</div>
					</div>	
					<?php 
						}
					?>
					<div class="col-sm-12">						
						<small> 
							<span class="red2">Los campos con (*) son obligatorios.</span>
						</small>
					</div>
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<div class="col-sm-6 col-sm-offset-3">
							<button id="guardar" type="submit" class="btn btn-form btn-lg btn-block">Guardar</button>
							<a href="<?php echo base_url(); ?>Noticia/ListarNoticias" class="btn btn-second-2 btn-lg btn-block">Cancelar</a>
						</div>						
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-noticia.js"></script>

<?php include('footer.php') ?>