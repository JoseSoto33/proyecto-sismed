<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Detalles de historia clínica
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Historias clínicas</li>
    <li class="active">Detalles de historia cínica</li>
  </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
		<div class="row">
			<div id="hist-content" class="box box-success">

				<!-- Cabecera de la historia clínica -->
				<div class="box-header">					
					<div class="row">
						<div class="col-sm-9">
							<h2>Servicio de Atención Médica Integral</h2>
						</div>
						<div class="col-sm-3">
							<img class="pull-right logo" src="<?php echo base_url(); ?>assets/img/iut-logo3.png">
						</div>
					</div>
				</div><!--/ Cabecera de la historia clínica -->

				<!-- Cuerpo de la historia clínica -->
				<div class="box-body">

					<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
					<input type="hidden" name="cod_historia" id="cod_historia" value="<?php echo $historia['cod_historia']; ?>">

					<!-- Datos del paciente -->
					<div class="row">
						<div class="col-sm-12">
							<h3><?php echo $titulo; ?><strong class="pull-right">Nº: <?php echo $historia['cod_historia']; ?></strong></h3>
							<?php setlocale(LC_TIME,"esp"); ?>
							<h5><strong>Creada el: </strong><?php echo strftime('%d de %B de %Y', strtotime($historia["fecha_creada"]))." a las ".date('h:i:s a', strtotime($historia["fecha_creada"])); ?></h5>
						</div>
					</div>
					<?php 
						$nombre = $paciente["nombre1"];
						if (isset($paciente["nombre2"]) && !empty($paciente["nombre2"])) 
							{$nombre .= " ".$paciente["nombre2"];}
						$nombre .= " ".$paciente["apellido1"];
						if (isset($paciente["apellido2"]) && !empty($paciente["apellido2"])) 
							{$nombre .= " ".$paciente["apellido2"];}						
					?>
					
					<div class="row">
						<div class="col-sm-5">
							<p><strong>C.I.: </strong><?php echo $paciente['cedula']; ?></p>
						</div>
						<div class="col-sm-7">
							<p><strong>Paciente: </strong><?php echo $nombre; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5">
							<p><strong>Sexo: </strong><?php echo ($paciente["sexo"] === 'f')? "Femenino" : "Masculino"; ?></p>
						</div>
						<div class="col-sm-7">
							<p><strong>Fecha de nacimiento: </strong><?php echo strftime('%d de %B de %Y', strtotime($paciente["fecha_nacimiento"])); ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5">
							<p><strong>Edad: </strong><?php echo $paciente["edad"]; ?></p>
						</div>						
						<div class="col-sm-7">
							<p><strong>Ocupación: </strong><?php echo $paciente["tipo_paciente"]; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5">
							<p><strong>PNF: </strong><?php echo ($paciente["pnf"] != null)? $paciente["pnf"] : "------"; ?></p>
						</div>
						<div class="col-sm-7">
							<p><strong>Trayecto: </strong><?php echo ($paciente["trayecto"] != null)? $paciente["trayecto"] : "------"; ?></p>
						</div>
					</div>

					<div class="row">						
						<div class="col-sm-5">
							<p><strong>Tipo de sangre: </strong><?php echo ($paciente["tipo_sangre"] != null)? $paciente["tipo_sangre"] : "------"; ?></p>
						</div>
						<div class="col-sm-7">
							<p><strong>E-mail: </strong><?php echo $paciente["email"]; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5">
							<p><strong>Lugar de nacimiento: </strong><?php echo $paciente['lugar_nacimiento']; ?></p>
						</div>
						<div class="col-sm-7">
							<p><strong>Direción hab.: </strong><?php echo $paciente['direccion']; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5">
							<p><strong>Telf.: </strong><?php echo $paciente["telf_personal"]; ?></p>
						</div>
						<div class="col-sm-7">
							<p><strong>Telf. Emerg.: </strong><?php echo ($paciente["telf_emergencia"] != null)? $paciente["telf_emergencia"] : $paciente["telf_personal"]; ?></p>
						</div>
					</div>
					<!--/ Datos del paciente -->
					
					<!-- Historia clínica por especialidades -->
					<div id="sub-historia" class="row">
						<div class="col-xs-12">

							<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-justified" role="tablist">
							    <li role="presentation" class="active"><a href="#medicina" aria-controls="medicina" role="tab" data-toggle="tab">Medicina</a></li>
							    <li role="presentation"><a href="#odontologia" aria-controls="odontologia" role="tab" data-toggle="tab">Odontología</a></li>
							    <li role="presentation"><a href="#laboratorio" aria-controls="laboratorio" role="tab" data-toggle="tab">Laboratorio</a></li>
							    <li role="presentation"><a href="#nutricion" aria-controls="nutricion" role="tab" data-toggle="tab">Nutrición</a></li>
							</ul><!--/ Nav tabs -->

						    <!-- Tab panes -->
						  	<div class="tab-content">

						  		<!-- Área de consultas médicas -->
							    <div role="tabpanel" class="tab-pane fade in active" id="medicina">

							    <?php if (isset($historia_medicina) && $historia_medicina['rows'] > 0) { ?>
							    	<!-- Información del paciente (Medicina) -->
							    	<div class="sub-historia-info">
								    	<div class="row">
								    		<div class="col-sm-6">
								    			<h4>Antecedentes personales:</h4>
								    			<p>
								    				<?php echo $historia_medicina['data']['antecedentes_personales']; ?>
								    			</p>
								    		</div>
								    		<div class="col-sm-6">
								    			<h4>Antecedentes familiares:</h4>
								    			<p>
								    				<?php echo $historia_medicina['data']['antecedentes_familiares']; ?>
								    			</p>
								    		</div>
								    	</div>
							    	</div><!--/ Información del paciente (Medicina) -->

							    	<!-- Consultas médicas -->
							    	<div class="sub-historia-record">
							    		<div class="row">
							    			<div class="col-sm-12">
							    				<h3>Consultas</h3>
							    			</div>
							    			<div class="col-sm-12">							    				
									    		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									    			<!-- Consultas curativas -->
												  	<div class="panel panel-default">
													    <div class="panel-heading" role="tab" id="headingOne">
													      	<h4 class="panel-title">
													      		Curativas
													        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
													          		<span class="glyphicon glyphicon-plus"></span>
													        	</a>
													      	</h4>
													    </div>
													    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													      	<div class="panel-body">
													      		<?php if($this->session->userdata('especialidad') == "Medicina") { ?>
													      		<div class="col-xs-12 col-sm-3 table-buttons">
																	<a class="btn btn-success" href="<?php echo base_url(); ?>Consulta/AgregarConsulta/<?php echo md5('sismed'.$historia['cod_historia']); ?>_1"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
																</div>
																<?php } ?>
																<div class="col-xs-12 col-sm-9">
																	<?php if(get_cookie("cura_message") != null) { ?>
																		<div id="alert-message" class="alert alert-success" role="alert">
																			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			<?php 
																				echo $this->input->cookie('cura_message'); 
																				delete_cookie('cura_message');
																			?>
																		</div>					
																	<?php } ?>
																</div>	
													        	<div class="col-sm-12 table-responsive">
																	<table id="lista-cons-cur" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0" data-tipo_cons="1">
																		<thead>
																			<th width="30%">Fecha</th>
																			<th width="60%">Especialista</th>					
																			<th width="10%"> </th>
																		</thead>
																		<tfoot>
																			<th width="30%">Fecha</th>
																			<th width="60%">Especialista</th>
																			<th width="10%"> </th>						
																		</tfoot>
																		<tbody>
																			
																		</tbody>
																	</table>
																</div>
													      	</div>													      	
													    </div>
												  	</div><!--/ Consultas curativas -->

												  	<!-- Consultas preventivas -->
												  	<div class="panel panel-default">
													    <div class="panel-heading" role="tab" id="headingTwo">
													      	<h4 class="panel-title">
													      		Preventivas
													        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
													          		<span class="glyphicon glyphicon-plus"></span>
													        	</a>
													      	</h4>
													    </div>
													    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
													      	<div class="panel-body">
													      		<?php if($this->session->userdata('especialidad') == "Medicina") { ?>
													      		<div class="col-xs-12 col-sm-3 table-buttons">
																	<a class="btn btn-success" href="<?php echo base_url(); ?>Consulta/AgregarConsulta/<?php echo md5('sismed'.$historia['cod_historia']); ?>_2"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
																</div>
																<?php } ?>
																<div class="col-xs-12 col-sm-9">
																	<?php if(get_cookie("prev_message") != null) { ?>
																		<div id="alert-message" class="alert alert-success" role="alert">
																			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			<?php 
																				echo $this->input->cookie('prev_message'); 
																				delete_cookie('prev_message');
																			?>
																		</div>					
																	<?php } ?>
																</div>	
													        	<div class="col-sm-12 table-responsive">
																	<table id="lista-cons-prev" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0" data-tipo_cons="2">
																		<thead>
																			<th width="30%">Fecha</th>
																			<th width="60%">Especialista</th>					
																			<th width="10%"> </th>
																		</thead>
																		<tfoot>
																			<th width="30%">Fecha</th>
																			<th width="60%">Especialista</th>					
																			<th width="10%"> </th>						
																		</tfoot>
																		<tbody>
																			
																		</tbody>
																	</table>
																</div>
													      	</div>
													    </div>
												  	</div><!--/ Consultas preventivas -->
												</div>
							    			</div>
							    			<div class="col-sm-12">
							    				<h3>Vacunas</h3>
							    			</div>
							    			<div class="col-xs-12">
							    				
							    				<!-- Panel de vacunaciones -->
							    				<div class="row">
							    					<div class="col-xs-12 col-sm-6">
							    						<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
											    			<!-- Esquema de vacunas -->
														  	<div class="panel panel-default">
															    <div class="panel-heading" role="tab" id="heading1">
															      	<h4 class="panel-title">
															      		Esquema de vacunas
															        	<a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
															          		<span class="glyphicon glyphicon-minus"></span>
															        	</a>
															      	</h4>
															    </div>
															    <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
															      	<div class="panel-body">
															      		<div id="tarjeta-overlay" class="overlay hide">
															      			<i class="fa fa-refresh fa-spin"></i>
															      		</div>
															      		<ul id="tarjeta-vacunacion">
															      		<?php 
															      			$this->load->view('vacunas/TarjetaVacunacion'); 
															      		?>
															      		</ul>	      		
															      	</div>													      	
															    </div>
														  	</div><!--/ Esquema de vacunas -->
														</div>
							    					</div>
							    					<div class="col-xs-12 col-sm-6">
							    						<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
											    			<!-- Aplicar vacuna -->
														  	<div class="panel panel-default">
															    <div class="panel-heading" role="tab" id="heading2">
															      	<h4 class="panel-title">
															      		Aplicar vacuna
															        	<a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
															          		<span class="glyphicon glyphicon-minus"></span>
															        	</a>
															      	</h4>
															    </div>
															    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
															      	<div class="panel-body">
															      		<div id="form-overlay" class="overlay hide">  			
															      			<i class="fa fa-refresh fa-spin"></i>
															      		</div>
															      		<?php
																		/**
																		 * @var string $url Almacenará la dirección a la cual el formulario enviará los datos
																		 */
																		$url =  base_url()."Vacuna/AplicarVacuna";
																		
																		/** -- Formulario para agregar consultas -- */
																		echo form_open(
														      				$url,
														      				'id="form-aplicar-vacuna"'
														      				); ?>
														      			<div class="row">
														      				<div class="col-xs-12">
														      					<div class="form-group">
														      						<div class="input-group">
														      							<div class="input-group-addon">Vacuna:</div>
														      							<input type="text" id="vacuna" name="vacuna" class="form-control" readonly="readonly" required="required">
														      						</div>
														      						<div class="help-block with-errors"></div>
														      						<input type="hidden" id="idvacuna" name="idvacuna" value="">
														      					</div>
														      				</div>
														      				<div class="col-xs-12">
														      					<div class="form-group">
														      						<div class="input-group">
														      							<div class="input-group-addon">Esquema:</div>
														      							<input type="text" id="esquema" name="esquema" class="form-control" readonly="readonly" required="required">
														      						</div>
														      						<div class="help-block with-errors"></div>
														      						<input type="hidden" id="idesquema" name="idesquema" value="">
														      					</div>
														      				</div>
														      				<div class="col-xs-12">
														      					<div class="form-group">
														      						<div class="input-group">
														      							<div class="input-group-addon">Dosis:</div>
														      							<input type="number" min="1" id="dosis" name="dosis" class="form-control" readonly="readonly">
														      						</div>
														      						<div class="help-block with-errors"></div>
														      					</div>
														      				</div>
														      				<div class="col-xs-12">
														      					<div class="form-group">
														      						<div class="input-group">
														      							<div class="input-group-addon">Fecha aplicación:</div>
														      							<input type="date" id="fecha_aplicacion" name="fecha_aplicacion" class="form-control" max="<?php echo date('Y-m-d');?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required="required" readonly="readonly">
														      						</div>
													      							<div class="help-block with-errors"></div>
														      					</div>
														      				</div>
														      				<div class="col-xs-12">
														      					<div class="form-group">
														      						<div class="input-group">
														      							<div class="input-group-addon">Próx. Fecha aplicación:</div>
														      							<input type="date" id="prox_fecha_aplicacion" name="prox_fecha_aplicacion" value="" class="form-control" readonly="readonly">
														      						</div>
														      					</div>
														      				</div>
														      				<div class="col-xs-12">
														      					<div class="form-group">
														      						<div class="input-group">
														      							<div class="input-group-addon">Lote:</div>
														      							<input type="text" id="lote" name="lote" class="form-control" minlength="6" maxlength="10" pattern="[0-9]{6,10}" title="Sólo números de 6 a 10 dígitos" data-pattern-error="El Nº del lote sólo debe contener números de 6 a 10 dígitos" required="required">
														      						</div>
													      							<div class="help-block with-errors"></div>
														      					</div>
														      				</div>
														      				<div class="col-xs-12">
														      					<button class="btn btn-primary" id="aplicar" type="submit">Aplicar</button>
														      					<button class="btn btn-default" id="cancel">Cancelar</button>
														      				</div>
														      			</div>
														      			<?php echo form_close(); ?>
															      	</div>													      	
															    </div>
														  	</div><!--/ Aplicar vacuna -->
														</div>
							    					</div>
							    					<div class="col-xs-12">
							    						<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
											    			<!-- Listado de vacunas aplicadas -->
														  	<div class="panel panel-default">
															    <div class="panel-heading" role="tab" id="heading3">
															      	<h4 class="panel-title">
															      		Listado de vacunas aplicadas
															        	<a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
															          		<span class="glyphicon glyphicon-minus"></span>
															        	</a>
															      	</h4>
															    </div>
															    <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
															      	<div class="panel-body">
															      		<div id="lista-vacunas-overlay" class="overlay hide">
															      			<i class="fa fa-refresh fa-spin"></i>
															      		</div>
															      		<div id="lista-vacunas-content" class="table-responsive">
															      		<?php 
															      			$this->load->view('vacunas/ListaVacunasAplicadas'); 
															      		?>
															      		</div>
															      	</div>													      	
															    </div>
														  	</div><!--/ Listado de vacunas aplicadas -->
														</div>
							    					</div>
							    				</div><!--/ Panel de vacunaciones -->
							    			</div>
							    		</div>
							    	</div><!--/ Consultas médicas -->

							    <?php }else{ ?>
							    	<div class="row">
							    		<div class="col-xs-12">
							    			<h4 class="text-center">
							    				El paciente no tiene registos en medicina...
							    			</h4>
							    		</div>
							    	</div>
							    <?php } ?>

							    </div><!--/ Área de consultas médicas -->

							    <!-- Área de consultas odontológicas -->
							    <div role="tabpanel" class="tab-pane fade" id="odontologia">
							    <?php if (isset($historia_odontologia) && $historia_odontologia['rows'] > 0) { ?>
							    	<div class="sub-historia-info">
								    	<div class="row">
								    		<div class="col-sm-6">
								    			<h4>Antecedentes personales:</h4>
								    			<p>
								    				<?php echo $historia_odontologia['data']['antecedentes_personales']; ?>
								    			</p>
								    		</div>
								    		<div class="col-sm-6">
								    			<h4>Antecedentes familiares:</h4>
								    			<p>
								    				<?php echo $historia_odontologia['data']['antecedentes_familiares']; ?>
								    			</p>
								    		</div>
								    	</div>
								    </div>
							    <?php }else{ ?>
							    	<div class="row">
							    		<div class="col-xs-12">
							    			<h4 class="text-center">
							    				El paciente no tiene registos en odontología...
							    			</h4>
							    		</div>
							    	</div>
							    <?php } ?>
							    </div><!--/ Área de consultas odontológicas -->

							    <!-- Área de exámenes de laboratorio -->
							    <div role="tabpanel" class="tab-pane fade" id="laboratorio">
							    <?php if (isset($historia_laboratorio) && $historia_laboratorio['rows'] > 0) { ?>
							    	<div class="row">
							    		<div class="col-sm-6">
							    			<h4>Antecedentes personales:</h4>
							    			<p>
							    				<?php echo $historia_laboratorio['data']['antecedentes_personales']; ?>
							    			</p>
							    		</div>
							    		<div class="col-sm-6">
							    			<h4>Antecedentes familiares:</h4>
							    			<p>
							    				<?php echo $historia_laboratorio['data']['antecedentes_familiares']; ?>
							    			</p>
							    		</div>
							    	</div>
							    <?php }else{ ?>
							    	<div class="row">
							    		<div class="col-xs-12">
							    			<h4 class="text-center">
							    				El paciente no tiene registos en laboratorio...
							    			</h4>
							    		</div>
							    	</div>
							    <?php } ?>
							    </div><!--/ Área de exámenes de laboratorio -->

							    <!-- Área de consultas de nutrición -->
							    <div role="tabpanel" class="tab-pane fade" id="nutricion">
							    <?php if (isset($historia_nutricion) && $historia_nutricion['rows'] > 0) { ?>
							    	<div class="row">
							    		<div class="col-sm-6">
							    			<h4>Antecedentes personales:</h4>
							    			<p>
							    				<?php echo $historia_nutricion['data']['antecedentes_personales']; ?>
							    			</p>
							    		</div>
							    		<div class="col-sm-6">
							    			<h4>Antecedentes familiares:</h4>
							    			<p>
							    				<?php echo $historia_nutricion['data']['antecedentes_familiares']; ?>
							    			</p>
							    		</div>
							    	</div>
							    <?php }else{ ?>
							    	<div class="row">
							    		<div class="col-xs-12">
							    			<h4 class="text-center">
							    				El paciente no tiene registos en nutrición...
							    			</h4>
							    		</div>
							    	</div>
							    <?php } ?>
							    </div><!--/ Área de consultas de nutrición -->
						    </div><!--/ Tab panes -->
						</div>
					</div><!--/ Historia clínica por especialidades -->

				</div><!--/ Cuerpo de la historia clínica -->
		
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/detalles-historia-clinica.js"></script>
