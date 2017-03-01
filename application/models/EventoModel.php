<?php

class EventoModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    public function AgregarEvento()   
    {
        $fecha_hora_inicio = $this->input->post('fecha_inicio')." ".$this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano');

        $fecha_hora_fin = $this->input->post('fecha_fin')." ".$this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano');

     	$data = array(
     			"id_usuario" => $this->session->userdata('idUsuario'),
     			"titulo" => $this->input->post('titulo'),
                "descripcion" => $this->input->post('descripcion'),
     			"fecha_hora_inicio" => $fecha_hora_inicio,
                "fecha_hora_fin" => $fecha_hora_fin
     		);

     	if($this->db->insert("evento", $data)){
     		return true;
     	}else{
     		return false;
     	}
    }

    public function ModificarEvento($condicion = array())
    {
        $fecha_hora_inicio = $this->input->post('fecha_inicio')." ".$this->input->post('hora_inicio')." ".$this->input->post('h_i_meridiano');

        $fecha_hora_fin = $this->input->post('fecha_fin')." ".$this->input->post('hora_fin')." ".$this->input->post('h_f_meridiano');

        $data = array(
                "id_usuario" => $this->session->userdata('idUsuario'),
                "titulo" => $this->input->post('titulo'),
                "descripcion" => $this->input->post('descripcion'),
                "fecha_hora_inicio" => $fecha_hora_inicio,
                "fecha_hora_fin" => $fecha_hora_fin
            );

        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->update('evento', $data)) {
            return true;
        }else{
            return false;
        }
    }

    public function EliminarEvento($condicion = array())
    {
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->delete('evento')) {
            return true;
        }else{
            return false;
        }
    }

    public function ExtraerEvento($condicion = array())
    {
    	if (isset($condicion['select']) && !empty($condicion['select'])) {
    		
    		$this->db->select($condicion['select']);
    	}else{
    		$this->db->select("*");
    	}

    	$this->db->from("evento");

    	if (isset($condicion['where']) && !empty($condicion['where'])) {
    		
    		$this->db->where($condicion['where']);
    	}

    	if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
    		
    		$this->db->or_where($condicion['or_where']);
    	}

    	return $this->db->get();
    	
    }

    public function ValidarEvento($condicion = array())
    {
    	$query = $this->ExtraerEvento($condicion);

    	if ($query->num_rows() > 0) {
    		return true;
    	}else{
    		return false;
    	}
    }

    public function RestarHoras($horaini,$horafin)
    {
        $horaini = date("H:i:s",strtotime($horaini));
        $horafin = date("H:i:s",strtotime($horafin));

        $horai=substr($horaini,0,2);
        $mini=substr($horaini,3,2);
        $segi=substr($horaini,6,2);

        $horaf=substr($horafin,0,2);
        $minf=substr($horafin,3,2);
        $segf=substr($horafin,6,2); 

        $ini=((($horai*60)*60)+($mini*60)+$segi);
        $fin=((($horaf*60)*60)+($minf*60)+$segf);

        $dif=$fin-$ini; 

        $difh=floor($dif/3600);
        $difm=floor(($dif-($difh*3600))/60);
        $difs=$dif-($difm*60)-($difh*3600);

       /* return date("H:i a",mktime($difh,$difm,$difs));*/
       return $dif;

    }

    public function CompararFechas($primera, $segunda)
    {
        $valoresPrimera     = explode ("-", $primera);   
        $valoresSegunda     = explode ("-", $segunda); 

        $diaPrimera         = $valoresPrimera[2];  
        $mesPrimera         = $valoresPrimera[1];  
        $anyoPrimera        = $valoresPrimera[0]; 
        $diaSegunda         = $valoresSegunda[2];  
        $mesSegunda         = $valoresSegunda[1];  
        $anyoSegunda        = $valoresSegunda[0];

        $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
        $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda); 

        if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
            
            return true;
        }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
            
            return false;
        }else{
            return  $diasPrimeraJuliano - $diasSegundaJuliano;
        } 
    }

    public function ValidarFechaHora($fecha_inicio, $fecha_fin, $hora_inicio, $hora_fin, $data)
    {

        $dif_FInicio_Factual = $this->CompararFechas($fecha_inicio,date("Y-m-d"));
        $dif_FFin_Factual    = $this->CompararFechas($fecha_fin,date("Y-m-d"));
        $dif_FInicio_fin     = $this->CompararFechas($fecha_fin,$fecha_inicio);
        //echo $dif_FInicio_fin;
        $difhoras = $this->RestarHoras($hora_inicio,$hora_fin);

        $data['status'] =  true;

        if ($dif_FInicio_Factual >= 0 && $dif_FFin_Factual >= 0 && $dif_FInicio_fin >= 0) {

            $difhoras = $this->RestarHoras($hora_inicio,$hora_fin);

            if ($difhoras < 1800 && $difhoras > 0) {
                
                $data['status']  = false;
                $data['mensaje'] = "La hora de finalización debe ser al menos 30 minutos después de la hora de inicio.";
            }elseif ($difhoras < 0) {
                
                $data['status']  = false;
                $data['mensaje'] = "La hora de finalización debe ser posterior a la hora de inicio y tener al menos 30 minutos de diferencia.";
            }
                   
        }elseif ($dif_FInicio_Factual < 0 || $dif_FInicio_Factual === true || $dif_FInicio_Factual === false) {

            if ($dif_FInicio_Factual < 0) {
                
                $data['status'] = false;
                $data['mensaje'] = "La fecha de inicio debe ser igual o posterior a la fecha actual.";
            }elseif ($dif_FInicio_Factual === true) {
                
                $data['status'] = false;
                $data['mensaje'] = "La fecha de inicio no es válida.";
            }elseif ($dif_FInicio_Factual === false) {
                
                $data['status'] = false;
                $data['mensaje'] = "La fecha actual del servidor no es válida.";
            }
            
        }elseif ($dif_FFin_Factual < 0 || $dif_FFin_Factual === true || $dif_FFin_Factual === false) {

            if ($dif_FFin_Factual < 0) {
                
                $data['status'] = false;
                $data['mensaje'] = "La fecha de finalización debe ser igual o posterior a la fecha actual.";
            }elseif ($dif_FFin_Factual === true) {
                
                $data['status'] = false;
                $data['mensaje'] = "La fecha de finalización no es válida.";
            }elseif ($dif_FFin_Factual === false) {
                
                $data['status'] = false;
                $data['mensaje'] = "La fecha actual del servidor no es válida.";
            }

        }elseif ($dif_FInicio_fin < 0 || $dif_FInicio_fin === true || $dif_FInicio_fin === false) {

            if ($dif_FInicio_fin < 0) {
                
                $data['status'] = false;
                $data['mensaje'] = "La fecha de finalización debe ser igual o posterior a la fecha de inicio.";
            }elseif ($dif_FInicio_fin === true) {
                
                $data['status'] = false;
                $data['mensaje'] = "La fecha de finalización no es válida.";
            }elseif ($dif_FInicio_fin === false) {
                
                $data['status'] = false;
                $data['mensaje'] = "La fecha de inicio no es válida.";
            }
        }

        return $data;
    }
}