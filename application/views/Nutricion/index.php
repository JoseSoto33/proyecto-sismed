<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Inicio
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Home"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <!--<li class="active">Here</li>-->
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-body">
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
            </div><!-- /.box-body -->
          </div><!-- /.box -->      
        </div>
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Bienvenido</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Misión</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Visión</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <p class="text-justify">
                  La Medicina debe aspirar a ser honorable y dirigir su propia vida profesional; ser moderada y prudente; ser asequible y económicamente sostenible; ser justa y equitativa; y a respetar las opciones y la dignidad de las personas. Los valores elementales de la Medicina contribuyen a preservar su integridad frente a las presiones políticas y sociales que defienden unos fines ajenos o anacrónicos.
                </p>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <p class="text-justify">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <p class="text-justify">
                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6">
      <!-- Ver Eventos -->
      <?php $this->load->view("eventos/VerEventos"); ?>
    </div>
    <div class="col-xs-12">
      <!-- Ver Noticias -->
      <?php $this->load->view("noticias/VerNoticias", array('noticias', $noticias)); ?>
    </div>
  </div>  
</section>
<!-- /.content -->

<script type="text/javascript">
	$(document).ready(function() {     

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