<?php

class InventarioModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

	public function AgregarInsumo()
	{

        $contenido = $this->input->post('numero')."-".$this->input->post('contenido');
        $almacen = 'Salud';
    
        $var1= 1;
     	$data = array(
     			"insumo" => $this->input->post('insumo'),
                "descripcion" => $this->input->post('descripcion'),
                "almacen" => $almacen,
                "tipo_insumo" => $this->input->post('tipo_insumo'), 
                "contenido" =>$contenido,
                "disponibilidad" =>$this->input->post('cantidad'),
                "unidad_medida" => $this->input->post('unidad_medida') 
     		);
        //faltan almacen y disponibilidad

     	if($this->db->insert("stock", $data)){
            $id = $this->db->insert_id();
            $data = array();
            $fecha_actual= date("Y-m-d");
            $data = array(
                    "id_insumo" =>$id,
                    "fecha_registro" => $fecha_actual,
                    "fecha_elaboracion" => $this->input->post('fecha_elaboracion'),
                    "fecha_vencimiento" => $this->input->post('fecha_vencimiento'),
                    "cantidad" => $this->input->post('cantidad')              
                );
            if($this->db->insert("lote_insumo", $data)){
                return true;
            }
     	}else{
     		return false;
     	}
        //falta la fecha de registro (hay q almacenar la fecha actual)
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

        //Si está definida una cláusula 'join'
        if (isset($condicion['join']) && !empty($condicion['join'])) {
            
            $this->db->join($condicion['join']['tabla'],$condicion['join']['condicion']);
        }

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

    public function ExtraerLote($condicion = array())
    {
        if (isset($condicion['select']) && !empty($condicion['select'])) {
            
            $this->db->select($condicion['select']);
        }else{
            $this->db->select("*");
        }
        
        $this->db->from("lote_insumo"); // tabla desde la cual extraer los datos

        //Si está definida una cláusula 'join'
        if (isset($condicion['join']) && !empty($condicion['join'])) {
            
            $this->db->join($condicion['join']['tabla'],$condicion['join']['condicion']);
        }

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