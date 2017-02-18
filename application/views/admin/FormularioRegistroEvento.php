<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Agregar nuevo evento</h1>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<form id="registro-evento" class="form-basic" action="<?php echo base_url(); ?>Evento/AgregarEvento">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="titulo" class="control-label">Títitulo</label>
						    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="">						    
						</div>						
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="fecha_pautada" class="control-label">Fecha del evento</label>
						    <input type="date" class="form-control" id="fecha_pautada" name="fecha_pautada" placeholder="">
						</div>
					</div>	
					<div class="col-sm-6">
						<div class="form-group">
							<label for="hora_inicio" class="control-label">Hora de inicio</label>
						    <input type="text" class="form-control" id="hora_inicio" name="hora_inicio" placeholder="02:25 pm">
						</div>
					</div>	
					<div class="col-sm-6">
						<div class="form-group">
							<label for="hora_fin" class="control-label">Hora de finalización</label>
						    <input type="text" class="form-control" id="hora_fin" name="hora_fin" placeholder="05:25 pm">
						</div>
					</div>		
					<div class="col-sm-12">			
						<div class="form-group">
							<label for="descripcion" class="control-label">Descripción</label>
						    <textarea class="form-control" name="descripcion" id="descripcion"></textarea>						    
						</div>
					</div>
					
					<hr class="form-divisor-line">
					<div class="col-sm-12">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" class="btn btn-form btn-lg btn-block">Guardar</button>
							<button type="button" class="btn btn-second-2 btn-lg btn-block">Volver</button>
						</div>						
					</div>
				</form>			
			</div>
		</div>
	</div>
</div>

<?php include('footer.php') ?>