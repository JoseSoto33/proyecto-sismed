<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoriaClinica extends CI_Controller {

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
        }
        if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Administrador") {
        	redirect(base_url('Home')); 
        }
    }

    /**
     * @method ListarHistorias()
     * @method ConsultarHistoriaClinica(integer $id_evento)
     */

    /**
     * Muestra el listado de historias clínicas registradas en el sistema
     *
     * @return void
     */
    public function ListarHistorias()
    {
    	$condicion = array(
			"select" => "historia.cod_historia, historia.fecha_creada, paciente.id, paciente.nombre1, paciente.nombre2, paciente.apellido1, paciente.apellido1",
			"join" => array("paciente", "paciente.id = historia.id_paciente")
			);

		$data = array();

		$result = $this->HistoriaModel->ExtraerHistoria($condicion);

		$data["historias"] = $result;
		$this->load->view('medicina/ListarHistorias', $data);
    }

    /**
     * Muestra el listado de historias clínicas registradas en el sistema
     *
     * @return void
     */
    public function ConsultarHistoriaClinica()
    {
    	
    }
}