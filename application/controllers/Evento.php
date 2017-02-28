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

			if ($this->form_validation->run() == FALSE) {
            	
				$this->load->view('admin/FormularioRegistroEvento');
            }else{

				$data = array();

				$fecha_inicio = $this->input->post('fecha_inicio');
				$fecha_fin 	 = $this->input->post('fecha_fin');

				$hora_inicio = $this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano');
        		$hora_fin 	 = $this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano');

        		$data = $this->EventoModel->ValidarFechaHora($fecha_inicio, $fecha_fin, $hora_inicio, $hora_fin);

        		if ($data['status'] === true) {
        			
        			$condicion = array(
		        			'where' => array(
		        				'titulo' => $this->input->post('titulo'),
		        				'fecha_hora_inicio' => $this->input->post('fecha_inicio')." ".$this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano'),
		        				'fecha_hora_fin' => $this->input->post('fecha_fin')." ".$this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano')
		        				)
		        			);
        			if (!$this->EventoModel->ValidarEvento($condicion)) {
        				
	        			if ($this->EventoModel->AgregarEvento()) {

	        				set_cookie("message","El evento <strong>'".$this->input->post('titulo')."'</strong> fue registrado exitosamente!...", time()+15);
							header("Location: ".base_url()."Evento/ListarEventos");

						}else{
							$data['mensaje'] = $this->db->error();
							$this->load->view('admin/FormularioRegistroEvento', $data);
						}
        			}else{
        				$data['mensaje'] = "Ya existe un evento registrado con el mismo título y fechas de inicio y fin.";
						$this->load->view('admin/FormularioRegistroEvento', $data);
        			}
        		}else{

        			$this->load->view('admin/FormularioRegistroEvento', $data);
        		}
			}
		}else{

			$this->load->view('admin/FormularioRegistroEvento');
		}
	}

	public function ModificarEvento($id)
	{

	}

	public function EliminarEvento()
	{
		$id = $this->input->post('id');
		$condicion = array(
			'where' => array("MD5(concat('sismed',id))" => $id)
			);

		if ($this->EventoModel->EliminarEvento($condicion)) {
			
			$data['result']  = true;
			$data['message'] = "Eliminación exitosa!\n Espere mientras recarga la página...";
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
			$fecha_fin 	  = strftime('%d de %B de %Y', strtotime($data["fecha_hora_inicio"]));		
			$hora_inicio  = date('h:i:s a', strtotime($data["fecha_hora_fin"]));		
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

	public function ValidarEvento()
	{

	}
}