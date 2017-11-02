<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Controller {

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
     * @method void AgregarConsulta()
     * @method void ModificarConsulta(integer $id_consulta)
     * @method void VerConsulta()
     * @method void|boolean ValidarConsulta(mixed[] $data)
     */

    /**
     * Agrega una nueva consulta a la base de datos
     *
     * La consulta puede ser:
     * - Médica curativa (Tipo 1)
     * - Médica preventiva (Tipo 2)
     * - Odontológica (Tipo 3)
     * - Nutricional (Tipo 4)
     *
     * @param integer $param Deberá contener el código de la historia clínica encriptada con MD5, 
     * concatenado a un valor numérico que representa el tipo de consula
     * - 1: Consulta Médica Curativa
     * - 2: Consulta Médica Preventiva
     * - 3: Consulta Odontológica
     * - 4: Consulta de Nutrición
     */
    public function AgregarConsulta($param)
    {
        $this->load->model('HistoriaModel');
        $this->load->model('PacienteModel');
        $this->load->model('ConsultaModel');
        list($cod_historia, $tipo) = explode("_", $param);
        $data = array(
            'tipo_consulta' => $tipo,
            'cod_historia' => $cod_historia
            );

        $condicion = array(
            'select' => "id_paciente, cod_historia",
            'where' => array("MD5(concat('sismed',cod_historia))" => $cod_historia)
            );

        $result = $this->HistoriaModel->ExtraerHistoria($condicion)->row_array();

        $condicion = array(
            'where' => array("id" => $result['id_paciente'])
            );

        $data['paciente'] = $this->PacienteModel->ExtraerPaciente($condicion)->row_array();
        $data['paciente']['cod_historia'] = $result['cod_historia'];

        switch ($tipo) {
            case '1':
                $data['titulo'] = "Agregar Consulta Médica Curativa";
                $query['table'] = "consulta_curativa";
                break;
            
            case '2':
                $data['titulo'] = "Agregar Consulta Médica Preventiva";
                $query['table'] = "consulta_preventiva";
                break;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if (!$this->ValidarConsulta($data)) {
                
                $query['insert'] = $_POST;
                $query['insert']['id_usuario'] = $this->session->userdata('idUsuario');
                $query['insert']['cod_historia'] = $result['cod_historia'];
                $query['insert']['tipo'] = $tipo;

                $dond = array(
                    'where' => array(
                        'id_usuario' => $this->session->userdata('idUsuario'),
                        'tipo' => $tipo,
                        'cod_historia' => $result['cod_historia'],
                        'EXTRACT(YEAR FROM fecha_creacion) =' => date('Y'),
                        'EXTRACT(MONTH FROM fecha_creacion) =' => date('m'),
                        'EXTRACT(DAY FROM fecha_creacion) =' => date('d')
                        )
                    );

                if(!$this->ConsultaModel->ValidarConsulta($dond)){

                    if ($this->ConsultaModel->AgregarConsulta($query)) {
                        
                        switch ($tipo) {
                            case '1':
                                set_cookie("cura_message","La consulta curativa fue registrada exitosamente!...", time()+25);
                                break;
                            
                            case '2':
                                set_cookie("prev_message","La consulta preventiva fue registrada exitosamente!...", time()+25);
                                break;
                        }

                        header("Location: ".base_url()."historiaClinica/ConsultarHistoriaClinica/".$cod_historia); //controlador y metododo del controlador que carga la vista
                    }else{
                        $data['mensaje'] = $this->db->error();
                    }

                }else{
                    $data['mensaje'] = "Usted ya ha registrado una consulta de este tipo para la historia Nº ".$result['cod_historia']." el día de hoy...<br />".$this->db->last_query();
                }

                $this->load->view('medicina/FormularioConsultaMedica', $data);
            }

        }else{

            $this->load->view('medicina/FormularioConsultaMedica', $data);
        }

    }

    /**
     * Muestra el formulario para modificar los datos de una consulta, o realiza la modificación de los datos si se llama a éste método mediante un POST
     *
     * @param null|integer $consulta Identificador único de la consulta
     *
     * @return void 
     */
    public function ModificarConsulta($consulta)
    {
        $this->load->model('HistoriaModel');
        $this->load->model('PacienteModel');
        $this->load->model('ConsultaModel');
        $data = array("titulo" => "Modificar datos de consulta");

        list($id_consulta, $cod_historia, $tipo_consulta) = explode("_", $consulta);

        $data = array(
            'tipo_consulta' => $tipo_consulta,
            'cod_historia' => $cod_historia
            );

        $condicion = array(
            'select' => "id_paciente, cod_historia",
            'where' => array("MD5(concat('sismed',cod_historia))" => $cod_historia)
            );

        $result = $this->HistoriaModel->ExtraerHistoria($condicion)->row_array();

        $condicion = array(
            'where' => array("id" => $result['id_paciente'])
            );

        $data['paciente'] = $this->PacienteModel->ExtraerPaciente($condicion)->row_array();
        $data['paciente']['cod_historia'] = $result['cod_historia'];

        $condicion = array();

        switch ($tipo_consulta) {
            case '1':
                $data['titulo'] = "Agregar Consulta Médica Curativa";
                $query['table'] = "consulta_curativa";

                $condicion['select'] = "consulta.*, patologia.nombre AS patologia";
                $condicion['from'] = "consulta_curativa AS consulta";
                $condicion['join'] = array(
                    "tabla" => "patologia",
                    "condicion" => "consulta.id_patologia = patologia.id",
                    "tipo" => "left"
                    );
                $condicion['where'] = array(
                    "MD5(concat('sismed',consulta.id))" => $id_consulta,
                    "consulta.tipo" => $tipo_consulta
                    );
                break;
            case '2':     
                $data['titulo'] = "Agregar Consulta Médica Preventiva";
                $query['table'] = "consulta_preventiva";

                $condicion['select'] = "consulta.*, patologia.nombre AS patologia";
                $condicion['from'] = "consulta_preventiva AS consulta";
                $condicion['join'] = array(
                    "tabla" => "patologia",
                    "condicion" => "consulta.id_patologia = patologia.id",
                    "tipo" => "left"
                    );
                $condicion['where'] = array(
                    "MD5(concat('sismed',consulta.id))" => $id_consulta,
                    "consulta.tipo" => $tipo_consulta
                    );
                break;
        }

        $result = $this->ConsultaModel->ExtraerConsulta($condicion);

        //Si los registros encontrados son más de 0...
        if ($result->num_rows() > 0) {

            $data['consulta'] = $result->row_array();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
                if (!$this->ValidarConsulta($data)) {
                    
                    $query['data'] = $_POST;                                       

                    $query["where"] = array("MD5(concat('sismed',id))" => $id_consulta);

                    if ($this->ConsultaModel->ModificarConsulta($query)) {
                        
                        switch ($tipo_consulta) {
                            case '1':
                                set_cookie("cura_message","La modificación de la consulta curativa fue realizada exitosamente!...", time()+25);
                                break;
                            
                            case '2':
                                set_cookie("prev_message","La modificación de la consulta preventiva fue realizada exitosamente!...", time()+25);
                                break;
                        }

                        header("Location: ".base_url()."historiaClinica/ConsultarHistoriaClinica/".$cod_historia); //controlador y metododo del controlador que carga la vista
                    }else{
                        $data['mensaje'] = $this->db->error();
                    }
                }
            }

        }else{
            $data['message'] = $this->db->error();
        }

        $this->load->view('medicina/FormularioConsultaMedica', $data);
    }

    /**
     * 
     */
    public function VerConsulta()
    {

    }

    /**
     * Extrae de la base de datos el listado de las consultas realizadas a un paciente, según el tipo de consulta
     */
    public function ListarConsultas()
    {
        $this->load->model('ConsultaModel');
    	/**
         * @var string $cod_historia Contiene el código de la historia clínica al que pertenecen las consultas listadas
         * @var char $tipo_consulta Contiene el valor que define el tipo de consulta que se desea obtener:
         * - '1' para consultas curativas
         * - '2' para consultas preventivas
         * @var mixed[] $condicion Almacena las especificaciones de la cadena SQL que se ejecutará para obtener los registros
         * Posiciones del arreglo:
         * - 'select' string Contiene una cadena con los campos que se desea extraer con el formato "campo1, campo2, tabla.campo3"
         * - 'from' string Contiene el nombre de la tabla de donde se desea extraer los datos
         * - 'join' mixed[] Contiene los datos para realizar un JOIN
         *      - 'tabla' string Contiene el nombre de la tabla a la que se hace JOIN
         *      - 'condicion' string Contiene la condición que une a la tabla del FROM con la del JOIN con el formato "tabla_from.campo = tabla_join.campo"
         *      - 'tipo' string|null Define el tipo de JOIN. Puede ser left o right. Este campo es opcional
         * - 'where' mixed[] Contiene la configuración que define la condición general que debe cumplir la cadena SQL
         *      Formato:
         *      "campo1" => valor1,
         *      "campo2" => valor2
         *      ...
         */
        $cod_historia = $this->input->post("cod_historia");
        $tipo_consulta = $this->input->post("tipo_cons");
        $condicion = array();

        switch ($tipo_consulta) {
            case '1':
                $condicion['select'] = "consulta.*, patologia.nombre AS patologia, usuario.nombre1, usuario.nombre2, usuario.apellido1, usuario.apellido2";
                $condicion['from'] = "consulta_curativa AS consulta";
                $condicion['joins'] = array(
                    array(
                        "tabla" => "patologia",
                        "condicion" => "consulta.id_patologia = patologia.id",
                        "tipo" => "left"
                        ),
                    array(
                        "tabla" => "usuario",
                        "condicion" => "consulta.id_usuario = usuario.id",
                        "tipo" => "left"
                        )
                    );
                $condicion['where'] = array(
                    "consulta.cod_historia" => $cod_historia,
                    "consulta.tipo" => $tipo_consulta
                    );
                break;
            case '2':                
                $condicion['select'] = "consulta.*, patologia.nombre AS patologia, usuario.nombre1, usuario.nombre2, usuario.apellido1, usuario.apellido2";
                $condicion['from'] = "consulta_preventiva AS consulta";
                $condicion['joins'] = array(
                    array(
                        "tabla" => "patologia",
                        "condicion" => "consulta.id_patologia = patologia.id",
                        "tipo" => "left"
                        ),
                    array(
                        "tabla" => "usuario",
                        "condicion" => "consulta.id_usuario = usuario.id",
                        "tipo" => "left"
                        )
                    );
                $condicion['where'] = array(
                    "consulta.cod_historia" => $cod_historia,
                    "consulta.tipo" => $tipo_consulta
                    );
                break;
        }

        $condicion['order_by'] = array(
            "campo" => "fecha_creacion",
            "opcion" => "DESC"
            );

        $result = $this->ConsultaModel->ExtraerConsulta($condicion);

        if ($result->num_rows() > 0) {
            
            setlocale(LC_TIME,"esp");

            foreach ($result->result() as $key => $row) {
                $row->id = md5('sismed'.$row->id);
                $row->cod_historia = md5('sismed'.$row->cod_historia);
                $row->fecha_creacion = strftime('%d de %B de %Y', strtotime($row->fecha_creacion));

                //$nombre = $row->nombre1;

                if (isset($row->nombre2) && !empty($row->nombre2)) 
                    {$row->nombre1 .= " ".$row->nombre2;}

                $row->nombre1 .= " ".$row->apellido1;

                if (isset($row->apellido2) && !empty($row->apellido2)) 
                    {$row->nombre1 .= " ".$row->apellido2;}

                //$row->nombre1 = $nombre;
            }
        }

        echo json_encode($result->result());
    }

    /**
     * Verifica que los datos ingresados de la consulta, en el formulario de registro y modificación 
     * cumplan con las reglas de integridad
     *
     * @param mixed[] $data Arreglo con información que se enviará a la vista
     * 
     * @return void|boolean 
     */
    public function ValidarConsulta($data)
    {
        if ($data['tipo_consulta'] == 1 || $data['tipo_consulta'] == 2) {

            $this->form_validation->set_rules(
                    'motivo', 'Motivo', 
                    array('required'),                      
                    array(
                        'required'  => 'Debe ingresar el %s de la consulta.'
                        )                   
            );

            $this->form_validation->set_rules(
                    'enfermedad_actual', 'Enfermedad actual', 
                    array('required'),                      
                    array(
                        'required'  => 'Debe indicar la %s del paciente.'
                        )                   
            );

            $this->form_validation->set_rules(
                    'examen_medico_general', 'Examen Médico General', 
                    array('required'),                      
                    array(
                        'required'  => 'Debe ingresar el %s.'
                        )                   
            );

            $this->form_validation->set_rules(
                    'digestivo', 'Digestivo', 
                    array('required'),                      
                    array(
                        'required'  => 'Debe ingresar el %s.'
                        )                   
            );
            
            if ($data['tipo_consulta'] == 2) {

                $this->form_validation->set_rules(
                        'urogenital', 'Urogenital', 
                        array('required'),                      
                        array(
                            'required'  => 'El campo %s no debe estar vacío.'
                            )                   
                );

                $this->form_validation->set_rules(
                        'cardiopulmonar', 'Cardiopulmonar', 
                        array('required'),                      
                        array(
                            'required'  => 'El campo %s no debe estar vacío.'
                            )                   
                );

                $this->form_validation->set_rules(
                        'locomotor', 'Locomotor', 
                        array('required'),                      
                        array(
                            'required'  => 'El campo %s no debe estar vacío.'
                            )                   
                );

                $this->form_validation->set_rules(
                        'neuropsiquicos', 'Neuropsiquicos', 
                        array('required'),                      
                        array(
                            'required'  => 'El campo %s no debe estar vacío.'
                            )                   
                );

                $this->form_validation->set_rules(
                        'otros', 'Otros',
                        array('required'),                      
                        array(
                            'required'  => 'El campo %s no debe estar vacío.'
                            )                   
                );
                
                $this->form_validation->set_rules(
                        'ef_talla', 'Talla',
                        array('required','numeric'),                   
                        array(   
                            'numeric'   => 'La %s debe contener valores numéricos.',
                            'required'      => 'Debe especificar la %s del paciente.'
                        )
                );

                $this->form_validation->set_rules(
                        'ef_peso', 'Peso', 
                        array('required','decimal'),
                        array(
                            'decimal'   => 'El %s debe ser representado por un valor decimal. Por ejemplo: 70.5',
                            'required'     => 'Debe especificar el %s del paciente.'
                            )                   
                );

                $this->form_validation->set_rules(
                        'ef_ta', 'Tensión arterial', 
                        array('required','regex_match[/^[0-9]{1,3}\/[0-9]{1,2}/]'),
                        array(
                            'regex_match'   => 'La %s debe mostrar el valor de la %s sistólica y la %s diastólica de la siguiente manera: 120/10',
                            'required'     => 'Debe especificar la %s del paciente.'
                            )                   
                );

                $this->form_validation->set_rules(
                        'ef_pulso', 'Pulso',
                        array('required','numeric'),                   
                        array(   
                            'numeric'   => 'El %s debe contener valores numéricos.',
                            'required'      => 'Debe ingresar el %s del paciente.'
                        )
                );

                $this->form_validation->set_rules(
                        'ef_resp', 'Respiración',
                        array('required','numeric'),                   
                        array(   
                            'numeric'   => 'El campo %s debe contener valores numéricos.',
                            'required'      => 'Debe llenar el campo %s.'
                        )
                );

                $this->form_validation->set_rules(
                        'ef_temp', 'Temperatura',
                        array('required','numeric'),                   
                        array(   
                            'numeric'   => 'La %s debe contener valores numéricos.',
                            'required'      => 'Debe ingresar la %s del paciente.'
                        )
                );
            }
        }

        //Si no hay datos inválidos...
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('medicina/FormularioConsultaMedica', $data);

        //Si hay datos inválidos...
        }else{
            return false;
        }
    }
}