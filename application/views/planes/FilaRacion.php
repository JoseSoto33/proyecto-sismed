<div class="row fila">
	<div class="col-xs-11">	
		<div class="row">			       											
			<div class="col-xs-12 col-sm-4" >
				<div class="form-group">
					<label class="control-label"><span class="red"> *</span>Ración</label>					
					<select required class="form-control racion" name="racion[<?php echo $id_sustituto; ?>][]">
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

			<div class="col-xs-12 col-sm-4 col-sm-offset-4" >
				<div class="form-group">
					<label class="control-label"><span class="red"> *</span>Medida</label>					
					<select required class="form-control medida" name="medida[<?php echo $id_sustituto; ?>][]">
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
		<div class="col-xs-12" >
			<div class="table-responsive">
				<label class="control-label"><span class="red"> *</span>Equivalentes</label>
			 	<table class="table table-hover table-bordered">
  					<thead>
  						<tr class="active">
  							<th class="text-center">D</th>
  							<th class="text-center">DM</th>
  							<th class="text-center">A</th>
  							<th class="text-center">AM</th>
  							<th class="text-center">C</th>
  							<th class="text-center">CM</th>
  						</tr>
  					</thead>
  					<tbody>
  						<tr>
  							<td>
								<select class="form-control equivalente-d" name="equivalente[<?php echo $id_sustituto; ?>][1][]">
									<option value=""></option>
									<?php 
									foreach ($lista_equivalente as $key => $equivalente) {?>
									<option value="<?php echo $equivalente['id']?>">
										<?php  echo $equivalente['equivalente']?>
									</option>
									<?php } ?>
								</select>
  							</td>
  							<td>
								<select class="form-control equivalente-dm" name="equivalente[<?php echo $id_sustituto; ?>][2][]">
									<option value=""></option>
									<?php 
									foreach ($lista_equivalente as $key => $equivalente) {?>
									<option value="<?php echo $equivalente['id']?>">
										<?php  echo $equivalente['equivalente']?>
									</option>
									<?php } ?>
								</select>
  							</td>
  							<td>
								<select class="form-control equivalente-a" name="equivalente[<?php echo $id_sustituto; ?>][3][]">
									<option value=""></option>
									<?php 
									foreach ($lista_equivalente as $key => $equivalente) {?>
									<option value="<?php echo $equivalente['id']?>">
										<?php  echo $equivalente['equivalente']?>
									</option>
									<?php } ?>
								</select>
  							</td>
  							<td>
								<select class="form-control equivalente-am" name="equivalente[<?php echo $id_sustituto; ?>][4][]">
									<option value=""></option>
									<?php 
									foreach ($lista_equivalente as $key => $equivalente) {?>
									<option value="<?php echo $equivalente['id']?>">
										<?php  echo $equivalente['equivalente']?>
									</option>
									<?php } ?>
								</select>
  							</td>
  							<td>
								<select class="form-control equivalente-c" name="equivalente[<?php echo $id_sustituto; ?>][5][]">
									<option value=""></option>
									<?php 
									foreach ($lista_equivalente as $key => $equivalente) {?>
									<option value="<?php echo $equivalente['id']?>">
										<?php  echo $equivalente['equivalente']?>
									</option>
									<?php } ?>
								</select>
  							</td>
  							<td>
								<select class="form-control equivalente-cm" name="equivalente[<?php echo $id_sustituto; ?>][6][]">
									<option value=""></option>
									<?php 
									foreach ($lista_equivalente as $key => $equivalente) {?>
									<option value="<?php echo $equivalente['id']?>">
										<?php  echo $equivalente['equivalente']?>
									</option>
									<?php } ?>
								</select>
  							</td>
  						</tr>
  					</tbody>
				</table>
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