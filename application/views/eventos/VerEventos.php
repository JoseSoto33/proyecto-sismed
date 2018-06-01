<div class="box box-solid box-primary">
	<div class="box-header with-border">
	  	<h3 class="box-title"><span class="glyphicon glyphicon-calendar"></span> Eventos</h3>
	</div><!-- /.box-header -->
	<div class="box-body">
	  	<div id="calendar"></div>
	</div><!-- /.box-body -->
</div><!-- /.box -->

<!-- Ver Evento -->
<div class="modal fade" id="VerEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	  	<div class="modal-content">
		    <div class="modal-header">
		      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	<h4 class="modal-title" id="myModalLabel">Detalles del evento</h4>
		    </div>
	    <div class="modal-body">
	     	<div class="row">
		        <div class="col-xs-12">
		          	<figure class="img-portada">
	            		<img id="portada-evento" src="" class="img-responsive img-thumbnail">
			        </figure>
			        <div class="caption">
			            <h3 id="titulo-evento"></h3>
			            <p id="descripcion-evento"></p>               
		        	</div>
			        <div class="col-xs-12 col-sm-6">            
			          	<h5><strong>Comienza el:</strong></h5>
			          	<blockquote>
				            <small>
				              	<span class="glyphicon glyphicon-calendar"></span>
				              	<span id="fecha_inicio"></span>
				            </small>
				            <small>
				              	<span class="glyphicon glyphicon-time"></span>
				              	<span id="hora_inicio"></span>
				            </small>
			          	</blockquote>
			        </div>
			        <div class="col-xs-12 col-sm-6">            
			          	<h5><strong>Finaliza el:</strong></h5>
			          	<blockquote>
				        	<small>
				              	<span class="glyphicon glyphicon-calendar"></span> 
				              	<span id="fecha_fin"></span>
				            </small>
				            <small>
				              	<span class="glyphicon glyphicon-time"></span>
				              	<span id="hora_fin"></span>
				            </small>
			          	</blockquote>
			        </div>
		        </div>
	      	</div>
	    </div>
	    <div class="modal-footer">
	      	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	    </div>
	  </div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$.post("<?php echo base_url(); ?>Home/ExtraerEventos", function(data) {
        $("#calendar").fullCalendar({
			header:{
				left: "prev,next today",
				center: "title",
				right: "month,agendaWeek,agendaDay,listMonth"
			},
			defaultDate: new Date(),
			navLinks: true,
			editable: false,
			eventLimit: true,
			events: $.parseJSON(data),
			timeFormat: 'hh:mm t',
			displayEventTime: true,
			eventClick: function(event, jsEvent, view){					
  					       
	  			if (event.img != null && event.img != "") {
	          		$("#portada-evento").attr('src',"<?php echo base_url(); ?>assets/img/eventos/"+event.img);
	          	}else{
	          		$("#portada-evento").attr('src',"<?php echo base_url(); ?>assets/img/Eventos.jpg");
	          	}
  				$("#titulo-evento").html(event.title);
	          	$("#descripcion-evento").html(event.descripcion);
	          	$("#fecha_inicio").html(event.fecha_inicio);
	          	$("#hora_inicio").html(event.hora_inicio);
	          	$("#fecha_fin").html(event.fecha_fin);
	          	$("#hora_fin").html(event.hora_fin);
          		$("#VerEvento").modal();			        
			}
        });
      });
	});
</script>