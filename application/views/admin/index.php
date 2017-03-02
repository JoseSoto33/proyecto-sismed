<?php include('header.php') ?>

<div id="seccion2">
	<!--<div class="container">	-->
		<!--<div class="row">-->
			<!--<div class="col-xs-12">-->
			<!--
			<div class="alert alert-success">				
				<?= $this->uri->segment(1, 0);?>
			</div>
			<div class="alert alert-info">
				<?= $this->uri->segment(2, 0);?>
			</div>
			<div class="alert alert-warning">
				<?= $this->uri->segment(3, 0);?>				
			</div>-->

				<div id="img-carousel" class="carousel slide" data-ride="carousel">
	  				
	  				<!-- Indicators -->
					<ol class="carousel-indicators">
					    <li data-target="#img-carousel" data-slide-to="0" class="active"></li>
					    <li data-target="#img-carousel" data-slide-to="1"></li>
					    <li data-target="#img-carousel" data-slide-to="2"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
					    <div class="item active">
				        	<label class="item-text" id="text1"></label>				      	
					    </div>
					    <div class="item">
				        	<label class="item-text" id="text2"></label>				      	
					    </div>
					    <div class="item">
				        	<label class="item-text" id="text3"></label>				      	
					    </div>
					</div>
					
				</div>
			<!--</div>-->
		<!--</div>-->
	<!--</div>-->
</div>
<div id="seccion3">
	<div class="container">	
		<div class="row">
			
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<label class="titulo">¡Bienvenido!</label>
				<p class="parrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="col-sm-8" id="contenido">
				<div class="row">					
					<div class="col-xs-12">
						<label class="circle">
							<span class="glyphicon glyphicon-pushpin"></span>
						</label>
						<label class="info-titulo">Misión</label>
					</div>
					<div class="col-sm-12">
						<p class="info-parrafo">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<label class="circle">
							<span class="glyphicon glyphicon-pushpin"></span>
						</label>
						<label class="info-titulo">Visión</label>
					</div>
					<div class="col-sm-12">						
						<p class="info-parrafo">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>					
					</div>
				</div>
			</div>				
		</div>
	</div>
</div>
<div id="div-eventos">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="text-center">Eventos</h1>
			</div>
			<div class="col-xs-12 sub-title">
				<div class="col-sm-5">
					<hr class="divisor-line-2 pull-right">
				</div>
				<div class="col-sm-2 icon-content">
					<samp class="glyphicon glyphicon-calendar"></samp>
				</div>
				<div class="col-sm-5">
					<hr class="divisor-line-2 pull-left">
				</div>
			</div>
			<br>
			<div class="col-xs-12">				
				<div id="calendar"></div>
			</div>
			
		</div>
	</div>
</div>
<div id="div-noticias">
	<div class="container">
		
		<div class="row">
			<div class="col-sm-12">
				<h1 class="text-center">Noticias</h1>
			</div>
			<div class="col-xs-12 sub-title">
				<div class="col-sm-5">
					<hr class="divisor-line-2 pull-right">
				</div>
				<div class="col-sm-2 icon-content">
					<samp class="glyphicon glyphicon-list-alt"></samp>
				</div>
				<div class="col-sm-5">
					<hr class="divisor-line-2 pull-left">
				</div>
			</div>
			<br>
			<div class="col-sm-3">
				<div class="item-noticia">
					<figure>
						<img src="<?php echo base_url(); ?>assets/img/Noticias.png">
					</figure>
					<div class="row">
						<div class="col-sm-12">
							<h3>Título</h3>
							<p>Ut enim ad minim veniam,	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. </p>
						</div>
						<div class="col-sm-12">
							<a class="btn btn-principal-2" target="_blank" href="#">Ver más</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="item-noticia">
					<figure>
						<img src="<?php echo base_url(); ?>assets/img/Noticias.png">
					</figure>
					<div class="row">
						<div class="col-sm-12">
							<h3>Título</h3>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						</div>
						<div class="col-sm-12">
							<a class="btn btn-principal-2" target="_blank" href="#">Ver más</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="item-noticia">
					<figure>
						<img src="<?php echo base_url(); ?>assets/img/Noticias.png">
					</figure>
					<div class="row">
						<div class="col-sm-12">
							<h3>Título</h3>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div class="col-sm-12">
							<a class="btn btn-principal-2" target="_blank" href="#">Ver más</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="item-noticia">
					<figure>
						<img src="<?php echo base_url(); ?>assets/img/Noticias.png">
					</figure>
					<div class="row">
						<div class="col-sm-12">
							<h3>Título</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="col-sm-12">
							<a class="btn btn-principal-2" target="_blank" href="#">Ver más</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
        <button type="button" class="btn btn-principal" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {

		       
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
	            		$("#portada-evento").attr('src',event.img);
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
			        
			        /*
			        $("#portada-evento").attr('src',"<?php echo base_url(); ?>assets/img/loading.gif");
			        $("#titulo-evento").html('');
			    	$("#descripcion-evento").html('');
			    	$("#fecha_inicio").html('');
			    	$("#hora_inicio").html('');
			    	$("#fecha_fin").html('');
			    	$("#hora_fin").html('');*/  
				}
			});
        });

        function dump(obj) {

	        var out = "";
	        for (var i in obj) {
	            out += i + ": " + obj[i] + "\n";
	        }

	        alert(out);

	        // or, if you wanted to avoid alerts...

	        /*var pre = document.createElement("pre");
	        pre.innerHTML = out;
	        document.body.appendChild(pre)*/
	    }
       
		
	});
</script>
<?php include('footer.php') ?>