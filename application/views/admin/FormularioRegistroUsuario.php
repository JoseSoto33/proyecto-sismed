<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1><?= $titulo; ?></h1>
			</div>
			<div class="col-xs-12">
				<?= validation_errors("<div class=\"alert alert-danger\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>", "</div>"); ?>
				<?php if(isset($mensaje) && !empty($mensaje)) { ?>
					<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?= $mensaje; ?>
					</div>					
				<?php } ?>
			</div>		
			
			<div class="col-sm-12">
				<!--<form id="registro-usuario" class="form-horizontal form-basic" action="<?php echo base_url(); ?>Usuario/AgregarUsuario">-->
				<?php
					$url =  base_url()."Usuario/".$this->uri->segment(2, 0);
					if ($this->uri->segment(3, 0) != "0") {
						$url .= "/".$this->uri->segment(3, 0);
					}
					echo form_open(
	      				$url,
	      				'class="form-horizontal form-basic" id="registro-usuario"'
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
					<div class="col-sm-12">	
						<div class="row">
							<div class="col-sm-6">				
								<div class="form-group">
									<label for="cedula" class="col-sm-4 control-label"><span class="red">*</span> Cédula:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="cedula" name="cedula" minlength="6" maxlength="8" pattern="[0-9]{6,8}" value="<?php echo (isset($usuario['cedula']))? $usuario['cedula'] : set_value('cedula'); ?>" required="required" title="Sólo números de 6 a 8 dígitos" placeholder="Sólo números de 6 a 8 dígitos" data-pattern-error="La cédula solo debe contener números de 6 a 8 dígitos"> 
								      	<div class="help-block with-errors">
								      	</div>
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nombre1" class="col-sm-4 control-label"><span class="red">*</span> Primer nombre:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="nombre1" name="nombre1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($usuario['nombre1']))? $usuario['nombre1'] : set_value('nombre1'); ?>" required="required" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos"> 
								      	<div class="help-block with-errors">
								      	</div>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nombre2" class="col-sm-4 control-label">Segundo nombre:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="nombre2" name="nombre2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($usuario['nombre2']))? $usuario['nombre2'] : set_value('nombre2'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
								      <div class="help-block with-errors">
								      </div>	
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">		
							<div class="col-sm-6">
								<div class="form-group">
									<label for="apellido1" class="col-sm-4 control-label"><span class="red">*</span> Primer apellido:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="apellido1" name="apellido1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($usuario['apellido1']))? $usuario['apellido1'] : set_value('apellido1'); ?>" required="required" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
								      <div class="help-block with-errors"></div>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="apellido2" class="col-sm-4 control-label">Segundo apellido:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="apellido2" name="apellido2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($usuario['apellido2']))? $usuario['apellido2'] : set_value('apellido2'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="fecha_nacimiento" class="col-sm-4 control-label"><span class="red">*</span> Fecha de nacimiento:</label>
								    <div class="col-sm-8">
								      <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" max="<?php echo date('Y-m-d');?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo (isset($usuario['fecha_nacimiento']))? $usuario['fecha_nacimiento'] : set_value('fecha_nacimiento'); ?>" required="required" data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)">
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="email" class="col-sm-4 control-label"><span class="red">*</span> Correo electrónico:</label>
								    <div class="col-sm-8">
								      <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="ejemplo@dominio.com" value="<?php echo (isset($usuario['email']))? $usuario['email'] : set_value('email'); ?>" required="required">
								   	  <div class="help-block with-errors">
								      </div>
								    </div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="telef_personal" class="col-sm-4 control-label"><span class="red">*</span> Teléfono personal:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" name="telef_personal" id="telef_personal" placeholder="(0212) 555-44-88" value="<?php echo (isset($usuario['telf_personal']))? $usuario['telf_personal'] : set_value('telef_personal'); ?>" required="required">
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>							
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="telef_emergencia" class="col-sm-4 control-label"><span class="red">*</span> Teléfono emergencia:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" name="telef_emergencia" id="telef_emergencia" placeholder="(0212) 555-44-88" value="<?php echo (isset($usuario['telf_emergencia']))? $usuario['telf_emergencia'] : set_value('telef_emergencia'); ?>" >
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>							
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="sexo" class="col-sm-4 control-label"><span class="red">*</span> Sexo:</label>
									<div class="col-sm-8">								
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
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tdireccion" class="col-sm-4 control-label"><span class="red">*</span> Dirección de Habitación:</label>
								    <div class="col-sm-8">
								      <textarea class="form-control" name="direccion" id="direccion" required="required"><?php echo  (isset($usuario['direccion']))? trim($usuario['direccion']) : trim(set_value('direccion')); ?></textarea>
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<h2>Datos de usuario</h2>
					</div>
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="username" class="col-sm-4 control-label"><span class="red">*</span> Username:</label>
									<div class="col-sm-8">								
										<input type="text" class="form-control" id="username" name="username" placeholder="Ingrese un nombre de usuario" minlength="8" maxlength="16" pattern="([A-Za-zñÑáéíóúüÁÉÍÓÚÜ0-9]){8,16}" data-pattern-error="Sólo carácteres alfanuméricos de 8 a 16 dígitos" value="<?php echo (isset($usuario['username']))? $usuario['username'] : set_value('username'); ?>" required="required">
										<div class="help-block with-errors">
								     	</div>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="especialidad" class="col-sm-4 control-label"><span class="red">*</span> Especialidad:</label>
									<div class="col-sm-8">								
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
								</div>						
							</div>
						</div>
					</div>
					<!--
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="password1" class="col-sm-4 control-label">Contraseña</label>
									<div class="col-sm-8">								
										<input type="password" name="password" class="form-control" id="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" value="<?php echo set_value('password'); ?>" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres">
										<div class="help-block with-errors">
								      	</div> 
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="password2" class="col-sm-4 control-label">Confirmar contraseña</label>
									<div class="col-sm-8">								
										<input type="password" class="form-control" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" data-match="#password1" data-match-error="Las contraseñas no coinciden" placeholder="Confirmar" value="<?php echo set_value('password2'); ?>" required="required">
										<div class="help-block with-errors">
								        </div>
									</div>
								</div>						
							</div>
						</div>
					</div>-->
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tipo-usuario" class="col-sm-4 control-label"><span class="red">*</span> Tipo de usuario:</label>
									<div class="col-sm-8">								
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
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="grado" class="col-sm-4 control-label"><span class="red">*</span> Grado de instrucción:</label>
									<div class="col-sm-8">								
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
								</div>						
							</div>
						</div>
					</div>
					<hr class="form-divisor-line">					
					<div class="col-sm-12">
						<div class="col-sm-4 col-sm-offset-4">
							<button id="guardar" type="submit" class="btn btn-form btn-lg btn-block">Guardar</button>
							<a href="<?php echo base_url(); ?>Usuario/ListarUsuarios" class="btn btn-second-2 btn-lg btn-block">Cancelar</a>
						</div>						
					</div>
				<?= form_close(); ?>
				<!--</form>-->			
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-usuario.js"></script>

<?php include('footer.php') ?>