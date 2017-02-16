<?php include('header.php') ?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Agregar nueva noticia</h1>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<form id="registro-noticia" class="form-basic" action="<?php echo base_url(); ?>Noticia/AgregarNoticia">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="titulo" class="control-label">Títitulo</label>
						    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="">
						</div>						
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="link" class="control-label">Enlace</label>
						    <input type="text" class="form-control" id="link" name="link" placeholder="http://www.paginaweb.com">
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