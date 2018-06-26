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
									Para registrar un nuevo evento deberá llenar los campos de acuerdo a las siguientes indicaciones:
								</p>
								<!-- Panel de descripción de campos -->
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					    			<!-- Descripción campo Título -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading1">
									      	<h4 class="panel-title">
									      		Título
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 6 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 30 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Título -->

								  	<!-- Descripción campo Fecha inicio -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading2">
									      	<h4 class="panel-title">
									      		Fecha inicio
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Formato:</b> Fecha aaaa-mm-dd (ejemp.: 2017-08-24).</li>
									      			<li><b>Condición:</b> La fecha ingresada no puede ser anterior a la fecha actual.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Fecha inicio -->

								  	<!-- Descripción campo Hora inicio -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading3">
									      	<h4 class="panel-title">
									      		Hora inicio
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Formato:</b> Hora hh:mm (ejemp.: 02:30).</li>
									      			<li><b>Meridiano:</b> AM o PM. Obligatorio.</li>
									      			<li><b>Condición:</b> La combinación entre la hora y la fecha de inicio debe ser posterior a la hora y fecha actuales.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Hora inicio -->

								  	<!-- Descripción campo Fecha finalización -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading4">
									      	<h4 class="panel-title">
									      		Fecha finalización
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Formato:</b> Fecha aaaa-mm-dd (ejemp.: 2017-08-24).</li>
									      			<li><b>Condición:</b> La fecha ingresada no puede ser anterior a la fecha actual ni a la fecha de inicio.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Fecha finalización -->

								  	<!-- Descripción campo Hora finalización -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading5">
									      	<h4 class="panel-title">
									      		Hora finalización
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Formato:</b> Hora hh:mm (ejemp.: 02:30).</li>
									      			<li><b>Meridiano:</b> AM o PM. Obligatorio.</li>
									      			<li><b>Condición:</b> La combinación entre la hora y la fecha de finalización debe ser posterior a la hora y fecha actuales y a la hora y fecha de inicio del evento.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Hora finalización -->

								  	<!-- Descripción campo Descripción -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading6">
									      	<h4 class="panel-title">
									      		Descripción
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 12 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales.</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Descripción -->

								  	<!-- Descripción campo Imagen -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="heading7">
									      	<h4 class="panel-title">
									      		Imagen
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Archivo de tipo imagen.</li>
									      			<li><b>Fromatos permitidos:</b> JPG, PNG y GIF.</li>
									      			<li><b>Campo opcional.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Imagen -->

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
							       													<select required class="form-control media" name="medida[<?php echo $sustituto['id']; ?>][]">
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
																									<select class="form-control equivalente-d" name="equivalente[<?php echo $sustituto['id']; ?>][1][]">
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
																									<select class="form-control equivalente-dm" name="equivalente[<?php echo $sustituto['id']; ?>][2][]">
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
																									<select class="form-control equivalente-a" name="equivalente[<?php echo $sustituto['id']; ?>][3][]">
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
																									<select class="form-control equivalente-am" name="equivalente[<?php echo $sustituto['id']; ?>][4][]">
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
																									<select class="form-control equivalente-c" name="equivalente[<?php echo $sustituto['id']; ?>][5][]">
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
																									<select class="form-control equivalente-cm" name="equivalente[<?php echo $sustituto['id']; ?>][6][]">
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

							<?php echo form_close(); ?>
						</div>
		        	</div>		        	
		        </div>

		        <div class="box-footer">
					<a href="<?php echo base_url(); ?>Citas/ListarCitas" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="registro-planes" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
	
</section>
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
			  	<?php foreach ($recomendaciones as $key => $recomendacion) { ?>
			 	<div role="tabpanel" class="tab-pane" id="<?php echo strtolower(str_replace(" ", "_",$recomendacion['descripcion']))?>">
			 		<ol>
					<?php foreach ($lista_recomendaciones[$recomendacion['id']] as $key => $lista) { ?> 
						<li>
							<?php echo $lista['descripcion']; ?>
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
        <button type="button" class="btn btn-primary">Guardar</button>
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
		    	<div class="col-sm-12" id="D">
		    		aqui  3
				</div>
				<div class="col-sm-12" id="DM"></div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="almuerzo">
		    	<div class="col-sm-12" id="A">aqui2</div>
				<div class="col-sm-12" id="AM"></div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="cena">
		    	<div class="col-sm-12" id="C">aqui 1</div>
				<div class="col-sm-12" id="CM"></div>
		    </div>
		  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var select_raciones = [];
	var menu_data = [];
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

	$(".raciones-contentt").on("change", ".row .col-xs-11 .racion", function(event){
		event.preventDefault();
		var select = $ (this),
			fila = select.closest('.raciones-contentt'),
			valor = select.val(),
			id_sustituto = fila.find('.id_sustituto').val();
		select_raciones[id_sustituto] = [];
		select_raciones[id_sustituto].push(valor);
		console.log(select_raciones);
		seleccionados(select_raciones[id_sustituto], fila);
	});
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
});
</script>
