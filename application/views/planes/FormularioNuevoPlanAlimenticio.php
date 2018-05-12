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
				       								<div class="panel-heading" role="tab" id="heading<?php echo $sustituto['id'] ?>">
				       									<h4 class="panel-title">
				       										<?php  echo $sustituto['titulo']; 
				       										?>
				       										<a href="#collapse<?php echo $sustituto['id']; ?>" class="pull-right" role="buttom" data-toggle="collapse" data-parent="#lista_sustitutos" aria-expanded="false" aria-controls="collapse<?php echo $sustituto['id']; ?>">
				       											<span class="glyhpicon glyhpicon-plus"></span>
				       										</a>
				       									</h4>
				       								</div>
				       								<div id="collapse <?php echo $sustituto['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $sustituto['id']; ?>">
				       									<div class="panel-body">
				       										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				       										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				       										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				       										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				       										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				       										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
		        	<button id="guardar" type="submit" form="registro-citas" class="btn btn-success pull-right">Guardar</button>
		        </div>
		    </div>
		</div>
	</div>
	
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	$("#examenes").on('keyup', function( event ) {
		$("#orden_body .center-block p").html($(this).val());
	});

	$("input[name=examen_lb]").on('change', function( event ) {
		if ($(this).val() == 0) {
			$("#generar_orden").removeClass('hidden');
		}else{
			$("#generar_orden").addClass('hidden');
		}
	});

	if ($("input[name=estatus_actual]").length>0) {
		var estatus= $("input[name=estatus_actual]").val();
		switch(estatus){
			case "0": 
				var permitidos=["0","3"];
				break;
			case "1":
				var permitidos =["1","2","3"];
				break; 
		}

		$("#estatus option").each(function(index,value){
			var select_estatus = $(this).val();
			if( $.inArray(select_estatus, permitidos)== -1){
			 	$(this).remove();
			}
		});
	}

	$("#reset").on("click", function(event){
		event.preventDefault();/*el elemento del boton lo anula*/
		$("#cedula").val('').prop("readonly",false);
		$("#nombre1").val('').prop("readonly",true);
		$("#apellido1").val('').prop("readonly",true);
		$("#email").val('').prop("readonly",true);
		$("#fecha_nacimiento").val('').prop("readonly",true);
		$("#tipo_paciente").val('').prop("readonly",true);
		$("input[name=sexo]").prop("checked",false).prop("readonly",true);
	});

	/*Al momento de darle click a buscar, captura el evento y ejecuta la función que se establece*/
	$("#search").on("click", function(event){
		event.preventDefault();/*el elemento del boton lo anula*/

		var cedula= $("#cedula").val();/*obtiene el valor del campo que lleva por id cedula*/
		if (cedula.length >=6) {
			var request;/*variable que almacena la peticion del servidor*/
			if (request) {
				request.abort();
			}

			request= $.ajax({
				/* funcion que trae por defecto el url del sistema*/
				url: "<?php echo base_url(); ?>Citas/ValidarPaciente",
				type: "POST",
				dataType: "json",/*Se utiliza para manejar objetos y arreglos */
				data: "cedula="+cedula
			});
			/*La peticion se ejecuta con exito*/
			request.done(function(response,textStatus,jqXRH){
				console.log(response);
				if (response != null){
					$.each(response,function(index,value){/*Recorre cada posicion del arreglo response*/
						if(value == "" || value == null || value == " " || value == undefined){
							if(index == 'sexo'){
								$("input[name=sexo]").prop("checked",false);
							}else{
								$("#"+index).prop("readonly",false);
							}
						}else{
							if (index == 'sexo') {
								/*Tiple igual: es exactamente igual*/
								if (value === 'm') {
									$("#sexoM").prop("checked",true);
								}else{
									$("#sexoF").prop("checked",true);
								}
								$("input[name=sexo]").prop("readonly",true);
							}else if(index == 'tipo_paciente'){/*compara el valor de tipo de paciente traido desde el servidor con cada opcion del select de tipo paciente*/
								$("#"+index+" option").prop("readonly",true);
								$("#"+index+" option").each(function(i,val){
									if ($(this).val() == value.substr(0,1).toUpperCase()+$(this).val().substr(1)) {

										$(this).prop("selected",true);
									}
								});
								setTimeout(function(){/*sepera determinado tiempo para ejecutar la sentencias establecidas en el*/
									$("#"+index).attr("readonly","readonly");
								},60);
							}else{
								$("#"+index).val(value).prop("readonly",true);
							}
						}
					});

				}else{
					$(".form-control").prop("readonly",false);
					$("select.form-control").removeAttr("readonly");
				}
			}); 
			request.fail(function(jqXRH,textStatus,thrown){
				alert("error: "+textStatus);
			});

		}
	});
});
</script>
