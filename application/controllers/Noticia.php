<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends CI_Controller {

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
	public function AgregarNoticia()
	{
		$this->load->view('admin/FormularioRegistroNoticia');
	}

	public function ModificarNoticia()
	{

	}

	public function EliminarNoticia()
	{

	}

	public function PerfilNoticia()
	{

	}

	public function ListarNoticias()
	{
		$this->load->view('admin/ListarNoticias');
	}

	public function ValidarNoticia()
	{

	}
}