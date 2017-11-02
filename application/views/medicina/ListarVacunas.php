<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de vacunas
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Vacunas</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<a class="btn btn-success" href="<?php echo base_url(); ?>Vacuna/AgregarVacuna"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
					</div>
					<div class="col-xs-12 col-sm-9">
						<?php if(get_cookie("message") != null) { ?>
							<div id="alert-message" class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?php 
									echo $this->input->cookie('message'); 
									delete_cookie('message');
								?>
							</div>					
						<?php } ?>
					</div>	
				</div>				
			</div>
			<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
			<div class="box-body table-responsive">
				<table id="lista-vacunas" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Nº</th>
						<th>vacuna</th>
						<th>Edad de aplicación</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Nº</th>
						<th>vacuna</th>
						<th>Enfermedades que combate</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;
							if ($num_rows > 0) {
								
								setlocale(LC_TIME,"esp"); 

								foreach ($vacunas as $key => $vacuna) {
									
									if($vacuna["status"] === 'f')
									{
										echo "<tr class=\"danger\" id=\"fila_".md5('sismed'.$vacuna["id"])."\">";

									}else{										
										echo "<tr id=\"fila_".md5('sismed'.$vacuna["id"])."\">";
									}
									echo "<td>".$cont++."</td>";
									echo "<td class=\"cel-nombre-vacuna\">".$vacuna["nombre_vacuna"]."</td>";
									echo "<td class=\"cel-patologias\">";
									
									$str = "";
									for ($i=0; $i < count($vacuna["patologias"]); $i++) { 

										$str .= $vacuna["patologias"][$i]["nombre"];

										if ($i == count($vacuna["patologias"]) - 1) {
											$str .= ".";
										}else{
											$str .= ", ";
										}
									}

									echo $str;
																			
									echo "</td>";
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";

									//---Boton ver detalles---
									echo "<a class=\"btn btn-xs btn-info ver-vacuna\" href=\"#\" data-toggle=\"modal\" data-target=\"#DetallesVacuna\" title=\"Ver vacuna\" data-idvacuna=\"".md5('sismed'.$vacuna["id"])."\" data-nombre=\"".$vacuna["nombre_vacuna"]."\">";
									echo "<span class=\"glyphicon glyphicon-search\"></span>";
									echo "</a>";

									if ($vacuna['status'] === "t") {
										
									//---Boton inhabilitar---
									echo "<a class=\"btn btn-xs btn-danger eliminar-vacuna\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarVacuna\" title=\"Eliminar vacuna\" data-idvacuna=\"".md5('sismed'.$vacuna["id"])."\" data-nombre=\"".$vacuna["nombre_vacuna"]."\" data-action=\"inhabilitar\">";
									echo "<span class=\"glyphicon glyphicon-remove\"></span>";
									}else{

									//---Boton habilitar---
									echo "<a class=\"btn btn-xs btn-success eliminar-vacuna\" href=\"#\" data-toggle=\"modal\" data-target=\"#EliminarVacuna\" title=\"Eliminar vacuna\" data-idvacuna=\"".md5('sismed'.$vacuna["id"])."\" data-nombre=\"".$vacuna["nombre_vacuna"]."\" data-action=\"habilitar\">";
									echo "<span class=\"glyphicon glyphicon-ok\"></span>";
									}
									echo "</a>";

									echo "</div>";
									echo "</td>";
									echo "</tr>";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<!-- Detalles de vacuna -->
<div class="modal fade" id="DetallesVacuna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles de vacuna</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">

        		<div class="row">
        			<div class="col-xs-12">
        				<!-- Panel de información - Nombre de la vacuna -->
		        		<div class="panel panel-default">

		        			<!-- Título del panel -->
						  	<div class="panel-heading">
						  		<h3 class="panel-title">
						  			Nombre de la vacuna
						  			<button id="editar-vacuna" class="btn btn-xs btn-success pull-right">
						  				<span class="glyphicon glyphicon-pencil"></span>
						  			</button>
						  		</h3>
						  	</div><!--/ Título del panel -->

						  	<!-- Contenido del panel -->
						  	<div class="panel-body" id="form-editar-nombre">

						  		<div id="edit-message" class="alert" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<span id="ename-message"></span>
								</div>	

						  		<?php        							

									echo form_open('#', 'class="" id="edicion-nombre"'); 
					      		?>
							  		<div class="form-group">
								      	<input type="text" name="vac_nombre" id="vac_nombre" class="form-control" title="El nombre sólo puede tener caracteres alfabéticos" minlength="3" maxlength="30" pattern="[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]{3,30}" required="required" data-pattern-error="El nombre sólo puede tener caracteres alfabéticos" readonly="readonly"> 
									    <div class="help-block with-errors">
									    </div>
								    </div>
								    <div id="fen-buttons" class="form-group hidden">	    	
							        	<button class="btn btn-principal-2" type="submit" id="s_vac_nombre" disabled="disabled">
							        		Guardar
							        	</button>
							        	<button class="btn btn-default" type="button" id="c_vac_nombre" disabled="disabled">
							        		Cancelar
							        	</button>
								    </div>

								<?php echo form_close();?>	

						  	</div><!--/ Contenido del panel -->
						</div><!--/ Panel de información - Nombre de la vacuna -->

						<!-- Panel de información - Patologías que combate la vacuna -->
						<div class="panel panel-default">

							<!-- Título del panel -->
						  	<div class="panel-heading">
						    	<h3 class="panel-title">
						    		Enfermedades que combate
						    		<button id="editar-vacuna-patologias" class="btn btn-xs btn-success pull-right">
						  				<span class="glyphicon glyphicon-pencil"></span>
						  			</button>
						    	</h3>
						  	</div><!--/ Título del panel -->

						  	<!-- Contenido del panel -->
						  	<div class="panel-body">
						  		<div class="row">						  			
							  		<div class="col-xs-12 hidden" id="select-parologias">
							  			<div class="row">
							  				<div class="col-xs-12">
							  					<div id="select-message" class="alert" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<span id="pat-message"></span>
												</div>	
							  				</div>
							  				<div class="col-xs-12 col-sm-5">
							  					<button id="a_lista" class="btn btn-sm btn-success">Agregar</button>
							  				</div>
							  				<div class="col-xs-12 col-sm-7">
							  					<div class="form-group">
							  						<select id="list-patologias" name="list-patologias" class="form-control chosen-select" data-placeholder="Seleccionar patología..."></select>
							  					</div>						  					
							  				</div>
							  			</div>							  			
							  		</div>
							  		<div class="col-xs-12">
							  			<input type="hidden" id="cant_patologias" name="cant_patologias" value="">
								    	<ul id="lista-patologias" class="list-group">
										</ul>
							  		</div>
							  		<div class="col-xs-12">							  			
										<div id="lista-buttons" class="form-group hidden">
								        	<button class="btn btn-default" type="button" id="c_lista" disabled="disabled">
								        		Cerrar
								        	</button>
									    </div>
							  		</div>
						  		</div>
						  	</div><!--/ Contenido del panel -->
						</div><!--/ Panel de información - Patologías que combate la vacuna -->
        			
        				<!-- Panel de información - Esquemas de la vacuna -->
						<div class="panel panel-default">

							<!-- Título del panel -->
						  	<div class="panel-heading">
						    	<h3 class="panel-title">
						    		Esquemas de la vacuna
						    		<button id="agregar-esquema" class="btn btn-xs btn-success pull-right">
						  				<span class="glyphicon glyphicon-plus"></span>
						  			</button>
						    	</h3>
						  	</div><!--/ Título del panel -->

						  	<!-- Contenido del panel -->
						  	<div class="panel-body">

						  		<div id="esquema-message" class="alert" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<span id="pat-message"></span>
								</div>

						  		<!-- Panel de listado de esquemas -->
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					    			
					    			<!-- Listado de esquemas dinámico -->

								</div><!--/ Panel de listado de esquemas -->

								<div id="lista-esquemas" class="col-xs-12">

	        						<div class="row">

	        							<div class="col-md-12">
					        				<h4>
					        					<span id="e_title"></span>
					        					<figure class="load-content">
								        			<img src="<?php echo base_url();?>assets/img/loading_spinner.gif" class="loading form-loading">
								        		</figure>
					        				</h4>
					        			</div>	
	        						<?php        							

										echo form_open('#', 'class="" id="edicion-esquema"'); 
						      		?>
		        							<!-- Campo oculto que definirá la función del formulario -->
		        							<input type="hidden" id="accion" name="accion" value="">

		        							<!-- Campo Esquema -->
			        						<div class="col-xs-6">
								        		<div class="form-group">
								        			<label class="control-label" for="esquema"><span class="red">*</span>Esquema:</label>
							        				<select class="form-control chosen-select select-esquema" id="esquema" data-dosis="cant_dosis" data-intervalo="intervalo" data-pintervalo="interperiodo" name="esquema" data-placeholder="Seleccionar esquema..." required="required">
							        					<option></option>
							        					<option value="Única">Única</option>
							        					<option value="Dosis">Dosis</option>
							        					<option value="Refuerzo">Refuerzo</option>
							        				</select>
								        		</div>
						        			</div><!--/ Campo Esquema -->

						        			<!-- Campo Cantidad de dosis -->
					        				<div class="col-xs-6">
								        		<div class="form-group">
								        			<label class="control-label" for="cant_dosis"><span class="red">*</span>Cantidad de dosis:</label>
						        					<input type="number" id="cant_dosis" name="cant_dosis" min="1" class="form-control" required pattern="[1-9]{1,4}" value="" >
								        		</div>
						        			</div><!--/ Campo Cantidad de dosis -->

					        				<!-- Campo Intervalo -->
						        			<div class="col-xs-12">
								        		<div class="form-group">
								        			<div class="row">
									        			<label class="col-xs-12 control-label" for="intervalo"><span class="red">*</span>Intervalo:</label>
									        			<div class="col-xs-6">
									        				<input type="number" id="intervalo" name="intervalo" min="1" class="form-control" required>				        				
									        			</div>
									        			<div class="col-xs-6">
									        				<!--<input type="text" id="sub_interperiodo" class="form-control hidden" name="sub_interperiodo" readonly="readonly" value="">-->
									        				<select class="form-control chosen-select" id="interperiodo" name="interperiodo" data-placeholder="Periodo..." required="required">
									        					<option></option>
									        					<option value="Hora(s)">Hora(s)</option>
									        					<option value="Día(s)">Día(s)</option>
									        					<option value="Semana(s)">Semana(s)</option>
									        					<option value="Mes(es)">Mes(es)</option>
									        					<option value="Año(s)">Año(s)</option>
									        				</select>				        				
									        			</div>
									        		</div>
								        		</div>
						        			</div><!--/ Campo Intervalo -->

						        			<!-- Campo Vía de administración -->
						        			<div class="col-xs-12">
								        		<div class="form-group">
								        			<label class="control-label" for="via_administracion"><span class="red">*</span>Vía de administración:</label>	
							        				<select class="form-control chosen-select" id="via_administracion" name="via_administracion" data-placeholder="Seleccionar..." required="required">
							        					<option></option>
							        					<option value="Oral">Oral</option>
							        					<option value="Intramuscular">Intramuscular</option>
							        					<option value="Subcutánea">Subcutánea</option>
							        					<option value="Endovenosa">Endovenosa</option>
							        					<option value="Intradérmica">Intradérmica</option>
							        				</select>
								        		</div>
						        			</div><!--/ Campo Vía de administración -->					        		

					        				<!-- Campo Edad mínima -->
						        			<div class="col-md-12">
						        				<div class="form-group">
						        					<div class="row">
									        			<label class="col-xs-12 control-label" for="eminima"><span class="red">*</span>Edad mínima:</label>
									        			<div class="col-xs-6">
									        				<input type="number" id="eminima" name="eminima" min="1" class="form-control" required>				        				
									        			</div>
									        			<div class="col-xs-6">
									        				<select class="form-control chosen-select" id="eminperiodo" name="eminperiodo" data-placeholder="Periodo..." required="required">
									        					<option></option>
									        					<option value="Hora(s)">Hora(s)</option>
									        					<option value="Día(s)">Día(s)</option>
									        					<option value="Semana(s)">Semana(s)</option>
									        					<option value="Mes(es)">Mes(es)</option>
									        					<option value="Año(s)">Año(s)</option>	
									        				</select>				        				
									        			</div>
									        		</div>
								        		</div>
						        			</div><!--/ Campo Edad mínima -->

						        			<!-- Campo Edad máxima -->
						        			<div class="col-md-12">
						        				<div class="form-group">
						        					<div class="row">
									        			<label class="col-xs-12 control-label" for="emaxima"><span class="red">*</span>Edad máxima:</label>
									        			<div class="col-xs-6">
									        				<input type="number" id="emaxima" name="emaxima" min="1" class="form-control" required>				        				
									        			</div>
									        			<div class="col-xs-6">
									        				<select class="form-control chosen-select" id="emaxperiodo" name="emaxperiodo" data-placeholder="Periodo..." required="required">
									        					<option></option>
									        					<option value="Hora(s)">Hora(s)</option>
									        					<option value="Día(s)">Día(s)</option>
									        					<option value="Semana(s)">Semana(s)</option>
									        					<option value="Mes(es)">Mes(es)</option>
									        					<option value="Año(s)">Año(s)</option>
									        				</select>				        				
									        			</div>
									        		</div>
								        		</div>
						        			</div><!--/ Campo Edad máxima -->

						        			<!-- Campo Dosificacion -->
						        			<div class="col-md-12">
						        				<div class="form-group">
						        					<div class="row">
									        			<label class="col-xs-12 control-label" for="emaxima"><span class="red">*</span>Dosificacion:</label>
									        			<div class="col-xs-6">
									        				<input type="text" id="dosificacion" pattern="[-+]?([0-9]*.[0-9]+|[0-9]+)" name="dosificacion" class="form-control" value="" required>				        				
									        			</div>
									        			<div class="col-xs-6">
									        				<select class="form-control chosen-select" id="tipo_dosificacion" name="tipo_dosificacion" data-placeholder="Periodo..." required="required">
									        					<option></option>
									        					<option value="cc">cc</option>
									        					<option value="ml">ml</option>
									        					<option value="mg">mg</option>
									        					<option value="Onz">Onz</option>
									        					<option value="gotas">gotas</option>
									        				</select>				        				
									        			</div>
									        		</div>
								        		</div>
						        			</div><!--/ Campo Dosificacion -->

						        			<!-- Campo Observaciones -->
						        			<div class="col-xs-12">
								        		<div class="form-group">
								        			<label class="control-label" for="via_administracion"><span class="red">*</span>Observaciones:</label>	
							        				<textarea class="form-control" name="observaciones" id="observaciones" ></textarea>
								        		</div>
						        			</div><!--/ Campo Observaciones -->	

						        			<!-- Botones -->
						        			<div class=" col-xs-12">
						        				<div class="form-group">
						        					<button id="s_esquema" class="btn btn-principal-2" type="submit" data-idesquema="">Guardar</button>
						        					<button id="c_esquema" class="btn btn-default">Cancelar</button>
						        				</div>
						        			</div><!--/ Botones -->

						        	<?php echo form_close();?>

					        		</div>
		        							        					
		        				</div>

						  	</div><!--/ Contenido del panel -->
						</div><!--/ Panel de información - Patologías que combate la vacuna -->
        			</div>
        			<div class="col-xs-12">
        				
        			</div>
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="modal-close" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Eliminar vacuna -->
<div class="modal fade" id="EliminarVacuna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar vacuna</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-xs-12">
        		<h3 id="delete-title">¿Está seguro que desea <span id="action-title"></span> la vacuna "<span id="la-vacuna"></span>"?</h3>
        		<div id="delete-message" class="alert"></div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" id="accion-eliminar-vacuna" class="btn btn-principal-2" data-idpatologia="" data-accion="">Aceptar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-vacunas.js"></script>
<?php include('doctor/footer.php') ?>