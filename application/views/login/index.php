<?php include('header.php'); ?>
	<div id="portada">
		<div class="fondo-opaco">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">					
						<div id="mensaje">	
							<div class="alert alert-danger" role="alert">
							</div>					
						</div>
					</div>
					<div class="col-md-8">
						<h2>¡Bienvenido!</h2>		
						<p>La Medicina debe aspirar a ser honorable y dirigir su propia vida profesional; ser moderada y prudente; ser asequible y económicamente sostenible; ser justa y equitativa; y a respetar las opciones y la dignidad de las personas. Los valores elementales de la Medicina contribuyen a preservar su integridad frente a las presiones políticas y sociales que defienden unos fines ajenos o anacrónicos.</p>
					</div>
					<div class="col-md-4">
						<?php //if($cont === 0){ ?>							
						<input type="hidden" name="url" id="base_url" value="<?php echo base_url(); ?>">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Regístrate</button>
						<?php //} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>		
<!-- Modal -->
<?php 
	//if($cont === 0){ 
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
	      		<!--<form id="form-admin" class="form-horizontal" action="<?php echo base_url(); ?>Usuario/AgregarUsuario">-->
	      		<?= form_open(base_url()."Usuario/AgregarUsuario", $usaurio['form'], $usaurio['hidden'])); ?>
	      			<div class="row">
	      				<div class="col-md-12">
	        				<div class="mensaje">	
								<div class="alert" role="alert"></div>													
							</div>
	        			</div>
						<div class="col-sm-12">
							<h4>
								Datos personales
								<figure class="load-content">
				        			<img src="<?php echo base_url();?>assets/img/loading_spinner.gif" class="loading form-loading">
				        		</figure>
							</h4>
						</div>
						<div class="col-md-12">	
        					<span class="red2">Todos los campos son obligatorios</span>
        				</div>
						<div class="col-sm-12">	
						<div class="row">
							<div class="col-sm-6">				
								<div class="form-group">
									<label for="cedula" class="col-sm-5 control-label">Cédula</label>
								    <div class="col-sm-7">
								      <!--<input type="text" class="form-control" id="cedula" name="cedula">-->
								      <?= form_input($usuario['cedula']);?>
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nombre1" class="col-sm-5 control-label">Primer nombre</label>
								    <div class="col-sm-7">
								      <!--<input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="">-->
								      <?= form_input($usuario['cedula']);?>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nombre2" class="col-sm-5 control-label">Segundo nombre</label>
								    <div class="col-sm-7">
								      <!--<input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="">-->
								      <?= form_input($usuario['nombre2']);?>
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">		
							<div class="col-sm-6">
								<div class="form-group">
									<label for="apellido1" class="col-sm-5 control-label">Primer apellido</label>
								    <div class="col-sm-7">
								      <!--<input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="">-->
								      <?= form_input($usuario['apellido1']);?>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="apellido2" class="col-sm-5 control-label">Segundo apellido</label>
								    <div class="col-sm-7">
								      <!--<input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="">-->
								      <?= form_input($usuario['apellido2']);?>
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="sexo" class="col-sm-5 control-label">Sexo</label>
									<div class="col-sm-7">								
										<label class="radio-inline">
										  	<!--<input type="radio" name="sexo" id="sexo1" value="f">-->
										  	<?= form_radio($usuario['sexo1']);?> Mujer
										</label>
										<label class="radio-inline">
										  	<!--<input type="radio" name="sexo" id="sexo2" value="m">-->
										  	<?= form_radio($usuario['sexo2']);?> Hombre
										</label>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="fecha_nacimiento" class="col-sm-5 control-label">Fecha de nacimiento</label>
								    <div class="col-sm-7">
								      <!--<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" max="<?php echo date('Y-m-d');?>">-->
								      <?= form_input($usuario['fecha_nacimiento']);?>
								    </div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="telef_personal" class="col-sm-5 control-label">Teléfono personal</label>
								    <div class="col-sm-7">
								      <!--<input type="text" class="form-control" id="telef_personal" name="telef_personal" placeholder="(0212) 555-44-88">-->
								      <?= form_input($usuario['telef_personal']);?>
								    </div>
								</div>							
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="telef_emergencia" class="col-sm-5 control-label">Teléfono emergencia</label>
								    <div class="col-sm-7">
								      <!--<input type="text" class="form-control" id="telef_emergencia" name="telef_emergencia" placeholder="(0212) 555-44-88">-->
								      <?= form_input($usuario['telef_emergencia']);?>
								    </div>
								</div>							
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">							
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tdireccion" class="col-sm-5 control-label">Dirección</label>
								    <div class="col-sm-7">
								      <!--<textarea class="form-control" name="direccion" id="direccion"></textarea>-->
								      <?= form_textarea($usuario['direccion']);?>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="email" class="col-sm-5 control-label">Correo electrónico</label>
								    <div class="col-sm-7">
								      <!--<input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@dominio.com">-->
								      <?= form_input($usuario['email']);?>
								    </div>
								</div>						
							</div>
						</div>
					</div>
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<h4>Datos de usuario</h4>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="username" class="col-sm-5 control-label">Username</label>
									<div class="col-sm-7">								
										<!--<input type="text" class="form-control" id="username" name="username">-->
										<?= form_input($usuario['username']);?>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="especialidad" class="col-sm-5 control-label">Especialidad</label>
									<div class="col-sm-7">								
										<!--<select class="form-control" id="especialidad" name="especialidad" data-placeholder="Seleccione una especialidad...">
											<option></option>
											<option value="Administrador">Administrador</option>
											<option value="Medicina">Medicina</option>
											<option value="Odontología">Odontología</option>
											<option value="Laboratorio">Laboratorio</option>
											<option value="Nutrición">Nutrición</option>
										</select>-->
										<?= form_dropdown($usuario['especialidad']['name'],$usuario['especialidad']['options'],$usuario['especialidad']['selected'],$usuario['especialidad']['attributes']);?>
									</div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="password1" class="col-sm-5 control-label">Contraseña</label>
									<div class="col-sm-7">								
										<!--<input type="password" name="password" class="form-control" id="password1">-->
										<?= form_input($usuario['password1']);?>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="password2" class="col-sm-5 control-label">Confirmar contraseña</label>
									<div class="col-sm-7">								
										<!--<input type="password" class="form-control" id="password2" name="password2">-->
										<?= form_input($usuario['password2']);?>
									</div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tipo-usuario" class="col-sm-5 control-label">Tipo de usuario</label>
									<div class="col-sm-7">								
										<!--<select class="form-control" id="tipo_usuario" name="tipo_usuario" data-placeholder="Seleccione una opción...">
											<option></option>
											<option value="Administrador">Administrador</option>
											<option value="Doctor">Doctor</option>
											<option value="Enfermero">Enfermero</option>
											<option value="Odontólogo">Odontólogo</option>
											<option value="Bioanalista">Bioanalista</option>
											<option value="Nutricionista">Nutricionista</option>
											<option value="Asistente">Asistente</option>
										</select>-->
										<?= form_dropdown($usuario['tipo_usuario']['name'],$usuario['tipo_usuario']['options'],$usuario['tipo_usuario']['selected'],$usuario['tipo_usuario']['attributes']);?>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="grado" class="col-sm-5 control-label">Grado de instrucción</label>
									<div class="col-sm-7">								
										<!--<select class="form-control" id="grado_instruccion" name="grado_instruccion" data-placeholder="Seleccione un título...">
											<option></option>
											<option value="Administrador">Bachillerato</option>
											<option value="Medicina">TSU</option>
											<option value="Odontología">Ingeniería</option>
											<option value="Laboratorio">Licenciatura</option>
											<option value="Nutrición">Doctorado</option>
										</select>-->
										<?= form_dropdown($usuario['grado_instruccion']['name'],$usuario['grado_instruccion']['options'],$usuario['grado_instruccion']['selected'],$usuario['grado_instruccion']['attributes']);?>
									</div>
								</div>						
							</div>
						</div>
					</div>
					<hr class="form-divisor-line">			
				</form>	
	      	</div>
	      	<div class="modal-footer">
				<button type="button" class="btn btn-success">Guardar</button>
	        	<button type="button" class="btn btn-danger close1" data-dismiss="modal">Cancelar</button>
	      	</div>
	    </div>
  	</div>
</div>
<?php //}
	include('footer.php'); 
?>	