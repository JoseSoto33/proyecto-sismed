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

    /**
     * @method void AgregarInsumo()
     * @method void ModificarInsumo(integer $id_insumo)
     * @method void EliminarInsumo()
     * @method void ListarInsumos()
     * @method void ExtraerLotes()
     * @method void|boolean ValidarInsumo(mixed[] $data, integer $operacion)
     */

    /**
     * Muestra la interfaz del formulario para registrar un nuevo insumo, o registra un nuevo 
     * insumo en la base de datos, si se llama a este método mediante una petición POST.     
     *
     * @return void
     */
  	public function AgregarInsumo()
 	{
 		$this->load->model('InventarioModel');

 		$data = array("titulo" => "Agregar nuevo Insumo");

		//Si se envió una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {	

            //Si los datos de registro son correctos...
			if ($this->ValidarInsumo($data, 0) === false) {
				//Si la Insumo se agrega exitosamente a la base de datos...
	        	if ($this->InventarioModel->AgregarInsumo()) {

    				set_cookie("message","El insumo <strong>'".$this->input->post('insumo')."'</strong> fue registrado exitosamente!...", time()+15);
					header("Location: ".base_url()."Inventario/ListarInsumos"); //controlador y metododo del controlador que carga la vista

				//Si hay error en la inserción
				}else{
					$data['mensaje'] = $this->db->error();					
				}
			}

		}
		$this->CargarHeader();
        $this->load->view('stock/FormularioRegistroInsumo', $data);
        $this->load->view('footer');
 	}

 	/**
	 * Muestra el formulario para modificar los datos de un insumo, o realiza la modificación de los datos si se llama a éste método mediante un POST
	 *
	 * @param null|integer $id_insumo Identificador único del insumo
	 *
	 * @return void
	 */
	public function ModificarInsumo($id_insumo = null)
	{
		$this->load->model('InventarioModel');

		list($id, $operacion) = explode("_", $id_insumo);
		$data = array("titulo" => "Modificar datos del insumo");

		$cond = array(
				"where" => array(
					"MD5(concat('sismed',id))" => $id
					)
				);
		if($operacion === "stock")
		{
			$result = $this->InventarioModel->ExtraerInsumo($cond);
			//Si los registros encontrados son más de 0...
			if ($result->num_rows() > 0) {
				

				$data['insumo'] = $result->row_array(); 
				list($data['insumo']['numero'], $data['insumo']['contenido']) = explode("-", $data['insumo']['contenido']);
				//var_dump($data['insumo']);
				// guarda lo que se trae de la bdd en la variable $data['Insumo'] , como un arreglo asosiativo con el nombre de las columnas en la bdd
				//var_dump($data['Insumo']);
				//Si se envía una petición POST...
				if ($_SERVER["REQUEST_METHOD"] == "POST") { //Metodo que se utiliza para pasar datos de un formulario

				  	if($this->ValidarInsumo($data, 1) === FALSE)
				  	{
					//var_dump($_POST);
						$condicion = array(
							"data" => array(
								"insumo" => $this->input->post('insumo'),
								"tipo_insumo" => $this->input->post('tipo_insumo'),
								"contenido" => $this->input->post('numero')."-".$this->input->post('contenido'),
								"descripcion" => $this->input->post('descripcion')
								),
				            	"where" => array("MD5(concat('sismed',id))" => $id) // codifica y compara el campo id de la tabla Insumo con el id que se envia desde el formulario
				            );
						//var_dump($condicion);
					//Si se realiza la modificación exitosamente...
						if ($this->InventarioModel->ModificarInsumo($condicion)) {

							
							set_cookie("message","Datos del insumo <strong>'".$this->input->post('insumo')."'</strong> modificados exitosamente!...", time()+15);
							header("Location: ".base_url()."Inventario/ListarInsumos");

						//Si ocurre un error durante la modificación...
						}else{
							$data['mensaje'] = $this->db->error();
						}
					}
					
				}
			}

		}else if ($operacion === "lote"){

			$result = $this->InventarioModel->ExtraerLote($cond);
			//Si los registros encontrados son más de 0...
			if ($result->num_rows() > 0) {
				
				$data['insumo'] = $result->row_array(); // guarda lo que se trae de la bdd en la variable $data['Insumo'] , como un arreglo asosiativo con el nombre de las columnas en la bdd
				//var_dump($data['Insumo']);
				//Si se envía una petición POST...
				if ($_SERVER["REQUEST_METHOD"] == "POST") { //Metodo que se utiliza para pasar datos de un formulario

				  	if($this->ValidarInsumo($data, 2) === FALSE)
				  	{
					//var_dump($_POST);
						$condicion = array(
							"data" => array(
								"cantidad" => $this->input->post('cantidad'),
								"unidad_medida" => $this->input->post('unidad_medida'),
								"fecha_elaboracion" => $this->input->post('fecha_elaboracion'),
								"fecha_vencimiento" => $this->input->post('fecha_vencimiento')
								),
				            	"where" => array("MD5(concat('sismed',id))" => $id) // codifica y compara el campo id de la tabla Insumo con el id que se envia desde el formulario
				            );
						//var_dump($condicion);
					//Si se realiza la modificación exitosamente...
						if ($this->InventarioModel->ModificarInsumo($condicion)) {

							
							set_cookie("message","Datos del insumo <strong>'".$this->input->post('insumo')."'</strong> modificados exitosamente!...", time()+15);
							header("Location: ".base_url()."Inventario/ListarInsumos");

						//Si ocurre un error durante la modificación...
						}else{
							$data['mensaje'] = $this->db->error();
						}
					}
					
				}
			}

		}
		$data["operacion"] = $operacion;

		$this->CargarHeader();
        $this->load->view('stock/FormularioRegistroInsumo', $data);
        $this->load->view('footer');		
	}

	/**
	 * Cambia el estatus de un insumo determinado de activo a inactivo y viceversa 
	 *
	 * @return void
	 */
	public function EliminarInsumo()
	{
		$this->load->model('InventarioModel');

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
		if ($this->InventarioModel->ModificarInsumo($condicion)) {
			
			$data['result']  = true;
			$data['message'] = "Operación exitosa!... El listado se recargará en breve...";

		//Si ocurre un error durante la modificación...
		}else{
			$data['result']  = false;
			$data['message'] = "Error: Ha ocurrido un problema durante la eliminación.\n".$this->db->error();
		}
		
		echo json_encode($data);
	}

	/**
	 * Muestra un listado de los insumos registrados en el sistema.
	 *
	 * @return void
	 */
	public function ListarInsumos()
	{
		$this->load->model('InventarioModel');

		$condicion = array(
			"order_by" => array("campo" => "id", "direccion" => "ASC")
			);

		$data = array();

		$result = $this->InventarioModel->ExtraerInsumo($condicion);
	
		$data["insumos"] = $result; // la posicion del $data debe tener el mismo nombre que en el formulario de listar

		$this->CargarHeader();
        $this->load->view('stock/ListarInsumos', $data);
        $this->load->view('footer');

		/*switch ($this->session->userdata('tipo_usuario')) {				
				
			//Si el tipo de usuario es "Doctor"...
			case "Doctor":
				//$this->load->view('admin/header');					
				$this->load->view('medicina/doctor/header');
				$this->load->view('medicina/ListarInsumos', $data);//Cargar vista del listado de Insumos
				$this->load->view('medicina/doctor/footer');						
				break;

			//Si el tipo de usuario es "Enfermero"...
			case "Enfermero":
				$this->load->view('medicina/enfermero/header');				
				$this->load->view('medicina/ListarInsumos', $data);//Cargar vista del listado de Insumos
				$this->load->view('medicina/enfermero/footer');					
				break;

			//Si el tipo de usuario es "Odontólogo"...
			case "Odontólogo":
				$this->load->view('odontologia/index',$data);
				break;

			//Si el tipo de usuario es "Bioanalista"...
			case "Bioanalista":
				$this->load->view('laboratorio/index',$data);
				break;

			//Si el tipo de usuario es "Nutricionista"...
			case "Nutricionista":
				$this->load->view('nutricion/index',$data);
				break;

			//Si el tipo de usuario es "Asistente"...
			case "Asistente":
				$this->load->view('nutricion/index',$data);
				break;
		}*/
		
	}

	/**
	 * Extrae de la base de datos la información sobre los lotes de un insumo registrado.
	 *
	 * @return void
	 */
	public function ExtraerLotes()
	{
		$this->load->model('InventarioModel');
		
		$condicion = array(
			'where' => array("MD5(concat('sismed',id_insumo))" => $this->input->post('id')),
			"order_by" => array("campo" => "id", "direccion" => "ASC")
			);

		$data = array();

		$result = $this->InventarioModel->ExtraerLote($condicion);		

		if ($result->num_rows() > 0) {
            
            setlocale(LC_TIME,"esp");

            foreach ($result->result() as $key => $row) {
                $row->id = md5('sismed'.$row->id);
                $row->fecha_registro = strftime('%d de %B de %Y', strtotime($row->fecha_registro));
                $row->fecha_elaboracion = strftime('%d de %B de %Y', strtotime($row->fecha_elaboracion));
                $row->fecha_vencimiento = strftime('%d de %B de %Y', strtotime($row->fecha_vencimiento));
            }

            $data['result'] = true;
            $data['data'] = $result->result();

        }else{
        	$data['result'] = false;
        }

        

        echo json_encode($data);
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

		if ($operacion == 0 || $operacion == 1) {
			# code...
			$this->form_validation->set_rules(
			        'insumo', 'Insumo',
			        array('required','max_length[60]','min_length[1]'),		        	
			        array(  
			        	'required'   	=> 'Debe insertar un %s.',
		                'max_length'    => 'El nombre del %s debe terner un máximo de 60 caracteres',
		                'min_length'    => 'El campo no debe estar vacio'
		                
			        )
			);

			
			$this->form_validation->set_rules(
			        'tipo_insumo', 'Tipo de insumo', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
			        array('required'),		        	
			        array( 
			        	'required'    => 'El campo %s no debe estar vacio.'
			             )
			);


			$this->form_validation->set_rules(
			        'numero', 'numero', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
			        array('is_numeric','required'),	        	
			        array( 
			        	'is_numeric'  => 'El campo %s debe ser númerico',
			        	'required'    => 'El campo %s no debe estar vacio.'     
			        )
			);  

			$this->form_validation->set_rules(
			        'contenido', 'contenido', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
			        array('required'),	        	
			        array( 
			        	'required'  => 'El campo %s no puede estar vacío.'     
			        )
			);

			$this->form_validation->set_rules(
			        'descripcion', 'Descripcion', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
			        array('required','max_length[60]','min_length[12]'),	        	
			        array( 
			        	'required'   => 'Debe ingresar al menos una %s',
			        	'max_length' => 'El campo %s no debe contener más de 60 carácteres',
			        	'min_length' => 'La %s debe contener al menos 12 carácteres'     
			        )
			);
		}

		if ($operacion == 0 || $operacion == 2) {
			# code...
			$this->form_validation->set_rules(
			        'cantidad', 'Cantidad', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
			        array('numeric','required'),	        	
			        array( 
			        	'numeric'  => 'El campo %s debe ser númerico',
			        	'required'    => 'Debe ingresar una %s'          
			        )
			);  

			$this->form_validation->set_rules(
			        'unidad_medida', 'Unidad de Medida', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
			        array('required'),	        	
			        array( 
			        	'required'   => 'Debe ingresar al menos una %s'      
			        )
			);   

			
			$this->form_validation->set_rules(
			        'fecha_elaboracion', 'Fecha de Elaboracion', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
			        array('required'),	        	
			        array( 
			        	'required'   => 'Debe ingresar al menos una %s'      
			        )
			);
			$this->form_validation->set_rules(
			        'fecha_vencimiento', 'Fecha de Vencimiento', // el primero corresponde al nombre del campo del formulario y el segundo a el nombre que aparecera por pantalla en las validaciones
			        array('required'),	        	
			        array( 
			        	'required'   => 'Debe ingresar al menos una %s'      
			        )
			);
		}
		
		//Si algún dato es incorrecto...
		if ($this->form_validation->run() == FALSE) {

			$this->CargarHeader();
	        $this->load->view('stock/FormularioRegistroInsumo', $data);
	        $this->load->view('footer');						
			
		//Si los datos son correctos...		
		}else{

			return false;
		}
	}

}