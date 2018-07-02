<?php

class CitasModel extends CI_Model {/*CI: CodeIgniter*/

    public function __construct()
    {
            parent::__construct();
    }

    /**
     * @method boolean Agregarcita()
     * @method boolean Modificarcita(mixed[] $condicion)
     * @method object Extraercita(mixed[] $condicion)
     * @method boolean Validarcita(mixed[] $condicion)
     */

    /**
     * Registra una nueva cita en la base de datos
     * 
     * Los datos serán registrados en tablas diferentes, dependiendo el tipo de 
     * usuario que esté realizando la operación.
     *
     * @param mixed[]   $data   Arreglo que debe contener los datos a insertar y 
     * el nombre de la tabla donde serán insertados los datos
     *
     * @return boolean
     */
    public function AgregarCita()
    {
        unset($_POST['examenes']);
        if(isset($_POST['primera_vez'])){
            $_POST['primera_vez']= true;
        }
        $_POST['id_paciente'] = (!empty($_POST['id_paciente']))? $_POST['id_paciente'] : null;
        if($this->db->insert("citas", $_POST)){
           
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function ModificarCita($condicion = array())
    {
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        if ($this->db->update("citas", $condicion['data'])) {
            return true;
        }else{
            return false;
        }
    }

    public function ExtraerCitas($condicion = array())
    {
        //Si se declaró una sentencia SQL personalizada...
        if (isset($condicion['query']) && !empty($condicion['query'])) {
            
            return $this->db->query($condicion['query']);
        }

        //Si se declaró una sentencia 'distinct' ... no trae registro repetidos 
        if (isset($condicion['distinct']) && $condicion['distinct'] != false) {
            
            $this->db->distinct();
        }

        //Si se declaró una sentencia 'select'... especifica que columnas a consultar
        if (isset($condicion['select']) && !empty($condicion['select'])) {
            
            $this->db->select($condicion['select']);
        }else{
            $this->db->select("*");
        }
        
        //Si está definida una cláusula 'from' especifica la tabla consultar
        if (isset($condicion['from']) && !empty($condicion['from'])) {
            
            $this->db->from($condicion['from']);

        //Si no...
        }else{            
            $this->db->from("citas");
        }

        //Si está definida una cláusula 'join'
        if (isset($condicion['join']) && !empty($condicion['join'])) {
            
            if (isset($condicion['join']['tipo'])) {
                $this->db->join($condicion['join']['tabla'],$condicion['join']['condicion'],$condicion['join']['tipo']);
            }else{
                $this->db->join($condicion['join']['tabla'],$condicion['join']['condicion']);
            }
        }

        //Si están definidas varias cláusula 'joins'
        if (isset($condicion['joins']) && !empty($condicion['joins'])) {
            
            foreach ($condicion['joins'] as $key => $join) {
                
                if (isset($join['tipo'])) {
                    $this->db->join($join['tabla'],$join['condicion'],$join['tipo']);
                }else{
                    $this->db->join($join['tabla'],$join['condicion']);
                }
            }
        }

        //Si está definida una cláusula 'where'
        if (isset($condicion['where']) && !empty($condicion['where'])) {
            
            $this->db->where($condicion['where']);
        }

        //Si está definida una cláusula 'or where'
        if (isset($condicion['or_where']) && !empty($condicion['or_where'])) {
            
            $this->db->or_where($condicion['or_where']);
        }

        //Si se definió un orden para los registros
        if (isset($condicion['order_by']) && !empty($condicion['order_by'])) {
            
            $this->db->order_by($condicion['order_by']['campo'],$condicion['order_by']['opcion']);
        }

        return $this->db->get();
    }

    public function ExtraerCitasPendientes() {
        $this->db->select("id, nombre1, apellido1, cedula, motivo, fecha_cita as start, estatus");
        $query = $this->db->get('citas');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return null;
    }

    public function ExtraerCita($id_cita){
        $this->db->where("id",$id_cita);
        $query= $this->db->get("citas");
        if($query->num_rows()> 0){
            return $query->row();
        }
        return null;
    }

    public function Validarcita($condicion = array())
    {
        $query = $this->Extraercita($condicion);

        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function CancelarCita($idcita){
        $this->db->set('estatus','3');
        $this->db->where("MD5(concat('sismed',id))",$idcita);

        if($this->db->update('citas')){
            return true;
        }
        return false;

    }

    public function ActualizarstatusCita(){
        
        $this->db->set('estatus','1');
        $this->db->where("estatus",'0');
        $this->db->where("fecha_cita",date("Y-m-d"));
        $this->db->update("citas");

        $this->db->set('estatus','4');
        $this->db->where("estatus",'1');
        $this->db->where("fecha_cita < ",date("Y-m-d"));
        $this->db->or_where("estatus","0");
        $this->db->where("fecha_cita < ",date("Y-m-d"));
        $this->db->update("citas");
    }
}