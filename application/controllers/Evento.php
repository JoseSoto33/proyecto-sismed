<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {

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
	public function AgregarEvento()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$this->form_validation->set_rules(
			        'titulo', 'Título',
			        array('required','regex_match[/A-Za-z0-9ñÑáéíóúüÁÉÍÓÚÜ\-_çÇ& /]'),		        	
			        array(   
		                'regex_match'  	=> 'El %s es alfanumérico... sólo puede contener letras, números y espacios.',
		                'required'   	=> 'Debe insertar un %s.'
			        )
			);

            $this->form_validation->set_rules(
	            	'fecha_inicio', 'Fecha de inicio', 
	        		array('required'),	        			
	                array(
	                	'required'		=> 'Debe ingresar una %s.'
		                )	                
            );

			if ($this->form_validation->run() == FALSE) {
            	
				$this->load->view('admin/FormularioRegistroEvento');
            }else{
				$data = array();

				if ($this->EventoModel->AgregarEvento()) {

					header("Location: ".base_url()."Evento/ListarEventos");

				}else{
					$data['mensaje'] = $this->db->error();
					$this->load->view('admin/FormularioRegistroEvento', $data);
				}
			}
		}else{

			$this->load->view('admin/FormularioRegistroEvento');
		}
	}

	public function ModificarEvento()
	{

	}

	public function EliminarEvento()
	{

	}

	public function PerfilEvento()
	{

	}

	public function ListarEventos()
	{
		$condicion = array(
			"select" => "id, titulo, descripcion, fecha_hora_inicio",
			"where" => array("id_usuario" => $this->session->userdata('idUsuario'))
			);

		$data = array();

		$result = $this->EventoModel->ExtraerEvento($condicion);

		///if ($result->num_rows() > 0) {
			
			$data["eventos"] = $result;
			$this->load->view('admin/ListarEventos', $data);
		//}
	}

	public function ValidarEvento()
	{

	}
}