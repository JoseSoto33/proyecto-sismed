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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style-admin.css">
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
	<body class="hold-transition skin-blue sidebar-mini">
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
			    	<?php if($this->session->has_userdata("login")) { ?>
			      	<!-- Sidebar toggle button-->
			      	<a class="sidebar-toggle" href="#" data-toggle="push-menu" role="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<?php } ?>
					
			      	<!-- Navbar Right Menu -->
			      	<div class="navbar-custom-menu">
			        	<ul class="nav navbar-nav">			          		
			          		<!-- User Account Menu -->
			          		<li class="dropdown user user-menu">
			          			<?php if($this->session->has_userdata("login")) { ?>
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
				        <li class="treeview <?php if($this->uri->segment(1) == 'Usuario') echo 'active'; ?>">
				          	<a href="#">
				          		<i class="fa fa-users"></i> 
				          		<span>Usuarios</span>
				            	<span class="pull-right-container">
				                	<i class="fa fa-angle-left pull-right"></i>
				              	</span>
				          	</a>
				          	<ul class="treeview-menu">
				            	<li>				            		
				            		<a href="<?php echo base_url(); ?>Usuario/AgregarUsuario">
				            			<i class="fa fa-circle-o"></i>
				            			Agregar Usuario
				            		</a>
				            	</li>
				            	<li>
				            		<a href="<?php echo base_url(); ?>Usuario/ListarUsuarios">
						            		<i class="fa fa-circle-o"></i>
						            	Listado de usuarios
						            </a>
				            	</li>
				          	</ul>
				        </li>
				        <li class="<?php if($this->uri->segment(1) == 'Sesion') echo 'active'; ?>">
				        	<a href="<?php echo base_url(); ?>Sesion/ListarSesiones">
					        	<i class="fa fa-laptop"></i> 
					        	<span>Sesiones</span>
					        </a>
					    </li>
				        <li class="treeview <?php if($this->uri->segment(1) == 'Noticia') echo 'active'; ?>">
				          	<a href="#">
				          		<i class="fa fa-files-o"></i> 
				          		<span>Noticias</span>
				            	<span class="pull-right-container">
				                	<i class="fa fa-angle-left pull-right"></i>
				              	</span>
				          	</a>
				          	<ul class="treeview-menu">
				            	<li>
				            		<a href="<?php echo base_url(); ?>Noticia/AgregarNoticia">
				            			<i class="fa fa-circle-o"></i>
				            			Agrear Noticia
				            		</a>
				            	</li>
				            	<li>				            		
				            		<a href="<?php echo base_url(); ?>Noticia/ListarNoticias">
				            			<i class="fa fa-circle-o"></i>
					            		Listado de Noticias
					            	</a>
				            	</li>
				          	</ul>
				        </li>
				        <li class="treeview <?php if($this->uri->segment(1) == 'Evento') echo 'active'; ?>">
				          	<a href="#">
				          		<i class="fa fa-calendar"></i> 
				          		<span>Eventos</span>
				            	<span class="pull-right-container">
				                	<i class="fa fa-angle-left pull-right"></i>
				              	</span>
				          	</a>
				          	<ul class="treeview-menu">
				            	<li>
				            		<a href="<?php echo base_url(); ?>Evento/AgregarEvento">
				            			<i class="fa fa-circle-o"></i>
				            			Agrear Evento
				            		</a>
				            	</li>
				            	<li>
				            		<a href="<?php echo base_url(); ?>Evento/ListarEventos">
				            			<i class="fa fa-circle-o"></i>
				            			Listado de Eventos
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
				            		<a href="#">
				            			<i class="fa fa-circle-o"></i>
				            			Resiones Realizadas
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
		
		
