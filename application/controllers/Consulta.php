<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Controller {

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
     * @method AgregarConsulta()
     * @method ModificarModificar(integer $id_consulta)
     * @method ValidarConsulta(mixed[] $data)
     * @method VerConsulta()
     */

    /**
     * Agrega una nueva consulta a la base de datos
     *
     * La consulta puede ser:
     * - Médica curativa (Tipo 1)
     * - Médica preventiva (Tipo 2)
     * - Odontológica (Tipo 3)
     * - Nutricional (Tipo 4)
     */
    public function AgregarConsulta()
    {

    }

    /**
     * 
     */
    public function ModificarModificar($id_consulta)
    {

    }

    /**
     * 
     */
    public function VerConsulta()
    {

    }

    /**
     * 
     */
    public function ListarConsultas()
    {        
    	//list($cod_historia,$tipo_consulta) = explode("_", $param);
        $cod_historia = $this->input->post("cod_historia");
        $tipo_consulta = $this->input->post("tipo_cons");

        $condicion = array();

        switch ($tipo_consulta) {
            case '1':
                $condicion['select'] = "consulta.*, patologia.nombre AS patologia";
                $condicion['from'] = "consulta_curativa AS consulta";
                $condicion['join'] = array(
                    "tabla" => "patologia",
                    "condicion" => "consulta.id_patologia = patologia.id",
                    "tipo" => "left"
                    );
                $condicion['where'] = array(
                    "consulta.cod_historia" => $cod_historia,
                    "consulta.tipo" => $tipo_consulta
                    );
                break;
            
            case '2':
                
                break;
        }

        $result = $this->ConsultaModel->ExtraerConsulta($condicion);

        echo json_encode($result->result());
    }

    /**
     * 
     */
    public function ValidarConsulta($data)
    {

    }
}