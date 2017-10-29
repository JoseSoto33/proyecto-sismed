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
					<div class="col-xs-12 col-sm-3">
						<h3>Período</h3>
					</div>
					<div class="col-xs-12 col-sm-9">
						<?php if(get_cookie("message") != null) { ?>
							<div id="alert-message" class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?php 
									echo $this->input->cookie('message'); 
									delete_cookie('message');
								?>
							</div>					
						<?php } ?>
					</div>	
				</div>				
			</div>
			<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12">
						<?php
							$url =  base_url()."Reportes/".$this->uri->segment(2, 0);
							if ($this->uri->segment(3, 0) != "0") {
								$url .= "/".$this->uri->segment(3, 0);
							}

							echo form_open(
			      				$url,
			      				'id="periodo-reporte"'
			      				); 
			      		?>

			      		<?php echo form_close();?>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<!--<a href="<?php echo base_url(); ?>Inventario/ListarInsumos" class="btn btn-default">Cancelar</a>-->
	        	<button id="guardar" type="submit" form="registro-insumo" class="btn btn-success pull-right">Consultar</button>
	        </div>
		</div>
	</div>
	<div id="resultados" class="col-xs-12">
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
							<div class="col-xs-12 col-sm-6">
							<h4>Población general</h4>								
								<canvas id="pieChart1"></canvas>
							</div>
							<div class="col-xs-12 col-sm-6">
							<h4>Población estudiantil</h4>								
								<canvas id="pieChart2"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ChartJS -->
<script src="<?php echo base_url(); ?>bower_components/Chart.js/Chart.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//-------------
	    //- PIE CHART -
	    //-------------
	    // Get context with jQuery - using jQuery's .get() method.
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
	});
</script>