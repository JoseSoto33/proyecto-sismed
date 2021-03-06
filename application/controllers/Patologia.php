<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patologia extends CI_Controller {

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
        /*
        if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Administrador") {
        	redirect(base_url('Home')); 
        }*/
    }

  	public function AgregarPatologia()
 	{
		$this->load->model('PatologiaModel');

 		$data = array("titulo" => "Agregar nueva patologia");

		//Si se envió una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {	

            //Si los datos de registro son correctos...
			if ($this->ValidarPatologia($data, 0) === false) {
				//Si la patologia se agrega exitosamente a la base de datos...
	        	if ($this->PatologiaModel->AgregarPatologia()) {

    				set_cookie("message","La Patología <strong>'".$this->input->post('patologia')."'</strong> fue registrada exitosamente!...", time()+15);
					header("Location: ".base_url()."Patologia/ListarPatologias"); //controlador y metododo del controlador que carga la vista

				//Si hay error en la inserción
				}else{

					$data['mensaje'] = $this->db->error();
				}
			}

		}

		$this->CargarHeader();
        $this->load->view('patologias/FormularioRegistroPatologia', $data);
        $this->load->view('footer');		
 	}
 	
	public function ModificarPatologia($id_patologia = null)
	{
		$this->load->model('PatologiaModel');

		$data = array("titulo" => "Modificar datos de la Patologia");

		$cond = array(
				"where" => array(
					"MD5(concat('sismed',id))" => $id_patologia
					)
				);

		$result = $this->PatologiaModel->ExtraerPatologia($cond);
		//Si los registros encontrados son más de 0...
		if ($result->num_rows() > 0) {
			
			$data['patologia'] = $result->row_array(); // guarda lo que se trae de la bdd en la variable $data['patologia'] , como un arreglo asosiativo con el nombre de las columnas en la bdd
			//var_dump($data['patologia']);
			//Si se envía una petición POST...
			if ($_SERVER["REQUEST_METHOD"] == "POST") {

			  	if($this->ValidarPatologia($data, 1) === FALSE)
			  	{
				//var_dump($_POST);

					$condicion = array(
						"data" => array(
							"nombre" => $this->input->post('patologia'),
			     			"descripcion" => $this->input->post('descripcion')
							),
			            	"where" => array("MD5(concat('sismed',id))" => $id_patologia) // codifica y compara el campo id de la tabla patologia con el id que se envia desde el formulario
			            );
					//var_dump($condicion);
				//Si se realiza la modificación exitosamente...
					if ($this->PatologiaModel->ModificarPatologia($condicion)) {
						
						set_cookie("message","Datos de la patología <strong>'".$this->input->post('patologia')."'</strong> modificados exitosamente!...", time()+15);
						header("Location: ".base_url()."Patologia/ListarPatologias");

					//Si ocurre un error durante la modificación...
					}else{
						$data['mensaje'] = $this->db->error();
					}
				}
				
			}
		}

		$this->CargarHeader();
        $this->load->view('patologias/FormularioRegistroPatologia', $data);
        $this->load->view('footer');	
	}

	public function EliminarPatologia()
	{
		$this->load->model('PatologiaModel');

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
		if ($this->PatologiaModel->ModificarPatologia($condicion)) {
			
			$data['result']  = true;
			$data['message'] = "Operación exitosa!... El listado se recargará en breve...";

		//Si ocurre un error durante la modificación...
		}else{
			$data['result']  = false;
			$data['message'] = "Error: Ha ocurrido un problema durante la eliminación.\n".$this->db->error();
		}
		
		echo json_encode($data);
	}

	public function ListarPatologias()
	{
		$this->load->model('PatologiaModel');

		$condicion = array(
			"order_by" => array("campo" => "id", "direccion" => "ASC")
			);

		$data = array();

		$result = $this->PatologiaModel->ExtraerPatologia($condicion);
	
		$data["patologias"] = $result;

		$this->CargarHeader();
        $this->load->view('patologias/ListarPatologias', $data);
        $this->load->view('footer');
	}

	/**
	* Verifica que los datos de la Patologia ingresados en el formulario de registro y modificación cumplan con las reglas de integridad
	*
	* @param mixed[] $data Arreglo con información que se enviará a la vista
	* @param integer $operación Valor numérico que identifica la acción que se realiza
	*		0 -> Registro de usuario
	*		1 -> Modificación de datos de usuario
	*
	* @return void|boolean
	*/
	public function ValidarPatologia($data, $operacion)
	{
		$validar_patologia = array('required','min_length[3]','max_length[50]','regex_match[/([0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ])+$/]');
		$mensaje_patologia = array( 
	        	'min_length'    => 'La %s debe tener al menos 3 caracteres.',
	            'max_length'    => 'La %s debe tener máximo 50 caracteres.',
	            'regex_match'  	=> 'La %s no pueden contener caracteres especiales, sólo se permiten caracteres alfanumericos',
	            'required'   	=> 'Debe insertar un %s.'
	        );

		//Si la operación es un registro de patologia...
		if ($operacion == 0) {

			$validar_patologia[] = 'is_unique[patologia.nombre]';
			$mensaje_patologia['is_unique'] = 'La %s ya existe';

		}elseif ($operacion == 1 && isset($data['patologia']))  {

			//Si la patologia almacenada es diferente a la ingresada por formulario...
		 	if (strcmp($data['patologia']['nombre'], $_POST['patologia']) != 0) {
				
				$nombre_validacion[] = 'is_unique[patologia.nombre]';
				$nombre_respuestas['is_unique'] = 'La %s ya ha sido registrada anteriormente.';
			}
		}

		$this->form_validation->set_rules('patologia', 'Patología',$validar_patologia,$mensaje_patologia);

		$this->form_validation->set_rules(
		        'descripcion', 'Descripción', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
		        array('min_length[16]','max_length[255]'),		        	
		        array( 
		        	'min_length'    => 'La %s debe tener al menos 16 caracteres.',
		            'max_length'    => 'La %s debe tener máximo 255 caracteres.'
		                 
		        )
		);      

		//Si algún dato es incorrecto...
		if ($this->form_validation->run() == FALSE) {

			$this->CargarHeader();
	        $this->load->view('patologias/FormularioRegistroPatologia', $data);
	        $this->load->view('footer');			
			
		//Si los datos son correctos...		
		}else{

			return false;
		}
	}

	/**
	 * Extrae de la base de datos las patologías registradas y las devuelve en un objeto JSON
	 *
	 * @return void
	 */
	public function ExtraerPatologia()
	{
		$this->load->model('PatologiaModel');
		
		/*
		if (isset($_POST["edit"]) && !empty($_POST["edit"])) {
			
			$condicion = array(
	            "where" => array("status" => TRUE),
	            "order_by" => array("campo" => "id", "direccion" => "ASC")
	            );

			$data = json_decode(stripslashes($_POST['edit']));			

			foreach ($data->selected as $key => $patologia) {
				
				$condicion["wheres"][] = array("id !=" => $patologia->id);
			}
		}else*/
		if (isset($_POST["id_vacuna"]) && !empty($_POST["id_vacuna"])) {
			
			$condicion = array(
				"select" => "patologia.id",
	            "where" => array("patologia.status" => TRUE, "MD5(concat('sismed',vacuna_patologia.id_vacuna))" => $_POST["id_vacuna"]),
	            "order_by" => array("campo" => "patologia.id", "direccion" => "ASC")
	            );

			$condicion["join"] = array(
				"tabla" => "vacuna_patologia",
				"condicion" => "patologia.id = vacuna_patologia.id_patologia"
				);

			$result = $this->PatologiaModel->ExtraerPatologia($condicion);

			$condicion = array(
				"where" => array("status" => TRUE),
	            "order_by" => array("campo" => "id", "direccion" => "ASC")
	            );

			if ($result->num_rows() > 0) {
				
				foreach ($result->result_array() as $key => $row) {
				
					$where_not_in[] = $row["id"];
				}

				$condicion["where_not_in"] = array("campo" => "id", "data" => $where_not_in);
			}

		}else{

			$condicion = array(
	            "where" => array("status" => TRUE),
	            "order_by" => array("campo" => "id", "direccion" => "ASC")
	            );
		}

		$result = $this->PatologiaModel->ExtraerPatologia($condicion);

		echo json_encode($result->result());
		/*
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			
			$condicion = array("where" => array('id !=' => $_POST['id']));

			$result = $this->PatologiaModel->ExtraerPatologia($condicion);
		}else{

			$result = $this->PatologiaModel->ExtraerPatologia(array());
		}*/

		//echo json_encode($result->result());
	}
}