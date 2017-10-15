<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Perfil de usuario
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Usuarios</a></li>
    <li class="active">Perfil de usuario</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<div class="box box-primary">
		        <div class="box-body box-profile">
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

			            	echo   "<img class=\"profile-user-img img-responsive img-circle\" src=\"$ruta\"/>";
						}else{

							if ($usuario["sexo"] === 'f') {
						
					echo   "<img class=\"profile-user-img img-responsive img-circle\" src=\"".base_url()."assets/img/usuarios/user-female-alt-icon.png\"/>";
						
							}else{
					echo   "<img class=\"profile-user-img img-responsive img-circle\" src=\"".base_url()."assets/img/usuarios/user-male-alt-icon.png\"/>";	
							}
						}
					?>
					<h3 class="profile-username text-center"><?php echo ucwords($nombre);?></h3>
					<p class="text-muted text-center"><?php echo ucwords($usuario["especialidad"]);?></p>
					<hr>
					<strong>
		            	<i class="fa fa-calendar margin-r-5"></i>
		            	Fecha de nacimiento
		            </strong>
		            <p class="text-muted">
		            	<?php 
							setlocale(LC_TIME,"esp");
							echo strftime('%d de %B de %Y', strtotime($usuario["fecha_nacimiento"]));
						?>
	            		
	            	</p>
					<ul class="list-group list-group-unbordered">						
		                <li class="list-group-item">
		                  	<b>Edad:</b> <a class="pull-right"><?php echo $edad; ?> años</a>
		                </li>
		                <li class="list-group-item">
		                	<b>Sexo:</b> <a class="pull-right"><?php echo ($usuario["sexo"] === 'f')? "Femenino" : "Masculino"; ?></a>
		                </li>
		            </ul>
		            <strong>
		            	<i class="fa fa-map-marker margin-r-5"></i>
		            	Dirección
		            </strong>
		            <p class="text-muted"><?php echo $usuario["direccion"]; ?></p>
		            <hr>
		            <?php if ($this->session->userdata('idUsuario') == $usuario["id"]) { ?>
					<a href="<?php echo base_url('Usuario/ModificarUsuario'); ?>" class="btn btn-success btn-block">Editar</a>
					<a href="<?php echo base_url('Usuario/PasswordChange/') . $usuario['id']; ?>" class="btn btn-info btn-block">Seguridad</a>
					<?php } ?>
		            <?php if ($this->session->userdata('tipo_usuario') == "Administrador" && $this->session->userdata('idUsuario') != $usuario["id"]) { ?>
					<a href="<?php echo base_url('Usuario/ListarUsuarios'); ?>" class="btn btn-primary btn-block">
						Volver
					</a>
					<?php } ?>
		        </div>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-9">
			<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Actividad Reciente</h3>
				</div>
				<div class="box-body">
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
										echo "<td>".date('d \d\e F \d\e Y \a \l\a\s h:i:s a', strtotime($sesion["fecha_inicio"]))."</td>";
										echo "<td>".date('d \d\e F \d\e Y \a \l\a\s h:i:s a', strtotime($sesion["fecha_fin"]))."</td>";
										echo "<td>";
										
										echo "<a class=\"btn btn-xs btn-info detalle-sesion\" href=\"#\" data-toggle=\"modal\" data-target=\"#DetalleSesion\" title=\"Ver detalles\" data-idsesion=\"".md5('sismed'.$sesion["id"])."\">";
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
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".table").DataTable( {
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

        if ($("#alert-message").length) {

    	setTimeout( function(){                  
            $("#alert-message").hide('fast');  
        }, 10000);
	}
	});
</script>