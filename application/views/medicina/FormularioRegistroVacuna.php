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
<div id="seccion2">
	<div class="container">
		<div class="row">
			<!-- Título del formulario -->
			<div class="col-sm-12">
				<h1><?php echo $titulo; ?></h1>
			</div><!--/ Título del formulario -->

			<!-- Mensajes de error -->
			<div class="col-xs-12">
				<?php echo validation_errors("<div class=\"alert alert-danger\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>", "</div>"); ?>
				<?php if(isset($mensaje) && !empty($mensaje)) { ?>
					<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $mensaje; ?>
					</div>					
				<?php } ?>
			</div><!--/ Mensajes de error -->

			<!-- Instrucciones para el usuario -->
			<div id="form-noticia-instruction" class="col-sm-3 form-instructions">
				<div class="col-sm-12 istruction-content">					
					<!-- Título -->
					<div class="title">
						<h3>Instrucciones</h3>
					</div><!--/ Título -->

					<!-- Descripción -->
					<div class="descripcion">
						<p>
							Para registrar un nuevo evento deberá llenar los campos de acuerdo a las siguientes indicaciones:
						</p>
						<!-- Panel de descripción de campos -->
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			    			<!-- Descripción campo Nombre de la vacuna -->
						  	<div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="heading1">
							      	<h4 class="panel-title">
							      		Nombre de la vacuna
							        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
							          		<span class="glyphicon glyphicon-plus"></span>
							        	</a>
							      	</h4>
							    </div>
							    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
							      	<div class="panel-body">
							      		<ul>
							      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
							      			<li><b>Tamaño mínimo:</b> 3 caracteres.</li>
							      			<li><b>Tamaño máximo:</b> 30 caracteres.</li>
							      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>
							      			<li><b>Campo obligatorio.</b></li>
							      		</ul>
							      	</div>
							    </div>
						  	</div><!--/ Descripción campo Nombre de la vacuna -->

						  	<!-- Descripción campo Fecha inicio -->
						  	<div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="heading2">
							      	<h4 class="panel-title">
							      		Fecha inicio
							        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
							          		<span class="glyphicon glyphicon-plus"></span>
							        	</a>
							      	</h4>
							    </div>
							    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
							      	<div class="panel-body">
							      		<ul>
							      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
							      			<li><b>Formato:</b> Fecha aaaa-mm-dd (ejemp.: 2017-08-24).</li>
							      			<li><b>Condición:</b> La fecha ingresada no puede ser anterior a la fecha actual.</li>
							      			<li><b>Campo obligatorio.</b></li>
							      		</ul>
							      	</div>
							    </div>
						  	</div><!--/ Descripción campo Fecha inicio -->

						  	<!-- Descripción campo Hora inicio -->
						  	<div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="heading3">
							      	<h4 class="panel-title">
							      		Hora inicio
							        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
							          		<span class="glyphicon glyphicon-plus"></span>
							        	</a>
							      	</h4>
							    </div>
							    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
							      	<div class="panel-body">
							      		<ul>
							      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
							      			<li><b>Formato:</b> Hora hh:mm (ejemp.: 02:30).</li>
							      			<li><b>Meridiano:</b> AM o PM. Obligatorio.</li>
							      			<li><b>Condición:</b> La combinación entre la hora y la fecha de inicio debe ser posterior a la hora y fecha actuales.</li>
							      			<li><b>Campo obligatorio.</b></li>
							      		</ul>
							      	</div>
							    </div>
						  	</div><!--/ Descripción campo Hora inicio -->

						  	<!-- Descripción campo Fecha finalización -->
						  	<div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="heading4">
							      	<h4 class="panel-title">
							      		Fecha finalización
							        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
							          		<span class="glyphicon glyphicon-plus"></span>
							        	</a>
							      	</h4>
							    </div>
							    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
							      	<div class="panel-body">
							      		<ul>
							      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
							      			<li><b>Formato:</b> Fecha aaaa-mm-dd (ejemp.: 2017-08-24).</li>
							      			<li><b>Condición:</b> La fecha ingresada no puede ser anterior a la fecha actual ni a la fecha de inicio.</li>
							      			<li><b>Campo obligatorio.</b></li>
							      		</ul>
							      	</div>
							    </div>
						  	</div><!--/ Descripción campo Fecha finalización -->

						  	<!-- Descripción campo Hora finalización -->
						  	<div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="heading5">
							      	<h4 class="panel-title">
							      		Hora finalización
							        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
							          		<span class="glyphicon glyphicon-plus"></span>
							        	</a>
							      	</h4>
							    </div>
							    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
							      	<div class="panel-body">
							      		<ul>
							      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
							      			<li><b>Formato:</b> Hora hh:mm (ejemp.: 02:30).</li>
							      			<li><b>Meridiano:</b> AM o PM. Obligatorio.</li>
							      			<li><b>Condición:</b> La combinación entre la hora y la fecha de finalización debe ser posterior a la hora y fecha actuales y a la hora y fecha de inicio del evento.</li>
							      			<li><b>Campo obligatorio.</b></li>
							      		</ul>
							      	</div>
							    </div>
						  	</div><!--/ Descripción campo Hora finalización -->

						  	<!-- Descripción campo Descripción -->
						  	<div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="heading6">
							      	<h4 class="panel-title">
							      		Descripción
							        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
							          		<span class="glyphicon glyphicon-plus"></span>
							        	</a>
							      	</h4>
							    </div>
							    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
							      	<div class="panel-body">
							      		<ul>
							      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
							      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
							      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales.</li>
							      			<li><b>Campo obligatorio.</b></li>
							      		</ul>
							      	</div>
							    </div>
						  	</div><!--/ Descripción campo Descripción -->

						  	<!-- Descripción campo Imagen -->
						  	<div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="heading7">
							      	<h4 class="panel-title">
							      		Imagen
							        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
							          		<span class="glyphicon glyphicon-plus"></span>
							        	</a>
							      	</h4>
							    </div>
							    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
							      	<div class="panel-body">
							      		<ul>
							      			<li><b>Tipo de dato:</b> Archivo de tipo imagen.</li>
							      			<li><b>Fromatos permitidos:</b> JPG, PNG y GIF.</li>
							      			<li><b>Campo opcional.</b></li>
							      		</ul>
							      	</div>
							    </div>
						  	</div><!--/ Descripción campo Imagen -->

						</div><!--/ Panel de descripción de campos -->

						<p>
							<b>Nota:</b><br>
							El botón "Guardar" permanecerá desactivado hasta llenar los campos obligatorios del formulario.
						</p>

					</div><!--/ Descripción -->
				</div>

			</div><!--/ Instrucciones para el usuario -->

			<!-- Formulario -->
			<div class="col-sm-8">
				<?php
					$url =  base_url()."Vacuna/".$this->uri->segment(2, 0);
					if ($this->uri->segment(3, 0) != "0") {
						$url .= "/".$this->uri->segment(3, 0);
					}

					echo form_open(
	      				$url,
	      				'class="form-basic" id="registro-vacuna"'
	      				); ?>		
	        		
	        		<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">

        			<div class="col-md-12">
        				<h4>
        					Datos de la vacuna
        					<figure class="load-content">
			        			<img src="<?php echo base_url();?>assets/img/loading_spinner.gif" class="loading form-loading">
			        		</figure>
        				</h4>
        			</div>	
    				<div class="col-xs-12">	
    					<!-- Campo Nombre de la vacuna -->        					
	        			<div class="col-xs-6">
			        		<div class="form-group">
			        			<label class="control-label" for="vacuna_nombre"><span class="red">*</span>Nombre de la vacuna:</label>
			        			<input type="text" id="vacuna_nombre" name="vacuna_nombre" class="form-control" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($vacuna['vacuna_nombre']))? $vacuna['vacuna_nombre'] : set_value('vacuna_nombre'); ?>" required="required" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos"> 
								    <div class="help-block with-errors">
								    </div>
			        		</div>
	        			</div><!--/ Campo Nombre de la vacuna -->

	        			<!-- Campo Cantidad de enfermedades que combate -->
	        			<div class="col-xs-6">
			        		<div class="form-group">
			        			<label class="control-label" for="cant_enfermedad"><span class="red">*</span>Cantidad de enfermedades que combate:</label>
			        			<input type="number" id="cant_enfermedad" name="cant_enfermedad" min="1" class="form-control" required pattern="[1-9]{1,4}" value="<?php echo (isset($vacuna['cant_enfermedad']))? $vacuna['cant_enfermedad'] : set_value('cant_enfermedad'); ?>" >	
							    <div class="help-block with-errors">
								</div>
			        		</div>
	        			</div><!--/ Campo Cantidad de enfermedades que combate -->
    				</div> 
    				<div class="col-xs-12" id="list_cant_enfermedades">

    					<!-- Campo Enfermedad -->
	        			<div class="col-xs-6">
			        		<div class="form-group">
			        			<label class="control-label" for="enfermedad1"><span class="red">*</span>Enfermedad 1:</label>
		        				<select class="form-control chosen-select" id="enfermedad1" name="enfermedad[]" data-nro="1" data-placeholder="Seleccionar enfermedad...">
		        					<option></option>
		        					<?php 
		        						foreach ($patologias as $patologia) {
											
										echo "<option value=\"".$patologia["id"]."\">".$patologia["nombre"]."</option>";											
										}
		        					?>
		        				</select>	
			        		</div>
	        			</div><!--/ Campo Enfermedad -->
	        		</div>
        			<div class="col-xs-12">	
        				<!-- Botón Agregar esquema -->        					
	        			<div class="col-md-6">
			        		<div class="form-group">
		        				<button class="btn btn-info" id="add_esquema">
		        					<span class="glyphicon glyphicon-plus"></span> 
		        					Agregar esquema
		        				</button>
			        		</div>
	        			</div><!-- Botón Agregar esquema -->

        				<input type="hidden" id="can-esquemas" name="can-esquemas" value="1">
        				<div id="lista-esquemas" class="col-xs-12">
        					<div class="col-xs-12 esquema-content">
        						<div class="row">
        							<!-- Campo Esquema -->
	        						<div class="col-xs-6">
						        		<div class="form-group">
						        			<label class="control-label" for="esquema1"><span class="red">*</span>Esquema:</label>
					        				<select class="form-control chosen-select select-esquema" id="esquema1" data-dosis="cant_dosis1" data-intervalo="intervalo1" data-pintervalo="interperiodo1" name="esquema[]" data-placeholder="Seleccionar esquema...">
					        					<option></option>
					        					<option value="Única" <?php echo (isset($vacuna['esquema']) && $vacuna['esquema'] == 'Única')? "selected=\"selected\"" : set_select('esquema', 'Única'); ?>>Única</option>
					        					<option value="Dosis" <?php echo (isset($vacuna['esquema']) && $vacuna['esquema'] == 'Dosis')? "selected=\"selected\"" : set_select('esquema', 'Dosis'); ?>>Dosis</option>
					        					<option value="Refuerzo" <?php echo (isset($vacuna['esquema']) && $vacuna['esquema'] == 'Refuerzo')? "selected=\"selected\"" : set_select('esquema', 'Refuerzo'); ?>>Refuerzo</option>
					        				</select>
						        		</div>
				        			</div><!--/ Campo Esquema -->

				        			<!-- Campo Cantidad de dosis -->
			        				<div class="col-xs-4">
						        		<div class="form-group">
						        			<label class="control-label" for="cant_dosis1"><span class="red">*</span>Cantidad de dosis:</label>
				        					<input type="number" id="cant_dosis1" name="cant_dosis[]" min="1" class="form-control" required pattern="[1-9]{1,4}" value="<?php echo (isset($vacuna['cant_dosis1']))? $vacuna['cant_dosis1'] : set_value('cant_dosis1'); ?>" >
						        		</div>
				        			</div><!--/ Campo Cantidad de dosis -->
				        		</div>
			        			<div class="row">

			        				<!-- Campo Intervalo -->
				        			<div class="col-xs-6">
						        		<div class="form-group">
						        			<div class="row">
							        			<label class="col-xs-12 control-label" for="intervalo1"><span class="red">*</span>Intervalo:</label>
							        			<div class="col-xs-6">
							        				<input type="number" id="intervalo1" name="intervalo[]" min="1" class="form-control" required>				        				
							        			</div>
							        			<div class="col-xs-6">
							        				<select class="form-control chosen-select" id="interperiodo1" name="interperiodo[]" data-placeholder="Periodo...">
							        					<option></option>
							        					<option value="Hora(s)">Hora(s)</option>
							        					<option value="Día(s)">Día(s)</option>
							        					<option value="Semana(s)">Semana(s)</option>
							        					<option value="Mese(s)">Mese(s)</option>
							        					<option value="Año(s)">Año(s)</option>
							        				</select>				        				
							        			</div>
							        		</div>
						        		</div>
				        			</div><!--/ Campo Intervalo -->

				        			<!-- Campo Vía de administración -->
				        			<div class="col-xs-6">
						        		<div class="form-group">
						        			<label class="control-label" for="via_administracion1"><span class="red">*</span>Vía de administración:</label>	
					        				<select class="form-control chosen-select" id="via_administracion1" name="via_administracion[]" data-placeholder="Seleccionar...">
					        					<option></option>
					        					<option value="Oral">Oral</option>
					        					<option value="Intramuscular">Intramuscular</option>
					        					<option value="Subcutánea">Subcutánea</option>
					        					<option value="Endovenosa">Endovenosa</option>
					        					<option value="Intradérmica">Intradérmica</option>
					        				</select>
						        		</div>
				        			</div><!--/ Campo Vía de administración -->
				        		</div>
			        			<div class="row">

			        				<!-- Campo Edad mínima -->
				        			<div class="col-md-6">
				        				<div class="form-group">
				        					<div class="row">
							        			<label class="col-xs-12 control-label" for="eminima1"><span class="red">*</span>Edad mínima:</label>
							        			<div class="col-xs-6">
							        				<input type="number" id="eminima1" name="eminima[]" min="1" class="form-control" required>				        				
							        			</div>
							        			<div class="col-xs-6">
							        				<select class="form-control chosen-select" id="eminperiodo1" name="eminperiodo[]" data-placeholder="Periodo...">
							        					<option></option>
							        					<option value="Hora(s)">Hora(s)</option>
							        					<option value="Día(s)">Día(s)</option>
							        					<option value="Semana(s)">Semana(s)</option>
							        					<option value="Mese(s)">Mese(s)</option>
							        					<option value="Año(s)">Año(s)</option>	
							        				</select>				        				
							        			</div>
							        		</div>
						        		</div>
				        			</div><!--/ Campo Edad mínima -->

				        			<!-- Campo Edad máxima -->
				        			<div class="col-md-6">
				        				<div class="form-group">
				        					<div class="row">
							        			<label class="col-xs-12 control-label" for="emaxima1"><span class="red">*</span>Edad máxima:</label>
							        			<div class="col-xs-6">
							        				<input type="number" id="emaxima1" name="emaxima[]" min="1" class="form-control" required>				        				
							        			</div>
							        			<div class="col-xs-6">
							        				<select class="form-control chosen-select" id="emaxperiodo1" name="emaxperiodo[]" data-placeholder="Periodo...">
							        					<option></option>
							        					<option value="Hora(s)">Hora(s)</option>
							        					<option value="Día(s)">Día(s)</option>
							        					<option value="Semana(s)">Semana(s)</option>
							        					<option value="Mese(s)">Mese(s)</option>
							        					<option value="Año(s)">Año(s)</option>
							        				</select>				        				
							        			</div>
							        		</div>
						        		</div>
				        			</div><!--/ Campo Edad máxima -->
				        		</div>
        					</div>
        					
        				</div>	        				
        			</div>

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
							<a href="<?php echo base_url(); ?>Patologia/ListarPatologias" class="btn btn-second-2 btn-lg btn-block">Cancelar</a>
						</div>						
					</div><!--/ Botones -->

				<?php echo form_close();?>			
			</div><!--/ Formulario -->
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-vacuna.js"></script>

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