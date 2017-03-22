<?php 
switch ($this->session->userdata('tipo_usuario')) {

case "Doctor":					
	include('doctor/header.php'); 
	break;

case "Enfermero":					
	include('enfermero/header.php'); 
	break;
}
?>

<div id="seccion2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Listado de historias</h1>
			</div>
			<div class="col-xs-12 col-sm-3 table-buttons">
				<a class="btn btn-success" href="<?php echo base_url(); ?>Paciente/AgregarPaciente"><span class="glyphicon glyphicon-plus"></span> Crear historia clínica</a>
			</div>
			<div class="col-xs-12 col-sm-9">
				<?php if(get_cookie("message") != null) { ?>
					<div id="alert-message" class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php 
							echo $this->input->cookie('message'); 
							delete_cookie('message');
						?>
					</div>					
				<?php } ?>
			</div>	
			<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
			<div class="col-sm-12 table-responsive">
				<table id="lista-historias" class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
					<thead>
						<th>Cod.Historia</th>
						<th>Paciente</th>
						<th>Fecha de creación</th>
						<th> </th>
					</thead>
					<tfoot>
						<th>Cod.Historia</th>
						<th>Paciente</th>
						<th>Fecha de creación</th>
						<th> </th>						
					</tfoot>
					<tbody>
						<?php 
							$cont = 1;
							if ($historias->num_rows() > 0) {
								
								setlocale(LC_TIME,"esp"); 

								foreach ($historias->result_array() as $key => $historia) {
									
									echo "<tr id=\"fila_".md5('sismed'.$historia["cod_historia"])."\">";
									echo "<td>".$historia["cod_historia"]."</td>";
									echo "<td>".$historia["nombre1"]." ".$historia["nombre2"]." ".$historia["apellido1"]." ".$historia["apellido2"]."</td>";
									
									echo "<td>".strftime('%d de %B de %Y', strtotime($historia["fecha_creada"]))."</td>";
									echo "<td>";
									echo "<div class=\"btn-group pull-right\" role=\"group\" aria-label=\"...\">";
									//---Boton ver detalles---
									echo "<a class=\"btn btn-sm btn-success detalle-historia\" href=\"".base_url("HistoriaClinica/ConsultarHistoriaClinica/".md5('sismed'.$historia["cod_historia"]))."\" title=\"Editar evento\">";
									echo "<span class=\"glyphicon glyphicon-search\"></span>";
									echo "</a>";

									//---Boton editar---
									/*
									echo "<a class=\"btn btn-sm btn-success editar-historia\" href=\"".base_url("Evento/ModificarEvento/".md5('sismed'.$historia["cod_historia"]))."\" title=\"Editar evento\">";
									echo "<span class=\"glyphicon glyphicon-pencil\"></span>";
									echo "</a>";*/

									echo "</div>";
									echo "</td>";
									echo "</tr>";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/funciones-listar-historias.js"></script>
<?php 
switch ($this->session->userdata('tipo_usuario')) {

	case "Doctor":					
		include('doctor/footer.php'); 
		break;

	case "Enfermero":					
		include('enfermero/footer.php'); 
		break;
}
?>