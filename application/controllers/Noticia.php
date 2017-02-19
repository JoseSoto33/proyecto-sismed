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
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$data = array();

			if ($this->NoticiaModel->AgregarNoticia()) {

				header("Location: ".base_url()."Noticia/ListarNoticias");

			}else{
				$data['mensaje'] = $this->db->error();
				$this->load->view('admin/FormularioRegistroNoticia', $data);
			}
		}else{

			$this->load->view('admin/FormularioRegistroNoticia');
		}
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
		$condicion = array(
			"select" => "id, titulo, descripcion, url",
			"where" => array("id_usuario" => $this->session->userdata('idUsuario'))
			);

		$data = array();

		$result = $this->NoticiaModel->ExtraerNoticia($condicion);

		if ($result->num_rows() > 0) {
			
			$data["noticias"] = $result;
			$this->load->view('admin/ListarNoticias', $data);
		}
	}

	public function ValidarNoticia()
	{

	}
}