<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Orden de exámen</title>
	    <style type="text/css">
        body {
        	width: 50%;
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
		<label class="col-xs-12">Nom: <span id=examen_nompaciente></span> </label>
		<label class="col-xs-12">C.I: <span id=examen_cipaciente></span> </label>
	</div>
	<div id="orden_body">
		<div class="center-block">
			<p></p>
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