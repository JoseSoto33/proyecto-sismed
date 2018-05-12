<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">      	

    	<title>SISMED</title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/chosen.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fullcalendar.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fileinput.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style-nut.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bower_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bower_components/Ionicons/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.3.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/locale/es.js"></script>
	</head>
	<body class="hold-transition skin-yellow sidebar-mini">
		<div class="cintillo">					
			<div class="container-fluid">
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
		</div>

		<div class="wrapper">

			<!-- Main Header -->
			<header class="main-header">

			    <!-- Logo -->
			    <a href="<?php echo base_url(); ?>Home" class="logo">
			      	<!-- mini logo for sidebar mini 50x50 pixels -->
			      	<span class="logo-mini"><b>IUT</b></span>
			      	<!-- logo for regular state and mobile devices -->
			      	<span class="logo-lg"><b>IUT</b>Sismed</span>
			    </a>

			    <!-- Header Navbar -->
			    <nav class="navbar navbar-static-top" role="navigation">
			      	<!-- Sidebar toggle button-->
			      	<a class="sidebar-toggle" href="#" data-toggle="push-menu" role="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
			      	<!-- Navbar Right Menu -->
			      	<div class="navbar-custom-menu">
			        	<ul class="nav navbar-nav">			          		
			          		<!-- User Account Menu -->
			          		<li class="dropdown user user-menu">
			            		<!-- Menu Toggle Button -->
			            		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			              			<!-- The user image in the navbar-->
			              			<?php												
										if ($this->session->has_userdata('img') && $this->session->userdata('img') != null && $this->session->userdata('img') != '') {

											$ruta = base_url()."assets/img/usuarios/";

							            	switch ($usuario["especialidad"]) {
							            		case 'Administrador':
							            			$ruta .= "admin/";
							            			break;  

							            		case 'Medicina':
							            			$ruta .= "med/";
							            			break; 

							            		case 'Odontología':
							            			$ruta .= "odon/";
							            			break; 

							            		case 'Laboratorio':
							            			$ruta .= "lab/";
							            			break; 

							            		case 'Nutrición':
							            			$ruta .= "nut/";
							            			break; 
							            	}
							            	$ruta .= $usuario["img"];

										}elseif ($this->session->userdata('sexo') == 'm') {
																							
											$ruta = base_url()."assets/img/usuarios/user-male-alt-icon.png";	
										}elseif ($this->session->userdata('sexo') == 'f') {
																							
											$ruta = base_url()."assets/img/usuarios/user-female-alt-icon.png";	
										}
									?>
			              			<img src="<?php echo $ruta; ?>" class="user-image" alt="User Image">
			              			<!-- hidden-xs hides the username on small devices so only the image appears. -->
			              			<span class="hidden-xs">
			              				<?php 
					        				echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido');
					        			?>
			              			</span>
			            		</a>
			            		<?php if($this->session->has_userdata("login")) { ?>
			            		<ul class="dropdown-menu">
			              		<!-- The user image in the menu -->
			              			<li class="user-header">
				                		<img src="<?php echo $ruta; ?>" class="img-circle" alt="User Image">

						                <p>
						                <?php 
					        				echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido');
					        			?>
						                  <small>
						                  	<?php 
					        					setlocale(LC_TIME,"esp"); 
					        					echo "Miembro desde ".strftime('%B de %Y', strtotime($this->session->userdata('fecha_creado')));
					        				?>
						                  </small>
						                </p>
			              			</li>
			              			<!-- Menu Footer-->
			              			<li class="user-footer">
						                <div class="pull-left">
						                  <a href="<?php echo base_url('Usuario/PerfilUsuario/'); ?>" class="btn btn-default btn-flat">Perfil</a>
						                </div>
						                <div class="pull-right">
						                  <a href="<?php echo base_url(); ?>Sesion/Logout" class="btn btn-default btn-flat">Salir</a>
						                </div>
			              			</li>
			            		</ul>
			            		<?php } ?>
			          		</li>
			        	</ul>
			      	</div>
			    </nav>
			</header>
			<?php if($this->session->has_userdata("login")) { ?>
			<!-- Left side column. contains the logo and sidebar -->
  			<aside class="main-sidebar">

			    <!-- sidebar: style can be found in sidebar.less -->
			    <section class="sidebar">

			      	<!-- Sidebar user panel (optional) -->
			      	<div class="user-panel">
				        <div class="pull-left image">
				          	<img src="<?php echo $ruta; ?>" class="img-circle" alt="User Image">
				        </div>
				        <div class="pull-left info">
				          	<p>
			          		<?php 
		        				echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido');
		        			?>
				          	</p>
				          	<!-- Status -->
				          	<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				        </div>
			      	</div>

			      	<!-- Sidebar Menu -->
			      	<ul class="sidebar-menu" data-widget="tree">
				        <li class="header">MENU</li>
				        <!-- Optionally, you can add icons to the links -->
				        <li class="<?php if($this->uri->segment(1) == 'Home') echo 'active'; ?>">
				        	<a href="<?php echo base_url(); ?>Home">
				        		<i class="fa fa-home"></i> 
				        		<span>Inicio</span>
				        	</a>
				        </li>
				        <li class="treeview <?php if($this->uri->segment(1) == 'Paciente' || $this->uri->segment(1) == 'HistoriaClinica') echo 'active'; ?>">
				          	<a href="#">
				          		<i class="fa fa-file-text-o"></i>
				          		<span>Historias clínicas</span>
				          		<span class="pull-right-container">
				                	<i class="fa fa-angle-left pull-right"></i>
				              	</span>
				          	</a>
					        <ul class="treeview-menu">									            
					            <li>
					            	<a href="<?php echo base_url(); ?>Paciente/AgregarPaciente">
					            		<i class="fa fa-circle-o"></i>
					            		<span>Crear historia clínica</span>
					            	</a>
					            </li>								            
					            <li>
					            	<a href="<?php echo base_url(); ?>HistoriaClinica/ListarHistorias">
					            		<i class="fa fa-circle-o"></i>
					            		<span>Listado de Historias clínicas</span>
					            	</a>
					            </li>				            
					        </ul>
				        </li>
				        <li class="treeview <?php if($this->uri->segment(1) == 'Citas') echo 'active'; ?>">
				          	<a href="#">
				          		<i class="fa fa-clock-o"></i>
				          		<span>Citas </span>
				          		<span class="pull-right-container">
				                	<i class="fa fa-angle-left pull-right"></i>
				              	</span>
				          	</a>
					        <ul class="treeview-menu">									            
					            <li>
					            	<a href="<?php echo base_url(); ?>Citas/AgregarCitaNutricion">
					            		<i class="fa fa-circle-o"></i>
										<span>Agregar cita</span>
					            	</a>
					            </li>								            
					            <li>
					            	<a href="<?php echo base_url(); ?>Citas/ListarCitas">
					            		<i class="fa fa-circle-o"></i>					            		
										<span>Listado de citas</span>
					            	</a>
					            </li>				            
					        </ul>
				        </li>
				        <li class="treeview <?php if($this->uri->segment(1) == 'PlanesAlimenticios') echo 'active'; ?>">
				          	<a href="#">
				          		<i class="fa fa-book"></i>
				          		<span>Planes alimenticios </span>
				          		<span class="pull-right-container">
				                	<i class="fa fa-angle-left pull-right"></i>
				              	</span>
				          	</a>
					        <ul class="treeview-menu">									            
					            <li>
					            	<a href="<?php echo base_url(); ?>PlanesAlimenticios/AgregarPlanAlimenticio">
					            		<i class="fa fa-circle-o"></i>
					            		<span>Agregar dietas</span>
					            	</a>
					            </li>								            
					            <li>
					            	<a href="<?php echo base_url(); ?>PlanesAlimenticios/ListarPlanes">
					            		<i class="fa fa-circle-o"></i>
					            		<span>Listado de dietas</span>
					            	</a>
					            </li>				            
					        </ul>
				        </li>
				        <li class="treeview <?php if($this->uri->segment(1) == 'Menu') echo 'active'; ?>">
				          	<a href="#">
				          		<i class="fa fa-cutlery"></i>
				          		<span>Menú del comedor</span>
				          		<span class="pull-right-container">
				                	<i class="fa fa-angle-left pull-right"></i>
				              	</span>
				          	</a>
					        <ul class="treeview-menu">									            
					            <li>
					            	<a href="<?php echo base_url(); ?>Dietas/AgregarPatologia">
					            		<i class="fa fa-circle-o"></i>
					            		<span>Agregar dietas</span>
					            	</a>
					            </li>								            
					            <li>
					            	<a href="<?php echo base_url(); ?>Dietas/ListarPatologias">
					            		<i class="fa fa-circle-o"></i>
					            		<span>Listado de dietas</span>
					            	</a>
					            </li>				            
					        </ul>
				        </li>
				        
				        <li class="treeview <?php if($this->uri->segment(1) == 'Inventario') echo 'active'; ?>">
				          	<a href="#">
				          		<i class="fa fa-cubes"></i>
				          		<span>Stock </span>
				          		<span class="pull-right-container">
				                	<i class="fa fa-angle-left pull-right"></i>
				              	</span>
				          	</a>
					        <ul class="treeview-menu">									            
					            <li>
					            	<a href="<?php echo base_url(); ?>Inventario/AgregarInsumo">
					            		<i class="fa fa-circle-o"></i>
										<span>Agregar insumo</span>
					            	</a>
					            </li>								            
					            <li>
					            	<a href="<?php echo base_url(); ?>Inventario/ListarInsumos">
					            		<i class="fa fa-circle-o"></i>					            		
										<span>Ver Stock</span>
					            	</a>
					            </li>				            
					        </ul>
				        </li>	
				        <li class="treeview <?php if($this->uri->segment(1) == 'Reportes') echo 'active'; ?>">
				          	<a href="#">
				          		<i class="fa fa-bar-chart"></i> 
				          		<span>Reportes</span>
				            	<span class="pull-right-container">
				                	<i class="fa fa-angle-left pull-right"></i>
				              	</span>
				          	</a>
				          	<ul class="treeview-menu">
				            	<li>
				            		<a href="<?php echo base_url(); ?>Reportes/PacientesAtendidos">
				            			<i class="fa fa-circle-o"></i>
				            			<span>Pacientes atendidos</span>
				            		</a>
				            	</li>
				            	<li>
				            		<a href="#">
				            			<i class="fa fa-circle-o"></i>
				            			<span>Inventario</span>
				            		</a>
				            	</li>
				          	</ul>
				        </li>
			      	</ul>
			      	<!-- /.sidebar-menu -->
			    </section>
			    <!-- /.sidebar -->
  			</aside>
  			<?php } ?>
  			<!-- Content Wrapper. Contains page content -->
  			<div class="content-wrapper">
