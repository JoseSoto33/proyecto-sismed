<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Agregar consulta médica
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Historias clínicas</li>
    <li>Detalles de historia cínica</li>
    <li class="active">Agregar consulta médica</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">	
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<div class="box box-solid box-success">
	        	<div class="box-header with-border">
		          <h3 class="box-title">Instrucciones</h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		        	<!-- Instrucciones para el usuario -->
					<div id="form-noticia-instruction" class="form-instructions">
						<div class="col-sm-12">	
							<!-- Descripción -->
							<div class="descripcion">
								<p>
									Para registrar a un usuario nuevo deberá llenar los campos de acuerdo a las siguientes indicaciones:
								</p>
								<!-- Panel de descripción de campos -->
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

								  	<!-- Descripción campo Motivo de consulta -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading1">
									      	<h4 class="panel-title">
									      		Motivo de consulta
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Motivo de consulta -->

								  	<!-- Descripción campo Enfermedad actual -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading2">
									      	<h4 class="panel-title">
									      		Enfermedad actual
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Enfermedad actual -->

								  	<!-- Descripción campo Examen médico general -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading3">
									      	<h4 class="panel-title">
									      		Examen médico general
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Examen médico general -->

								  	<!-- Descripción campo Digestivo -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading4">
									      	<h4 class="panel-title">
									      		Digestivo
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Digestivo -->

								  	<?php 
									/** -- Si el tipo de formulario es 'Preventivo' -- */
										if ($tipo_consulta == 2) { 
									?>

								  	<!-- Descripción campo Urogeital -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading5">
									      	<h4 class="panel-title">
									      		Urogeital
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Urogeital -->

								  	<!-- Descripción campo  Cardiopulmonar -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading6">
									      	<h4 class="panel-title">
									      		 Cardiopulmonar
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
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo  Cardiopulmonar -->

								  	<!-- Descripción campo Locomotor -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading7">
									      	<h4 class="panel-title">
									      		Locomotor
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Locomotor -->

								  	<!-- Descripción campo Neuropsíquicos -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading8">
									      	<h4 class="panel-title">
									      		Neuropsíquicos
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Neuropsíquicos -->

								  	<!-- Descripción campo Otros -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading9">
									      	<h4 class="panel-title">
									      		Otros
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Otros -->

								  	<!-- Descripción campo Talla -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading10">
									      	<h4 class="panel-title">
									      		Talla
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Número entero.</li>
									      			<li><b>Valor mínimo:</b> 1.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Talla -->

					    			<!-- Descripción campo Peso -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading11">
									      	<h4 class="panel-title">
									      		Peso
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" aria-controls="collapse11">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 3 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 6 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Sólo caracteres numéricos.</li>
									      			<li><b>Condición: </b>El campo debe tener el formato '70.5'</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Peso -->

								  	<!-- Descripción campo Tensión Arterial -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading12">
									      	<h4 class="panel-title">
									      		Tensión Arterial
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 3 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 7 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Sólo caracteres numéricos y '/'.</li>
									      			<li><b>Condición: </b>El campo debe tener el formato '100/70'</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Tensión Arterial -->

								  	<!-- Descripción campo Pulso -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading13">
									      	<h4 class="panel-title">
									      		Pulso
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="false" aria-controls="collapse13">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Número entero.</li>
									      			<li><b>Valor mínimo:</b> 1.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Pulso -->

								  	<!-- Descripción campo Respiración -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading14">
									      	<h4 class="panel-title">
									      		Respiración
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Número entero.</li>
									      			<li><b>Valor mínimo:</b> 1.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Respiración -->

								  	<!-- Descripción campo Temperatura -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading15">
									      	<h4 class="panel-title">
									      		Temperatura
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="false" aria-controls="collapse15">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Número entero.</li>
									      			<li><b>Valor mínimo:</b> 1.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Temperatura -->

								  	<!-- Descripción campo Impresión Diagnóstica -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading16">
									      	<h4 class="panel-title">
									      		Impresión Diagnóstica
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse16" aria-expanded="false" aria-controls="collapse16">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading16">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Impresión Diagnóstica -->

								  	<!-- Descripción campo Tratamiento -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading17">
									      	<h4 class="panel-title">
									      		Tratamiento
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse17" aria-expanded="false" aria-controls="collapse17">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading17">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Tratamiento -->
								  	<?php 
										}	
									/** --// Si el tipo de formulario es 'Preventivo' -- */
									?>							  	

								</div><!--/ Panel de descripción de campos -->
								<p>
									<b>Nota:</b><br>
									El botón "Guardar" permanecerá desactivado hasta llenar los campos obligatorios del formulario.
								</p>
							</div><!--/ Descripción -->
						</div>
					</div><!--/ Instrucciones para el usuario -->
		        </div>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-8">
			<div class="box box-success">
	        	<div class="box-header with-border">
	        		<div class="row">
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
						<div class="col-xs-12">				
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
				      				'id="registro-consulta"'
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
										<!-- Campo 'Motivo de consulta' -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="motivo" class="control-label"><span class="red">*</span> Motivo de consulta</label>
											    <textarea class="form-control" name="motivo" id="motivo" minlength="12" required="required"><?php echo (isset($consulta['motivo']))? trim($consulta['motivo']) : trim(set_value('motivo')); ?></textarea>	
											    <div class="help-block with-errors">
												</div>	
											</div>						
										</div><!--/ Campo 'Motivo de consulta' -->

										<!-- Campo 'Enfermedad actual' -->
										<div class="col-sm-6">			
											<div class="form-group">
												<label for="enfermedad_actual" class="control-label"><span class="red">*</span> Enfermedad actual</label>
											    <textarea class="form-control" name="enfermedad_actual" id="enfermedad_actual" minlength="12" required="required"><?php echo (isset($consulta['enfermedad_actual']))? trim($consulta['enfermedad_actual']) : trim(set_value('enfermedad_actual')); ?></textarea>	
											    <div class="help-block with-errors">
												</div>
											</div>
										</div><!--/ Campo 'Enfermedad actual' -->							
									</div>
									<div class="row">
										<!-- Campo 'Examen Médico General' -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="examen_medico_general" class="control-label"><span class="red">*</span> Examen Médico General</label>
											    <textarea class="form-control" name="examen_medico_general" id="examen_medico_general" minlength="12" required="required"><?php echo (isset($consulta['examen_medico_general']))? trim($consulta['examen_medico_general']) : trim(set_value('examen_medico_general')); ?></textarea>	
											    <div class="help-block with-errors">
												</div>	
											</div>						
										</div><!--/ Campo 'Examen Médico General' -->
										
										<!-- Campo 'Digestivo' -->
										<div class="col-sm-6">			
											<div class="form-group">
												<label for="digestivo" class="control-label"><span class="red">*</span> Digestivo</label>
											    <textarea class="form-control" name="digestivo" id="digestivo" minlength="12" required="required"><?php echo (isset($consulta['digestivo']))? trim($consulta['digestivo']) : trim(set_value('digestivo')); ?></textarea>	
											    <div class="help-block with-errors">
												</div>
											</div>
										</div><!--/ Campo 'Digestivo' -->
									</div>

									<?php 
									/** -- Si el tipo de formulario es 'Preventivo' -- */
										if ($tipo_consulta == 2) { 
									?>

									<hr />
									<div class="row">
										<!-- Campo 'Urogenital' -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="urogenital" class="control-label"><span class="red">*</span> Urogenital</label>
											    <textarea class="form-control" name="urogenital" id="urogenital" minlength="12" required="required"><?php echo (isset($consulta['urogenital']))? trim($consulta['urogenital']) : trim(set_value('urogenital')); ?></textarea>	
											    <div class="help-block with-errors">
												</div>	
											</div>						
										</div><!--/ Campo 'Urogenital' -->
										
										<!-- Campo 'Cardiopulmonar' -->
										<div class="col-sm-6">			
											<div class="form-group">
												<label for="cardiopulmonar" class="control-label"><span class="red">*</span> Cardiopulmonar</label>
											    <textarea class="form-control" name="cardiopulmonar" id="descripcion" minlength="12" required="required"><?php echo (isset($consulta['cardiopulmonar']))? trim($consulta['cardiopulmonar']) : trim(set_value('cardiopulmonar')); ?></textarea>	
											    <div class="help-block with-errors">
												</div>
											</div>
										</div><!--/ Campo 'Cardiopulmonar' -->							
									</div>
									<div class="row">
										<!-- Campo 'Locomotor' -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="locomotor" class="control-label"><span class="red">*</span> Locomotor</label>
											    <textarea class="form-control" name="locomotor" id="locomotor" minlength="12" required="required"><?php echo (isset($consulta['locomotor']))? trim($consulta['locomotor']) : trim(set_value('locomotor')); ?></textarea>	
											    <div class="help-block with-errors">
												</div>	
											</div>						
										</div><!--/ Campo 'Locomotor' -->
										
										<!-- Campo 'Neuropsíquicos' -->
										<div class="col-sm-6">			
											<div class="form-group">
												<label for="neuropsiquicos" class="control-label"><span class="red">*</span> Neuropsíquicos</label>
											    <textarea class="form-control" name="neuropsiquicos" id="neuropsiquicos" minlength="12" required="required"><?php echo (isset($consulta['neuropsiquicos']))? trim($consulta['neuropsiquicos']) : trim(set_value('neuropsiquicos')); ?></textarea>	
											    <div class="help-block with-errors">
												</div>
											</div>
										</div><!--/ Campo 'Neuropsíquicos' -->							
									</div>
								
									<div class="row">
										<!-- Campo 'Otros' -->
										<div class="col-sm-12">
											<div class="form-group">
												<label for="otros" class="control-label"><span class="red">*</span> Otros</label>
											    <textarea class="form-control" name="otros" id="otros" minlength="12" required="required"><?php echo (isset($consulta['otros']))? trim($consulta['otros']) : trim(set_value('otros')); ?></textarea>	
											    <div class="help-block with-errors">
												</div>	
											</div>						
										</div><!--/ Campo 'Otros' -->	
									</div>
									<hr />
									<div class="row">
										<div class="col-sm-12">
											<h4>Examen físico</h4>
										</div>
										<div class="col-sm-12">
											<div class="row">
												<!-- Campo 'Talla' -->
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
												</div><!--/ Campo 'Talla' -->

												<!-- Campo 'Peso' -->
												<div class="col-sm-4">
													<div class="form-group">
														<label for="ef_peso" class="control-label"><span class="red">*</span> Peso:</label>
														<div class="input-group">
													    	<input type="text" class="form-control" id="ef_peso" name="ef_peso" pattern="[0-9]{1,3}\.[0-9]{1,2}" title="Debe llenar este campo" minlength="3" maxlength="6" value="<?php echo (isset($consulta['ef_peso']))? $consulta['ef_peso'] : set_value('ef_peso'); ?>" required="required" data-pattern-error="El campo debe tener el formato '70.5'" aria-describedby="peso-addon">
													    	<span class="input-group-addon" id="peso-addon">Kg</span>
													    </div>
												      	<div class="help-block with-errors">
												      	</div>
													</div>						
												</div><!--/ Campo 'Talla' -->

												<!-- Campo 'Tensión Arterial' -->
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
												</div><!--/ Campo 'Tensión Arterial' -->
											</div>
											<div class="row">
												<!-- Campo 'Pulso' -->
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
												</div><!--/ Campo 'Pulso' -->

												<!-- Campo 'Respiración' -->
												<div class="col-sm-4">
													<div class="form-group">
														<label for="ef_resp" class="control-label"><span class="red">*</span>Respiración:</label>
														<div class="input-group">
												    		<input type="number" class="form-control" id="ef_resp" name="ef_resp" title="Debe llenar este campo" min="1" value="<?php echo (isset($consulta['ef_resp']))? $consulta['ef_resp'] : set_value('ef_resp'); ?>" required="required" aria-describedby="resp-addon">
												    		<span class="input-group-addon" id="resp-addon">rpm</span>
												    	</div>
												      	<div class="help-block with-errors">
												      	</div>
													</div>						
												</div><!--/ Campo 'Respiración' -->

												<!-- Campo 'Temperatura' -->
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
												</div><!--/ Campo 'Temperatura' -->
											</div>
										</div>
									</div>
									<hr />
									<div class="row">
										<!-- Campo 'Impresión Diagnóstica' -->
										<div class="col-sm-6">			
											<div class="form-group">
												<label for="impresion_diagnostica" class="control-label"><span class="red">*</span> Impresión Diagnóstica</label>
											    <textarea class="form-control" name="impresion_diagnostica" id="impresion_diagnostica" minlength="12" required="required"><?php echo (isset($consulta['impresion_diagnostica']))? trim($consulta['impresion_diagnostica']) : trim(set_value('impresion_diagnostica')); ?></textarea>	
											    <div class="help-block with-errors">
												</div>
											</div>
										</div><!--/ Campo 'Impresión Diagnóstica' -->

										<!-- Campo 'Tratamiento' -->
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
							<?php 
								echo form_close();
							/** --// Formulario para agregar consultas -- */
							?>			
						</div><!--/ Contenedor del formulario -->
					</div>
				</div>
				<div class="box-footer">
					<!-- Botones -->	        		
					<a href="<?php echo base_url(); ?>HistoriaClinica/ConsultarHistoriaClinica/<?php echo $cod_historia; ?>" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="registro-consulta" class="btn btn-success pull-right">Guardar</button>
		        	<!--/ Botones -->
		        </div>
		    </div>
		</div>
	</div>
</section>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-consulta.js"></script>
