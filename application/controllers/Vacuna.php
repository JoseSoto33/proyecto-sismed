<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacuna extends CI_Controller {

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
     * @method void AgregarVacuna()
     * @method void ModificarVacuna(integer $id_vacuna)
     * @method void VerVacuna()
     * @method void ListarVacunas()
     * @method void|boolean ValidarVacuna(mixed[] $data)
     */

    /**
     * Muestra la interfaz del formulario para agregar una vacuna, 
     * o realiza el registro de la vacuna en la base de datos si 
     * se hace una petición POST
     */
    public function AgregarVacuna()
    {   
        $data = array("titulo" => "Agregar nueva vacuna");        

        $condicion = array(
            "where" => array("status" => TRUE),
            "order_by" => array("campo" => "id", "direccion" => "ASC")
            );

        $result = $this->PatologiaModel->ExtraerPatologia($condicion);
    
        $data["patologias"] = $result->result_array();
        $data["cant_patologias"] = $result->num_rows();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //var_dump($_POST);
                //Si la vacuna se agrega exitosamente a la base de datos...
                if ($id_vacuna = $this->VacunaModel->AgregarVacuna()) {

                    
                    $RelacionVacunaPatologia = array(
                        "vacuna" => $id_vacuna,
                        "patologias" => $_POST["enfermedad"]
                        );

                    if ($this->VacunaModel->AgregarRelacionVacunaPatologia($RelacionVacunaPatologia) && $this->EsquemaModel->AgregarEsquema($id_vacuna)) {
                       
                        set_cookie("message","La Vacuna <strong>'".$this->input->post('vacuna_nombre')."'</strong> fue registrada exitosamente!...", time()+15);
                        header("Location: ".base_url()."Vacuna/ListarVacunas"); //controlador y metododo del controlador que carga la vista                       

                    }else{
                        $data['mensaje'] = $this->db->error();
                    }

                //Si hay error en la inserción
                }else{

                    $data['mensaje'] = $this->db->error();
                }
        }

        $this->load->view('medicina/FormularioRegistroVacuna', $data);
    }

    /**
     * Recibe un post desde Ajax y modifica el nombre de una vacuna específica
     *
     * @return void
     */
    public function ModificarNombreVacuna()
    {

        $condicion = array(
                "data" => array(
                    "nombre_vacuna"=> $this->input->post("nuevo_nombre")
                    ),
                "where" => array(
                    "MD5(concat('sismed',id))" => $this->input->post("id")
                    )
            );

        if ($this->VacunaModel->ModificarVacuna($condicion)) {
            
            echo json_encode(array("status"=> true, "message" => "Modificación exitosa..."));
        }else{
            echo json_encode(array("status"=> false, "message" => "Ha ocurrido un error..."));
        }
    }

    /**
     * Añade un registro en la tabla vacuna_patologia para asociar una patologia con una vacuna específica
     *
     * @return void
     */
    public function AgregarPatologiaVacuna()
    {
        $id_patologia = $this->input->post("id_patologia");
        $id_vacuna = $this->input->post("id_vacuna");

        $condicion = array(
            "where" => array("MD5(concat('sismed',id))" => $id_vacuna)
            ); 

        $vacuna = $this->VacunaModel->ExtraerVacuna($condicion)->row_array();

        $insert = array(
            "id_vacuna" => $vacuna["id"],
            "id_patologia" => $id_patologia
            );

        if ($this->VacunaModel->AgregarRelacionVacunaPatologia($insert)) {

            $condicion = array(
            "order_by" => array("campo" => "id", "direccion" => "ASC")
            );

            $patologias = $this->VacunaModel->ExtraerVacunaPatologia($id_vacuna,$condicion)->result_array();

            echo json_encode(array("status"=>true, "message" => "Asociación de vacuna y patología exitosa...", "patologias" => $patologias));
        }else{
            echo json_encode(array("status"=>false, "message" => "Error al asociar la patología..."));
        }
    }

    /**
     * Elimina una relación entre una vacuna y una patología específicas
     *
     * @return void
     */
    public function EliminarPatologiaVacuna()
    {
        $id_patologia = $this->input->post("id_patologia");
        $id_vacuna = $this->input->post("id_vacuna");

        $condicion = array(
            "where" => array(
                "MD5(concat('sismed',id_vacuna))" => $id_vacuna,
                "id_patologia" => $id_patologia
                )
            ); 

        if ($this->VacunaModel->EliminarPatologiaVacuna($condicion)) {
            $patologias = $this->VacunaModel->ExtraerVacunaPatologia($id_vacuna,$condicion)->result_array();

            echo json_encode(array("status"=>true, "message" => "Eliminación exitosa...", "patologias" => $patologias));
        }else{
            echo json_encode(array("status"=>false, "message" => "Error al asociar la patología..."));
        }
    }

    /**
     * Extrae información sobre una vacuna en específico de la base de datos
     *
     * @return void
     */
    public function VerVacuna()
    {
        $id_vacuna = $this->input->post("id");

        $condicion = array(
            "order_by" => array("campo" => "id", "direccion" => "ASC")
            );

        $patologias = $this->VacunaModel->ExtraerVacunaPatologia($id_vacuna,$condicion)->result_array();

        $condicion["where"] = array("MD5(concat('sismed',id_vacuna))" => $id_vacuna);

        $esquemas = $this->EsquemaModel->ExtraerEsquema($condicion)->result_array();

        $data = array(
            "patologias" => $patologias,
            "esquemas" => $esquemas
            );

        echo json_encode($data);
    }

    /**
     * Extrae información sobre un esquema en específico de la base de datos
     *
     * @return void
     */
    public function VerEsquema()
    {
        $id_esquema = $this->input->post("id");

        $condicion = array(
            "where" => array("id" => $id_esquema),
            "order_by" => array("campo" => "id", "direccion" => "ASC")
            );

        $esquema = $this->EsquemaModel->ExtraerEsquema($condicion)->row_array();        

        echo json_encode($esquema);
    }

    /**
     * Extrae de la base de datos el listado de las vacunas registradas en la base de datos
     *
     * @return void
     */
    public function ListarVacunas()
    {
        $condicion = array(
            "order_by" => array("campo" => "id", "direccion" => "ASC")
            );

        $data = array();

        $result = $this->VacunaModel->ExtraerVacuna($condicion);
        
        $data["num_rows"] = $result->num_rows();
        $vacunas = $result->result_array();

        $condicion["select"] = "patologia.nombre";

        foreach ($vacunas as $key => $vacuna) {
            
            $patologias = $this->VacunaModel->ExtraerVacunaPatologia(md5("sismed".$vacuna["id"]),$condicion);
            $vacuna["patologias"] = $patologias->result_array();
            $items[] = $vacuna;
        }
        $data["patologias"] = $patologias;
        $data["vacunas"] = $items;
        //$data["items"] = $items;

    	$this->load->view('medicina/ListarVacunas', $data);
    }
    
    /**
     * 
     */
    public function ValidarVacuna($data)
    {

    }
    
}