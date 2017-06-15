$(document).ready(function(){

	var url = $("#base_url").val();

	
    var nav = navigator.userAgent.toLowerCase(); //La variable nav almacenará la información del navegador del usuario

    if(nav.indexOf("firefox") != -1){   //En caso de que el usuario este usando el navegador MozillaFirefox
        
        $("#fecha_inicio").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput

        $("#fecha_fin").mask("9999-99-99",{placeholder:"AAAA-MM-DD"}); //Se inicializa el campo fecha con el plugIn de maskedInput
    }   

    $("#telef_personal").mask("(9999) 999-99-99");
    $("#telef_emergencia").mask("(9999) 999-99-99");

    $("#departamento").chosen({
        no_results_text: "Sin resultados por:",
        allow_single_deselect: true
    });

    $("#tipo_paciente").chosen({
        no_results_text: "Sin resultados por:",
        allow_single_deselect: true
    });


    $("#grado_instruccion").chosen({
        no_results_text: "Sin resultados por:",
        allow_single_deselect: true
    });

    $('#registro-paciente').validator();  


    $('[data-toggle="tooltip"]').tooltip({
        delay: { 
            "show": 50,
            "hide": 1000 
        }
    });

    $("#search").on("click", function(e){

        e.preventDefault();
        var cedula = $("#cedula").val();

        $("#ced-load span").hide();
        $("#ced-load .loading-2").show();

        validarpaciente(cedula);
    });

    $("#reset").on("click", function(e){

        e.preventDefault();
        formReset();
    });

    $("#registro-paciente").on("submit", function(){

        $(this).attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });

    if ($("#cod_historia").length > 0) {
        crearHistoriaClinica();
    }

    /**
     * Validar paciente en la base de datos
     */
    function validarpaciente(cedula){

        if (cedula.length >= 6) {

            var request;
            if (request) {
                request.abort();
            }
           
            request = $.ajax({
                url: url+"Paciente/VerPaciente",
                type: "POST",
                dataType: "json",
                data: "cedula="+cedula
            });

            request.done(function (response, textStatus, jqXHR){            
                
                formActivate(response);

                $("#ced-load span").show();
                $("#ced-load .loading-2").hide();                
                
            });

            request.fail(function (jqXHR, textStatus, thrown){
                alert('Error: '+textStatus);
                //alert(thrown);
                $("#ced-load span").show();
                $("#ced-load .loading-2").hide();
            });
        }
    }

    /**
     * Activar formulario
     */
    function formActivate(response){

        if (response['result']) {

            $.each(response['paciente'], function(index, value){
                console.log(index+": "+value);

                if (value == "" || value == null || value == " " || value == undefined) {

                    if (index == 'sexo') {
                        $("input[type=radio]").prop("checked",false);
                    }else{
                        $("#"+index).prop("readonly",false);                       
                    }
                }else{

                    if (index == 'sexo') {

                        if (value === 'm') {
                            $("#sexo2").prop("checked",true);
                        }else{
                            $("#sexo1").prop("checked",true);
                        }

                        $("input[type=radio]").prop("readonly",true);

                    }else if (index == 'tipo_paciente' || index == 'departamento') {
                       
                        $("#"+index+" option").prop("readonly",true)
                        $("#"+index+" option").each(function(i, val){
                            
                            if ($(this).val() == value.substr(0,1).toUpperCase()+$(this).val().substr(1)) {
                                 
                                $(this).prop("selected",true);
                            }
                        });
                                            
                        setTimeout( function(){
                            $("#"+index).prop("readonly",true);
                        }, 60);
                        

                    }else if (index == 'direccion' || index == 'lugar_nacimiento' || index == 'antecedentes_personales' || index == 'antecedentes_familiares') {
                       
                        $("#"+index).html(value.trim()).prop("readonly",true);

                    }else if (index == 'cod_historia' && value != '') {
                        $("#verHistoria").attr("href",url+"HistoriaClinica/ConsultarHistoriaClinica/"+value.trim()).removeClass("disabled");
                    }else{
                        $("#"+index).val(value).prop("readonly",true); 
                    }                
                }
                $(".form-group select.form-control").trigger('chosen:updated');
            });

        }else{
            var cedula = $("#cedula").val();
            $("input.form-control").prop("readonly",false).val("");
            $("textarea.form-control").prop("readonly",false).html("");
            $("input[type=radio]").prop("readonly",false).prop("checked",false);
            
            $(".form-group select.form-control option").each(function(i, val){
                
                if ($(this).html() == null || $(this).html() == "" || $(this).html() == " ") {
                    $(this).prop("selected",true);
                }
                
            });
            $(".form-group select.form-control").trigger('chosen:updated');
            $(".form-group select.form-control").prop("checked",false);

            $("#cedula").val(cedula);

            $("#verHistoria").attr("href","#").addClass("disabled");
        }        
    }

    /**
     * Resetea el formulario
     */
    function formReset(){

        $("input.form-control").prop("readonly",true).val("");
        $("textarea.form-control").prop("readonly",true).html("");
        $("input[type=radio]").prop("readonly",true).prop("checked",false);
        //$("select.form-control").prop("disabled",false);
        //$("select.form-control option").removeAttr("selected");
        
        $(".form-group select.form-control option").each(function(i, val){
            
            if ($(this).html() == null || $(this).html() == "" || $(this).html() == " ") {
                $(this).prop("selected",true);
            }            
        });
        $(".form-group select.form-control").trigger('chosen:updated');
        $(".form-group select.form-control").prop("readonly",true);

        $("#cedula").prop("readonly",false).val("");
        $("#verHistoria").attr("href","#").addClass("disabled");
    }

    /**
     *
     */
    function crearHistoriaClinica(){

        var request;
        var html;

        if (request) {
            request.abort();
        }
       
        request = $.ajax({
            url: url+"HistoriaClinica/CrearHistoriaClinica",
            type: "POST",
            dataType: "json",
            data: $("#registro-paciente").serialize()
        });

        request.done(function (response, textStatus, jqXHR){            
            
            //alert(response['info']);
            if (response['status'] === true) {

                html = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>"+response['message'];
                $(".alert").removeClass('alert-danger').removeClass('alert-warning').addClass('alert-success').html(html);

                setTimeout( function(){                  
                     window.location.href = url+"HistoriaClinica/ListarHistorias";  
                }, 5000);
            }else{
                html = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>"+response['message'];
                $(".alert").removeClass('alert-success').removeClass('alert-warning').addClass('alert-danger').html(html);
            }
            
        });

        request.fail(function (jqXHR, textStatus, thrown){
            alert('Error: '+textStatus);
            
            html = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>"+response['message'];
            $(".alert").removeClass('alert-success').removeClass('alert-warning').addClass('alert-danger').html(html);
        });
    }
});