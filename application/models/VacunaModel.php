<?php

class VacunaModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

	public function AgregarVacuna()
	{

     	$data = array(
     			"nombre_vacuna" => $this->input->post('nombre_vacuna')
     		);

     	if($this->db->insert("vacuna", $data)){     		

            return $this->db->insert_id();

     	}else{
     		return false;
     	}

	}

    public function AgregarRelacionVacunaPatologia($data)
    {
        if (is_array($data["id_patologia"])) {
            
            foreach ($data["id_patologia"] as $key => $patologia) {
                

                if(!$this->db->insert("vacuna_patologia", array("id_vacuna" => $data["id_vacuna"],"id_patologia" => $patologia))){           
                    return false;
                }
            }
        }else{

            if(!$this->db->insert("vacuna_patologia", $data)){             

                return false;
            }
        }

        return true;
    }

	public function ModificarVacuna($condicion = array())
	{
		if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->update('vacuna', $condicion['data'])) {
            return true;
        }else{
            return false;
        }
	}

	public function EliminarVacuna($condicion = array())
	{
		if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->delete('vacuna')) {
            return true;
        }else{
            return false;
        }
	}

    public function EliminarPatologiaVacuna($condicion = array())
    {
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->delete('vacuna_patologia')) {
            return true;
        }else{
            return false;
        }
    }
	
	public function ValidarVacuna($condicion = array())
	{
	 	$query = $this->ExtraerVacuna($condicion);

    	if ($query->num_rows() > 0) {
    		return true;
    	}else{
    		return false;
    	}
	}

	public function ExtraerVacuna($condicion = array())
	{
	 	if (isset($condicion['select']) && !empty($condicion['select'])) {
    		
    		$this->db->select($condicion['select']);
    	}else{
    		$this->db->select("*");
    	}

    	$this->db->from("vacuna");

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

    public function ExtraerVacunaPatologia($id_vacuna, $condicion = array())
    {
        if (isset($condicion['select']) && !empty($condicion['select'])) {
            
            $this->db->select($condicion['select']);
        }else{
            $this->db->select("*");
        }

        $this->db->from("vacuna_patologia");

        $this->db->join("patologia", "patologia.id = vacuna_patologia.id_patologia");

        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        $this->db->where("MD5(concat('sismed',vacuna_patologia.id_vacuna))", $id_vacuna);

        return $this->db->get();
    }

    public function ValidarVacunaPatologia($id_vacuna, $condicion = array())
    {
        $query = $this->ExtraerVacunaPatologia($id_vacuna, $condicion);

        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

}