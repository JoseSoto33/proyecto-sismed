<?php

class ReporteModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    /**
     * @method mixed[] 	estadisticasPacientesAtendidos(mixed[] $data)
     * @method real 	calcularPorcentaje(integer $cantidad, integer $total)
     */

    /**
     * Extrae de la base de datos información referente a la cantidad de pacientes atendidos
     * durante un período determinado.
     *
     * @param 	mixed[] $data
     *
     * @return mixed[]
     */
    public function estadisticasPacientesAtendidos($data)
    {
    	//Estudiante - Docente - Administrativo - Obrero - Cortesía
    	$this->db->select('consulta.*, paciente.cedula, paciente.sexo, paciente.tipo_paciente');
    	$this->db->from('consulta');
    	$this->db->join('historia_medicina','consulta.cod_historia = historia_medicina.cod_historia');
    	$this->db->join('paciente','paciente.id = historia_medicina.id_paciente');

    	if (!empty($data['fecha'])) {
    		list($anio,$mes) = explode("-", date("Y-m",strtotime($data['fecha'])));
			
			$this->db->where('consulta.tipo',1);    		
    		$this->db->where('extract(year from consulta.fecha_creacion) =',$anio);
    		$this->db->where('extract(month from consulta.fecha_creacion) =',$mes);

    		$this->db->or_where('consulta.tipo',2);
    		$this->db->where('extract(year from consulta.fecha_creacion) =',$anio);
    		$this->db->where('extract(month from consulta.fecha_creacion) =',$mes);
    	}else{

	    	$this->db->where('consulta.tipo',1);
	    	$this->db->or_where('consulta.tipo',2);
    	}

    	$result = $this->db->get()->result_array();

    	$return = array(
    		'estudiante' => array(
    			'cantidad' => 0,
    			'porcentaje' => 0,
    			'm' => array(
    				'cantidad' => 0,
    				'porcentaje' => 0
    			),
    			'f' => array(
    				'cantidad' => 0,
    				'porcentaje' => 0
    			)
    		),
    		'docente' => array(
    				'cantidad' => 0,
    				'porcentaje' => 0
    			),
    		'administrativo' => array(
    				'cantidad' => 0,
    				'porcentaje' => 0
    			),
    		'obrero' => array(
    				'cantidad' => 0,
    				'porcentaje' => 0
    			),
    		'cortesia' => array(
    				'cantidad' => 0,
    				'porcentaje' => 0
    			),
    		'total' => 0
    	);

    	foreach ($result as $key => $row) {

    		if ($row['tipo_paciente'] == 'Estudiante') {
    			$return[strtolower($row['tipo_paciente'])][$row['sexo']]['cantidad']++;
    		}

    		$return[strtolower($row['tipo_paciente'])]['cantidad']++;
    		$return['total']++;
    	}
    	return $return;
    }

    /**
     * Calcula el porcentaje que representa un valor con respecto a una cantidad total
     *
     * @param 	integer 	$cantidad 	Representa la cantidad cuyo porcentaje se quiere hallar
     * @param 	integer 	$total 		Representa el total respecto del cual se calcula el porcentaje
     *
     * @return 	real
     */
    public function calcularPorcentaje($cantidad,$total) 
    {
    	return ($cantidad*100)/$total;
    }
}