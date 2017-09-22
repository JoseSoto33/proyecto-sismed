<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Agregar usuario
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Usuarios</li>
    <li class="active">Agregar usuario</li>
  </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
	<div class="row">		
		<div class="col-xs-12 col-sm-4">
			<div class="box box-solid box-primary">
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
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales.</li>
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
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales.</li>
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
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Dirección de Habitación -->

								  	<!-- Descripción campo Imagen -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading12">
									      	<h4 class="panel-title">
									      		Imagen
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Archivo de tipo imagen.</li>
									      			<li><b>Fromatos permitidos:</b> JPG, PNG y GIF.</li>
									      			<li><b>Campo opcional.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Imagen -->

								  	<!-- Descripción campo Username -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading13">
									      	<h4 class="panel-title">
									      		Username
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="false" aria-controls="collapse13">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 8 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 16 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Username -->

								  	<!-- Descripción campo Especialidad -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading14">
									      	<h4 class="panel-title">
									      		Especialidad
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
									      	<div class="panel-body">
									      		<ul>							      			
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Especialidad -->

								  	<!-- Descripción campo Tipo de usuario -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading15">
									      	<h4 class="panel-title">
									      		Tipo de usuario
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="false" aria-controls="collapse15">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
									      	<div class="panel-body">
									      		<ul>							      			
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Tipo de usuario -->

								  	<!-- Descripción campo Grado de instrucción -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading16">
									      	<h4 class="panel-title">
									      		Grado de instrucción
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse16" aria-expanded="false" aria-controls="collapse16">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading16">
									      	<div class="panel-body">
									      		<ul>							      			
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Grado de instrucción -->

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
			<div class="box box-primary">
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
						</div>
						<div class="col-xs-12">
							<?php
								$url =  base_url()."Usuario/".$this->uri->segment(2, 0);
								if ($this->uri->segment(3, 0) != "0") {
									$url .= "/".$this->uri->segment(3, 0);
								}
								echo form_open_multipart(
				      				$url,
				      				'id="registro-usuario"'
				      				); ?>
								<div class="col-sm-12">
									<h2>
										Datos personales
										<small class="pull-right"> 
				    						<span class="red2">Los campos con (*) son obligatorios.</span>
				    					</small>
									</h2>
								</div>
								<hr class="form-divisor-line">

								<!-- Campo Cédula -->
								<div class="col-sm-12">	
									<div class="row">
										<div class="col-sm-6">				
											<div class="form-group">
												<label for="cedula" class="control-label"><span class="red">*</span> Cédula:</label>
										      	<input type="text" class="form-control" id="cedula" name="cedula" minlength="6" maxlength="8" pattern="[0-9]{6,8}" value="<?php echo (isset($usuario['cedula']))? $usuario['cedula'] : set_value('cedula'); ?>" required="required" title="Sólo números de 6 a 8 dígitos" placeholder="Sólo números de 6 a 8 dígitos" data-pattern-error="La cédula solo debe contener números de 6 a 8 dígitos"> 
										      	<div class="help-block with-errors">
										      	</div>
											</div>
										</div>
									</div>
								</div><!--/ Campo Cédula -->

								<div class="col-sm-12">
									<div class="row">
										<!-- Campo Primer nombre -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="nombre1" class="control-label"><span class="red">*</span> Primer nombre:</label>
											    <input type="text" class="form-control" id="nombre1" name="nombre1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($usuario['nombre1']))? $usuario['nombre1'] : set_value('nombre1'); ?>" required="required" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos"> 
											    <div class="help-block with-errors">
											    </div>
											</div>						
										</div><!--/ Campo Primer nombre -->

										<!-- Campo Segundo nombre -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="nombre2" class="control-label">Segundo nombre:</label>
										    	<input type="text" class="form-control" id="nombre2" name="nombre2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($usuario['nombre2']))? $usuario['nombre2'] : set_value('nombre2'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
										        <div class="help-block with-errors">
										      	</div>	
										    </div>
										</div><!--/ Campo Segundo nombre -->
									</div>
								</div>
								<div class="col-sm-12">
									<div class="row">
										<!-- Campo Primer apellido -->		
										<div class="col-sm-6">
											<div class="form-group">
												<label for="apellido1" class="control-label"><span class="red">*</span> Primer apellido:</label>
											    <input type="text" class="form-control" id="apellido1" name="apellido1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($usuario['apellido1']))? $usuario['apellido1'] : set_value('apellido1'); ?>" required="required" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
											    <div class="help-block with-errors"></div>
											</div>						
										</div><!--/ Campo Primer apellido -->

										<!-- Campo Segundo apellido -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="apellido2" class="control-label">Segundo apellido:</label>
											    <input type="text" class="form-control" id="apellido2" name="apellido2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($usuario['apellido2']))? $usuario['apellido2'] : set_value('apellido2'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
											    <div class="help-block with-errors">
											    </div>
											</div>
										</div><!--/ Campo Segundo apellido -->
									</div>
								</div>
								<div class="col-sm-12">
									<div class="row">

										<!-- Campo Fecha de nacimiento -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="fecha_nacimiento" class="control-label"><span class="red">*</span> Fecha de nacimiento:</label>
											    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" max="<?php echo date('Y-m-d');?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo (isset($usuario['fecha_nacimiento']))? $usuario['fecha_nacimiento'] : set_value('fecha_nacimiento'); ?>" required="required" data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)">
											    <div class="help-block with-errors">
											    </div>
											</div>						
										</div><!--/ Campo Fecha de nacimiento -->

										<!-- Campo Correo electrónico -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="email" class="control-label"><span class="red">*</span> Correo electrónico:</label>
											    <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="ejemplo@dominio.com" value="<?php echo (isset($usuario['email']))? $usuario['email'] : set_value('email'); ?>" required="required">
											   	<div class="help-block with-errors">
											    </div>
											</div>						
										</div><!--/ Campo Correo electrónico -->
									</div>
								</div>
								<div class="col-sm-12">
									<div class="row">

										<!-- Campo Teléfono personal -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="telef_personal" class="control-label"><span class="red">*</span> Teléfono personal:</label>
											    <input type="text" class="form-control" name="telef_personal" id="telef_personal" placeholder="(0212) 555-44-88" value="<?php echo (isset($usuario['telf_personal']))? $usuario['telf_personal'] : set_value('telef_personal'); ?>" required="required">
											    <div class="help-block with-errors">
											    </div>
											</div>							
										</div><!--/ Campo Teléfono personal -->

										<!-- Campo Teléfono emergencia -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="telef_emergencia" class="control-label"><span class="red">*</span> Teléfono emergencia:</label>
											    <input type="text" class="form-control" name="telef_emergencia" id="telef_emergencia" placeholder="(0212) 555-44-88" value="<?php echo (isset($usuario['telf_emergencia']))? $usuario['telf_emergencia'] : set_value('telef_emergencia'); ?>" >
											    <div class="help-block with-errors">
											    </div>
											</div>							
										</div><!--/ Campo Teléfono emergencia -->
									</div>
								</div>
								<div class="col-sm-12">
									<div class="row">

										<!-- Campo Sexo -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="sexo" class="control-label"><span class="red">*</span> Sexo:</label>
												<div class="col-sm-12">								
													<label class="radio-inline">
													  	<input type="radio" name="sexo" id="sexo1" value="f" <?php echo  (isset($usuario['sexo']) && $usuario['sexo'] == 'f')? "checked=\"checked\"" : set_radio('sexo', 'f'); ?> required="required"> Mujer
													</label>
													<label class="radio-inline">
													  	<input type="radio" name="sexo" id="sexo2" value="m" <?php echo (isset($usuario['sexo']) && $usuario['sexo'] == 'm')? "checked=\"checked\"" : set_radio('sexo', 'm'); ?> required="required"> Hombre
													</label>
													<div class="help-block with-errors">
											      	</div>
												</div>
											</div>						
										</div><!--/ Campo Sexo -->

										<!-- Campo Dirección de Habitación -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="tdireccion" class="control-label"><span class="red">*</span> Dirección de Habitación:</label>
											    <textarea class="form-control" name="direccion" id="direccion" required="required"><?php echo  (isset($usuario['direccion']))? trim($usuario['direccion']) : trim(set_value('direccion')); ?></textarea>
											    <div class="help-block with-errors">
											    </div>
											</div>						
										</div><!--/ Campo Dirección de Habitación -->
									</div>
								</div>
								<div class="col-sm-12">
									<h2>Datos de usuario</h2>
								</div>
								<hr class="form-divisor-line">
								<div class="col-sm-12">
									<div class="row">
										<!-- Campo Imagen -->
										<?php 
											if (isset($usuario)) {
										?>
										<div class="col-xs-6" id="imagen-content">
											<?php 
												if (isset($usuario['img']) && ($usuario['img']) != null || $usuario['img'] != "") { 
													$ruta = base_url()."assets/img/usuarios/";

									            	switch ($usuario["especialidad"]) {
									            		case 'Administrador':
									            			$ruta .= "admin/";
									            			break;  

									            		case 'Medicina':
									            			$ruta .= "med/";
									            			break; 

									            		case 'Odontología':
									            			$ruta .= "odon/";
									            			break; 

									            		case 'Laboratorio':
									            			$ruta .= "lab/";
									            			break; 

									            		case 'Nutrición':
									            			$ruta .= "nut/";
									            			break; 
									            	}
									            	$ruta .= $usuario["img"];
											?>
											<div class="form-group">
												<div class="col-xs-12 col-sm-8 col-sm-offset-4">
													<figure>
														<img src="<?php echo $ruta; ?>" alt="<?php echo $usuario['img']; ?>">
													</figure>
												</div>
											</div>
											<?php }else{ ?>
											<h4 class="text-right">No ha cargado una imagen para este usuario...</h4>
											<?php } ?>
											<div class="form-group">
												<div class="col-xs-12 col-sm-8 col-sm-offset-4">
													<div class="checkbox">
													    <label>
													        <input type="checkbox" name="img-change" id="img-change" value="1"> Editar imagen de perfil
													    </label>
							    					</div>
							    				</div>
					    					</div>
											<div class="form-group hidden" id="input-imagen">
												<label for="imagen" class="control-label">Imagen:</label>
												<input name="imagen" id="imagen" class="form-control" type="file" accept="image/*" >
											</div>
										</div>
										<?php 
											}else{
										?>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="imagen" class="control-label">Imagen:</label>
												<input name="imagen" id="imagen" class="form-control" type="file" accept="image/*">
											</div>
										</div>
										<?php 
											}
										?>
										<!--/ Campo Imagen -->
									</div>
									<div class="row">

										<!-- Campo Username -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="username" class="control-label"><span class="red">*</span> Username:</label>
												<input type="text" class="form-control" id="username" name="username" placeholder="Ingrese un nombre de usuario" minlength="8" maxlength="16" pattern="([A-Za-zñÑáéíóúüÁÉÍÓÚÜ0-9]){8,16}" data-pattern-error="Sólo carácteres alfanuméricos de 8 a 16 dígitos" value="<?php echo (isset($usuario['username']))? $usuario['username'] : set_value('username'); ?>" required="required">
												<div class="help-block with-errors">
										     	</div>
											</div>						
										</div><!--/ Campo Username -->

										<!-- Campo Especialidad -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="especialidad" class="control-label"><span class="red">*</span> Especialidad:</label>								
												<select class="form-control" id="especialidad" name="especialidad" data-placeholder="Seleccione una especialidad..." required="required">
													<option></option>
													<option value="Administrador" <?php echo (isset($usuario['especialidad']) && $usuario['especialidad'] == 'Administrador')? "selected=\"selected\"" : set_select('especialidad', 'Administrador'); ?>>Administrador</option>
													<option value="Medicina" <?php echo (isset($usuario['especialidad']) && $usuario['especialidad'] == 'Medicina')? "selected=\"selected\"" : set_select('especialidad', 'Medicina'); ?>>Medicina</option>
													<option value="Odontología" <?php echo (isset($usuario['especialidad']) && $usuario['especialidad'] == 'Odontología')? "selected=\"selected\"" : set_select('especialidad', 'Odontología'); ?>>Odontología</option>
													<option value="Laboratorio" <?php echo (isset($usuario['especialidad']) && $usuario['especialidad'] == 'Laboratorio')? "selected=\"selected\"" : set_select('especialidad', 'Laboratorio'); ?>>Laboratorio</option>
													<option value="Nutrición" <?php echo (isset($usuario['especialidad']) && $usuario['especialidad'] == 'Nutrición')? "selected=\"selected\"" : set_select('especialidad', 'Nutrición'); ?>>Nutrición</option>
												</select>
												<div class="help-block with-errors">
										      	</div>
											</div>						
										</div><!--/ Campo Especialidad -->
									</div>
								</div>					
								<div class="col-sm-12">
									<div class="row">

										<!-- Campo Tipo de usuario -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="tipo-usuario" class="control-label"><span class="red">*</span> Tipo de usuario:</label>								
												<select class="form-control" id="tipo_usuario" name="tipo_usuario" data-placeholder="Seleccione una opción..." required="required" >
													<option></option>
													<option value="Administrador" <?php echo (isset($usuario['tipo_usuario']) && $usuario['tipo_usuario'] == 'Administrador')? "selected=\"selected\"" : set_select('tipo_usuario', 'Administrador'); ?> >Administrador</option>
													<option value="Doctor" <?php echo (isset($usuario['tipo_usuario']) && $usuario['tipo_usuario'] == 'Doctor')? "selected=\"selected\"" : set_select('tipo_usuario', 'Doctor'); ?> >Doctor</option>
													<option value="Enfermero" <?php echo (isset($usuario['tipo_usuario']) && $usuario['tipo_usuario'] == 'Enfermero')? "selected=\"selected\"" : set_select('tipo_usuario', 'Enfermero'); ?> >Enfermero</option>
													<option value="Odontólogo" <?php echo (isset($usuario['tipo_usuario']) && $usuario['tipo_usuario'] == 'Odontólogo')? "selected=\"selected\"" : set_select('tipo_usuario', 'Odontólogo'); ?> >Odontólogo</option>
													<option value="Bioanalista" <?php echo (isset($usuario['tipo_usuario']) && $usuario['tipo_usuario'] == 'Bioanalista')? "selected=\"selected\"" : set_select('tipo_usuario', 'Bioanalista'); ?> >Bioanalista</option>
													<option value="Nutricionista" <?php echo (isset($usuario['tipo_usuario']) && $usuario['tipo_usuario'] == 'Nutricionista')? "selected=\"selected\"" : set_select('tipo_usuario', 'Nutricionista'); ?> >Nutricionista</option>
													<option value="Asistente" <?php echo (isset($usuario['tipo_usuario']) && $usuario['tipo_usuario'] == 'Asistente')? "selected=\"selected\"" : set_select('tipo_usuario', 'Asistente'); ?> >Asistente</option>
												</select>
												<div class="help-block with-errors">
										      	</div>
											</div>						
										</div><!--/ Campo Tipo de usuario -->

										<!-- Campo Grado de instrucción -->
										<div class="col-sm-6">
											<div class="form-group">
												<label for="grado" class="control-label"><span class="red">*</span> Grado de instrucción:</label>							
												<select class="form-control" id="grado_instruccion" name="grado_instruccion" data-placeholder="Seleccione un título..." required="required">
													<option></option>
													<option value="Bachillerato" <?php echo (isset($usuario['grado_instruccion']) && $usuario['grado_instruccion'] == 'Bachillerato')? "selected=\"selected\"" : set_select('grado_instruccion', 'Bachillerato'); ?>>Bachillerato</option>
													<option value="TSU" <?php echo (isset($usuario['grado_instruccion']) && $usuario['grado_instruccion'] == 'TSU')? "selected=\"selected\"" : set_select('grado_instruccion', 'TSU'); ?>>TSU</option>
													<option value="Ingeniería" <?php echo (isset($usuario['grado_instruccion']) && $usuario['grado_instruccion'] == 'Ingeniería')? "selected=\"selected\"" : set_select('grado_instruccion', 'Ingeniería'); ?>>Ingeniería</option>
													<option value="Licenciatura" <?php echo (isset($usuario['grado_instruccion']) && $usuario['grado_instruccion'] == 'Licenciatura')? "selected=\"selected\"" : set_select('grado_instruccion', 'Licenciatura'); ?>>Licenciatura</option>
													<option value="Doctorado" <?php echo (isset($usuario['grado_instruccion']) && $usuario['grado_instruccion'] == 'Doctorado')? "selected=\"selected\"" : set_select('grado_instruccion', 'Doctorado'); ?>>Doctorado</option>
												</select>
												<div class="help-block with-errors">
										      	</div>
											</div>						
										</div><!--/ Campo Grado de instrucción -->
									</div>
								</div>

							<?php echo form_close(); ?>
						</div>
	        		</div>	        		
	        	</div>
	        	<div class="box-footer">
	        		<?php if (isset($usuario["id"]) && $this->session->userdata('idUsuario') == $usuario["id"]) { ?>
					<a href="<?php echo base_url(); ?>Usuario/PerfilUsuario" class="btn btn-default">Cancelar</a>
					<?php }else{ ?>	
					<a href="<?php echo base_url(); ?>Usuario/ListarUsuarios" class="btn btn-default">Cancelar</a>
					<?php } ?>
		        	<button id="guardar" type="submit" form="registro-usuario" class="btn btn-success pull-right">Guardar</button>
		        </div>
	        </div>
	    </div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-usuario.js"></script>