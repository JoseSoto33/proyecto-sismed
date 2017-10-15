<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cambio de contraseña
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Eventos</li>
    <li class="active">Agregar evento</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
		<?php if(!$this->session->has_userdata("login")) {?>
		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<div class="box box-primary">
		        <div class="box-body">					
					<blockquote>
						<p>Antes de continuar a la pantalla principal, debes cambiar la contraseña que posees por defecto...</p>
						<footer>Ingresa tu neva contraseña tomando en cuenta que debe contener al menos un caracter numérico, un caracter alfabético en mayúsculas, un caracter alfabético en minúsculas y tener una longitud de entre 8 a 16 caracteres...</footer>
					</blockquote>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<div class="box box-primary">
		        <div class="box-body">
		        	<div class="row">
		        		<!-- Mensajes de error -->
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
									<?php echo $_COOKIE["message"]; ?>
								</div>					
							<?php } ?>
						</div><!--/ Mensajes de error -->
						<div class="col-xs-12">
							<?php
							$url =  base_url()."Usuario/".$this->uri->segment(2, 0);
							if ($this->uri->segment(3, 0) != "0") {
								$url .= "/".$this->uri->segment(3, 0);
							}

							echo form_open(
			      				$url,
			      				'id="cambio-clave"'
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
						<?php echo form_close();?>	
						</div>
		        	</div>		        	
		        </div>
		        <div class="box-footer">
					<a href="<?php echo base_url(); ?>" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="bio-clave" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript">
	$(window).ready(function(){

		$("#cambio-clave").validator();
	});
</script>