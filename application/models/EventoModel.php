<?php

class EventoModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    public function AgregarEvento()   
    {
        $fecha_hora_inicio = $this->input->post('fecha_inicio')." ".$this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano');

        $fecha_hora_fin = $this->input->post('fecha_fin')." ".$this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano');

     	$data = array(
     			"id_usuario" => $this->session->userdata('idUsuario'),
     			"titulo" => $this->input->post('titulo'),
                "descripcion" => $this->input->post('descripcion'),
     			"fecha_hora_inicio" => $fecha_hora_inicio,
                "fecha_hora_fin" => $fecha_hora_fin
     		);

     	if($this->db->insert("evento", $data)){
     		return true;
     	}else{
     		return false;
     	}
    }

    public function ModificarEvento()
    {

    }

    public function EliminarEvento($condicion = array())
    {

    }

    public function ExtraerEvento($condicion = array())
    {
    	if (isset($condicion['select']) && !empty($condicion['select'])) {
    		
    		$this->db->select($condicion['select']);
    	}else{
    		$this->db->select("*");
    	}

    	$this->db->from("evento");

    	if (isset($condicion['where']) && !empty($condicion['where'])) {
    		
    		$this->db->where($condicion['where']);
    	}

    	if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
    		
    		$this->db->or_where($condicion['or_where']);
    	}

    	return $this->db->get();
    	
    }

    public function ValidarEvento($condicion = array())
    {
    	$query = $this->ExtraerEvento($condicion);

    	if ($query->num_rows() > 0) {
    		return true;
    	}else{
    		return false;
    	}
    }
}