<?php

class PatologiaModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

	public function AgregarPatologia()
	{

     	$data = array(
     			"nombre" => $this->input->post('patologia'),
                "descripcion" => $this->input->post('descripcion')
     		);

     	if($this->db->insert("patologia", $data)){
     		return true;
     	}else{
     		return false;
     	}

	}
	public function ModificarPatologia()
	{

	}
	public function EliminarPatologia()
	{

	}
	public function ListarPatologias()
	{

	}

	public function ValidarPatologia()
	{
	 	
	}
}