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

        		/*$data['mensaje'] = "Diferencia fecha inicio - fecha actual: ".$dif_FInicio_Factual."<br>";
        		$data['mensaje'] .= "Diferencia fecha fin - fecha actual: ".$dif_FFin_Factual."<br>";
        		$data['mensaje'] .= "Diferencia fecha inicio - fecha fin: ".$dif_FInicio_fin."<br>";
        		$data['mensaje'] .= "Diferencia hora inicio - hora fin: ".$difhoras."<br>";*/

				/*if ($this->EventoModel->CompararFechas($this->input->post('fecha_inicio'),date("Y-m-d")) === true) {
					$data['mensaje'] = "La fecha de inicio no es válida";
				}elseif ($this->EventoModel->CompararFechas($this->input->post('fecha_inicio'),date("Y-m-d")) === false) {
					$data['mensaje'] = "La fecha actual no es válida";
				}elseif ($this->EventoModel->CompararFechas($this->input->post('fecha_inicio'),date("Y-m-d")) >= 0){
					$data['mensaje'] = "Permitido";
				}else{
					$data['mensaje'] = $this->EventoModel->CompararFechas($this->input->post('fecha_inicio'),date("Y-m-d"));
				}*/

				//$data['mensaje'] = $this->EventoModel->CompararFechas($this->input->post('fecha_inicio'),date("Y-m-d"));

				
					/*
					if ($this->EventoModel->AgregarEvento()) {

						header("Location: ".base_url()."Evento/ListarEventos");

					}else{
						$data['mensaje'] = $this->db->error();
						$this->load->view('admin/FormularioRegistroEvento', $data);
					}*/
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