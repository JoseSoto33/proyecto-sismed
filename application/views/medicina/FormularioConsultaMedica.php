<?php
switch ($this->session->userdata('tipo_usuario')){
	
	case "Doctor":
		include('doctor/header.php');
		break;

	case "Enfermero":
		include ('enfermero/header.php');
		break;
}
?>
<!-- Sección 4 - General -->
<div id="seccion4">
	<div class="container">
		<div class="row">
			<!-- Título de sección -->
			<div class="col-sm-12">
				<h1><?php echo $titulo; ?></h1>
			</div><!--/ Título de sección -->

			<!-- Área de mensajes de validación -->
			<div class="col-xs-12">
				<?php echo validation_errors("<div class=\"alert alert-danger\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>", "</div>"); ?>
				<?php if(isset($mensaje) && !empty($mensaje)) { ?>
					<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $mensaje; ?>
					</div>					
				<?php } ?>
			</div><!--/ Área de mensajes de validación -->

			<!-- Contenedor del formulario -->
			<div class="col-sm-8 col-sm-offset-2">				
				<?php
					/**
					 * @var string $url Almacenará la dirección a la cual el formulario enviará los datos
					 */
					$url =  base_url()."Consulta/".$this->uri->segment(2, 0);
					if ($this->uri->segment(3, 0) != "0") {
						$url .= "/".$this->uri->segment(3, 0);
					}
					/** -- Formulario para agregar consultas -- */
					echo form_open(
	      				$url,
	      				'class="form-shadow" id="registro-consulta"'
	      				); ?>

	      			<!-- Cabecera del formulario -->
	      			<div class="col-sm-12">
		      			<div class="row">
							<div class="col-sm-9">
								<h2>Hist. Nº: <?php echo $paciente['cod_historia']; ?></h2>
							</div>
							<div class="col-sm-3">
								<img class="pull-right general-logo" src="<?php echo base_url(); ?>assets/img/iut-logo3.png">
							</div>
						</div>
					</div><!--/ Cabecera del formulario -->

					<?php 
						$nombre = $paciente["nombre1"];
						if (isset($paciente["nombre2"]) && !empty($paciente["nombre2"])) 
							{$nombre .= " ".$paciente["nombre2"];}
						$nombre .= " ".$paciente["apellido1"];
						if (isset($paciente["apellido2"]) && !empty($paciente["apellido2"])) 
							{$nombre .= " ".$paciente["apellido2"];}

						$hoy = date('Y-m-d');
						$diff = abs(strtotime($hoy) - strtotime($paciente["fecha_nacimiento"]));
						$edad = floor($diff / (365*60*60*24));
					?>

					<!-- Datos del paciente -->
					<div class="col-sm-12">
						<div class="row">
							<!-- Fecha del registro -->
							<div class="col-sm-5">
								<h4>Caracas <?php echo date("d - m - Y"); ?></h4>
							</div><!--/ Fecha del registro -->

							<!-- Datos personales -->
							<div class="col-sm-7">
								<div class="row">
									<div class="col-sm-12">
										<p><strong>Paciente: </strong><?php echo $nombre; ?></p>
									</div>
									<div class="col-sm-3">
										<p><strong>Edad: </strong><?php echo $edad; ?></p>
									</div>
									<div class="col-sm-5">
										<p><strong>Sexo: </strong><?php echo ($paciente["sexo"] === 'f')? "Femenino" : "Masculino"; ?></p>
									</div>
									<div class="col-sm-12">
										<p><strong>Fecha de Nacimiento: </strong><?php echo strftime('%d de %B de %Y', strtotime($paciente["fecha_nacimiento"])); ?></p>
									</div>
									<div class="col-sm-12">
										<p><strong>Lugar de Nacimiento: </strong><?php echo $paciente["lugar_nacimiento"]; ?></p>
									</div>
									<div class="col-sm-12">
										<p><strong>Telf. Personal: </strong><?php echo $paciente["telf_personal"]; ?></p>
									</div>
									<div class="col-sm-12">
										<p><strong>Telf. Emergencia: </strong><?php echo $paciente["telf_emergencia"]; ?></p>
									</div>
									<div class="col-sm-12">
										<p><strong>Dirección: </strong><?php echo $paciente["direccion"]; ?></p>
									</div>
								</div>								
							</div><!--/ Datos personales -->
						</div>
					</div><!--/ Datos del paciente -->

					<hr class="form-divisor-line">

					<!-- Campos del formulario -->
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="motivo" class="control-label"><span class="red">*</span> Motivo de consulta</label>
								    <textarea class="form-control" name="motivo" id="motivo" minlength="12" required="required"><?php echo (isset($consulta['motivo']))? trim($consulta['motivo']) : trim(set_value('motivo')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>	
								</div>						
							</div>
							
							<div class="col-sm-6">			
								<div class="form-group">
									<label for="enfermedad_actual" class="control-label"><span class="red">*</span> Enfermedad actual</label>
								    <textarea class="form-control" name="enfermedad_actual" id="enfermedad_actual" minlength="12" required="required"><?php echo (isset($consulta['enfermedad_actual']))? trim($consulta['enfermedad_actual']) : trim(set_value('enfermedad_actual')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>
								</div>
							</div>							
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="examen_medico_general" class="control-label"><span class="red">*</span> Examen Médico General</label>
								    <textarea class="form-control" name="examen_medico_general" id="examen_medico_general" minlength="12" required="required"><?php echo (isset($consulta['examen_medico_general']))? trim($consulta['examen_medico_general']) : trim(set_value('examen_medico_general')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>	
								</div>						
							</div>
							
							<div class="col-sm-6">			
								<div class="form-group">
									<label for="digestivo" class="control-label"><span class="red">*</span> Digestivo</label>
								    <textarea class="form-control" name="digestivo" id="digestivo" minlength="12" required="required"><?php echo (isset($consulta['digestivo']))? trim($consulta['digestivo']) : trim(set_value('digestivo')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>
								</div>
							</div>							
						</div>

						<?php 
						/** -- Si el tipo de formulario es 'Preventivo' -- */
							if ($tipo_consulta == 2) { 
						?>

						<hr />
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="urogenital" class="control-label"><span class="red">*</span> Urogenital</label>
								    <textarea class="form-control" name="urogenital" id="urogenital" minlength="12" required="required"><?php echo (isset($consulta['urogenital']))? trim($consulta['urogenital']) : trim(set_value('urogenital')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>	
								</div>						
							</div>
							
							<div class="col-sm-6">			
								<div class="form-group">
									<label for="cardiopulmonar" class="control-label"><span class="red">*</span> Cardiopulmonar</label>
								    <textarea class="form-control" name="cardiopulmonar" id="descripcion" minlength="12" required="required"><?php echo (isset($consulta['cardiopulmonar']))? trim($consulta['cardiopulmonar']) : trim(set_value('cardiopulmonar')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>
								</div>
							</div>							
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="locomotor" class="control-label"><span class="red">*</span> Locomotor</label>
								    <textarea class="form-control" name="locomotor" id="locomotor" minlength="12" required="required"><?php echo (isset($consulta['locomotor']))? trim($consulta['locomotor']) : trim(set_value('locomotor')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>	
								</div>						
							</div>
							
							<div class="col-sm-6">			
								<div class="form-group">
									<label for="neuropsiquicos" class="control-label"><span class="red">*</span> Neuropsíquicos</label>
								    <textarea class="form-control" name="neuropsiquicos" id="neuropsiquicos" minlength="12" required="required"><?php echo (isset($consulta['neuropsiquicos']))? trim($consulta['neuropsiquicos']) : trim(set_value('neuropsiquicos')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>
								</div>
							</div>							
						</div>
					
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="otros" class="control-label"><span class="red">*</span> Otros</label>
								    <textarea class="form-control" name="otros" id="otros" minlength="12" required="required"><?php echo (isset($consulta['otros']))? trim($consulta['otros']) : trim(set_value('otros')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>	
								</div>						
							</div>	
						</div>
						<hr />
						<div class="row">
							<div class="col-sm-12">
								<h4>Examen físico</h4>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label for="ef_talla" class="control-label"><span class="red">*</span>Talla:</label>
											<div class="input-group">
										    	<input type="number" class="form-control" id="ef_talla" name="ef_talla" title="Sólo se permiten números" min="1" value="<?php echo (isset($consulta['ef_talla']))? $consulta['ef_talla'] : set_value('ef_talla'); ?>" required="required" aria-describedby="talla-addon">
										    	<span class="input-group-addon" id="talla-addon">cm</span>
										    </div>
										</div>						
								      	<div class="help-block with-errors">
								      	</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label for="ef_peso" class="control-label"><span class="red">*</span>Peso:</label>
											<div class="input-group">
										    	<input type="text" class="form-control" id="ef_peso" name="ef_peso" pattern="[0-9]{1,3}\.[0-9]{1,2}" title="Debe llenar este campo" minlength="3" maxlength="6" value="<?php echo (isset($consulta['ef_peso']))? $consulta['ef_peso'] : set_value('ef_peso'); ?>" required="required" data-pattern-error="El campo debe tener el formato '70.5'" aria-describedby="peso-addon">
										    	<span class="input-group-addon" id="peso-addon">Kg</span>
										    </div>
									      	<div class="help-block with-errors">
									      	</div>
										</div>						
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label for="ef_ta" class="control-label"><span class="red">*</span>Tensión Arterial:</label>
											<div class="input-group">
									    		<input type="text" class="form-control" id="ef_ta" name="ef_ta" pattern="[0-9]{1,3}/[0-9]{1,3}" title="Debe llenar este campo" minlength="3" maxlength="7" value="<?php echo (isset($consulta['ef_ta']))? $consulta['ef_ta'] : set_value('ef_ta'); ?>" required="required" data-pattern-error="El campo debe tener el formato '100/70'" aria-describedby="ta-addon">
									    		<span class="input-group-addon" id="ta-addon">mm Hg</span>
									    	</div> 
									      	<div class="help-block with-errors">
									      	</div>
										</div>						
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label for="ef_pulso" class="control-label"><span class="red">*</span>Pulso:</label>
											<div class="input-group">
									    		<input type="number" class="form-control" id="ef_pulso" name="ef_pulso" title="Debe llenar este campo" min="1" value="<?php echo (isset($consulta['ef_pulso']))? $consulta['ef_pulso'] : set_value('ef_pulso'); ?>" required="required" aria-describedby="pulso-addon">
									    		<span class="input-group-addon" id="pulso-addon">lpm</span>
									    	</div>
									      	<div class="help-block with-errors">
									      	</div>
										</div>						
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label for="ef_resp" class="control-label"><span class="red">*</span>Respiración:</label>
											<div class="input-group">
									    		<input type="number" class="form-control" id="ef_resp" name="ef_resp" title="Debe llenar este campo" min="1" value="<?php echo (isset($consulta['ef_resp']))? $consulta['ef_resp'] : set_value('ef_resp'); ?>" required="required" aria-describedby="resp-addon">
									    		<span class="input-group-addon" id="resp-addon">lpm</span>
									    	</div>
									      	<div class="help-block with-errors">
									      	</div>
										</div>						
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label for="ef_temp" class="control-label"><span class="red">*</span>Temperatura:</label>
											<div class="input-group">
										    	<input type="number" class="form-control" id="ef_temp" name="ef_temp" title="Debe llenar este campo" min="1" value="<?php echo (isset($consulta['ef_temp']))? $consulta['ef_temp'] : set_value('ef_temp'); ?>" required="required" aria-describedby="temp-addon">
										    	<span class="input-group-addon" id="temp-addon">ºC</span> 
										    </div>
									      	<div class="help-block with-errors">
									      	</div>
										</div>						
									</div>
								</div>
							</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-sm-6">			
								<div class="form-group">
									<label for="impresion_diagnostica" class="control-label"><span class="red">*</span> Impresión Diagnóstica</label>
								    <textarea class="form-control" name="impresion_diagnostica" id="impresion_diagnostica" minlength="12" required="required"><?php echo (isset($consulta['impresion_diagnostica']))? trim($consulta['impresion_diagnostica']) : trim(set_value('impresion_diagnostica')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="tratamiento" class="control-label"><span class="red">*</span> Tratamiento</label>
								    <textarea class="form-control" name="tratamiento" id="tratamiento" minlength="12" required="required"><?php echo (isset($consulta['tratamiento']))? trim($consulta['tratamiento']) : trim(set_value('tratamiento')); ?></textarea>	
								    <div class="help-block with-errors">
									</div>	
								</div>						
							</div>							
						</div>

						<?php 
							}	
						/** --// Si el tipo de formulario es 'Preventivo' -- */
						?>
					</div><!--/ Campos del formulario -->
					<div class="col-sm-12">						
						<small> 
							<span class="red2">Los campos con (*) son obligatorios.</span>
						</small>
					</div>				
					<hr class="form-divisor-line">

					<!-- Botones -->
					<div class="col-sm-12">
						<div class="col-sm-6 col-sm-offset-3">
							<button id="guardar" type="submit" class="btn btn-form btn-lg btn-block">Guardar</button>
							<a href="<?php echo base_url(); ?>HistoriaClinica/ConsultarHistoriaClinica/<?php echo $cod_historia; ?>" class="btn btn-second-2 btn-lg btn-block">Cancelar</a>
						</div>						
					</div><!--/ Botones -->
				<?php 
					echo form_close();
				/** --// Formulario para agregar consultas -- */
				?>			
			</div><!--/ Contenedor del formulario -->
		</div>
	</div>
</div><!--/ Sección 4 - General -->


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-consulta.js"></script>

<?php
switch ($this->session->userdata('tipo_usuario')){
	
	case "Doctor":
		include('doctor/footer.php');
		break;

	case "Enfermero":
		include ('enfermero/footer.php');
		break;
}
?>