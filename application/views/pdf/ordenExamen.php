<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Orden de exámen</title>
	    <style type="text/css">
	        body {
	        	border: 1px solid #333333;
				background-color: #fff;
				margin: 40px;
				font-family: Lucida Grande, Verdana, Sans-serif;
				font-size: 14px;
				color: #333333;
	        }
	 
	        a {
				color: #003399;
				background-color: transparent;
				font-weight: normal;
	        }
	 
	        h1 {
				color: #444;
				background-color: transparent;
				border-bottom: 1px solid #D0D0D0;
				font-size: 16px;
				font-weight: bold;
				margin: 24px 0 2px 0;
				padding: 5px 0 6px 0;
	        }
	 
	        h2 {
				color: #444;
				background-color: transparent;
				border-bottom: 1px solid #D0D0D0;
				font-size: 16px;
				font-weight: bold;
				margin: 24px 0 2px 0;
				padding: 5px 0 6px 0;
				text-align: center;
	        }
	 
	        table{
	            text-align: center;
	        }
	 
	        /* estilos para el footer y el numero de pagina */
	        @page { margin: 180px 50px; }
	        #header { 
	            position: fixed; 
	            left: 0px; top: -180px; 
	            right: 0px; 
	            height: 150px; 
	            background-color: #333; 
	            color: #fff;
	            text-align: center; 
	        }
	        #footer { 
	            position: fixed; 
	            left: 0px; 
	            bottom: -180px; 
	            right: 0px; 
	            height: 150px; 
	            background-color: #333; 
	            color: #fff;
	        }
	        #footer .page:after { 
	            content: counter(page, upper-roman); 
	        }

	        #orden_membrete {
			    width: 100%;
			    float: left;
			    position: relative;
			}

			.container-fluid {
			    padding-right: 15px;
			    padding-left: 15px;
			    margin-right: auto;
			    margin-left: auto;
			}

	        .pull-left {
			    float: left !important;
			}

			.pull-right {
			    float: right !important;
			}

			#orden_membrete .container-fluid figure.pull-left img {
			    width: auto !important;
			    height: 16px !important;
			}

			.pull-right {
			    float: right !important;
			}

			.row {
			    margin-right: -15px;
			    margin-left: -15px;
			}

			.col-xs-6 {
			    width: 50%;
			}

			.col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
			    float: left;
			}

			.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
			    position: relative;
			    min-height: 1px;
			    padding-right: 15px;
			    padding-left: 15px;
			}

			#orden_membrete .container-fluid figure.pull-right img {
			    width: auto !important;
			    height: 16px !important;
			}

			#orden_membrete .container-fluid figure.pull-right img {
			    width: auto !important;
			    height: 16px !important;
			}

			#orden_header label, #orden_footer label {
			    text-align: right;
			    font-size: 10px;
			}

			.col-xs-12 {
			    width: 100%;
			}

			#orden_header, #orden_body, #orden_footer {
			    width: 100%;
			    float: left;
			    position: relative;
			    padding: 10px 0px;
			}

			#orden_body .center-block {
			    width: 250px;
			    font-size: 18px;
			}

			.center-block {
			    display: block;
			    margin-right: auto;
			    margin-left: auto;
			}

			#orden_header, #orden_body, #orden_footer {
			    width: 100%;
			    float: left;
			    position: relative;
			    padding: 10px 0px;
			}

			#orden_header label, #orden_footer label {
			    text-align: right;
			    font-size: 10px;
			}

			#sello {
			    width: 50px;
			    border: 1px solid #333333;
			    margin-bottom: 5px;
			    float: right;
			}

			hr {
			    margin-top: 20px;
			}
	    </style>
</head>
<body>
	<div id="orden_membrete">
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
	<div id="orden_header">
		<label class="col-xs-12">Nom: <span id=examen_nompaciente><?php echo $nombre . " " . $apellido; ?></span> </label>
		<label class="col-xs-12">C.I: <span id=examen_cipaciente><?php echo $cedula; ?></span> </label>
	</div>
	<div id="orden_body">
		<div class="center-block">
			<p><?php echo $examen; ?></p>
		</div>
	</div>
	<div id="orden_footer">
		<label class="col-xs-12"><?php echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido'); ?></label>
		<label class="col-xs-12">
			<hr id="sello">
		</label>
		<label class="col-xs-12"><?php echo date('d-m-Y'); ?></label>
	</div>
</body>
</html>