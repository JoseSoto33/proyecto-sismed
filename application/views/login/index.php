<?php include('header.php'); ?>
	<div id="portada">
		<div class="fondo-opaco">
			<div class="container">
				<div class="row">					
					<div class="col-xs-12">						
						<h2>¡Bienvenido!</h2>		
					</div>
					<div class="col-md-8">
						<p>La Medicina debe aspirar a ser honorable y dirigir su propia vida profesional; ser moderada y prudente; ser asequible y económicamente sostenible; ser justa y equitativa; y a respetar las opciones y la dignidad de las personas. Los valores elementales de la Medicina contribuyen a preservar su integridad frente a las presiones políticas y sociales que defienden unos fines ajenos o anacrónicos.</p>
					</div>
					<div class="col-md-4">
						<?php if($existe_usuario === false){ ?>							
						<input type="hidden" name="url" id="base_url" value="<?php echo base_url(); ?>">
						<button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal">Regístrate</button>
						<?php } ?>						
					</div>
					<div class="col-xs-12">	
						<?= validation_errors("<div class=\"alert alert-danger\" role=\"alert\">", "</div>"); ?>	
						<?php if(isset($mensaje) && !empty($mensaje)) { ?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?= $mensaje; ?>
							</div>					
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>		
<!-- Modal -->
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
	      		<!--<form id="form-admin" class="form-horizontal" action="<?php echo base_url(); ?>Usuario/AgregarUsuario">-->
	      		<?= form_open(
	      				base_url()."Usuario/AgregarUsuario",
	      				'class="form-horizontal" id="form-admin"',
	      				array(
	      					"ajax" => "1",
	      					"especialidad" => "Administrador",
	      					"tipo_usuario" => "Administrador",
	      					"origen" => "login"
	      					)
	      				); ?>
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
									    	<input type="text" class="form-control" id="cedula" name="cedula" minlength="6" maxlength="8" pattern="[0-9]{6,8}" value="<?php echo set_value('cedula'); ?>" required="required" title="Sólo números de 6 a 8 dígitos" placeholder="Sólo números de 6 a 8 dígitos" data-pattern-error="La cédula solo debe contener números de 6 a 8 dígitos"> 
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
										<label for="nombre1" class="col-sm-5 control-label">Primer nombre</label>
									    <div class="col-sm-7">
									      	<input type="text" class="form-control" id="nombre1" name="nombre1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo set_value('nombre1'); ?>" required="required" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos"> 
									      	<div class="help-block with-errors">
									      	</div>
									    </div>
									</div>						
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="nombre2" class="col-sm-5 control-label">Segundo nombre</label>
									    <div class="col-sm-7">
								      		<input type="text" class="form-control" id="nombre2" name="nombre2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo set_value('nombre2'); ?>" required="required" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
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
										<label for="apellido1" class="col-sm-5 control-label">Primer apellido</label>
									    <div class="col-sm-7">
									      	<input type="text" class="form-control" id="apellido1" name="apellido1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo set_value('apellido1'); ?>" required="required" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
								      		<div class="help-block with-errors">
								    		</div>
									    </div>
									</div>						
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="apellido2" class="col-sm-5 control-label">Segundo apellido</label>
									    <div class="col-sm-7">
									      	<input type="text" class="form-control" id="apellido2" name="apellido2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo set_value('apellido2'); ?>" required="required" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos">
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
										<label for="sexo" class="col-sm-5 control-label">Sexo</label>
										<div class="col-sm-7">								
											<label class="radio-inline">
											  	<input type="radio" name="sexo" id="sexo1" value="f" <?php echo  set_radio('sexo', 'f'); ?> required="required"> Mujer
											</label>
											<label class="radio-inline">
											  	<input type="radio" name="sexo" id="sexo2" value="m" <?php echo  set_radio('sexo', 'm'); ?> required="required"> Hombre
											</label>
											<div class="help-block with-errors">
								      		</div>
										</div>
									</div>						
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="fecha_nacimiento" class="col-sm-5 control-label">Fecha de nacimiento</label>
									    <div class="col-sm-7">
									      	<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" max="<?php echo date('Y-m-d');?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo set_value('fecha_nacimiento'); ?>" required="required" data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)">
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
										<label for="telef_personal" class="col-sm-5 control-label">Teléfono personal</label>
									    <div class="col-sm-7">
									      	<input type="text" class="form-control" name="telef_personal" id="telef_personal" placeholder="(0212) 555-44-88" value="<?php echo set_value('telef_personal'); ?>" required="required">
								      		<div class="help-block with-errors">
								      		</div>
									    </div>
									</div>							
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="telef_emergencia" class="col-sm-5 control-label">Teléfono emergencia</label>
									    <div class="col-sm-7">
									      	<input type="text" class="form-control" name="telef_emergencia" id="telef_emergencia" placeholder="(0212) 555-44-88" value="<?php echo set_value('telef_emergencia'); ?>" >
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
										<label for="tdireccion" class="col-sm-5 control-label">Dirección</label>
									    <div class="col-sm-7">
									      	<textarea class="form-control" name="direccion" id="direccion" required="required"></textarea>
									      	<div class="help-block with-errors">
								     		</div>
									    </div>
									</div>						
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="email" class="col-sm-5 control-label">Correo electrónico</label>
									    <div class="col-sm-7">
									      	<input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="ejemplo@dominio.com" value="<?php echo set_value('email'); ?>" required="required">
								   	  		<div class="help-block with-errors">
								      		</div>
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
											<input type="text" class="form-control" id="username" name="username" placeholder="Ingrese un nombre de usuario" minlength="8" maxlength="16" pattern="([A-Za-zñÑáéíóúüÁÉÍÓÚÜ0-9]){8,16}" data-pattern-error="Sólo carácteres alfanuméricos de 8 a 16 dígitos" value="<?php echo set_value('username'); ?>" required="required">
											<div class="help-block with-errors">
									     	</div>
										</div>
									</div>						
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="grado" class="col-sm-5 control-label">Grado de instrucción</label>
										<div class="col-sm-7">								
											<select class="form-control" id="grado_instruccion" name="grado_instruccion" data-placeholder="Seleccione un título..." required="required">
												<option></option>
												<option value="Bachillerato" <?php echo  set_select('grado_instruccion', 'Bachillerato'); ?>>Bachillerato</option>
												<option value="TSU" <?php echo  set_select('grado_instruccion', 'TSU'); ?>>TSU</option>
												<option value="Ingeniería" <?php echo  set_select('grado_instruccion', 'Ingeniería'); ?>>Ingeniería</option>
												<option value="Licenciatura" <?php echo  set_select('grado_instruccion', 'Licenciatura'); ?>>Licenciatura</option>
												<option value="Doctorado" <?php echo  set_select('grado_instruccion', 'Doctorado'); ?>>Doctorado</option>
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
										<label for="password1" class="col-sm-5 control-label">Contraseña</label>
										<div class="col-sm-7">								
											<input type="password" name="password" class="form-control" id="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" value="<?php echo set_value('password'); ?>" required="required" data-pattern-error="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres">
											<div class="help-block with-errors">
									      	</div> 
										</div>
									</div>						
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="password2" class="col-sm-5 control-label">Confirmar contraseña</label>
										<div class="col-sm-7">								
											<input type="password" class="form-control" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" minlength="8" maxlength="16" title="Debe contener al menos un número, una letra mayúscula, una letra minúscula y ser de 8 a 16 caracteres" data-match="#password1" data-match-error="Las contraseñas no coinciden" placeholder="Confirmar" value="<?php echo set_value('password2'); ?>" required="required">
											<div class="help-block with-errors">
									        </div>
										</div>
									</div>						
								</div>
							</div>
						</div>	-->				
						<hr class="form-divisor-line">	
					</div>		
				<?= form_close(); ?>
				<!--</form>	-->
	      	</div>
	      	<div class="modal-footer">
				<button type="submit" class="btn btn-success" form="form-admin">Guardar</button>				
	        	<button type="reset" class="btn btn-danger close1" form="form-admin" data-dismiss="modal">Cancelar</button>
	      	</div>
	    </div>
  	</div>
</div>
<?php }
	include('footer.php'); 
?>	