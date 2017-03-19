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

    /**
     * @method void AgregarNoticia()
     * @method void ModificarNoticia(integer $id_evento)
     * @method void EliminarNoticia()
     * @method void VerNoticia()
     * @method void ListarNoticias()
     * @method void|boolean ValidarNoticia(mixed[] $data)
     */

    /**
     * Muestra la interfaz del formulario para agregar una noticia, 
     * o realiza el registro de la noticia en la base de datos si 
     * se hace una petición POST
     *
     * @return 	void
     */

	public function AgregarNoticia()
	{
		$data = array("titulo" => "Agregar nueva noticia");

		//Si se envió una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			//Si los datos enviados por formulario son correctos...
			if ($this->ValidarNoticia($data) === false) {
				
				$ruta 		= './assets/img/noticias/';
		        $nombre 	= base64_encode($this->input->post('titulo'))."_".date("d-m-Y");
		        $file_info 	= $this->ImagenModel->SubirImagen($data,$ruta,$nombre);

		        //Si se cargó el archivo correctamente...
		        if ($file_info != false) {

					$condicion = array(
							'where' => array(
								'titulo' => $this->input->post('titulo')
								)
						);

					$url = $this->input->post('url');

					//Si $url no está vacío...
					if ($url != null && $url != "") {
						
						$condicion["where"]["url"] = $url;
					}

					//Si no existe una noticia registrada con el mismo nombre y
					//la misma URL
					if (!$this->NoticiaModel->ValidarNoticia($condicion)) {
						
						//$data = array();

						//Si la noticia se agrega exitosamente a la base de datos...
						if ($this->NoticiaModel->AgregarNoticia()) {

							set_cookie("message","La noticia <strong>'".$this->input->post('titulo')."'</strong> fue registrada exitosamente!...", time()+15);
							header("Location: ".base_url()."Noticia/ListarNoticias");

						//Si hay error en la inserción
						}else{
							$data['mensaje'] = $this->db->error();
						}

					//Si ya existe una noticia con los datos enviados
					}else{
						$data['mensaje'] = "Ya existe una noticia registrada con el mismo título y dirección de enlace.";
					}
				//Si no se cargó el archivo...
				}else{
	        		$data['mensaje'] = $this->upload->display_errors();		     
	        	}
			}
		}
		//Cargar vista del formulario de registro de noticia
		$this->load->view('admin/FormularioRegistroNoticia', $data);
	}

	/**
	 * Muestra la interfaz del formulario para modificar una noticia, o  
     * realiza la modificación de la noticia si se hace una petición POST
     *
     * @param int $id_noticia Código que identifica a la noticia en la base de datos
     *
     * @return void
	 */
	public function ModificarNoticia($id_noticia)
	{
		$data = array("titulo" => "Modificar noticia");

		$cond = array(
				"where" => array(
					"MD5(concat('sismed',id))" => $id_noticia
					)
				);

		$result = $this->NoticiaModel->ExtraerNoticia($cond);

		//Si los registros encontrados son más de 0...
		if ($result->num_rows() > 0) {
			
			$data['noticia'] = $result->row_array();

			//Si se envía una petición POST...
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				//Si los datos de la noticia son válidos...
				if ($this->ValidarNoticia($data) === false) {
					
					//Si se cambió la imagen de la noticia...
					if (isset($_POST['img-change']) && isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != '' ) {
	            		
		            	$ruta 		= './assets/img/noticias/';
				        $nombre 	= base64_encode($this->input->post('titulo'))."_".date("d-m-Y");
				        $file_info 	= $this->ImagenModel->SubirImagen($data,$ruta,$nombre);

				        //Si el archivo se cargó correctamente...
				        if ($file_info != false) {
				        	$data['noticia']['img'] = $file_info['file_name'];
				        }
	            	}

	            	//Si el archivo fue declarado...
	            	if (!isset($file_info) || (isset($file_info) && $file_info != false)) {

						$condicion = array(
								'where' => array(
									'titulo' => $this->input->post('titulo'),
									"MD5(concat('sismed',id)) !=" => $id_noticia
									)
							);

						$url = $this->input->post('url');

						//Si $url no está vacío...
						if ($url != null && $url != "") {
							
							$condicion["where"]["url"] = $url;
						}

						//Si los datos de la noticia son correctos...
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

							//Si la modificación es exitosa...
							if ($this->NoticiaModel->ModificarNoticia($condicion)) {

								set_cookie("message","La noticia <strong>'".$this->input->post('titulo')."'</strong> fue modificada exitosamente!...", time()+15);
								header("Location: ".base_url()."Noticia/ListarNoticias");

							//Si ocurre un error en la modificación...
							}else{
								$data['mensaje'] = $this->db->error();
							}

						//Si los datos coinsiden con una noticia registrado...
						}else{
							$data['mensaje'] = "Ya existe una noticia registrada con el mismo título y dirección de enlace.";
						}

					//Si no se pudo cargar el archivo...
					}else{
		        		$data['mensaje'] = $this->upload->display_errors();	
		        	}
				}
			}

		//Si no se encontraron registros...
		}else{
			$data['mensaje'] = $this->db->error();
		}

		//Se carga la vista del formulario para modificar noticia
		$this->load->view('admin/FormularioRegistroNoticia', $data);
	}

	/**
	 * Elimina una noticia de la base de datos. El id de la noticia
	 * se envía por Ajax como un POST
	 *
	 * @return 	void 
	 */
	public function EliminarNoticia()
	{
		$id = $this->input->post('id');
		$condicion = array(
			'where' => array("MD5(concat('sismed',id))" => $id)
			);

		//Si se elimina la noticia exitosamente...
		if ($this->NoticiaModel->EliminarNoticia($condicion)) {
			
			$data['result']  = true;
			$data['message'] = 'Noticia eliminada exitosamente!...';

		//Si ocurre un error durante la eliminación...
		}else{
			$data['result']  = false;
			$data['message'] = 'Error: Ha ocurrido un problema durante la eliminación.\n'.$this->db->error();
		}
		
		echo json_encode($data);
	}

	/**
	 * Extrae los detalles de una noticia determinado
	 *
	 * @return void
	 */
	public function VerNoticia()
	{
		$id = $this->input->post('id');
		$condicion = array(
			"where" => array("MD5(concat('sismed',id))" => $id)
			);

		$result = $this->NoticiaModel->ExtraerNoticia($condicion);

		//Si la cantidad de registros encontrados es mayor a 0
		if ($result->num_rows() > 0) {
			
			$data = $result->row_array();			
			$data["result"] = true;

		//Si no se encontraron registros...
		}else{
			$data["result"] = false;
			$data["message"] = 'Error: '.$this->db->error();
		}

		echo json_encode($data);
	}

	/**
	 * Extrae las noticias existentes de la base de datos, registrados
	 * por el usuario en sesión y ordenados por su id
	 *
	 * @return void
	 */
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

	/**
	 * Verifica si los datos ingresados por formulario son correctos.
	 * Valida la integridad de los datos
	 *
	 * @param mixed[] $data Arreglo que almacena los datos que se enviarán a la vista
	 *
	 * @return void|boolean
	 */
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

		//Si no hay datos inválidos...
		if ($this->form_validation->run() == FALSE) {
        	
			$this->load->view('admin/FormularioRegistroNoticia', $data);

		//Si hay datos inválidos...
        }else{

        	return false;
        }
	}
}