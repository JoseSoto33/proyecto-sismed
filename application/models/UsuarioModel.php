<?php

class UsuarioModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    public function AgregarUsuario($file_info = null)   
    {
        //$file_info = $this->upload->data();
        
     	$data = array(
     			"cedula" => $this->input->post('cedula'),
     			"nombre1" => $this->input->post('nombre1'),
     			"nombre2" => $this->input->post('nombre2'),
     			"apellido1" => $this->input->post('apellido1'),
     			"apellido2" => $this->input->post('apellido2'),
     			"sexo" => $this->input->post('sexo'),
     			"fecha_nacimiento" => $this->input->post('fecha_nacimiento'),
     			"direccion" => $this->input->post('direccion'),
     			"telf_personal" => $this->input->post('telef_personal'),
     			"telf_emergencia" => $this->input->post('telef_emergencia'),
     			"email" => $this->input->post('email'),
     			"username" => $this->input->post('username'),
     			"grado_instruccion" => $this->input->post('grado_instruccion'),
     			"especialidad" => $this->input->post('especialidad'),
     			"tipo_usuario" => $this->input->post('tipo_usuario')
     		);

        if (isset($file_info) && $file_info != false) {
            $data["img"] = $file_info["file_name"];
        }

     	if($this->db->insert("usuario", $data)){
     		return true;
     	}else{
     		return false;
     	}
    }

    public function ModificarUsuario($condicion = array())
    {
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->update('usuario', $condicion['data'])) {
            return true;
        }else{
            return false;
        }
    }

    public function EliminarUsuario($condicion = array())
    {
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->delete('usuario')) {
            return true;
        }else{
            return false;
        }
    }

    public function ExtraerUsuario($condicion = array())
    {
    	if (isset($condicion['select']) && !empty($condicion['select'])) {
    		
    		$this->db->select($condicion['select']);
    	}else{
    		$this->db->select("*");
    	}

    	$this->db->from("usuario");

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

    public function ValidarUsuario($condicion = array())
    {
    	$query = $this->ExtraerUsuario($condicion);

    	if ($query->num_rows() > 0) {
    		return true;
    	}else{
    		return false;
    	}
    }
    
}
