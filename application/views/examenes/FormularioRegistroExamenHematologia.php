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
				      				'id="registro-examen-hematologia"'
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
				         					<h3 class="box-title">Aspectos generales</h3>
				       					</div>
		        						<div class="box-body">
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-6">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Hematíes</label>
		        										<div class="input-group">
		        											<input type="number" name="hematies" id="hematies" class="form-control" step="1" value="<?php echo (isset($examen['hematies']))? $examen['hematies'] : set_value('hematies'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>p/mm&sup3;</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-6">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Hemoglobina</label>
		        										<div class="input-group">
		        											<input type="number" name="hemoglobina" id="hemoglobina" class="form-control" step="any" value="<?php echo (isset($examen['hemoglobina']))? $examen['hemoglobina'] : set_value('hemoglobina'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>g. %</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-6">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Leucocitos</label>
		        										<div class="input-group">
		        											<input type="number" name="leucocitos" id="leucocitos" class="form-control" step="1" value="<?php echo (isset($examen['leucocitos']))? $examen['leucocitos'] : set_value('leucocitos'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>p/mm&sup3;</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-6">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Plaquetas</label>
		        										<div class="input-group">
		        											<input type="number" name="plaquetas" id="plaquetas" class="form-control" step="1" value="<?php echo (isset($examen['plaquetas']))? $examen['plaquetas'] : set_value('plaquetas'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>p/mm&sup3;</b>
		        											</div>
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
				         					<h3 class="box-title">Fórmula leucocitaria</h3>
				       					</div>
		        						<div class="box-body">
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-3">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Segmentados</label>
		        										<div class="input-group">
		        											<input type="number" name="segmentados" id="segmentados" class="form-control" min="1" max="100" step="any" value="<?php echo (isset($examen['segmentados']))? $examen['segmentados'] : set_value('segmentados'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>%</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-3">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Eusinófilos</label>
		        										<div class="input-group">
		        											<input type="number" name="eusinofilos" id="eusinofilos" class="form-control" min="1" max="100" step="any" value="<?php echo (isset($examen['eusinofilos']))? $examen['eusinofilos'] : set_value('eusinofilos'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>%</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-3">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Linfocitos</label>
		        										<div class="input-group">
		        											<input type="number" name="linfocitos" id="linfocitos" class="form-control" min="1" max="100" step="any" value="<?php echo (isset($examen['linfocitos']))? $examen['linfocitos'] : set_value('linfocitos'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>%</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-3">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Monocitos</label>
		        										<div class="input-group">
		        											<input type="number" name="monocitos" id="monocitos" class="form-control" min="1" max="100" step="any" value="<?php echo (isset($examen['monocitos']))? $examen['monocitos'] : set_value('monocitos'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>%</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12">
		        									<div class="form-group">
		        										<label class="control-label">Observaciones</label>
		        										<textarea class="form-control" name="observaciones" id="observaciones"><?php echo  (isset($examen['observaciones']))? trim($examen['observaciones']) : trim(set_value('observaciones')); ?></textarea>
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
				         					<h3 class="box-title">Velocidad de sedimentación</h3>
				       					</div>
		        						<div class="box-body">
		        							<div class="row">
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<div class="input-group">
		        											<div class="input-group-addon">
		        												<b><span class="red">*</span> 1° Hora:</b>
		        											</div>
		        											<input type="number" name="vsg_1h" id="vsg_1h" class="form-control" min="1" max="150" step="any" value="<?php echo (isset($examen['vsg_1h']))? $examen['vsg_1h'] : set_value('vsg_1h'); ?>" required data-error="Debe llenar este campo.">
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<div class="input-group">
		        											<div class="input-group-addon">
		        												<b><span class="red">*</span> 2° Hora:</b>
		        											</div>
		        											<input type="number" name="vsg_2h" id="vsg_2h" class="form-control" min="1" max="150" step="any" value="<?php echo (isset($examen['vsg_2h']))? $examen['vsg_2h'] : set_value('vsg_2h'); ?>" required data-error="Debe llenar este campo.">
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<div class="input-group">
		        											<div class="input-group-addon">
		        												<b><span class="red">*</span> IK:</b>
		        											</div>
		        											<input type="number" name="vsg_ik" id="vsg_ik" class="form-control" min="1" max="150" step="any" value="<?php echo (isset($examen['vsg_ik']))? $examen['vsg_ik'] : set_value('vsg_ik'); ?>" required data-error="Debe llenar este campo.">
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
				         					<h3 class="box-title">Pruebas de cuagulación</h3>
				       					</div>
		        						<div class="box-body">
		        							<div class="row">
		        								<div class="col-xs-12">
		        									<h3>Tiempo de Protombina (PT) <small>VN: 0,80 - 1,20</small></h3>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> PT Paciente</label>
		        										<div class="input-group">
		        											<input type="number" name="pt_paciente" id="pt_paciente" class="form-control" step="any" value="<?php echo (isset($examen['pt_paciente']))? $examen['pt_paciente'] : set_value('pt_paciente'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>s</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> PT Control</label>
		        										<div class="input-group">
		        											<input type="number" name="pt_control" id="pt_control" class="form-control" step="any" value="<?php echo (isset($examen['pt_control']))? $examen['pt_control'] : set_value('pt_control'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>s</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Razón</label>
		        										<div class="input-group">
		        											<input type="number" name="razon" id="razon" class="form-control" step="any" value="<?php echo (isset($examen['razon']))? $examen['razon'] : set_value('razon'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>s</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12">
		        									<h4></h4>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12">
		        									<h3>Tiempo de Tromboplastina (PTT) <small>VN: &plusmn; 6 segundos.</small> </h3>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> PTT Paciente</label>
		        										<div class="input-group">
		        											<input type="number" name="ptt_paciente" id="ptt_paciente" class="form-control" step="any" value="<?php echo (isset($examen['ptt_paciente']))? $examen['ptt_paciente'] : set_value('ptt_paciente'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>s</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> PTT Control</label>
		        										<div class="input-group">
		        											<input type="number" name="ptt_control" id="ptt_control" class="form-control" step="any" value="<?php echo (isset($examen['ptt_control']))? $examen['ptt_control'] : set_value('ptt_control'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>s</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12 col-sm-4">
		        									<div class="form-group">
		        										<label class="control-label"><span class="red">*</span> Diferencia</label>
		        										<div class="input-group">
		        											<input type="number" name="diferencia" id="diferencia" class="form-control" step="any" value="<?php echo (isset($examen['diferencia']))? $examen['diferencia'] : set_value('diferencia'); ?>" required data-error="Debe llenar este campo.">
		        											<div class="input-group-addon">
		        												<b>s</b>
		        											</div>
		        										</div>
		        										<div class="help-block with-errors">
										      			</div>
		        									</div>
		        								</div>
		        								<div class="col-xs-12">
		        									<h4></h4>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-xs-12">
		        									<div class="form-group">
		        										<label class="control-label">Observaciones</label>
		        										<textarea class="form-control" name="prue_observaciones" id="prue_observaciones"><?php echo  (isset($examen['prue_observaciones']))? trim($examen['prue_observaciones']) : trim(set_value('prue_observaciones')); ?></textarea>
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
		        	<button id="guardar" type="submit" form="registro-examen-hematologia" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
	
</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#registro-examen-hematologia').validator();

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