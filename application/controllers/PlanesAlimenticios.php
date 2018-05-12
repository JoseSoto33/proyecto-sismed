<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlanesAlimenticios extends CI_Controller {/*CI: CodeIgniter*/

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
        if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Nutricionista") {
        	redirect(base_url('Home')); 
        }
    }
    /**
     * @method void AgregarCitaNutricion()
     * @method void ModificarEvento(integer $id_evento)
     * @method void EliminarEvento()
     * @method void VerEvento()
     * @method void ListarEventos()
     * @method void|boolean ValidarEvento(mixed[] $data)
     */

    /**
     * Muestra la interfaz del formulario para agregar evento, o realiza 
     * la inserción del evento si se hace una petición POST
     *
     * @return 	void
     */
	public function AgregarPlanAlimenticio()
	{
		$this->load->model('PlanesAlimenticiosModel');

		$data = array("titulo" => "Agregar nuevo plan alimenticio");
		$data['tipo_paciente'] = array("" => "", "Estudiante"  => "Estudiante", "Docente" => "Docente", "Administrativo" => "Administrativo", "Obrero"  => "Obrero", "Cortesía" => "Cortesía");
		$data['lista_sustitutos'] = $this->PlanesAlimenticiosModel->ExtraerListaSustitutos();

		foreach ($data['lista_sustitutos'] as $key => $sustituto) {
			$racion[$sustituto['id']] = $this->PlanesAlimenticiosModel->ExtraerListaRacion($sustituto['id']);
		}
		$data['raciones'] = $racion;

		$data['lista_equivalente'] = $this->PlanesAlimenticiosModel->ExtraerListaEquivalente();
		$data['lista_medida'] = $this->PlanesAlimenticiosModel->ExtraerListaMedida();
		
		//Si se envió una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if($this->PlanesAlimenticiosModel->AgregarPlanAlimenticio()) {
				/*cookie: es un arreglo. que funciona como variables universales del servidor*/
				set_cookie("message","La cita del paciente <strong>'".$this->input->post('nombre1')."' '".$this->input->post('apellido1')."'</strong> fue registrada exitosamente!...", time()+15);
					/*header: redirecciona envia a la direccion que se le asigna. */
				header("Location: ".base_url()."Citas/ListarCitas");
			}else{

				$data['mensaje'] = $this->db->error();
			}

			//Si los datos enviados por formulario son correctos...
          /*  if ($this->ValidarCita($data) === false) { 

	        			//Si no existe un evento registrado con el mismo nombre para
	        			//las mismas fechas...
        			if (!$this->EventoModel->ValidarEvento($condicion)) {

        				//Si el evento se agrega exitosamente a la base de datos...
        				if ($this->EventoModel->AgregarEvento()) {

	        				set_cookie("message","El evento <strong>'".$this->input->post('titulo')."'</strong> fue registrado exitosamente!...", time()+15);
							header("Location: ".base_url()."Evento/ListarEventos");

						//Si hay error en la inserción
						}else{

							$data['mensaje'] = $this->db->error();
						}
					//Si ya existe un evento con los datos enviados
        			}else{

        				$data['mensaje'] = "Ya existe un evento registrado con el mismo título y fechas de inicio y fin.";
        			}
	        	//Si no se cargó el archivo...
	        	}else{
	        		$data['mensaje'] = $this->upload->display_errors();		      
	        	}
			}*/
		}
		//Cargar vista del formulario de registro de evento
		$this->CargarHeader();
        $this->load->view('planes/FormularioNuevoPlanAlimenticio', $data);
        $this->load->view('footer');
	}
	/*Extrae a un paciente de la base de datos con la cedula proporcionada, lo guarda en un objeto y retorna en formato json*/
	public function ValidarPaciente(){
		$cedula = $this->input->post("cedula");
		$this->load->model("PacienteModel");
		$paciente = $this->PacienteModel->Extraerpaciente(array("where"=>"cedula = '$cedula'"))->row();
		echo json_encode($paciente);
	}

	/**
	 * Muestra la interfaz del formulario para modificar un evento, o  
     * realiza la modificación del evento si se hace una petición POST
     *
     * @param int $id_evento Código que identifica al evento en la base de datos
     *
     * @return void
	 */
	public function ModificarCitaNutricion($id_cita)
	{
		$this->load->model('CitasModel');//carga del controlador al modela de citas

		$data = array("titulo" => "Modificar cita");										
		$data['tipo_paciente'] = array("" => "", "Estudiante"  => "Estudiante", "Docente" => "Docente", "Administrativo" => "Administrativo", "Obrero"  => "Obrero", "Cortesía" => "Cortesía");
		$data['estatus'] =  array("" => "", "0" => "Pendiente", "1" => "Agendada-Hoy", "2" => "Atendida","3" => "Cancelada", "4" => "Anulada");
		//
		$cond = array(
				"where" => array(
					//md5 encripta el id que se encuentra en la BD.usando como llave "sismed"
					"MD5(concat('sismed',id))" => $id_cita
					)
				);

		$result = $this->CitasModel->ExtraerCitas($cond);

		//Si los registros encontrados son más de 0...
		if ($result->num_rows() > 0) {

			$data['cita'] = $result->row_array();
			
			//Si se envía una petición POST...
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				//Si los datos del evento son válidos...
	            //if ($this->ValidarEvento($data) === false) {	        		

        			//Si los datos del evento son correctos...
        			//if (!$this->CitasModel->ValidarEvento($condicion)) {        

        				$condicion = array(	
        					"data" => array(
				                "motivo" => $this->input->post('motivo'),
				                "fecha_cita" => $this->input->post('fecha_cita'),
				                "examen_lb" => $this->input->post('examen_lb'),
				                "estatus" => $this->input->post('estatus'),
				            ),
				     		"where" => array("MD5(concat('sismed',id))" => $id_cita)
						);


        				//Si la modificación es exitosa...
	        			if ($this->CitasModel->ModificarCita($condicion)) {

	        				set_cookie("message","La cita del paciente <strong>'".$this->input->post('nombre1')." ".$this->input->post('apellido1')."'</strong> fue modificada exitosamente!...", time()+15);
							header("Location: ".base_url()."Citas/ListarCitas");

						//Si ocurre un error en la modificación...
						}else{

							$data['mensaje'] = $this->db->error();
						}

					//Si los datos coinsiden con un evento registrado...
        			/*}else{
        				$data['mensaje'] = "Ya existe un evento registrado con el mismo título y fechas de inicio y fin.";
        			}*/
	        		//Si no se pudo cargar el archivo...
		        //}
			}

		//Si no se encontraron registros...
		}else{
			$data['mensaje'] = $this->db->error();
		}

		//Se carga la vista del formulario para modificar cita
		$this->CargarHeader();
        $this->load->view('citas/FormularioNuevaCita', $data);
        $this->load->view('footer');
	}

	/**
	 * Elimina un evento de la base de datos. El id del evento se envía
	 * por Ajax como un POST
	 *
	 * @return 	void 
	 */
	public function EliminarEvento()
	{
		$this->load->model('EventoModel');

		$id = $this->input->post('id');
		$condicion = array(
			'where' => array("MD5(concat('sismed',id))" => $id)
			);

		//Si se elimina el evento exitosamente...
		if ($this->EventoModel->EliminarEvento($condicion)) {
			
			$data['result']  = true;
			$data['message'] = "Evento eliminado exitosamente!...";

		//Si ocurre un error durante la eliminación...
		}else{
			$data['result']  = false;
			$data['message'] = 'Error: Ha ocurrido un problema durante la eliminación.\n'.$this->db->error();
		}
		
		echo json_encode($data);
	}

	/**
	 * Extrae los detalles de un evento determinado
	 *
	 * @return void
	 */
	public function VerEvento()
	{
		$this->load->model('EventoModel');

		$id = $this->input->post('id');
		$condicion = array(
			"where" => array("MD5(concat('sismed',id))" => $id)
			);

		$result = $this->EventoModel->ExtraerEvento($condicion);

		//Si la cantidad de registros encontrados es mayor a 0
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

		//Si no se encontraron registros...
		}else{
			$data["result"] = false;
			$data["message"] = 'Error: '.$this->db->error();
		}

		echo json_encode($data);
	}

	/**
	 * Extrae los eventos existentes de la base de datos, registrados
	 * por el usuario en sesión y ordenados por su id
	 *
	 * @return void
	 */
	public function ListarCitas()
	{
		$this->load->model('CitasModel');
		
		$condicion = array(
			"select" => "id, id_paciente, fecha_creacion, fecha_cita, estatus, cedula, nombre1, apellido1",
			"order_by" => array('campo'=>"id","opcion"=> "ASC") /*Traer todos los registros ordenados por el campo ID de manera ascendente, de menor a mayor*/
			);

		$data = array();

		$result = $this->CitasModel->ExtraerCitas($condicion);

		///if ($result->num_rows() > 0) {
			
		$data["citas"] = $result;

		$this->CargarHeader();
        $this->load->view('citas/ListarCitas', $data);
        $this->load->view('footer');
		//}
	}

	/**
	 * Verifica si los datos ingresados por formulario son correctos.
	 * Valida la integridad de los datos
	 *
	 * @param mixed[] $data Arreglo que almacena los datos que se enviarán a la vista
	 *
	 * @return void|boolean
	 */
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

        //Si no hay datos inválidos...
		if ($this->form_validation->run() == FALSE) {
			$this->CargarHeader();
	        $this->load->view('eventos/FormularioRegistroEvento', $data);
	        $this->load->view('footer');
		//Si hay datos inválidos...
        }else{
			return false;
		}
	}	
}