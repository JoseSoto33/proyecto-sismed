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

       	if (!$this->session->has_userdata('login') && ($this->uri->segment(2, 0) != 'AgregarUsuario' && $this->uri->segment(2, 0) != 'PasswordChange')) {
        	redirect(base_url());
        }
        if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Administrador" && $this->uri->segment(2, 0) != 'PerfilUsuario' && $this->uri->segment(2, 0) != 'ModificarUsuario' && $this->uri->segment(2, 0) == '0') {
        	redirect(base_url('Home')); 
        }
    }

    /**
     * @method void AgregarUsuario()
     * @method void ModificarUsuario(integer $id_usuario)
     * @method void PasswordChange()
     * @method void EliminarUsuario()
     * @method void PerfilUsuario(integer $id)
     * @method void ListarUsuarios()
     * @method void|boolean ValidarUsuario(mixed[] $data, integer $operacion)
     * @method void|boolean ValidarPasswordUsuario(mixed[] $data)
     */

    /**
     * Muestra la interfaz del formulario para registrar un nuevo usuario, o registra un nuevo 
     * usuario en la base de datos, si se llama a este método mediante una petición POST.
     *
     * El usuario registrado tendrá por defecto la contraseña 'User1234'. Deberá cambiarla la próxima vez 
     * que inicie seción.
     *
     * @return void
     */
	public function AgregarUsuario()
	{
		$this->load->model('UsuarioModel');
		$this->load->model('EventoModel');
		$this->load->model('ImagenModel');
		$data = array("titulo" => "Agregar nuevo usuario");

		//Si se envió una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {			

			//Si los datos de registro son correctos...
            if ($this->ValidarUsuario($data, 0) === false) {

            	$ruta 		= './assets/img/usuarios/';
            	$espec = $this->input->post("especialidad");

            	//Dependiendo de la especialidad del usuario a registrar...
            	switch ($espec) {
					//Si la especialidad es 'Administrador'
            		case 'Administrador':
            			$ruta .="admin/";
            			break;  

					//Si la especialidad es 'Medicina'
            		case 'Medicina':
            			$ruta .="med/";
            			break; 

					//Si la especialidad es 'Odontología'
            		case 'Odontología':
            			$ruta .="odon/";
            			break; 

					//Si la especialidad es 'Laboratorio'
            		case 'Laboratorio':
            			$ruta .="lab/";
            			break; 

					//Si la especialidad es 'Nutrición'
            		case 'Nutrición':
            			$ruta .="nut/";
            			break; 
            	}

		        $nombre 	= base64_encode($this->input->post('username'))."_".base64_encode($this->input->post('cedula'));
		        $file_info 	= $this->ImagenModel->SubirImagen($data,$ruta,$nombre);

            	$fecha_nacimiento = $this->input->post('fecha_nacimiento');
            	$dif_Fnacimiento_Factual = $this->EventoModel->CompararFechas($fecha_nacimiento,date("Y-m-d"));

            	//Si la fecha de nacimiento es válida (menor a la fecha actual)...
            	if ($dif_Fnacimiento_Factual < 0) {
            		
            		$condicion = array(
            				'where' => array(
            					'nombre1' => $this->input->post('nombre1'),
            					'nombre2' => $this->input->post('nombre2'),
            					'apellido1' => $this->input->post('apellido1'),
            					'apellido2' => $this->input->post('apellido2')
            					)
            			);

            		//No exiten usuarios con datos idénticos al que se está registrando...
            		if ($this->UsuarioModel->ValidarUsuario($condicion) === false) {
            			
            			//Si se realiza el registro exitosamente en la base de datos...
						if ($this->UsuarioModel->AgregarUsuario($file_info)) {
							
							set_cookie("message","El usuario <strong>'".$this->input->post('username')."'</strong> fue registrado exitosamente!...", time()+15);

							//Si el registro de usuario se realiza desde la vista del login...
							if ($this->input->post("origen") === "login") {
								
								header("Location: ".base_url());

							//Si se registra desde una sesión de administrador...
							}else{
								header("Location: ".base_url()."Usuario/ListarUsuarios");
							}
						//Si ocurre un error durante el registro en base de datos...
						}else{
							$data['mensaje'] = $this->db->error();
						}
					//Si los datos a registrar coinsiden con los de un usuario existente...
            		}else{
            			$data['mensaje'] = "Ya existe un usuario registrado con ambos nombres y apellidos.";
            		}

        		//Si no, si la fecha de nadimiento es mayor a la fecha actual...
            	}elseif ($dif_Fnacimiento_Factual >= 0) {

            		$data['mensaje'] = "La fecha de nacimiento no puede ser igual ni superior a la actual.";

        		//Si no, si existe un error en la fecha de nacimiento...
            	}elseif ($dif_Fnacimiento_Factual === true) {
                
	                $data['mensaje'] = "La fecha de nacimiento no es válida.";

                //Si no, si existe un error en la fecha actual...
	            }elseif ($dif_Fnacimiento_Factual === false) {
	                
	                $data['mensaje'] = "La fecha actual del servidor no es válida.";
	            }

		        //Si se está registrando un usuario desde la vista del login...
	            if ($this->input->post("origen") === "login") {
							
					$this->load->view('login/index', $data);//Se carga la vista del login

				//Si se está registrando un usuario desde una sesión de administración...
				}else{					
					$this->load->view('admin/header');
					$this->load->view('admin/FormularioRegistroUsuario', $data);//Se carga la vista del formulario de registro de usuario
					$this->load->view('admin/footer');
				}
			}

		//Si no se hizo POST...
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/FormularioRegistroUsuario', $data);//Se carga la vista del formulario de registro de usuario
			$this->load->view('admin/footer');
		}
	}

	/**
	 * Muestra el formulario para modificar los datos de un usaurio, o realiza la modificación de los datos si se llama a éste método mediante un POST
	 *
	 * @param null|integer $id_usuario Identificador único del usuario
	 *
	 * @return void
	 */
	public function ModificarUsuario($id_usuario = null)
	{
		$this->load->model('UsuarioModel');
		$this->load->model('EventoModel');
		$this->load->model('ImagenModel');

		$data = array("titulo" => "Modificar datos de usuario");

		if ($id_usuario == null) {
			$id_usuario = md5('sismed'.$this->session->userdata('idUsuario'));
		}

		$cond = array(
				"where" => array(
					"MD5(concat('sismed',id))" => $id_usuario
					)
				);

		$result = $this->UsuarioModel->ExtraerUsuario($cond);

		//Si los registros encontrados son más de 0...
		if ($result->num_rows() > 0) {
			
			$data['usuario'] = $result->row_array();

			//Si se envía una petición POST...
			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				//Si los datos del usuario son válidos...
				if ($this->ValidarUsuario($data, 1) === false) {
	            		
					//Si se cambió la imagen del usuario...
	            	if (isset($_POST['img-change']) && isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != '' ) {
	            		
		            	$ruta = './assets/img/usuarios/';

		            	$espec = $this->input->post("especialidad");

		            	//Dependiendo de la especialidad del usaurio...
		            	switch ($espec) {
							//Si la especialidad es 'Administrador'		            		
		            		case 'Administrador':
		            			$ruta .="admin/";
		            			break;  

							//Si la especialidad es 'Medicina'
		            		case 'Medicina':
		            			$ruta .="med/";
		            			break; 

							//Si la especialidad es 'Odontología'
		            		case 'Odontología':
		            			$ruta .="odon/";
		            			break; 

							//Si la especialidad es 'Laboratorio'
		            		case 'Laboratorio':
		            			$ruta .="lab/";
		            			break; 

							//Si la especialidad es 'Nutrición'
		            		case 'Nutrición':
		            			$ruta .="nut/";
		            			break; 
		            	}
            	
				        $nombre 	= base64_encode($this->input->post('username'))."_".base64_encode($this->input->post('cedula'));
				        $file_info 	= $this->ImagenModel->SubirImagen($data,$ruta,$nombre);

				        //Si se cargó el archivo...
				        if ($file_info != false) {
				        	$data['usuario']['img'] = $file_info['file_name'];
				        }
	            	}

	            	//Si el archivo está declarado...
			        if (!isset($file_info) || (isset($file_info) && $file_info != false)) {

	            		$fecha_nacimiento = $this->input->post('fecha_nacimiento');
	            		$dif_Fnacimiento_Factual = $this->EventoModel->CompararFechas($fecha_nacimiento,date("Y-m-d"));

	            		//Si la fecha de nacimiento es correcta (si es anterior a la fecha actual)...
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

		            		//Si no existe otro usuario con datos idénticos a los ingresados...
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

		            			//Si se realiza la modificación exitosamente...
								if ($this->UsuarioModel->ModificarUsuario($condicion)) {
												
									if ($this->session->userdata('idUsuario') == $data['usuario']['id']) {

										set_cookie("message","Se han modificado tus datos personales exitosamente exitosamente!...", time()+15);
										header("Location: ".base_url()."Usuario/PerfilUsuario");
									}else{
										set_cookie("message","Datos del usuario <strong>'".$this->input->post('username')."'</strong> modificados exitosamente!...", time()+15);
										header("Location: ".base_url()."Usuario/ListarUsuarios");
									}

								//Si ocurre un error durante la modificación...
								}else{
									$data['mensaje'] = $this->db->error();
								}
		            		}
	            		//Si no, si la fecha de nacimiento es posterior a la fecha actual...
		            	}elseif ($dif_Fnacimiento_Factual >= 0) {

		            		$data['mensaje'] = "La fecha de nacimiento no puede ser igual ni superior a la actual.";

	            		//Si no, si existe un error en la fecha de nacimiento...
		            	}elseif ($dif_Fnacimiento_Factual === true) {
		                
			                $data['mensaje'] = "La fecha de nacimiento no es válida.";

		                //Si no, si existe un error en la fecha actual...
			            }elseif ($dif_Fnacimiento_Factual === false) {
			                
			                $data['mensaje'] = "La fecha actual del servidor no es válida.";
			            } 

		            //Si no se pudo declarar el archivo...
			        }else{
		        		$data['mensaje'] = $this->upload->display_errors();	
		        	}         				
				}
			}
		//Si no se encontraron registros...
		}else{
			$data['message'] = $this->db->error();
		}
		
		$this->load->view('admin/header');
		$this->load->view('admin/FormularioRegistroUsuario', $data);//Se carga la vista del formulario para modificar un usuario...
		$this->load->view('admin/footer');
	}

	/**
	 * Muestra el formulario para cambiar la contraseña de usuario, o realiza la modificación de la contraseña si se llama a éste método mediante un POST
	 *
	 * @return void
	 */
	public function PasswordChange($id_usuario)
	{
		$this->load->model('UsuarioModel');

		$data = array("titulo" => "Cambio de contraseña");
		$update = true;

		//Si se envía una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			//Si los datos fueron ingresados correctamente...
			if ($this->ValidarPasswordUsuario($data) === false) {

				$condicion = array(
    				"data" => array(
			     			"password" => $this->input->post('password1')
			     		),
    				"where" => array("MD5(concat('sismed',id))" => $id_usuario)
    			);

				if ($this->session->has_userdata("login")) {
					
					$cond = array(
						"where" => array(
							"id" => $this->session->userdata("idUsuario"),
							"password" => $this->input->post("password0")
							)
						);

					if (!$this->UsuarioModel->ValidarUsuario($cond)) {
						
						$udate = false;
						$data['mensaje'] = "Error: Contraseña incorrecta, verifíquela e intente nuevamente...";
					}

				}else{

					$condicion["data"]["first_session"] = false;
				}

				if ($update === true) {
					
					//Si la modificación se realiza con éxito...
					if ($this->UsuarioModel->ModificarUsuario($condicion)) {
						/*
						$this->session->set_userdata('first_session', false);			
						header("Location: ".base_url()."Home");*/
						if ($this->session->has_userdata("login")) {
							redirect(base_url()."Home");
						}else{

							redirect(base_url()."Sesion/Login/".$id_usuario);
						}

					//Si ocurre un error durante la modificación...
					}else{
						$data['mensaje'] = $this->db->error();
					}
				}
				$this->load->view('admin/header');
				$this->load->view('admin/FormularioCambioClave0', $data);//Cargar vista de formulario de modificación de contraseña
				$this->load->view('admin/footer');
			}
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/FormularioCambioClave0', $data);//Cargar vista de formulario de modificación de contraseña
			$this->load->view('admin/footer');
		}

	}

	/**
	 * Cambia el estatus de un usuario determinado de activo a inactivo y viceversa 
	 *
	 * @return void
	 */
	public function EliminarUsuario()
	{
		$this->load->model('UsuarioModel');

		$id = $this->input->post('id');
		$action = $this->input->post('action');
		$condicion = array(
			'where' => array("MD5(concat('sismed',id))" => $id)
			);

		//Si la acción a realizar es 'habilitar'...
		if ($action == "habilitar") {
			$condicion['data'] = array('status' => true);

		//Si la acción a realizar es 'inhabilitar'...
		}else{
			$condicion['data'] = array('status' => false);
		}

		//Si la modificación se realiza con éxito...
		if ($this->UsuarioModel->ModificarUsuario($condicion)) {
			
			$data['result']  = true;
			$data['message'] = "Operación exitosa!...";

		//Si ocurre un error durante la modificación...
		}else{
			$data['result']  = false;
			$data['message'] = "Error: Ha ocurrido un problema durante la eliminación.\n".$this->db->error();
		}
		
		echo json_encode($data);
	}

	/**
	 * Muestra la información detallada de un usuario
	 *
	 * @param null|integer $id Identificador único de un usuario
	 *
	 * @return void
	 */
	public function PerfilUsuario($id = null)
	{
		$this->load->model('UsuarioModel');
		$this->load->model('SesionModel');

		//Si no se envió un id por parámetro...
		if ($id == null) {
			$id = md5('sismed'.$this->session->userdata('idUsuario'));
		}

		$condicion = array(
			'where' => array("MD5(concat('sismed',id))" => $id)
			);

		$result = $this->UsuarioModel->ExtraerUsuario($condicion);

		//Si se consigue al usuario en la base de datos...
		if ($result->num_rows() > 0) {
			
			$data['usuario'] = $result->row_array();

		//Si no se consigue al usuario en la base de datos...
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

		$this->load->view('admin/PerfilUsuario', $data);//Se carga la vista del perfil de usuario
	}

	/**
	 * Muestra un listado de los usuarios registrados en el sistema.
	 *
	 * @return void
	 */
	public function ListarUsuarios()
	{
		$this->load->model('UsuarioModel');

		$condicion = array(
			"select" => "id, cedula, username, nombre1, nombre2, apellido1, apellido2, especialidad, status",
			"where" => array("id !=" => $this->session->userdata('idUsuario')),
			"order_by" => array("campo" => "id", "direccion" => "ASC")
			);

		$data = array();

		$result = $this->UsuarioModel->ExtraerUsuario($condicion);
	
		$data["usuarios"] = $result;

		$this->load->view('admin/header');
		$this->load->view('admin/ListarUsuarios', $data);//Cargar vista del listado de usuarios
		$this->load->view('admin/footer');		
	}

	/**
	 * Verifica que los datos de usuarios ingresados en el formulario de registro y modificación sean cumplan con las reglas de integridad
	 *
	 * @param mixed[] $data Arreglo con información que se enviará a la vista
	 * @param integer $operación Valor numérico que identifica la acción que se realiza
	 *		0 -> Registro de usuario
	 *		1 -> Modificación de datos de usuario
	 *
	 * @return void|boolean
	 */
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

		//Si la operación es un registro de usuario...
		if ($operacion == 0) {

			$cedula_validacion[] = 'is_unique[usuario.cedula]';
			$cedula_respuestas['is_unique'] = 'La %s ya ha sido registrada anteriormente.';

			$email_validacion[] = 'is_unique[usuario.email]';
			$email_respuestas['is_unique'] = 'El %s ya ha sido registrado anteriormente.';

		//Si la operación es una modificación de los datos de un usuario...
		}elseif ($operacion == 1 && isset($data['usuario'])) {

			//Si la cédula almacenada del usaurio es diferente a la ingresada por formulario...
			if (strcmp($data['usuario']['cedula'], $_POST['cedula']) != 0) {
				
				$cedula_validacion[] = 'is_unique[usuario.cedula]';
				$cedula_respuestas['is_unique'] = 'La %s ya ha sido registrada anteriormente.';
			}

			//Si el email almacenado es diferente al email ingresado por formulario...
			if (strcmp($data['usuario']['email'], $_POST['email']) != 0) {
				
				$email_validacion[] = 'is_unique[usuario.email]';
				$email_respuestas['is_unique'] = 'El %s ya ha sido registrado anteriormente.';
			}

		}

		$this->form_validation->set_rules('cedula', 'Cédula',$cedula_validacion,$cedula_respuestas);
		
		$this->form_validation->set_rules(
		        'nombre1', 'Primer nombre',
		        array('required','regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s sólo puede contener caracteres alfabéticos sin espacios.',
	                'required'  => 'Debe ingresar su %s.'
		        )
		);

		$this->form_validation->set_rules(
		        'nombre2', 'Segundo nombre',
		        array('regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s sólo puede contener caracteres alfabéticos sin espacios.'
		        )
		);

		$this->form_validation->set_rules(
		        'apellido1', 'Primer apellido',
		        array('required','regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s sólo puede contener caracteres alfabéticos sin espacios.',
	                'required'  => 'Debe ingresar su %s.'
		        )
		);

		$this->form_validation->set_rules(
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
            	'telef_personal', 'Teléfono personal', 
        		array('required','regex_match[/^\(0(2[0-9]{2}|412|414|416|424|426)\) [0-9+]{3}-[0-9]{2}-[0-9]{2}/]'),
                array(
                	'regex_match'  	=> 'Su %s debe tener un código de área válido y el formato de ejemplo: (0212) 555-45-02.',
                	'required'	=> 'Debe ingresar su %s.'
	                )	                
        );

        $this->form_validation->set_rules(
            	'telef_emergencia', 'Teléfono de emergencia', 
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
		
		//Si algún dato es incorrecto...
		if ($this->form_validation->run() == FALSE) {
        	
        	//Si la operación se realizó desde la vista del login...
        	if ($this->input->post("origen") === "login") {					
					
				$this->load->view('login/index');//Cargar vista de login

			//Si la operación se realizó desde el formulario en una sesión de administrador...
			}else{
				
				$this->load->view('admin/FormularioRegistroUsuario', $data);//Cargar vista de formulario de registro o modificación de usuario
			}
		
		//Si los datos son correctos...
        }else{
        	return false;
        }
	}

	/**
	 * Verifica que la contraseña ingresada cumpla con las reglas de integridad
	 *
	 * @param mixed[] $data Arreglo con la información que se enviará a la vista
	 *
	 * @return void|boolean
	 */
	public function ValidarPasswordUsuario($data)
	{
		//Si el usuario está logueado
		if ($this->session->has_userdata('login')) {
			
			//Reglas de validación para la contraseña actual
			$this->form_validation->set_rules(
	        'password0', 'Contraseña actual',
		        array('required','min_length[8]','max_length[16]','regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,16}$/]'),		        	
		        array( 
		        	'min_length'    => 'La %s debe tener al menos 8 caracteres.',
		            'max_length'    => 'La %s debe tener máximo 16 caracteres.',
	                'regex_match'  	=> 'La %s no pueden contener caracteres especiales, sólo debe contener al menos una letra mayúscula, al menos una letra minúscula y al menos un número.',
	                'required'   	=> 'Debe insertar su %s.'
		        )
			);	
		}

		//Reglas de validación para la contraseña nueva
		$this->form_validation->set_rules(
	        'password1', 'Nueva ontraseña',
	        array('required','min_length[8]','max_length[16]','regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,16}$/]'),		        	
	        array( 
	        	'min_length'    => 'La %s debe tener al menos 8 caracteres.',
	            'max_length'    => 'La %s debe tener máximo 16 caracteres.',
                'regex_match'  	=> 'La %s no pueden contener caracteres especiales, sólo debe contener al menos una letra mayúscula, al menos una letra minúscula y al menos un número.',
                'required'   	=> 'Debe insertar una %s.'
	        )
		);

		//Reglas de validación para la contraseña de confirmación
		$this->form_validation->set_rules(
	        'password2', 'Contraseña de confirmación',
	        array('required','matches[password1]','min_length[8]','max_length[16]','regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,16}$/]'),		        	
	        array( 
	        	'min_length'    => 'La %s debe tener al menos 8 caracteres.',
	            'max_length'    => 'La %s debe tener máximo 16 caracteres.',
                'regex_match'  	=> 'La %s no pueden contener caracteres especiales, sólo debe contener al menos una letra mayúscula, al menos una letra minúscula y al menos un número.',
                'matches'   	=> 'La %s no coinside.',
                'required'   	=> 'Debe insertar la %s.'
	        )
		);

		//Si existe algún error en los datos ingresados...
		if ($this->form_validation->run() == FALSE) {
        	
			$this->load->view('admin/FormularioCambioClave', $data);//Se carga la vista del formulario de cambio de contraseña

		//Si los datos son correctos...
        }else{
        	return false;
        }
	}
}