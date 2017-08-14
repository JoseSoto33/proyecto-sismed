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

        foreach ($data["patologias"] as $key => $patologia) {
            
            $insert = array(
                        "id_vacuna" => $data["vacuna"],
                        "id_patologia" => $patologia
                        );

            if(!$this->db->insert("vacuna_patologia", $insert)){             

                return false;
            }
        }

        return true;

    }

    public function AgregarEsquema($id_vacuna)
    {

        foreach ($_POST["esquema"] as $key => $esquema) {
            
            $insert = array(
                        "id_vacuna" => $id_vacuna,
                        "esquema" => $esquema,
                        "min_edad_aplicacion" => $_POST["eminima"][$key],
                        "min_edad_periodo" => $_POST["eminperiodo"][$key],
                        "max_edad_aplicacion" => $_POST["emaxima"][$key],
                        "max_edad_periodo" => $_POST["emaxperiodo"][$key],
                        "via_administracion" => $_POST["via_administracion"][$key],
                        "cant_dosis" => $_POST["cant_dosis"][$key],
                        "intervalo" => $_POST["intervalo"][$key],
                        "intervalo_periodo" => $_POST["interperiodo"][$key]
                        );

            if(!$this->db->insert("esquema", $insert)){             

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
}