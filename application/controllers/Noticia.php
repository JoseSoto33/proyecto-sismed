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
		$data = array("titulo" => "Agregar nueva noticia");

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
			if ($this->ValidarNoticia($data) === false) {
				
				$ruta 		= './assets/img/noticias/';
		        $nombre 	= base64_encode($this->input->post('titulo'))."_".date("d-m-Y");
		        $file_info 	= $this->ImagenModel->SubirImagen($data,$ruta,$nombre);

		        if ($file_info != false) {

					$condicion = array(
							'where' => array(
								'titulo' => $this->input->post('titulo')
								)
						);

					$url = $this->input->post('url');
					if ($url != null && $url != "") {
						
						$condicion["where"]["url"] = $url;
					}

					if (!$this->NoticiaModel->ValidarNoticia($condicion)) {
						
						$data = array();

						if ($this->NoticiaModel->AgregarNoticia()) {

							set_cookie("message","La noticia <strong>'".$this->input->post('titulo')."'</strong> fue registrada exitosamente!...", time()+15);
							header("Location: ".base_url()."Noticia/ListarNoticias");

						}else{
							$data['mensaje'] = $this->db->error();
						}
					}else{
						$data['mensaje'] = "Ya existe una noticia registrada con el mismo título y dirección de enlace.";
					}
				}else{
	        		$data['mensaje'] = $this->upload->display_errors();		     
	        	}
			}
		}

		$this->load->view('admin/FormularioRegistroNoticia', $data);
	}

	public function ModificarNoticia($id_noticia)
	{
		$data = array("titulo" => "Modificar noticia");

		$cond = array(
				"where" => array(
					"MD5(concat('sismed',id))" => $id_noticia
					)
				);

		$result = $this->NoticiaModel->ExtraerNoticia($cond);

		if ($result->num_rows() > 0) {
			
			$data['noticia'] = $result->row_array();

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
					
				if ($this->ValidarNoticia($data) === false) {
					
					if (isset($_POST['img-change']) && isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != '' ) {
	            		//return "bandera";
	            		//var_dump($_FILES);
		            	$ruta 		= './assets/img/noticias/';
				        $nombre 	= base64_encode($this->input->post('titulo'))."_".date("d-m-Y");
				        $file_info 	= $this->ImagenModel->SubirImagen($data,$ruta,$nombre);

				        if ($file_info != false) {
				        	$data['noticia']['img'] = $file_info['file_name'];
				        }
	            	}

	            	if (!isset($file_info) || (isset($file_info) && $file_info != false)) {

						$condicion = array(
								'where' => array(
									'titulo' => $this->input->post('titulo'),
									"MD5(concat('sismed',id)) !=" => $id_noticia
									)
							);

						$url = $this->input->post('url');

						if ($url != null && $url != "") {
							
							$condicion["where"]["url"] = $url;
						}

						if (!$this->NoticiaModel->ValidarNoticia($condicion)) {

							$file_info = $this->upload->data();
							
							$condicion = array(
									"data" => array(
						     			"id_usuario" => $this->session->userdata('idUsuario'),
						     			"titulo" => $this->input->post('titulo'),
						     			"descripcion" => $this->input->post('descripcion'),
						     			"url" => $this->input->post('url'),
						     			"img" => $data['noticia']['img']
						     		),
						     		"where" => array("MD5(concat('sismed',id))" => $id_noticia)
								);

							if ($this->NoticiaModel->ModificarNoticia($condicion)) {

								set_cookie("message","La noticia <strong>'".$this->input->post('titulo')."'</strong> fue modificada exitosamente!...", time()+15);
								header("Location: ".base_url()."Noticia/ListarNoticias");

							}else{
								$data['mensaje'] = $this->db->error();
							}
						}else{
							$data['mensaje'] = "Ya existe una noticia registrada con el mismo título y dirección de enlace.";
						}
					}else{
		        		$data['mensaje'] = $this->upload->display_errors();	
		        	}
				}
			}
		}else{
			$data['mensaje'] = $this->db->error();
		}

		$this->load->view('admin/FormularioRegistroNoticia', $data);
	}

	public function EliminarNoticia()
	{
		$id = $this->input->post('id');
		$condicion = array(
			'where' => array("MD5(concat('sismed',id))" => $id)
			);

		if ($this->NoticiaModel->EliminarNoticia($condicion)) {
			
			$data['result']  = true;
			$data['message'] = 'Noticia eliminada exitosamente!...';
		}else{
			$data['result']  = false;
			$data['message'] = 'Error: Ha ocurrido un problema durante la eliminación.\n'.$this->db->error();
		}
		//redirect(base_url('Evento/ListarEventos'));
		echo json_encode($data);
	}

	public function VerNoticia()
	{
		$id = $this->input->post('id');
		$condicion = array(
			"where" => array("MD5(concat('sismed',id))" => $id)
			);

		$result = $this->NoticiaModel->ExtraerNoticia($condicion);

		if ($result->num_rows() > 0) {
			
			$data = $result->row_array();			
			$data["result"] = true;
		}else{
			$data["result"] = false;
			$data["message"] = 'Error: '.$this->db->error();
		}

		echo json_encode($data);
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

	public function ValidarNoticia($data)
	{
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
        		array('valid_url','regex_match[/^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,6})?([\.\-\w\/_]+)$/i]'),
                array(
                	'regex_match'  	=> 'La %s es inválida.',
                	'valid_url'		=> 'La %s no es válida.'
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
        	
			$this->load->view('admin/FormularioRegistroNoticia', $data);
        }else{

        	return false;
        }
	}
}