<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Menu comedor</title>
</head>
<body style="width: 900px;">

	<div style="width: 900px; float:left; position: relative;" id="orden_membrete">
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
					<img style="width: 900px; margin: 0 auto; height: auto;" src="<?php echo $base64 ?>">
					</div>
				</div>									
			</figure>
		</div>
	</div>
	<div>
	<table align="center" style=" width: 900px; border: 1px solid #000; border-collapse: collapse; position: absolute; margin-top: 130px;">
		<tr>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><?php echo utf8_decode("Menú Patrón")?></th>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;">Lunes</th>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;">Martes</th>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><?php echo utf8_decode("Miércoles")?></th>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;">Jueves</th>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;">Viernes</th>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><?php echo utf8_decode("Sábado")?></th>
 		</tr>

		<tr>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><center>Entrada Caliente</center></th>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
 		</tr>

 		<tr>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><center>Plato proteico o combinado</center></th>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
 		</tr>

 		<tr>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><center><?php echo utf8_decode("Contorno Farináceo")?></center></th>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
 		</tr>

 		<tr>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><center><?php echo utf8_decode("Ensalada,Vegetal cocido o plátano")?></center></th>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
 		</tr>

 		<tr>
		    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><center><?php echo utf8_decode("Bebida fría")?></center></th>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
		    <td style=" padding: 20px; border: 1px solid #000;"></td>
 		</tr>
	</table>
	</div>

</body>
</html>