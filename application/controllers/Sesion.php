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

	public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('login') && ($this->uri->segment(1, 0) != '0' || $this->uri->segment(2, 0) != '0')) {
        	redirect(base_url());
        }
        if ($this->session->has_userdata('login') && $this->session->userdata('login') == true && ($this->uri->segment(1, 0) == '0' && $this->uri->segment(2, 0) == '0')) {
        	redirect(base_url('Home')); 
        }
    }

	public function index()
	{		

        $data = array();

        $data['existe_usuario'] = $this->UsuarioModel->ValidarUsuario(array());

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
						
			$this->form_validation->set_rules(
			        'log_cedula', 'Cédula',
			        array('required','numeric','min_length[6]','max_length[8]'),		        	
			        array(		                
			                'min_length'    => 'La %s debe tener al menos 6 caracteres.',
			                'max_length'    => 'La %s debe tener máximo 8 caracteres.',
			                'numeric'     	=> 'La %s sólo debe contener números.',
			                'required'      => 'Debe insertar su %s.'
			        )
			);

            $this->form_validation->set_rules(
	            	'log_password', 'Password', 
	        		array('required','min_length[8]','max_length[16]','alpha_numeric'),	        			
	                array(
	                	'required'		=> 'Debe ingresar su %s.',
	                	'min_length'    => 'El %s debe tener al menos 8 caracteres.',
		                'max_length'    => 'El %s debe tener máximo 16 caracteres.',
		                'numeric'     	=> 'El %s debe ser alfanumérico.'
		                )	                
            );

            if ($this->form_validation->run() == FALSE) {
            	
				$this->load->view('login/index',$data);
            }else{

				$condicion = array(
					"where" => array(
						"cedula" => $this->input->post("log_cedula"),
						"password" => $this->input->post("log_password")
						)
					);
				if ($this->UsuarioModel->ValidarUsuario($condicion)) {
					
					$usuario = $this->UsuarioModel->ExtraerUsuario($condicion)->row();

					if ($usuario->status === "f") {

						$data['mensaje'] = "El usuario ingresado se encuentra inactivo.";

					}elseif (strcmp($usuario->password,$this->input->post('log_password'))===0) {
						
						$data = array(
							"id_usuario" => $usuario->id,
							"fecha_inicio" => date('Y-m-d h:i:s a')
							);

						$id_sesion = $this->SesionModel->Login($data);

						if (!$id_sesion) {
							
							$data['mensaje'] = "Error al intentar iniciar sesión.";

						}else{

							$data = array(
										'idUsuario' => $usuario->id,
										'idSesion' => $id_sesion,
										'username' => $usuario->username,
										'nombre' => $usuario->nombre1,
										'apellido' => $usuario->apellido,
										'login' => true,
										'tipo_usuario' => $usuario->tipo_usuario
									);
							$this->session->set_userdata($data);

							header('Location: '.base_url()."Home");
						}

					}else{

						$data['mensaje'] = "Contraseña incorrecta.";
					}
				}else{
					$data['mensaje'] = "El usuario no existe... Verifique su cédula y contraseña.";
				}

				$this->load->view('login/index', $data);
            }
		}else{
			$this->load->view('login/index',$data);
		}		
	}

	public function Logout()
	{		
		$data = array(
			"campos" => array(
				"fecha_fin" => date('Y-m-d h:i:s a')
				),
			"where" => array(
				"id" => $this->session->userdata('idSesion'),
				"id_usuario" => $this->session->userdata('idUsuario')
				)
			);

		if ($this->SesionModel->Logout($data)) {
			
			$data = array('idUsuario','idSesion','username','nombre','apellido','login','tipo_usuario');
			$this->session->unset_userdata($data);
			$this->session->sess_destroy();
			header('Location: '.base_url());

		}else{
			header('Location: '.base_url().'Home');
		}		
	}

	public function ValidarSesion()
	{

	}

	public function ListarSesiones()
	{
		$condicion = array(
			'select' => 'sesion.id as id, usuario.id as id_usuario, usuario.nombre1 as nombre1, usuario.nombre2 as nombre2, usuario.apellido1 as apellido1, usuario.apellido2 as apellido2, sesion.fecha_inicio as inicio, sesion.fecha_fin as fin',
			'join' => array(
				'table' => 'usuario',
				'condicion' => 'usuario.id = sesion.id_usuario',
				'tipo' => 'left'
				),
			'where' => array("sesion.fecha_fin !=" => null)
			);

		$result = $this->SesionModel->ExtraerSesiones($condicion);
	
		$data["sesiones"] = $result;

		$this->load->view('admin/ListarSesiones', $data);
		
	}
}