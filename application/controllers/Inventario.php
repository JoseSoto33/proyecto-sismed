<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

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

  	public function AgregarInsumo()
 	{
 		$data = array("titulo" => "Agregar nuevo Insumo");

		//Si se envió una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {	

            //Si los datos de registro son correctos...
			if ($this->ValidarInsumo($data, 0) === false) {
				//Si la Insumo se agrega exitosamente a la base de datos...
	        	if ($this->InsumoModel->AgregarInsumo()) {

    				set_cookie("message","El insumo <strong>'".$this->input->post('insumo')."'</strong> fue registrada exitosamente!...", time()+15);
					header("Location: ".base_url()."Inventario/ListarInsumos"); //controlador y metododo del controlador que carga la vista

				//Si hay error en la inserción
				}else{

					$data['mensaje'] = $this->db->error();
				}
			}

		}else{

			$this->load->view('medicina/FormularioRegistroInsumo', $data);//Se carga la vista del formulario de registro de Insumo
		}
 	}
	public function ModificarInsumo($id_insumo = null)
	{
		$data = array("titulo" => "Modificar datos del insumo");

		$cond = array(
				"where" => array(
					"MD5(concat('sismed',id))" => $id_insumo
					)
				);

		$result = $this->InsumoModel->ExtraerInsumo($cond);
		//Si los registros encontrados son más de 0...
		if ($result->num_rows() > 0) {
			
			$data['insumo'] = $result->row_array(); // guarda lo que se trae de la bdd en la variable $data['Insumo'] , como un arreglo asosiativo con el nombre de las columnas en la bdd
			//var_dump($data['Insumo']);
			//Si se envía una petición POST...
			if ($_SERVER["REQUEST_METHOD"] == "POST") { //Metodo que se utiliza para pasar datos de un formulario

			  	if($this->ValidarInsumo($data, 1) === FALSE)
			  	{
				//var_dump($_POST);
			  		$cantidad = $data['insumo']['cantidad'] + $this->input->post('cantidad');
					$condicion = array(
						"data" => array(
							"insumo" => $this->input->post('insumo'),
			     			"descripcion" => $this->input->post('descripcion'),
			     			"cantidad" => $this->input->post('cantidad'),
			     			"almacen" => $this->input->post('almacen'),
			     			"tipo_insumo" => $this->input->post('tipo_insumo')
							),
			            	"where" => array("MD5(concat('sismed',id))" => $id_insumo) // codifica y compara el campo id de la tabla Insumo con el id que se envia desde el formulario
			            );
					//var_dump($condicion);
				//Si se realiza la modificación exitosamente...
					if ($this->InsumoModel->ModificarInsumo($condicion)) {
						
						set_cookie("message","Datos del insumo <strong>'".$this->input->post('insumo')."'</strong> modificados exitosamente!...", time()+15);
						header("Location: ".base_url()."Insumo/ListarInsumos");

					//Si ocurre un error durante la modificación...
					}else{
						$data['mensaje'] = $this->db->error();
					}
				}
				
			}
		}

		$this->load->view('medicina/FormularioRegistroInsumo', $data);//Se carga la vista del formulario para modificar una patolohia...

			
	}
	public function EliminarInsumo()
	{
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
		if ($this->InsumoModel->ModificarInsumo($condicion)) {
			
			$data['result']  = true;
			$data['message'] = "Operación exitosa!...";

		//Si ocurre un error durante la modificación...
		}else{
			$data['result']  = false;
			$data['message'] = "Error: Ha ocurrido un problema durante la eliminación.\n".$this->db->error();
		}
		
		echo json_encode($data);
	}
	public function ListarInsumos()
	{
		$condicion = array(
			"order_by" => array("campo" => "id", "direccion" => "ASC")
			);

		$data = array();

		$result = $this->InsumoModel->ExtraerInsumo($condicion);
	
		$data["Insumos"] = $result;

		$this->load->view('medicina/ListarInsumos', $data);//Cargar vista del listado de Insumos
	}
	/**
	* Verifica que los datos de la Insumo ingresados en el formulario de registro y modificación cumplan con las reglas de integridad
	*
	* @param mixed[] $data Arreglo con información que se enviará a la vista
	* @param integer $operación Valor numérico que identifica la acción que se realiza
	*		0 -> Registro de usuario
	*		1 -> Modificación de datos de usuario
	*
	* @return void|boolean
	*/
	public function ValidarInsumo($data, $operacion)
	{
		$validar_insumo = array('required','min_length[8]','max_length[255]','regex_match[/([0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ])+$/]');
		$mensaje_insumo = array( 
	        	'min_length'    => 'La %s debe tener al menos 8 caracteres.',
	            'max_length'    => 'La %s debe tener máximo 255 caracteres.',
	            'regex_match'  	=> 'La %s no pueden contener caracteres especiales, sólo se permiten caracteres alfanumericos',
	            'required'   	=> 'Debe insertar un %s.'
	        );

		//Si la operación es un registro de Insumo...
		if ($operacion == 0) {

			$validar_insumo[] = 'is_unique[stock.insumo]'; //tabla y campo de la tabla
			$mensaje_insumo['is_unique'] = 'La %s ya existe';

		}elseif ($operacion == 1 && isset($data['insumo']))  {

			//Si la Insumo almacenada es diferente a la ingresada por formulario...
		 	if (strcmp($data['insumo']['nombre'], $_POST['insumo']) != 0) {
				
				$nombre_validacion[] = 'is_unique[insumo.nombre]';
				$nombre_respuestas['is_unique'] = 'La %s ya ha sido registrada anteriormente.';
			}
		}

		$this->form_validation->set_rules('insumo', 'Insumo',$validar_insumo,$mensaje_insumo);

		$this->form_validation->set_rules(
		        'descripcion', 'Descripción', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
		        array('min_length[8]','max_length[255]'),		        	
		        array( 
		        	'min_length'    => 'La %s debe tener al menos 8 caracteres.',
		            'max_length'    => 'La %s debe tener máximo 255 caracteres.'
		                 
		        )
		);

		$this->form_validation->set_rules(
		        'cantidad', 'Cantidad', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
		        array('is_numeric',	'required'),	        	
		        array( 
		        	'is_numeric'  => 'La $s debe ser númerica',
		        	'required'    => 'Debe ingresar una %s'          
		        )
		);  

		$this->form_validation->set_rules(
		        'tipo_insumo', 'tipo de insumo', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
		        array('required','min_length[4]','max_length[30]','regex_match[/([0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ])+$/]'),	        	
		        array( 
		        	'required'   => 'Debe ingresar un %s',
		        	'min_length' => 'El %s debe tener al menos 4 caracteres.',
		        	'max_length' => 'El %s debe tener máximo 30 caracteres.',
		        	'regex_match'=> 'El %s no pueden contener caracteres especiales, sólo se permiten caracteres alfanumericos';        
		        )
		);     

		//Si algún dato es incorrecto...
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('medicina/FormularioRegistroInsumo', $data);
			
		//Si los datos son correctos...		
		}else{

			return false;
		}
	}
}