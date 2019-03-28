<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Órdenes de exámenes</li>
    <li class="active"><?php echo $titulo; ?></li>
  </ol>
</section>

<!-- Main content -->
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
		<div class="col-xs-12 col-sm-8">
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
								$url =  base_url()."Examenes/".$this->uri->segment(2, 0);
								if ($this->uri->segment(3, 0) != "0") {
									$url .= "/".$this->uri->segment(3, 0);
								}

								if ($this->uri->segment(4, 0) != "0") {
									$url .= "/".$this->uri->segment(4, 0);
								}

								echo form_open_multipart(
				      				$url,
				      				'id="registro-examen-orina"'
				      				); ?>
				      				<!--offset-8 permite que me de un espacio de 8 hacia la izquierda -->
				      			<div class="col-xs-12 col-sm-6">
				      				<p id="msj" class="text-danger"></p>
				      			</div>
				      			<input type="hidden" name="id_orden" id="id" value="<?php echo $orden['id']; ?>">
				      			<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Datos del Paciente</h3>
				       					</div>
		        						<div class="box-body">
		        							<div class="row">
		        								<div class="col-sm-6">
		        									<div class="form-group">
		        										<label><span class="red">*</span> Nombre:</label>
		        										<input type="text" class="form-control" id="nombre" name="nombre" pattern='[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}' title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo $orden['nombre1'] . " " . $orden['apellido1']; ?>" required data-error="Debe llenar este campo." data-pattern-error="El nombre sólo puede tener caracteres alfabéticos" readonly="">
		        									</div>
		        								</div>
		        								<div class="col-sm-6">
		        									<div class="form-group">
		        										<label><span class="red">*</span> Fecha:</label>
		        										<input type="date" class="form-control" id="fecha" name="fecha" placeholder="" value="<?php echo date('Y-m-d'); ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required data-error="Debe llenar este campo." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)" readonly="">
		        									</div>
		        								</div>
		        							</div>
		        						</div>
		        					</div>
				      			</div>

				      			<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Análisis físico</h3>
				       					</div>
		        						<div class="box-body">
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Aspecto</label>
		        										<div class="radio">
														  	<label>
														    	<input type="radio" name="aspecto" value="Claro" <?php echo ((isset($examen['aspecto']) && $examen['aspecto'] == 'Claro') || (isset($_POST['aspecto']) && $_POST['aspecto'] == 'Claro'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Claro
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="aspecto" value="Límpido" <?php echo ((isset($examen['aspecto']) && $examen['aspecto'] == 'Límpido') || (isset($_POST['aspecto']) && $_POST['aspecto'] == 'Límpido'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Límpido
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="aspecto" value="Ligeramente turbio" <?php echo ((isset($examen['aspecto']) && $examen['aspecto'] == 'Ligeramente turbio') || (isset($_POST['aspecto']) && $_POST['aspecto'] == 'Ligeramente turbio'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Ligeramente turbio
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="aspecto" value="Turbio" <?php echo ((isset($examen['aspecto']) && $examen['aspecto'] == 'Turbio') || (isset($_POST['aspecto']) && $_POST['aspecto'] == 'Turbio'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Turbio
														  	</label>
														</div>
														<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Color</label>
		        										<div class="radio">
														  	<label>
														    	<input type="radio" name="color" value="Amarillo" <?php echo ((isset($examen['color']) && $examen['color'] == 'Amarillo') || (isset($_POST['color']) && $_POST['color'] == 'Amarillo'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Amarillo
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="color" value="Amarillo intenso" <?php echo ((isset($examen['color']) && $examen['color'] == 'Amarillo intenso') || (isset($_POST['color']) && $_POST['color'] == 'Amarillo intenso'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Amarillo intenso
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="color" value="Ámbar" <?php echo ((isset($examen['color']) && $examen['color'] == 'Ámbar') || (isset($_POST['color']) && $_POST['color'] == 'Ámbar'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Ámbar
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="color" value="Rojizo" <?php echo ((isset($examen['color']) && $examen['color'] == 'Rojizo') || (isset($_POST['color']) && $_POST['color'] == 'Rojizo'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Rojizo
														  	</label>
														</div>
														<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Cantidad</label>
		        										<div class="radio">
														  	<label>
														    	<input type="radio" name="cantidad" value="Muestra parcial" <?php echo ((isset($examen['cantidad']) && $examen['cantidad'] == 'Muestra parcial') || (isset($_POST['cantidad']) && $_POST['cantidad'] == 'Muestra parcial'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Muestra parcial
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="cantidad" value="Muestra insuficiente" <?php echo ((isset($examen['cantidad']) && $examen['cantidad'] == 'Muestra insuficiente') || (isset($_POST['cantidad']) && $_POST['cantidad'] == 'Muestra insuficiente'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Muestra insuficiente
														  	</label>
														</div>
														<div class="help-block with-errors">
										      			</div>
		        									</div>
		        									<div class="form-group">
		        										<input type="number" class="form-control" name="densidad" id="densidad" min="1000" max="1030" step="any" placeholder="Densidad" value="<?php echo (isset($examen['densidad']))? $examen['densidad'] : set_value('densidad'); ?>" required data-error="Debe llenar este campo.">
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<div class="input-group">
		        											<div class="input-group-addon">
		        												<span class="red">*</span> <b>PH</b>
		        											</div>
		        											<input type="number" name="ph" id="ph" class="form-control" min="0" max="8" step="any" value="<?php echo (isset($examen['ph']))? $examen['ph'] : set_value('ph'); ?>" required data-error="Debe llenar este campo.">
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<input type="text" name="reaccion" id="reaccion" class="form-control" placeholder="Reacción" value="<?php echo (isset($examen['reaccion']))? $examen['reaccion'] : set_value('reaccion'); ?>" readonly required data-error="Debe llenar este campo.">
														<div class="help-block with-errors">
											      		</div>
		        									</div>
		        								</div>
		        							</div>
		        						</div>
		        					</div>
		        				</div>

		        				<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Análisis químico</h3>
				       					</div>
		        						<div class="box-body">
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Acetona</label>
		        										<?php $attr = "class=\"form-control\" id=\"acetona\" required data-error=\"Debe llenar este campo.\"" ?>
		        										<?php echo form_dropdown('acetona', $select_ntp, set_value('acetona'), $attr); ?>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Bilirrubina</label>
		        										<?php $attr = "class=\"form-control\" id=\"bilirrubina\" required data-error=\"Debe llenar este campo.\"" ?>
		        										<?php echo form_dropdown('bilirrubina', $select_ntp, set_value('bilirrubina'), $attr); ?>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Glucosa</label>
														<?php $attr = "class=\"form-control\" id=\"glucosa\" required data-error=\"Debe llenar este campo.\"" ?>
		        										<?php echo form_dropdown('glucosa', $select_ntp, set_value('glucosa'), $attr); ?>
		        										<div class="help-block with-errors">
										      			</div>			
		        									</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Hemoglobina</label>
														<?php $attr = "class=\"form-control\" id=\"hemoglobina\" required data-error=\"Debe llenar este campo.\"" ?>
		        										<?php echo form_dropdown('hemoglobina', $select_ntp, set_value('hemoglobina'), $attr); ?>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Proteínas</label>
														<?php $attr = "class=\"form-control\" id=\"proteinas\" required data-error=\"Debe llenar este campo.\"" ?>
		        										<?php echo form_dropdown('proteinas', $select_ntp, set_value('proteinas'), $attr); ?>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Urobilinógeno</label>
														<?php $attr = "class=\"form-control\" id=\"urobilinogeno\" required data-error=\"Debe llenar este campo.\"" ?>
		        										<?php echo form_dropdown('urobilinogeno', $select_ntp, set_value('urobilinogeno'), $attr); ?>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-8">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Nitritos</label>
		        										<div class="radio">
			        										<label class="radio-inline">
															  	<input type="radio" name="nitritos" value="-" <?php echo ((isset($examen['nitritos']) && $examen['nitritos'] == '-') || (isset($_POST['nitritos']) && $_POST['nitritos'] == '-'))? "checked" : ""; ?> required data-error="Debe llenar este campo."> Negativo
															</label>
															<label class="radio-inline">
															  	<input type="radio" name="nitritos" value="+" <?php echo ((isset($examen['nitritos']) && $examen['nitritos'] == '+') || (isset($_POST['nitritos']) && $_POST['nitritos'] == '+'))? "checked" : ""; ?> required data-error="Debe llenar este campo."> Positivo
															</label>
														</div>
														<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        							</div>
		        						</div>
		        					</div>
		        				</div>

				       			<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Análisis microscópico</h3>
				       					</div>
		        						<div class="box-body">
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Leucocitos</label>
		        										<div class="input-group">
		        											<input type="text" name="leucocitos" id="leucocitos" class="form-control" value="<?php echo (isset($examen['leucocitos']))? $examen['leucocitos'] : set_value('leucocitos'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>x cpo</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>

		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Hematíes</label>
		        										<div class="input-group">
		        											<input type="text" name="hematies" id="hematies" class="form-control" value="<?php echo (isset($examen['hematies']))? $examen['hematies'] : set_value('hematies'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>x cpo</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>

		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Células Epiteliales</label>
		        										<div class="input-group">
		        											<input type="text" name="cel_epiteliales" id="cel_epiteliales" class="form-control" value="<?php echo (isset($examen['cel_epiteliales']))? $examen['cel_epiteliales'] : set_value('cel_epiteliales'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>x cpo</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Células Redondas</label>
		        										<div class="input-group">
		        											<input type="text" name="cel_redondas" id="cel_redondas" class="form-control" value="<?php echo (isset($examen['cel_redondas']))? $examen['cel_redondas'] : set_value('cel_redondas'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>x cpo</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>

		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Cilindros</label>
		        										<div class="input-group">
		        											<input type="text" name="cilindros" id="cilindros" class="form-control" value="<?php echo (isset($examen['cilindros']))? $examen['cilindros'] : set_value('cilindros'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>x cpo</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>

		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Mucina</label>
		        										<select class="form-control" id="mucina" name="mucina" required data-error="Debe llenar este campo.">
	        												<option value=""></option>
	        												<option value="Escasa" <?php echo ((isset($examen['mucina']) && $examen['mucina'] == 'Escasa') || (isset($_POST['mucina']) && $_POST['mucina'] == 'Escasa'))? "selected" : ""; ?>>Escasa</option>
	        												<option value="Moderada" <?php echo ((isset($examen['mucina']) && $examen['mucina'] == 'Moderada') || (isset($_POST['mucina']) && $_POST['mucina'] == 'Moderada'))? "selected" : ""; ?>>Moderada</option>
	        												<option value="Cantidad moderada" <?php echo ((isset($examen['mucina']) && $examen['mucina'] == 'Cantidad moderada') || (isset($_POST['mucina']) && $_POST['mucina'] == 'Cantidad moderada'))? "selected" : ""; ?>>Cantidad moderada</option>
	        												<option value="Abundante" <?php echo ((isset($examen['mucina']) && $examen['mucina'] == 'Abundante') || (isset($_POST['mucina']) && $_POST['mucina'] == 'Abundante'))? "selected" : ""; ?>>Abundante</option>
	        											</select>
	        											<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Bacterias</label>
		        										<select class="form-control" id="bacterias" name="bacterias" required data-error="Debe llenar este campo.">
	        												<option value=""></option>
	        												<option value="Ausente" <?php echo ((isset($examen['bacterias']) && $examen['bacterias'] == 'Ausente') || (isset($_POST['bacterias']) && $_POST['bacterias'] == 'Ausente'))? "selected" : ""; ?>>Ausentes</option>
	        												<option value="Escasa" <?php echo ((isset($examen['mucina']) && $examen['bacterias'] == 'Escasa') || (isset($_POST['bacterias']) && $_POST['bacterias'] == 'Escasa'))? "selected" : ""; ?>>Escasas</option>
	        												<option value="Moderada" <?php echo ((isset($examen['bacterias']) && $examen['bacterias'] == 'Moderada') || (isset($_POST['bacterias']) && $_POST['bacterias'] == 'Moderada'))? "selected" : ""; ?>>Moderada</option>
	        												<option value="Cantidad moderada" <?php echo ((isset($examen['bacterias']) && $examen['bacterias'] == 'Cantidad moderada') || (isset($_POST['bacterias']) && $_POST['bacterias'] == 'Cantidad moderada'))? "selected" : ""; ?>>Cantidad moderada</option>
	        												<option value="Abundante" <?php echo ((isset($examen['bacterias']) && $examen['bacterias'] == 'Abundante') || (isset($_POST['bacterias']) && $_POST['bacterias'] == 'Abundante'))? "selected" : ""; ?>>Abundantes</option>
	        											</select>
	        											<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>

		        								<div class="col-xs-12 col-sm-8">
		        									<div class="form-group">
		        										<label class="control-label">Cristales</label>
		        										<textarea class="form-control" name="cristales" id="cristales"><?php echo  (isset($examen['cristales']))? trim($examen['cristales']) : trim(set_value('cristales')); ?></textarea>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        							</div>
		        						</div>
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
					<a href="<?php echo base_url(); ?>Examenes/ListarOrdenes" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="registro-examen-orina" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
	
</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#registro-examen-orina').validator();

	$("#ph").on("change", function(e) {
		var ph = $(this).val();
		
		if (ph > 7) {
			$("#reaccion").val("Alcalina");
		} else if (ph < 7) {
			$("#reaccion").val("Ácida");
		} else {
			$("#reaccion").val("Neutro");
		}
	});

	$(".check-parent input[type=checkbox]").on('click', function(e){
		var parent_checkbox = $(this);
			parent = $(this).parent('label')
							.parent('.checkbox')
							.parent('.check-parent'),
			children = parent.find('.check-child');
		children.each(function(index, value){
			var checkbox = $(this).find('input[type=checkbox]');
			if (parent_checkbox.is(':checked')) {
				checkbox.prop('checked', true);
			} else {
				checkbox.prop('checked', false);
			}
		});
	});

	$(".check-child input[type=checkbox]").on('click', function(e){
		var child_checkbox = $(this);
			children = $(this).parent('label')
							.parent('.checkbox')
							.parent('.check-child')
							.parent('.check-children'),
			parent_checkbox = children.parent('.check-parent')
										.children('.checkbox')
										.find('input[type=checkbox]');

		if (child_checkbox.is(':checked')) {
			var check = true;
			children.find('.check-child').each(function(index, value){
				var checkbox = $(this).find('input[type=checkbox]');
				if (!checkbox.is(':checked')) {
					check = false;
				}
			});

			parent_checkbox.prop('checked', check);
		} else {
			parent_checkbox.prop('checked', false);
		}
	});
});
</script>