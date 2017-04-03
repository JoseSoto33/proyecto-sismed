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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style-med.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.3.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/locale/es.js"></script>
	</head>
	<body>
		<div class="cintillo">					
			<div class="container">
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

		<div id="seccion1">	
			<div class="container">					
			<?php if(!$this->session->userdata("first_session")) { ?>	
				<label class="nav-titulo hidden-xs"><span class="glyphicon glyphicon-asterisk"></span> Unidad de Medicina</label>
				<nav class="navbar navbar-default navbar-right navbar-collapse" id="nav-menu-principal">
				  	<div class="container-fluid">
					    <div class="navbar-header">
					    	<div class="col-xs-8">
					    		<label class="nav-titulo visible-xs-block">
					    			<span class="glyphicon glyphicon-asterisk"></span> Unidad de Medicina
					    		</label>
					    	</div>
						    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#principal-menu" aria-expanded="false">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						    	<span class="icon-bar"></span>
						    </button>
					    </div>

					    <div class="collapse navbar-collapse" id="principal-menu">
						    <ul class="nav navbar-nav">
						        <li>
						        	<a href="<?php echo base_url(); ?>Home">Inicio</a>
						        </li>
						        <li id="historias">
						          	<a href="<?php echo base_url(); ?>HistoriaClinica/ListarHistorias">
						          		Historias clínicas
						          	</a>							        
						        </li>	
						        
						        <li class="menu-item dropdown" id="miscelaneos">
				                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Miscelaneos <span class="caret"></span></a>
				                    <ul class="dropdown-menu">

				                        <li class="menu-item dropdown dropdown-submenu"  id="vacunas">
				                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
				                            	<span class="glyphicon glyphicon-arrow-right"></span> Vacunas
				                            </a>
				                            <ul class="dropdown-menu">
			                                	
			                                	<li>
									            	<a href="<?php echo base_url(); ?>Vacuna/AgregarVacuna">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Agregar vacuna
									            	</a>
									            </li>
									            <li role="separator" class="divider"></li>									            
									            <li>
									            	<a href="<?php echo base_url(); ?>Vacuna/ListarVacunas">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Listado de vacunas
									            	</a>
									            </li>

				                            </ul>
				                        </li>

				                        <li role="separator" class="divider"></li>

				                        <li class="menu-item dropdown dropdown-submenu"  id="patologias">
				                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
				                            	<span class="glyphicon glyphicon-arrow-right"></span> Inventario
				                            </a>
				                            <ul class="dropdown-menu">
			                                	
			                                	<li>
									            	<a href="<?php echo base_url(); ?>Inventario/AgregarInsumo">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Agregar insumo
									            	</a>
									            </li>
									            <li role="separator" class="divider"></li>									            
									            <li>
									            	<a href="<?php echo base_url(); ?>Inventario/ListarInsumos">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Ver inventario
									            	</a>
									            </li>

				                            </ul>
				                        </li>

				                    </ul>
				                </li>
						       
						        <li class="dropdown" id="reportes">
						          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
							        <ul class="dropdown-menu">
							            <li>
							            	<a href="#">
							            		<span class="glyphicon glyphicon-arrow-right"></span> Pacientes atendidos
							            	</a>
							            </li>
							            <li role="separator" class="divider"></li>
							            <li>
							            	<a href="#">
							            		<span class="glyphicon glyphicon-arrow-right"></span> Morbilidad
							            	</a>
							            </li>
							            <li role="separator" class="divider"></li>
							            <li>
							            	<a href="#">
							            		<span class="glyphicon glyphicon-arrow-right"></span> Insumos
							            	</a>
							            </li>				            
							        </ul>
						        </li>
						        <li class="dropdown" id="usuario">
						          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('username'); ?> <span class="caret"></span></a>
							        <ul class="dropdown-menu">
							        	<li class="header-info">
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
							        		<img src="<?php echo $ruta; ?>" class="img-circle">
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
							        	<li class="footer-info">
							        		<div class="pull-left">
							        			<a href="#" class="btn btn-principal-2"><span class="glyphicon glyphicon-user"></span> Perfil</a>
							        		</div>
							        		<div class="pull-right">
							        			<a href="<?php echo base_url(); ?>Sesion/Logout" class="btn btn-principal-2"> <span class="glyphicon glyphicon-off"></span> Salir</a>
							        		</div>	
							        	</li>	            
							        </ul>
						        </li>
						    </ul>				     
					    </div><!-- /.navbar-collapse -->
				  	</div><!-- /.container-fluid -->
				</nav>
			<?php } ?>	
			</div>
			
		</div>