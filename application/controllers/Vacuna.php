<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacuna extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/login
	 *	- or -
	 * 		http://example.com/index.php/login/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */	

	public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('login') && ($this->uri->segment(1, 0) != '0' || $this->uri->segment(2, 0) != '0')) {
        	redirect(base_url());
        }/*
        if ($this->session->has_userdata('tipo_paciente') && ($this->session->userdata('tipo_paciente') != "Doctor" || $this->session->userdata('tipo_paciente') != "Enfermero")) {
        	redirect(base_url('Home')); 
        }*/
    }

    /**
     * @method void AgregarVacuna()
     * @method void ModificarNombreVacuna()
     * @method void AgregarPatologiaVacuna()
     * @method void EliminarPatologiaVacuna()
     * @method void VerVacuna()
     * @method void ListarVacunas()
     * @method void EliminarVacuna()
     * @method void|boolean ValidarVacuna(mixed[] $data)
     */

    /**
     * Muestra la interfaz del formulario para agregar una vacuna, 
     * o realiza el registro de la vacuna en la base de datos si 
     * se hace una petición POST
     */
    public function AgregarVacuna()
    {   
        $data = array("titulo" => "Agregar nueva vacuna");        

        $condicion = array(
            "where" => array("status" => TRUE),
            "order_by" => array("campo" => "id", "direccion" => "ASC")
            );

        $result = $this->PatologiaModel->ExtraerPatologia($condicion);
    
        $data["patologias"] = $result->result_array();
        $data["cant_patologias"] = $result->num_rows();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if ($this->ValidarVacuna($data) === false) {
                # code...
                //Si la vacuna se agrega exitosamente a la base de datos...
                if ($id_vacuna = $this->VacunaModel->AgregarVacuna()) {
                    
                    $RelacionVacunaPatologia = array(
                        "id_vacuna" => $id_vacuna,
                        "id_patologia" => $_POST["enfermedad"]
                        );

                    if ($this->VacunaModel->AgregarRelacionVacunaPatologia($RelacionVacunaPatologia) && $this->EsquemaModel->AgregarEsquema($id_vacuna)) {
                       
                        set_cookie("message","La Vacuna <strong>'".$_POST["nombre_vacuna"]."'</strong> fue registrada exitosamente!...", time()+15);
                        header("Location: ".base_url()."Vacuna/ListarVacunas"); //controlador y metododo del controlador que carga la vista                       

                    }else{
                        $data['mensaje'] = $this->db->error();
                        switch ($this->session->userdata('tipo_usuario')) {
                            case "Doctor":                  
                                $this->load->view('medicina/doctor/header'); 
                                $this->load->view('medicina/FormularioRegistroVacuna', $data);
                                $this->load->view('medicina/doctor/footer'); 
                                break;

                            case "Enfermero":                   
                                $this->load->view('medicina/enfermero/header'); 
                                $this->load->view('medicina/FormularioRegistroVacuna', $data);
                                $this->load->view('medicina/enfermero/footer'); 
                                break;
                        }                        
                    }

                //Si hay error en la inserción
                }else{

                    $data['mensaje'] = $this->db->error();
                    switch ($this->session->userdata('tipo_usuario')) {
                        case "Doctor":                  
                            $this->load->view('medicina/doctor/header'); 
                            $this->load->view('medicina/FormularioRegistroVacuna', $data);
                            $this->load->view('medicina/doctor/footer'); 
                            break;

                        case "Enfermero":                   
                            $this->load->view('medicina/enfermero/header'); 
                            $this->load->view('medicina/FormularioRegistroVacuna', $data);
                            $this->load->view('medicina/enfermero/footer'); 
                            break;
                    }
                    
                }

            }

        }else{

            switch ($this->session->userdata('tipo_usuario')) {
                case "Doctor":                  
                    $this->load->view('medicina/doctor/header'); 
                    $this->load->view('medicina/FormularioRegistroVacuna', $data);
                    $this->load->view('medicina/doctor/footer'); 
                    break;

                case "Enfermero":                   
                    $this->load->view('medicina/enfermero/header'); 
                    $this->load->view('medicina/FormularioRegistroVacuna', $data);
                    $this->load->view('medicina/enfermero/footer'); 
                    break;
            }            
        }
    }

    /**
     * Recibe un post desde Ajax y modifica el nombre de una vacuna específica
     *
     * @return void
     */
    public function ModificarNombreVacuna()
    {
        $nuevo_nombre = $this->input->post("nuevo_nombre");
        $condicion = array(
            "where" => array(
                "MD5(concat('sismed',id))" => $this->input->post("id")
                )
            );

        $vacuna = $this->VacunaModel->ExtraerVacuna($condicion)->row_array();

        if (strcmp($vacuna["nombre_vacuna"], $nuevo_nombre)!=0) {
            
            $condicion = array(
            "where" => array(
                "MD5(concat('sismed',id)) !=" => $this->input->post("id"),
                "nombre_vacuna" => $nuevo_nombre
                )
            );

            if (!$this->VacunaModel->ValidarVacuna($condicion)) {                

                $condicion = array(
                        "data" => array(
                            "nombre_vacuna"=> $nuevo_nombre
                            ),
                        "where" => array(
                            "MD5(concat('sismed',id))" => $this->input->post("id")
                            )
                    );

                if ($this->VacunaModel->ModificarVacuna($condicion)) {
                    
                    echo json_encode(array("status"=> true, "message" => "Modificación exitosa..."));
                }else{
                    echo json_encode(array("status"=> false, "message" => "Ha ocurrido un error..."));
                }
            }else{

                echo json_encode(array("status"=> false, "message" => "El nombre que ingresó le pertenece a otra vacuna, verifique e intente nuevamente..."));
            }

        }else{
            echo json_encode(array("status"=> false, "message" => "Ha ingresado el nombre actual, debe ingresar un nombre diferente..."));
        }
    }

    /**
     * Añade un registro en la tabla vacuna_patologia para asociar una patologia con una vacuna específica
     *
     * @return void
     */
    public function AgregarPatologiaVacuna()
    {
        $id_patologia = $this->input->post("id_patologia");
        $id_vacuna = $this->input->post("id_vacuna");

        $condicion = array(
                "where" => array("id_patologia" => $id_patologia)
                ); 

        if (!$this->VacunaModel->ValidarVacunaPatologia($id_vacuna, $condicion)) {
            
            $condicion = array(
                "where" => array("MD5(concat('sismed',id))" => $id_vacuna)
                ); 

            $vacuna = $this->VacunaModel->ExtraerVacuna($condicion)->row_array();

            $insert = array(
                "id_vacuna" => $vacuna["id"],
                "id_patologia" => $id_patologia
                );

            if ($this->VacunaModel->AgregarRelacionVacunaPatologia($insert)) {

                $condicion = array(
                "order_by" => array("campo" => "id", "direccion" => "ASC")
                );

                $patologias = $this->VacunaModel->ExtraerVacunaPatologia($id_vacuna,$condicion)->result_array();

                echo json_encode(array("status"=>true, "message" => "Asociación de vacuna y patología exitosa...", "patologias" => $patologias));
            }else{
                echo json_encode(array("status"=>false, "message" => "Error al asociar la patología..."));
            }
        }else{
            echo json_encode(array("status"=>false, "message" => "La patología seleccionada ya se encuentra asociada a ésta vacuna..."));
        }
    }

    /**
     * Elimina una relación entre una vacuna y una patología específicas
     *
     * @return void
     */
    public function EliminarPatologiaVacuna()
    {
        $id_patologia = $this->input->post("id_patologia");
        $id_vacuna = $this->input->post("id_vacuna");

        $condicion = array(
            "where" => array(
                "MD5(concat('sismed',id_vacuna))" => $id_vacuna,
                "id_patologia" => $id_patologia
                )
            ); 

        if ($this->VacunaModel->EliminarPatologiaVacuna($condicion)) {

            $patologias = $this->VacunaModel->ExtraerVacunaPatologia($id_vacuna)->result_array();

            echo json_encode(array("status"=>true, "message" => "Eliminación exitosa...", "patologias" => $patologias));
        }else{
            echo json_encode(array("status"=>false, "message" => "Error al asociar la patología..."));
        }
    }

    /**
     * Extrae información sobre una vacuna en específico de la base de datos
     *
     * @return void
     */
    public function VerVacuna()
    {
        $id_vacuna = $this->input->post("id");

        $condicion = array(
            "order_by" => array("campo" => "id", "direccion" => "ASC")
            );

        $patologias = $this->VacunaModel->ExtraerVacunaPatologia($id_vacuna,$condicion)->result_array();

        $condicion["where"] = array("MD5(concat('sismed',id_vacuna))" => $id_vacuna);

        $esquemas = $this->EsquemaModel->ExtraerEsquema($condicion)->result_array();

        $data = array(
            "patologias" => $patologias,
            "esquemas" => $esquemas
            );

        echo json_encode($data);
    }

    /**
     * Extrae de la base de datos el listado de las vacunas registradas en la base de datos
     *
     * @return void
     */
    public function ListarVacunas()
    {
        $condicion = array(
            "order_by" => array("campo" => "id", "direccion" => "ASC")
            );

        $data = array();

        $result = $this->VacunaModel->ExtraerVacuna($condicion);
        
        $data["num_rows"] = $result->num_rows();
        $vacunas = $result->result_array();

        $condicion["select"] = "patologia.nombre";

        foreach ($vacunas as $key => $vacuna) {
            
            $patologias = $this->VacunaModel->ExtraerVacunaPatologia(md5("sismed".$vacuna["id"]),$condicion);
            $vacuna["patologias"] = $patologias->result_array();
            $items[] = $vacuna;
        }
        $data["patologias"] = $patologias;
        $data["vacunas"] = $items;
        //$data["items"] = $items;

        switch ($this->session->userdata('tipo_usuario')) {
            case "Doctor":                  
                $this->load->view('medicina/doctor/header'); 
                $this->load->view('medicina/ListarVacunas', $data);
                $this->load->view('medicina/doctor/footer'); 
                break;

            case "Enfermero":                   
                $this->load->view('medicina/enfermero/header'); 
                $this->load->view('medicina/ListarVacunas', $data);
                $this->load->view('medicina/enfermero/footer'); 
                break;
        }
    	
    }

    /**
     * Cambia el estado de una vacuna determinada de 'activa'a 'inactiva' y viceversa
     *
     * @return void
     */
    public function EliminarVacuna()
    {
        $id = $this->input->post('id');
        $action = $this->input->post('action');
        $condicion = array(
            'where' => array("MD5(concat('sismed',id))" => $id)
            );

        //Si la acción a realizar es 'habilitar'...
        if ($action == "habilitar") {
            $condicion['data'] = array('status' => true);

        //Si la acción a realizar es 'inhabilitar'...
        }else if ($action == "inhabilitar"){
            $condicion['data'] = array('status' => false);
        }

        //Si la modificación se realiza con éxito...
        if ($this->VacunaModel->ModificarVacuna($condicion)) {
            
            $data['result']  = true;
            $data['message'] = "Operación exitosa!... El listado se recargará en breve...";

        //Si ocurre un error durante la modificación...
        }else{
            $data['result']  = false;
            $data['message'] = "Error: Ha ocurrido un problema durante la eliminación.\n".$this->db->error();
        }
        
        echo json_encode($data);
    }
    
    /**
     * Verifica si los datos ingresados por formulario son correctos.
     * Valida la integridad de los datos
     *
     * @param mixed[] $data Arreglo que almacena los datos que se enviarán a la vista
     *
     * @return void|boolean
     */
    public function ValidarVacuna($data)
    {
        $this->form_validation->set_rules(
                'nombre_vacuna', 'Nombre de la vacuna',
                array('required','is_unique[vacuna.nombre_vacuna]','min_length[3]','max_length[50]','regex_match[/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/]'),                   
                array(
                    'min_length'    => 'El %s debe tener al menos 3 caracteres.',
                    'max_length'    => 'El %s debe tener máximo 50 caracteres.', 
                    'regex_match'   => 'El %s sólo puede contener letras y espacios.',
                    'is_unique'     => 'El %s ya existe en la base de datos.',
                    'required'      => 'Debe ingresar un %s.'
                )
        );

        $this->form_validation->set_rules(
                'cant_enfermedad', 'Cantidad de enfermedades que combate', 
                array('numeric','greater_than_equal_to[1]','required'),
                array(
                    'greater_than_equal_to' => 'La %s debe tener un valor de al menos 1.',
                    'numeric'               => 'La %s sólo debe contener sólo números.',
                    'required'              => 'Debe insertar su %s.'
                    )                   
        );

        $this->form_validation->set_rules(
                'enfermedad[]', 'Enfermedad(es)', 
                array('required'),                      
                array(
                    'required'  => 'Debe especificar una(s) %s.'
                    )                   
        );

        $this->form_validation->set_rules(
                'esquema[]', 'Esquema', 
                array('required'),                      
                array(
                    'required'  => 'Debe elegir un %s.'
                    )                   
        );

        $this->form_validation->set_rules(
                'cant_dosis[]', 'Cantidad de dosis', 
                array('numeric','greater_than_equal_to[1]','required'),
                array(
                    'greater_than_equal_to' => 'La %s debe tener un valor de al menos 1.',
                    'numeric'               => 'La %s sólo debe contener sólo números.',
                    'required'              => 'Debe insertar su %s.'
                    )                     
        );

        $this->form_validation->set_rules(
                'intervalo[]', 'Intervalo', 
                array('numeric','greater_than_equal_to[1]','required'),
                array(
                    'greater_than_equal_to' => 'La %s debe tener un valor de al menos 1.',
                    'numeric'               => 'La %s sólo debe contener sólo números.',
                    'required'              => 'Debe insertar su %s.'
                    )                     
        );


        $this->form_validation->set_rules(
                'interperiodo[]', 'Período del intervalo', 
                array('required'),                      
                array(
                    'required'  => 'Debe especificar un %s.'
                    )                   
        );

        $this->form_validation->set_rules(
                'via_administracion[]', 'Via de administracion', 
                array('required'),                      
                array(
                    'required'  => 'Debe especificar una %s.'
                    )                   
        );

        $this->form_validation->set_rules(
                'eminima[]', 'Edad mínima', 
                array('numeric','greater_than_equal_to[1]','required'),
                array(
                    'greater_than_equal_to' => 'La %s debe tener un valor de al menos 1.',
                    'numeric'               => 'La %s sólo debe contener sólo números.',
                    'required'              => 'Debe insertar su %s.'
                    )                     
        );

        $this->form_validation->set_rules(
                'eminperiodo[]', 'Período de edad mínima', 
                array('required'),                      
                array(
                    'required'  => 'Debe especificar un %s.'
                    )                   
        );

        $this->form_validation->set_rules(
                'emaxima[]', 'Edad máxima', 
                array('numeric','greater_than_equal_to[1]','required'),
                array(
                    'greater_than_equal_to' => 'La %s debe tener un valor de al menos 1.',
                    'numeric'               => 'La %s sólo debe contener sólo números.',
                    'required'              => 'Debe insertar su %s.'
                    )                     
        );

        $this->form_validation->set_rules(
                'emaxperiodo[]', 'Período de edad máxima', 
                array('required'),                      
                array(
                    'required'  => 'Debe especificar un %s.'
                    )                   
        );

        $this->form_validation->set_rules(
                'dosificacion[]', 'Dosificación',
                array('required','decimal[vacuna.nombre_vacuna]','min_length[1]','regex_match[/^[-+]?([0-9]*.[0-9]+|[0-9]+)/]'),                   
                array(
                    'min_length'    => 'La %s debe tener al menos 1 caracter.',
                    'regex_match'   => 'La %s sólo puede contener números enteros o decimales.',
                    'decimal'       => 'La %s debe ser representada en números enteros o decimales.',
                    'required'      => 'Debe ingresar un %s.'
                )
        );

        $this->form_validation->set_rules(
                'tipo_dosificacion[]', 'Tipo de dosificación', 
                array('required'),                      
                array(
                    'required'  => 'Debe especificar un %s.'
                    )                   
        );

        //Si hay datos inválidos...
        if ($this->form_validation->run() == FALSE) {

             switch ($this->session->userdata('tipo_usuario')) {
                case "Doctor":                  
                    $this->load->view('medicina/doctor/header'); 
                    $this->load->view('medicina/FormularioRegistroVacuna', $data);
                    $this->load->view('medicina/doctor/footer'); 
                    break;

                case "Enfermero":                   
                    $this->load->view('medicina/enfermero/header'); 
                    $this->load->view('medicina/FormularioRegistroVacuna', $data);
                    $this->load->view('medicina/enfermero/footer'); 
                    break;
            }             

        //Si no hay datos inválidos...
        }else{

            return false;
        }
    }
    
}