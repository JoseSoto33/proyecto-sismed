<div class="row fila">
	<div class="col-xs-11">	
		<div class="row">			       											
			<div class="col-xs-12 col-sm-4" >
				<div class="form-group">
					
					<select class="form-control" name="racion[]">
						<option value=""></option>
						<?php 
						foreach ($raciones as $key => $racion) {?>
							<option value="<?php echo $racion['id']?>">
								<?php  echo $racion['descripcion']?>
							</option>
					<?php } ?>
						
					</select>
				</div>
			</div>

			<div class="col-xs-12 col-sm-4" >
				<div class="form-group">
					
					<select class="form-control" name="equivalente[]">
						<option value=""></option>
						<?php 
						foreach ($lista_equivalente as $key => $equivalente) {?>
							<option value="<?php echo $equivalente['id']?>">
								<?php  echo $equivalente['equivalente']?>
							</option>
					<?php } ?>
						
					</select>
				</div>
			</div>

			<div class="col-xs-12 col-sm-4" >
				<div class="form-group">
					
					<select class="form-control" name="medida[]">
						<option value=""></option>
						<?php 
						foreach ($lista_medida as $key => $medida) {?>
							<option value="<?php echo $medida['id']?>">
								<?php  echo $medida['medida']?>
							</option>
					<?php } ?>
						
					</select>
				</div>
			</div>
		</div>	
		<div class="col-xs-12 col-sm-10" >
			<div class="row">
				<div class="form-group">
					<label class="control-label">Turno de Comidas</label>
					<select name="comidas[]" id="comidas" multiple class="form-control chosenselect" data-placeholder="Seleccione">
					  <option>Desayuno</option>
					  <option>Merienda-D</option>
					  <option>Almuerzo</option>
					  <option>Merienda-A</option>
					  <option>Cena</option>
					  <option>Merienda-C</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-1">
		<button type="button" class="btn btn-danger quitar-fila">
			<span class="glyphicon glyphicon-minus">
				
			</span>
		</button>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$(".raciones-contentt .fila .chosenselect").chosen({ width: "100%"});
});
</script>