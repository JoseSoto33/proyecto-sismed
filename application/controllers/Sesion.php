<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {

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
       if ($this->session->userdata('login')){
       		header('Location: '.base_url()."Home");
       }
       /*Al validar estas dos condiciones en el constructor no hace falta
       validarlos en cada método*/
    }

    public function index()
    {
    	$this->load->view('login/index');
    }

	public function Login()
	{
		$condicion = array(
			"where" => array(
				"cedula" => $this->input->post("cedula"),
				"password" => $this->input->post("password")
				)
			);
		if ($this->UsuarioModel->ValidarUsuario($condicion)) {
			
			$usuario = $this->UsuarioModel->ExtraerUsuario($condicion)->row();

			if ($usuario->status === "f") {
				echo "error 4";
			}elseif (strcmp($usuario->password,$this->input->post('password'))===0) {
				
				$data = array(
					"id_usuario" => $usuario->id,
					"fecha_inicio" => date('Y-m-d h:i:s a')
					);

				$id_sesion = $this->SesionModel->Login($data);

				if (!$id_sesion) {
					
					echo "error 3";
				}else{

					$data = array(
								'idUsuario' => $usuario->id,
								'idSesion' => $id_sesion,
								'username' => $usuario->username,
								'nombre' => $usuario->nombre1,
								'apellido' => $usuario->apellido,
								'login' => true,
								'tipo_usuario' => $usuario->tipo_usuario
							);
					$this->session->set_userdata($data);

					header('Location: '.base_url()."Home");
				}

			}else{

				echo "error 2";
			}
		}else{
			echo "error 1";
		}
	}

	public function Logout()
	{
		$data = array(
			"campos" => array(
				"fecha_fin" => date('Y-m-d h:i:s a')
				),
			"where" => array(
				"id" => $this->session->userdata('idSesion'),
				"id_usuario" => $this->session->userdata('idUsuario')
				)
			);

		if ($this->SesionModel->Logout($data)) {
			
			$data = array('idUsuario','idSesion','username','nombre','apellido','login','tipo_usuario');
			$this->session->unset_userdata($data);
			$this->session->sess_destroy();
			header('Location: '.base_url());

		}else{
			header('Location: '.base_url().'Home');
		}
	}

	public function ValidarSesion()
	{

	}

	public function ListarSesiones()
	{
		$this->load->view('admin/ListarSesiones');
	}
}