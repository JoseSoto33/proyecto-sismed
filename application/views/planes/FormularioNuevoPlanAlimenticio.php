<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
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
								$url =  base_url()."PlanesAlimenticios/".$this->uri->segment(2, 0);
								if ($this->uri->segment(3, 0) != "0") {
									$url .= "/".$this->uri->segment(3, 0);
								}

								echo form_open_multipart(
				      				$url,
				      				'id="registro-planes"'
				      				); ?>
				      				<!--offset-8 permite que me de un espacio de 8 hacia la izquierda -->
				      			<div class="col-sm-6">
				     				<h4>Nombre: </h4>
				      			</div>
				      			<div class="col-sm-6">
				     				<h4 class="text-right">Fecha: <?php echo date('d-m-Y');?></h4>
				      			</div>
				      			<input type="hidden" name="id_paciente" id="id" value="">
				      			
				      			<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Prescripción Dietética</h3>
				       					</div>
				       					<div class="box-body">				       						
					       					<div class="row">
					       						<div class="col-xs-12">
					       							<div class="form-group">
					       								<textarea class="form-control" name="prescripcion"><?php echo (isset($plan['prescripcion']))? trim($plan['prescripcion']) : set_value('prescripcion'); ?>
					       								</textarea>
					       							</div>
					       						</div>
					       					</div>
				       					</div>
				       				</div>
				       			</div>

				       			<div class="col-xs-12">
				      				<div class="box box-solid box-primary">
						      			<div class="box-header with-border">
				         					<h3 class="box-title">Lista de Sustitutos</h3>
				       					</div>
				       					<div class="box-body">	
				       						<div class="panel-group" id="lista_sustitutos" role="tablist" aria-multiselectable="true">
				       							<?php foreach ($lista_sustitutos as $key => $sustituto) {?>
				       							<div class="panel panel-default">
				       								<div class="panel-heading" role="tab" id="heading<?php echo $sustituto['id']; ?>">
				       									<h4 class="panel-title">
				       										<?php  echo $sustituto['titulo']; 
				       										?>
				       										<a href="#collapse<?php echo $sustituto['id']; ?>" class="pull-right" role="buttom" data-toggle="collapse" data-parent="#lista_sustitutos" aria-expanded="false" aria-controls="collapse<?php echo $sustituto['id']; ?>">
				       											<span class="glyhpicon glyhpicon-plus"></span>
				       										</a>
				       									</h4>
				       								</div>
				       								<div id="collapse <?php echo $sustituto['id']; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $sustituto['id']; ?>">
				       									<div class="panel-body">
				       										<div class="raciones-contentt" >
				       											<input type="hidden" class="id_sustituto" value="<?php echo $sustituto['id']; ?>">
					       										<div class="row fila">
					       											<div class="col-xs-11">
					       												<div class="row">
							       											<div class="col-xs-12 col-sm-4" >
							       												<div class="form-group">
							       													<label class="control-label">Ración</label>
							       													<select class="form-control racion" name="racion[]">
							       														<option value=""></option>
							       														<?php 
							       														foreach ($raciones[$sustituto['id']] as $key => $racion) {?>
							       															<option value="<?php echo $racion['id']?>">
							       															<?php  echo $racion['descripcion']?>
							       															</option>
							       													<?php } ?>
							       														
							       													</select>
							       												</div>
							       											</div>

							       											<div class="col-xs-12 col-sm-4" >
							       												<div class="form-group">
							       													<label class="control-label">Equivalente</label>
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
							       													<label class="control-label">Medida</label>
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
					       											</div>
					       										</div>
					       									</div>
				       										<div class="row">
				       											<div class="col-sm-12">
				       												<button type="button" class="btn btn-info pull-right agregar-fila" data-id_sustituto="<?php echo $sustituto['id'];?>">
				       													Añadir
				       												</button>
				       											</div>
				       										</div>
				       									</div>
				       								</div>
				       							</div>
				       							<?php } ?>
				       							
				       						</div>
				       					</div>
				       				</div>
				       			</div>

								<div class="col-sm-12">						
									<small> 
										<span class="red2">Los campos con (*) son obligatorios.</span>
									</small>
								</div>	

							<?php echo form_close(); ?>
						</div>
		        	</div>		        	
		        </div>
		        <div class="box-footer">
					<a href="<?php echo base_url(); ?>Citas/ListarCitas" class="btn btn-default">Cancelar</a>
		        	<button id="guardar" type="submit" form="registro-planes" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
	
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var select_raciones = [];
	$(".agregar-fila").on("click", function(event){
		event.preventDefault();/*el elemento del boton lo anula*/
		var contenedor = $(this).closest('.panel-body'),
			lista = contenedor.find('.raciones-contentt'),
			id_sustituto = $(this).data('id_sustituto'), 
			request;

		if(request){
			request.abort();
		}

		request= $.ajax({
			url:"<?php echo base_url();?>PlanesAlimenticios/AgregarFilaRacion",
			type: "POST",
			data:"id_sustituto="+id_sustituto
		});
		request.done(function(response,textStatus,jqXRH){
			lista.append(response);
		});
		request.fail(function(jqXRH,textStatus,thrown){
			alert("error:"+textStatus);
		});
	});

	$(".raciones-contentt").on("click", ".fila .col-xs-1 .quitar-fila", function(event){
		event.preventDefault();
		var boton = $ (this),
			fila = boton.closest('.fila');
		fila.remove();
	});

	$(".raciones-contentt").on("change", ".row .col-xs-11 .racion", function(event){
		event.preventDefault();
		var select = $ (this),
			fila = select.closest('.raciones-contentt'),
			valor = select.val(),
			id_sustituto = fila.find('.id_sustituto').val();
		select_raciones[id_sustituto] = [];
		select_raciones[id_sustituto].push(valor);
		console.log(select_raciones);
		seleccionados(select_raciones[id_sustituto], fila);
	});

	function seleccionados(arr_select, elemento) {
		elemento.find('.fila').each(function(i,v){
			var select = $(this).find('.racion');
			select.find('option').each(function(index, value){
				if (select.val() != $(this).attr('value') && $.inArray($(this).attr('value'), arr_select) > -1) {
					$(this).prop('disabled',true);
				}else{
					$(this).prop('disabled',false);
				}
			});
		});
	}

});
</script>
