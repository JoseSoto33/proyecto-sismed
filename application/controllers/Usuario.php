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

	/**
	 * @todo Comentar el código de este archivo
	 */
	
	public function __construct()
    {
        parent::__construct();

       	if (!$this->session->has_userdata('login') && $this->uri->segment(2, 0) != 'AgregarUsuario') {
        	redirect(base_url());
        }
        if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Administrador" && ($this->uri->segment(2, 0) != 'PerfilUsuario' || $this->uri->segment(2, 0) != 'PasswordChange' || ($this->uri->segment(2, 0) != 'ModificarUsuario' && $this->uri->segment(2, 0) == '0'))) {
        	redirect(base_url('Home')); 
        }
    }

	public function AgregarUsuario()
	{
		$data = array("titulo" => "Agregar nuevo usuario");

		if ($_SERVER["REQUEST_METHOD"] == "POST") {			

            if ($this->ValidarUsuario($data, 0) === false) {

            	$ruta 		= './assets/img/usuarios/';
            	$espec = $this->input->post("especialidad");

            	switch ($espec) {
            		case 'Administrador':
            			$ruta .="admin/";
            			break;  

            		case 'Medicina':
            			$ruta .="med/";
            			break; 

            		case 'Odontología':
            			$ruta .="odon/";
            			break; 

            		case 'Laboratorio':
            			$ruta .="lab/";
            			break; 

            		case 'Nutrición':
            			$ruta .="nut/";
            			break; 
            	}

		        $nombre 	= base64_encode($this->input->post('username'))."_".base64_encode($this->input->post('cedula'));
		        $file_info 	= $this->ImagenModel->SubirImagen($data,$ruta,$nombre);

		        if ($file_info != false) {

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
									set_cookie("message","El usuario <strong>'".$this->input->post('username')."'</strong> fue registrado exitosamente!...", time()+15);
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
		        }

	            if ($this->input->post("origen") === "login") {
								
					$this->load->view('login/index', $data);
				}else{
					
					$this->load->view('admin/FormularioRegistroUsuario', $data);
				}
			}

		}else{

			$this->load->view('admin/FormularioRegistroUsuario', $data);
		}
	}

	public function ModificarUsuario($id_usuario = null)
	{
		$data = array("titulo" => "Modificar datos de usuario");

		$cond = array(
				"where" => array(
					"MD5(concat('sismed',id))" => $id_usuario
					)
				);

		$result = $this->UsuarioModel->ExtraerUsuario($cond);

		if ($result->num_rows() > 0) {
			
			$data['usuario'] = $result->row_array();

			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				if ($this->ValidarUsuario($data, 1) === false) {
	            	
	            	if (isset($_POST['img-change']) && isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != '' ) {
	            		//return "bandera";
	            		//var_dump($_FILES);
		            	$ruta 		= './assets/img/usuarios/';

		            	$espec = $this->input->post("especialidad");

		            	switch ($espec) {
		            		case 'Administrador':
		            			$ruta .="admin/";
		            			break;  

		            		case 'Medicina':
		            			$ruta .="med/";
		            			break; 

		            		case 'Odontología':
		            			$ruta .="odon/";
		            			break; 

		            		case 'Laboratorio':
		            			$ruta .="lab/";
		            			break; 

		            		case 'Nutrición':
		            			$ruta .="nut/";
		            			break; 
		            	}
            	
				        $nombre 	= base64_encode($this->input->post('username'))."_".base64_encode($this->input->post('cedula'));
				        $file_info 	= $this->ImagenModel->SubirImagen($data,$ruta,$nombre);

				        if ($file_info != false) {
				        	$data['usuario']['img'] = $file_info['file_name'];
				        }
	            	}

			        if (!isset($file_info) || (isset($file_info) && $file_info != false)) {

	            		$fecha_nacimiento = $this->input->post('fecha_nacimiento');
	            		$dif_Fnacimiento_Factual = $this->EventoModel->CompararFechas($fecha_nacimiento,date("Y-m-d"));

		            	if ($dif_Fnacimiento_Factual < 0) {
		            			
		            		$condicion = array(
		            				"where" => array(
		            					"nombre1" => $this->input->post("nombre1"),
		            					"nombre2" => $this->input->post("nombre2"),
		            					"apellido1" => $this->input->post("apellido1"),
		            					"apellido2" => $this->input->post("apellido2"),
		            					"MD5(concat('sismed',id)) !=" => $id_usuario
		            					)
		            			);	            		         		

		            		if (!$this->UsuarioModel->ValidarUsuario($condicion)) {
		            			
		            			$condicion = array(
		            				"data" => array(
							     			"cedula" => $this->input->post('cedula'),
							     			"nombre1" => $this->input->post('nombre1'),
							     			"nombre2" => $this->input->post('nombre2'),
							     			"apellido1" => $this->input->post('apellido1'),
							     			"apellido2" => $this->input->post('apellido2'),
							     			"sexo" => $this->input->post('sexo'),
							     			"fecha_nacimiento" => $this->input->post('fecha_nacimiento'),
							     			"direccion" => $this->input->post('direccion'),
							     			"telf_personal" => $this->input->post('telef_personal'),
							     			"telf_emergencia" => $this->input->post('telef_emergencia'),
							     			"email" => $this->input->post('email'),
							     			"username" => $this->input->post('username'),
							     			"grado_instruccion" => $this->input->post('grado_instruccion'),
							     			"especialidad" => $this->input->post('especialidad'),
							     			"tipo_usuario" => $this->input->post('tipo_usuario'),
					                		"img" =>  $data['usuario']['img']
							     		),
		            				"where" => array("MD5(concat('sismed',id))" => $id_usuario)
		            			);

								if ($this->UsuarioModel->ModificarUsuario($condicion)) {
									
									set_cookie("message","Datos del usuario <strong>'".$this->input->post('username')."'</strong> modificados exitosamente!...", time()+15);
									header("Location: ".base_url()."Usuario/ListarUsuarios");
								}else{
									$data['mensaje'] = $this->db->error();
								}
		            		}

		            	}elseif ($dif_Fnacimiento_Factual >= 0) {

		            		$data['mensaje'] = "La fecha de nacimiento no puede ser igual ni superior a la actual.";
		            	}elseif ($dif_Fnacimiento_Factual === true) {
		                
			                $data['mensaje'] = "La fecha de nacimiento no es válida.";
			            }elseif ($dif_Fnacimiento_Factual === false) {
			                
			                $data['mensaje'] = "La fecha actual del servidor no es válida.";
			            } 

			        }else{
		        		$data['mensaje'] = $this->upload->display_errors();	
		        	}         				
				}
			}

		}else{
			$data['message'] = $this->db->error();
		}
		
		$this->load->view('admin/FormularioRegistroUsuario', $data);
	}

	public function PasswordChange()
	{
		$data = array("titulo" => "Cambio de contraseña");

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			if ($this->ValidarPasswordUsuario($data) === false) {

				$condicion = array(
    				"data" => array(
			     			"password" => $this->input->post('password')
			     		),
    				"where" => array("id" => $this->session->userdata('idUsuario'))
    			);

				if ($this->UsuarioModel->ModificarUsuario($condicion)) {
					
					$this->session->set_userdata('first_session', false);			
					header("Location: ".base_url()."Home");
				}else{
					$data['mensaje'] = $this->db->error();
				}
			}
		}

		$this->load->view('admin/FormularioCambioClave', $data);
	}

	public function EliminarUsuario()
	{
		$id = $this->input->post('id');
		$action = $this->input->post('action');
		$condicion = array(
			'where' => array("MD5(concat('sismed',id))" => $id)
			);

		if ($action == "habilitar") {
			$condicion['data'] = array('status' => true);
		}else{
			$condicion['data'] = array('status' => false);
		}

		if ($this->UsuarioModel->ModificarUsuario($condicion)) {
			
			$data['result']  = true;
			$data['message'] = "Operación exitosa!...";
		}else{
			$data['result']  = false;
			$data['message'] = "Error: Ha ocurrido un problema durante la eliminación.\n".$this->db->error();
		}
		
		echo json_encode($data);
	}

	public function PerfilUsuario($id = null)
	{
		if (!isset($id) || empty($id)) {
			$id = $this->session->userdata('id');
		}

		$condicion = array(
			'where' => array("MD5(concat('sismed',id))" => $id)
			);

		$result = $this->UsuarioModel->ExtraerUsuario($condicion);
		if ($result->num_rows() > 0) {
			
			$data['usuario'] = $result->row_array();
		}else{
			$data['message'] = $this->db->error();
		}

		$condicion = array(
			'where' => array(
					"fecha_fin !=" => null,
					"MD5(concat('sismed',id_usuario))" => $id
					)
			);

		$result = $this->SesionModel->ExtraerSesiones($condicion);
			
		$data['sesiones'] = $result;

		$this->load->view('admin/PerfilUsuario', $data);
	}

	public function ListarUsuarios()
	{
		$condicion = array(
			"select" => "id, cedula, username, nombre1, nombre2, apellido1, apellido2, especialidad, status",
			"where" => array("id !=" => $this->session->userdata('idUsuario')),
			"order_by" => array("campo" => "id", "direccion" => "ASC")
			);

		$data = array();

		$result = $this->UsuarioModel->ExtraerUsuario($condicion);
	
		$data["usuarios"] = $result;

		$this->load->view('admin/ListarUsuarios', $data);
		
	}

	public function ValidarUsuario($data, $operacion)
	{

		$cedula_validacion = array('required','numeric','min_length[6]','max_length[8]');
		$cedula_respuestas = array(		                
		                'min_length'    => 'La %s debe tener al menos 6 caracteres.',
		                'max_length'    => 'La %s debe tener máximo 8 caracteres.',
		                'numeric'     	=> 'La %s sólo debe contener números.',
		                'required'      => 'Debe insertar su %s.'
		        	);

		$email_validacion = array('required','valid_email');
		$email_respuestas = array(
                	'valid_url'	=> 'El %s no es válido.',
                	'required'	=> 'Debe ingresar su %s.'
	                );

		if ($operacion == 0) {

			$cedula_validacion[] = 'is_unique[usuario.cedula]';
			$cedula_respuestas['is_unique'] = 'La %s ya ha sido registrada anteriormente.';

			$email_validacion[] = 'is_unique[usuario.email]';
			$email_respuestas['is_unique'] = 'El %s ya ha sido registrado anteriormente.';

		}elseif ($operacion == 1 && isset($data['usuario'])) {

			if (strcmp($data['usuario']['cedula'], $_POST['cedula']) != 0) {
				
				$cedula_validacion[] = 'is_unique[usuario.cedula]';
				$cedula_respuestas['is_unique'] = 'La %s ya ha sido registrada anteriormente.';
			}

			if (strcmp($data['usuario']['email'], $_POST['email']) != 0) {
				
				$email_validacion[] = 'is_unique[usuario.email]';
				$email_respuestas['is_unique'] = 'El %s ya ha sido registrado anteriormente.';
			}

		}

		$this->form_validation->set_rules('cedula', 'Cédula',$cedula_validacion,$cedula_respuestas);
		
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
		        array('regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s sólo puede contener caracteres alfabéticos sin espacios.'
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
		        array('regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s sólo puede contener caracteres alfabéticos sin espacios.'
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

		$this->form_validation->set_rules('email', 'Correo electrónico',$email_validacion, $email_respuestas);
       
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
        	//var_dump($data);
        	//var_dump($_POST);
        	if ($this->input->post("origen") === "login") {					
					
				$this->load->view('login/index');
			}else{
				
				$this->load->view('admin/FormularioRegistroUsuario', $data);
			}
			
        }else{
        	return false;
        }
	}

	public function ValidarPasswordUsuario($data)
	{
		
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

		if ($this->form_validation->run() == FALSE) {
        	
			$this->load->view('admin/FormularioCambioClave', $data);
        }else{
        	return false;
        }
	}
}