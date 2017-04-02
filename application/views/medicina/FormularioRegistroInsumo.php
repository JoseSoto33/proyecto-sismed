<?php
switch ($this->session->userdata('tipo_usuario')){
	
	case "Doctor":
		include('doctor/header.php');
		break;

	case "Enfermero":
		include ('enfermero/header.php');
		break;
}
?>
<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1><?php echo $titulo; ?></h1>
			</div>
			<div class="col-xs-12">
				<?php echo validation_errors("<div class=\"alert alert-danger\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>", "</div>"); ?>
				<?php if(isset($mensaje) && !empty($mensaje)) { ?>
					<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $mensaje; ?>
					</div>					
				<?php } ?>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<?php
					$url =  base_url()."Inventario/".$this->uri->segment(2, 0);
					if ($this->uri->segment(3, 0) != "0") {
						$url .= "/".$this->uri->segment(3, 0);
					}

					echo form_open(
	      				$url,
	      				'class="form-basic" id="registro-insumo"'
	      				); ?>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="insumo" class="control-label"><span class="red">*</span> Nombre del Insumo</label>
						    <input type="text" class="form-control" id="insumo" name="insumo" pattern="[A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& ]{3,30}" value="<?php echo (isset($insumo['nombre']))? $insumo['nombre'] : set_value('insumo'); ?>" minlength="5" maxlength="20" placeholder="" required="required">
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
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<div class="col-sm-6 col-sm-offset-3">
							<button id="guardar" type="submit" class="btn btn-form btn-lg btn-block">Guardar</button>
							<a href="<?php echo base_url(); ?>Patologia/ListarPatologias" class="btn btn-second-2 btn-lg btn-block">Cancelar</a>
						</div>						
					</div>
				<?php echo form_close();?>			
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-patologia.js"></script>

<?php
switch ($this->session->userdata('tipo_usuario')){
	
	case "Doctor":
		include('doctor/footer.php');
		break;

	case "Enfermero":
		include ('enfermero/footer.php');
		break;
}
?>