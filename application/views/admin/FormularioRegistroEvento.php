<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Agregar nuevo evento</h1>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<?= form_open(
	      				base_url()."Evento/AgregarEvento",
	      				'class="form-basic" id="registro-evento"'
	      				); ?>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="titulo" class="control-label">Títitulo</label>
						    <input type="text" class="form-control" id="titulo" name="titulo" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{3,}" minlength="6" maxlength="30" placeholder="" required="required">
						    <div class="help-block with-errors">
							</div>						    
						</div>						
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="fecha_pautada" class="control-label">Fecha de inicio</label>
						    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" min="<?php echo date('Y-m-d');?>" placeholder="" required="required">
						    <div class="help-block with-errors">
							</div>
						</div>
					</div>	
					<div class="col-sm-12">
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12">
									<label for="hora_inicio" class="control-label">Hora de inicio</label>
								</div>							
								<div class="col-xs-12 col-sm-4 col-md-3">
							    	<input type="number" min="1" max="12" class="form-control" id="h_i_hora" name="h_i_hora" required="required" placeholder="Hora">
							    </div>
								<div class="col-xs-12 col-sm-4 col-md-3">
									<input type="number" min="1" max="59" class="form-control" id="h_i_minuto" name="h_i_minuto" required="required" placeholder="Minuto">
								</div>
								<div class="col-xs-12 col-sm-4 col-md-3">
									<select class="form-control" id="h_i_periodo" name="h_i_meridiano" required="required">
										<option>Meridiano</option>
										<option value="am">am</option>
										<option value="pm">pm</option>
									</select>
								</div>
							</div>
							<div class="help-block with-errors">
							</div>
						</div>	
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="fecha_pautada" class="control-label">Fecha de finalización</label>
						    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" min="<?php echo date('Y-m-d');?>" placeholder="" required="required">
						    <div class="help-block with-errors">
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12">
									<label for="hora_fin" class="control-label">Hora de finalización</label>
								</div>
							    <div class="col-xs-12 col-sm-4 col-md-3">
							    	<input type="number" min="1" max="12" class="form-control" id="h_f_hora" name="h_f_hora" required="required" placeholder="Hora">
							    </div>
								<div class="col-xs-12 col-sm-4 col-md-3">
									<input type="number" min="1" max="59" class="form-control" id="h_f_minuto" name="h_f_minuto" required="required" placeholder="Minuto">
								</div>
								<div class="col-xs-12 col-sm-4 col-md-3">
									<select class="form-control" id="h_f_periodo" name="h_f_meridiano" required="required">
										<option>Meridiano</option>
										<option value="am">am</option>
										<option value="pm">pm</option>
									</select>
								</div>
							</div>
							<div class="help-block with-errors">
							</div>
						</div>
					</div>
					<div class="col-sm-12">			
						<div class="form-group">
							<label for="descripcion" class="control-label">Descripción</label>
						    <textarea class="form-control" name="descripcion" id="descripcion" minlength="12" maxlength="" required="required"></textarea>	
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
		$('#registro-evento').validator();
	});
</script>
<?php include('footer.php') ?>