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

        if (!$this->session->has_userdata('login') && ($this->uri->segment(1, 0) != '0' || $this->uri->segment(2, 0) != '0') && $this->uri->segment(2, 0) != 'Login') {
        	redirect(base_url());
        }
        if ($this->session->has_userdata('login') && $this->session->userdata('login') == true && ($this->uri->segment(1, 0) == '0' && $this->uri->segment(2, 0) == '0')) {
        	redirect(base_url('Home')); 
        }
    }

    /**
     * @method void index()
     * @method void Logout()
     * @method void ValidarSesion(mixed[] $data)
     * @method void ListarSesiones()
     */

    /**
     * Muestra la página principal para iniciar sesión, o
	 * inicia sesión si se envía una petición POST
	 *
	 * @return void
     */
	public function index()
	{
		$this->load->model('UsuarioModel');
        $data = array();

        $data['existe_usuario'] = $this->UsuarioModel->ValidarUsuario(array());

        //Si se envió una petición POST...
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			
			//Si los datos enviados por formulario son correctos...
            if ($this->ValidarSesion($data) === FALSE) {
            	
				$condicion = array(
					"where" => array(
						"cedula" => $this->input->post("log_cedula")
						)
					);

				//Si los datos ingresados pertenecen a un usuario registrado...
				if ($this->UsuarioModel->ValidarUsuario($condicion)) {
					
					$usuario = $this->UsuarioModel->ExtraerUsuario($condicion)->row();

					//Si el usuario está inactivo...
					if ($usuario->status === "f") {

						$data['mensaje'] = "El usuario ingresado se encuentra inactivo.";

					//Si no, si la contraseña ingresada coinside con la contraseña registrada...
					}elseif (strcmp($usuario->password,$this->input->post('log_password'))===0) {
						
						//Si no es la primera vez que el usuario inicia sesión...
						if ($usuario->first_session === 'f') {
							
							$this->Login(md5("sismed".$usuario->id));

						//Si es la primera vez que el usuario inicia sesión...
						}else{
						
							redirect(base_url()."Usuario/PasswordChange/".md5("sismed".$usuario->id));
						}

					//Si la contraseña ingresada no coinside con la contraseña registrada...
					}else{

						$data['mensaje'] = "Contraseña incorrecta.";
					}

				//Si los datos no son correctos...
				}else{
					$data['mensaje'] = "El usuario no existe... Verifique su cédula y contraseña.";
				}

				//Cargar vista del login
				$this->load->view('login/index', $data);
            }

        //Si no se envió la petición POST
		}else{

			//Cargar vista del login
			$this->load->view('login/index',$data);
		}		
	}

	/**
	 * Crea una nueva sesión de usuario.
	 *
	 * @param integer $id_usuario El identificador principal del usuario en la base de datos
	 *
	 * @return boolean
	 */
	public function Login($id_usuario)
	{
		$this->load->model('SesionModel');
		$this->load->model('UsuarioModel');
		$condicion = array(
			"where" => array("MD5(concat('sismed',id))" => $id_usuario)
			);

		$usuario = $this->UsuarioModel->ExtraerUsuario($condicion)->row();

		$data = array(
			"id_usuario" => $usuario->id,
			"fecha_inicio" => date('Y-m-d h:i:s a')
			);

		$id_sesion = $this->SesionModel->Login($data);

		//Si no se se creó la sesión...
		if (!$id_sesion) {
		
			//$data['mensaje'] = "Error al intentar iniciar sesión.";
			set_cookie("message","Error al intentar iniciar sesión.", time()+15);
			redirect(base_url());

		//Si se creó y registró la sesión...
		}else{

			$data = array(
				'idUsuario' => $usuario->id,
				'idSesion' => $id_sesion,
				'username' => $usuario->username,
				'nombre' => $usuario->nombre1,
				'apellido' => $usuario->apellido1,
				'login' => true,
				'tipo_usuario' => $usuario->tipo_usuario,
				'especialidad' => $usuario->especialidad,
				'sexo' => $usuario->sexo,
				'first_session' => $usuario->first_session,
				'fecha_creado' => $usuario->fecha_creado,
				'img' => $usuario->img
			);

			$this->session->set_userdata($data);
			redirect(base_url()."Home");
		}
	}

	/**
	 * Destruye la sesión del usuario.
	 *
	 * @return void
	 */
	public function Logout()
	{
		$this->load->model('SesionModel');
		$data = array(
			"campos" => array(
				"fecha_fin" => date('Y-m-d h:i:s a')
				),
			"where" => array(
				"id" => $this->session->userdata('idSesion'),
				"id_usuario" => $this->session->userdata('idUsuario')
				)
			);

		//Si la sesión se cierra exitosamente...
		if ($this->SesionModel->Logout($data)) {
			
			$data = array('idUsuario','idSesion','username','nombre','apellido','login','tipo_usuario');
			$this->session->unset_userdata($data);
			$this->session->sess_destroy();
			header('Location: '.base_url());

		//Si no se puede cerrar sesión...
		}else{
			header('Location: '.base_url().'Home');
		}		
	}

	/**
	 * Verifica que los datos enviados para iniciar sesión sean correctos
	 *
	 * @return void|boolean
	 */
	public function ValidarSesion($data)
	{
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

        //Si los datos son correctos...
        if ($this->form_validation->run() == FALSE) {
        	
			$this->load->view('login/index',$data);

		//Si los datos son incorrectos...
        }else{
        	return false;
        }
	}

	/**
	 * Extrae de la base de datos información sobre las sesiones realizadas
	 * por los demás usuarios
	 *
	 * @return void
	 */
	public function ListarSesiones()
	{
		$this->load->model('SesionModel');
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

		//Carga la vista de listar sesiones
		$this->CargarHeader();
		$this->load->view('admin/ListarSesiones', $data);
        $this->load->view('footer');	
	}
}