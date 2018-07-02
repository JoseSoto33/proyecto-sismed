<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Orden de exámen</title>
</head>
<body style="width: 400px; border: 1px #333333 solid; padding: 10px;">

	<div style="width: 400px; float:left; position: relative;" id="orden_membrete">
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
						<img style="width: 380px; margin: 0 auto; height: auto;" src="<?php echo $base64 ?>">
					</div>
				</div>									
			</figure>
		</div>
	</div>
	<div id="orden_header" style=" padding-top: 50px; width: 400px; float:left; position: relative;">
		<p style="width: 400px; text-align: right;" >Nom: <span id=examen_nompaciente><?php echo utf8_decode($cita->nombre1 . " " . $cita->apellido1); ?></span> </p>
		<p style="width: 400px; text-align: right;">C.I: <span id=examen_cipaciente><?php echo $cita->cedula; ?></span> </p>
	</div>
	<div id="orden_body" style="width: 400px; ">
		<div class="center-block">
			<H2 style="padding: 30px 10px; text-align: center;"><?php echo $cita->orden_examen; ?></H2>
		</div>
	</div>
	<div id="orden_footer">
		<p style="width: 400px; text-align: right;">
			<span style=" "><?php echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido'); ?></span>
		</p>
		<p  style=" width: 400px; text-align: right;">
			<span style="border-top: 1px #333 solid; padding: 20px 10px;"><?php echo date('d-m-Y'); ?></span>
		</p>
	</div>
</body>
</html>