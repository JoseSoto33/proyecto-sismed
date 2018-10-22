<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examenes extends CI_Controller {

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
        if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Bioanalista") {
        	redirect(base_url('Home')); 
        }
    }
    /**
     * @method void AgregarOrdenExamen()
     * @method void ModificarOrden(integer $id_evento)
     * @method void EliminarOrden()
     * @method void VerOrden()
     * @method void ListarOrdenes()
     * @method void|boolean ValidarOrden(mixed[] $data)
     */

    /**
     * Muestra la interfaz del formulario para agregar orden, o realiza 
     * la inserción de la orden si se hace una petición POST
     *
     * @return 	void
     */
	public function AgregarOrdenExamen()
	{
		$this->load->model('ExamenModel');

		$data = array("titulo" => "Agregar nueva orden");
		$data['tipo_paciente'] = array("" => "", "Estudiante"  => "Estudiante", "Docente" => "Docente", "Administrativo" => "Administrativo", "Obrero"  => "Obrero", "Cortesía" => "Cortesía");
		$data['tipo_examenes'] = array(
			"examen_heces"  => "Examen de heces", 
			"examen_hematologia" => "Examen de hematología", 
			"examen_orina" => "Examen de orina", 
			"examen_miscelaneo"  => array(
				"titulo" => "Miscelaneos",
				"lista" => array(
					"vdrl" => "VDRL",
					"hiv" => "HIV",
					"hcg_sangre" => "HCG en sangre",
					"asto" => "Asto",
					"ra_test" => "Factor reumático",
					"pcr" => "Proteína C Reactiva",
					"helicobacter_pylori" => "Helicobacter Pylori",
					"mono_test" => "Mono Test",
					"grupo_sanguineo" => "Grupo sanguíneo",
				)
			)
		);

		//Si se envió una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			//Si los datos enviados por formulario son correctos...
            //if ($this->ValidarOrden($data) === false) { 

    			//Si no existe una orden registrada para el paciente específico
				//con los mismos exámenes que desea realizar para la fecha pautada...
    			if (!$this->ExamenModel->ValidarOrden($_POST)) {

    				//Si la orden se agrega exitosamente a la base de datos...
    				if ($this->ExamenModel->AgregarOrden()) {

        				set_cookie("message","La orden para <strong>'".$this->input->post('nombre1')." ".$this->input->post('apellido1')."'</strong> fue registrado exitosamente!...", time()+15);
						header("Location: ".base_url()."Examenes/ListarOrdenes");

					//Si hay error en la inserción
					}else{

						$data['mensaje'] = $this->db->error();
					}
				//Si ya existe una orden con los datos enviados
    			}else{
    				$data['mensaje'] = "El pasiente ya posee una orden para realizar:<br>";
    				$data['mensaje'] .= "<ul>";
    				$ordenes = $this->ExamenModel->ExtraerOrdenPaciente($_POST['cedula']);
    				foreach ($ordenes as $key => $orden) {
    					if ($orden['examen_heces'] == 't') {
    						$data['mensaje'] .= "<li>" . $data['tipo_examenes']['examen_heces'] . "</li>";
    					}

    					if ($orden['examen_hematologia'] == 't') {
    						$data['mensaje'] .= "<li>" . $data['tipo_examenes']['examen_hematologia'] . "</li>";
    					}

    					if ($orden['examen_orina'] == 't') {
    						$data['mensaje'] .= "<li>" . $data['tipo_examenes']['examen_orina'] . "</li>";
    					}

    					if (!empty($orden['examen_miscelaneo'])) {
    						$data['mensaje'] .= "<li>" . $data['tipo_examenes']['examen_miscelaneo']['titulo'];
    						$data['mensaje'] .= "<ul>";
    						$miscelaneos = explode(',', $orden['examen_miscelaneo']);
    						foreach ($miscelaneos as $x => $misc) {
    							$data['mensaje'] .= "<li>" . $data['tipo_examenes']['examen_miscelaneo']['lista'][$misc] . "</li>";
    						}
    						$data['mensaje'] .= "</ul>";
    						$data['mensaje'] .= "</li>";
    					}
    				}
    				setlocale(LC_TIME,"esp");
    				$data['mensaje'] .= "<br>Para la fecha " . strftime('%d de %B de %Y', strtotime($_POST['fecha_entrega_pautada']));
    			}
			//}
		}
		//Cargar vista del formulario de registro de órdenes
		$this->CargarHeader();
        $this->load->view('examenes/FormularioRegistroOrden', $data);
        $this->load->view('footer');
	}

	/**
	 * Muestra la interfaz del formulario para modificar una orden, o  
     * realiza la modificación de la orden si se hace una petición POST
     *
     * @param int $id_evento Código que identifica la orden en la base de datos
     *
     * @return void
	 */
	public function ModificarOrden($id_orden)
	{
		$this->load->model('ExamenModel');

		$data = array("titulo" => "Modificar datos de la orden de examen");
		$data['tipo_paciente'] = array("" => "", "Estudiante"  => "Estudiante", "Docente" => "Docente", "Administrativo" => "Administrativo", "Obrero"  => "Obrero", "Cortesía" => "Cortesía");
		$data['tipo_examenes'] = array(
			"examen_heces"  => "Examen de heces", 
			"examen_hematologia" => "Examen de hematología", 
			"examen_orina" => "Examen de orina", 
			"examen_miscelaneo"  => array(
				"titulo" => "Miscelaneos",
				"lista" => array(
					"vdrl" => "VDRL",
					"hiv" => "HIV",
					"hcg_sangre" => "HCG en sangre",
					"asto" => "Asto",
					"ra_test" => "Factor reumático",
					"pcr" => "Proteína C Reactiva",
					"helicobacter_pylori" => "Helicobacter Pylori",
					"mono_test" => "Mono Test",
					"grupo_sanguineo" => "Grupo sanguíneo",
				)
			)
		);

		$old_orden = $this->ExamenModel->ExtraerOrden($id_orden);

		//Si consiguen registros...
		if (!empty($old_orden)) {

			$data['orden'] = $old_orden;

			//Si se envía una petición POST...
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				//Si los datos de la orden son válidos...
	            //if ($this->ValidarOrden($data) === false) {

        			//Si los datos de la orden son correctos...
        			if (!$this->ExamenModel->ValidarOrden($_POST, $id_orden)) {

        				//Si la modificación es exitosa...
	        			if ($this->ExamenModel->ModificarOrden($_POST, $old_orden['id'])) {

	        				set_cookie("message","La orden para <strong>'".$this->input->post('nombre1')." ".$this->input->post('apellido1')."'</strong> fue registrado exitosamente!...", time()+15);
							header("Location: ".base_url()."Examenes/ListarOrdenes");

						//Si ocurre un error en la modificación...
						}else{

							$data['mensaje'] = $this->db->error();
						}

					//Si los datos coinsiden con una orden registrada...
        			}else{
        				$data['mensaje'] = "El pasiente ya posee una orden para realizar:<br>";
	    				$data['mensaje'] .= "<ul>";
	    				$ordenes = $this->ExamenModel->ExtraerOrdenPaciente($_POST['cedula']);
	    				foreach ($ordenes as $key => $orden) {
	    					if ($old_orden['id'] != $orden['id'] && $orden['examen_heces'] == 't') {
	    						$data['mensaje'] .= "<li>" . $data['tipo_examenes']['examen_heces'] . "</li>";
	    					}

	    					if ($old_orden['id'] != $orden['id'] && $orden['examen_hematologia'] == 't') {
	    						$data['mensaje'] .= "<li>" . $data['tipo_examenes']['examen_hematologia'] . "</li>";
	    					}

	    					if ($old_orden['id'] != $orden['id'] && $orden['examen_orina'] == 't') {
	    						$data['mensaje'] .= "<li>" . $data['tipo_examenes']['examen_orina'] . "</li>";
	    					}

	    					if ($old_orden['id'] != $orden['id'] && !empty($orden['examen_miscelaneo'])) {
	    						$data['mensaje'] .= "<li>" . $data['tipo_examenes']['examen_miscelaneo']['titulo'];
	    						$data['mensaje'] .= "<ul>";
	    						$miscelaneos = explode(',', $orden['examen_miscelaneo']);
	    						foreach ($miscelaneos as $x => $misc) {
	    							$data['mensaje'] .= "<li>" . $data['tipo_examenes']['examen_miscelaneo']['lista'][$misc] . "</li>";
	    						}
	    						$data['mensaje'] .= "</ul>";
	    						$data['mensaje'] .= "</li>";
	    					}
	    				}
	    				setlocale(LC_TIME,"esp");
	    				$data['mensaje'] .= "<br>Para la fecha " . strftime('%d de %B de %Y', strtotime($_POST['fecha_entrega_pautada']));
        			}
				//}
			}

		//Si no se encontraron registros...
		}else{
			$data['mensaje'] = $this->db->error();
		}

		//Se carga la vista del formulario para modificar órdenes
		$this->CargarHeader();
        $this->load->view('examenes/FormularioRegistroOrden', $data);
        $this->load->view('footer');
	}

	/**
	 * Elimina un evento de la base de datos. El id del evento se envía
	 * por Ajax como un POST
	 *
	 * @return 	void 
	 */
	public function EliminarOrden()
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
	public function VerOrden()
	{
		$this->load->model('ExamenModel');

		$id = $this->input->post('id');

		$orden = $this->ExamenModel->ExtraerOrden($id);
		$tipo_examenes = array(
			"examen_heces"  => "Examen de heces", 
			"examen_hematologia" => "Examen de hematología", 
			"examen_orina" => "Examen de orina", 
			"examen_miscelaneo"  => array(
				"titulo" => "Miscelaneos",
				"lista" => array(
					"vdrl" => "VDRL",
					"hiv" => "HIV",
					"hcg_sangre" => "HCG en sangre",
					"asto" => "Asto",
					"ra_test" => "Factor reumático",
					"pcr" => "Proteína C Reactiva",
					"helicobacter_pylori" => "Helicobacter Pylori",
					"mono_test" => "Mono Test",
					"grupo_sanguineo" => "Grupo sanguíneo",
				)
			)
		);

		//Si la cantidad de registros encontrados es mayor a 0
		if (!empty($orden)) {

			setlocale(LC_TIME,"esp");

			$orden["fecha_entrega_pautada"] = strftime('%d de %B de %Y', strtotime($orden["fecha_entrega_pautada"]));
			$orden["result"] = true;

			foreach ($tipo_examenes as $x => $tipo) {
				if (is_array($tipo)) {
					foreach ($tipo['lista'] as $y => $sub_tipo) {
						if (!in_array($y, explode(',', $orden[$x]))) {
							unset($tipo_examenes[$x]['lista'][$y]);
						}
					}
				} elseif ($orden[$x] === 'f') {
					unset($tipo_examenes[$x]);
				}
			}

			$orden['tipo_examenes'] = $tipo_examenes;

		//Si no se encontraron registros...
		}else{
			$orden["result"] = false;
			$orden["message"] = 'Error: '.$this->db->error();
		}

		echo json_encode($orden);
	}

	/**
	 * Extrae las ordenes existentes de la base de datos, registrados
	 * por el usuario en sesión y ordenados por su id
	 *
	 * @return void
	 */
	public function ListarOrdenes() {
		$this->load->model('ExamenModel');

		$result = $this->ExamenModel->ExtraerOrdenes();			
		$data = array("ordenes" => $result);

		$this->CargarHeader();
        $this->load->view('examenes/ListarOrdenes', $data);
        $this->load->view('footer');
	}

	/**
	 * Verifica si los datos ingresados por formulario son correctos.
	 * Valida la integridad de los datos
	 *
	 * @param mixed[] $data Arreglo que almacena los datos que se enviarán a la vista
	 *
	 * @return void|boolean
	 */
	public function ValidarOrden($data)
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