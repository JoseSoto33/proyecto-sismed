<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><span class="glyphicon glyphicon-list-alt"></span> Noticias</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <?php if ($noticias != false) { ?>
    <div id="div-noticias">              
      <div class="row">
        <div class="owl-carousel owl-theme">
        <?php foreach ($noticias as $key => $noticia) {
            
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
          } ?>
        </div>      
      </div>
    </div>
    <?php } else { ?>
      <h2 class="text-center">No se encontraron noticias para este mes...</h2>
    <?php } ?>
  </div><!-- /.box-body -->
</div><!-- /.box -->

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

<script type="text/javascript">
  $(document).ready(function(){
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
  });
</script>