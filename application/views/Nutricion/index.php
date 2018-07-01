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
                  La nutrición es el proceso biológico en el que los organismos animales y vegetales absorben de los alimentos los nutrientes necesarios para la vida. La nutrición es importante porque es fundamental para el funcionamiento y el mantenimiento de las funciones vitales de los seres vivos, ayuda a mantener el equilibrio homeostático del organismo, tanto en procesos macrosistémicos, como la digestión o el metabolismo.

                </p>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <p class="text-justify">
                  Suministra al estudiante una alimentación diaria, equilibrada y acorde a sus requerimientos nutricionales. Asesoría Nutricional: Suministra al estudiante orientación nutricional y tratamiento dieto terapéutico de acuerdo al diagnóstico clínico.
                </p>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <p class="text-justify">
                  Contribuir al desarrollo pleno y sano de la población a la vez de mejorar su estado de nutrición mediante la generación, la divulgación y la aplicación del conocimiento de forma integrada, relacionadas con la nutrición clínica y la nutrición pública.
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