<?php include('header.php'); ?>
	<div id="portada">
		<div class="fondo-opaco">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">					
						<div id="mensaje">	
							<div class="alert alert-danger" role="alert">
							</div>					
						</div>
					</div>
					<div class="col-md-8">
						<h2>¡Bienvenido!</h2>		
						<p>La Medicina debe aspirar a ser honorable y dirigir su propia vida profesional; ser moderada y prudente; ser asequible y económicamente sostenible; ser justa y equitativa; y a respetar las opciones y la dignidad de las personas. Los valores elementales de la Medicina contribuyen a preservar su integridad frente a las presiones políticas y sociales que defienden unos fines ajenos o anacrónicos.</p>
					</div>
					<!--<div class="col-md-4">
						<?php if($cont === 0){ ?>							
						<input type="hidden" name="url" id="base_url" value="<?php echo base_url(); ?>">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Regístrate</button>
						<?php } ?>
					</div>-->
				</div>
			</div>
		</div>
	</div>
</div>		
<!-- Modal -->
<?php 
	//if($cont === 0){ 
?>
<!-- Modal -->
<!--
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Registro de Usuario</h4>
	      	</div>
	      	<div class="modal-body">
	      		<form class="form-horizontal" id="registro-usuario" action="<?php echo base_url();?>Login/agregarUsuario">
	        		<div class="row">
	        			<div class="col-md-12">
	        				<div class="mensaje">	
								<div class="alert" role="alert">
								</div>													
							</div>
	        			</div>
	        			<div class="col-md-12">
	        				<h4>
	        					Datos personales
	        					<figure class="load-content">
				        			<img src="<?php echo base_url();?>assets/img/loading_spinner.gif" class="loading form-loading">
				        		</figure>
	        				</h4>
	        			</div>
        				<div class="col-md-12">	
        					<span class="red2">Los campos con (*) son obligatorios</span>	        				
	        				<p class="text-info">El formulario se guardará automáticamente al llenar todos los campos</p>
        				</div>
	        			<div class="row">	
	        				<div class="col-md-12">	        					
			        			<div class="col-md-6">
					        		<div class="form-group">
					        			<label class="col-md-5 control-label" for="cedula"><span class="red">*</span>Cédula:</label>
					        			<div class="col-md-7">
					        				<input type="text" id="cedula" name="cedula" class="form-control" required>
					        			</div>
					        		</div>
			        			</div>
	        				</div>        				
	        			</div>	        			
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-5 control-label" for="nombre1"><span class="red">*</span>Primer Nombre:</label>
			        			<div class="col-md-7">
			        				<input type="text" id="nombre1" name="nombre1" class="form-control"  minlength="2" maxlength="30" required>
			        			</div>
			        		</div>
	        			</div>
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-5 control-label" for="nombre2">Segundo Nombre:</label>
			        			<div class="col-md-7">
			        				<input type="text" id="nombre2" name="nombre2" class="form-control"  minlength="2" maxlength="30" >
			        			</div>
			        		</div>
	        			</div>
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-5 control-label" for="apellido1"><span class="red">*</span>Primer Apellido:</label>
			        			<div class="col-md-7">
			        				<input type="text" id="apellido1" name="apellido1" class="form-control"  minlength="2" maxlength="30" required>
			        			</div>
			        		</div>
	        			</div>
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-5 control-label" for="apellido2">Segundo Apellido:</label>
			        			<div class="col-md-7">
			        				<input type="text" id="apellido2" name="apellido2" class="form-control"  minlength="2" maxlength="30" >
			        			</div>
			        		</div>
	        			</div>	        			
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-5 control-label" for="fecha_nacimiento"><span class="red">*</span>Fecha de nacimiento:</label>
			        			<div class="col-md-7">
			        				<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" max="<?php echo date('Y-m-d');?>" class="form-control"  required> 
			        			</div>
			        		</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-12">
	        					<div class="col-md-6">
					        		<div class="form-group">
					        			<label class="col-md-5 control-label"><span class="red">*</span>Nacionalidad:</label>
					        			<div class="col-md-7 radio">
					        				<label>
											    <input type="radio" name="nacionalidad" value="v" >V
											 </label>
											 <label>
											    <input type="radio" name="nacionalidad" value="e" >E
											 </label>
					        			</div>
					        		</div>
			        			</div>
			        			<div class="col-md-6">
					        		<div class="form-group">
					        			<label class="col-md-5 control-label"><span class="red">*</span>Sexo:</label>
					        			<div class="col-md-7 radio">
					        				<label>
											    <input type="radio" name="sexo" value="m" >M
											 </label>
											 <label>
											    <input type="radio" name="sexo" value="f" >F
											 </label>
					        			</div>
					        		</div>
			        			</div>	        					
	        				</div>
	        			</div>			        			
	        			<div class="col-md-12">
	        				<h5>Dirección Hab.</h5>
	        			</div>
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-5 control-label" for="estado"><span class="red">*</span>Estado:</label>
			        			<div class="col-md-7">
			        				<select id="estado" name="estado" class="chosen-select form-control"  required>
			        					<option value="">Seleccionar Estado</option>
			        				<?php
			        					foreach ($estados as $estado) {
			        						echo "<option value=\"$estado->id\">$estado->estado</option>";
			        					}
			        				?>			        					
			        				</select>
			        			</div>
			        		</div>
	        			</div>
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-5 control-label" for="ciudad"><span class="red">*</span>Ciudad:</label>
			        			<div class="col-md-7">
			        				<select id="ciudad" name="ciudad" class="chosen-select form-control" disabled="disabled" required>
			        					<option value="">Seleccionar Ciudad</option>
			        				</select>
			        			</div>
			        		</div>
	        			</div>
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-5 control-label" for="municipio"><span class="red">*</span>Municipio:</label>
			        			<div class="col-md-7">
			        				<select id="municipio" name="municipio" class="chosen-select form-control" disabled="disabled" required>
			        					<option value="">Seleccionar Municipio</option>	        					
			        				</select>
			        			</div>
			        		</div>
	        			</div>
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-5 control-label" for="parroquia"><span class="red">*</span>Parroquia:</label>
			        			<div class="col-md-7">
			        				<select id="parroquia" name="parroquia" class="chosen-select form-control" disabled="disabled" required>
			        					<option value="">Seleccionar Parroquia</option>        					
			        				</select>
			        			</div>
			        		</div>
	        			</div>
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-5 control-label" for="direccion"><span class="red">*</span>Dirección:</label>
			        			<div class="col-md-7">
			        				<input type="text" id="direccion" name="direccion" class="form-control"  required>
			        			</div>
			        		</div>
	        			</div>
	        			<div class="col-md-12">
	        				<h4>Datos de usuario</h4>
	        			</div>	        			
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-6 control-label" for="password1"><span class="red">*</span>Contraseña:</label>
			        			<div class="col-md-6">
			        				<input type="password" id="password1" name="password1" class="form-control"  required>
			        			</div>
			        		</div>
	        			</div>
	        			<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="col-md-6 control-label" for="password2"><span class="red">*</span>Confirmar contraseña:</label>
			        			<div class="col-md-6">
			        				<input type="password" id="password2" name="password2" class="form-control"  required>
			        			</div>
			        		</div>
	        			</div>
	        		</div>
	      		</form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-danger close1" data-dismiss="modal">Cancelar</button>
	      	</div>
	    </div>
  	</div>
</div>
-->
<?php //}
	include('footer.php'); 
?>	