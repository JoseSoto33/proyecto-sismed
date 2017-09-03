<?php

class EsquemaModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }	

    public function AgregarEsquema($id_vacuna)
    {
        if (is_array($_POST["esquema"])) {
            
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
        }else{

            $insert = array(
                "id_vacuna" => $id_vacuna,
                "esquema" => $this->input->post("esquema"),
                "min_edad_aplicacion" => $this->input->post("eminima"),
                "min_edad_periodo" => $this->input->post("eminperiodo"),
                "max_edad_aplicacion" => $this->input->post("emaxima"),
                "max_edad_periodo" => $this->input->post("emaxperiodo"),
                "via_administracion" => $this->input->post("via_administracion"),
                "cant_dosis" => $this->input->post("cant_dosis"),
                "intervalo" => $this->input->post("intervalo"),
                "intervalo_periodo" => $this->input->post("interperiodo")
                );

            if(!$this->db->insert("esquema", $insert)){             

                return false;
            }
        }

        return true;
    }

	public function ModificarEsquema($condicion = array())
	{
		if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->update('esquema', $condicion['data'])) {
            return true;
        }else{
            return false;
        }
	}

	public function EliminarEsquema($condicion = array())
	{
		if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->delete('esquema')) {
            return true;
        }else{
            return false;
        }
	}
	
	public function ValidarEsquema($condicion = array())
	{
	 	$query = $this->ExtraerVacuna($condicion);

    	if ($query->num_rows() > 0) {
    		return true;
    	}else{
    		return false;
    	}
	}

	public function ExtraerEsquema($condicion = array())
	{
	 	if (isset($condicion['select']) && !empty($condicion['select'])) {
    		
    		$this->db->select($condicion['select']);
    	}else{
    		$this->db->select("*");
    	}

    	$this->db->from("esquema");

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

        $this->db->where("vacuna_patologia.id_vacuna", $id_vacuna);

        return $this->db->get();
    }
}