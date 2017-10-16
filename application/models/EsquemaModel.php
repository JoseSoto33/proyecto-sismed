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
                    "intervalo_periodo" => $_POST["interperiodo"][$key],
                    "dosificacion" => $_POST["dosificacion"][$key],
                    "tipo_dosificacion" => $_POST["tipo_dosificacion"][$key],
                    "observaciones" => $_POST["observaciones"][$key]
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
                "intervalo_periodo" => $this->input->post("interperiodo"),
                "dosificacion" => $this->input->post("dosificacion"),
                "tipo_dosificacion" => $this->input->post("tipo_dosificacion"),
                "observaciones" => $this->input->post("observaciones")
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

        //Si está definida una cláusula 'join'
        if (isset($condicion['join']) && !empty($condicion['join'])) {
            
            if (isset($condicion['join']['tipo'])) {
                $this->db->join($condicion['join']['tabla'],$condicion['join']['condicion'],$condicion['join']['tipo']);
            }else{
                $this->db->join($condicion['join']['tabla'],$condicion['join']['condicion']);
            }
        }

        //Si están definidas varias cláusula 'join'
        if (isset($condicion['joins']) && !empty($condicion['joins'])) {
            
            foreach ($condicion['joins'] as $key => $join) {
                
                if (isset($join['tipo'])) {
                    $this->db->join($join['tabla'],$join['condicion'],$join['tipo']);
                }else{
                    $this->db->join($join['tabla'],$join['condicion']);
                }
            }
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

    public function obtenerEsquemasDisponibles($edad,$cod_historia) {

        $where = array(
            'esquema.min_edad_aplicacion <' => $edad,
            'esquema.min_edad_periodo' => 'Año(s)',
            'esquema.max_edad_aplicacion >' => $edad,
            'esquema.max_edad_periodo' => 'Año(s)',
            'vacuna.status' => true
        );
        $this->db->select('esquema.*, vacuna.nombre_vacuna');
        $this->db->from('esquema');
        $this->db->join('vacuna','esquema.id_vacuna = vacuna.id');
        $this->db->where($where);
        $esquemas = $this->db->get()->result_array();

        foreach ($esquemas as $key => $esquema) {

            if (!isset($output[$esquema['id_vacuna']]['nombre_vacuna'])) {                
                $output[$esquema['id_vacuna']]['nombre_vacuna'] = $esquema['nombre_vacuna'];
            }

            $this->db->where(array('id_esquema' => $esquema['id'], "MD5(concat('sismed',cod_historia))" => $cod_historia));
            $this->db->order_by('nro_dosis', 'DESC');
            $result = $this->db->get('vacuna_aplicada');
            $found = $result->num_rows();

            if ($esquema['esquema'] == "Única") {
                $esquema['nombre_esquema'] = $esquema['esquema'];
                if ($found > 0) {
                    $esquema['aplicada'] = true;
                }
                $output[$esquema['id_vacuna']]['esquemas']['unica'] = $esquema;
            }else{

                if ($found > 0) {
                    $aplicada = $result->row_array();           
                    $esquema['nombre_esquema'] = $esquema['esquema']." #".($found+1);
                    $esquema['restante'] = $esquema['cant_dosis'] - $aplicada['nro_dosis'];
                    if ($esquema['restante'] > 0 && $aplicada['nro_dosis'] > 1) {
                        $esquema['aplicable'] = true;
                        $esquema['fecha_prox'] = $aplicada['prox_fecha_vacunacion'];
                    }else if ($esquema['restante'] == 0){
                        $esquema['aplicada'] = true;
                        $esquema['fecha_prox'] = null;
                    }
                }else{
                    $esquema['nombre_esquema'] = $esquema['esquema']." #1";
                    $esquema['restante'] = $esquema['cant_dosis'];
                }                

                if ($esquema['esquema'] == "Dosis") {                    
                    $output[$esquema['id_vacuna']]['esquemas']['dosis'] = $esquema;
                }else if ($esquema['esquema'] == "Refuerzo") {
                    $output[$esquema['id_vacuna']]['esquemas']['refuerzo'] = $esquema;
                }
            }


        }

        return $output;

    }
}