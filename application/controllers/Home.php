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

    /**
     * @method void index()
     * @method void	ExtraerEventos()
     * @method mixed[]|boolean ExtraerNoticias()
     */

    /**
     * Muestra la pantalla principal para cada usuario
     * 
     * @return 	void 	
     */
	public function index()
	{
		//Si existe una sesión iniciada...
		if ($this->session->userdata('login')) {

			$data = array("noticias" => $this->ExtraerNoticias());

			//var_dump($this->session->userdata('tipo_usuario'));
			//Dependiendo del tipo de usuario..
			switch ($this->session->userdata('tipo_usuario')) {
				//Si el tipo de usuario es "Administrador"...
				case "Administrador":
					$this->load->view('admin/index',$data);
					break;
				
				//Si el tipo de usuario es "Doctor"...
				case "Doctor":
					$this->load->view('medicina/index',$data);
					break;

				//Si el tipo de usuario es "Enfermero"...
				case "Enfermero":
					$this->load->view('medicina/index',$data);
					break;

				//Si el tipo de usuario es "Odontólogo"...
				case "Odontólogo":
					$this->load->view('odontologia/index',$data);
					break;

				//Si el tipo de usuario es "Bioanalista"...
				case "Bioanalista":
					$this->load->view('laboratorio/index',$data);
					break;

				//Si el tipo de usuario es "Nutricionista"...
				case "Nutricionista":
					$this->load->view('nutricion/index',$data);
					break;

				//Si el tipo de usuario es "Asistente"...
				case "Asistente":
					$this->load->view('nutricion/index',$data);
					break;
			}
		//Si no existe una sesión iniciada...
		}else{
			header('Location: '.base_url());
		}
	}

	/**
	 * Extrae de la base de datos la información de los próximos eventos del mes
	 * 
	 * @return 	void 
	 */
	public function ExtraerEventos()
	{
		$condicion = array(
			"select" => "id as id, titulo as title, descripcion, fecha_hora_inicio as fecha_inicio, fecha_hora_inicio as hora_inicio, fecha_hora_fin as fecha_fin, fecha_hora_fin as hora_fin, fecha_hora_inicio as start, fecha_hora_fin as end, img"
			);
		$result = $this->EventoModel->ExtraerEvento($condicion);

		$eventos = $result->result();

		//Para cada registro encontrado...
		foreach ($eventos as $key => $evento) {
			
			setlocale(LC_TIME,"esp");

			$evento->fecha_inicio = strftime('%d de %B de %Y', strtotime($evento->fecha_inicio));		
			$evento->fecha_fin 	  = strftime('%d de %B de %Y', strtotime($evento->fecha_fin));		
			$evento->hora_inicio  = date('h:i a', strtotime($evento->hora_inicio));		
			$evento->hora_fin 	  = date('h:i a', strtotime($evento->hora_fin));
		}
		echo json_encode($eventos);
	}

	/**
	 * Extrae las últimas noticias de la base de datos, o retorna false si no se consiguen registros
	 *
	 * @return mixed[]|boolean
	 */
	public function ExtraerNoticias()
	{
		$condicion = array(
			"where" => array(
				"Extract(month from created_at) =" => date("m"),
				"Extract(year from created_at) =" => date("Y")
				)
			);
		$result = $this->NoticiaModel->ExtraerNoticia($condicion);

		if ($result->num_rows() > 0) {
			return $result->result_array();
		}else{
			return false;
		}
	}
}