<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Agregar nuevo evento</h1>
			</div>
			<div class="col-xs-12">
				<?= validation_errors("<div class=\"alert alert-danger\" role=\"alert\">", "</div>"); ?>
				<?php if(isset($mensaje) && !empty($mensaje)) { ?>
					<div class="alert alert-danger" role="alert">
						<?= $mensaje; ?>
					</div>					
				<?php } ?>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<?= form_open(
	      				base_url()."Evento/AgregarEvento",
	      				'class="form-basic" id="registro-evento"'
	      				); ?>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="titulo" class="control-label">Títitulo</label>
						    <input type="text" class="form-control" id="titulo" name="titulo" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{3,}" value="<?php echo set_value('titulo'); ?>" required="required">
						    <div class="help-block with-errors">
							</div>							    
						</div>						
					</div>
					<div class="col-xs-12 col-sm-6 col-md-5">
						<div class="form-group">
							<label for="fecha_inicio" class="control-label">Fecha de inicio</label>
						    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" min="<?php echo date('Y-m-d');?>" value="<?php echo set_value('fecha_inicio'); ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required="required">
						    <div class="help-block with-errors">
							</div>
						</div>
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-7">
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12">
									<label for="hora_inicio" class="control-label">Hora de inicio</label>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
							    	<input type="text" class="form-control" id="hora_inicio" name="hora_inicio" required="required" placeholder="Hora (02:15)" value="<?php echo set_value('hora_inicio'); ?>" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}">
							    	<div class="help-block with-errors">
									</div>
							    </div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<select class="form-control" id="h_i_meridiano" name="h_i_meridiano" required="required">
										<option>Meridiano</option>
										<option value="am" <?= set_select('h_i_meridiano', 'am'); ?>>am</option>
										<option value="pm" <?= set_select('h_i_meridiano', 'pm'); ?>>pm</option>
									</select>
									<div class="help-block with-errors">
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-5">
						<div class="form-group">
							<label for="fecha_fin" class="control-label">Fecha de finalización</label>
						    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" min="<?php echo date('Y-m-d');?>" value="<?php echo set_value('fecha_fin'); ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required="required">
						    <div class="help-block with-errors">
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-7">
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12">
									<label for="hora_fin" class="control-label">Hora de finalización</label>
								</div>								
								<div class="col-xs-12 col-sm-6 col-md-6">
							    	<input type="text" class="form-control" id="hora_fin" name="hora_fin" required="required" placeholder="Hora (02:15)" value="<?php echo set_value('hora_fin'); ?>" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}">
							    	<div class="help-block with-errors">
									</div>
							    </div>
								<div class="col-xs-12 col-sm-4 col-md-6">
									<select class="form-control" id="h_f_meridiano" name="h_f_meridiano" required="required">
										<option>Meridiano</option>
										<option value="am" <?= set_select('h_f_meridiano', 'am'); ?>>am</option>
										<option value="pm" <?= set_select('h_f_meridiano', 'pm'); ?>>pm</option>
									</select>
									<div class="help-block with-errors">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">			
						<div class="form-group">
							<label for="descripcion" class="control-label">Descripción</label>
						    <textarea class="form-control" name="descripcion" id="descripcion" minlength="12" required="required" ></textarea>	
						    <div class="help-block with-errors">
							</div>					    
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		var nav = navigator.userAgent.toLowerCase(); //La variable nav almacenará la información del navegador del usuario

	    if(nav.indexOf("firefox") != -1){   //En caso de que el usuario este usando el navegador MozillaFirefox
	        
	        $("#fecha_inicio").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput

	        $("#fecha_fin").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput
	    }	

	    $("#hora_inicio").mask("99:99",{placeholder:"00:00"});
		$("#hora_fin").mask("99:99",{placeholder:"00:00"});    

		$('#registro-evento').validator();
	});
</script>
<?php include('footer.php') ?>