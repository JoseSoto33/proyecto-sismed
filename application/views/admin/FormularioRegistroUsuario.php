<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Agregar nuevo usuario</h1>
			</div>
			<div class="col-sm-12">
				<form id="registro-usuario" class="form-horizontal">
					<div class="col-sm-12">
						<h2>Datos personales</h2>
					</div>
					<hr class="form-divisor-line">
					<div class="col-sm-12">	
						<div class="row">
							<div class="col-sm-6">				
								<div class="form-group">
									<label for="cedula" class="col-sm-4 control-label">Cédula</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="cedula" placeholder="Cedula">
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nombre1" class="col-sm-4 control-label">Primer nombre</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="nombre1" placeholder="">
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nombre2" class="col-sm-4 control-label">Segundo nombre</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="nombre2" placeholder="">
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">		
							<div class="col-sm-6">
								<div class="form-group">
									<label for="apellido1" class="col-sm-4 control-label">Primer apellido</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="apellido1" placeholder="">
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="apellido2" class="col-sm-4 control-label">Segundo apellido</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="apellido2" placeholder="">
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="fecha-nac" class="col-sm-4 control-label">Fecha de nacimiento</label>
								    <div class="col-sm-8">
								      <input type="date" class="form-control" id="fecha-nac" placeholder="">
								    </div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="email" class="col-sm-4 control-label">Correo electrónico</label>
								    <div class="col-sm-8">
								      <input type="email" class="form-control" id="email" placeholder="">
								    </div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="telefono-p" class="col-sm-4 control-label">Teléfono personal</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="telefono-p" placeholder="(0212) 555-44-88">
								    </div>
								</div>							
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="telefono-e" class="col-sm-4 control-label">Teléfono emergencia</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="telefono-e" placeholder="(0212) 555-44-88">
								    </div>
								</div>							
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="telefono-e" class="col-sm-4 control-label">Sexo</label>
									<div class="col-sm-8">								
										<label class="radio-inline">
										  	<input type="radio" name="sexo" id="sexo1" value="f"> Mujer
										</label>
										<label class="radio-inline">
										  	<input type="radio" name="sexo" id="sexo2" value="m"> Hombre
										</label>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="telefono-e" class="col-sm-4 control-label">Dirección</label>
								    <div class="col-sm-8">
								      <textarea class="form-control"></textarea>
								    </div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<h2>Datos de usuario</h2>
					</div>
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="username" class="col-sm-4 control-label">Username</label>
									<div class="col-sm-8">								
										<input type="text" class="form-control" id="username">
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="especialidad" class="col-sm-4 control-label">Especialidad</label>
									<div class="col-sm-8">								
										<select class="form-control" id="especialidad">
											<option value="Administrador">Administrador</option>
											<option value="Medicina">Medicina</option>
											<option value="Odontología">Odontología</option>
											<option value="Laboratorio">Laboratorio</option>
											<option value="Nutrición">Nutrición</option>
										</select>
									</div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="password1" class="col-sm-4 control-label">Contraseña</label>
									<div class="col-sm-8">								
										<input type="password" class="form-control" id="password1">
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="password2" class="col-sm-4 control-label">Confirmar contraseña</label>
									<div class="col-sm-8">								
										<input type="password" class="form-control" id="password2">
									</div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tipo-usuario" class="col-sm-4 control-label">Tipo de usuario</label>
									<div class="col-sm-8">								
										<select class="form-control" id="tipo-usuario">
											<option value="Administrador">Administrador</option>
											<option value="Doctor">Doctor</option>
											<option value="Enfermero">Enfermero</option>
											<option value="Odontólogo">Odontólogo</option>
											<option value="Bioanalista">Bioanalista</option>
											<option value="Nutricionista">Nutricionista</option>
											<option value="Asistente">Asistente</option>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="grado" class="col-sm-4 control-label">Grado de instrucción</label>
									<div class="col-sm-8">								
										<select class="form-control" id="grado">
											<option value="Administrador">Bachillerato</option>
											<option value="Medicina">TSU</option>
											<option value="Odontología">Ingeniería</option>
											<option value="Laboratorio">Licenciatura</option>
											<option value="Nutrición">Doctorado</option>
										</select>
									</div>
								</div>						
							</div>
						</div>
					</div>
				</form>			
			</div>
		</div>
	</div>
</div>

<?php include('footer.php') ?>