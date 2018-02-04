<?php 
	setlocale(LC_TIME,"esp"); 
	
	if (!empty($fecha)) {
		$periodo = "Día";
		$periodo_imprimir = strftime('%d de %B de %Y', strtotime($fecha));
	}else if (!empty($fecha_mes)) {
		$periodo = "Mes";
		$periodo_imprimir = strftime('%B de %Y', strtotime($fecha_mes));
	}else if (!empty($rango)) {
		$periodo = "Rango";
		$periodo_imprimir = strftime('%d de %B de %Y', strtotime($rango['desde']))." - ".strftime('%d de %B de %Y', strtotime($rango['hasta']));
	}
?>
<h3 id="fecha_consultada"><?php echo $descripcion_periodo." ".$periodo_imprimir; ?></h3>

<h3 id="tipo-reporte"><?php echo (!empty($consultas))? $consultas : "Todas las consultas"; ?></h3>
<div class="col-xs-12">	
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<div id="estudiantes" class="info-box bg-green" data-cantidad="<?php echo $estudiante['cantidad']; ?>">
	            <span class="info-box-icon"><i class="ion ion-ios-people"></i></span>

	            <div class="info-box-content">
	              	<span class="info-box-text">Estudiantes</span>
	              	<span class="info-box-number"><?php echo $estudiante['cantidad']; ?></span>

	              	<div class="progress">
	                	<div class="progress-bar" <?php echo "style=\"width: ".number_format($estudiante['porcentaje'],2,'.','')."%;\""; ?> ></div>
	              	</div>
	                <span class="progress-description">
	                    <?php echo number_format($estudiante['porcentaje'],2,'.','')."% de los pacientes"; ?>
	                </span>
	            </div>
	            <!-- /.info-box-content -->
	        </div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div id="estudiantes-v" class="info-box bg-aqua" data-cantidad="<?php echo $estudiante['m']['cantidad']; ?>">
	            <span class="info-box-icon"><i class="ion ion-ios-people"></i></span>

	            <div class="info-box-content">
	              	<span class="info-box-text">Estudiantes varones</span>
	              	<span class="info-box-number"><?php echo $estudiante['m']['cantidad']; ?></span>

	              	<div class="progress">
	                	<div class="progress-bar" <?php echo "style=\"width: ".number_format($estudiante['m']['porcentaje'],2,'.','')."%;\""; ?> ></div>
	              	</div>
	                <span class="progress-description">
	                    <?php echo number_format($estudiante['m']['porcentaje'],2,'.','')."% de los estudiantes"; ?>
	                </span>
	            </div>
	            <!-- /.info-box-content -->
	        </div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div id="estudiantes-h" class="info-box bg-maroon" data-cantidad="<?php echo $estudiante['f']['cantidad']; ?>">
	            <span class="info-box-icon"><i class="ion ion-ios-people"></i></span>

	            <div class="info-box-content">
	              	<span class="info-box-text">Estudiantes hembras</span>
	              	<span class="info-box-number"><?php echo $estudiante['f']['cantidad']; ?></span>

	              	<div class="progress">
	                	<div class="progress-bar" <?php echo "style=\"width: ".number_format($estudiante['f']['porcentaje'],2,'.','')."%;\""; ?> ></div>
	              	</div>
	                <span class="progress-description">
	                    <?php echo number_format($estudiante['f']['porcentaje'],2,'.','')."% de los estudiantes"; ?>
	                </span>
	            </div>
	            <!-- /.info-box-content -->
	        </div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<div class="row">
				<div class="col-xs-12">
					<div id="docentes" class="info-box bg-navy" data-cantidad="<?php echo $docente['cantidad']; ?>">
			            <span class="info-box-icon"><i class="ion ion-ios-people"></i></span>

			            <div class="info-box-content">
			              	<span class="info-box-text">Docentes</span>
			              	<span class="info-box-number"><?php echo $docente['cantidad']; ?></span>

			              	<div class="progress">
			                	<div class="progress-bar" <?php echo "style=\"width: ".number_format($docente['porcentaje'],2,'.','')."%;\""; ?> ></div>
			              	</div>
			                <span class="progress-description">
			                    <?php echo number_format($docente['porcentaje'],2,'.','')."% de los pacientes"; ?>
			                </span>
			            </div>
			            <!-- /.info-box-content -->
			        </div>
				</div>
				<div class="col-xs-12">
					<div id="administrativos" class="info-box bg-teal" data-cantidad="<?php echo $administrativo['cantidad']; ?>">
			            <span class="info-box-icon"><i class="ion ion-ios-people"></i></span>

			            <div class="info-box-content">
			              	<span class="info-box-text">Administrativos</span>
			              	<span class="info-box-number"><?php echo $administrativo['cantidad']; ?></span>

			              	<div class="progress">
			                	<div class="progress-bar" <?php echo "style=\"width: ".number_format($administrativo['porcentaje'],2,'.','')."%;\""; ?> ></div>
			              	</div>
			                <span class="progress-description">
			                    <?php echo number_format($administrativo['porcentaje'],2,'.','')."% de los pacientes"; ?>
			                </span>
			            </div>
			            <!-- /.info-box-content -->
			        </div>
				</div>
				<div class="col-xs-12">
					<div id="obreros" class="info-box bg-blue" data-cantidad="<?php echo $obrero['cantidad']; ?>">
			            <span class="info-box-icon"><i class="ion ion-ios-people"></i></span>

			            <div class="info-box-content">
			              	<span class="info-box-text">Obreros</span>
			              	<span class="info-box-number"><?php echo $obrero['cantidad']; ?></span>

			              	<div class="progress">
			                	<div class="progress-bar" <?php echo "style=\"width: ".number_format($obrero['porcentaje'],2,'.','')."%;\""; ?> ></div>
			              	</div>
			                <span class="progress-description">
			                    <?php echo number_format($obrero['porcentaje'],2,'.','')."% de los pacientes"; ?>
			                </span>
			            </div>
			            <!-- /.info-box-content -->
			        </div>
				</div>			
				<div class="col-xs-12">
					<div id="cortesia" class="info-box bg-purple" data-cantidad="<?php echo $cortesia['cantidad']; ?>">
			            <span class="info-box-icon"><i class="ion ion-ios-people"></i></span>

			            <div class="info-box-content">
			              	<span class="info-box-text">Cortesía</span>
			              	<span class="info-box-number"><?php echo $cortesia['cantidad']; ?></span>

			              	<div class="progress">
			                	<div class="progress-bar" <?php echo "style=\"width: ".number_format($cortesia['porcentaje'],2,'.','')."%;\""; ?> ></div>
			              	</div>
			                <span class="progress-description">
			                    <?php echo number_format($cortesia['porcentaje'],2,'.','')."% de los pacientes"; ?>
			                </span>
			            </div>
			            <!-- /.info-box-content -->
			        </div>
				</div>					
			</div>
		</div>			
		<div class="col-xs-12 col-sm-8">
			<div class="box box-success">
				<div class="box-header">
					<h3>Representación en gráficos de torta</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<?php if ($total > 0) { ?>
						<div class="col-xs-12 col-sm-6">
						<h4>Población general</h4>								
							<canvas id="pieChart1"></canvas>
						</div>
						<div class="col-xs-12 col-sm-6">
						<h4>Población estudiantil</h4>								
							<canvas id="pieChart2"></canvas>
						</div>
						<?php }else{ ?>
						<div class="col-xs-12">
							<h4 class="text-center">Sin resultados obtenidos para la fecha solicitada</h4>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php if ($total > 0) { ?>
				<div class="box-footer">
					<button class="btn btn-success" data-toggle="modal" data-target="#verImprimir">Ver versión para imprimir</button>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div id="verImprimir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Versión para imprimir</h4>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
		    		<div id="modal_hoja_impresion" class="col-xs-12 col-sm-10 col-sm-offset-1">
		        		<div id="modal_cintillo">
		    				<figure class="pull-left">
								<img alt="Gobierno Bolivariano de Venezuela" src="<?php echo base_url(); ?>assets/img/gbv-logo.png">
							</figure>
							<figure class="pull-right">
								<div class="row">
									<div class="col-xs-6">
										<img src="<?php echo base_url(); ?>assets/img/victorioso-logo.png">
									</div>
									<div class="col-xs-6">
										<img src="<?php echo base_url(); ?>assets/img/iut-logo3.png">
									</div>
								</div>									
							</figure>
		    			</div>
		    			<div id="verimp_titulos">		    				
			    			<h3>Informe de Actividades Médicas. Servicio Médico I.U.T. Dr. Federico Rivero Palacio</h3>
			    			<h4>
			    				<?php
			    					if ($this->session->userdata('tipo_usuario') == 'Doctor') {
			    						if ($this->session->userdata('sexo') == 'f') {
			    							echo "Dra. " . $this->session->userdata('nombre') ." ". $this->session->userdata('apellido');
			    						}else if ($this->session->userdata('sexo') == 'm') {
			    							echo "Dr. " . $this->session->userdata('nombre') ." ". $this->session->userdata('apellido');
			    						}
			    					}else{
			    						echo "Lic. " . $this->session->userdata('nombre') ." ". $this->session->userdata('apellido');
			    					}
			    				?>		    					
			    			</h4>			    			
							<h5><?php echo $periodo_imprimir; ?></h5>								
		    			</div>
		    			<div id="verimp_info">
		    				<div id="nota_jornada-content" class="nota-content">
			    				<p id="nota_jornada" class="nota">
			    					<span>Nota sobre jornada</span> <button class="btn btn-default btn-xs hide"><span class="glyphicon glyphicon-pencil"></span></button>
			    				</p>
			    				<div class="input-nota-content hide">
				    				<div class="form-group">
				    					<textarea name="input-nota-jornada" class="form-control">Nota sobre jornada</textarea>
				    				</div>
				    				<div class="form-group">
				    					<button class="btn btn-primary">Aceptar</button>
				    				</div>
				    			</div>
			    			</div>
			    			<div id="nota_jornada-content" class="nota-content">
			    				<p id="nota_observacion" class="nota">
			    					<span>Observación</span> <button class="btn btn-default btn-xs hide"><span class="glyphicon glyphicon-pencil"></span></button>
			    				</p>
			    				<div class="input-nota-content hide">
				    				<div class="form-group">
				    					<textarea name="input-nota-observacion" class="form-control">Observación</textarea>
				    				</div>
				    				<div class="form-group">
				    					<button class="btn btn-primary">Aceptar</button>
				    				</div>
				    			</div>
			    			</div>
		    				<h5>
		    					<?php echo (!empty($consultas))? $consultas ." ". $periodo_imprimir : "Todas las consultas ". $periodo_imprimir; ?>
		    				</h5>
		    				<table class="table table-bordered">
		    					<thead>
		    						<tr>
		    							<th><?php echo $periodo; ?></th>
		    							<th colspan="2">Estudiante</th>
		    							<th>Administrativo</th>
		    							<th>Obrero</th>
		    							<th>Cortesía</th>
		    							<th>Docente</th>
		    							<th>Total por <?php echo $periodo; ?></th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr>
		    							<td><?php echo $periodo_imprimir; ?></td>
		    							<td style="padding: 0px !important;">
		    								<table class="table table-bordered" style="margin-bottom: 0px !important;">
		    									<thead>
		    										<tr>
		    											<th class="text-center">H</th>
		    										</tr>
		    									</thead>
		    									<tbody>
		    										<tr>
		    											<td class="text-center" style="border-bottom: 0px !important;"><?php echo $estudiante['f']['cantidad']; ?></td>
		    										</tr>
		    									</tbody>
		    								</table>
		    							</td>
		    							<td style="padding: 0px !important;">
		    								<table class="table table-bordered" style="margin-bottom: 0px !important;">
		    									<thead>
		    										<tr>
		    											<th class="text-center">V</th>
		    										</tr>
		    									</thead>
		    									<tbody>
		    										<tr>
		    											<td class="text-center" style="border-bottom: 0px !important;"><?php echo $estudiante['m']['cantidad']; ?></td>
		    										</tr>
		    									</tbody>
		    								</table>
		    							</td>
		    							<td class="text-center"><?php echo $administrativo['cantidad']; ?></td>
		    							<td class="text-center"><?php echo $obrero['cantidad']; ?></td>
		    							<td class="text-center"><?php echo $cortesia['cantidad']; ?></td>
		    							<td class="text-center"><?php echo $docente['cantidad']; ?></td>
		    							<td class="text-center"><?php echo $total; ?></td>
		    						</tr>
		    					</tbody>
		    				</table>
		    			</div>
		    			<div id="verimp_firma">
		    				<p>
	    					<?php
		    					if ($this->session->userdata('tipo_usuario') == 'Doctor') {
		    						if ($this->session->userdata('sexo') == 'f') {
		    							echo "Dra. " . $this->session->userdata('nombre') ." ". $this->session->userdata('apellido');
		    						}else if ($this->session->userdata('sexo') == 'm') {
		    							echo "Dr. " . $this->session->userdata('nombre') ." ". $this->session->userdata('apellido');
		    						}
		    					}else{
		    						echo "Lic. " . $this->session->userdata('nombre') ." ". $this->session->userdata('apellido');
		    					}
		    				?>	
		    				</p>
		    				<p>C.I.: </p>
		    			</div>
		    		</div>		        	
		        </div>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </div>
	    </div>
  	</div>
</div>

<!-- ChartJS -->
<script src="<?php echo base_url(); ?>bower_components/Chart.js/Chart.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//-------------
	    //- PIE CHART -
	    //-------------
	    //Si existen los elementos..
	    if ($('#pieChart1').length && $('#pieChart2').length) {//

	    // Obtener contexto con jQuery - usando el método .get() de jQuery.
		    var pieChart1Canvas = $('#pieChart1').get(0).getContext('2d');
		    var pieChart1       = new Chart(pieChart1Canvas);
		    var PieData1        = [
		      {
		        value    : $("#estudiantes").data("cantidad"),
		        color    : '#00A65A',
		        highlight: '#00A65A',
		        label    : 'Estudiantes'
		      },
		      {
		        value    : $("#docentes").data("cantidad"),
		        color    : '#001F3F',
		        highlight: '#001F3F',
		        label    : 'Docentes'
		      },
		      {
		        value    : $("#administrativos").data("cantidad"),
		        color    : '#39CCCC',
		        highlight: '#39CCCC',
		        label    : 'Administrativos'
		      },
		      {
		        value    : $("#obreros").data("cantidad"),
		        color    : '#0073B7',
		        highlight: '#0073B7',
		        label    : 'Obreros'
		      },
		      {
		        value    : $("#cortesia").data("cantidad"),
		        color    : '#605CA8',
		        highlight: '#605CA8',
		        label    : 'Cortesía'
		      }
		    ];

		    var pieChart2Canvas = $('#pieChart2').get(0).getContext('2d');
		    var pieChart2       = new Chart(pieChart2Canvas);
		    var PieData2        = [
		      {
		        value    : $("#estudiantes-v").data("cantidad"),
		        color    : '#00C0EF',
		        highlight: '#00C0EF',
		        label    : 'Varones'
		      },
		      {
		        value    : $("#estudiantes-h").data("cantidad"),
		        color    : '#D81B60',
		        highlight: '#D81B60',
		        label    : 'Hembras'
		      }	      
		    ];

		    var pieOptions     = {
		      //Boolean - Whether we should show a stroke on each segment
		      segmentShowStroke    : true,
		      //String - The colour of each segment stroke
		      segmentStrokeColor   : '#fff',
		      //Number - The width of each segment stroke
		      segmentStrokeWidth   : 2,
		      //Number - The percentage of the chart that we cut out of the middle
		      percentageInnerCutout: 50, // This is 0 for Pie charts
		      //Number - Amount of animation steps
		      animationSteps       : 100,
		      //String - Animation easing effect
		      animationEasing      : 'easeOutBounce',
		      //Boolean - Whether we animate the rotation of the Doughnut
		      animateRotate        : true,
		      //Boolean - Whether we animate scaling the Doughnut from the centre
		      animateScale         : false,
		      //Boolean - whether to make the chart responsive to window resizing
		      responsive           : true,
		      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		      maintainAspectRatio  : true,
		      //String - A legend template
		      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
		    };
		    //Create pie or douhnut chart
		    // You can switch between pie and douhnut using the method below.
		    pieChart1.Doughnut(PieData1, pieOptions);
		    pieChart2.Doughnut(PieData2, pieOptions);
	    }
	    
	});
</script>