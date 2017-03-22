<?php

class PatologiaModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

	public function AgregarPatologia()
	{

     	$data = array(
     			"nombre" => $this->input->post('patologia'),
                "descripcion" => $this->input->post('descripcion')
     		);

     	if($this->db->insert("patologia", $data)){
     		return true;
     	}else{
     		return false;
     	}

	}
	public function ModificarPatologia($condicion = array())
	{
		if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->update('patologia', $condicion['data'])) {
            return true;
        }else{
            return false;
        }
	}
	public function EliminarPatologia($condicion = array())
	{
		if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->delete('patologia')) {
            return true;
        }else{
            return false;
        }
	}
	
	public function ValidarPatologia($condicion = array())
	{
	 	$query = $this->ExtraerPatologia($condicion);

    	if ($query->num_rows() > 0) {
    		return true;
    	}else{
    		return false;
    	}
	}

	public function ExtraerPatologia($condicion = array())
	{
	 	if (isset($condicion['select']) && !empty($condicion['select'])) {
    		
    		$this->db->select($condicion['select']);
    	}else{
    		$this->db->select("*");
    	}
    	$this->db->from("patologia");

    	if (isset($condicion['where']) && !empty($condicion['where'])) {
    		
    		$this->db->where($condicion['where']);
    	}

    	if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
    		
    		$this->db->or_where($condicion['or_where']);
    	}

        if (isset($condicion['order_by']) && !empty($condicion['order_by'])) {
            
            $this->db->order_by($condicion['order_by']['campo'],$condicion['order_by']['direccion']);
        }

    	return $this->db->get();
	}
}