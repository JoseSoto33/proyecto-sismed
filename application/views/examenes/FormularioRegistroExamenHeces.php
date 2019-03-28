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
				      				'id="registro-examen-heces"'
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
		        										<label>Nombre:</label>
		        										<input type="text" class="form-control" id="nombre" name="nombre" pattern='[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}' title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo $orden['nombre1'] . " " . $orden['apellido1']; ?>" required data-error="Debe llenar este campo." data-error="Debe llenar este campo." data-pattern-error="El nombre sólo puede tener caracteres alfabéticos" readonly="">
		        									</div>
		        								</div>
		        								<div class="col-sm-6">
		        									<div class="form-group">
		        										<label>Fecha:</label>		        										
		        										<input type="date" class="form-control" id="fecha" name="fecha" placeholder="" value="<?php echo date('Y-m-d'); ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required data-error="Debe llenar este campo." data-error="Debe llenar este campo." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)" readonly="">
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
														    	<input type="radio" name="aspecto" value="Homogéneo" <?php echo ((isset($examen['aspecto']) && $examen['aspecto'] == 'Homogéneo') || (isset($_POST['aspecto']) && $_POST['aspecto'] == 'Homogéneo'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Homogéneo
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="aspecto" value="Heterogéneo" <?php echo ((isset($examen['aspecto']) && $examen['aspecto'] == 'Heterogéneo') || (isset($_POST['aspecto']) && $_POST['aspecto'] == 'Heterogéneo'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Heterogéneo
														  	</label>
														</div>
														<div class="help-block with-errors">
										      			</div>
		        									</div>
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Olor</label>
		        										<div class="radio">
														  	<label>
														    	<input type="radio" name="olor" value="Fecal" <?php echo ((isset($examen['olor']) && $examen['olor'] == 'Fecal') || (isset($_POST['olor']) && $_POST['olor'] == 'Fecal'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Fecal
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="olor" value="Fétido" <?php echo ((isset($examen['olor']) && $examen['olor'] == 'Fétido') || (isset($_POST['olor']) && $_POST['olor'] == 'Fétido'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Fétido
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
														    	<input type="radio" name="color" value="Marrón" <?php echo ((isset($examen['color']) && $examen['color'] == 'Marrón') || (isset($_POST['color']) && $_POST['color'] == 'Marrón'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Marrón
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="color" value="Pardo" <?php echo ((isset($examen['color']) && $examen['color'] == 'Pardo') || (isset($_POST['color']) && $_POST['color'] == 'Pardo'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Pardo
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="color" value="Verdoso" <?php echo ((isset($examen['color']) && $examen['color'] == 'Verdoso') || (isset($_POST['color']) && $_POST['color'] == 'Verdoso'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Verdoso
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="color" value="Amarillo" <?php echo ((isset($examen['color']) && $examen['color'] == 'Amarillo') || (isset($_POST['color']) && $_POST['color'] == 'Amarillo'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Amarillo
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="color" value="Sanguinolento" <?php echo ((isset($examen['color']) && $examen['color'] == 'Sanguinolento') || (isset($_POST['color']) && $_POST['color'] == 'Sanguinolento'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Sanguinolento
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="color" value="Negro" <?php echo ((isset($examen['color']) && $examen['color'] == 'Negro') || (isset($_POST['color']) && $_POST['color'] == 'Negro'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Negro
														  	</label>
														</div>
														<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Consistencia</label>
		        										<div class="radio">
														  	<label>
														    	<input type="radio" name="consistencia" value="Pastosa" <?php echo ((isset($examen['consistencia']) && $examen['consistencia'] == 'Pastosa') || (isset($_POST['consistencia']) && $_POST['consistencia'] == 'Pastosa'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Pastosa
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="consistencia" value="Blanda" <?php echo ((isset($examen['consistencia']) && $examen['consistencia'] == 'Blanda') || (isset($_POST['consistencia']) && $_POST['consistencia'] == 'Blanda'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Blanda
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="consistencia" value="Dura" <?php echo ((isset($examen['consistencia']) && $examen['consistencia'] == 'Dura') || (isset($_POST['consistencia']) && $_POST['consistencia'] == 'Dura'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Dura
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="consistencia" value="Diarréica" <?php echo ((isset($examen['consistencia']) && $examen['consistencia'] == 'Diarréica') || (isset($_POST['consistencia']) && $_POST['consistencia'] == 'Diarréica'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Diarréica
														  	</label>
														</div>
														<div class="radio">
														  	<label>
														    	<input type="radio" name="consistencia" value="Líquida" <?php echo ((isset($examen['consistencia']) && $examen['consistencia'] == 'Líquida') || (isset($_POST['consistencia']) && $_POST['consistencia'] == 'Líquida'))? "checked" : ""; ?> required data-error="Debe llenar este campo.">
														    	Líquida
														  	</label>
														</div>
														<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-6 col-md-3">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Reacción</label>
		        										<select class="form-control" id="reaccion" name="reaccion" required data-error="Debe llenar este campo.">
		        											<option value=""></option>
		        											<option value="Ácida" <?php echo ((isset($examen['reaccion']) && $examen['reaccion'] == 'Ácida') || (isset($_POST['reaccion']) && $_POST['reaccion'] == 'Ácida'))? "selected" : ""; ?> >Ácida</option>
		        											<option value="Alcalina" <?php echo ((isset($examen['reaccion']) && $examen['reaccion'] == 'Alcalina') || (isset($_POST['reaccion']) && $_POST['reaccion'] == 'Alcalina'))? "selected" : ""; ?> >Alcalina</option>
		        											<option value="Neutra" <?php echo ((isset($examen['reaccion']) && $examen['reaccion'] == 'Neutra') || (isset($_POST['reaccion']) && $_POST['reaccion'] == 'Neutra'))? "selected" : ""; ?> >Neutra</option>
		        										</select>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-6 col-md-3">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Moco</label>
		        										<select class="form-control" id="moco" name="moco" required data-error="Debe llenar este campo.">
		        											<option value=""></option>
		        											<option value="Presente" <?php echo ((isset($examen['moco']) && $examen['moco'] == 'Presente') || (isset($_POST['moco']) && $_POST['moco'] == 'Presente'))? "selected" : ""; ?> >Presente</option>
		        											<option value="Escaso" <?php echo ((isset($examen['moco']) && $examen['moco'] == 'Escaso') || (isset($_POST['moco']) && $_POST['moco'] == 'Escaso'))? "selected" : ""; ?> >Escaso</option>
		        											<option value="Ausente" <?php echo ((isset($examen['moco']) && $examen['moco'] == 'Ausente') || (isset($_POST['moco']) && $_POST['moco'] == 'Ausente'))? "selected" : ""; ?> >Ausente</option>
		        										</select>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-6 col-md-3">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Sangre</label>
		        										<select class="form-control" id="sangre" name="sangre" required data-error="Debe llenar este campo.">
		        											<option value=""></option>
		        											<option value="Presente" <?php echo ((isset($examen['sangre']) && $examen['sangre'] == 'Presente') || (isset($_POST['sangre']) && $_POST['sangre'] == 'Presente'))? "selected" : ""; ?> >Presente</option>
		        											<option value="Ausente" <?php echo ((isset($examen['sangre']) && $examen['sangre'] == 'Ausente') || (isset($_POST['sangre']) && $_POST['sangre'] == 'Ausente'))? "selected" : ""; ?> >Ausente</option>
		        										</select>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-6 col-md-3">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Restos alimenticios</label>
		        										<select class="form-control" id="rest_alimenticios" name="rest_alimenticios" required data-error="Debe llenar este campo.">
		        											<option value=""></option>
		        											<option value="Presente" <?php echo ((isset($examen['rest_alimenticios']) && $examen['rest_alimenticios'] == 'Presente') || (isset($_POST['rest_alimenticios']) && $_POST['rest_alimenticios'] == 'Presente'))? "selected" : ""; ?> >Presente</option>
		        											<option value="Ausente" <?php echo ((isset($examen['rest_alimenticios']) && $examen['rest_alimenticios'] == 'Ausente') || (isset($_POST['rest_alimenticios']) && $_POST['rest_alimenticios'] == 'Ausente'))? "selected" : ""; ?> >Ausente</option>
		        										</select>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12">
		        									<div class="form-group">
		        										<div class="checkbox">
														  	<label>
														    	<input type="checkbox" name="sin_parasitos" value="1" <?php echo (!empty($examen['sin_parasitos']) || isset($_POST['sin_parasitos']))? "checked" : ""; ?>>
														    	No se observan muestras parasitarias en la muestra analizada
														  	</label>
														</div>
														<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12">
		        									<div class="form-group">
		        										<label class="control-label">Otros</label>
		        										<textarea class="form-control" name="otros" id="otros"><?php echo trim((isset($examen['otros']))? $examen['otros'] : set_value('otros')); ?></textarea>
		        									</div>
		        									<div class="form-group">
		        										<label class="control-label">Observaciones</label>
		        										<textarea class="form-control" name="observaciones" id="observaciones"><?php echo trim( (isset($examen['observaciones']))? $examen['observaciones'] : set_value('observaciones')); ?></textarea>
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
		        	<button id="guardar" type="submit" form="registro-examen-heces" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
	
</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#registro-examen-heces').validator();

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