<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<!-- Título del formulario -->
			<div class="col-sm-12">
				<h1><?php echo $titulo; ?></h1>
			</div><!--/ Título del formulario -->

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

			<!-- Instrucciones para el usuario -->
			<div id="form-noticia-instruction" class="col-sm-3 form-instructions">
				<div class="col-sm-12 istruction-content">					
					<!-- Título -->
					<div class="title">
						<h3>Instrucciones</h3>
					</div><!--/ Título -->

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

			<!-- Formulario -->
			<div class="col-sm-6">
				<?php
					$url =  base_url()."Evento/".$this->uri->segment(2, 0);
					if ($this->uri->segment(3, 0) != "0") {
						$url .= "/".$this->uri->segment(3, 0);
					}

					echo form_open_multipart(
	      				$url,
	      				'class="form-basic" id="registro-evento"'
	      				); ?>

	      			<!-- Campo Título -->
					<div class="col-sm-12">
						<div class="form-group">
							<label for="titulo" class="control-label"><span class="red">*</span> Títitulo</label>
						    <input type="text" class="form-control" id="titulo" name="titulo" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{6,30}" value="<?php echo (isset($evento['titulo']))? $evento['titulo'] : set_value('titulo'); ?>" minlength="6" maxlength="30" placeholder="" required="required">
						    <div class="help-block with-errors">
							</div>	
						</div>						
					</div><!--/ Campo Título -->

					<!-- Campo Fecha-hora de inicio -->
					<div class="col-xs-12">
						<div class="row">	
							<!-- Fecha de inicio -->						
							<div class="col-xs-12 col-sm-6 col-md-5">
								<div class="form-group">
									<label for="fecha_inicio" class="control-label"><span class="red">*</span> Fecha de inicio</label>
								    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" min="<?php echo date('Y-m-d');?>" value="<?php echo (isset($evento['fecha_inicio']))? $evento['fecha_inicio'] : set_value('fecha_inicio'); ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required="required">
		                				<div class="help-block with-errors">
									  </div>
								</div>
							</div><!--/ Fecha de inicio -->	

							<!-- Hora de inicio -->
							<div class="col-xs-12 col-sm-6 col-md-7">
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12">
											<label for="hora_inicio" class="control-label"><span class="red">*</span> Hora de inicio</label>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6">
									    	<input type="text" class="form-control" id="hora_inicio" name="hora_inicio" required="required" placeholder="Hora (02:15)" value="<?php echo (isset($evento['hora_inicio']))? $evento['hora_inicio'] : set_value('hora_inicio'); ?>" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}">
									    	<div class="help-block with-errors">
											</div>
									    </div>
										<div class="col-xs-12 col-sm-6 col-md-6">
											<select class="form-control" id="h_i_meridiano" name="h_i_meridiano" required="required">
												<option>Meridiano</option>
												<option value="am" <?php echo (isset($evento['h_i_meridiano']) && $evento['h_i_meridiano'] == 'am')? "selected=\"selected\"" : set_select('h_i_meridiano', 'am'); ?>>am</option>
												<option value="pm" <?php echo (isset($evento['h_i_meridiano']) && $evento['h_i_meridiano'] == 'pm')? "selected=\"selected\"" : set_select('h_i_meridiano', 'pm'); ?>>pm</option>
											</select>
											<div class="help-block with-errors">
											</div>
										</div>
									</div>
								</div>	
							</div><!--/ Hora de inicio -->
						</div>
					</div><!--/ Campo Fecha-hora de inicio -->

					<!-- Campo Fecha-hora de finalización -->
					<div class="col-xs-12">
						<div class="row">	
							<!-- Fecha de finalización -->						
							<div class="col-xs-12 col-sm-6 col-md-5">
								<div class="form-group">
									<label for="fecha_fin" class="control-label"><span class="red">*</span> Fecha de finalización</label>
								    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" min="<?php echo date('Y-m-d');?>" value="<?php echo (isset($evento['fecha_fin']))? $evento['fecha_fin'] : set_value('fecha_fin'); ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required="required">
								    <div class="help-block with-errors">
									</div>
								</div>
							</div><!--/ Fecha de finalización -->

							<!-- Hora de finalización -->
							<div class="col-xs-12 col-sm-6 col-md-7">
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12">
											<label for="hora_fin" class="control-label"><span class="red">*</span> Hora de finalización</label>
										</div>								
										<div class="col-xs-12 col-sm-6 col-md-6">
									    	<input type="text" class="form-control" id="hora_fin" name="hora_fin" required="required" placeholder="Hora (02:15)" value="<?php echo (isset($evento['hora_fin']))? $evento['hora_fin'] : set_value('hora_fin'); ?>" pattern="(?:0(?![0])|1(?![3-9])){1}\d{1}:[0-5]{1}\d{1}">
									    	<div class="help-block with-errors">
											  </div>
									  </div>
										<div class="col-xs-12 col-sm-4 col-md-6">
											<select class="form-control" id="h_f_meridiano" name="h_f_meridiano" required="required">
												<option>Meridiano</option>
												<option value="am" <?php echo (isset($evento['h_f_meridiano']) && $evento['h_f_meridiano'] == 'am')? "selected=\"selected\"" : set_select('h_f_meridiano', 'am'); ?>>am</option>
												<option value="pm" <?php echo (isset($evento['h_f_meridiano']) && $evento['h_f_meridiano'] == 'pm')? "selected=\"selected\"" : set_select('h_f_meridiano', 'pm'); ?>>pm</option>
											</select>
											<div class="help-block with-errors">
											</div>
										</div>
									</div>
								</div>
							</div><!--/ Hora de finalización -->

						</div>
					</div><!--/ Campo Fecha-hora de finalización -->

					<!-- Campo Descripción -->
					<div class="col-sm-12">			
						<div class="form-group">
							<label for="descripcion" class="control-label"><span class="red">*</span> Descripción</label>
						    <textarea class="form-control" name="descripcion" id="descripcion" minlength="12" required="required" ><?php echo (isset($evento['descripcion']))? trim($evento['descripcion']) : trim(set_value('descripcion')); ?></textarea>	
						    <div class="help-block with-errors">
							</div>
						</div>
					</div><!--/ Campo Descripción -->

					<!-- Campo Imagen -->
					<?php 
						if (isset($evento)) {
					?>
					<div class="col-xs-12" id="imagen-content">
						<?php if (isset($evento['img']) && ($evento['img']) != null || $evento['img'] != "") { ?>
						<figure>
							<img src="<?php echo base_url().'assets/img/eventos/'.$evento['img']; ?>" alt="<?php echo $evento['img']; ?>">
						</figure>
						<?php }else{ ?>
						<h4>No ha cargado una imagen para este evento...</h4>
						<?php } ?>
						<div class="checkbox">
						    <label>
						        <input type="checkbox" name="img-change" id="img-change" value="1"> Editar imagen
						    </label>
    					</div>
						<div class="form-group hidden">
							<label for="imagen" class="control-label">Imagen</label>
							<input name="imagen" id="imagen" class="form-control" type="file" accept="image/*" >
						</div>
					</div>
					<?php 
						}else{
					?>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="imagen" class="control-label">Imagen</label>
							<input name="imagen" id="imagen" class="form-control" type="file" accept="image/*">
						</div>
					</div>	
					<?php 
						}
					?>
					<!--/ Campo Imagen -->

					<div class="col-sm-12">						
						<small> 
							<span class="red2">Los campos con (*) son obligatorios.</span>
						</small>
					</div>				
					<hr class="form-divisor-line">

					<!-- Botones -->
					<div class="col-sm-12">
						<div class="col-sm-6 col-sm-offset-3">
							<button id="guardar" type="submit" class="btn btn-form btn-lg btn-block">Guardar</button>
							<a href="<?php echo base_url(); ?>Evento/ListarEventos" class="btn btn-second-2 btn-lg btn-block">Cancelar</a>
						</div>						
					</div><!--/ Botones -->

				<?php echo form_close();?>			
			</div><!--/ Formulario -->
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-evento.js"></script>
<?php include('footer.php') ?>