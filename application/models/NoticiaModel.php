<?php

class NoticiaModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    public function AgregarNoticia()   
    {
     	$data = array(
     			"id_usuario" => $this->session->userdata('idUsuario'),
     			"titulo" => $this->input->post('titulo'),
     			"url" => $this->input->post('url'),
     			"descripcion" => $this->input->post('descripcion')
     		);

     	if($this->db->insert("noticia", $data)){
     		return true;
     	}else{
     		return false;
     	}
    }

    public function ModificarNoticia($condicion = array())
    {
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->update('noticia', $condicion['data'])) {
            return true;
        }else{
            return false;
        }
    }

    public function EliminarNoticia($condicion = array())
    {
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->delete('noticia')) {
            return true;
        }else{
            return false;
        }
    }

    public function ExtraerNoticia($condicion = array())
    {
    	if (isset($condicion['select']) && !empty($condicion['select'])) {
    		
    		$this->db->select($condicion['select']);
    	}else{
    		$this->db->select("*");
    	}

    	$this->db->from("noticia");

    	if (isset($condicion['where']) && !empty($condicion['where'])) {
    		
    		$this->db->where($condicion['where']);
    	}

    	if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
    		
    		$this->db->or_where($condicion['or_where']);
    	}

    	return $this->db->get();
    	
    }

    public function ValidarNoticia($condicion = array())
    {
    	$query = $this->ExtraerNoticia($condicion);

    	if ($query->num_rows() > 0) {
    		return true;
    	}else{
    		return false;
    	}
    }
}