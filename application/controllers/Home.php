<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

            /*Esto es para validar que el usuario inició sesión*/
           if (!$this->session->userdata('login')){
           		header('Location: '.base_url());
           }elseif ($this->session->userdata('first_session') === true) {
           		header('Location: '.base_url().'Usuario/PasswordChange');
           }         
    }

	public function index()
	{
		if ($this->session->userdata('login')) {

			switch ($this->session->userdata('tipo_usuario')) {
				case "Administrador":
					$this->load->view('admin/index');
					break;
				
				case "Doctor":
					$this->load->view('medicina/doctor/index');
					break;

				case "Enfermero":
					$this->load->view('medicina/enfermero/index');
					break;

				case "Odontólogo":
					$this->load->view('odontologia/index');
					break;

				case "Bioanalista":
					$this->load->view('laboratorio/index');
					break;

				case "Nutricionista":
					$this->load->view('nutricion/nutricionista/index');
					break;

				case "Asistente":
					$this->load->view('nutricion/asistente/index');
					break;
			}
		}else{
			header('Location: '.base_url());
		}
	}

	public function ExtraerEventos()
	{
		$condicion = array(
			"select" => "id as id, titulo as title, descripcion, fecha_hora_inicio as fecha_inicio, fecha_hora_inicio as hora_inicio, fecha_hora_fin as fecha_fin, fecha_hora_fin as hora_fin, fecha_hora_inicio as start, fecha_hora_fin as end, img"
			);
		$result = $this->EventoModel->ExtraerEvento($condicion);

		$eventos = $result->result();

		foreach ($eventos as $key => $evento) {
			
			setlocale(LC_TIME,"esp");

			$evento->fecha_inicio = strftime('%d de %B de %Y', strtotime($evento->fecha_inicio));		
			$evento->fecha_fin 	  = strftime('%d de %B de %Y', strtotime($evento->fecha_fin));		
			$evento->hora_inicio  = date('h:i a', strtotime($evento->hora_inicio));		
			$evento->hora_fin 	  = date('h:i a', strtotime($evento->hora_fin));
		}
		echo json_encode($eventos);
	}
}