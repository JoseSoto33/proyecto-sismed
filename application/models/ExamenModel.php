<?php

class ExamenModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    /**
     * @method boolean AgregarOrden()
     * @method boolean AgregarExamen()
     * @method boolean ModificarOrden(mixed[] $condicion)
     * @method boolean ModificarExamen(mixed[] $condicion)
     * @method boolean EliminarOrden(mixed[] $condicion)
     * @method boolean EliminarExamen(mixed[] $condicion)
     * @method object ExtraerOrden(mixed[] $condicion)
     * @method object ExtraerExamen(mixed[] $condicion)
     * @method boolean ValidarOrden(mixed[] $condicion)
     * @method boolean ValidarExamen(mixed[] $condicion)
     */

    /**
     * @todo Comentar el resto de los archivos
     */
    public function AgregarOrden()   
    {

     	$data = array(
     			"id_usuario" => $this->session->userdata('idUsuario'),
                "cedula" => $this->input->post('cedula'),
                "nombre1" => $this->input->post('nombre1'),
                "apellido1" => $this->input->post('apellido1'),
                "sexo" => $this->input->post('sexo'),
                "fecha_nacimiento" => $this->input->post('fecha_nacimiento'),
                "fecha_entrega_pautada" => $this->input->post('fecha_entrega_pautada'),
                "examen_heces" => isset($_POST['examen_heces']),
                "examen_hematologia" => isset($_POST['examen_hematologia']),
                "examen_orina" => isset($_POST['examen_orina']),
                "examen_miscelaneo" => implode(',', $_POST['examen_miscelaneo']),
                "tipo_paciente" => $this->input->post('tipo_paciente'),
                "email" => $this->input->post('email'),
     		);

     	if($this->db->insert("orden_examen", $data)){
     		return true;
     	}else{
     		return false;
     	}
    }

    public function ModificarOrden($data, $id_orden) {
        $update = array();

        if (!empty($data["fecha_entrega_pautada"])) {
            $update["fecha_entrega_pautada"] = $data['fecha_entrega_pautada'];
        }
        $update["examen_heces"] = isset($data['examen_heces']);
        $update["examen_hematologia"] = isset($data['examen_hematologia']);
        $update["examen_orina"] = isset($data['examen_orina']);
        $update["examen_miscelaneo"] = implode(',', $data['examen_miscelaneo']);

        $this->db->where("id", $id_orden);
        if ($this->db->update('orden_examen', $update)) {
            return true;
        }else{
            return false;
        }
    }

    public function EliminarOrden($condicion = array())
    {
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->delete('orden_examen')) {
            return true;
        }else{
            return false;
        }
    }

    public function ExtraerOrdenes() {
        $this->db->where('id_usuario', $this->session->userdata('idUsuario'));
        $query = $this->db->get("orden_examen");        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;        
    }

    public function ExtraerOrden($idOrden)
    {
    	$this->db->where("MD5(concat('sismed',id))", $idOrden);
    	$query = $this->db->get("orden_examen");    	
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    	return null;    	
    }

    public function ExtraerOrdenPaciente($cedula)
    {
        $this->db->where('cedula', $cedula);
        $query = $this->db->get("orden_examen");        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;        
    }

    public function ExtraerExamenes($tipo_examen) {
        $this->db->where('id_usuario', $this->session->userdata('idUsuario'));
        $query = $this->db->get($tipo_examen);        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;        
    }

    public function ExtraerExamen($tipo_examen, $idExamen)
    {
        $this->db->where("MD5(concat('sismed',id))", $idExamen);
        $query = $this->db->get($tipo_examen);        
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return null;        
    }

    public function ExtraerExamenOrden($tipo_examen, $idOrden)
    {
        $this->db->where("MD5(concat('sismed',id_orden))", $idOrden);
        $query = $this->db->get($tipo_examen);        
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return null;        
    }

    public function ExtraerExamenPaciente($tipo_examen, $cedula) {
        $this->db->join("orden_examen", "orden_examen.id = $tipo_examen.id_orden");
        $this->db->where('orden_examen.cedula', $cedula);
        $query = $this->db->get($tipo_examen);        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;        
    }

    public function ValidarOrden($post, $idOrden = null) {

        if (!empty($idOrden)) $old_orden = $this->ExtraerOrden($idOrden);
        $ordenes = $this->ExtraerOrdenPaciente($post['cedula']);

        if (!empty($ordenes)) {
            foreach ($ordenes as $x => $orden) {
                if ($orden['entregado'] == 'f' && date('d-m-Y',strtotime($orden['fecha_entrega_pautada'])) == date('d-m-Y',strtotime($post['fecha_entrega_pautada'])) && ( (!empty($old_orden) && $old_orden['id'] != $orden['id']) || empty($old_orden) ) ) {
                    if ($orden['examen_heces'] == 't' && isset($post['examen_heces'])) {
                        return true;
                    } elseif ($orden['examen_hematologia'] == 't' && isset($post['examen_hematologia'])) {
                        return true;
                    } elseif ($orden['examen_orina'] == 't' && isset($post['examen_orina'])) {
                        return true;
                    } elseif (!empty($orden['examen_miscelaneo'])) {
                        $miscelaneos = explode(',',$orden['examen_miscelaneo']);
                        foreach ($post['examen_miscelaneo'] as $y => $miscelaneo) {
                            if (in_array($miscelaneo, $miscelaneos)) {
                                return true;
                            }
                        }
                    }
                }
            }
        } else {
            return false;
        }
         
    }
}