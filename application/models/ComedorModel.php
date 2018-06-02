<?php

class ComedorModel extends CI_Model {/*CI: CodeIgniter*/

    public function __construct()
    {
            parent::__construct();
    }


    public function AgregarMenuComedor($id_semana){

    	$this->db->set("turno",$_POST["turno"]);
 		$this->db->set("descripcion",$_POST["descripcion"]);
 		$this->db->set("fecha_creacion", date("Y-m-d")); 
 		$this->db->set("id_semana", $id_semana);

 		if ($this->db->insert("menu_comedor")){
 			return true;
 		}
 		return false;
    }

    public function AgregarSemana(){
    	$this->db->set("fecha_inicio",$_POST["fecha_inicio"]);
 		$this->db->set("fecha_fin",$_POST["fecha_fin"]);

 		if ($this->db->insert("menu_semanal")){
 			return $this->db->insert_id();
 		}
 		return false;

    }

    public function ExtraerUltimaSemana(){

    	$this->db->order_by("id","DESC");
    	$this->db->limit(1);

    	return $this->db->get("menu_semanal")->row();

    }

    public function ExtraerSemanas(){
    	$result=$this->db->get('menu_semanal');
    	if($result->num_rows()>0)
    		return $result->result_array();
    	return null;
    }
    
   
}