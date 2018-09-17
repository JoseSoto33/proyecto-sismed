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

        $registros = $this->ReporteModel->estadisticasPacientesAtendidos($data);

        //Se calcula el porcentaje de estudiantes
        $registros['estudiante']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['estudiante']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de estudiantes varones
        $registros['estudiante']['m']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['estudiante']['m']['cantidad'],$registros['estudiante']['cantidad']);

        //Se calcula el porcentaje de estudiantes hembras
        $registros['estudiante']['f']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['estudiante']['f']['cantidad'],$registros['estudiante']['cantidad']);

        //Se calcula el porcentaje de docentes
        $registros['docente']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['docente']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de administrativos
        $registros['administrativo']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['administrativo']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de obreros
        $registros['obrero']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['obrero']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de cortesía
        $registros['cortesia']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['cortesia']['cantidad'],$registros['total']);

        /*
        //Para cada registro encontrado
        foreach ($registros as $key => $registro) {
        	//Si el índice es diferente de 'total'        	
        	if ($key != "total") {
        		//Se calcula el porcentaje y se almacena en el índice 'porcentaje' de cada registro        		
        		$registro['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registro['cantidad'],$registros['total']);
        		
        		//Si el índice es 'estudiante'
        		if ($key == "estudiante") {
        			//Se calcula el porcentaje de estudiantes del género masculino        			
        			$registro['m']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registro['m']['cantidad'],$registro['cantidad']);
        			//Se calcula el porcentaje de estudiantes del género femenino
        			$registro['f']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registro['f']['cantidad'],$registro['cantidad']);
        		}
        	}
        	var_dump($registro);
        }*/

        $registros['descripcion_periodo'] = "Resultados obtenidos para la fecha:";
        $registros['fecha'] = date("Y-m-d");

        //var_dump($registros);
        $this->CargarHeader();
        $this->load->view('reportes/ReportePacientesAtendidos', $registros);
        $this->load->view('footer');
    }

    /**
     *
     */
    public function informePacientesAtendidos()
    {
    	if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Doctor" && $this->session->userdata('tipo_usuario') != "Enfermero") {
        	redirect(base_url('Home')); 
        }

        $this->load->model('ReporteModel');

        $tipo_fecha = $this->input->post("tipo_fecha");
        $tipo_consulta = $this->input->post("select_tipo_consulta");
        
        if ($tipo_fecha == 'dia') {
        	$data['fecha'] = $this->input->post("fecha_dia_mes");
        }else if($tipo_fecha == 'mes') {
        	$data['fecha_mes'] = $this->input->post("fecha_dia_mes");
        }else if($tipo_fecha == 'rango') {
        	$data['fecha_rango'] = array(
        		'desde' => $this->input->post("fecha_rango_desde"),
        		'hasta' => $this->input->post("fecha_rango_hasta")
        	);
        }

        if (!empty($tipo_consulta)) {        	
        	$data['tipo_consulta'] = ($tipo_consulta == 'curativa')? 1 : 2 ;
        }

        $registros = $this->ReporteModel->estadisticasPacientesAtendidos($data);

        //Se calcula el porcentaje de estudiantes
        $registros['estudiante']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['estudiante']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de estudiantes varones
        $registros['estudiante']['m']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['estudiante']['m']['cantidad'],$registros['estudiante']['cantidad']);

        //Se calcula el porcentaje de estudiantes hembras
        $registros['estudiante']['f']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['estudiante']['f']['cantidad'],$registros['estudiante']['cantidad']);

        //Se calcula el porcentaje de docentes
        $registros['docente']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['docente']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de administrativos
        $registros['administrativo']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['administrativo']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de obreros
        $registros['obrero']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['obrero']['cantidad'],$registros['total']);

        //Se calcula el porcentaje de cortesía
        $registros['cortesia']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registros['cortesia']['cantidad'],$registros['total']);

        /*
        //Para cada registro encontrado
        foreach ($registros as $key => $registro) {
        	//Si el índice es diferente de 'total'
        	if ($key != "total") {
        		//Se calcula el porcentaje y se almacena en el índice 'porcentaje' de cada registro
        		$registro['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registro['cantidad'],$registros['total']);

        		//Si el índice es 'estudiante'
        		if ($key == "estudiante") {
        			//Se calcula el porcentaje de estudiantes del género masculino
        			$registro['m']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registro['m']['cantidad'],$registro['cantidad']);
        			//Se calcula el porcentaje de estudiantes del género femenino
        			$registro['f']['porcentaje'] = $this->ReporteModel->calcularPorcentaje($registro['f']['cantidad'],$registro['cantidad']);
        		}
        	}
        }*/

        if ($tipo_fecha == 'dia') {
        	$registros['descripcion_periodo'] = "Resultados obtenidos para la fecha:";
        	$registros['fecha'] = $data["fecha"];
        }else if($tipo_fecha == 'mes') {
        	$registros['descripcion_periodo'] = "Resultados obtenidos el mes:";
        	$registros['fecha_mes'] = date("Y-m",strtotime($data["fecha_mes"]));
        }else if($tipo_fecha == 'rango') {
        	$registros['descripcion_periodo'] = "Resultados obtenidos el período:";
        	$registros['rango'] = array(
        		'desde' => $this->input->post("fecha_rango_desde"),
        		'hasta' => $this->input->post("fecha_rango_hasta")
        	);
        }

        if (!empty($tipo_consulta)) {        	
        	$registros['consultas'] = ($tipo_consulta == 'curativa')? "Consultas curativas" : "Consultas preventivas" ;
        }
        
        $this->load->view('medicina/ReportePacientesAtendidosResultados', $registros);
    }
}