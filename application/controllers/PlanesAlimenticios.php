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

		$data['recomendaciones'] = $this->PlanesAlimenticiosModel->ExtraerRecomendaciones();
		foreach ($data['recomendaciones'] as $key => $recomendaciones) {
			$data['lista_recomendaciones'][$recomendaciones['id']]= $this->PlanesAlimenticiosModel->ExtraerListaRecomendaciones($recomendaciones['id']);
		}
		foreach ($data['recomendaciones'] as $key => $recomendaciones) {
			$data['cuadro_recomendaciones'][$recomendaciones['id']]= $this->PlanesAlimenticiosModel->ExtraerCuadroRecomendaciones($recomendaciones['id']);
		}
		
		//Si se envió una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id_usuario 				= $this->session->userdata("idUsuario");
			$prescripcion 				= $this->input->post("prescripcion");
			$recomendacion 				= $this->input->post("recomendacion");
			$hora_desayuno 				= $this->input->post("hora_desayuno");
			$hora_MD 					= $this->input->post("hora_merienda_desayuno");
			$hora_almuerzo 				= $this->input->post("hora_almuerzo");
			$hora_MA 					= $this->input->post("hora_merienda_almuerzo");
			$hora_cena 					= $this->input->post("hora_cena");
			$hora_MC  					= $this->input->post("hora_merienda_cena");
			$meridianoD 				= $this->input->post("h_d_meridiano");
			$meridianoMD 				= $this->input->post("h_m_d_meridiano");
			$meridianoA 				= $this->input->post("h_a_meridiano");
			$meridianoMA 				= $this->input->post("h_m_a_meridiano");
			$meridianoC 				= $this->input->post("h_c_meridiano");
			$meridianoMC 				= $this->input->post("h_m_c_meridiano");
			$lista_raciones 			= $this->input->post("racion");
			$lista_medidas				= $this->input->post("medida");
			$lista_equivalentes			= $this->input->post("equivalente");
			$id_plan_alimenticio 		= $this->PlanesAlimenticiosModel->AgregarPlanAlimenticio($id_usuario,$prescripcion,$recomendacion);
			$turnos=array("1"=>"D", "2"=>"DM","3"=>"A","4"=>"AM","5"=>"C","6"=>"CM");
			$completado=true;
			
			if(!empty($id_plan_alimenticio)){
				if(!empty($hora_desayuno)&& !empty($meridianoD)){
					$full_horaD= $hora_desayuno." ".$meridianoD;
				}

				if(!empty($hora_almuerzo)&& !empty($meridianoA)){
					$full_horaA= $hora_almuerzo." ".$meridianoA;
				}

				if(!empty($hora_cena)&& !empty($meridianoC)){
					$full_horaC= $hora_cena." ".$meridianoC;
				}

				if(!empty($hora_MD)&& !empty($meridianoMD)){
					$full_horaMD= $hora_MD." ".$meridianoMD;
				}

				if(!empty($hora_MA)&& !empty($meridianoMA)){
					$full_horaMA= $hora_MA." ".$meridianoMA;
				}

				if(!empty($hora_MC)&& !empty($meridianoMC)){
					$full_horaMC= $hora_MC." ".$meridianoMC;
				}

				$this->PlanesAlimenticiosModel->GuardarMenuPlan($id_plan_alimenticio,(!empty($full_horaD))? $full_horaD : null,(!empty($full_horaA))? $full_horaA : null, (!empty($full_horaC))? $full_horaC : null,(!empty($full_horaMD))? $full_horaMD : null,(!empty($full_horaMA))? $full_horaMA : null,(!empty($full_horaMC))? $full_horaMC : null);
				foreach ($lista_raciones as $X => $raciones) {
					foreach ($raciones as $Y => $racion) {
						$medida=$lista_medidas[$X][$Y];
						if(!empty($racion)){
							$id_lista_racion_sustituto= $this->PlanesAlimenticiosModel->AgregarRacionSustituto($id_plan_alimenticio,$racion,$medida);
							if(!$id_lista_racion_sustituto){
								$completado=false;
								break;
							}
							foreach ($lista_equivalentes[$X] as $Z => $equivalentes){
								$turno=$turnos[$Z];
								
								foreach ($equivalentes as $key => $turno_equivalente) {
									if(!empty($turno_equivalente)){
										$success=$this->PlanesAlimenticiosModel->AgregarTurnoEquivalente($turno,$turno_equivalente,$id_lista_racion_sustituto);	
										if(!$success){
											$completado=false;
											break;
										}
									}
								
								}
								if(!$completado) break;		
							}
							if(!$completado) break;
						}	
					}
					if(!$completado) break;
							
				}
				if($completado) {
					//cookie: es un arreglo. que funciona como variables universales del servidor
					set_cookie("message","¡El plan ha sido agregado exitosamente!...", time()+15);
						//header: redirecciona envia a la direccion que se le asigna. 
					header("Location: ".base_url()."PlanesAlimenticios/ListarPlanAlimenticio");
				}else{

					$data['mensaje'] = $this->db->error();
				}
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
	public function AgregarFilaRacion(){
		$this->load->model('PlanesAlimenticiosModel');
		$id_sustituto = $this->input->post('id_sustituto');
		$data['raciones'] = $this->PlanesAlimenticiosModel->ExtraerListaRacion($id_sustituto);
		$data['id_sustituto'] = $id_sustituto;
		$data['lista_equivalente'] = $this->PlanesAlimenticiosModel->ExtraerListaEquivalente();
		$data['lista_medida'] = $this->PlanesAlimenticiosModel->ExtraerListaMedida();
		$this->load->view('planes/FilaRacion', $data);
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

	public function EliminarPlan()
	{
		$this->load->model('PlanesAlimenticiosModel');

		$id = $this->input->post('id');

		//Si se cancela la cita exitosamente...
		if ($this->PlanesAlimenticiosModel->EliminarPlan($id)) {
			
			$data['result']  = true;
			$data['message'] = "¡Se ha eliminado el plan exitosamente!";

		//Si ocurre un error durante la eliminación...
		}else{
			$data['result']  = false;
			$data['message'] = 'Error: Ha ocurrido un problema durante la eliminación.\n'.$this->db->error();
		}
		
		echo json_encode($data);
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
	public function ListarPlanAlimenticio()
	{
		$this->load->model('PlanesAlimenticiosModel');
		
		$condicion = array(
			"select" => "id,fecha_creacion, prescripcion_dietetica",
			"order_by" => array('campo'=>"id","opcion"=> "ASC") /*Traer todos los registros ordenados por el campo ID de manera ascendente, de menor a mayor*/
			);

		$data = array();

		$result = $this->PlanesAlimenticiosModel->ExtraerPlanesAlimenticios($condicion);

		///if ($result->num_rows() > 0) {
			
		$data["plan_alimenticio"] = $result;

		$this->CargarHeader();
        $this->load->view('planes/ListarPlanAlimenticio', $data);
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