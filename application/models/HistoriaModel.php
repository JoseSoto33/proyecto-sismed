<?php

class HistoriaModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    /**
     * @method boolean AgregarHistoria()
     * @method boolean ModificarHistoria(mixed[] $condicion)
     * @method object ExtraerHistoria(mixed[] $condicion)
     * @method boolean ValidarHistoria(mixed[] $condicion)
     */

    /**
     * Registra una historia clínica en la base de datos
     * 
     * Los datos serán registrados en tablas diferentes, dependiendo el tipo de 
     * usuario que esté realizando la operación.
     *
     * @param mixed[]   $data   Arreglo que debe contener los datos a insertar y 
     * el nombre de la tabla donde serán insertados los datos
     *
     * @return boolean
     */
    public function AgregarHistoria($data = array())
    {
        if($this->db->insert($data['table'], $data['insert'])){
           
            return true;
        }else{
            return false;
        }
    }

    public function ModificarHistoria($condicion = array())
    {

    }

    public function ExtraerHistoria($condicion = array())
    {
        //Si se declaró una sentencia SQL personalizada...
        if (isset($condicion['query']) && !empty($condicion['query'])) {
            
            return $this->db->query($condicion['query']);
        }

        //Si se declaró una sentencia 'distinct'...
        if (isset($condicion['distinct']) && $condicion['distinct'] != false) {
            
            $this->db->distinct();
        }

        //Si se declaró una sentencia 'select'...
        if (isset($condicion['select']) && !empty($condicion['select'])) {
            
            $this->db->select($condicion['select']);
        }else{
            $this->db->select("*");
        }

        //Dependiendo del tipo de usuario..
        /*switch ($this->session->userdata('tipo_usuario')) {
                            
            //Si el tipo de usuario es "Doctor"...
            case "Doctor":
                $this->db->from("historia_medicina AS historia");
                break;

            //Si el tipo de usuario es "Enfermero"...
            case "Enfermero":
                $this->db->from("historia_medicina AS historia");
                break;*/
            /*
            //Si el tipo de usuario es "Odontólogo"...
            case "Odontólogo":
                $this->db->from("historia_medicina");
                break;

            //Si el tipo de usuario es "Bioanalista"...
            case "Bioanalista":
                $this->db->from("historia_medicina");
                break;

            //Si el tipo de usuario es "Nutricionista"...
            case "Nutricionista":
                $this->db->from("historia_medicina");
                break;

            //Si el tipo de usuario es "Asistente"...
            case "Asistente":
                $this->db->from("historia_medicina");
                break;*/
        //}

        if (isset($condicion['from']) && !empty($condicion['from'])) {
            
            $this->db->from($condicion['from']);
        }else{            
            $this->db->from("historia_clinica AS historia");
        }

        //Si está definida una cláusula 'join'
        if (isset($condicion['join']) && !empty($condicion['join'])) {
            
            $this->db->join($condicion['join']['tabla'],$condicion['join']['condicion']);
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
            
            $this->db->order_by($condicion['order_by']);
        }

        return $this->db->get();
    }

    public function ValidarHistoria($condicion = array())
    {
        $query = $this->ExtraerHistoria($condicion);

        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

}