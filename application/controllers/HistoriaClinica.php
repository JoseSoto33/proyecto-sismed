<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoriaClinica extends CI_Controller {

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
        if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Doctor" && $this->session->userdata('tipo_usuario') != "Enfermero") {

        	redirect(base_url('Home')); 
        }
    }

    /**
     * @method void ListarHistorias()
     * @method void ConsultarHistoriaClinica(integer $id_evento)
     */

    /**
     * Muestra el listado de historias clínicas registradas en el sistema
     *
     * @return void
     */
    public function ListarHistorias()
    {
        $this->load->model('HistoriaModel');
    	$condicion = array(
            "distinct" => true,
			"select" => "historia.cod_historia, historia.fecha_creada, paciente.id, paciente.nombre1, paciente.nombre2, paciente.apellido1, paciente.apellido2",
			"join" => array(
                "tabla" => "paciente",
                "condicion" => "paciente.id = historia.id_paciente"
                )
			);

		$data = array();

		$result = $this->HistoriaModel->ExtraerHistoria($condicion);

		$data["historias"] = $result;
        switch ($this->session->userdata('tipo_usuario')) {
        case "Doctor":                  
            $this->load->view('medicina/doctor/header'); 
            $this->load->view('medicina/ListarHistorias', $data);
            $this->load->view('medicina/doctor/footer'); 
            break;

        case "Enfermero":                   
            $this->load->view('medicina/enfermero/header'); 
            $this->load->view('medicina/ListarHistorias', $data);
            $this->load->view('medicina/enfermero/footer'); 
            break;
        }
		
    }

    /**
     * Muestra el listado de historias clínicas registradas en el sistema
     *
     * @param string $cod_historia Deberá contener el identificador único de la histoira clínica
     *
     * @return void
     */
    public function ConsultarHistoriaClinica($cod_historia)
    {
        $this->load->model('HistoriaModel');
        $this->load->model('PacienteModel');
        $this->load->model('VacunaModel');
        $this->load->model('EsquemaModel');

        $data = array("titulo" => "Historia Clínica");

    	$condicion = array(
            'where' => array("MD5(concat('sismed',cod_historia))" => $cod_historia)
            );

        $result = $this->HistoriaModel->ExtraerHistoria($condicion);

        if ($result->num_rows() > 0) {
            
            $data['historia'] = $result->row_array();
            $condicion = array(
                'where' => array("id" => $data['historia']['id_paciente'])
                );

            $result = $this->PacienteModel->ExtraerPaciente($condicion);

            if ($result->num_rows() > 0) {
                
                $data['paciente'] = $result->row_array();

                $hoy = date('Y-m-d');
                $diff = abs(strtotime($hoy) - strtotime($data['paciente']["fecha_nacimiento"]));
                $data['paciente']['edad'] = floor($diff / (365*60*60*24));

                $condicion = array(
                    "where" => array("cod_historia" => $data['historia']['cod_historia'])
                    );

                $tablas = array("historia_medicina");

                foreach ($tablas as $key => $tabla) {
                    
                    $condicion['from'] = $tabla;

                    $result = $this->HistoriaModel->ExtraerHistoria($condicion);

                    $data[$tabla]['rows'] = $result->num_rows();
                    $data[$tabla]['data'] = $result->row_array();
                }  
                $esquemas = $this->EsquemaModel->extraerEsquemasDisponibles($data['paciente']['edad'],$cod_historia);
                $data['esquemas_vacunacion'] = $esquemas;

                $vacunas = $this->VacunaModel->extraerVacunasAplicadas($data['paciente']['edad'],$cod_historia);
                $data['vacunas_aplicadas'] = $vacunas; 
                $data['last_query'] = $this->db->last_query();

            }else{

                $data['mensaje'] = "Error. El paciente se ha registrado...";
            }

        }else{

            $data['mensaje'] = "Error. No se encontró la historia clínica...";
        }

        switch ($this->session->userdata('tipo_usuario')) {
        case "Doctor":                  
            $this->load->view('medicina/doctor/header'); 
            $this->load->view('medicina/DetallesHistoriaClinica', $data);
            $this->load->view('medicina/doctor/footer'); 
            break;

        case "Enfermero":                   
            $this->load->view('medicina/enfermero/header'); 
            $this->load->view('medicina/DetallesHistoriaClinica', $data);
            $this->load->view('medicina/enfermero/footer'); 
            break;
        }

    }

    /**
     * Registra una nueva historia clínica, dependiendo del tipo de usuario     
     *
     * @return json
     */
    public function CrearHistoriaClinica()
    {
        $this->load->model('HistoriaModel');
        /**
         * @var mixed[] $data Contendrá los datos que se almacenarán en la BDD. 
         *
         *      mixed[] insert  Arreglo con los datos que seran insertados en la BDD. Dependiendo del tipo de usaurio
         * los datos que almacena varían. 
         *
         *              integer     id_paciente     El identificador único de la persona en la tabla peciente
         *              string      cod_historia    El que será el identificador único de la historia clínica
         *
         *              Si la historia se crea en la unidad de medicina...
         *              antecedentes_personales     Contiene información referente a los antecedentes del paciente registrado,
         *                                          enfermedades padecidas actual o previamente, intervenciones quirúrgicas,
         *                                          ect...
         *              antecedentes_familiares     Contiene información referente a los antecedentes de familiares del paciente,
         *                                          enfermedades padecidas actual o previamente, intervenciones quirúrgicas,
         *                                          ect...
         *
         *      string  table   Contiene el nombre de la tabla donde serán almacenados los datos
         */
        $data['insert']['id_paciente'] = $this->input->post('id_persona');
        $data['insert']['cod_historia'] = $this->input->post('cod_historia');

        switch ($this->session->userdata('especialidad')) {
            case 'Medicina':
                $data['table'] = "historia_medicina";
                $data['insert']['antecedentes_personales'] = $this->input->post('antecedentes_personales');
                $data['insert']['antecedentes_familiares'] = $this->input->post('antecedentes_familiares');
                break;
            
            case 'Odontología':
                # Code...
                break;

            case 'Laboratorio':
                # Code...
                break;

            case 'Nutrición':
                # Code...
                break;
        }

        if ($this->HistoriaModel->AgregarHistoria($data)) {
            
            echo json_encode(array('status' => true, 'message' => "Se ha creado la historia clínica exitosamente"));
        }else{
            echo json_encode(array('status' => false, 'message' => $this->db->error())); 
        }
    }
}