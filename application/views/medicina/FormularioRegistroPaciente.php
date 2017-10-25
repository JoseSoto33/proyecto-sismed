<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Registrar historia clínica
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Historias clínicas</li>
    <li class="active">Registrar historia clínica</li>
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
					    			<!-- Descripción campo Cédula -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading1">
									      	<h4 class="panel-title">
									      		Cédula
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 6 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 8 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Sólo caracteres numéricos.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Cédula -->

								  	<!-- Descripción campo Primer nombre -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading2">
									      	<h4 class="panel-title">
									      		Primer nombre
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 3 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 30 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfabéticos (incluyendo acentuados).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Primer nombre -->

								  	<!-- Descripción campo Segundo nombre -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading3">
									      	<h4 class="panel-title">
									      		Segundo nombre
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 6 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 30 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>
									      			<li><b>Campo opcional.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Segundo nombre -->

								  	<!-- Descripción campo Primer apellido -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading4">
									      	<h4 class="panel-title">
									      		Primer apellido
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 3 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 30 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfabéticos (incluyendo acentuados).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Primer apellido -->

								  	<!-- Descripción campo Segundo apellido -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading5">
									      	<h4 class="panel-title">
									      		Segundo apellido
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 6 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 30 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>
									      			<li><b>Campo opcional.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Segundo apellido -->

								  	<!-- Descripción campo Fecha de nacimiento -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading6">
									      	<h4 class="panel-title">
									      		Fecha de nacimiento
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Formato:</b> Fecha aaaa-mm-dd (ejemp.: 2017-08-24).</li>
									      			<li><b>Condición:</b> La fecha ingresada debe ser anterior a la fecha actual.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Fecha de nacimiento -->

								  	<!-- Descripción campo Correo electrónico -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading7">
									      	<h4 class="panel-title">
									      		Correo electrónico
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Formato:</b> Dirección de correo electrónico (ejemp.: andres_lopez2005@gmail.com).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Correo electrónico -->

								  	<!-- Descripción campo Teléfono personal -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading8">
									      	<h4 class="panel-title">
									      		Teléfono personal
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Formato:</b> Número telefónico (0000) 000-00-00 (ejemp.: (0416) 025-15-00).</li>
									      			<li><b>Condición:</b> El código de área debe pertener a cualquiera de las líneas telefónicas disponibles dentro del país (Cantv, Movilnet, Movistar o Digitel).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Teléfono personal -->

								  	<!-- Descripción campo Teléfono emergencia -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading9">
									      	<h4 class="panel-title">
									      		Teléfono emergencia
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Formato:</b> Número telefónico (0000) 000-00-00 (ejemp.: (0416) 025-15-00).</li>
									      			<li><b>Condición:</b> El código de área debe pertener a cualquiera de las líneas telefónicas disponibles dentro del país (Cantv, Movilnet, Movistar o Digitel).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Teléfono emergencia -->

								  	<!-- Descripción campo Sexo -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading10">
									      	<h4 class="panel-title">
									      		Sexo
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
									      	<div class="panel-body">
									      		<ul>							      			
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Sexo -->

								  	<!-- Descripción campo Dirección de Habitación -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading11">
									      	<h4 class="panel-title">
									      		Dirección de Habitación
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" aria-controls="collapse11">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Dirección de Habitación -->

								  	<!-- Descripción campo Lugar de nacimiento -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading12">
									      	<h4 class="panel-title">
									      		Lugar de nacimiento
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Lugar de nacimiento -->

								  	<!-- Descripción campo Tipo de paciente -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading13">
									      	<h4 class="panel-title">
									      		Tipo de paciente
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="false" aria-controls="collapse13">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Seleccionable.</li>
									      			<li><b>Descripción:</b> Debe seleccionar una opción según sea el caso del registro.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Tipo de paciente -->

								  	<!-- Descripción campo Departamento -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading14">
									      	<h4 class="panel-title">
									      		Departamento
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
									      	<div class="panel-body">
									      		<ul>							      			
									      			<li><b>Tipo de dato:</b> Seleccionable.</li>
									      			<li><b>Descripción:</b> Debe seleccionar una opción según sea el caso del registro.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Departamento -->

								  	<!-- Descripción campo Trayecto -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading15">
									      	<h4 class="panel-title">
									      		Trayecto
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="false" aria-controls="collapse15">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
									      	<div class="panel-body">
									      		<ul>		
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 2 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 30 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>					      			
									      			<li><b>Campo opcional.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Trayecto -->

								  	<!-- Descripción campo PNF -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading16">
									      	<h4 class="panel-title">
									      		PNF
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse16" aria-expanded="false" aria-controls="collapse16">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading16">
									      	<div class="panel-body">
									      		<ul>							      			
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 3 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 30 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfabéticos (incluyendo acentuados, espacios y caracteres especiales.</li>					      			
									      			<li><b>Campo opcional.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo PNF -->

								  	<!-- Descripción campo Tipo de sangre -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading17">
									      	<h4 class="panel-title">
									      		Tipo de sangre
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse17" aria-expanded="false" aria-controls="collapse17">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading17">
									      	<div class="panel-body">
									      		<ul>							      			
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño:</b> Debe tener 6 caracteres exactamente.</li>
									      			<li><b>Caracteres permitidos:</b> Alfabéticos (incluyendo espacios y caracteres de '+' y '-').</li>
									      			<li><b>Ejemplo:</b> "A RH -", "O RH +" o "ABRH +".</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Tipo de sangre -->

								  	<!-- Descripción campo Antescedentes personales -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading18">
									      	<h4 class="panel-title">
									      		Antescedentes personales
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse18" aria-expanded="false" aria-controls="collapse18">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading18">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>
									      			<li><b>Descripción:</b> Debe especificar los antescedentes del paciente en cuanto a enfermedades padecidas, intervenciones quirúrgicas realizadas y cualquier otra condición médica relevante</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Antescedentes personales -->

								  	<!-- Descripción campo Antescedentes familiares -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading19">
									      	<h4 class="panel-title">
									      		Antescedentes familiares
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse19" aria-expanded="false" aria-controls="collapse19">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading19">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>
									      			<li><b>Descripción:</b> Debe especificar los antescedentes de la familia del paciente en cuanto a enfermedades padecidas, intervenciones quirúrgicas realizadas y cualquier otra condición médica relevante</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Antescedentes familiares -->

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
	        			<div class="col-xs-12">
							<?php echo validation_errors("<div class=\"alert alert-danger\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>", "</div>"); ?>
							<?php if(isset($mensaje) && !empty($mensaje)) { ?>
								<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<?php echo $mensaje; ?>
								</div>					
							<?php } ?>

							<?php if(isset($info) && !empty($info)) { ?>
								<div class="alert alert-warning" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<?php echo $info; ?>
								</div>					
							<?php } ?>
						</div>
						<!-- Formulario -->
						<div class="col-xs-12">
							
							<?php
								$url =  base_url()."Paciente/".$this->uri->segment(2, 0);
								if ($this->uri->segment(3, 0) != "0") {
									$url .= "/".$this->uri->segment(3, 0);
								}
								echo form_open(
				      				$url,
				      				'id="registro-paciente"'
				      				); ?>
								<div class="col-sm-12">
									<h2>
										Datos personales
										<small class="pull-right"> 
				    						<span class="red2">Los campos con (*) son obligatorios.</span>
				    					</small>
									</h2>
								</div>

								<!-- Inputs ocultos -->
								<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
								<input type="hidden" name="id_persona" id="id" value="<?php echo (isset($id_persona))? $id_persona : ''; ?>">
								<!--/ Inputs ocultos -->

								<?php
									if (isset($cod_historia)) {
										echo "<input type=\"hidden\" name=\"cod_historia\" id=\"cod_historia\" value=\"$cod_historia\">";
									}
								?>
								<!-- Línea divisoria -->
								<hr class="form-divisor-line">
								<!--/ Línea divisoria -->

								<!-- Fila -->
								<div class="col-sm-12">	
									<div class="row">

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo cédula -->
											<div class="form-group">
												<label for="cedula" class="control-label"><span class="red">*</span> Cédula:</label>
										    	<div class="input-group">
										    		<div class="input-group-btn">
														<button id="search" class="btn btn-second" data-toggle="tooltip" data-placement="bottom" title="Buscar...">
															<span class="glyphicon glyphicon-search"></span>
														</button>	
													</div>											
											      	<input type="text" class="form-control" id="cedula" name="cedula" minlength="6" maxlength="8" pattern="[0-9]{6,8}" value="<?php echo (isset($paciente['cedula']))? $paciente['cedula'] : set_value('cedula'); ?>" required="required" title="Sólo números de 6 a 8 dígitos" placeholder="Sólo números de 6 a 8 dígitos" data-pattern-error="La cédula sólo debe contener números de 6 a 8 dígitos">	
											      	<div class="input-group-btn">								
														<button id="reset" class="btn btn-second-2" data-toggle="tooltip" data-placement="bottom" title="Limpiar formulario...">
															<span class="glyphicon glyphicon-refresh"></span>
														</button>
													</div>
											    </div>
											    <div class="help-block with-errors">
											    </div>								    
											</div><!--/ Campo cédula -->
										</div><!--/ Columna -->

										<!-- Columna -->
										<div class="col-sm-6">
											<label class="control-label"></label>
											<!-- Boton 'Ver historia' -->
											<a id="verHistoria" class="btn btn-primary disabled" href="#">
												<span class="glyphicon glyphicon-arrow-right"></span>
												Ver historia
											</a><!--/ Boton 'Ver historia' -->
										</div><!--/ Columna -->
									</div>
								</div><!--/ Fila -->

								<!-- Fila -->
								<div class="col-sm-12">
									<div class="row">

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Primer nombre' -->
											<div class="form-group">
												<label for="nombre1" class="control-label"><span class="red">*</span> Primer nombre:</label>
										      	<input type="text" class="form-control" id="nombre1" name="nombre1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['nombre1']))? $paciente['nombre1'] : set_value('nombre1'); ?>" required="required" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos" readonly="readonly"> 
										      	<div class="help-block with-errors">
										      	</div>
											</div><!--/ Campo 'Primer nombre' -->						
										</div><!--/ Columna -->

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Segundo nombre' -->
											<div class="form-group">
												<label for="nombre2" class="control-label">Segundo nombre:</label>
											    <input type="text" class="form-control" id="nombre2" name="nombre2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['nombre2']))? $paciente['nombre2'] : set_value('nombre2'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos" readonly="readonly">
											    <div class="help-block with-errors">
											    </div>								    
											</div><!--/ Campo 'Segundo nombre' -->
										</div><!--/ Columna -->
									</div>
								</div><!--/ Fila -->

								<!-- Fila -->
								<div class="col-sm-12">
									<div class="row">

										<!-- Columna -->		
										<div class="col-sm-6">
											<!-- Campo 'Primer apellido' -->
											<div class="form-group">
												<label for="apellido1" class="control-label"><span class="red">*</span> Primer apellido:</label>
											    <input type="text" class="form-control" id="apellido1" name="apellido1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['apellido1']))? $paciente['apellido1'] : set_value('apellido1'); ?>" required="required" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos" readonly="readonly">
											    <div class="help-block with-errors"></div>
											</div><!--/ Campo 'Primer apellido' -->
										</div><!--/ Columna -->

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Segundo apellido' -->
											<div class="form-group">
												<label for="apellido2" class="control-label">Segundo apellido:</label>
											    <input type="text" class="form-control" id="apellido2" name="apellido2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['apellido2']))? $paciente['apellido2'] : set_value('apellido2'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos" readonly="readonly">
											    <div class="help-block with-errors">
											    </div>								    
											</div><!--/ Campo 'Segundo apellido' -->
										</div><!--/ Columna -->
									</div>
								</div><!--/ Fila -->

								<!-- Fila -->
								<div class="col-sm-12">
									<div class="row">

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Fecha de nacimiento' -->
											<div class="form-group">
												<label for="fecha_nacimiento" class="control-label"><span class="red">*</span> Fecha de nacimiento:</label>
											    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" max="<?php echo date('Y-m-d');?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo (isset($paciente['fecha_nacimiento']))? $paciente['fecha_nacimiento'] : set_value('fecha_nacimiento'); ?>" required="required" data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)" readonly="readonly">
											    <div class="help-block with-errors">
											    </div>
											</div><!--/ Campo 'Fecha de nacimiento' -->
										</div><!--/ Columna -->

										<!-- Columna -->
										<div class="col-sm-6">
										<!-- Campo 'Correo electrónico' -->
											<div class="form-group">
												<label for="email" class="control-label"><span class="red">*</span> Correo electrónico:</label>
											    <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="ejemplo@dominio.com" value="<?php echo (isset($paciente['email']))? $paciente['email'] : set_value('email'); ?>" required="required" readonly="readonly">
										   	  	<div class="help-block with-errors">
										      	</div>
											</div><!--/ Campo 'Correo electrónico' -->
										</div><!--/ Columna -->
									</div>
								</div><!--/ Fila -->

								<!-- Fila -->
								<div class="col-sm-12">
									<div class="row">

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Teléfono personal' -->
											<div class="form-group">
												<label for="telf_personal" class="control-label"><span class="red">*</span> Teléfono personal:</label>
											    <input type="text" class="form-control" name="telf_personal" id="telf_personal" placeholder="(0212) 555-44-88" value="<?php echo (isset($paciente['telf_personal']))? $paciente['telf_personal'] : set_value('telf_personal'); ?>" required="required" readonly="readonly">
											    <div class="help-block with-errors">
											    </div>
											</div><!--/ Campo 'Teléfono personal' -->
										</div><!--/ Columna -->

										<!-- Columna -->
										<div class="col-sm-6">
										<!-- Campo 'Teléfono emergencia' -->
											<div class="form-group">
												<label for="telf_emergencia" class="control-label"><span class="red">*</span> Teléfono emergencia:</label>
											    <input type="text" class="form-control" name="telf_emergencia" id="telf_emergencia" placeholder="(0212) 555-44-88" value="<?php echo (isset($paciente['telf_emergencia']))? $paciente['telf_emergencia'] : set_value('telf_emergencia'); ?>" readonly="readonly" >
											    <div class="help-block with-errors">
											    </div>
											</div><!--/ Campo 'Teléfono emergencia' -->
										</div><!--/ Columna -->
									</div>
								</div><!--/ Fila -->

								<!-- Fila -->
								<div class="col-sm-12">
									<div class="row">

										<!-- Columna -->
										<div class="col-sm-6">
										<!-- Campo 'Sexo' -->
											<div class="form-group">
												<label for="sexo" class="control-label"><span class="red">*</span> Sexo:</label>
												<label class="radio-inline">
												  	<input type="radio" name="sexo" id="sexo1" value="f" <?php echo  (isset($paciente['sexo']) && $paciente['sexo'] == 'f')? "checked=\"checked\"" : set_radio('sexo', 'f'); ?> required="required" readonly="readonly"> Mujer
												</label>
												<label class="radio-inline">
												  	<input type="radio" name="sexo" id="sexo2" value="m" <?php echo (isset($paciente['sexo']) && $paciente['sexo'] == 'm')? "checked=\"checked\"" : set_radio('sexo', 'm'); ?> required="required" readonly="readonly"> Hombre
												</label>
												<div class="help-block with-errors">
										      	</div>
											</div><!--/ Campo 'Sexo' -->
										</div><!--/ Columna -->

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Dirección de habitación' -->
											<div class="form-group">
												<label for="direccion" class="control-label"><span class="red">*</span> Dirección de Habitación:</label>
											    <textarea class="form-control" name="direccion" id="direccion" required="required" readonly="readonly"><?php echo  (isset($paciente['direccion']))? trim($paciente['direccion']) : trim(set_value('direccion')); ?></textarea>
											    <div class="help-block with-errors">
											    </div>								    
											</div><!--/ Campo 'Dirección de habitación' -->
										</div><!--/ Columna -->
									</div>
								</div><!--/ Fila -->	

								<!-- Línea divisoria -->
								<hr class="form-divisor-line">
								<!--/ Línea divisoria -->

								<!-- Fila -->
								<div class="col-sm-12">
									<div class="row">

										<!-- Columna -->
										<div class="col-sm-6">
										<!-- Campo 'Lugar de nacimiento' -->
											<div class="form-group">
												<label for="lugar_nacimiento" class="control-label"><span class="red">*</span> Lugar de nacimiento:</label>
										      	<textarea class="form-control" name="lugar_nacimiento" id="lugar_nacimiento" required="required" readonly="readonly"><?php echo  (isset($paciente['lugar_nacimiento']))? trim($paciente['lugar_nacimiento']) : trim(set_value('lugar_nacimiento')); ?></textarea>
										      	<div class="help-block with-errors">
										      	</div>								    
											</div><!--/ Campo 'Lugar de nacimiento' -->
										</div><!--/ Columna -->

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Tipo de paciente' -->
											<div class="form-group">
												<label for="tipo_paciente" class="control-label"><span class="red">*</span> Tipo de paciente:</label>
												<select class="form-control" id="tipo_paciente" name="tipo_paciente" data-placeholder="Seleccione una opción..." required="required" readonly="readonly" >
													<option></option>
													<option value="Estudiante" <?php echo (isset($paciente['tipo_paciente']) && $paciente['tipo_paciente'] == 'Estudiante')? "selected=\"selected\"" : set_select('tipo_paciente', 'Estudiante'); ?> >Estudiante</option>
													<option value="Docente" <?php echo (isset($paciente['tipo_paciente']) && $paciente['tipo_paciente'] == 'Docente')? "selected=\"selected\"" : set_select('tipo_paciente', 'Docente'); ?> >Docente</option>
													<option value="Administrativo" <?php echo (isset($paciente['tipo_paciente']) && $paciente['tipo_paciente'] == 'Administrativo')? "selected=\"selected\"" : set_select('tipo_paciente', 'Administrativo'); ?> >Administrativo</option>
													<option value="Obrero" <?php echo (isset($paciente['tipo_paciente']) && $paciente['tipo_paciente'] == 'Obrero')? "selected=\"selected\"" : set_select('tipo_paciente', 'Obrero'); ?> >Obrero</option>
													<option value="Cortesía" <?php echo (isset($paciente['tipo_paciente']) && $paciente['tipo_paciente'] == 'Cortesía')? "selected=\"selected\"" : set_select('tipo_paciente', 'Cortesía'); ?> >Cortesía</option>											
												</select>
												<div class="help-block with-errors">
										      	</div>
											</div><!--/ Campo 'Tipo de paciente' -->
										</div><!--/ Columna -->
									</div>
								</div><!--/ Fila -->

								<!-- Fila -->
								<div class="col-sm-12">
									<div class="row">

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Departamento' -->
											<div class="form-group">
												<label for="grado" class="control-label"><span class="red">*</span> Departamento:</label>
												<select class="form-control" id="departamento" name="departamento" data-placeholder="Seleccione un departamento..." readonly="readonly" >
													<option></option>
													<option value="Administracion" <?php echo (isset($paciente['departamento']) && $paciente['departamento'] == 'Administracion')? "selected=\"selected\"" : set_select('departamento', 'Administracion'); ?>>Administración</option>
													<option value="Electricidad" <?php echo (isset($paciente['departamento']) && $paciente['departamento'] == 'Electricidad')? "selected=\"selected\"" : set_select('departamento', 'Electricidad'); ?>>Electricidad</option>
													<option value="Informática" <?php echo (isset($paciente['departamento']) && $paciente['departamento'] == 'Informática')? "selected=\"selected\"" : set_select('departamento', 'Informática'); ?>>Informática</option>
													<option value="Mecánica" <?php echo (isset($paciente['departamento']) && $paciente['departamento'] == 'Mecánica')? "selected=\"selected\"" : set_select('departamento', 'Mecánica'); ?>>Mecánica</option>
													<option value="Química" <?php echo (isset($paciente['departamento']) && $paciente['departamento'] == 'Química')? "selected=\"selected\"" : set_select('departamento', 'Química'); ?>>Química</option>
												</select>
												<div class="help-block with-errors">
										      	</div>
											</div><!--/ Campo 'Departamento' -->
										</div><!--/ Columna -->

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Trayecto' -->
											<div class="form-group">
												<label for="trayecto" class="control-label">Trayecto:</label>
											    <input type="text" class="form-control" id="trayecto" name="trayecto" pattern="[0-9A-Za-zñÑáéíóúüÁÉÍÓÚÜ ]{2,30}" title="El trayecto sólo puede tener caracteres alfanuméricos" minlength="2" maxlength="30" value="<?php echo (isset($paciente['trayecto']))? $paciente['trayecto'] : set_value('trayecto'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfanuméricos" readonly="readonly">
											    <div class="help-block with-errors">
											    </div>
											</div><!--/ Campo 'Trayecto' -->
										</div><!--/ Columna -->
									</div>
								</div><!--/ Fila -->

								<!-- Fila -->
								<div class="col-sm-12">
									<div class="row">

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'PNF' -->
											<div class="form-group">
												<label for="pnf" class="control-label">PNF:</label>
										      	<input type="text" class="form-control" id="pnf" name="pnf" pattern="[0-9A-Za-zñÑáéíóúüÁÉÍÓÚÜ ]{3,30}" title="El pnf sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['pnf']))? $paciente['pnf'] : set_value('pnf'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos" readonly="readonly">
										      	<div class="help-block with-errors">
										      	</div>
											</div><!--/ Campo 'PNF' -->
										</div><!--/ Columna -->

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Tipo de sangre' -->
											<div class="form-group">
												<label for="tipo_sangre" class="control-label"><span class="red">*</span> Tipo de sangre:</label>
												<input type="text" name="tipo_sangre" class="form-control" id="tipo_sangre" minlength="6" maxlength="6" title="Debe seguir el formato 'O RH +' o 'ABRH -'" value="<?php echo set_value('tipo_sangre'); ?>" required="required" readonly="readonly">
												<div class="help-block with-errors">
										      	</div> 
											</div><!--/ Campo 'Tipo de sangre' -->
										</div><!--/ Columna -->
									</div>
								</div><!--/ Fila -->

								<!-- Línea divisoria -->
								<hr class="form-divisor-line">
								<!--/ Línea divisoria -->

								<!-- Fila -->
								<div class="col-sm-12">
									<div class="row">

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Antescedemtes personales' -->
											<div class="form-group">
												<label for="antecedentes_personales" class="control-label"><span class="red">*</span> Antecedentes personales:</label>
											    <textarea class="form-control" name="antecedentes_personales" id="antecedentes_personales" required="required" readonly="readonly"><?php echo  (isset($paciente['antecedentes_personales']))? trim($paciente['antecedentes_personales']) : trim(set_value('antecedentes_personales')); ?></textarea>
											    <div class="help-block with-errors">
											    </div>
											</div><!--/ Campo 'Antescedemtes personales' -->
										</div><!--/ Columna -->

										<!-- Columna -->
										<div class="col-sm-6">
											<!-- Campo 'Antescedemtes familiares' -->
											<div class="form-group">
												<label for="antecedentes_familiares" class="control-label"><span class="red">*</span>Antecedentes familiares:</label>
										      	<textarea class="form-control" name="antecedentes_familiares" id="antecedentes_familiares" required="required" readonly="readonly"><?php echo  (isset($paciente['antecedentes_familiares']))? trim($paciente['antecedentes_familiares']) : trim(set_value('antecedentes_familiares')); ?></textarea>
										      	<div class="help-block with-errors">
										      	</div>
											</div><!--/ Campo 'Antescedemtes familiares' -->
										</div><!--/ Columna -->
									</div>
								</div><!--/ Fila -->

								<!-- Línea divisoria -->
								<hr class="form-divisor-line">
								<!--/ Línea divisoria -->	
								
							<?php echo form_close(); ?>		
						</div><!--/ Formulario -->
	        		</div>	        		
	        	</div>
	        	<div class="box-footer">	        		
					<a href="<?php echo base_url(); ?>HistoriaClinica/ListarHistorias" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="registro-paciente" class="btn btn-success pull-right">Guardar</button>
		        </div>
	        </div>
	    </div>
		
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-paciente.js"></script>

