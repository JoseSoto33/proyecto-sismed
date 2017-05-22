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
			<div class="col-sm-8 col-sm-offset-2">
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
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="insumo" class="control-label"><span class="red">*</span> Nombre del Insumo</label>							
								    <input type="text" class="form-control" id="insumo" name="insumo" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ ]+" title="" value="<?php echo (isset($insumo['insumo']))? $insumo['insumo'] : set_value('insumo'); ?>" minlength="1" maxlength="60" placeholder="Nombre" required="required" data-pattern-error="El nombre del insumo sólo puede tener caracteres alfabéticos">
								    <div class="help-block with-errors">
									</div>								
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tipo_insumo" class="control-label"><span class="red">*</span> Tipo de Insumo </label>
								    <select class="form-control" id="tipo_insumo" name="tipo_insumo" data-placeholder="Seleccione un tipo de insumo..." required="required">
								    	<option></option>
								    	<option value="Reactivo" <?php echo (isset($insumo['tipo_insumo']) && $insumo['tipo_insumo'] == 'Reactivo')? "selected=\"selected\"" : set_select('tipo_insumo', 'Reactivos'); ?>>Reactivo</option>
								    	<option value="Equipo" <?php echo (isset($insumo['tipo_insumo']) && $insumo['tipo_insumo'] == 'Equipo')? "selected=\"selected\"" : set_select('tipo_insumo', 'Equipo'); ?>>Equipo</option>
								    	<option value="Medicamento" <?php echo (isset($insumo['tipo_insumo']) && $insumo['tipo_insumo'] == 'Medicamento')? "selected=\"selected\"" : set_select('tipo_insumo', 'Medicamento'); ?>>Medicamento</option>
								    </select>								   
								  	<div class="help-block with-errors">
								  	</div>
								</div>
							</div>	
						</div>	
					</div>						
					<div class="col-sm-12">	
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="cantidad" class="control-label"><span class="red">*</span>Cantidad</label>
								    <input type="number" class="form-control" id="cantidad" name="cantidad" pattern="[0-9]{1,4}" value="<?php echo (isset($insumo['cantidad']))? $insumo['cantidad'] : set_value('cantidad'); ?>" min="1" placeholder="" required="required" ><?php echo (isset($insumo['cantidad']))? trim($insumo['cantidad']) : trim(set_value('cantidad')); ?>	
								    <div class="help-block with-errors">
									</div>
								</div>								
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="unidad_medida" class="control-label"><span class="red">*</span>Unidad de Medida</label>
								    <select class="form-control" id="unidad_medida" name="unidad_medida" data-placeholder="Seleccione un tipo de insumo..." required="required">
								    	<option></option>
								    	<option value="Cajas" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'Cajas')? "selected=\"selected\"" : set_select('unidad_medida', 'Cajas'); ?>>Cajas</option>
								    	<option value="Frascos" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'Frascos')? "selected=\"selected\"" : set_select('unidad_medida', 'Frascos'); ?>>Frascos</option>
								    	<option value="Ampollas" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'Ampollas')? "selected=\"selected\"" : set_select('unidad_medida', 'Ampollas'); ?>>Ampollas</option>
								    	<option value="Paquetes" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'Paquetes')? "selected=\"selected\"" : set_select('unidad_medida', 'Paquetes'); ?>>Paquetes</option>
								    	<option value="Unidades" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'Unidades')? "selected=\"selected\"" : set_select('unidad_medida', 'Unidades'); ?>>Unidades</option>
								    	<option value="KIT" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'KIT')? "selected=\"selected\"" : set_select('unidad_medida', 'KIT'); ?>>KIT</option>
								    	<option value="Potes" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'Potes')? "selected=\"selected\"" : set_select('unidad_medida', 'Potes'); ?>>Potes</option>
								    	<option value="Rollos" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'Rollos')? "selected=\"selected\"" : set_select('unidad_medida', 'Rollos'); ?>>Rollos</option>
								    	<option value="YDS" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'YDS')? "selected=\"selected\"" : set_select('unidad_medida', 'YDS'); ?>>YDS</option>
								    	<option value="Par" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'Par')? "selected=\"selected\"" : set_select('unidad_medida', 'Par'); ?>>Par</option>
								    	<option value="Resma" <?php echo (isset($insumo['unidad_medida']) && $insumo['unidad_medida'] == 'Resma')? "selected=\"selected\"" : set_select('unidad_medida', 'Resma'); ?>>Resma</option>
							    	</select>
								    <div class="help-block with-errors">
									</div>
								</div>								
							</div>
							<div class="col-sm-5">
								<div class="form-group">
									<label for="contenido" class="control-label"><span class="red">*</span> Contenido</label>
									<div class="row">
										<div class="col-sm-6">
										    <input type="number" class="form-control" id="numero" name="numero" pattern="[0-9]{1,4}" value="<?php echo (isset($insumo['numero']))? $insumo['numero'] : set_value('numero'); ?>" min="1" placeholder=""><?php echo (isset($insumo['numero']))? trim($insumo['numero']) : trim(set_value('numero')); ?>	
										    <div class="help-block with-errors">
											</div>
										</div>
										<div class="col-sm-6">
											<select class="form-control" id="contenido" name="contenido" data-placeholder="">
									    	<option></option>
									    	<option value="g" <?php echo (isset($insumo['contenido']) && $insumo['contenido'] == 'g')? "selected=\"selected\"" : set_select('contenido', 'g'); ?>>g</option>
									    	<option value="mg" <?php echo (isset($insumo['contenido']) && $insumo['contenido'] == 'mg')? "selected=\"selected\"" : set_select('contenido', 'mg'); ?>>mg</option>
									    	<option value="l" <?php echo (isset($insumo['contenido']) && $insumo['contenido'] == 'l')? "selected=\"selected\"" : set_select('contenido', 'l'); ?>>l</option>
									    	<option value="ml" <?php echo (isset($insumo['contenido']) && $insumo['contenido'] == 'ml')? "selected=\"selected\"" : set_select('contenido', 'ml'); ?>>ml</option>
									    	<option value="cm" <?php echo (isset($insumo['contenido']) && $insumo['contenido'] == 'cm')? "selected=\"selected\"" : set_select('contenido', 'cm'); ?>>cm</option>
									    	<option value="mm" <?php echo (isset($insumo['contenido']) && $insumo['contenido'] == 'mm')? "selected=\"selected\"" : set_select('contenido', 'mm'); ?>>mm"</option>
									    	<option value="cc" <?php echo (isset($insumo['contenido']) && $insumo['contenido'] == 'cc')? "selected=\"selected\"" : set_select('contenido', 'cc'); ?>>cc</option>
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
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="fecha_elaboracion" class="control-label"><span class="red">*</span>Fecha de Elaboración</label>
								    <input type="date" class="form-control" id="fecha_elaboracion" name="fecha_elaboracion" max="<?php echo date('Y-m-d');?>" pattern="[0-9]" value="<?php echo (isset($insumo['fecha_elaboracion']))? $insumo['fecha_elaboracion'] : set_value('fecha_elaboracion'); ?>" required="required" data-pattern-error="Debe introducir una fecha en el formato solicitado">	
								    <div class="help-block with-errors">
									</div>
								</div>								
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="fecha_vencimiento" class="control-label"><span class="red">*</span> fecha de vencimiento</label>
								    <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" pattern="[0-9]" value="<?php echo (isset($insumo['fecha_vencimiento']))? $insumo['fecha_vencimiento'] : set_value('fecha_vencimiento'); ?>" required="required" data-pattern-error="Debe introducir una fecha en el formato solicitado">
								    <div class="help-block with-errors">
									</div>	
								</div>						
								
							</div>
						</div>					
					</div>
					<div class="col-sm-12">			
						<div class="form-group">
							<label for="descripcion" class="control-label"><span class="red"> </span> Descripción</label>
						    <textarea class="form-control" name="descripcion" id="descripcion" minlength="12" ><?php echo (isset($insumo['descripcion']))? trim($insumo['descripcion']) : trim(set_value('descripcion')); ?></textarea>	
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
							<a href="<?php echo base_url(); ?>Inventario/ListarInsumos" class="btn btn-second-2 btn-lg btn-block">Cancelar</a>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-insumo.js"></script>

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