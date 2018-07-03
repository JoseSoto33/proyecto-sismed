<?php include('header.php'); ?>
<div id="portada">
	<!-- Fondo opaco -->
	<div class="fondo-opaco">
		<!-- Contenedor -->		
		<div class="container">
			<!-- Área de mensajes del sistema -->
			<div class="col-xs-12">
				<br>
				<?php echo validation_errors("<div class=\"alert alert-danger\" role=\"alert\">", "</div>"); ?>	
				<?php if(isset($mensaje) && !empty($mensaje)) { ?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $mensaje; ?>
					</div>					
				<?php } ?>

				<?php if(get_cookie("message") != null) { ?>
					<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $_COOKIE("message"); delete_cookie('message'); ?>
					</div>					
				<?php } ?>

				<?php if(get_cookie("message2") != null) { ?>
					<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $_COOKIE["message2"]; delete_cookie('message2'); ?>
					</div>					
				<?php } ?>
			</div><!--/ Área de mensajes del sistema -->
		</div><!--/ Contenedor -->

		<!-- Caja del formulario de login -->
		<div class="login-box">
			<!-- Título del formulario -->
			<div class="login-logo">
				<a href="<?php echo base_url(); ?>">
					<b>IUT</b>Sismed
				</a>
			</div><!--/ Título del formulario -->
			<!-- Cuerpo para el formulario -->
			<div class="login-box-body">
				<p class="login-box-msg">Ingresar para iniciar tu sesión</p>
				<!-- Formulario -->
				<?php echo form_open(
					base_url(), 
					'id="form-login"'
					); ?>
					<div class="form-group has-feedback">
			          	<input type="text" class="form-control" name="log_cedula" placeholder="Cédula" minlength="6" maxlength="8" pattern="[0-9]{6,8}" value="<?php echo set_value('log_cedula'); ?>" required="required" title="Sólo números de 6 a 8 dígitos" data-pattern-error="La cédula solo debe contener números de 6 a 8 dígitos"> 
			          	<span class="fa fa-id-card form-control-feedback"></span>
						<div class="help-block with-errors"></div>
			        </div>
			        <div class="form-group has-feedback">
			          	<input type="password" class="form-control" name="log_password" placeholder="Contraseña" minlength="8" maxlength="16" value="<?php echo set_value('log_password'); ?>" required="required">
			          	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			          	<div class="help-block with-errors"></div>
			        </div>
			        <button type="submit" class="btn btn-primary">Iniciar sessión</button>
			    <?php echo form_close(); ?>
			    <!--/ Formulario -->

			    <?php if($existe_usuario === false){ ?>
			    <div class="col-xs-12 text-center">
			    	<p>- Ó -</p>
			    </div>
			    <a href="#" data-toggle="modal" data-target="#myModal">Registrar un nuevo administrador</a>
			    <?php } ?>

			</div><!--/ Cuerpo para el formulario -->
		</div><!--/ Caja del formulario de login -->
	</div>
</div><!--/ Fondo opaco -->

<?php 
	if($existe_usuario === false){ 
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Registro de Usuario</h4>
	      	</div>
	      	<div class="modal-body">	      		
	      		
	      		<?= form_open(
	      				base_url()."Usuario/AgregarUsuario",
	      				'id="form-admin"',
	      				array(
	      					"ajax" => "1",
	      					"especialidad" => "Administrador",
	      					"tipo_usuario" => "Administrador",
	      					"origen" => "login"
	      					)
	      				); ?>
	      			<div class="row">
						<div class="col-sm-12">
							<h3>
								Datos personales
								<small class="pull-right"> 
		    						<span class="red2">Los campos con (*) son obligatorios.</span>
		    					</small>
								<figure class="load-content">
				        			<img src="<?php echo base_url();?>assets/img/loading_spinner.gif" class="loading form-loading">
				        		</figure>
							</h3>
						</div>
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
							</div><!--/ Campo Cédula -->
						
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
						
							<div class="row">								
								<hr class="form-divisor-line">
								<div class="col-sm-12">
									<h4>Datos de usuario</h4>
								</div>
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
					</div>		
				<?= form_close(); ?>
	      	</div>
	      	<div class="modal-footer">
				<button type="submit" class="btn btn-success" form="form-admin">Guardar</button>				
	        	<button type="reset" class="btn btn-danger close1" form="form-admin" data-dismiss="modal">Cancelar</button>
	      	</div>
	    </div>
  	</div>
</div><!--/ Modal -->
<?php }
	include('footer.php'); 
?>	