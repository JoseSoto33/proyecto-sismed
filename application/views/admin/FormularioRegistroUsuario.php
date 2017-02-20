<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Agregar nuevo usuario</h1>
			</div>
			<div class="col-sm-12">
				<!--<form id="registro-usuario" class="form-horizontal form-basic" action="<?php echo base_url(); ?>Usuario/AgregarUsuario">-->
				<?= form_open(
	      				base_url()."Usuario/AgregarUsuario",
	      				'class="form-horizontal form-basic" id="registro-usuario"'
	      				); ?>
					<div class="col-sm-12">
						<h2>Datos personales</h2>
					</div>
					<hr class="form-divisor-line">
					<div class="col-sm-12">	
						<div class="row">
							<div class="col-sm-6">				
								<div class="form-group">
									<label for="cedula" class="col-sm-4 control-label">Cédula</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="cedula" name="cedula" minlength="6" maxlength="8" pattern="[0-9]{6,8}" required="required" title="Sólo números de 6 a 8 dígitos" placeholder="Sólo números de 6 a 8 dígitos" data-pattern-error="La cédula solo debe contener números de 6 a 8 dígitos"> 
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
									<label for="nombre1" class="col-sm-4 control-label">Primer nombre</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="nombre1" name="nombre1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" required="required" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos"> 
								      	<div class="help-block with-errors">
								      	</div>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nombre2" class="col-sm-4 control-label">Segundo nombre</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="nombre2" name="nombre2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" required="required" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
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
									<label for="apellido1" class="col-sm-4 control-label">Primer apellido</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="apellido1" name="apellido1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" required="required" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
								      <div class="help-block with-errors"></div>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="apellido2" class="col-sm-4 control-label">Segundo apellido</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="apellido2" name="apellido2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30"  required="required" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
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
									<label for="fecha_nacimiento" class="col-sm-4 control-label">Fecha de nacimiento</label>
								    <div class="col-sm-8">
								      <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" max="<?php echo date('Y-m-d');?>" required="required">
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="email" class="col-sm-4 control-label">Correo electrónico</label>
								    <div class="col-sm-8">
								      <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="ejemplo@dominio.com" required="required">
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
									<label for="telef_personal" class="col-sm-4 control-label">Teléfono personal</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" name="telef_personal" id="telef_personal" placeholder="(0212) 555-44-88" required="required">
								    </div>
								</div>							
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="telef_emergencia" class="col-sm-4 control-label">Teléfono emergencia</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" name="telef_emergencia" id="telef_emergencia" placeholder="(0212) 555-44-88" required="required">
								    </div>
								</div>							
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="sexo" class="col-sm-4 control-label">Sexo</label>
									<div class="col-sm-8">								
										<label class="radio-inline">
										  	<input type="radio" name="sexo" id="sexo1" value="f" required="required"> Mujer
										</label>
										<label class="radio-inline">
										  	<input type="radio" name="sexo" id="sexo2" value="m" required="required"> Hombre
										</label>
										<div class="help-block with-errors">
								      	</div>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tdireccion" class="col-sm-4 control-label">Dirección de Habitación</label>
								    <div class="col-sm-8">
								      <textarea class="form-control" name="direccion" id="direccion" required="required"></textarea>
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
									<label for="username" class="col-sm-4 control-label">Username</label>
									<div class="col-sm-8">								
										<input type="text" class="form-control" id="username" name="username" placeholder="Sólo carácteres alfanuméricos de 8 a 16 dígitos" minlength="8" maxlength="16" pattern="([A-Za-zñÑáéíóúüÁÉÍÓÚÜ0-9]){8,16}" data-pattern-error="Ingrese un nombre de usuario valido" required="required">
										<div class="help-block with-errors">
								     	</div>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="especialidad" class="col-sm-4 control-label">Especialidad</label>
									<div class="col-sm-8">								
										<select class="form-control" id="especialidad" name="especialidad" data-placeholder="Seleccione una especialidad..." required="required">
											<option></option>
											<option value="Administrador">Administrador</option>
											<option value="Medicina">Medicina</option>
											<option value="Odontología">Odontología</option>
											<option value="Laboratorio">Laboratorio</option>
											<option value="Nutrición">Nutrición</option>
										</select>
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
									<label for="password1" class="col-sm-4 control-label">Contraseña</label>
									<div class="col-sm-8">								
										<input type="password" name="password" class="form-control" id="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres">
										<div class="help-block with-errors">
								      	</div> 
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="password2" class="col-sm-4 control-label">Confirmar contraseña</label>
									<div class="col-sm-8">								
										<input type="password" class="form-control" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" data-match="#password1" data-match-error="Las contraseñas no coinciden" placeholder="Confirmar" required="required">
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
									<label for="tipo-usuario" class="col-sm-4 control-label">Tipo de usuario</label>
									<div class="col-sm-8">								
										<select class="form-control" id="tipo_usuario" name="tipo_usuario" data-placeholder="Seleccione una opción..." required="required" >
											<option></option>
											<option value="Administrador">Administrador</option>
											<option value="Doctor">Doctor</option>
											<option value="Enfermero">Enfermero</option>
											<option value="Odontólogo">Odontólogo</option>
											<option value="Bioanalista">Bioanalista</option>
											<option value="Nutricionista">Nutricionista</option>
											<option value="Asistente">Asistente</option>
										</select>
										<div class="help-block with-errors">
								      	</div>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="grado" class="col-sm-4 control-label">Grado de instrucción</label>
									<div class="col-sm-8">								
										<select class="form-control" id="grado_instruccion" name="grado_instruccion" data-placeholder="Seleccione un título..." required="required">
											<option></option>
											<option value="Administrador">Bachillerato</option>
											<option value="Medicina">TSU</option>
											<option value="Odontología">Ingeniería</option>
											<option value="Laboratorio">Licenciatura</option>
											<option value="Nutrición">Doctorado</option>
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
							<button type="submit" class="btn btn-form btn-lg btn-block">Guardar</button>
							<button type="button" class="btn btn-second-2 btn-lg btn-block">Volver</button>
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
<script type="text/javascript">
	$(document).ready(function(){

		var nav = navigator.userAgent.toLowerCase(); //La variable nav almacenará la información del navegador del usuario

	    if(nav.indexOf("firefox") != -1){   //En caso de que el usuario este usando el navegador MozillaFirefox
	        
	        $("#fecha_nacimiento").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput
	    }

	    $("#telef_personal").mask("(9999) 999-99-99");
	    $("#telef_emergencia").mask("(9999) 999-99-99");

	    $("#especialidad").chosen({
	    		no_results_text: "Sin resultados por:",
	    		allow_single_deselect: true
	    	});

	    $("#tipo_usuario").chosen({
	    		no_results_text: "Sin resultados por:",
	    		allow_single_deselect: true
	    	});


	    $("#grado_instruccion").chosen({
	    		no_results_text: "Sin resultados por:",
	    		allow_single_deselect: true
	    	});
		$('#registro-usuario').validator();
	});
</script>

<?php include('footer.php') ?>