

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="text-center"><?php echo $titulo; ?></h1>
			</div>
			<div class="col-xs-12">
				<?php echo validation_errors("<div class=\"alert alert-danger\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>", "</div>"); ?>
				<?php if(isset($mensaje) && !empty($mensaje)) { ?>
					<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $mensaje; ?>
					</div>					
				<?php } ?>

				<?php if(isset($_COOKIE["message"]) && !empty($_COOKIE["message"])) { ?>
					<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $_COOKIE("message"); ?>
					</div>					
				<?php } ?>
			</div>
			<?php if(!$this->session->has_userdata("login")) {?>
			<div class="col-sm-6 col-sm-offset-3">
				<blockquote>
    				<p>Antes de continuar a la pantalla principal, debes cambiar la contraseña que posees por defecto...</p>
  					<footer>Ingresa tu neva contraseña tomando en cuenta que debe contener al menos un caracter numérico, un caracter alfabético en mayúsculas, un caracter alfabético en minúsculas y tener una longitud de entre 8 a 16 caracteres...</footer>
				</blockquote>
			</div>
			<?php }?>
			<div class="col-sm-6 col-sm-offset-3">
				<?php
					$url =  base_url()."Usuario/".$this->uri->segment(2, 0);
					if ($this->uri->segment(3, 0) != "0") {
						$url .= "/".$this->uri->segment(3, 0);
					}

					echo form_open(
	      				$url,
	      				'class="form-basic" id="cambio-clave"'
	      				); ?>
					<?php if ($this->session->has_userdata("login")) { ?>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="password0" class="control-label"><span class="red">*</span>Contraseña anterior:</label>	
							<input type="password" name="password0" class="form-control" id="password0" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" value="<?php echo set_value('password0'); ?>" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres">
							<div class="help-block with-errors">
					      	</div> 
						</div>						
					</div>
					<?php } ?>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="password1" class="control-label"><span class="red">*</span>Nueva contraseña:</label>	
							<input type="password" name="password1" class="form-control" id="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" value="<?php echo set_value('password'); ?>" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres">
							<div class="help-block with-errors">
					      	</div> 
						</div>						
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="password2" class="control-label"><span class="red">*</span> Confirmar contraseña:</label>	
							<input type="password" class="form-control" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" data-match="#password1" data-match-error="Las contraseñas no coinciden" placeholder="Confirmar" value="<?php echo set_value('password2'); ?>" required="required">
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
							<button id="guardar" type="submit" class="btn btn-form btn-lg btn-block">Guardar</button>
							<a href="<?php echo base_url(); ?>" class="btn btn-second-2 btn-lg btn-block">Cancelar</a>
						</div>						
					</div>
				<?php echo form_close();?>			
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript">
	$(window).ready(function(){

		$("#cambio-clave").validator();
	});
</script>
