<?php

class InventarioModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

	public function AgregarInsumo()
	{

     	$data = array(
     			"nombre" => $this->input->post('insumo'),
                "descripcion" => $this->input->post('descripcion'),
                "cantidad" => $this->input->post('cantidad'),
                "almacen" => $this->input->post('almacen'),
                "tipo_insumo" => $this->input->post('tipo_insumo')
     		);

     	if($this->db->insert("stock", $data)){
     		return true;
     	}else{
     		return false;
     	}

	}
	public function ModificarInsumo($condicion = array())
	{
		if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->update('stock', $condicion['data'])) {
            return true;
        }else{
            return false;
        }
	}
	public function EliminarInsumo($condicion = array())
	{
		if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->delete('stock')) {
            return true;
        }else{
            return false;
        }
	}
	
	public function ValidarInsumo($condicion = array())
	{
	 	$query = $this->ExtraerInsumo($condicion);

    	if ($query->num_rows() > 0) {
    		return true;
    	}else{
    		return false;
    	}
	}

	public function ExtraerInsumo($condicion = array())
	{
	 	if (isset($condicion['select']) && !empty($condicion['select'])) {
    		
    		$this->db->select($condicion['select']);
    	}else{
    		$this->db->select("*");
    	}
    	$this->db->from("stock"); // tabla desde la cual extraer los datos

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