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

	public function AgregarEvento()
	{
		$data = array("titulo" => "Agregar nuevo evento");

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			echo "bandera 1";
			
            if ($this->ValidarEvento($data) === false) {

            	echo "bandera 2";
            	
            	if ($this->SubirImagen($data) === false) {

            		echo "bandera 3";

            		$file_info = $this->upload->data();

					$fecha_inicio = $this->input->post('fecha_inicio');
					$fecha_fin 	 = $this->input->post('fecha_fin');

					$hora_inicio = $this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano');
	        		$hora_fin 	 = $this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano');

	        		$data = $this->EventoModel->ValidarFechaHora($fecha_inicio, $fecha_fin, $hora_inicio, $hora_fin, $data);
	        		//$data["titulo"] = "Agregar nuevo evento";

	        		if ($data['status'] === true) {

	        			echo "bandera 4";
	        			
	        			$condicion = array(
			        			'where' => array(
			        				'titulo' => $this->input->post('titulo'),
			        				'fecha_hora_inicio' => $this->input->post('fecha_inicio')." ".$this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano'),
			        				'fecha_hora_fin' => $this->input->post('fecha_fin')." ".$this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano')
			        				)
			        			);
	        			if (!$this->EventoModel->ValidarEvento($condicion)) {

	        				echo "bandera 5";
	        				
		        			if ($this->EventoModel->AgregarEvento()) {

		        				echo "bandera 6";

		        				set_cookie("message","El evento <strong>'".$this->input->post('titulo')."'</strong> fue registrado exitosamente!...", time()+15);
								header("Location: ".base_url()."Evento/ListarEventos");

							}else{

								echo "bandera 7";

								$data['mensaje'] = $this->db->error();
							}

	        			}else{

	        				echo "bandera 8";
	        				$data['mensaje'] = "Ya existe un evento registrado con el mismo título y fechas de inicio y fin.";
	        			}
	        		}
	        	}
			}
		}

		$this->load->view('admin/FormularioRegistroEvento', $data);
	}

	public function ModificarEvento($id_evento)
	{
		$data = array("titulo" => "Modificar datos de evento");

		$cond = array(
				"where" => array(
					"MD5(concat('sismed',id))" => $id_evento
					)
				);

		$result = $this->EventoModel->ExtraerEvento($cond);

		if ($result->num_rows() > 0) {

			$data['evento'] = $result->row_array();

			$data['evento']['fecha_inicio'] = date("Y-m-d", strtotime($data['evento']['fecha_hora_inicio']));
			$data['evento']['hora_inicio'] = date("h:i", strtotime($data['evento']['fecha_hora_inicio']));
			$data['evento']['h_i_meridiano'] = date("a", strtotime($data['evento']['fecha_hora_inicio']));

			$data['evento']['fecha_fin'] = date("Y-m-d", strtotime($data['evento']['fecha_hora_fin']));
			$data['evento']['hora_fin'] = date("h:i", strtotime($data['evento']['fecha_hora_fin']));
			$data['evento']['h_f_meridiano'] = date("a", strtotime($data['evento']['fecha_hora_fin']));

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
	            if ($this->ValidarEvento($data) === false) {

	            	if ($this->SubirImagen($data) === true) {
	            		
	            		$file_info = $this->upload->data();

						$fecha_inicio = $this->input->post('fecha_inicio');
						$fecha_fin 	 = $this->input->post('fecha_fin');

						$hora_inicio = $this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano');
		        		$hora_fin 	 = $this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano');

		        		$data = $this->EventoModel->ValidarFechaHora($fecha_inicio, $fecha_fin, $hora_inicio, $hora_fin, $data);

		        		if ($data['status'] === true) {
		        			
		        			$condicion = array(
				        			'where' => array(
				        				'titulo' => $this->input->post('titulo'),
				        				'fecha_hora_inicio' => $this->input->post('fecha_inicio')." ".$this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano'),	            	
				        				'fecha_hora_fin' => $this->input->post('fecha_fin')." ".$this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano')
				        				)
				        			);
		        			if (!$this->EventoModel->ValidarEvento($condicion)) {
		        				
		        				$condicion = array(								
						     		"where" => array("MD5(concat('sismed',id))" => $id_evento)
								);

			        			if ($this->EventoModel->ModificarEvento($condicion)) {

			        				set_cookie("message","El evento <strong>'".$this->input->post('titulo')."'</strong> fue registrado exitosamente!...", time()+15);
									header("Location: ".base_url()."Evento/ListarEventos");

								}else{

									$data['mensaje'] = $this->db->error();
								}

		        			}else{
		        				$data['mensaje'] = "Ya existe un evento registrado con el mismo título y fechas de inicio y fin.";
		        			}
		        		}
		        	}
				}
			}
		}else{
			$data['message'] = $this->db->error();
		}

		$this->load->view('admin/FormularioRegistroEvento', $data);
	}

	public function EliminarEvento()
	{
		$id = $this->input->post('id');
		$condicion = array(
			'where' => array("MD5(concat('sismed',id))" => $id)
			);

		if ($this->EventoModel->EliminarEvento($condicion)) {
			
			$data['result']  = true;
			$data['message'] = "Evento eliminado exitosamente!...";
		}else{
			$data['result']  = false;
			$data['message'] = 'Error: Ha ocurrido un problema durante la eliminación.\n'.$this->db->error();
		}
		//redirect(base_url('Evento/ListarEventos'));
		echo json_encode($data);
	}

	public function VerEvento()
	{
		$id = $this->input->post('id');
		$condicion = array(
			"where" => array("MD5(concat('sismed',id))" => $id)
			);

		$result = $this->EventoModel->ExtraerEvento($condicion);

		if ($result->num_rows() > 0) {
			
			$data = $result->row_array();

			setlocale(LC_TIME,"esp");

			$fecha_inicio = strftime('%d de %B de %Y', strtotime($data["fecha_hora_inicio"]));		
			$fecha_fin 	  = strftime('%d de %B de %Y', strtotime($data["fecha_hora_fin"]));		
			$hora_inicio  = date('h:i:s a', strtotime($data["fecha_hora_inicio"]));		
			$hora_fin 	  = date('h:i:s a', strtotime($data["fecha_hora_fin"]));

			$data["fecha_inicio"] = $fecha_inicio;
			$data["fecha_fin"] = $fecha_fin;
			$data["hora_inicio"] = $hora_inicio;
			$data["hora_fin"] = $hora_fin;
			$data["result"] = true;
		}else{
			$data["result"] = false;
			$data["message"] = 'Error: '.$this->db->error();
		}

		echo json_encode($data);
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

	public function ValidarEvento($data)
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
            	'fecha_inicio', 'Fecha de inicio', 
        		array('required','regex_match[/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/]'),
                array(
                	'regex_match'  	=> 'La %s debe tener el formato año-mes-día (2017-02-15 por ejemplo).',
                	'required'	=> 'Debe ingresar una %s.'
	                )	                
        );

        $this->form_validation->set_rules(
            	'hora_inicio', 'hora de inicio', 
        		array('required','regex_match[/^(0[1-9]|1[0-2]):[0-5][0-9]$/]'),
                array(
                	'required'	=> 'Debe ingresar la %s.',
                	'regex_match'	=> 'La %s debe tener un formato de hh:mm (02:25 por ejemplo).'
	                )	                
        );

        $this->form_validation->set_rules(
            	'h_i_meridiano', 'meridiano', 
        		array('required'),	        			
                array(
                	'required'	=> 'Debe seleccionar un %s.'
	                )	                
        );

        $this->form_validation->set_rules(
            	'fecha_fin', 'Fecha de finalización', 
        		array('required','regex_match[/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/]'),
                array(
                	'regex_match'  	=> 'La %s debe tener el formato año-mes-día (2017-02-15 por ejemplo).',
                	'required'	=> 'Debe ingresar una %s.'
	                )	                
        );

        $this->form_validation->set_rules(
            	'hora_fin', 'hora', 
        		array('required','regex_match[/^(0[1-9]|1[0-2]):[0-5][0-9]$/]'),
                array(
                	'required'	=> 'Debe ingresar la %s.',
                	'regex_match'	=> 'La %s debe tener un formato de hh:mm (02:25 por ejemplo).'
	                )	                
        );

        $this->form_validation->set_rules(
            	'h_f_meridiano', 'meridiano', 
        		array('required'),	        			
                array(
                	'required'	=> 'Debe seleccionar un %s.'
	                )	                
        );

        $this->form_validation->set_rules(
            	'descripcion', 'Descripción', 
        		array('required'),	        			
                array(
                	'required'	=> 'Debe especificar una %s.'
	                )	                
        );

        $this->form_validation->set_rules(
            	'img', 'Imagen', 
        		array('regex_match[/([^s]+(?=.(jpg|gif|png)).2)/]'),	        			
                array(
                	'regex_match'	=> 'En el campo %s sólo se admiten imágenes.'
	                )	                
        );

		if ($this->form_validation->run() == FALSE) {
        	
			$this->load->view('admin/FormularioRegistroEvento', $data);
        }else{

			return false;
		}
	}

	public function SubirImagen($data)
	{		
		$config['upload_path'] = './assets/img/eventos/';
		//$config['file_name'] = $this->input->post('titulo')."_".$this->input->post('fecha_inicio')."_".$this->input->post('fecha_fin');
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';
        $config['overwrite'] = TRUE;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload("imagen")) {

            $data['message'] = $this->upload->display_errors();
            //var_dump($data);
            $this->load->view('admin/FormularioRegistroEvento', $data);
        }else{
        	return false;
        	//echo $this->upload->display_errors();
        }
	}
}