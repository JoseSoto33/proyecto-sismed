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

        $this->load->view('medicina/FormularioRegistroVacuna', $data);
    }

    /**
     * 
     */
    public function ModificarVacuna($id_vacuna)
    {

    }

    /**
     * 
     */
    public function VerVacuna()
    {

    }

    /**
     * Extrae de la base de datos el listado de las vacunas registradas en la base de datos
     */
    public function ListarVacunas()
    {
    	$this->load->view('medicina/ListarVacunas');
    }
    
    /**
     * 
     */
    public function ValidarVacuna($data)
    {

    }
    
}