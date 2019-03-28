<div class="row">
	<div class="col-xs-12 col-sm-6">			    	
    	<h5><strong>Datos del paciente:</strong></h5>
    	<blockquote>
    		<small>
    			<span class="glyphicon glyphicon-credit-card"></span> 
    			<span id="cedula"><?php echo $cedula; ?></span>
			</small>
			<small>
    			<span class="glyphicon glyphicon-user"></span> 
    			<span id="nombre"><?php echo $nombre1 . " " . $apellido1; ?></span>
			</small>
    		<small>
    			<span class="glyphicon glyphicon-envelope"></span>
    			<span id="email"><?php echo $email; ?></span>
    		</small>
    		<small>
    			<span class="glyphicon glyphicon-adjust"></span>
    			<span id="sexo"><?php echo ($sexo == 'f')? "Femenino" : "Masculino"; ?></span>
    		</small>
    	</blockquote>
    </div>
    <div class="col-xs-12 col-sm-6">			    	
    	<h5><strong>Fecha de entrega pautada:</strong></h5>
    	<blockquote>
    		<small>
    			<span class="glyphicon glyphicon-calendar"></span>
    			<span id="fecha_entrega_pautada"><?php echo $fecha_entrega_pautada; ?></span>
    		</small>
    		<small>
    			<span class="glyphicon glyphicon-info-sign"></span>
    			<span id="status"><?php echo ($entregado === 'f')? "Pendiente por entregar" : "Entregado"; ?></span>
    		</small>
    	</blockquote>
    </div>
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h4>
                    <span class="glyphicon glyphicon-list"></span> Exámenes solicitados                   
                </h4>
            </div>
            <div class="box-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php foreach ($tipo_examenes as $nombre_tabla => $tipo) { ?>
                    <!-- Descripción campo Título -->
                    <div class="panel panel-default panel-tipo-examen">
                        <div class="panel-heading" role="tab" id="<?php echo "heading_$nombre_tabla"; ?>">
                            <h4 class="panel-title">
                                <?php echo (is_array($tipo))? $tipo['titulo'] . "<br>" . "(" . implode(", ", $tipo['lista']) . ")" : $tipo; ?>
                                <div class="btn-group pull-right" role="group" aria-label="...">
                                <?php if (!empty($realizados[$nombre_tabla])) { ?>
                                    <a class="collapsed btn btn-xs btn-info detalle-examen" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo "collapse_$nombre_tabla"; ?>" aria-expanded="false" aria-controls="collapse1">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>

                                    <?php if ($entregado === 'f') { ?>

                                        <a class="btn btn-xs btn-success editar-examen" href="<?php echo base_url("Examenes/ModificarExamen/" . $nombre_tabla . "/" .md5('sismed'.$id)); ?>" title="Editar examen">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        </a>

                                        <a class="btn btn-xs btn-danger eliminar-examen" href="#" data-toggle="modal" data-target="#EliminarOrden" title="Eliminar examen" data-idorden="<?php echo md5('sismed'.$id); ?>" data-paciente="<?php echo $nombre1 . " " . $apellido1; ?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    <?php } ?>
                                <?php } else { ?>
                                    <a class="btn btn-xs btn-success agregar-examen" href="<?php echo base_url("Examenes/AgregarExamen/" . $nombre_tabla . "/" .md5('sismed'.$id)); ?>" title="Agregar examen">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                <?php } ?>
                                </div>
                            </h4>
                        </div>
                        <div id="<?php echo "collapse_$nombre_tabla"; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo "heading_$nombre_tabla"; ?>">
                            <div class="panel-body">
                            <?php 
                            switch ($nombre_tabla) {
                                case "examen_heces":
                                    $this->load->view("examenes/detallesExamenHeces", $realizados[$nombre_tabla]);
                                    break;

                                case "examen_hematologia":
                                    $this->load->view("examenes/detallesExamenHematologia", $realizados[$nombre_tabla]);
                                    break;

                                case "examen_miscelaneo":
                                    $this->load->view("examenes/detallesExamenMiscelaneo", $realizados[$nombre_tabla]);
                                    break;

                                case "examen_orina":
                                    $this->load->view("examenes/detallesExamenOrina", $realizados[$nombre_tabla]);
                                    break;
                            } ?>
                            </div>
                        </div>
                    </div><!--/ Descripción campo Título -->
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var tablaDetallesOrden = $("#table-detalles-orden").DataTable({
                paging: false,
                searching: false,
                ordering: false,
                info: false
            }),
            realizados = <?php echo json_encode($realizados) ?>;

        //console.log(realizados);
        $(".panel-tipo-examen").on("show.bs.collapse", function(e) {
            $(this).find(".detalle-examen")
                .removeClass('btn-info')
                .addClass('btn-warning')
                .children('.glyphicon')
                .removeClass('glyphicon-eye-open')
                .addClass('glyphicon-eye-close');
        });

        $(".panel-tipo-examen").on("hidden.bs.collapse", function(e) {
            $(this).find(".detalle-examen")
                .removeClass('btn-warning')
                .addClass('btn-info')
                .children('.glyphicon')
                .removeClass('glyphicon-eye-close')
                .addClass('glyphicon-eye-open');
        });
    });
</script>