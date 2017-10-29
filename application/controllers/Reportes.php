<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('login') && ($this->uri->segment(1, 0) != '0' || $this->uri->segment(2, 0) != '0')) {
        	redirect(base_url());
        }
    }

    /**
     * @method void PacientesAtendidos()
     */

    /**
     * Muestra en pantalla el total de pacientes atendidos durante un período determinado
     * clasificando a los pacientes por sexo y tipo de paciente (estudiante, docente, obrero, 
     * administrativo, cortecía).
     *
     * @return void
     */
    public function PacientesAtendidos()
    {
    	if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Doctor" && $this->session->userdata('tipo_usuario') != "Enfermero") {
        	redirect(base_url('Home')); 
        }

        $this->load->model('ReporteModel');

        if (!empty($_POST['fecha'])) {
        	$data["fecha"] = $this->input->post('fecha');
        }else{
        	$data["fecha"] = date("Y-m-d");
        }

        $registros = $this->ReporteModel->estadisticasPacientesAtendidos($data);

        //Se calcula el porcentaje de estudiantes
        $registros['estudiante']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['estudiante']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de estudiantes varones
        $registros['estudiante']['m']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['estudiante']['m']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de estudiantes hembras
        $registros['estudiante']['f']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['estudiante']['f']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de docentes
        $registros['docente']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['docente']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de administrativos
        $registros['administrativo']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['administrativo']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de obreros
        $registros['obrero']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['obrero']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de cortesía
        $registros['cortesia']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['cortesia']['cantidad'],$registros['total']);

        //var_dump($registros);
        switch ($this->session->userdata('tipo_usuario')) {
        case "Doctor":                  
            $this->load->view('medicina/doctor/header'); 
            $this->load->view('medicina/ReportePacientesAtendidos', $registros);
            $this->load->view('medicina/doctor/footer'); 
            break;

        case "Enfermero":                   
            $this->load->view('medicina/enfermero/header'); 
            $this->load->view('medicina/ReportePacientesAtendidos', $registros);
            $this->load->view('medicina/enfermero/footer'); 
            break;
        }
    }
}