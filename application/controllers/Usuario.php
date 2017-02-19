<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
       	}
       	/*Esto es para validar que el usuario es Administrador*/
       	if ($this->session->userdata('tipo_usuario') == 2){
       		header('Location: '.base_url()."Home");
       	}
       	/*Al validar estas dos condiciones en el constructor no hace falta
       	validarlos en cada método*/
    }

	public function AgregarUsuario()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if ($this->UsuarioModel->AgregarUsuario()) {
				
				if ($this->input->post("origen") === "login") {
					
					header("Location: ".base_url());
				}else{
					header("Location: ".base_url()."Usuario/ListarUsuarios");
				}

			}else{

			}

		}else{

			$this->load->view('admin/FormularioRegistroUsuario');
		}
	}

	public function ModificarUsuario()
	{

	}

	public function EliminarUsuario()
	{

	}

	public function PerfilUsuario()
	{

	}

	public function ListarUsuarios()
	{
		$condicion = array(
			"select" => "id, cedula, nombre1, apellido1, especialidad, status",
			"where" => array("id !=" => $this->session->userdata('idUsuario'))
			);

		$data = array();

		$result = $this->UsuarioModel->ExtraerUsuario($condicion);

		if ($result->num_rows() > 0) {
			
			$data["usuarios"] = $result;
			$this->load->view('admin/ListarUsuarios', $data);
		}
	}

	public function ValidarUsuario()
	{

	}
}