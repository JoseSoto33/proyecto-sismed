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

	public function AgregarNoticia()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$this->form_validation->set_rules(
			        'titulo', 'Título',
			        array('required','regex_match[/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/]'),		        	
			        array(   
		                'regex_match'  	=> 'El %s es alfanumérico... sólo puede contener letras, números y espacios.',
		                'required'   	=> 'Debe insertar un %s.'
			        )
			);

			$this->form_validation->set_rules(
	            	'url', 'dirección de enlace', 
	        		array('required','valid_url','regex_match[/^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,6})?([\.\-\w\/_]+)$/i]'),
	                array(
	                	'regex_match'  	=> 'La %s es inválida.',
	                	'valid_url'		=> 'La %s no es válida.',
	                	'required'	=> 'Debe ingresar una %s.'
		                )	                
            );

			$this->form_validation->set_rules(
	            	'descripcion', 'Descripción', 
	        		array('required'),	        			
	                array(
	                	'required'	=> 'Debe especificar una %s.'
		                )	                
            );

			if ($this->form_validation->run() == FALSE) {
            	
				$this->load->view('admin/FormularioRegistroNoticia');
            }else{
				
				$condicion = array(
						'where' => array(
							'titulo' => $this->input->post('titulo'),
							'url' => $this->input->post('url')
							)
					);

				if (!$this->NoticiaModel->ValidarNoticia($condicion)) {
					
					$data = array();

					if ($this->NoticiaModel->AgregarNoticia()) {

						header("Location: ".base_url()."Noticia/ListarNoticias");

					}else{
						$data['mensaje'] = $this->db->error();
						$this->load->view('admin/FormularioRegistroNoticia', $data);
					}
				}else{
					$data['mensaje'] = "Ya existe una noticia registrada con el mismo título y dirección de enlace.";
					$this->load->view('admin/FormularioRegistroNoticia', $data);
				}
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

		$data["noticias"] = $result;
		$this->load->view('admin/ListarNoticias', $data);		
	}

	public function ValidarNoticia()
	{

	}
}