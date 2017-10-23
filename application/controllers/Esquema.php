<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esquema extends CI_Controller {

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
     * @method void ModificarVacuna(integer $id_vacuna)
     * @method void VerVacuna()
     * @method void ListarVacunas()
     * @method void obtenerEsquemaAplicable()
     * @method void TarjetaVacunacion()
     */

    /**
     * Extrae información sobre un esquema en específico de la base de datos
     *
     * @return void
     */
    public function VerEsquema()
    {
        $this->load->model('EsquemaModel');
        $id_esquema = $this->input->post("id");

        $condicion = array(
            "where" => array("id" => $id_esquema),
            "order_by" => array("campo" => "id", "direccion" => "ASC")
            );

        $esquema = $this->EsquemaModel->ExtraerEsquema($condicion)->row_array();        

        echo json_encode($esquema);
    }

    /**
     * Agrega un nuevo esquema de vacunación, relacionado a determinada vacuna, a la base de datos
     *
     * @return void
     */
    public function AgregarEsquema()
    {
        $this->load->model('VacunaModel');
        $this->load->model('EsquemaModel');

        $id_vacuna = $this->input->post("id_vacuna");

        $condicion = array(
            "where" => array("MD5(concat('sismed',id))" => $id_vacuna)
            ); 

        $vacuna = $this->VacunaModel->ExtraerVacuna($condicion)->row_array();

        if ($this->EsquemaModel->AgregarEsquema($vacuna["id"])) {

            $condicion = array(
                "where" => array("MD5(concat('sismed',id_vacuna))" => $id_vacuna),
                "order_by" => array("campo" => "id", "direccion" => "ASC")
                );

            $esquemas = $this->EsquemaModel->ExtraerEsquema($condicion)->result_array();
            
           echo json_encode(array("status"=>true, "message" => "Esquema agregado exitosamente...", "esquemas" => $esquemas));
        }else{
            echo json_encode(array("status"=>false, "message" => "Error al agregar esquema..."));
        }
    }

    /**
     * Modifica los datos de un esquema de vacunación determinado
     *
     * @return void
     */
    public function EditarEsquema()
    {
        $this->load->model('EsquemaModel');

        $id_vacuna = $this->input->post("id_vacuna");

        $condicion = array(
            "data" => array(
                "min_edad_aplicacion" => $this->input->post("eminima"),
                "min_edad_periodo" => $this->input->post("eminperiodo"),
                "max_edad_aplicacion" => $this->input->post("emaxima"),
                "max_edad_periodo" => $this->input->post("emaxperiodo"),
                "via_administracion" => $this->input->post("via_administracion"),
                "cant_dosis" => $this->input->post("cant_dosis"),
                "intervalo" => $this->input->post("intervalo"),
                "intervalo_periodo" => $this->input->post("interperiodo"),
                "dosificacion" => $this->input->post("dosificacion"),
                "tipo_dosificacion" => $this->input->post("tipo_dosificacion"),
                "observaciones" => $this->input->post("observaciones")
                ),
            "where" => array(
                "id" => $this->input->post("id_esquema"),
                "MD5(concat('sismed',id_vacuna))" => $id_vacuna
                )
            ); 

        if ($this->EsquemaModel->ModificarEsquema($condicion)) {

            $condicion = array(
                "where" => array("MD5(concat('sismed',id_vacuna))" => $id_vacuna),
                "order_by" => array("campo" => "id", "direccion" => "ASC")
                );

            $esquemas = $this->EsquemaModel->ExtraerEsquema($condicion)->result_array();
            
            echo json_encode(array("status"=>true, "message" => "Esquema modificado exitosamente...", "esquemas" => $esquemas));
        }else{
            echo json_encode(array("status"=>false, "message" => "Error al modificar esquema..."));
        }
    }

    /**
     * Elimina un esquema de vacunación de la base de datos
     *
     * @return void
     */
    public function EliminarEsquema()
    {
        $this->load->model('EsquemaModel');

        $id_esquema = $this->input->post("id_esquema");
        $id_vacuna = $this->input->post("id_vacuna");

        $condicion = array(
            "where" => array(
                "id" => $id_esquema,
                "MD5(concat('sismed',id_vacuna))" => $id_vacuna
                )
            ); 

        if ($this->EsquemaModel->EliminarEsquema($condicion)) {

            $condicion = array(
                "where" => array("MD5(concat('sismed',id_vacuna))" => $id_vacuna),
                "order_by" => array("campo" => "id", "direccion" => "ASC")
                );

            $esquemas = $this->EsquemaModel->ExtraerEsquema($condicion)->result_array();
            
            echo json_encode(array("status"=>true, "message" => "Esquema eliminado exitosamente...", "esquemas" => $esquemas));
        }else{
            echo json_encode(array("status"=>false, "message" => "Error al eliminar esquema..."));
        }
    }
    
    /**
     * Extrae de la base de datos un esquema de vacunación para ser aplicado a un paciente
     *
     * @return void
     */
    public function obtenerEsquemaAplicable()
    {   
        $this->load->model('EsquemaModel');

        $idesquema = $this->input->post("idesquema");
        $cod_historia = $this->input->post("cod_historia");

        $esquema = $this->EsquemaModel->extraerEsquemaAplicable($idesquema,$cod_historia);

        echo json_encode($esquema);
    }

    /**
     * Muestra la tarjeta de vacunación del paciente
     *
     * @return void
     */
    public function TarjetaVacunacion()
    {
        $this->load->model('EsquemaModel');
        $this->load->model('PacienteModel');

        $cod_historia = $this->input->post('cod_historia');

        $condicion = array(
            'select' => 'fecha_nacimiento',
            'join' => array(
                'tabla' => 'historia_medicina',
                'condicion' => 'paciente.id = historia_medicina.id_paciente'
            ),
            'where' => array("historia_medicina.cod_historia" => $cod_historia)
            );

        $result = $this->PacienteModel->Extraerpaciente($condicion)->row_array();

        $hoy = date('Y-m-d');
        $diff = abs(strtotime($hoy) - strtotime($result["fecha_nacimiento"]));
        $edad = floor($diff / (365*60*60*24));

        $esquemas = $this->EsquemaModel->extraerEsquemasDisponibles($edad,md5('sismed'.$cod_historia));
        $data['esquemas_vacunacion'] = $esquemas;
        $this->load->view('medicina/TarjetaVacunacion',$data); 
    }
    
}