<?php

class ImagenModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    public function SubirImagen($data,$ruta,$nombre)
	{		
		$config['upload_path'] = $ruta;
		$config['file_name'] = $nombre;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';
        $config['overwrite'] = TRUE;

        $this->upload->initialize($config);
        
        if (!empty($_POST['imagen']) && !$this->upload->do_upload("imagen")) {            
        	return false;
        }else{
        	return $this->upload->data();
        }
	}
}