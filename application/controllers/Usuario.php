<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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

       	if (!$this->session->has_userdata('login') && $this->uri->segment(2, 0) != 'AgregarUsuario') {
        	redirect(base_url());
        }
        if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Administrador" && $this->uri->segment(2, 0) != 'PerfilUsuario') {
        	redirect(base_url('Home')); 
        }
    }

	public function AgregarUsuario()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$this->form_validation->set_rules(
			        'cedula', 'Cédula',
			        array('required','numeric','min_length[6]','max_length[8]','is_unique[usuario.cedula]'),		        	
			        array(		                
			                'min_length'    => 'La %s debe tener al menos 6 caracteres.',
			                'max_length'    => 'La %s debe tener máximo 8 caracteres.',
			                'numeric'     	=> 'La %s sólo debe contener números.',
			                'is_unique'     => 'La %s ya ha sido registrada anteriormente.',
			                'required'      => 'Debe insertar su %s.'
			        )
			);

			$this->form_validation->set_rules(//'regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/]'
			        'nombre1', 'Primer nombre',
			        array('required','regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
			        array(   
		                'regex_match'  	=> 'El %s sólo puede contener caracteres alfabéticos sin espacios.',
		                'required'  => 'Debe ingresar su %s.'
			        )
			);

			$this->form_validation->set_rules(//'regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/]'
			        'nombre2', 'Segundo nombre',
			        array('required','regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
			        array(   
		                'regex_match'  	=> 'El %s sólo puede contener caracteres alfabéticos sin espacios.',
		                'required'  => 'Debe ingresar su %s.'
			        )
			);

			$this->form_validation->set_rules(//'regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/]'
			        'apellido1', 'Primer apellido',
			        array('required','regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
			        array(   
		                'regex_match'  	=> 'El %s sólo puede contener caracteres alfabéticos sin espacios.',
		                'required'  => 'Debe ingresar su %s.'
			        )
			);

			$this->form_validation->set_rules(//'regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/]'
			        'apellido2', 'Segundo apellido',
			        array('required','regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
			        array(   
		                'regex_match'  	=> 'El %s sólo puede contener caracteres alfabéticos sin espacios.',
		                'required'  => 'Debe ingresar su %s.'
			        )
			);

			$this->form_validation->set_rules(
	            	'fecha_nacimiento', 'Fecha de nacimiento', 
	        		array('required','regex_match[/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/]'),
	                array(
	                	'regex_match'  	=> 'La %s debe tener el formato año-mes-día (2017-02-15 por ejemplo).',
	                	'required'	=> 'Debe ingresar una %s.'
		                )	                
            );

            $this->form_validation->set_rules(
	            	'email', 'Correo electrónico', 
	        		array('required','valid_email','is_unique[usuario.email]'),
	                array(
	                	'valid_url'	=> 'El %s no es válido.',
			            'is_unique' => 'El %s ya ha sido registrado anteriormente.',
	                	'required'	=> 'Debe ingresar su %s.'
		                )	                
            );

            $this->form_validation->set_rules(
	            	'telef_personal', 'Teléfono personal', ///^\(0(2[0-9]{2}|412|414|416|424|426)\) [0-9+]{3}-[0-9]{2}-[0-9]{2}/
	        		array('required','regex_match[/^\(0(2[0-9]{2}|412|414|416|424|426)\) [0-9+]{3}-[0-9]{2}-[0-9]{2}/]'),
	                array(
	                	'regex_match'  	=> 'Su %s debe tener un código de área válido y el formato de ejemplo: (0212) 555-45-02.',
	                	'required'	=> 'Debe ingresar su %s.'
		                )	                
            );

            $this->form_validation->set_rules(
	            	'telef_emergencia', 'Teléfono de emergencia', ///^\(0(2[0-9]{2}|412|414|416|424|426)\) [0-9+]{3}-[0-9]{2}-[0-9]{2}/
	        		array('regex_match[/^\(0(2[0-9]{2}|412|414|416|424|426)\) [0-9+]{3}-[0-9]{2}-[0-9]{2}/]'),
	                array(
	                	'regex_match'  	=> 'Su %s debe tener un código de área válido y el formato de ejemplo: (0212) 555-45-02).'
		                )	                
            );

            $this->form_validation->set_rules(
	            	'sexo', 'Sexo', 
	        		array('required'),
	                array(
	                	'required'	=> 'Debe ingresar su %s.'
		                )	                
            );

            $this->form_validation->set_rules(
	            	'direccion', 'Direccion de habitación',
	        		array('required'),
	                array(
	                	'required'	=> 'Debe ingresar su %s.'
		                )	                
            );

            $this->form_validation->set_rules(
			        'username', 'Username',
			        array('required','min_length[8]','max_length[16]','regex_match[/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+/]'),		        	
			        array( 
			        	'min_length'    => 'El %s debe tener al menos 8 caracteres.',
			            'max_length'    => 'El %s debe tener máximo 16 caracteres.',
		                'regex_match'  	=> 'El %s es alfanumérico... sólo puede contener letras  y números.',
		                'required'   	=> 'Debe insertar un %s.'
			        )
			);

			$this->form_validation->set_rules(
			        'especialidad', 'Especialidad',
			        array('required'),		        	
			        array( 
			        	'required'   	=> 'Debe seleccionar una %s.'
			        )
			);

			$this->form_validation->set_rules(
			        'password', 'Contraseña',
			        array('required','min_length[8]','max_length[16]','regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,16}$/]'),		        	
			        array( 
			        	'min_length'    => 'La %s debe tener al menos 8 caracteres.',
			            'max_length'    => 'La %s debe tener máximo 16 caracteres.',
		                'regex_match'  	=> 'La %s no pueden contener caracteres especiales, sólo debe contener al menos una letra mayúscula, al menos una letra minúscula y al menos un número.',
		                'required'   	=> 'Debe insertar un %s.'
			        )
			);

			$this->form_validation->set_rules(
			        'password2', 'Contraseña de confirmación',
			        array('required','matches[password]','min_length[8]','max_length[16]','regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,16}$/]'),		        	
			        array( 
			        	'min_length'    => 'La %s debe tener al menos 8 caracteres.',
			            'max_length'    => 'La %s debe tener máximo 16 caracteres.',
		                'regex_match'  	=> 'La %s no pueden contener caracteres especiales, sólo debe contener al menos una letra mayúscula, al menos una letra minúscula y al menos un número.',
		                'matches'   	=> 'La %s no coinside.',
		                'required'   	=> 'Debe insertar un %s.'
			        )
			);

			$this->form_validation->set_rules(
			        'tipo_usuario', 'Tipo de usuario',
			        array('required'),		        	
			        array( 
			        	'required'   	=> 'Debe seleccionar un %s.'
			        )
			);

			$this->form_validation->set_rules(
			        'grado_instruccion', 'Grado de instrucción',
			        array('required'),		        	
			        array( 
			        	'required'   	=> 'Debe seleccionar un %s.'
			        )
			);
			
			if ($this->form_validation->run() == FALSE) {
            	
            	if ($this->input->post("origen") === "login") {
					
					/*$error = $this->form_validation->error_string();
					var_dump($error);*/
					$this->load->view('login/index');
				}else{
					
					$this->load->view('admin/FormularioRegistroUsuario');
				}
            }else{

            	$fecha_nacimiento = $this->input->post('fecha_nacimiento');
            	$dif_Fnacimiento_Factual = $this->EventoModel->CompararFechas($fecha_nacimiento,date("Y-m-d"));

            	if ($dif_Fnacimiento_Factual < 0) {
            		
            		$condicion = array(
            				'where' => array(
            					'nombre1' => $this->input->post('nombre1'),
            					'nombre2' => $this->input->post('nombre2'),
            					'apellido1' => $this->input->post('apellido1'),
            					'apellido2' => $this->input->post('apellido2')
            					)
            			);
            		if (!$this->UsuarioModel->ValidarUsuario($condicion)) {
            			# code...
						if ($this->UsuarioModel->AgregarUsuario()) {
							
							if ($this->input->post("origen") === "login") {
								
								header("Location: ".base_url());
							}else{
								header("Location: ".base_url()."Usuario/ListarUsuarios");
							}
						}else{
							$data['mensaje'] = $this->db->error();
						}
            		}else{
            			$data['mensaje'] = "Ya existe un usuario registrado con ambos nombres y apellidos.";
            		}

            	}elseif ($dif_Fnacimiento_Factual >= 0) {

            		$data['mensaje'] = "La fecha de nacimiento no puede ser igual ni superior a la actual.";
            	}elseif ($dif_Fnacimiento_Factual === true) {
                
	                $data['mensaje'] = "La fecha de nacimiento no es válida.";
	            }elseif ($dif_Fnacimiento_Factual === false) {
	                
	                $data['mensaje'] = "La fecha actual del servidor no es válida.";
	            }

	            if ($this->input->post("origen") === "login") {
								
					$this->load->view('login/index', $data);
				}else{
					
					$this->load->view('admin/FormularioRegistroUsuario', $data);
				}
			}

		}else{

			$this->load->view('admin/FormularioRegistroUsuario');
		}
	}

	public function ModificarUsuario()
	{

	}

	public function EliminarUsuario()
	{

	}

	public function PerfilUsuario()
	{

	}

	public function ListarUsuarios()
	{
		$condicion = array(
			"select" => "id, cedula, nombre1, apellido1, especialidad, status",
			"where" => array("id !=" => $this->session->userdata('idUsuario'))
			);

		$data = array();

		$result = $this->UsuarioModel->ExtraerUsuario($condicion);
	
		$data["usuarios"] = $result;
		$this->load->view('admin/ListarUsuarios', $data);
		
	}

	public function ValidarUsuario()
	{

	}
}