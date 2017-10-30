<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Reporte de pacientes atendidos
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Reportes</li>
    <li class="active">Pacientes atendidos</li>
  </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-12 col-sm-5">
						<h3><span class="glyphicon glyphicon-calendar"></span> Buscar datos para el reporte</h3>
					</div>
					<div class="col-xs-12 col-sm-7">						
						<div id="alert-message" class="alert alert-danger hidden" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<p></p>
						</div>	
					</div>	
				</div>				
			</div>
			<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
			<div class="box-body">
				<?php
					$url =  base_url()."Reportes/informePacientesAtendidos";
					
					echo form_open(
	      				$url,
	      				'id="periodo-reporte"'
	      				); 
	      		?>
				<div class="row">
					<div class="col-xs-12 col-sm-3">						
						<div class="form-group">
							<div class="panel panel-default">
							  	<div class="panel-heading">
							  		<div class="row">
							  			<div class="col-xs-12 col-sm-6">
											<div class="radio">								
												<label class="control-label"><input type="radio" name="tipo_fecha" id="por_dia" value="dia" required="required" checked="checked"> Por día:</label>
											</div>	
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="radio">								
												<label class="control-label"><input type="radio" name="tipo_fecha" id="por_mes" value="mes" required="required"> Por mes:</label>
											</div>	
										</div>
							  		</div>
							  	</div>
							  	<div class="panel-body">							    	
									<div class="row">								
										<div class="col-xs-12">
											<input type="date" name="fecha_dia_mes" id="fecha_dia_mes" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" required="required">	
										</div>
									</div>							
							  	</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="radio">								
										<label class="control-label"><input type="radio" name="tipo_fecha" id="por_rango" value="rango" required="required"> Por rango:</label>
									</div>	
								</div>
								<div class="panel-body">
									<div class="row">								
										<div class="col-xs-12 col-sm-6">
											<div class="input-group">
												<div class="input-group-addon">Deste:</div>
												<input type="date" name="fecha_rango_desde" id="fecha_rango_desde" class="form-control" max="<?php echo date('Y-m-d'); ?>" disabled="disabeld">	
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="input-group">
												<div class="input-group-addon">Hasta:</div>
												<input type="date" name="fecha_rango_hasta" id="fecha_rango_hasta" class="form-control" max="<?php echo date('Y-m-d'); ?>" disabled="disabeld">
											</div>
										</div>
									</div>
								</div>
							</div>							
						</div>
					</div>
					<div class="col-xs-12 col-sm-3">
						<div class="form-group">
							<div class="panel panel-default">
								<div class="panel-heading">							
									<h5>Tipo de consultas:</h5>
								</div>
								<div class="panel-body">
									<select id="select_tipo_consulta" name="select_tipo_consulta" class="form-control">
										<option value="">Seleccionar tipo de consulta</option>
										<option value="curativa">Curativa</option>
										<option value="preventiva">Preventiva</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
	      		<?php echo form_close();?>
			</div>
			<div class="box-footer">
	        	<button id="enviar" type="submit" form="periodo-reporte" class="btn btn-success pull-right">Consultar</button>
	        </div>
		</div>
	</div>

	<div id="resultados">
		<?php $this->load->view('medicina/ReportePacientesAtendidosResultados'); ?>
	</div>
</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validator.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$('#periodo-reporte').validator();

		$("input[type=radio]").on('click',function(e){
			var valor = $(this).val();
			
			$("input[type=date]").each(function(index,value){
				this.disabled = true;
				this.required = false;
			});

			if (valor == 'dia' || valor == 'mes') {
				$("#fecha_dia_mes").attr("disabled",false).attr("required",true);
			}else if(valor == 'rango'){
				$("#fecha_rango_desde").attr("disabled",false).attr("required",true);
				$("#fecha_rango_hasta").attr("disabled",false).attr("required",true);
			}
		});

		$("#periodo-reporte").on("submit", function(e){
			e.preventDefault();
			if (!$("#enviar").hasClass('disabled')) {

				//$("#resultados-overlay").removeClass('hide');

	            var data = $(this).serialize();

	            var request;
	            if (request) {
	                request.abort();
	            }

	            request = $.ajax({
	                url: $(this).attr('action'),
	                type: "POST",
	                data: data
	            });

	            request.done(function (response, textStatus, jqXHR){
	            	//$("#resultados-overlay").addClass('hide');
	                console.log(response);
	                $("#resultados").html(response);
	            });

	            request.fail(function (jqXHR, textStatus, thrown){
	            	//$("#resultados-overlay").addClass('hide');
	            	console.log(jqXHR);
	            	console.log('Error: '+textStatus);
	            	console.log(thrown);
	            });
			}
		});
	});
</script>
