<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Orden de exámen</title>
</head>
<body style="width: 190px; padding: 10px;">

	<div style="width: 190px; float:left; position: relative;" id="orden_membrete">
		<div class="container-fluid">
			<figure class="pull-right">
				<div class="row">
					<div class="col-xs-6">
						<?php
							 $path =  base_url()."assets/img/cintilloPdf.png";
							 $type = pathinfo($path, PATHINFO_EXTENSION);
							 $data = file_get_contents($path);
							 $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
						?>
						<img style="width: 190px; margin: 0 auto; height: auto;" src="<?php echo $base64 ?>">
					</div>
				</div>									
			</figure>
		</div>
	</div>
	<div id="orden_header" style=" padding-top: 10px; width: 400px; float:left; position: relative;">
		<p style="width: 190px; text-align: right; font-size:7px;" >Nom: <span id=examen_nompaciente><?php echo utf8_decode($cita->nombre1 . " " . $cita->apellido1); ?></span> <br>C.I: <span id=examen_cipaciente><?php echo $cita->cedula; ?></span></p>
		
	</div>
	<div id="orden_body" style="width: 190px; ">
		<div class="center-block">
			<h2 style=" text-align:center; font-size:12px;">Orden de laboratorio</h2>
			<p style="padding: 10px 10px; text-align: justify; font-size:7;"><?php echo utf8_decode($cita->orden_examen); ?></p>
		</div>
	</div>
	<div id="orden_footer">
		<p style="width: 190px; text-align: right; font-size:7px;">
			<span style=" "><?php echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido'); ?></span>
		</p>
		<p  style=" width: 190px; text-align: right; ">
			<span style="border-top: 1px #333 solid; padding: 10px 10px; font-size:7;"><?php echo date('d-m-Y'); ?></span>
		</p>
	</div>
</body>
</html>