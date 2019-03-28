<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Órdenes de exámenes</li>
    <li class="active">Agregar orden de examen de laboratorio</li>
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

								echo form_open_multipart(
				      				$url,
				      				'id="registro-orden-examen"'
				      				); ?>
				      				<!--offset-8 permite que me de un espacio de 8 hacia la izquierda -->
				      			<div class="col-xs-12 col-sm-6">
				      				<p id="msj" class="text-danger"></p>
				      			</div>
				      			<div class="col-sm-6">
				      				<div class="form-group">
										<div class="input-group">
											<?php if (!isset($orden['cedula'])) { ?>
								    		<div class="input-group-btn">
												<button id="search" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Buscar...">
													<span class="glyphicon glyphicon-search"></span>
												</button>
											</div>
											<?php } else { ?>
											<div class="input-group-addon">
												Cédula:
											</div>
											<?php } ?>
					      					<input type="text" name="cedula" class="form-control" id="cedula" placeholder="Ingrese cédula" pattern="[0-9]{6,8}" value="<?php echo (isset($orden['cedula']))? $orden['cedula'] : set_value('cedula'); ?>" <?php echo (isset($orden['cedula']))? "readonly":''; ?>>
					      					<?php if (!isset($orden['cedula'])) { ?>
									      	<div class="input-group-btn">								
												<button id="reset" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Limpiar formulario...">
													<span class="glyphicon glyphicon-refresh"></span>
												</button>
											</div>
											<?php } ?>
									    </div>
				      				</div>	
				      			</div>
				      			<input type="hidden" name="id_paciente" id="id" value="">
				      			<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Datos del Paciente</h3>
				       					</div>
		        						<div class="box-body">
		        							<div class="row">
		        								<div class="col-sm-6">
		        									<div class="form-group">
		        										<label><span class="red"> *</span>Nombre:</label>
		        										<input type="text" class="form-control" id="nombre1" name="nombre1" pattern='[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}' title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($orden['nombre1']))? $orden['nombre1'] : set_value('nombre1'); ?>" required data-error="Debe llenar este campo." data-pattern-error="El nombre sólo puede tener caracteres alfabéticos" readonly="">
		        									</div>
		        								</div>
		        								<div class="col-sm-6">
		        									<div class="form-group">
		        										<label><span class="red">*</span>Apellido:</label>
		        										<input type="text" class="form-control" id="apellido1" name="apellido1" pattern='[A-Za-zñÑáéíóúüÁÉÍÓÚÜ]{3,30}' title="El apellido sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" value="<?php echo (isset($orden['apellido1']))? $orden['apellido1'] : set_value('apellido1'); ?>" required data-error="Debe llenar este campo." data-pattern-error="Este campo sólo puede tener caracteres alfabéticos" readonly="">
		        									</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-sm-6">
		        									<div class="form-group">
		        										<label><span class="red">*</span>Fecha de nacimiento:</label>
		        										<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" max="<?php echo date('Y-m-d'); ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo (isset($orden['fecha_nacimiento']))? $orden['fecha_nacimiento'] : set_value('fecha_nacimiento'); ?>" required data-error="Debe llenar este campo." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)" readonly="">
		        									</div>
		        								</div>
		        								<div class="col-sm-6">
		        									<div class="form-group">
		        										<label><span class="red">*</span>Sexo:</label>
		        										<div class="col-sm-12">
															<label class="radio-inline">
															  	<input type="radio" name="sexo" id="sexoM" value="m" required data-error="Debe llenar este campo." readonly="" <?php echo ((isset($orden['sexo']) && $orden['sexo'] == 'm') || (isset($_POST['sexo']) && $_POST['sexo'] == 'm'))? "checked" : ""; ?> > Masculino
															</label>
															<label class="radio-inline">
															  	<input type="radio" name="sexo" id="sexoF" value="f" required data-error="Debe llenar este campo." readonly="" <?php echo ((isset($orden['sexo']) && $orden['sexo'] == 'f') || (isset($_POST['sexo']) && $_POST['sexo'] == 'f'))? "checked" : ""; ?> > 
															  	Femenino
															</label>
														</div>
														<div class="help-block with-errors">
												      	</div>
						        					</div>
		        								</div>
		        							</div>
		        							<div class="row">
		        								<div class="col-sm-6">
		        									<div class="form-group">
		        										<label><span class="red">*</span>Correo:</label>
		        										<input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-pattern-error="La dirección de correo es inválida" placeholder="ejemplo@dominio.com" value="<?php echo (isset($orden['email']))? $orden['email'] : set_value('email'); ?>" required data-error="Debe llenar este campo." readonly="">
		        									</div>
		        								</div>
		        								<div class="col-sm-6">
		        									<div class="form-group">
														<label for="tipo_paciente" class="control-label"><span class="red">*</span> Tipo de paciente:</label>
														<?php
															$attr = "class=\"form-control\" id=\"tipo_paciente\" data-placeholder=\"Seleccione una opción...\" required data-error=\"Debe llenar este campo.\" readonly=\"\"";
															echo form_dropdown("tipo_paciente", $tipo_paciente, set_value("tipo_paciente", (isset($orden['tipo_paciente']))? $orden['tipo_paciente'] : ""), $attr);
														?>
														<div class="help-block with-errors">
												      	</div>
													</div>
		        								</div>
		        							</div>
		        						</div>
		        					</div>
				      			</div>

				       			<div class="col-sm-6">
									<!-- Campo 'examen' -->
									<div class="form-group">
										<label for="examen"><span class="red">*</span> Seleccionar exámenes a realizar:</label>
										<ul>
											<?php foreach ($tipo_examenes as $x => $tipo) {
												if (is_array($tipo)) { ?>
											<li class="check-parent">
												<div class="checkbox">
												  	<label>
												    	<input type="checkbox" id="<?php echo $x; ?>" <?php echo ((isset($orden[$x]) && $orden[$x] === 't') || isset($_POST[$x]))? "checked" : ""; ?>>
														<?php echo $tipo['titulo']; ?>
												    </label>
												</div>
												<ul class="check-children">
											<?php	foreach ($tipo['lista'] as $y => $sub_tipo) { ?>
													<li class="check-child">
														<div class="checkbox">
														  	<label>
														    	<input type="checkbox" value="<?php echo $y; ?>" name="<?php echo $x; ?>[]" <?php echo ( (isset($orden[$x]) && in_array($y, explode(',', $orden[$x]))) || (isset($_POST[$x]) && in_array($y, $_POST[$x])) )? "checked" : ""; ?>>
														    	<?php echo $sub_tipo; ?>
														  	</label>
														</div>
													</li>		
											<?php	}	?>
												</ul>
											</li>
											<?php } else { ?>
											<li>
												<div class="checkbox">
												  	<label>
												    	<input type="checkbox" value="1" name="<?php echo $x; ?>" <?php echo ((isset($orden[$x]) && $orden[$x] === 't') || isset($_POST[$x]))? "checked" : ""; ?>>
												    	<?php echo $tipo; ?>
												  	</label>
												</div>
											</li>
											<?php }
											} ?>
										</ul>
										<div class="help-block with-errors">
								      	</div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label for="examen"><span class="red">*</span> Fecha de la entrega</label>
										<input type="date" class="form-control" id="fecha_entrega_pautada" name="fecha_entrega_pautada" placeholder="" min="<?php echo date('Y-m-d'); ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo (isset($orden['fecha_entrega_pautada']))? date('Y-m-d',strtotime($orden['fecha_entrega_pautada'])) : date('Y-m-d'); ?>" required data-error="Debe llenar este campo." data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)">
									</div>
								</div>

								<div id="generar_orden" class="col-xs-12 hidden">
									<div class="row">										
										<div class="col-xs-7">
						      				<div class="box box-solid box-primary">
								      			<div class="box-header with-border">
						         					<h3 class="box-title"> Orden </h3>
						       					</div>
						       					<div class="box-body">				       						
							       					<div class="row">
							       						<div class="col-xs-12">
							       							<div id="orden_vista_previa">
							       								<div id="orden_membrete">
							       									<div class="container-fluid">
																		<figure class="pull-left">
																			<img alt="Gobierno Bolivariano de Venezuela" src="<?php echo base_url(); ?>assets/img/gbv-logo.png">
																		</figure>
																		<figure class="pull-right">
																			<div class="row">
																				<div class="col-xs-6">
																					<img src="<?php echo base_url(); ?>assets/img/victorioso-logo.png">
																				</div>
																				<div class="col-xs-6">
																					<img src="<?php echo base_url(); ?>assets/img/iut-logo3.png">
																				</div>
																			</div>									
																		</figure>
																	</div>
							       								</div>
							       								<div id="orden_header">
					       											<label class="col-xs-12">Nom: <span id=examen_nompaciente></span> </label>
					       											<label class="col-xs-12">C.I: <span id=examen_cipaciente></span> </label>
							       								</div>
							       								<div id="orden_body">
							       									<div class="center-block">
							       										
							       									</div>
							       								</div>
							       								<div id="orden_footer">
					       											<label class="col-xs-12"><?php echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido'); ?></label>
					       											<label class="col-xs-12">
					       												<hr id="sello">
					       											</label>
					       											<label class="col-xs-12"><?php echo date('d-m-Y'); ?></label>
							       								</div>
							       							</div>
							       						</div>
							       					</div>
						       					</div>
						       				</div>
						       			</div>

						       			<div class="col-xs-5">
						      				<div class="box box-primary">
								      			<div class="box-header">
						         					<h3 class="box-title">Examen a realizar</h3>
						       					</div>
						       					<div class="box-body">				       						
							       					<div class="row">
							       						<div class="col-xs-12">
							       							<div class="form-group">
							       								<textarea class="form-control" name="orden_examen" id="examenes" placeholder=""></textarea>
							       							</div>
							       						</div>
							       					</div>
						       					</div>
						       					<div class="box-footer">
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
		        	<button id="guardar" type="submit" form="registro-orden-examen" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
	
</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#registro-orden-examen').validator();

	$("#reset").on("click", function(event){
		event.preventDefault();/*el elemento del boton lo anula*/
		$("#cedula").val('').prop("readonly",false);
		$("#nombre1").val('').prop("readonly",true);
		$("#apellido1").val('').prop("readonly",true);
		$("#email").val('').prop("readonly",true);
		$("#fecha_nacimiento").val('').prop("readonly",true);
		$("#tipo_paciente").val('').prop("readonly",true);
		$("input[name=sexo]").prop("checked",false).prop("readonly",true);
	});

	/*Al momento de darle click a buscar, captura el evento y ejecuta la función que se establece*/
	$("#search").on("click", function(event){
		event.preventDefault();/*el elemento del boton lo anula*/
		if ($("#cedula").val().match(/[0-9]{6,8}/)){

			var cedula= $("#cedula").val();/*obtiene el valor del campo que lleva por id cedula*/
			if (cedula.length >=6) {
				var request;/*variable que almacena la peticion del servidor*/
				if (request) {
					request.abort();
				}

				request= $.ajax({
					/* funcion que trae por defecto el url del sistema*/
					url: "<?php echo base_url(); ?>HistoriaClinica/ValidarPaciente",
					type: "POST",
					dataType: "json",/*Se utiliza para manejar objetos y arreglos */
					data: "cedula="+cedula
				});
				/*La peticion se ejecuta con exito*/
				request.done(function(response,textStatus,jqXRH){
					console.log(response);
					if (response != null){
						$.each(response,function(index,value){/*Recorre cada posicion del arreglo response*/
							if(value == "" || value == null || value == " " || value == undefined){
								if(index == 'sexo'){
									$("input[name=sexo]").prop("checked",false);
								}else{
									$("#"+index).prop("readonly",false);
								}
							}else{
								if (index == 'sexo') {
									/*Tiple igual: es exactamente igual*/
									if (value === 'm') {
										$("#sexoM").prop("checked",true);
									}else{
										$("#sexoF").prop("checked",true);
									}
									$("input[name=sexo]").prop("readonly",true);
								}else if(index == 'tipo_paciente'){/*compara el valor de tipo de paciente traido desde el servidor con cada opcion del select de tipo paciente*/
									$("#"+index+" option").prop("readonly",true);
									$("#"+index+" option").each(function(i,val){
										if ($(this).val() == value.substr(0,1).toUpperCase()+$(this).val().substr(1)) {

											$(this).prop("selected",true);
										}
									});
									setTimeout(function(){/*sepera determinado tiempo para ejecutar la sentencias establecidas en el*/
										$("#"+index).attr("readonly","readonly");
									},60);
								}else{
									$("#"+index).val(value).prop("readonly",true);
								}
							}
						});

						$("#examen_nompaciente").text(response["nombre1"] + " " + response["apellido1"]);
						$("#examen_cipaciente").text(response["cedula"]);
						$("#msj").text("");
					}else{
						$(".form-control").prop("readonly",false);
						$("select.form-control").removeAttr("readonly");
						$("#msj").text("Paciente no registrado.");
					}
				}); 
				request.fail(function(jqXRH,textStatus,thrown){s
					alert("error: "+textStatus);
				});
			}
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