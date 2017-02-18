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
    	$this->db->set($data["campos"]);
    	if ( $this->db->update("sesion", $data["where"]) ){
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

    }
}