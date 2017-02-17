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

	public function ModificarUsuario()
	{

	}

	public function EliminarUsuario()
	{

	}

	public function PerfilUsuario()
	{

	}

	public function ListarSesiones()
	{
		$this->load->view('admin/ListarSesiones');
	}

	public function ValidarUsuario()
	{

	}
}