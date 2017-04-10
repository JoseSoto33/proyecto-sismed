<?php include('doctor/header.php'); ?>
<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1><?php echo $titulo; ?></h1>
			</div>
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
			
			<div class="col-sm-12">
				
				<?php
					$url =  base_url()."Paciente/".$this->uri->segment(2, 0);
					if ($this->uri->segment(3, 0) != "0") {
						$url .= "/".$this->uri->segment(3, 0);
					}
					echo form_open(
	      				$url,
	      				'class="form-horizontal form-basic" id="registro-paciente"'
	      				); ?>
					<div class="col-sm-12">
						<h2>
							Datos personales
							<small class="pull-right"> 
	    						<span class="red2">Los campos con (*) son obligatorios.</span>
	    					</small>
						</h2>
					</div>
					<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
					<input type="hidden" name="id_persona" id="id" value="<?php echo (isset($id_persona))? $id_persona : ''; ?>">
					<?php
						if (isset($cod_historia)) {
							echo "<input type=\"hidden\" name=\"cod_historia\" id=\"cod_historia\" value=\"$cod_historia\">";
						}
					?>
					<hr class="form-divisor-line">
					<div class="col-sm-12">	
						<div class="row">
							<div class="col-sm-6">				
								<div class="form-group">
									<label for="cedula" class="col-sm-4 control-label"><span class="red">*</span> Cédula:</label>
								    <div class="col-sm-8">
								    	<div class="input-group">
								    		<div class="input-group-btn">
												<button id="search" class="btn btn-second" data-toggle="tooltip" data-placement="bottom" title="Buscar...">
													<span class="glyphicon glyphicon-search"></span>
												</button>	
											</div>
											<!--
								    		<div id="ced-load" class="input-group-addon">
								    			<span class="glyphicon glyphicon-pencil"></span>
								    			<img class="loading-2" src="<?php echo base_url(); ?>assets/img/spin2.gif">
								    		</div>-->
									      	<input type="text" class="form-control" id="cedula" name="cedula" minlength="6" maxlength="8" pattern="[0-9]{6,8}" value="<?php echo (isset($paciente['cedula']))? $paciente['cedula'] : set_value('cedula'); ?>" required="required" title="Sólo números de 6 a 8 dígitos" placeholder="Sólo números de 6 a 8 dígitos" data-pattern-error="La cédula solo debe contener números de 6 a 8 dígitos">
									      	<!--
									      	<div class="input-group-addon">
									      		<a href="#" data-toggle="tooltip" data-placement="bottom" title="Ingrese una cédula para verificar que el paciente tenga una historia clínica registrada...">
									      			<span class="glyphicon glyphicon-info-sign"></span>
									      		</a>
									      	</div>-->
									      	<div class="input-group-btn">								
												<button id="reset" class="btn btn-second-2" data-toggle="tooltip" data-placement="bottom" title="Limpiar formulario...">
													<span class="glyphicon glyphicon-refresh"></span>
												</button>
											</div>
									    </div>
									    <div class="help-block with-errors">
									    </div>
								    </div>
								</div>
							</div>
							<div class="col-sm-6">
								<a id="verHistoria" class="btn btn-primary disabled" href="#">
									<span class="glyphicon glyphicon-arrow-right"></span>
									Ver historia
								</a>
								<!--<h6 class="instructions">Ingrese una cédula para verificar que el paciente a tenga una historia clínica registrada...</h6>-->
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nombre1" class="col-sm-4 control-label"><span class="red">*</span> Primer nombre:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="nombre1" name="nombre1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['nombre1']))? $paciente['nombre1'] : set_value('nombre1'); ?>" required="required" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos" readonly="readonly"> 
								      	<div class="help-block with-errors">
								      	</div>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nombre2" class="col-sm-4 control-label">Segundo nombre:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="nombre2" name="nombre2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['nombre2']))? $paciente['nombre2'] : set_value('nombre2'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos" readonly="readonly">
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
								      <input type="text" class="form-control" id="apellido1" name="apellido1" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['apellido1']))? $paciente['apellido1'] : set_value('apellido1'); ?>" required="required" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos" readonly="readonly">
								      <div class="help-block with-errors"></div>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="apellido2" class="col-sm-4 control-label">Segundo apellido:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="apellido2" name="apellido2" pattern="[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}" title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['apellido2']))? $paciente['apellido2'] : set_value('apellido2'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos" readonly="readonly">
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
								      <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" max="<?php echo date('Y-m-d');?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo (isset($paciente['fecha_nacimiento']))? $paciente['fecha_nacimiento'] : set_value('fecha_nacimiento'); ?>" required="required" data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)" readonly="readonly">
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="email" class="col-sm-4 control-label"><span class="red">*</span> Correo electrónico:</label>
								    <div class="col-sm-8">
								      <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="ejemplo@dominio.com" value="<?php echo (isset($paciente['email']))? $paciente['email'] : set_value('email'); ?>" required="required" readonly="readonly">
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
									<label for="telf_personal" class="col-sm-4 control-label"><span class="red">*</span> Teléfono personal:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" name="telf_personal" id="telf_personal" placeholder="(0212) 555-44-88" value="<?php echo (isset($paciente['telf_personal']))? $paciente['telf_personal'] : set_value('telf_personal'); ?>" required="required" readonly="readonly">
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>							
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="telf_emergencia" class="col-sm-4 control-label"><span class="red">*</span> Teléfono emergencia:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" name="telef_emergencia" id="telf_emergencia" placeholder="(0212) 555-44-88" value="<?php echo (isset($paciente['telf_emergencia']))? $paciente['telf_emergencia'] : set_value('telf_emergencia'); ?>" readonly="readonly" >
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
										  	<input type="radio" name="sexo" id="sexo1" value="f" <?php echo  (isset($paciente['sexo']) && $paciente['sexo'] == 'f')? "checked=\"checked\"" : set_radio('sexo', 'f'); ?> required="required" readonly="readonly"> Mujer
										</label>
										<label class="radio-inline">
										  	<input type="radio" name="sexo" id="sexo2" value="m" <?php echo (isset($paciente['sexo']) && $paciente['sexo'] == 'm')? "checked=\"checked\"" : set_radio('sexo', 'm'); ?> required="required" readonly="readonly"> Hombre
										</label>
										<div class="help-block with-errors">
								      	</div>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="direccion" class="col-sm-4 control-label"><span class="red">*</span> Dirección de Habitación:</label>
								    <div class="col-sm-8">
								      <textarea class="form-control" name="direccion" id="direccion" required="required" readonly="readonly"><?php echo  (isset($paciente['direccion']))? trim($paciente['direccion']) : trim(set_value('direccion')); ?></textarea>
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>						
							</div>
						</div>
					</div>					
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="lugar_nacimiento" class="col-sm-4 control-label"><span class="red">*</span> Lugar de nacimiento:</label>
								    <div class="col-sm-8">
								      <textarea class="form-control" name="lugar_nacimiento" id="lugar_nacimiento" required="required" readonly="readonly"><?php echo  (isset($paciente['lugar_nacimiento']))? trim($paciente['lugar_nacimiento']) : trim(set_value('lugar_nacimiento')); ?></textarea>
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tipo_paciente" class="col-sm-4 control-label"><span class="red">*</span> Tipo de paciente:</label>
									<div class="col-sm-8">								
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
									</div>
								</div>						
							</div>							
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="grado" class="col-sm-4 control-label"><span class="red">*</span> Departamento:</label>
									<div class="col-sm-8">								
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
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="trayecto" class="col-sm-4 control-label">Trayecto:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="trayecto" name="trayecto" pattern="[0-9A-Za-zñÑáéíóúüÁÉÍÓÚÜ ]{2,30}" title="El trayecto sólo puede tener caracteres alfanuméricos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['trayecto']))? $paciente['trayecto'] : set_value('trayecto'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfanuméricos" readonly="readonly">
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
									<label for="pnf" class="col-sm-4 control-label">PNF:</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="pnf" name="pnf" pattern="[0-9A-Za-zñÑáéíóúüÁÉÍÓÚÜ ]{2,30}" title="El pnf sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($paciente['pnf']))? $paciente['pnf'] : set_value('pnf'); ?>" data-pattern-error="Este campo sólo puede tener caracteres alfabéticos" readonly="readonly">
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tipo_sangre" class="col-sm-4 control-label"><span class="red">*</span> Tipo de sangre:</label>
									<div class="col-sm-8">								
										<input type="text" name="tipo_sangre" class="form-control" id="tipo_sangre" minlength="5" maxlength="6" title="Debe seguir el formato 'ORH +'" value="<?php echo set_value('tipo_sangre'); ?>" required="required" readonly="readonly">
										<div class="help-block with-errors">
								      	</div> 
									</div>
								</div>						
							</div>
						</div>
					</div>
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="antecedentes_personales" class="col-sm-4 control-label"><span class="red">*</span> Antecedentes personales:</label>
								    <div class="col-sm-8">
								      <textarea class="form-control" name="antecedentes_personales" id="antecedentes_personales" required="required" readonly="readonly"><?php echo  (isset($paciente['antecedentes_personales']))? trim($paciente['antecedentes_personales']) : trim(set_value('antecedentes_personales')); ?></textarea>
								      <div class="help-block with-errors">
								      </div>
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="antecedentes_familiares" class="col-sm-4 control-label"><span class="red">*</span>Antecedentes familiares:</label>
								    <div class="col-sm-8">
								      <textarea class="form-control" name="antecedentes_familiares" id="antecedentes_familiares" required="required" readonly="readonly"><?php echo  (isset($paciente['antecedentes_familiares']))? trim($paciente['antecedentes_familiares']) : trim(set_value('antecedentes_familiares')); ?></textarea>
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
							<a href="<?php echo base_url(); ?>HistoriaClinica/ListarHistorias" class="btn btn-second-2 btn-lg btn-block">Cancelar</a>
						</div>						
					</div>
				<?php echo form_close(); ?>		
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-paciente.js"></script>

<?php include('doctor/footer.php'); ?>