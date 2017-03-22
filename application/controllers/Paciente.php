<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller {

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
        }/*
        if ($this->session->has_userdata('tipo_paciente') && ($this->session->userdata('tipo_paciente') != "Doctor" || $this->session->userdata('tipo_paciente') != "Enfermero")) {
        	redirect(base_url('Home')); 
        }*/
    }

    /**
     * @method AgregarPaciente()
     * @method ModificarPaciente(integer $id_evento)
     * @method ValidarPaciente(mixed[] $data)
     * @method VerPaciente()
     */

    /**
     * Registra a un paciente en la base de datos
     *
     * Al momento de registrar al paciente, también se crea una historia clínica
     *
     * @return void
     */
    public function AgregarPaciente()
    {
    	$data = array("titulo" => "Registrar paciente");

    	//Si se envió una petición POST...
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    		
    		//Si los datos de registro son correctos...
            if ($this->ValidarPaciente($data, 0) === false) {

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
            					),
            				'or_where' => array(
            					'id' => $this->input->post('id_paciente')
            					)
            			);
            		//No exiten usuarios con datos idénticos al que se está registrando...
            		if (!$this->PacienteModel->ValidarPaciente($condicion)) {

            			//Si se realiza el registro exitosamente en la base de datos...
						if ($id_paciente = $this->PacienteModel->AgregarPaciente()) {
            			
            				$cod_historia = uppercase(substr($_POST['tipo_paciente'], 0, 1)).$_POST['cedula'];
							
							set_cookie("message","El paciente <strong>'".$this->input->post('nombre1')." ".$this->input->post('apellido1')."'</strong> fue registrado exitosamente!...", time()+15);

							//Si el registro de usuario se realiza desde la vista del login...
							header("Location: ".base_url()."HistoriaClinica/CrearHistoriaClinica/".urlencode($id_paciente." ".$cod_historia));

						//Si ocurre un error durante el registro en base de datos...
						}else{
							$data['mensaje'] = $this->db->error();
						}
					//Si los datos a registrar coinsiden con los de un usuario existente...
            		}else{
            			$data['mensaje'] = "Ya existe un paciente registrado con ambos nombres y apellidos.";
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
            }
    	}

    	$this->load->view('medicina/FormularioRegistroPaciente', $data);
    }

    /**
     * Extrae de la base de datos la información de un paciente cuya cédula sea la especificada por POST
     *
     * @return void
     */

    public function VerPaciente()
    {
    	$cedula = $this->input->post('cedula');

    	$cond = array(
    			"select" => "persona.*, paciente.id AS id_paciente, paciente.lugar_nacimiento, paciente.tipo_paciente, paciente.departamento, paciente.trayecto, paciente.pnf, paciente.tipo_sangre, historia.antecedentes_personales, historia.antecedentes_familiares",
    			"from" => "persona",
    			"joins" => array(
    				array(
    					"tabla" => "paciente",
		                "condicion" => "persona.id = paciente.id",
		                "tipo" => "left"
    					),
    				array(
		                "tabla" => "historia_medicina AS historia",
		                "condicion" => "historia.id_paciente = paciente.id",
		                "tipo" => "left"
		                )
    				),
				"where" => array(
					"persona.cedula" => $cedula
					)
				);

		$result = $this->PacienteModel->ExtraerPaciente($cond);

		//Si los registros encontrados son más de 0...
		if ($result->num_rows() > 0) {
			
			$data['result'] = true;
			$data['paciente'] = $result->row_array();
		}else{
			$data['result'] = false;
			$data['message'] = "El paciente no está registrado...";
		}

		echo json_encode($data);
    }

    /**
	 * Verifica que los datos ingresados del paciente, en el formulario de registro y modificación 
	 * cumplan con las reglas de integridad
	 *
	 * @param mixed[] $data Arreglo con información que se enviará a la vista
	 * @param integer $operación Valor numérico que identifica la acción que se realiza
	 *		0 -> Registro de paciente
	 *		1 -> Modificación de datos de paciente
	 *
	 * @return void|boolean
	 */
	public function ValidarPaciente($data, $operacion)
	{

		$cedula_validacion = array('required','numeric','min_length[6]','max_length[8]');
		$cedula_respuestas = array(		                
		                'min_length'    => 'La %s debe tener al menos 6 caracteres.',
		                'max_length'    => 'La %s debe tener máximo 8 caracteres.',
		                'numeric'     	=> 'La %s sólo debe contener números.',
		                'required'      => 'Debe insertar la %s del paciente.'
		        	);

		$email_validacion = array('required','valid_email');
		$email_respuestas = array(
                	'valid_email'	=> 'El %s no es válido.',
                	'required'	=> 'Debe ingresar el %s del paciente.'
	                );

		//Si la operación es un registro de paciente...
		if ($operacion == 0) {

			$cedula_validacion[] = 'is_unique[paciente.cedula]';
			$cedula_respuestas['is_unique'] = 'La %s del paciente ya ha sido registrada anteriormente.';

			$email_validacion[] = 'is_unique[paciente.email]';
			$email_respuestas['is_unique'] = 'El %s del paciente ya ha sido registrado anteriormente.';

		//Si la operación es una modificación de los datos de un paciente...
		}elseif ($operacion == 1 && isset($data['paciente'])) {

			//Si la cédula almacenada del usaurio es diferente a la ingresada por formulario...
			if (strcmp($data['paciente']['cedula'], $_POST['cedula']) != 0) {
				
				$cedula_validacion[] = 'is_unique[paciente.cedula]';
				$cedula_respuestas['is_unique'] = 'La %s del paciente ya ha sido registrada anteriormente.';
			}

			//Si el email almacenado es diferente al email ingresado por formulario...
			if (strcmp($data['paciente']['email'], $_POST['email']) != 0) {
				
				$email_validacion[] = 'is_unique[paciente.email]';
				$email_respuestas['is_unique'] = 'El %s del paciente ya ha sido registrado anteriormente.';
			}

		}

		$this->form_validation->set_rules('cedula', 'Cédula',$cedula_validacion,$cedula_respuestas);
		
		$this->form_validation->set_rules(
		        'nombre1', 'Primer nombre',
		        array('required','regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s del paciente sólo puede contener caracteres alfabéticos sin espacios.',
	                'required'  => 'Debe ingresar el %s del paciente.'
		        )
		);

		$this->form_validation->set_rules(
		        'nombre2', 'Segundo nombre',
		        array('regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s del paciente sólo puede contener caracteres alfabéticos sin espacios.'
		        )
		);

		$this->form_validation->set_rules(
		        'apellido1', 'Primer apellido',
		        array('required','regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s del paciente sólo puede contener caracteres alfabéticos sin espacios.',
	                'required'  => 'Debe ingresar el %s del paciente.'
		        )
		);

		$this->form_validation->set_rules(
		        'apellido2', 'Segundo apellido',
		        array('regex_match[/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s del paciente sólo puede contener caracteres alfabéticos sin espacios.'
		        )
		);

		$this->form_validation->set_rules(
            	'fecha_nacimiento', 'Fecha de nacimiento', 
        		array('required','regex_match[/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/]'),
                array(
                	'regex_match'  	=> 'La %s del paciente debe tener el formato año-mes-día (2017-02-15 por ejemplo).',
                	'required'	=> 'Debe ingresar la %s del paciente.'
	                )	                
        );

		$this->form_validation->set_rules('email', 'Correo electrónico',$email_validacion, $email_respuestas);
       
        $this->form_validation->set_rules(
            	'telf_personal', 'Teléfono personal', 
        		array('required','regex_match[/^\(0(2[0-9]{2}|412|414|416|424|426)\) [0-9+]{3}-[0-9]{2}-[0-9]{2}/]'),
                array(
                	'regex_match'  	=> 'El %s del paciente debe tener un código de área válido y el formato de ejemplo: (0212) 555-45-02.',
                	'required'	=> 'Debe ingresar su %s.'
	                )	                
        );

        $this->form_validation->set_rules(
            	'telf_emergencia', 'Teléfono de emergencia', 
        		array('regex_match[/^\(0(2[0-9]{2}|412|414|416|424|426)\) [0-9+]{3}-[0-9]{2}-[0-9]{2}/]'),
                array(
                	'regex_match'  	=> 'El %s del paciente debe tener un código de área válido y el formato de ejemplo: (0212) 555-45-02).'
	                )	                
        );

        $this->form_validation->set_rules(
            	'sexo', 'Sexo', 
        		array('required'),
                array(
                	'required'	=> 'Debe ingresar el %s del paciente.'
	                )	                
        );

        $this->form_validation->set_rules(
            	'direccion', 'Direccion de habitación',
        		array('required'),
                array(
                	'required'	=> 'Debe ingresar la %s del paciente.'
	                )	                
        );

        $this->form_validation->set_rules(
            	'lugar_nacimiento', 'Lugar de nacimiento',
        		array('required'),
                array(
                	'required'	=> 'Debe ingresar el %s del paciente.'
	                )	                
        );		

		$this->form_validation->set_rules(
		        'tipo_paciente', 'Tipo de paciente',
		        array('required'),		        	
		        array( 
		        	'required'   	=> 'Debe seleccionar un %s.'
		        )
		);

		$this->form_validation->set_rules(
		        'departamento', 'Departamento',
		        array('required'),		        	
		        array( 
		        	'required'   	=> 'Debe seleccionar un %s de adscripción.'
		        )
		);

		$this->form_validation->set_rules(
		        'trayecto', 'Trayecto',
		        array('regex_match[/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s sólo puede contener caracteres alfanuméricos.'
		        )
		);

		$this->form_validation->set_rules(
		        'pnf', 'PNF',
		        array('regex_match[/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]+$/]'),		        	
		        array(   
	                'regex_match'  	=> 'El %s sólo puede contener caracteres alfanuméricos.'
		        )
		);

		$this->form_validation->set_rules(
		        'tipo_sangre', 'Tipo de sangre',
		        array('required'),		        	
		        array( 
		        	'required'   => 'Debe ingresar el %s del paciente.'
		        )
		);

		$this->form_validation->set_rules(
		        'antecedentes_personales', 'Antecedentes personales',
		        array('required'),		        	
		        array( 
		        	'required'   => 'Debe ingresar los %s del paciente.'
		        )
		);

		$this->form_validation->set_rules(
		        'antecedentes_familiares', 'Antecedentes familiares',
		        array('required'),		        	
		        array( 
		        	'required'   	=> 'Debe ingresar los %s del paciente.'
		        )
		);
		
		//Si algún dato es incorrecto...
		if ($this->form_validation->run() == FALSE) {
        		
			$this->load->view('medicina/FormularioRegistroPaciente', $data);//Cargar vista de formulario de registro o modificación de paciente
					
		//Si los datos son correctos...
        }else{
        	return false;
        }
	}
}