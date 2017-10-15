<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Agregar noticia
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Noticias</li>
    <li class="active">Agregar noticia</li>
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
									Para registrar una nueva noticia deberá llenar los campos de acuerdo a las siguientes indicaciones:
								</p>
								<!-- Panel de descripción de campos -->
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					    			<!-- Descripción campo Título -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingOne">
									      	<h4 class="panel-title">
									      		Título
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Tamaño mínimo:</b> 5 caracteres.</li>
									      			<li><b>Caracteres permitidos:</b> Alfanuméricos (incluyendo acentuados, espacios y caracteres especiales).</li>
									      			<li><b>Campo obligatorio.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Título -->

								  	<!-- Descripción campo Enlace -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingTwo">
									      	<h4 class="panel-title">
									      		Enlace
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									      	<div class="panel-body">
									      		<ul>
									      			<li><b>Tipo de dato:</b> Cadena de caracteres.</li>
									      			<li><b>Formato:</b> Dirección web, URL.</li>
									      			<li><b>Campo opcional.</b></li>
									      		</ul>
									      	</div>
									    </div>
								  	</div><!--/ Descripción campo Enlace -->

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

								  	<!-- Descripción campo Imagen -->
								  	<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingFour">
									      	<h4 class="panel-title">
									      		Imagen
									        	<a class="collapsed pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									          		<span class="glyphicon glyphicon-plus"></span>
									        	</a>
									      	</h4>
									    </div>
									    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
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
					</div>
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
						$url =  base_url()."Noticia/".$this->uri->segment(2, 0);
						if ($this->uri->segment(3, 0) != "0") {
							$url .= "/".$this->uri->segment(3, 0);
						}
						
						echo form_open_multipart(
		      				$url,
		      				'id="registro-noticia"'
		      				); ?>
		      				<!-- Campo Título -->
							<div class="col-sm-12">
								<div class="form-group">
									<label for="titulo" class="control-label"><span class="red">*</span> Títitulo</label>
								    <input type="text" class="form-control" id="titulo" name="titulo" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{5,}" placeholder="" value="<?php echo (isset($noticia['titulo']))? $noticia['titulo'] : set_value('titulo'); ?>" required="required">
								    <div class="help-block with-errors">
									</div>
								</div>						
							</div><!--/ Campo Título -->

							<!-- Campo Enlace -->
							<div class="col-sm-12">
								<div class="form-group">
									<label for="url" class="control-label">Enlace</label>
								    <input type="text" class="form-control" id="url" name="url" pattern="https?://.+" title="Introduzca una dirección válida" placeholder="http://www.paginaweb.com" value="<?php echo (isset($noticia['url']))? $noticia['url'] : set_value('url'); ?>" data-pattern-error="Introduzca una dirección Válida">
								    <div class="help-block with-errors">
									</div>
								</div>
							</div><!--/ Campo Enlace -->

							<!-- Campo Descripción -->
							<div class="col-sm-12">			
								<div class="form-group">
									<label for="descripcion" class="control-label"><span class="red">*</span> Descripción</label>
								    <textarea class="form-control" name="descripcion" id="descripcion" minlength="12" maxlength="" required="required" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{12,}"><?php echo (isset($noticia['descripcion']))? trim($noticia['descripcion']) : trim(set_value('descripcion')); ?></textarea>
								    <div class="help-block with-errors">
									</div>
								</div>
							</div><!--/ Campo Descripción -->

							<!-- Campo Imagen -->
							<?php 
								if (isset($noticia)) {
							?>
							<div class="col-xs-12" id="imagen-content">
								<?php if (isset($noticia['img']) && ($noticia['img']) != null || $noticia['img'] != "") { ?>
								<figure>
									<img src="<?php echo base_url().'assets/img/noticias/'.$noticia['img']; ?>" alt="<?php echo $noticia['img']; ?>">
								</figure>
								<?php }else{ ?>
								<h4>No ha cargado una imagen para esta noticia...</h4>
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
						<?php echo form_close();?>
						</div>
		        	</div>
		        </div>
		        <div class="box-footer">
					<a href="<?php echo base_url(); ?>Noticia/ListarNoticias" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="registro-noticia" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-noticia.js"></script>