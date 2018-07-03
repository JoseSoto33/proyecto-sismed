<?php

class ComedorModel extends CI_Model {/*CI: CodeIgniter*/

    public function __construct()
    {
            parent::__construct();
    }


    public function AgregarMenuComedor($id_semana,$data){

    	$this->db->set("turno",$data["turno"]);
 		$this->db->set("fecha_creacion", date("Y-m-d"));         
        $this->db->set("dia", $data["dia"]); 
 		$this->db->set("id_semana", $id_semana);
        $this->db->set("entrada",$data["entrada"]);
        $this->db->set("proteico",$data["proteico"]);
        $this->db->set("contorno",$data["contorno"]);
        $this->db->set("extras",$data["extras"]);
        $this->db->set("bebida",$data["bebida"]);

 		if ($this->db->insert("menu_comedor")){
 			return $this->db->insert_id();
 		}
 		return false;
    }


    public function ModificarMenuComedor($id_menu,$data){

        $this->db->set("entrada",$data["entrada"]);
        $this->db->set("proteico",$data["proteico"]);
        $this->db->set("contorno",$data["contorno"]);
        $this->db->set("extras",$data["extras"]);
        $this->db->set("bebida",$data["bebida"]);   

       $this->db->where("MD5(concat('sismed',id))",$id_menu);
        if ($this->db->update("menu_comedor")){
            return true;
        }
        return false;
    }

    public function AgregarSemana($data){
    	$this->db->set("fecha_inicio",$data["fecha_inicio"]);
 		$this->db->set("fecha_fin",$data["fecha_fin"]);

 		if ($this->db->insert("menu_semanal")){
 			return $this->db->insert_id();
 		}
 		return false;

    }

    public function ModificarIdDescripcion($id_menu,$id_descripcion){
        $this->db->set("id_descripcion",$id_descripcion);
        $this->db->where("id",$id_menu);
        if($this->db->update("menu_comedor")){
            return true;
        }
        return false;
    }

    public function ExtraerUltimaSemana(){
        $this->db->where('estatus','0');
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
    
    public function ValidarDia($id_semana,$dia){
        $this->db->where("id",$id_semana);
        $this->db->where("fecha_inicio <=",date("Y-m-d",strtotime($dia)));
        $this->db->where("fecha_fin >=",date("Y-m-d",strtotime($dia)));

        $result=$this->db->get('menu_semanal');
        if($result->num_rows()>0)
            return true;
        return false;
    }

    public function ExtraerMenuSemana($id_semana,$turno=null){
        $this->db->where("MD5(concat('sismed',id_semana))",$id_semana);
        if (!empty($turno)) {
            $this->db->where("turno",ucwords($turno));
        }
        $result=$this->db->get('menu_comedor');
        if($result->num_rows()>0)
            return $result->result_array();
        return null;   
    }

    public function ExtraerMenuComedor($id_menuComedor){
        $this->db->where("MD5(concat('sismed',id))",$id_menuComedor);
        $result=$this->db->get('menu_comedor');
        if($result->num_rows()>0)
            return $result->row_array();
        return null;   
    }

     public function ExtraerSemana($id_semana){
         $this->db->where("id",$id_semana);
        $result=$this->db->get('menu_semanal');
        if($result->num_rows()>0)
            return $result->row_array();
        return null;   
    }

     public function ActualizarStatusComedor(){
        
        $this->db->set('estatus','1');
        $this->db->where("estatus",'0');
        $this->db->where("fecha_fin <", date('Y-m-d'));
        $this->db->update("menu_semanal");
      
    }
   
}