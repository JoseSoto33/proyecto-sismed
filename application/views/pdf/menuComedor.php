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
		<table align="center" style=" width: 900px; border: 1px solid #000; border-collapse: collapse; margin-top: 130px;">
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
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[1]["entrada"]))?utf8_decode($menu[1]["entrada"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[2]["entrada"]))?utf8_decode($menu[2]["entrada"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[3]["entrada"]))?utf8_decode($menu[3]["entrada"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[4]["entrada"]))?utf8_decode($menu[4]["entrada"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[5]["entrada"]))?utf8_decode($menu[5]["entrada"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[6]["entrada"]))?utf8_decode($menu[6]["entrada"]) : ""; ?>
			    </td>
	 		</tr>

	 		<tr>
			    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><center>Plato proteico o combinado</center></th>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[1]["proteico"]))?utf8_decode($menu[1]["proteico"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[2]["proteico"]))?utf8_decode($menu[2]["proteico"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[3]["proteico"]))?utf8_decode($menu[3]["proteico"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[4]["proteico"]))?utf8_decode($menu[4]["proteico"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[5]["proteico"]))?utf8_decode($menu[5]["proteico"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[6]["proteico"]))?utf8_decode($menu[6]["proteico"]) : ""; ?>
			    </td>
	 		</tr>

	 		<tr>
			    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><center><?php echo utf8_decode("Contorno Farináceo")?></center></th>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[1]["contorno"]))?utf8_decode($menu[1]["contorno"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[2]["contorno"]))?utf8_decode($menu[2]["contorno"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[3]["contorno"]))?utf8_decode($menu[3]["contorno"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[4]["contorno"]))?utf8_decode($menu[4]["contorno"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[5]["contorno"]))?utf8_decode($menu[5]["contorno"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[6]["contorno"]))?utf8_decode($menu[6]["contorno"]) : ""; ?>
			    </td>
	 		</tr>

	 		<tr>
			    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><center><?php echo utf8_decode("Ensalada,Vegetal cocido o plátano")?></center></th>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[1]["extras"]))?utf8_decode($menu[1]["extras"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[2]["extras"]))?utf8_decode($menu[2]["extras"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[3]["extras"]))?utf8_decode($menu[3]["extras"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[4]["extras"]))?utf8_decode($menu[4]["extras"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[5]["extras"]))?utf8_decode($menu[5]["extras"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[6]["extras"]))?utf8_decode($menu[6]["extras"]) : ""; ?>
			    </td>
	 		</tr>

	 		<tr>
			    <th style=" padding: 20px; border: 1px solid #000;background: #D1DCE3;"><center><?php echo utf8_decode("Bebida fría")?></center></th>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[1]["bebida"]))?utf8_decode($menu[1]["bebida"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[2]["bebida"]))?utf8_decode($menu[2]["bebida"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[3]["bebida"]))?utf8_decode($menu[3]["bebida"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[4]["bebida"]))?utf8_decode($menu[4]["bebida"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[5]["bebida"]))?utf8_decode($menu[5]["bebida"]) : ""; ?>
			    </td>
			    <td style=" padding: 20px; border: 1px solid #000;">
			    	<?php echo (!empty($menu[6]["bebida"]))?utf8_decode($menu[6]["bebida"]) : ""; ?>
			    </td>
	 		</tr>
		</table>
		<p  style=" width: 900px; text-align: right;  bottom: 0px;">Fecha: 
			<span style="padding: 20px 10px;"><?php echo date("d-m-Y",strtotime($semana["fecha_inicio"] )) . " / " . date("d-m-Y",strtotime($semana["fecha_fin"] )); ?></span>
		</p>	
		<p  style=" width: 900px; text-align: right;  bottom: 0px;">Turno de comida: 
			<span style="padding: 20px 10px;"><?php echo $turno; ?></span>
		</p>																		
	</div>
</body>
</html>