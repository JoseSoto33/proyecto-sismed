<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1><?= $titulo; ?></h1>
			</div>
			<div class="col-xs-12">
				<?= validation_errors("<div class=\"alert alert-danger\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>", "</div>"); ?>
				<?php if(isset($mensaje) && !empty($mensaje)) { ?>
					<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?= $mensaje; ?>
					</div>					
				<?php } ?>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<?php
					$url =  base_url()."Evento/".$this->uri->segment(2, 0);
					if ($this->uri->segment(3, 0) != "0") {
						$url .= "/".$this->uri->segment(3, 0);
					}

					echo form_open(
	      				$url,
	      				'class="form-basic" id="registro-evento"'
	      				); ?>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="titulo" class="control-label"><span class="red">*</span> Títitulo</label>
						    <input type="text" class="form-control" id="titulo" name="titulo" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{6,30}" value="<?php echo (isset($evento['titulo']))? $evento['titulo'] : set_value('titulo'); ?>" minlength="6" maxlength="30" placeholder="" required="required">
						    <div class="help-block with-errors">
							</div>	
						</div>						
					</div>
					<div class="col-xs-12">
						<div class="row">							
							<div class="col-xs-12 col-sm-6 col-md-5">
								<div class="form-group">
									<label for="fecha_inicio" class="control-label"><span class="red">*</span> Fecha de inicio</label>
								    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" min="<?php echo date('Y-m-d');?>" value="<?php echo (isset($evento['fecha_inicio']))? $evento['fecha_inicio'] : set_value('fecha_inicio'); ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required="required">
		                				<div class="help-block with-errors">
									  </div>
								</div>
							</div>	
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
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">							
							<div class="col-xs-12 col-sm-6 col-md-5">
								<div class="form-group">
									<label for="fecha_fin" class="control-label"><span class="red">*</span> Fecha de finalización</label>
								    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" min="<?php echo date('Y-m-d');?>" value="<?php echo (isset($evento['fecha_fin']))? $evento['fecha_fin'] : set_value('fecha_fin'); ?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required="required">
								    <div class="help-block with-errors">
									</div>
								</div>
							</div>
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
							</div>
						</div>
					</div>
					<div class="col-sm-12">			
						<div class="form-group">
							<label for="descripcion" class="control-label"><span class="red">*</span> Descripción</label>
						    <textarea class="form-control" name="descripcion" id="descripcion" minlength="12" required="required" ><?php echo (isset($evento['descripcion']))? trim($evento['descripcion']) : trim(set_value('descripcion')); ?></textarea>	
						    <div class="help-block with-errors">
							</div>
						</div>
					</div>	
					<div class="col-sm-12">						
						<small> 
							<span class="red2">Los campos con (*) son obligatorios.</span>
						</small>
					</div>				
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<div class="col-sm-6 col-sm-offset-3">
							<button id="guardar" type="submit" class="btn btn-form btn-lg btn-block">Guardar</button>
							<a href="<?php echo base_url(); ?>Evento/ListarEventos" class="btn btn-second-2 btn-lg btn-block">Cancelar</a>
						</div>						
					</div>
				<?= form_close();?>			
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-evento.js"></script>
<?php include('footer.php') ?>