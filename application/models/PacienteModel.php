<?php

class PacienteModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    public function AgregarPaciente()   
    {
    	if (isset($_POST['id_usuario']) && !empty($_POST['id_usuario'])) {
        	
        	$data["id"] = $this->input->post('id_usuario');
        }     

		$data["cedula"] = $this->input->post('cedula');
		$data["nombre1"] = $this->input->post('nombre1');
		$data["nombre2"] = $this->input->post('nombre2');
		$data["apellido1"] = $this->input->post('apellido1');
		$data["apellido2"] = $this->input->post('apellido2');
		$data["sexo"] = $this->input->post('sexo');
		$data["fecha_nacimiento"] = $this->input->post('fecha_nacimiento');
		$data["direccion"] = $this->input->post('direccion');
		$data["telf_personal"] = $this->input->post('telf_personal');
		$data["telf_emergencia"] = $this->input->post('telf_emergencia');
		$data["email"] = $this->input->post('email');
		$data["lugar_nacimiento"] = $this->input->post('lugar_nacimiento');
		$data["tipo_paciente"] = $this->input->post('tipo_paciente');
		$data["departamento"] = $this->input->post('departamento');
		$data["trayecto"] = $this->input->post('trayecto');
		$data["pnf"] = $this->input->post('pnf');
		$data["tipo_sangre"] = $this->input->post('tipo_sangre');

		var_dump($data);

     	if($this->db->insert("paciente", $data)){
     		return $this->db->insert_id();
     		//return $id_paciente;
     	}else{
     		return false;
     	}
    }

    public function Modificarpaciente($condicion = array())
    {
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->update('paciente', $condicion['data'])) {
            return true;
        }else{
            return false;
        }
    }

    public function Eliminarpaciente($condicion = array())
    {
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->delete('paciente')) {
            return true;
        }else{
            return false;
        }
    }

    public function Extraerpaciente($condicion = array())
    {
    	//Si se declaró una sentencia SQL personalizada...
        if (isset($condicion['query']) && !empty($condicion['query'])) {
            
            return $this->db->query($condicion['query']);
        }

        //Si se declaró una sentencia 'distinct'...
        if (isset($condicion['distinct']) && $condicion['distinct'] != false) {
            
            $this->db->distinct();
        }

    	if (isset($condicion['select']) && !empty($condicion['select'])) {
    		
    		$this->db->select($condicion['select']);
    	}else{
    		$this->db->select("*");
    	}

    	if (isset($condicion['from']) && !empty($condicion['from'])) {
    		
    		$this->db->from($condicion['from']);
    	}else{
    		$this->db->from("paciente");
    	}    	

    	//Si está definida una cláusula 'where'
        if (isset($condicion['join']) && !empty($condicion['join'])) {
            
            if (isset($condicion['join']['tipo'])) {
            	$this->db->join($condicion['join']['tabla'],$condicion['join']['condicion'],$condicion['join']['tipo']);
            }else{
            	$this->db->join($condicion['join']['tabla'],$condicion['join']['condicion']);
            }
        }

        //Si están definidas varias cláusula 'where'
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

    public function Validarpaciente($condicion = array())
    {
    	$query = $this->Extraerpaciente($condicion);

    	if ($query->num_rows() > 0) {
    		return true;
    	}else{
    		return false;
    	}
    }
}