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

	public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('login') && ($this->uri->segment(1, 0) != '0' || $this->uri->segment(2, 0) != '0')) {
        	redirect(base_url());
        }
        if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Administrador") {
        	redirect(base_url('Home')); 
        }
    }
    /**
     * @method void AgregarEvento()
     * @method void ModificarEvento(integer $id_evento)
     * @method void EliminarEvento()
     * @method void VerEvento()
     * @method void ListarEventos()
     * @method void ValidarEvento(mixed[] $data)
     */

    /**
     * Muestra la interfaz del formulario para agregar evento, o realiza 
     * la inserción del evento si se hace una petición POST
     *
     * @return 	void
     */
	public function AgregarEvento()
	{
		$data = array("titulo" => "Agregar nuevo evento");

		//Si se envió una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			//Si los datos enviados por formulario son correctos...
            if ($this->ValidarEvento($data) === false) {            	
		        
		        $ruta 		= './assets/img/eventos/';
		        $nombre 	= base64_encode($this->input->post('titulo'))."_".$this->input->post('fecha_inicio')."_".$this->input->post('fecha_fin');
		        $file_info 	= $this->ImagenModel->SubirImagen($data,$ruta,$nombre);

		        //Si se cargó el archivo correctamente...
		        if ($file_info != false) {

					$fecha_inicio = $this->input->post('fecha_inicio');
					$fecha_fin 	 = $this->input->post('fecha_fin');

					$hora_inicio = $this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano');
	        		$hora_fin 	 = $this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano');

	        		$data = $this->EventoModel->ValidarFechaHora($fecha_inicio, $fecha_fin, $hora_inicio, $hora_fin, $data);
	        		
	        		//Si la fecha de inicio y fin del evento son válidas...
	        		if ($data['status'] === true) {

	        			$fecha_hora_inicio = $fecha_inicio." ".$hora_inicio;
		        		$fecha_hora_fin = $fecha_fin." ".$hora_fin;
	        			
	        			$condicion = array(
			        			'where' => array(
			        				'titulo' => $this->input->post('titulo'),
			        				'fecha_hora_inicio' => $fecha_hora_inicio,
			        				'fecha_hora_fin' => $fecha_hora_fin
			        				)
			        			);

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
	        		}
	        	//Si no se cargó el archivo...
	        	}else{
	        		$data['mensaje'] = $this->upload->display_errors();		      
	        	}
			}
		}
		//Cargar vista del formulario de registro de evento
		$this->load->view('admin/FormularioRegistroEvento', $data);
	}

	/**
	 * Muestra la interfaz del formulario para modificar un evento, o  
     * realiza la modificación del evento si se hace una petición POST
     *
     * @param int $id_evento Código que identifica al evento en la base de datos
     *
     * @return void
	 */
	public function ModificarEvento($id_evento)
	{
		$data = array("titulo" => "Modificar datos de evento");

		$cond = array(
				"where" => array(
					"MD5(concat('sismed',id))" => $id_evento
					)
				);

		$result = $this->EventoModel->ExtraerEvento($cond);

		//Si los registros encontrados son más de 0...
		if ($result->num_rows() > 0) {

			$data['evento'] = $result->row_array();

			$data['evento']['fecha_inicio'] = date("Y-m-d", strtotime($data['evento']['fecha_hora_inicio']));
			$data['evento']['hora_inicio'] = date("h:i", strtotime($data['evento']['fecha_hora_inicio']));
			$data['evento']['h_i_meridiano'] = date("a", strtotime($data['evento']['fecha_hora_inicio']));

			$data['evento']['fecha_fin'] = date("Y-m-d", strtotime($data['evento']['fecha_hora_fin']));
			$data['evento']['hora_fin'] = date("h:i", strtotime($data['evento']['fecha_hora_fin']));
			$data['evento']['h_f_meridiano'] = date("a", strtotime($data['evento']['fecha_hora_fin']));

			//Si se envía una petición POST...
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				//Si los datos del evento son válidos...
	            if ($this->ValidarEvento($data) === false) {

	            	//Si se cambió la imagen del evento...
	            	if (isset($_POST['img-change']) && isset($_FILES["imagen"]) && $_FILES["imagen"]["name"] != '' ) {
	            		
		            	$ruta 		= './assets/img/eventos/';
				        $nombre 	= base64_encode($this->input->post('titulo'))."_".$this->input->post('fecha_inicio')."_".$this->input->post('fecha_fin');
				        $file_info 	= $this->ImagenModel->SubirImagen($data,$ruta,$nombre);

				        //Si el archivo se cargó correctamente...
				        if ($file_info != false) {
				        	$data['evento']['img'] = $file_info['file_name'];
				        }
	            	}

	            	//Si el archivo fue declarado...
			        if (!isset($file_info) || (isset($file_info) && $file_info != false)) {
	            		
	            		$fecha_inicio = $this->input->post('fecha_inicio');
						$fecha_fin 	 = $this->input->post('fecha_fin');

						$hora_inicio = $this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano');
		        		$hora_fin 	 = $this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano');

		        		$data = $this->EventoModel->ValidarFechaHora($fecha_inicio, $fecha_fin, $hora_inicio, $hora_fin, $data);

		        		//Si las fechas del evento son válidas...
		        		if ($data['status'] === true) {

		        			$fecha_hora_inicio = $fecha_inicio." ".$hora_inicio;
		        			$fecha_hora_fin = $fecha_fin." ".$hora_fin;

		        			$condicion = array(
				        			'where' => array(
				        				'titulo' => $this->input->post('titulo'),
				        				'fecha_hora_inicio' => $fecha_hora_inicio,
				        				'fecha_hora_fin' => $fecha_hora_fin,
				        				"MD5(concat('sismed',id)) != " => $id_evento
				        				)
				        			);

		        			//Si los datos del evento son correctos...
		        			if (!$this->EventoModel->ValidarEvento($condicion)) {

						        $file_info = $this->upload->data();						        

		        				$condicion = array(	
		        					"data" => array(
						                "id_usuario" => $this->session->userdata('idUsuario'),
						                "titulo" => $this->input->post('titulo'),
						                "descripcion" => $this->input->post('descripcion'),
						                "fecha_hora_inicio" => $fecha_hora_inicio,
						                "fecha_hora_fin" => $fecha_hora_fin,
						                "img" =>  $data['evento']['img']
						            ),
						     		"where" => array("MD5(concat('sismed',id))" => $id_evento)
								);

		        				//Si la modificación es exitosa...
			        			if ($this->EventoModel->ModificarEvento($condicion)) {

			        				set_cookie("message","El evento <strong>'".$this->input->post('titulo')."'</strong> fue registrado exitosamente!...", time()+15);
									header("Location: ".base_url()."Evento/ListarEventos");

								//Si ocurre un error en la modificación...
								}else{

									$data['mensaje'] = $this->db->error();
								}

							//Si los datos coinsiden con un evento registrado...
		        			}else{
		        				$data['mensaje'] = "Ya existe un evento registrado con el mismo título y fechas de inicio y fin.";
		        			}
		        		}

	        		//Si no se pudo cargar el archivo...
		        	}else{
		        		$data['mensaje'] = $this->upload->display_errors();	
		        	}
				}
			}

		//Si no se encontraron registros...
		}else{
			$data['mensaje'] = $this->db->error();
		}

		//Se carga la vista del formulario para modificar eventos
		$this->load->view('admin/FormularioRegistroEvento', $data);
	}

	/**
	 * Elimina un evento de la base de datos. El id del evento se envía
	 * por Ajax como un POST
	 *
	 * @return 	void 
	 */
	public function EliminarEvento()
	{
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
	public function ListarEventos()
	{
		$condicion = array(
			"select" => "id, titulo, descripcion, fecha_hora_inicio",
			"where" => array("id_usuario" => $this->session->userdata('idUsuario')),
			"order_by" => "id ASC"
			);

		$data = array();

		$result = $this->EventoModel->ExtraerEvento($condicion);

		///if ($result->num_rows() > 0) {
			
		$data["eventos"] = $result;
		$this->load->view('admin/ListarEventos', $data);
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
        	
			$this->load->view('admin/FormularioRegistroEvento', $data);

		//Si hay datos inválidos...
        }else{
			return false;
		}
	}	
}