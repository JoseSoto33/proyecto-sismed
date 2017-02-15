<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">      	

    	<title>SISMED</title>

    	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style-admin.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.3.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
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
				<div class="row">
					
					<div class="col-xs-12 col-sm-4 hidden-xs">
						<label class="nav-titulo"><span class="glyphicon glyphicon-asterisk"></span> Administrador</label>
					</div>
					<div class="col-xs-12 col-sm-8">
						<nav class="navbar navbar-default navbar-right" id="nav-menu-principal">
						  	<div class="container-fluid">
							    <!-- Brand and toggle get grouped for better mobile display -->
							    <div class="navbar-header">
							    	<div class="col-xs-8">
							    		<label class="nav-titulo visible-xs-block">
							    			<span class="glyphicon glyphicon-asterisk"></span> Administrador
							    		</label>
							    	</div>
								    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#principal-menu" aria-expanded="false">
								        <span class="sr-only">Toggle navigation</span>
								        <span class="icon-bar"></span>
								        <span class="icon-bar"></span>
								    	<span class="icon-bar"></span>
								    </button>
							    </div>

							    <!-- Collect the nav links, forms, and other content for toggling -->
							    <div class="collapse navbar-collapse" id="principal-menu">
								    <ul class="nav navbar-nav">
								        <li>
								        	<a href="<?php echo base_url(); ?>Admin">Inicio</a>
								        </li>								        
								        <li class="dropdown" id="usuarios">
								          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
									        <ul class="dropdown-menu">									            
									            <li>
									            	<a href="<?php echo base_url(); ?>Usuario/AgregarUsuario">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Agregar usuario
									            	</a>
									            </li>
									            <li role="separator" class="divider"></li>									            
									            <li>
									            	<a href="#">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Listado de usuarios
									            	</a>
									            </li>				            
									        </ul>
								        </li>
								        <li>
								        	<a href="#">Sesiones</a>
								        </li>								        
								        <li class="dropdown" id="noticias">
								          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Noticias <span class="caret"></span></a>
									        <ul class="dropdown-menu">									            
									            <li>
									            	<a href="#">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Agregar noticia
									            	</a>
									            </li>
									            <li role="separator" class="divider"></li>									            
									            <li>
									            	<a href="#">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Listado de noticias
									            	</a>
									            </li>				            
									        </ul>
								        </li>
								        <li class="dropdown" id="eventos">
								          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos <span class="caret"></span></a>
									        <ul class="dropdown-menu">									            
									            <li>
									            	<a href="#">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Agregar evento
									            	</a>
									            </li>
									            <li role="separator" class="divider"></li>									            
									            <li>
									            	<a href="#">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Listado de eventos
									            	</a>
									            </li>				            
									        </ul>
								        </li>
								        <li class="dropdown" id="reportes">
								          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
									        <ul class="dropdown-menu">
									            <li>
									            	<a href="#">
									            		<span class="glyphicon glyphicon-arrow-right"></span> Sesiones Realizadas
									            	</a>
									            </li>									            				            
									        </ul>
								        </li>
								        <li class="dropdown" id="usuario">
								          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Dra. Maria <span class="caret"></span></a>
									        <ul class="dropdown-menu">
									            <li>
									            	<a href="#" class="footer-nav-link">
														<span class="glyphicon glyphicon-pencil"></span> Editar Perfil
													</a>
									            </li>
									            <li role="separator" class="divider"></li>
									            <li>
									            	<a href="#">
														<span class="glyphicon glyphicon-lock"></span> Seguridad
													</a>
									            </li>
									            <li role="separator" class="divider"></li>
									            <li>
									            	<a href="<?php echo base_url(); ?>">
									            		<span class="glyphicon glyphicon-off"></span> Salir
									            	</a>
									            </li>				            
									        </ul>
								        </li>
								    </ul>				     
							    </div><!-- /.navbar-collapse -->
						  	</div><!-- /.container-fluid -->
						</nav>
					</div>
				</div>
			</div>
			<!--<div class="col-xs-12 col-sm-2">
				<div class="row">
					<label class="col-xs-12 head-info">
						<span class="glyphicon glyphicon-user"></span> Dra. Maria
					</label>
				</div>
			</div>-->

		</div>
