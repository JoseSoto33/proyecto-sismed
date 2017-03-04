<?php include("header.php"); 
	if (isset($message)) {
		var_dump($message);
	}
?>
<div id="seccion2">
	<div class="container">	
			<input type="hidden" name="url" id="base_url" value="<?php echo base_url(); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
					  	<h2>Perfil de usuario</h2>
					</div>
					<div class="row">

						<?php if (isset($usuario)) { ?>					
						
							<div id="info-usuario">							
								<div class="col-md-5 img-perfil">
									<figure >
										<?php	
											
											if (isset($usuario["img"]) && !empty($usuario["img"])) {

												$ruta = base_url()."assets/img/usuarios/";

								            	switch ($usuario["especialidad"]) {
								            		case 'Administrador':
								            			$ruta .= "admin/";
								            			break;  

								            		case 'Medicina':
								            			$ruta .= "med/";
								            			break; 

								            		case 'Odontología':
								            			$ruta .= "odon/";
								            			break; 

								            		case 'Laboratorio':
								            			$ruta .= "lab/";
								            			break; 

								            		case 'Nutrición':
								            			$ruta .= "nut/";
								            			break; 
								            	}
								            	$ruta .= $usuario["img"];

								            	echo   "<img src=\"$ruta\"/>";
											}else{

												if ($usuario["sexo"] === 'f') {
											
										echo   "<img src=\"".base_url()."assets/img/usuarios/user-female-alt-icon.png\"/>";
											
												}else{
										echo   "<img src=\"".base_url()."assets/img/usuarios/user-male-alt-icon.png\"/>";	
												}
											}
										?>
										
									</figure>
									<div class="col-md-12">
										<label class="user-name">
											<?php echo ucwords($usuario["nombre1"]." ".$usuario["apellido1"]);?>
										</label>					
									</div>
								</div>
								<div class="col-md-7">
									<?php 
										//var_dump($usuario);
										$nombre = $usuario["nombre1"];
										if (isset($usuario["nombre2"]) && !empty($usuario["nombre2"])) 
											{$nombre .= " ".$usuario["nombre2"];}
										$nombre .= " ".$usuario["apellido1"];
										if (isset($usuario["apellido2"]) && !empty($usuario["apellido2"])) 
											{$nombre .= " ".$usuario["apellido2"];}

										$hoy = date('Y-m-d');
										$diff = abs(strtotime($hoy) - strtotime($usuario["fecha_nacimiento"]));
										$edad = floor($diff / (365*60*60*24));
									?>
									<div id="tabla-info" >
										<h3>
											<span class="glyphicon glyphicon-list"></span> 
											Datos personales
											<a href="javascript:history.back(1)" class="btn btn-second-2 pull-right">Volver</a>	
										</h3>
										<hr class="title-line">
										<div class="col-md-12 table-responsive">
											<table class="table table-hover table-bordered">
												<tbody>
													<tr>
														<th class="success">Cédula:</th>
														<td><?php echo $usuario["cedula"];?></td>
													</tr>
													<tr>
														<th class="success">Nombre completo:</th>
														<td><?php echo ucwords($nombre);?></td>
													</tr>
													<tr>
														<th class="success">Fecha de nacimiento:</th>
														<td>
															<?php 
																setlocale(LC_TIME,"esp");
																echo strftime('%d de %B de %Y', strtotime($usuario["fecha_nacimiento"]));
															?>
														</td>
													</tr>
													<tr>
														<th class="success">Edad:</th>
														<td><?php echo $edad; ?> años</td>
													</tr>
													<tr>
														<th class="success">Sexo:</th>
														<td><?php echo ($usuario["sexo"] === 'f')? "Femenino" : "Masculino"; ?></td>
													</tr>
													<tr>
														<th class="success">Tipo de usuario:</th>
														<td><?php echo $usuario["tipo_usuario"]; ?></td>
													</tr>
													<tr>
														<th class="success">Dirección:</th>
														<td><?php echo $usuario["direccion"]; ?></td>
													</tr>

													<!--<tr>
														<th class="info">Fecha de registro:</th>
														<td>
															<?php 
																//setlocale(LC_TIME,"esp");
																echo strftime('%d de %B de %Y a las %H:%M:%S', strtotime($usuario->fecha_ingreso));
															?>
														</td>
													</tr>-->
													<tr>
														<th class="success">Status:</th>
														<td><?php echo ($usuario["status"]=='t')? "Activo" : "Inactivo"; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						
						<div id="sesiones-content" class="col-md-12">
							<h3><span class="glyphicon glyphicon-list-alt"></span> Actividad Reciente</h3>
							<hr class="title-line">
							<div class="col-md-12 table-responsive">
								<table class="table table-hover table-striped table-bordered" width="100%" cellspacing="0">
									<thead>
										<th>Nº</th>
										<th>ID de sesión</th>
										<th>Fecha de inicio</th>
										<th>Fecha de cierre</th>
										<th> </th>
									</thead>
									<tfoot>
										<th>Nº</th>
										<th>ID de sesión</th>
										<th>Fecha de inicio</th>
										<th>Fecha de cierre</th>
										<th> </th>						
									</tfoot>
									<tbody>
										<?php 
											$cont = 1;

											if ($sesiones->num_rows() > 0) {

												setlocale(LC_TIME,"esp");
												
												foreach ($sesiones->result_array() as $key => $sesion) {
													
													echo "<tr>";
													echo "<td>".$cont++."</td>";
													echo "<td>".$sesion["id"]."</td>";
													echo "<td>".date('d \d\e F \d\e Y \a \l\a\s h:i:s a', strtotime($sesion["inicio"]))."</td>";
													echo "<td>".date('d \d\e F \d\e Y \a \l\a\s h:i:s a', strtotime($sesion["fin"]))."</td>";
													echo "<td>";
													
													echo "<a class=\"btn btn-sm btn-info detalle-sesion\" href=\"#\" data-toggle=\"modal\" data-target=\"#DetalleSesion\" title=\"Ver detalles\" data-idsesion=\"".md5('sismed'.$sesion["id"])."\">";
													echo "<span class=\"glyphicon glyphicon-search\"></span>";
													echo "</a>";

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
			</div>	
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#sesiones-content .table").DataTable( {
        "language": {
            	"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
        	}
        });
	});
</script>
<?php include("footer.php"); ?>