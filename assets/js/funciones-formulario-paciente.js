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
/*
    $("#cedula").on("keyup", function(e){

        var cedula = $(this).val();

        validarpaciente(cedula);
    });*/

    $("#cedula").on("focusout", function(e){

        var cedula = $(this).val();

        validarpaciente(cedula);
    });

    $("#registro-paciente").on("submit", function(){

        $(this).attr("disabled","disabled");
        $('#seccion2').animate({scrollTop : 0}, 500);
    });

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

                if (response['result']) {                    
                    

                }else{
                    //alert(response['message']);
                }
                
            });

            request.fail(function (jqXHR, textStatus, thrown){
                alert('Error: '+textStatus);
                //alert(thrown);
            });
        }
    }

    /**
     * Activar formulario
     */
    function formActivate(response){

        if (response['result']) {

            //alert(response['result']);
            $.each(response['paciente'], function(index, value){
                console.log(index+": "+value);

                if (value == "" || value == null || value == " " || value == undefined) {

                    if (index == 'sexo') {
                        $("input[type=radio]").prop("checked",false);
                    }else{
                        $("#"+index).prop("readonly",false);
                        /*if (index == 'tipo_paciente' || index == 'departamento'){

                            $("#"+index).trigger('chosen:updated');
                        }*/
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
                        
                        //var selected = false;
                        $("#"+index+" option").prop("readonly",true)
                        $("#"+index+" option").each(function(i, val){
                            
                            if ($(this).val() == value.substr(0,1).toUpperCase()+$(this).val().substr(1)) {
                                //$(this).attr("selected","selected"); 
                                $(this).prop("selected",true);
                            }//else{
                                //$(this).attr("selected",null);
                            //}
                        });
                                            
                        //$("#"+index).trigger('chosen:updated');
                        setTimeout( function(){
                            $("#"+index).prop("readonly",true);
                        }, 60);
                        

                    }else if (index == 'direccion' || index == 'lugar_nacimiento' || index == 'antecedentes_personales' || index == 'antecedentes_familiares') {
                       
                        $("#"+index).html(value.trim()).prop("readonly",true);

                    }else{
                        $("#"+index).val(value).prop("readonly",true); 
                    }                
                }
                $(".form-group select.form-control").trigger('chosen:updated');
                $("#cedula").prop("readonly",false);
            });

        }else{
            var cedula = $("#cedula").val();
            $("input.form-control").prop("readonly",false).val("");
            $("textarea.form-control").prop("readonly",false).html("");
            $("input[type=radio]").prop("readonly",false).prop("checked",false);
            //$("select.form-control").prop("disabled",false);
            //$("select.form-control option").removeAttr("selected");
            
            $(".form-group select.form-control option").each(function(i, val){
                
                if ($(this).html() == null || $(this).html() == "" || $(this).html() == " ") {
                    $(this).prop("selected",true);
                }/*else{
                    $(this).attr("selected",null);
                }*/
                
            });
            $(".form-group select.form-control").trigger('chosen:updated');
            $(".form-group select.form-control").prop("checked",false);

            $("#cedula").val(cedula);
        }

        
    }
});