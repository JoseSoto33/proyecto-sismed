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
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Bienvenido</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Misión</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Visión</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>Bienvenido</b>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
        </div>
        <div class="col-xs-12">
          <div class="box box-default">
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
      </div>
    </div>
    <div class="col-xs-12 col-sm-6">
      <div class="box box-solid box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Eventos</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div id="calendar"></div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    <div class="col-xs-12">
      <div class="box box-solid box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Noticias</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div id="div-noticias">              
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
              <div class="owl-carousel owl-theme">
              <?php if ($noticias != false) { 
                foreach ($noticias as $key => $noticia) {
                  
                  echo "<div class=\"item\">";
                  echo "<div class=\"item-noticia\">";
                  echo "<figure>";      
                  if ($noticia['img'] == null) {
                    echo "<img src=\"".base_url()."assets/img/Noticias.png\">";
                  }else{
                    echo "<img src=\"".base_url()."assets/img/noticias/".$noticia['img']."\">";
                  }           
                  echo "</figure>";
                  echo "<div class=\"row\">";
                  echo "<div class=\"col-sm-12\">";
                  if (strlen($noticia["titulo"]) > 15) {
                    echo "<h3>".substr($noticia["titulo"], 0, 15)."..."."</h3>";
                  }else{
                    echo "<h3>".$noticia['titulo']."</h3>";
                  }         
                  if (strlen($noticia["descripcion"]) > 70) {
                    echo "<p>".substr($noticia["descripcion"], 0, 70)."..."."</p>";
                  }else{
                    echo "<p>".$noticia["descripcion"]."</p>";
                  }
                  echo "</div>";
                  echo "<a class=\"btn btn-primary\" href=\"#\" data-toggle=\"modal\" data-target=\"#VerNoticia\" title=\"Ver detalles\" data-idnoticia=\"".md5('sismed'.$noticia["id"])."\">Ver más</a>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                }
              } ?>
              </div>      
            </div>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>    

  
  <!--
  <div id="eventos" class="row">
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
      
    </div>-->
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

  <!-- Ver Noticia -->
  <div class="modal fade" id="VerNoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Detalles del noticia</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12">
              <figure class="img-portada">
                <img id="portada-noticia" src="" class="img-responsive img-thumbnail">
              </figure>
              <div class="caption">
                <h3 id="titulo-noticia"></h3>
                <p id="descripcion-noticia" class="text-justify"></p>               
            </div>
            </div>
          <div class="col-xs-12">
            <a href="" class="btn btn-primary hidden" id="link" target="_blank">Ir a la página</a>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
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

    $('.owl-carousel').owlCarousel({
        loop:true,
        stagePadding: 30,
        margin:30,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    $("#div-noticias").on("click", ".owl-carousel .owl-stage-outer .item-noticia .row a.btn-primary", function(e){

          var idnoticia = $(this).data("idnoticia");        
          var url = "<?php base_url(); ?>";

          var request;
          if (request) {
              request.abort();
          }

          $("#portada-noticia").attr('src',url+"assets/img/loading.gif");
          $("#titulo-noticia").html('');
          $("#descripcion-noticia").html('');
         
          request = $.ajax({
              url: url+"Noticia/VerNoticia",
              type: "POST",
              dataType: "json",
              data: "id="+idnoticia
          });

          request.done(function (response, textStatus, jqXHR){            
              
              if (response['result'] == true) {
                  
                  if (response['img'] != null) {

                      $("#portada-noticia").attr('src',url+"assets/img/noticias/"+response['img']);
                  }else{
                      $("#portada-noticia").attr('src',url+"assets/img/noticias/Noticias.png");
                  }

                  if (response['url'] != null) {
                      $("a#link").attr("href",response['url']).removeClass("hidden");
                  }else{
                      $("a#link").attr("src","").addClass("hidden");
                  }

                  $("#titulo-noticia").html(response['titulo']);
                  $("#descripcion-noticia").html(response['descripcion']);                
              }else{
                  alert(response['message']);
              }
              
          });

          request.fail(function (jqXHR, textStatus, thrown){
              alert('Error: '+textStatus);
              alert(thrown);
          });

          e.preventDefault();
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