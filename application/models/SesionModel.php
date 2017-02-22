<?php

class SesionModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    public function Login($data = array())
    {
    	if($this->db->insert("sesion",$data)){
     		return $this->db->insert_id();
     	}else{
     		return false;
     	}
    }

    public function Logout($data = array())
    {
    	if ( $this->db->update("sesion", $data["campos"], $data["where"]) ){
            return true;
        } else {
            return false;
        }
    }

    public function ValidarSesion()
    {

    }

    public function ExtraerSesiones($condicion = array())
    {
        if (isset($condicion['select']) && !empty($condicion['select'])) {
            
            $this->db->select($condicion['select']);
            //return "bandera 1.1";
        }else{
            $this->db->select("*");
            //return "bandera 1.2";
        }

        $this->db->from("sesion");

        if (isset($condicion['joins']) && !empty($condicion['joins'])) {
            
            foreach ($condicion['joins'] as $key => $join) {
                
                $this->db->join($join['table'],$join['condicion'],$join['tipo']);
            }            

        }elseif (isset($condicion['join']) && !empty($condicion['join'])) {
            
            $this->db->join($condicion['join']['table'],$condicion['join']['condicion']);
        }

        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        return $this->db->get();
    }
}