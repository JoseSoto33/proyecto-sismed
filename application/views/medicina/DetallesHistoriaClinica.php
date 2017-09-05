<?php include('doctor/header.php'); ?>
<div id="seccion4">
	<div class="container">
		<div class="row">
			<div id="hist-content" class="col-sm-7 center">

				<!-- Cabecera de la historia clínica -->
				<div class="hist-header">					
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
				<div class="hist-body">

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

						$hoy = date('Y-m-d');
						$diff = abs(strtotime($hoy) - strtotime($paciente["fecha_nacimiento"]));
						$edad = floor($diff / (365*60*60*24));
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
							<p><strong>Edad: </strong><?php echo $edad; ?></p>
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
																			<th width="60%">Atendido por:</th>					
																			<th width="10%"> </th>
																		</thead>
																		<tfoot>
																			<th width="30%">Fecha</th>
																			<th width="60%">Atendido por:</th>
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
																			<th width="60%">Atendido por:</th>					
																			<th width="10%"> </th>
																		</thead>
																		<tfoot>
																			<th width="30%">Fecha</th>
																			<th width="60%">Atendido por:</th>					
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
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/detalles-historia-clinica.js"></script>
<?php include('doctor/footer.php'); ?>