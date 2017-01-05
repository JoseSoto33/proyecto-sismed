<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.3.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="contenedor">
			<header>
				<nav id="navbar-login" class="navbar navbar-default navbar-fixed-top">
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
					<div class="container">
						<a class="navbar-brand" href="#">Unidad de Servicio Médico Integral</a>
						<form id="form-login" class="navbar-form navbar-right" method="post" action="<?php echo base_url(); ?>login/userLogin" >
							<div class="form-group">
								<img src="<?php echo base_url();?>assets/img/loading_spinner.gif" class="loading form-loading">
							</div>
					        <div class="form-group">
					          	<input type="text" class="form-control" name="cedula" placeholder="Cédula" requered>
					        </div>
					        <div class="form-group">
					          	<input type="password" class="form-control" name="password" placeholder="Password" requered>
					        </div>
					        <button type="submit" class="btn btn-default">Iniciar sessión</button>
					      </form>
					</div>
				</nav>
			</header>