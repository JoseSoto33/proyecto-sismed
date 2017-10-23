<?php foreach ($esquemas_vacunacion as $key => $item) { ?>
	<li>
		<b><?php echo $item['nombre_vacuna']; ?></b>
		<ul>
			<?php if (isset($item['esquemas']['unica'])) {
			 ?>
			<li>
				<?php if(isset($item['esquemas']['unica']['aplicable'])) { 
					$reforzar = false;
					?>
				<span class="label label-info">Aplicable</span>
				<input type="radio" name="esquema_aplica" class="esquema_aplica" value="<?php echo $item['esquemas']['unica']['id']; ?>">
				<?php } 
				if(isset($item['esquemas']['unica']['aplicada'])) { 
					$reforzar = true;
					?>
				<span class="label label-success">Aplicada</span>
				<?php } ?>
				<?php echo $item['esquemas']['unica']['nombre_esquema']; ?>
				<ul>
					<li><b>Administración: </b><?php echo $item['esquemas']['unica']['via_administracion']; ?></li>
				</ul>
			</li>
			<?php } ?>

			<?php if (isset($item['esquemas']['dosis'])) {?>
			<li>
				<?php if(isset($item['esquemas']['dosis']['aplicable'])) { 
					$reforzar = false;
					?>
				<span class="label label-info">Aplicable</span>
				<input type="radio" name="esquema_aplica" class="esquema_aplica" value="<?php echo $item['esquemas']['dosis']['id']; ?>">
				<?php }  
				if(isset($item['esquemas']['dosis']['aplicada'])) {
					$reforzar = true; 
					?>
				<span class="label label-success">Aplicada</span>
				<?php } ?>
				<?php echo $item['esquemas']['dosis']['nombre_esquema']; ?>
				<ul>
					<li><b>Dosis faltantes:</b> <?php echo $item['esquemas']['dosis']['restante']; ?></li>
					<li><b>Intervalo:</b> Cada <?php echo $item['esquemas']['dosis']['intervalo']." ".$item['esquemas']['dosis']['intervalo_periodo']; ?> </li>
					<li><b>Administración: </b><?php echo $item['esquemas']['dosis']['via_administracion']; ?></li>
				</ul>
			</li>
			<?php } ?>

			<?php if (isset($item['esquemas']['refuerzo'])) { ?>
			<li>
				<?php if(isset($item['esquemas']['refuerzo']['aplicable']) && $reforzar) { ?>
				<span class="label label-info">Aplicable</span>
				<input type="radio" name="esquema_aplica" class="esquema_aplica" value="<?php echo $item['esquemas']['refuerzo']['id']; ?>">
				<?php }  
				if(isset($item['esquemas']['refuerzo']['aplicada'])) { ?>
				<span class="label label-success">Aplicada</span>
				<?php } ?>
				<?php echo $item['esquemas']['refuerzo']['nombre_esquema']; ?>
				<ul>
					<li><b>Dosis faltantes:</b> <?php echo $item['esquemas']['refuerzo']['restante']; ?></li>
					<li><b>Intervalo:</b> Cada <?php echo $item['esquemas']['refuerzo']['intervalo']." ".$item['esquemas']['refuerzo']['intervalo_periodo']; ?> </li>
					<li><b>Administración: </b><?php echo $item['esquemas']['refuerzo']['via_administracion']; ?></li>
				</ul>
			</li>
			<?php } ?>	      					
		</ul>
	</li>      		
<?php } ?>