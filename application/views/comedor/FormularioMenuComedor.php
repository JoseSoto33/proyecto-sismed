<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Comedor</li>
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
								$url =  base_url()."MenuComedor/".$this->uri->segment(2, 0);
								if ($this->uri->segment(3, 0) != "0") {
									$url .= "/".$this->uri->segment(3, 0);
								}

								echo form_open_multipart(
				      				$url,
				      				'id="registro-MenuComedor"'
				      				); ?>
				      			
				      			<!--offset-8 permite que me de un espacio de 8 hacia la izquierda -->
				      			<input type="hidden" name="id_paciente" id="id" value="">
				      			<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Semana</h3>
				       					</div>
				       					<div class="box-body">				       						
							      			<div class="row">
							      				<?PHP 
							      					$hoy = date('Y-m-d'); 
													$num_dia = date('N'); 
													$sum_dias= 6 - $num_dia;
													$max_fecha= date('Y-m-d',strtotime("+$sum_dias day",strtotime($hoy)));
												?>
												<div class="col-sm-6">
													<div class="form-group">
														<label><span class="red">*</span> Fecha de incio:</label>
														<input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="" min="<?php echo date('Y-m-d'); ?>" max="<?php echo $max_fecha; ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo (isset($MenuComedor['fecha_inicio']))? $MenuComedor['fecha_inicio'] : set_value('fecha_inicio'); ?>" required="required" data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)" <?php echo (isset($MenuComedor['fecha_inicio']))? "disabled":""; ?> >
													</div>
												</div>
									
												<div class="col-sm-6">
													<div class="form-group">
														<label><span class="red">*</span> Fecha de fin:</label>
														<input type="date" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="" min="<?php echo $hoy; ?>" max="<?php echo $max_fecha; ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo (isset($MenuComedor['fecha_fin']))? $MenuComedor['fecha_fin'] : set_value('fecha_fin'); ?>" required="required" data-pattern-error="La fecha debe tener el formato año-mes-día (1998-05-12 por ejemplo)" <?php echo (isset($MenuComedor['fecha_fin']))? "disabled":""; ?>>
													</div>
												</div>
											</div>
				       					</div>
				       				</div>
				       			</div>
								<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Menú del día</h3>
				       					</div>
				         				<div class="box-body">
				         					<div class="col-sm-6">
												<div class="form-group">
													<label for="dia" class="control-label"><span class="red">*</span> Día:</label>
													<select id="dia" name="dia" class="form-control" <?php echo (!empty($MenuComedor['dia']))? "disabled" : "" ;?>>>
														<option value="">Seleccione el día</option>
														<?php setlocale(LC_TIME,"esp");
														$dia=$hoy;
															for ($i=$num_dia; $i <= 6; $i++) { 
																if(strtotime($MenuComedor['dia'])== strtotime($dia)){
																	$selected="selected='selected'";
																}
																else{
																	$selected="";
																}
																echo "<option value=\"$dia\" $selected>".utf8_encode( ucfirst( strftime( '%A', strtotime( $dia ) ) ) )."</option>";
																$dia=date('Y-m-d',strtotime("+1 day",strtotime($dia)));
															}
														?>
													</select>
													<div class="help-block with-errors">
												    </div>
												</div>
											</div>
							       			<div class="col-sm-6">
												<div class="form-group">
													<label for="turno" class="control-label"><span class="red">*</span> Turno de comida:</label>
													<select id="turno" name="turno" class="form-control" <?php echo (!empty($MenuComedor['turno']))? "disabled" : "" ;?>>
														<option value="">Seleccione un turno</option>
														<option <?php echo ($MenuComedor['turno']=="Almuerzo")? "selected='selected'" : "" ;?> value="Almuerzo">Almuerzo</option>
														<option <?php echo ($MenuComedor['turno']=="Cena")? "selected='selected'" : "" ;?> value="Cena">Cena</option>

													</select>
													<div class="help-block with-errors">
												    </div>
												</div>
											</div>
					       					<div class="col-sm-12">
					       						<h4> Descripción del plato</h4>
					       						<hr class="separador">

					       						<div class="row"> 
					       							<div class="col-sm-4"> 
					       								<div class="form-group" >
					       									<label class="control-label">Entrada Caliente</label>
					       									<textarea  name="entrada" class="form-control" id="entrada"><?php echo (isset($MenuComedor['entrada']))? trim($MenuComedor['entrada']) : set_value('entrada'); ?></textarea>
					       								</div>
					       							</div>
					       							<div class="col-sm-4">
					       							 	<div class="form-group" >
					       									<label class="control-label">Plato proteico o combinado</label>
					       									<textarea name="proteico" class="form-control" id="proteico"><?php echo (isset($MenuComedor['proteico']))? trim($MenuComedor['proteico']) : set_value('proteico'); ?></textarea>
					       								</div>
					       							</div>
					       							<div class="col-sm-4"> 
					       								<div class="form-group" >
					       									<label class="control-label">Contorno farináceo</label>
					       									<textarea name="contorno" class="form-control" id="contorno"> <?php echo (isset($MenuComedor['contorno']))? trim($MenuComedor['contorno']) : set_value('contorno'); ?></textarea>
					       								</div>
					       							</div>
					       						</div>
					       						<div class="row"> 
					       							<div class="col-sm-6"> 
					       								<div class="form-group" >
					       									<label class="control-label">Ensalada, vegetales
					       									 cocido o platano</label>
					       									<textarea name="extras" class="form-control" id="extras"> <?php echo (isset($MenuComedor['extras']))? trim($MenuComedor['extras']) : set_value('extras'); ?></textarea>
					       								</div>
					       							</div>
					       							<div class="col-sm-6">
					       								<div class="form-group" >
					       									<label class="control-label">Bebida Fría</label>
					       									<textarea name="bebida" class="form-control" id="bebida"> <?php echo (isset($MenuComedor['bebida']))? trim($MenuComedor['bebida']) : set_value('bebida'); ?></textarea>
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
					<a href="<?php echo base_url(); ?>MenuComedor/ListarMenuComedor" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="registro-MenuComedor" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
	
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript">
$(document).ready(function() {
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
});
</script>
