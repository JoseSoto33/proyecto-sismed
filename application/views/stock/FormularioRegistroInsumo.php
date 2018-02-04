<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Agregar nuevo insumo
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Insumos</li>
    <li class="active">Agregar nuevo insumo</li>
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
					<div id="form-insumos-instruction" class="form-instructions">
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
								$url =  base_url()."Inventario/".$this->uri->segment(2, 0);
								if ($this->uri->segment(3, 0) != "0") {
									$url .= "/".$this->uri->segment(3, 0);
								}

								echo form_open(
				      				$url,
				      				'id="registro-insumo"'
				      				); ?>
								<div class="col-sm-12">
									<div class="row">										
										<div class="col-sm-6 col-sm-offset-3">
											<div class="form-group">
												<label for="tipo_insumo" class="control-label"><span class="red">*</span> Tipo de Insumo </label>
											    <select class="form-control" id="tipo_insumo" name="tipo_insumo" data-placeholder="Seleccione un tipo de insumo..." required="required">
											    	<option>Seleccione un tipo de insumo</option>
											    	<option value="reactivo" <?php echo (isset($insumo['tipo_insumo']) && $insumo['tipo_insumo'] == 'reactivo')? "selected=\"selected\"" : set_select('tipo_insumo', 'reactivo'); ?>>Reactivo</option>
											    	<option value="equipo" <?php echo (isset($insumo['tipo_insumo']) && $insumo['tipo_insumo'] == 'equipo')? "selected=\"selected\"" : set_select('tipo_insumo', 'equipo'); ?>>Equipo o Material</option>
											    	<option value="medicamento" <?php echo (isset($insumo['tipo_insumo']) && $insumo['tipo_insumo'] == 'medicamento')? "selected=\"selected\"" : set_select('tipo_insumo', 'medicamento'); ?>>Medicamento</option>
											    </select>								   
											  	<div class="help-block with-errors">
											  	</div>
											</div>
										</div>
									</div>	
								</div>
								<div id="medicamento"  class="form-part col-sm-12">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="insumo" class="control-label"><span class="red">*</span> Nombre Comercial</label>	<input type="text" class="form-control" id="insumo" name="insumo" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ ]+" title="" value="<?php echo (isset($insumo['insumo']))? $insumo['insumo'] : set_value('insumo'); ?>" minlength="3" maxlength="60" placeholder="Nombre" required="required" data-pattern-error="El nombre del insumo sólo puede tener caracteres alfabéticos">
											    <div class="help-block with-errors">
												</div>								
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="presentacion" class="control-label"><span class="red">*</span> Presentación</label>
												<select class="form-control not-required" id="presentacion" name="presentacion">
											    	<option></option>
											    	<option value="caja" <?php echo (isset($insumo['presentacion']) && $insumo['presentacion'] == 'caja')? "selected=\"selected\"" : set_select('presentacion', 'caja'); ?>>Cajas</option>
											    	<option value="frasco" <?php echo (isset($insumo['presentacion']) && $insumo['presentacion'] == 'frasco')? "selected=\"selected\"" : set_select('presentacion', 'frascos'); ?>>Frascos</option>
											    	<option value="ampollas" <?php echo (isset($insumo['presentacion']) && $insumo['presentacion'] == 'ampollas')? "selected=\"selected\"" : set_select('presentacion', 'ampollas'); ?>>Ampollas</option>
											    	<option value="paquetes" <?php echo (isset($insumo['presentacion']) && $insumo['presentacion'] == 'paquetes')? "selected=\"selected\"" : set_select('presentacion', 'paquetes'); ?>>Paquetes</option>
										    	</select>		
												<div class="help-block with-errors">
												</div>
											</div>
										</div> 
										<!-- <div class="col-sm-6">
											<div class="form-group">
												<label for="contenido" class="control-label"><span class="red">*</span> Contenido</label>
												<div class="row">
													<div class="col-sm-6">
													    <input type="number" class="form-control" id="numero" name="numero" pattern="[0-9]{1,4}" value="<?php echo (isset($insumo['numero']))? $insumo['numero'] : set_value('numero'); ?>" min="1" placeholder="">	
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
									    </div>	-->
										<div class="col-sm-3">
											<div class="form-group">
												<label for="cantidad" class="control-label"><span class="red">*</span>Cantidad</label>
											    <input type="number" class="form-control not-required" id="cantidad" name="cantidad" pattern="[0-9]{1,4}" value="<?php echo (isset($insumo['cantidad']))? $insumo['cantidad'] : set_value('cantidad'); ?>" min="1" placeholder="" required="required" >
											    <div class="help-block with-errors">
												</div>
											</div>								
										</div>
									</div>			
									<div class="row">	
										<div class="col-sm-3">
											<div class="form-group">
												<label for="forma_farmaceutica" class="control-label"><span class="red">*</span> Forma farmacéutica</label>
												<select class="form-control" id="forma_farmaceutica" name="forma_farmaceutica" data-placeholder="Seleccione una forma farmacéutica" required="required">
											    	<option></option>
											    	<option value="tableta" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'tableta')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'tableta'); ?>>Tabletas</option>
											    	<option value="capsula" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'capsula')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'capsula'); ?>>Cápsulas</option>
											    	<option value="grageas" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'grageas')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'grageas'); ?>>Grageas</option>
											    	<option value="jarabe" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'jarabe')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'jarabe'); ?>>Jarabe</option>
											    	<option value="crema" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'crema')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'crema'); ?>>Crema</option>
											    	<option value="uguento" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'uguento')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'uguento'); ?>>Ugüento</option>
											    	<option value="pomada" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'pomada')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'pomada'); ?>>Pomada</option>
											    	<option value="inyectable" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'inyectable')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'inyectable'); ?>>Inyectable</option>
											    	<option value="aerosol" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'aerosol')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'aerosol'); ?>>Aerosol</option>
											    	<option value="gotas" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'gotas')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'gotas'); ?>>Gotas</option>
											    	<option value="ovulos" <?php echo (isset($insumo['forma_farmaceutica']) && $insumo['forma_farmaceutica'] == 'ovulos')? "selected=\"selected\"" : set_select('forma_farmaceutica', 'ovulos'); ?>>Ovulos</option>
										    	</select>		
												<div class="help-block with-errors">
												</div>
											</div>
										</div> 
										<div class="col-sm-3">
											<div class="form-group">
												<label for="unidad" class="control-label"><span class="red">*</span> Unidades</label>
											    <input type="number" class="form-control" id="unidad" name="unidad" pattern="[0-9]{1,4}" value="<?php echo (isset($insumo['unidad']))? $insumo['unidad'] : set_value('unidad'); ?>" min="1" placeholder="" required="required" >	
											    <div class="help-block with-errors">
												</div>
											</div>								
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<div class="row">
													<div class="col-xs-12">
														<label for="contenido" class="control-label"><span class="red">*</span> Concentración</label>
													</div>
													<div class="col-sm-6">
													    <input type="number" class="form-control" id="numero" name="numero" pattern="[0-9]{1,4}" value="<?php echo (isset($insumo['numero']))? $insumo['numero'] : set_value('numero'); ?>" min="1" placeholder="" required="required">	
													    <div class="help-block with-errors">
														</div>
													 </div>
													 <div class="col-sm-6">
														<select class="form-control" id="contenido" name="contenido" data-placeholder="Debe ingresar la concentración" required="required">
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

								<div id="reactivo" class="form-part col-sm-12">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="insumo" class="control-label"><span class="red">*</span> Reactivo</label>	<input type="text" class="form-control" id="insumo" name="insumo" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ ]+" title="" value="<?php echo (isset($insumo['insumo']))? $insumo['insumo'] : set_value('insumo'); ?>" minlength="3" maxlength="60" placeholder="Nombre" required="required" data-pattern-error="El nombre del insumo sólo puede tener caracteres alfabéticos">
											    <div class="help-block with-errors">
												</div>								
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="presentacion" class="control-label"><span class="red">*</span> Presentación</label>
												<select class="form-control" id="presentacion" name="presentacion" data-placeholder="Seleccione un tipo de presentación..." required="required">
											    	<option></option>
											    	<option value="Cajas" <?php echo (isset($insumo['presentacion']) && $insumo['presentacion'] == 'Cajas')? "selected=\"selected\"" : set_select('presentacion', 'Cajas'); ?>>Unidad</option>
											    	<option value="Frascos" <?php echo (isset($insumo['presentacion']) && $insumo['presentacion'] == 'Frascos')? "selected=\"selected\"" : set_select('presentacion', 'Frascos'); ?>>KIT</option>
										    	</select>		
												<div class="help-block with-errors">
												</div>
											</div>
										</div> 
										<div class="col-sm-3">
											<div class="form-group">
												<label for="unidad" class="control-label"><span class="red">*</span> Cantidad</label>
											    <input type="number" class="form-control" id="unidad" name="cantidad" pattern="[0-9]{1,4}" value="<?php echo (isset($insumo['unidad']))? $insumo['unidad'] : set_value('unidad'); ?>" min="1" placeholder="" required="required" >	
											    <div class="help-block with-errors">
												</div>
											</div>								
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<div class="row">
													<div class="col-xs-12">
														<label for="contenido" class="control-label"><span class="red">*</span> Contenido</label>
													</div>
													<div class="col-sm-6">
													    <input type="number" class="form-control" id="numero" name="numero" pattern="[0-9]{1,4}" value="<?php echo (isset($insumo['numero']))? $insumo['numero'] : set_value('numero'); ?>" min="1" placeholder="">	
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

								<div id="equipo" class="form-part col-sm-12">	
									<div class="row">
										<div class="col-sm-9">
											<div class="form-group">
												<label for="insumo" class="control-label"><span class="red">*</span> Descrición</label>	
												<input type="text" class="form-control" id="insumo" name="insumo" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ ]+" title="" value="<?php echo (isset($insumo['insumo']))? $insumo['insumo'] : set_value('insumo'); ?>" minlength="3" maxlength="60" placeholder="Material" required="required" data-pattern-error="El nombre del insumo sólo puede tener caracteres alfabéticos">
											    <div class="help-block with-errors">
												</div>								
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="unidad" class="control-label"><span class="red">*</span>Cantidad</label>
											    <input type="number" class="form-control" id="unidad" name="unidad" pattern="[0-9]{1,4}" value="<?php echo (isset($insumo['unidad']))? $insumo['unidad'] : set_value('unidad'); ?>" min="1" placeholder="" required="required" >	
											    <div class="help-block with-errors">
												</div>
											</div>								
										</div>
									</div>
								</div>

								<div class="col-sm-12">	
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label for="nro_lote" class="control-label"><span class="red">*</span> Nro Lote</label>	<input type="text" class="form-control" id="nro_lote" name="nro_lote" pattern="[0-9]{1,10}" title="" value="<?php echo (isset($insumo['nro_lote']))? $insumo['nro_lote'] : set_value('nro_lote'); ?>" minlength="1" maxlength="10" placeholder=" " required="required" data-pattern-error="Este campo sólo puede contener carácteres numéricos">
											    <div class="help-block with-errors">
												</div>								
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="fecha_elaboracion" class="control-label"><span class="red">*</span>Fecha de Elaboración</label>
											    <input type="date" class="form-control" id="fecha_elaboracion" name="fecha_elaboracion" max="<?php echo date('Y-m-d');?>" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo (isset($insumo['fecha_elaboracion']))? $insumo['fecha_elaboracion'] : set_value('fecha_elaboracion'); ?>" required="required" data-pattern-error="Debe introducir una fecha en el formato solicitado">	
											    <div class="help-block with-errors">
												</div>
											</div>								
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="fecha_vencimiento" class="control-label"><span class="red">*</span> fecha de vencimiento</label>
											    <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo (isset($insumo['fecha_vencimiento']))? $insumo['fecha_vencimiento'] : set_value('fecha_vencimiento'); ?>" required="required" data-pattern-error="Debe introducir una fecha en el formato solicitado">
											    <div class="help-block with-errors">
												</div>	
											</div>
										</div>
									</div>					
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label for="descripcion" class="control-label">Observaciones</label>	
										<textarea type="text" class="form-control" id="descripcion" name="descripcion" pattern="[a-zA-ZñÑáéíóúüÁÉÍÓÚÜ ]+" title="" minlength="3" maxlength="60" placeholder="Material" required="required" data-pattern-error=" "> <?php echo (isset($insumo['descripcion']))? trim($insumo['descripcion']) : trim(set_value('descripcion')); ?>
										</textarea>
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
					<a href="<?php echo base_url(); ?>Inventario/ListarInsumos" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="registro-insumo" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
</section>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-formulario-insumo.js"></script>