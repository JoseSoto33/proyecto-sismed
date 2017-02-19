<?php include('header.php') ?>

<div id="seccion2">
	<!--<div class="container">	-->
		<!--<div class="row">-->
			<!--<div class="col-xs-12">-->
			<div class="alert alert-success">				
				<?= $this->uri->segment(1, 0);?>
			</div>
			<div class="alert alert-info">
				<?= $this->uri->segment(2, 0);?>
			</div>
			<div class="alert alert-warning">
				<?= $this->uri->segment(3, 0);?>				
			</div>

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
			<div class="col-sm-3">
				<div class="item-evento">
					<figure>
						<img src="<?php echo base_url(); ?>assets/img/Eventos.jpg">
					</figure>
					<div class="row">
						<div class="col-sm-12">
							<h3>Título</h3>
							<small><span class="glyphicon glyphicon-calendar"></span> 30 Ene 2016</small>
							<p>Ut enim ad minim veniam,	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
						</div>
						<div class="col-sm-12">
							<a class="btn btn-second-2" target="_blank" href="#">Ver más</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="item-evento">
					<figure>
						<img src="<?php echo base_url(); ?>assets/img/Eventos.jpg">
					</figure>
					<div class="row">
						<div class="col-sm-12">
							<h3>Título</h3>
							<small><span class="glyphicon glyphicon-calendar"></span> 30 Ene 2016</small>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						</div>
						<div class="col-sm-12">
							<a class="btn btn-second-2" target="_blank" href="#">Ver más</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="item-evento">
					<figure>
						<img src="<?php echo base_url(); ?>assets/img/Eventos.jpg">
					</figure>
					<div class="row">
						<div class="col-sm-12">
							<h3>Título</h3>
							<small><span class="glyphicon glyphicon-calendar"></span> 30 Ene 2016</small>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div class="col-sm-12">
							<a class="btn btn-second-2" target="_blank" href="#">Ver más</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="item-evento">
					<figure>
						<img src="<?php echo base_url(); ?>assets/img/Eventos.jpg">
					</figure>
					<div class="row">
						<div class="col-sm-12">
							<h3>Título</h3>
							<small><span class="glyphicon glyphicon-calendar"></span> 30 Ene 2016</small>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="col-sm-12">
							<a class="btn btn-second-2" target="_blank" href="#">Ver más</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>