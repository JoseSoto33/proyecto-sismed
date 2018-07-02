<!-- Main content -->
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Plan alimenticio</li>
    <li class="active"><?php echo $titulo; ?></li>
  </ol>
</section>
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
									Para registrar un nuevo plan alimenticio deberá llenar los campos de acuerdo a las siguientes indicaciones:
								</p>
								<!-- Panel de descripción de campos -->
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					    			<!-- Descripción campo Prescrpción dietética -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading1">
									      	<h4 class="panel-title">
									      		Prescripción dietética
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Prescrpción dietética -->

								  	<!-- Descripción campo Lista de sustitutos -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading2">
									      	<h4 class="panel-title">
									      		Ración
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Lista desplegable de selección.</li>
									      			<li><b>Campos obligatorios.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div>
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading2">
									      	<h4 class="panel-title">
									      		Medida
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Lista desplegable de selección.</li>
									      			<li><b>Campos obligatorios.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div>
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading2">
									      	<h4 class="panel-title">
									      		Equivalentes
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Turnos de las comidas con listas desplegables de selección.</li>
									      			<li><b>Campos obligatorios.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Lista de sustitutos -->

								  	<!-- Descripción campo Hora Menú ejemplo -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading3">
									      	<h4 class="panel-title">
									      		Hora del Menú
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Formato:</b> Hora hh:mm (ejemp.: 02:30).</li>
									      			<li><b>Meridiano:</b> Lista desplegable de selección.</li>
									      			<li><b>Campos obligatorios.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Hora Menú ejemplo -->

								  	<!-- Descripción campo Recomendaciones -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading5">
									      	<h4 class="panel-title">
									      		Recomendaciones
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Opciones de selección simple.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Recomendaciones -->

								  	<!-- Descripción campo vaso de agua -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading6">
									      	<h4 class="panel-title">
									      		Vasos de agua al día
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 2 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Numéricos</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo vaso de agua -->

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
		<div class="col-xs-8">
			<div class="box box-primary">
		        <div class="box-body">
		        	<div class="row">
		        		<!-- Mensajes de error -->
						<div class="col-xs-12">
							<?php echo validation_errors("<div class=\"alert alert-danger\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>", "</div>"); ?>
							<?php if(isset($mensaje) && !empty($mensaje)) { ?>
								<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<?php echo $mensaje; ?>
								</div>					
							<?php } ?>
						</div><!--/ Mensajes de error -->
						<div class="col-xs-12">
							<?php
								$url =  base_url()."PlanesAlimenticios/".$this->uri->segment(2, 0);
								if ($this->uri->segment(3, 0) != "0") {
									$url .= "/".$this->uri->segment(3, 0);
								}

								echo form_open_multipart(
				      				$url,
				      				'id="registro-planes"'
				      				); ?>
				      				<!--offset-8 permite que me de un espacio de 8 hacia la izquierda -->
				      			<div class="col-sm-6">
				     				<h4>Nombre: </h4>
				      			</div>
				      			<div class="col-sm-6">
				     				<h4 class="text-right">Fecha: <?php echo date('d-m-Y');?></h4>
				      			</div>
				      			<input type="hidden" name="id_paciente" id="id" value="">
				      			
				      			<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Prescripción Dietética</h3>
				       					</div>
				       					<div class="box-body">				       						
					       					<div class="row">
					       						<div class="col-sm-12">
					       							<div class="form-group">
					       								<textarea  placeholder="Este campo es obligatorio" required class="form-control" name="prescripcion" rows="5"><?php echo (isset($plan['prescripcion']))? trim($plan['prescripcion']) : set_value('prescripcion'); ?></textarea>
					       							</div>
					       						</div>
					       					</div>
				       					</div>
				       				</div>
				       			</div>

				       			<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Lista de Sustitutos</h3>
				       					</div>
				       					<div class="box-body">	
				       						<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
				       							<?php foreach ($lista_sustitutos as $key => $sustituto) {?>
				       							<div class="panel panel-default" data_idsustituto="<?php echo $sustituto['id']; ?>">
				       								<div class="panel-heading" role="tab" id="heading<?php echo $sustituto['id']; ?>">
				       									<h4 class="panel-title">
				       											<?php  echo trim($sustituto['titulo']);	?>
				       										<a href="#collapse2<?php echo $sustituto['id']; ?>" class="collapsed pull-right" role="buttom" data-toggle="collapse" aria-expanded="false" aria-controls="collapse<?php echo $sustituto['id']; ?>">
				       											<span class="glyphicon glyphicon-plus" aria-label="Left Align"></span>
				       										</a>
				       									</h4>
				       								</div>
				       								<div id="collapse2<?php echo $sustituto['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $sustituto['id']; ?>">
				       									<div class="panel-body">
				       										<div class="raciones-contentt" >
				       											<input type="hidden" class="id_sustituto" value="<?php echo $sustituto['id']; ?>">
					       										<div class="row fila">
					       											<div class="col-xs-11">
					       												<div class="row">
							       											<div class="col-xs-12 col-sm-4" >
							       												<div class="form-group">
							       													<label class="control-label"><span class="red"> *</span>Ración</label>
							       													<select required class="form-control racion" name="racion[<?php echo $sustituto['id']; ?>][]">
							       														<option value=""></option>
							       														<?php 
							       														foreach ($raciones[$sustituto['id']] as $key => $racion) {?>
							       															<option value="<?php echo $racion['id']?>">
							       															<?php  echo $racion['descripcion']?>
							       															</option>
							       													<?php } ?>
							       														
							       													</select>
							       												</div>
							       											</div>

							       											<div class="col-xs-12 col-sm-4 col-sm-offset-4" >
							       												<div class="form-group">
							       													<label class="control-label"><span class="red"> *</span>Medida</label>
							       													<select required class="form-control medida" name="medida[<?php echo $sustituto['id']; ?>][]">
							       														<option value=""></option>
							       														<?php 
							       														foreach ($lista_medida as $key => $medida) {?>
							       															<option value="<?php echo $medida['id']?>">
							       																<?php  echo $medida['medida']?>
							       															</option>
							       													<?php } ?>
							       														
							       													</select>
							       												</div>
							       											</div>
							       											<div class="col-xs-12" >
							       												<div class="table-responsive">
							       													<label class="control-label"><span class="red"> *</span>Equivalentes</label>
																				 	<table class="table table-hover table-bordered">
																	  					<thead>
																	  						<tr class="active">
																	  							<th class="text-center">D</th>
																	  							<th class="text-center">DM</th>
																	  							<th class="text-center">A</th>
																	  							<th class="text-center">AM</th>
																	  							<th class="text-center">C</th>
																	  							<th class="text-center">CM</th>
																	  						</tr>
																	  					</thead>
																	  					<tbody>
																	  						<tr>
																	  							<td>
																									<select class="form-control equivalente equivalente-d" name="equivalente[<?php echo $sustituto['id']; ?>][1][]">
																										<option value=""></option>
																										<?php 
																										foreach ($lista_equivalente as $key => $equivalente) {?>
																										<option value="<?php echo $equivalente['id']?>">
																											<?php  echo $equivalente['equivalente']?>
																										</option>
																										<?php } ?>
																									</select>
																	  							</td>
																	  							<td>
																									<select class="form-control equivalente equivalente-dm" name="equivalente[<?php echo $sustituto['id']; ?>][2][]">
																										<option value=""></option>
																										<?php 
																										foreach ($lista_equivalente as $key => $equivalente) {?>
																										<option value="<?php echo $equivalente['id']?>">
																											<?php  echo $equivalente['equivalente']?>
																										</option>
																										<?php } ?>
																									</select>
																	  							</td>
																	  							<td>
																									<select class="form-control equivalente equivalente-a" name="equivalente[<?php echo $sustituto['id']; ?>][3][]">
																										<option value=""></option>
																										<?php 
																										foreach ($lista_equivalente as $key => $equivalente) {?>
																										<option value="<?php echo $equivalente['id']?>">
																											<?php  echo $equivalente['equivalente']?>
																										</option>
																										<?php } ?>
																									</select>
																	  							</td>
																	  							<td>

																									<select class="form-control equivalente equivalente-am" name="equivalente[<?php echo $sustituto['id']; ?>][4][]">

																										<option value=""></option>
																										<?php 
																										foreach ($lista_equivalente as $key => $equivalente) {?>
																										<option value="<?php echo $equivalente['id']?>">
																											<?php  echo $equivalente['equivalente']?>
																										</option>
																										<?php } ?>
																									</select>
																	  							</td>
																	  							<td>
																									<select class="form-control equivalente equivalente-c" name="equivalente[<?php echo $sustituto['id']; ?>][5][]">
																										<option value=""></option>
																										<?php 
																										foreach ($lista_equivalente as $key => $equivalente) {?>
																										<option value="<?php echo $equivalente['id']?>">
																											<?php  echo $equivalente['equivalente']?>
																										</option>
																										<?php } ?>
																									</select>
																	  							</td>
																	  							<td>
																									<select class="form-control equivalente equivalente-cm" name="equivalente[<?php echo $sustituto['id']; ?>][6][]">
																										<option value=""></option>
																										<?php 
																										foreach ($lista_equivalente as $key => $equivalente) {?>
																										<option value="<?php echo $equivalente['id']?>">
																											<?php  echo $equivalente['equivalente']?>
																										</option>
																										<?php } ?>
																									</select>
																	  							</td>
																	  						</tr>
																	  					</tbody>
																					</table>
																				</div>
																			</div>
							       										</div>
					       											</div>
					       										</div>
					       									</div>
				       										<div class="row">
				       											<div class="col-sm-12">
				       												<button type="button" class="btn btn-info pull-right agregar-fila" data-id_sustituto="<?php echo $sustituto['id'];?>">
				       													Añadir
				       												</button>
				       											</div>
				       										</div>
				       									</div>
				       								</div>
				       							</div>
				       							<?php } ?>
				       							
				       						</div>
				       					</div>
				       				</div>
				       				 <div class="col-sm-12">
				       				 	<button id="menu_paciente" type="button" data-toggle="modal" data-target="#menu" class="btn btn-info pull-left">Menú</button>
		        						<button id="Recomendaciones" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info pull-right">Recomendaciones</button>
		        					</div>
				       			</div>
				          				
								<div class="col-sm-12">						
									<small> 
										<span class="red2">Los campos con (*) son obligatorios.</span>
									</small>

								</div>	
								<!-- Modal recomendaciones-->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Recomendaciones</h4>
								      </div>
								      <div class="modal-body">
								      	<div>

										  	<ul class="nav nav-tabs" role="tablist">
										   	<?php foreach ($recomendaciones as $key => $recomendacion) { ?>
											 	<li role="presentation" <?php echo ($key==0)? "class=\"active\"": '' ?>>
											 		<a class="tab-link" href="#<?php echo strtolower(str_replace(" ", "_",$recomendacion['descripcion']))?>" aria-controls="generales" role="tab" data-toggle="tab">
											 			<div class="radio">
														  <label>
														    <input type="radio" name="recomendacion" id="<?php echo $recomendacion['id'] ?>" value="<?php echo $recomendacion['id'] ?>">
														   <?php echo  (!empty($recomendacion['abv']))? $recomendacion['abv'] : $recomendacion['descripcion']?>
														  </label>
														</div>
											 		</a>
											 	</li>
										 	<?php } ?>		 	
										  	</ul>

										  	<!-- Tab panes -->
										  	<div class="tab-content">
											  	<?php 
											  	foreach ($recomendaciones as $key => $recomendacion) { 
											  		$input="<input type='number' style='width:70px !important; display:inline-block !important;' name='vasos_agua_".$recomendacion['id']."' id='vasos_agua_".$recomendacion['id']."' class='form-control' min='1' step='1'>";
											  	?>
											 	<div role="tabpanel" class="tab-pane" id="<?php echo strtolower(str_replace(" ", "_",$recomendacion['descripcion']))?>">
											 		<ol>
													<?php foreach ($lista_recomendaciones[$recomendacion['id']] as $key => $lista) { ?> 
														<li>
															<?php echo str_replace("*", $input, $lista['descripcion']); ?>
														</li>	
													<?php } ?>
												 	</ol>
												 	<div class="table-responsive">
													 	<table class="table table-hover table-bordered">
										  					<thead>
										  						<tr class="active">
										  							<th class="text-center">Alimentos</th>
										  							<th class="text-center">Permitidos</th>
										  							<th class="text-center">Evitar</th>
										  						</tr>
										  					</thead>
										  					<tbody>
										  						<?php foreach ($cuadro_recomendaciones[$recomendacion['id']] as $key => $cuadro) {?>
											  					<tr>
											  						<td class="active"><?php echo $cuadro['alimento']; ?></td>
											  						<td><?php echo $cuadro['permitidos']; ?></td>
											  						<td><?php echo $cuadro['evitar']; ?></td>
											  					</tr>
											  					<?php }?>
										  					</tbody>
														</table>
													</div>
											 	</div>
												<?php } ?>
										  	</div>
										</div>

								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								      </div>
								    </div>
								  </div>
								</div>
								<!-- Modal de Menu -->
								<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog " role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Menú Ejemplo</h4>
								      </div>
								      <div class="modal-body">
								      	<!-- cabezera -->
								      	<ul class="nav nav-tabs" role="tablist">
										    <li role="presentation" class="active"><a href="#desayuno" aria-controls="desayuno" role="tab" data-toggle="tab">Desayuno</a></li>
										    <li role="presentation"><a href="#almuerzo" aria-controls="almuerzo" role="tab" data-toggle="tab">Almuerzo</a></li>
										    <li role="presentation"><a href="#cena" aria-controls="cena" role="tab" data-toggle="tab">Cena</a></li>
										  </ul>

										  <!-- contenido -->

										  <div class="tab-content">
										    <div role="tabpanel" class="tab-pane active" id="desayuno">
											    <ul class="list-group">
													  <li class="list-group-item" id="D">
													  	<h4>
													  		<div class="row">
													  			<div class="col-xs-12 col-sm-6">	
													  				Desayuno
													  			</div>
													  			<div class="col-xs-12 col-sm-6">
																  	<div class="form-group">
																		<div class="row">
																			<div class="col-xs-12 col-md-4">
																		    	<input type="text" class="form-control hora" id="hora_desayuno" name="hora_desayuno" placeholder="Hora" value="<?php echo set_value('hora_desayuno'); ?>" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}">
																		    	<div class="help-block with-errors">
																				</div>
																		    </div>
																			<div class="col-xs-12 col-md-4">
																				<select class="form-control" id="h_d_meridiano" name="h_d_meridiano">
																					<option> </option>
																					<option value="am" <?php echo set_select('h_d_meridiano', 'am'); ?>>am</option>
																					<option value="pm" <?php echo set_select('h_d_meridiano', 'pm'); ?>>pm</option>
																				</select>
																				<div class="help-block with-errors">
																				</div>
																			</div>
																		</div>
																	</div>	
													  				
													  			</div>
													  		</div>
													  	</h4>
													  </li>
													  <li class="list-group-item" id="DM">
													  	<h4>
													  		<div class="row">
													  			<div class="col-xs-12 col-sm-6">	
													  				Merienda
													  			</div>
													  			<div class="col-xs-12 col-sm-6">
																  	<div class="form-group">
																		<div class="row">
																			<div class="col-xs-12 col-md-4">
																		    	<input type="text" class="form-control hora" id="hora_merienda_desayuno" name="hora_merienda_desayuno" placeholder="Hora" value="<?php echo set_value('hora_merienda_desayuno'); ?>" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}">
																		    	<div class="help-block with-errors">
																				</div>
																		    </div>
																			<div class="col-xs-12 col-md-4">
																				<select class="form-control" id="h_m_d_meridiano" name="h_m_d_meridiano">
																					<option> </option>
																					<option value="am" <?php echo set_select('h_m_d_meridiano', 'am'); ?>>am</option>
																					<option value="pm" <?php echo set_select('h_m_d_meridiano', 'pm'); ?>>pm</option>
																				</select>
																				<div class="help-block with-errors">
																				</div>
																			</div>
																		</div>
																	</div>	
													  				
													  			</div>
													  		</div>
													  	</h4>
													  </li>
												</ul>
										   </div>
										    <div role="tabpanel" class="tab-pane" id="almuerzo">
										    	<ul class="list-group">
													  <li class="list-group-item" id="A">
													  	<h4>
													  		<div class="row">
													  			<div class="col-xs-12 col-sm-6">	
													  				Almuerzo
													  			</div>
													  			<div class="col-xs-12 col-sm-6">
																  	<div class="form-group">
																		<div class="row">
																			<div class="col-xs-12 col-md-4">
																		    	<input type="text" class="form-control hora" id="hora_almuerzo" name="hora_almuerzo" placeholder="Hora" value="<?php echo set_value('hora_almuerzo'); ?>" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}">
																		    	<div class="help-block with-errors">
																				</div>
																		    </div>
																			<div class="col-xs-12 col-md-4">
																				<select class="form-control" id="h_a_meridiano" name="h_a_meridiano">
																					<option> </option>
																					<option value="am" <?php echo  set_select('h_a_meridiano', 'am'); ?>>am</option>
																					<option value="pm" <?php echo set_select('h_a_meridiano', 'pm'); ?>>pm</option>
																				</select>
																				<div class="help-block with-errors">
																				</div>
																			</div>
																		</div>
																	</div>	
													  				
													  			</div>
													  		</div>
													  	</h4>
													  </li>
													  <li class="list-group-item" id="AM">
													  	<h4>
													  		<div class="row">
													  			<div class="col-xs-12 col-sm-6">	
													  				Merienda
													  			</div>
													  			<div class="col-xs-12 col-sm-6">
																  	<div class="form-group">
																		<div class="row">
																			<div class="col-xs-12 col-md-4">
																		    	<input type="text" class="form-control hora" id="hora_merienda_almuerzo" name="hora_merienda_almuerzo" placeholder="Hora" value="<?php echo set_value('hora_merienda_almuerzo'); ?>" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}">
																		    	<div class="help-block with-errors">
																				</div>
																		    </div>
																			<div class="col-xs-12 col-md-4">
																				<select class="form-control" id="h_m_a_meridiano" name="h_m_a_meridiano">
																					<option> </option>
																					<option value="am" <?php echo set_select('h_m_a_meridiano', 'am'); ?>>am</option>
																					<option value="pm" <?php echo set_select('h_m_a_meridiano', 'pm'); ?>>pm</option>
																				</select>
																				<div class="help-block with-errors">
																				</div>
																			</div>
																		</div>
																	</div>	
													  				
													  			</div>
													  		</div>
													  	</h4>
													  </li>
												</ul>
										    </div>
										    <div role="tabpanel" class="tab-pane" id="cena">
										    	<ul class="list-group">
													  <li class="list-group-item" id="C">
													  	<h4>
													  		<div class="row">
													  			<div class="col-xs-12 col-sm-6">	
													  				Cena
													  			</div>
													  			<div class="col-xs-12 col-sm-6">
																  	<div class="form-group">
																		<div class="row">
																			<div class="col-xs-12 col-md-4">
																		    	<input type="text" class="form-control hora" id="hora_cena" name="hora_cena" placeholder="Hora" value="<?php echo set_value('hora_cena'); ?>" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}">
																		    	<div class="help-block with-errors">
																				</div>
																		    </div>
																			<div class="col-xs-12 col-md-4">
																				<select class="form-control" id="h_c_meridiano" name="h_c_meridiano">
																					<option> </option>
																					<option value="am" <?php echo set_select('h_c_meridiano', 'am'); ?>>am</option>
																					<option value="pm" <?php echo set_select('h_c_meridiano', 'pm'); ?>>pm</option>
																				</select>
																				<div class="help-block with-errors">
																				</div>
																			</div>
																		</div>
																	</div>	
													  				
													  			</div>
													  		</div>
													  	</h4>
													  </li>
													  <li class="list-group-item" id="CM"><h4>
													  		<div class="row">
													  			<div class="col-xs-12 col-sm-6">	
													  				Merienda
													  			</div>
													  			<div class="col-xs-12 col-sm-6">
																  	<div class="form-group">
																		<div class="row">
																			<div class="col-xs-12 col-md-4">
																		    	<input type="text" class="form-control hora" id="hora_merienda_cena" name="hora_merienda_cena" placeholder="Hora" value="<?php echo set_value('hora_merienda_cena'); ?>" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}">
																		    	<div class="help-block with-errors">
																				</div>
																		    </div>
																			<div class="col-xs-12 col-md-4">
																				<select class="form-control" id="h_m_c_meridiano" name="h_m_c_meridiano" >
																					<option> </option>
																					<option value="am" <?php echo set_select('h_m_c_meridiano', 'am'); ?>>am</option>
																					<option value="pm" <?php echo set_select('h_m_c_meridiano', 'pm'); ?>>pm</option>
																				</select>
																				<div class="help-block with-errors">
																				</div>
																			</div>
																		</div>
																	</div>	
													  				
													  			</div>
													  		</div>
													  	</h4>
													  </li>
												</ul>
										    </div>
										  </div>

								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								      </div>
								    </div>
								  </div>
								</div>
							<?php echo form_close(); ?>
						</div>
		        	</div>		        	
		        </div>

		        <div class="box-footer">
					<a href="<?php echo base_url(); ?>PlanesAlimenticios/ListarPlanAlimenticio" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="registro-planes" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
	
</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	var select_raciones = [];
	var menu_data = [];

	$("#hora_inicio").mask("99:99",{placeholder: "00:00"});

	$(".agregar-fila").on("click", function(event){
		event.preventDefault();/*el elemento del boton lo anula*/
		var contenedor = $(this).closest('.panel-body'),
			lista = contenedor.find('.raciones-contentt'),
			id_sustituto = $(this).data('id_sustituto'), 
			request;

		if(request){
			request.abort();
		}

		request= $.ajax({
			url:"<?php echo base_url();?>PlanesAlimenticios/AgregarFilaRacion",
			type: "POST",
			data:"id_sustituto="+id_sustituto
		});
		request.done(function(response,textStatus,jqXRH){
			lista.append(response);
		});
		request.fail(function(jqXRH,textStatus,thrown){
			alert("error:"+textStatus);
		});
	});


	$(".tab-link").on("click", function(event){
		var radio = $(this).find('input[type=radio]');
		radio.prop("checked",true);
	});

	$(".tab-link .radio input[type=radio]").on("click", function(event){
		$(this).prop("checked",true);
	});

	$(".raciones-contentt").on("click", ".fila .col-xs-1 .quitar-fila", function(event){
		event.preventDefault();
		var boton = $ (this),
			fila = boton.closest('.fila');
		fila.remove();
	});
	//para generar el arreglo para imprimir el menú para los paciente
	$(".raciones-contentt").on("change", ".row .col-xs-11 .racion", function(event){
		event.preventDefault();
		var select = $ (this),
		menu_data= armarArregloMenu(select);
		//menu_data= pushSustituto(sustituto, menu_data);
		mostrarMenu(menu_data);
		console.log(menu_data);
		//select_raciones[id_sustituto] = [],
		//select_raciones[id_sustituto].push(valor);
	
		//console.log(sustituto); 
		//seleccionados(select_raciones[id_sustituto], fila);
	});

	$(".raciones-contentt").on("change", ".row .col-xs-11 .medida", function(event){
		event.preventDefault();
		var select = $ (this),
			menu_data= armarArregloMenu(select);
			//menu_data= pushSustituto(sustituto, menu_data);
			mostrarMenu(menu_data);
			console.log(menu_data);
	});

	$(".raciones-contentt").on("change", ".row .col-xs-11 .table-responsive .equivalente", function(event){
		event.preventDefault();
		var select = $ (this),
			menu_data= armarArregloMenu(select);
			//menu_data= pushSustituto(sustituto, menu_data);
			mostrarMenu(menu_data);
			console.log(menu_data);
	});

	function armarArregloMenu(select){
		var fila = select.closest('.panel-group'),
			id_panel_group= fila.attr("id"),
			arr_sustitutos= [];

			$("#"+id_panel_group+" .panel-default").each(function(index,value){

				var titulo_sustituto= $(this).find('.panel-title').text().trim(),
					id_sustituto = $(this).find('.id_sustituto').val(),

					sustituto= {
						idsustituto: id_sustituto,
						titulo: titulo_sustituto,
						raciones: obtenerRaciones(id_sustituto),
						medidas: obtenerMedidas(id_sustituto),
						equivalentes: obtenerEquivalentes(id_sustituto)
					}
				arr_sustitutos.push(sustituto);
			});
		console.log(arr_sustitutos);
		return arr_sustitutos;
	}
	function obtenerRaciones(id_sustituto){
		var raciones=[];
		$("#collapse2"+id_sustituto+" .raciones-contentt .fila .racion").each(function(i,b){
			var racion= $(this).find('option:selected').text().trim();
			raciones.push(racion);
		});
		return raciones;
	}

	function obtenerMedidas(id_sustituto){
		var medidas=[];
		$("#collapse2"+id_sustituto+" .raciones-contentt .fila .medida").each(function(i,b){
			var medida= $(this).find('option:selected').text().trim();
			medidas.push(medida);
		});
		return medidas;
	}

	function obtenerEquivalentes(id_sustituto){
		var equivalente_d=[],
			equivalente_dm=[],
			equivalente_a=[],
			equivalente_am=[],
			equivalente_c=[],
			equivalente_cm=[];

		$("#collapse2"+id_sustituto+" .raciones-contentt .fila .table-responsive .equivalente-d").each(function(i,b){
			var equivalente= $(this).find('option:selected').text().trim();
			equivalente_d.push(equivalente);
		});

		$("#collapse2"+id_sustituto+" .raciones-contentt .fila .table-responsive .equivalente-dm").each(function(i,b){
			var equivalente= $(this).find('option:selected').text().trim();
			equivalente_dm.push(equivalente);
		});

		$("#collapse2"+id_sustituto+" .raciones-contentt .fila .table-responsive .equivalente-a").each(function(i,b){
			var equivalente= $(this).find('option:selected').text().trim();
			equivalente_a.push(equivalente);
		});

		$("#collapse2"+id_sustituto+" .raciones-contentt .fila .table-responsive .equivalente-am").each(function(i,b){
			var equivalente= $(this).find('option:selected').text().trim();
			equivalente_am.push(equivalente);
		});

		$("#collapse2"+id_sustituto+" .raciones-contentt .fila .table-responsive .equivalente-c").each(function(i,b){
			var equivalente= $(this).find('option:selected').text().trim();
			equivalente_c.push(equivalente);
		});

		$("#collapse2"+id_sustituto+" .raciones-contentt .fila .table-responsive .equivalente-cm").each(function(i,b){
			var equivalente= $(this).find('option:selected').text().trim();
			equivalente_cm.push(equivalente);
		});
		var equivalentes={
			d: equivalente_d,
			dm: equivalente_dm,
			a: equivalente_a,
			am: equivalente_am,
			c: equivalente_c,
			cm: equivalente_cm
		}
		return equivalentes;
	}

	function pushSustituto(sustituto, menu_data){
		if (menu_data.length>0){
			var finded= false;
			$.each(menu_data, function(i,v){
				if(v.idsustituto == sustituto.idsustituto){
					finded=true;
					menu_data[i].raciones=sustituto.raciones;
					menu_data[i].medidas=sustituto.medidas;
					menu_data[i].equivalentes=sustituto.equivalentes;
				}
			});

			if(!finded){
				menu_data.push(sustituto);
			}
			
		} else{ 
			menu_data.push(sustituto);
		}
		return menu_data;
	}

	function mostrarMenu(menu_data){
		$.each(menu_data,function(i,v){
			var desayuno="",
				merienda_d="",
				almuerzo="",
				merienda_a="",
				cena="",
				merienda_c="";
			$.each(v.raciones,function(index,value){
				if (v.equivalentes.d[index] !='') {
					desayuno+="<p>"+v.equivalentes.d[index]+" "+v.medidas[index]+" de "+value+". Lista "+v.idsustituto+"</p>";
				}
				if (v.equivalentes.dm[index] !='') {
					merienda_d+="<p>"+v.equivalentes.dm[index]+" "+v.medidas[index]+" de "+value+". Lista "+v.idsustituto+"</p>";
				}
				if (v.equivalentes.a[index] !='') {
					almuerzo+="<p>"+v.equivalentes.a[index]+" "+v.medidas[index]+" de "+value+". Lista "+v.idsustituto+"</p>";
				}
				if (v.equivalentes.am[index] !='') {
					merienda_a+="<p>"+v.equivalentes.am[index]+" "+v.medidas[index]+" de "+value+". Lista "+v.idsustituto+"</p>";
				}
				if (v.equivalentes.c[index] !='') {
					cena+="<p>"+v.equivalentes.c[index]+" "+v.medidas[index]+" de "+value+". Lista "+v.idsustituto+"</p>";
				}
				if (v.equivalentes.cm[index] !='') {
					merienda_c+="<p>"+v.equivalentes.cm[index]+" "+v.medidas[index]+" de "+value+". Lista "+v.idsustituto+"</p>";
				}				
			});
			if (desayuno!= "") {
				if ($("#desayuno_"+v.idsustituto).length>0) {
					$("#desayuno_"+v.idsustituto).find('.iten-lista').html(desayuno);
				}else{
					var elemento="<div id=\"desayuno_"+v.idsustituto+"\"><div class=\"iten-lista\">"+desayuno+"</div></div>";
					$("#D").append(elemento);
				}
			}else{
				$("#desayuno_"+v.idsustituto).find('.iten-lista').html(desayuno);
			} 

				
			if (merienda_d!= "") {
				if ($("#merienda_d_"+v.idsustituto).length>0) {
					$("#merienda_d_"+v.idsustituto).find('.iten-lista').html(merienda_d);
				}else{
					var elemento="<div id=\"merienda_d_"+v.idsustituto+"\"><div class=\"iten-lista\">"+merienda_d+"</div></div>";
					$("#DM").append(elemento);
				}
			} else{ 
				$("#merienda_d_"+v.idsustituto).find('.iten-lista').html(merienda_d);
			}

			if (almuerzo!= "") {
				if ($("#almuerzo_"+v.idsustituto).length>0) {
					$("#almuerzo_"+v.idsustituto).find('.iten-lista').html(almuerzo);
				}else{
					var elemento="<div id=\"almuerzo_"+v.idsustituto+"\"><div class=\"iten-lista\">"+almuerzo+"</div></div>";
					$("#A").append(elemento);
				}
			}else{
				$("#almuerzo_"+v.idsustituto).find('.iten-lista').html(almuerzo);
			}

			if (merienda_a!= "") {
				if ($("#merienda_a_"+v.idsustituto).length>0) {
					$("#merienda_a_"+v.idsustituto).find('.iten-lista').html(merienda_a);
				}else{
					var elemento="<div id=\"merienda_a_"+v.idsustituto+"\"><div class=\"iten-lista\">"+merienda_a+"</div></div>";
					$("#AM").append(elemento);
				}
			}else{
				$("#merienda_a_"+v.idsustituto).find('.iten-lista').html(merienda_a);
			}
			if (cena!= "") {
				if ($("#cena_"+v.idsustituto).length>0) {
					$("#cena_"+v.idsustituto).find('.iten-lista').html(cena);
				}else{
					var elemento="<div id=\"cena_"+v.idsustituto+"\"><div class=\"iten-lista\">"+cena+"</div></div>";
					$("#C").append(elemento);
				}
			}else{
				$("#cena_"+v.idsustituto).find('.iten-lista').html(cena);
			}

			if (merienda_c!= "") {
				if ($("#merienda_c_"+v.idsustituto).length>0) {
					$("#merienda_c_"+v.idsustituto).find('.iten-lista').html(merienda_c);
				}else{
					var elemento="<div id=\"merienda_c_"+v.idsustituto+"\"><div class=\"iten-lista\">"+merienda_c+"</div></div>";
					$("#CM").append(elemento);					
				}
			}else{
				$("#merienda_c_"+v.idsustituto).find('.iten-lista').html(merienda_c);
			}			
		});
	}


	$(".raciones-contentt .fila .chosenselect").chosen({ width: "100%"});
	
	$("#Recomendaciones").on("click", function(event){
		event.preventDefault();/*el elemento del boton lo anula*/
	});

	function seleccionados(arr_select, elemento) {
		elemento.find('.fila').each(function(i,v){
			var select = $(this).find('.racion');
			select.find('option').each(function(index, value){
				if (select.val() != $(this).attr('value') && $.inArray($(this).attr('value'), arr_select) > -1) {
					$(this).prop('disabled',true);
				}else{
					$(this).prop('disabled',false);
				}
			});
		});
	}
	$(".hora").mask("99:99",{placeholder:"00:00"}); 
});
</script>
