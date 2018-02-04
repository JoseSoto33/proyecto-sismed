<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Agregar nueva patologia
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Patologías</li>
    <li class="active">Agregar nueva patologia</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<div class="box box-solid box-success">
	        	<div class="box-header with-border">
		          <h3 class="box-title">Instrucciones</h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
					<!-- Instrucciones para el usuario -->
					<div id="form-patologia-instruction" class="form-instructions">
						<div class="col-sm-12">
							<!-- Descripción -->
							<div class="descripcion">
								<p>
									Para registrar una nueva noticia deberá llenar los campos de acuerdo a las siguientes indicaciones:
								</p>
								<!-- Panel de descripción de campos -->
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					    			<!-- Descripción campo Nombre -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingOne">
									      	<h4 class="panel-title">
									      		Nombre
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 3 caracteres.</li>
									      			<li><b>Tamaño máximo:</b> 30 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Nombre -->
								  	
								  	<!-- Descripción campo Descripción -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingThree">
									      	<h4 class="panel-title">
									      		Descripción
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
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
								  	

								</div><!--/ Panel de descripción de campos -->

								<p>
									<b>Nota:</b><br>
									El botón "Guardar" permanecerá desactivado hasta llenar los campos obligatorios del formulario.
								</p>
							</div><!--/ Descripción -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-8">
			<div class="box box-success">
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
								$url =  base_url()."Patologia/".$this->uri->segment(2, 0);
								if ($this->uri->segment(3, 0) != "0") {
									$url .= "/".$this->uri->segment(3, 0);
								}

								echo form_open(
				      				$url,
				      				'id="registro-patologia"'
				      				); ?>
								<div class="col-sm-12">
									<div class="form-group">
										<label for="patologia" class="control-label"><span class="red">*</span> Nombre de la patologia</label>
									    <input type="text" class="form-control" id="patologia" name="patologia" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{3,30}" value="<?php echo (isset($patologia['nombre']))? $patologia['nombre'] : set_value('patologia'); ?>" minlength="3" maxlength="30" placeholder="" required="required">
									    <div class="help-block with-errors">
										</div>	
									</div>						
								</div>
								
								<div class="col-sm-12">			
									<div class="form-group">
										<label for="descripcion" class="control-label"><span class="red"> </span> Descripción</label>
									    <textarea class="form-control" name="descripcion" id="descripcion" minlength="12" ><?php echo (isset($patologia['descripcion']))? trim($patologia['descripcion']) : trim(set_value('descripcion')); ?></textarea>	
									    <div class="help-block with-errors">
										</div>
									</div>
								</div>
								<div class="col-sm-12">						
									<small> 
										<span class="red2">Los campos con (*) son obligatorios.</span>
									</small>
								</div>
							<?php echo form_close();?>			
						</div>
		        	</div>
		        </div>
		        <div class="box-footer">
					<a href="<?php echo base_url(); ?>Patologia/ListarPatologias" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="registro-patologia" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-patologia.js"></script>
