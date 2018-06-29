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
		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
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

