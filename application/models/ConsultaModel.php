<?php

class ConsultaModel extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    /**
     * @method boolean AgregarConsulta()
     * @method boolean ModificarConsulta(mixed[] $condicion)
     * @method object ExtraerConsulta(mixed[] $condicion)
     * @method boolean ValidarConsulta(mixed[] $condicion)
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
    public function AgregarConsulta($data = array())
    {
        if($this->db->insert($data['table'], $data['insert'])){
           
            return true;
        }else{
            return false;
        }
    }

    public function ModificarConsulta($condicion = array())
    {

    }

    public function ExtraerConsulta($condicion = array())
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
        
        //Si está definida una cláusula 'from'
        if (isset($condicion['from']) && !empty($condicion['from'])) {
            
            $this->db->from($condicion['from']);

        //Si no...
        }else{            
            $this->db->from("consulta");
        }

        //Si está definida una cláusula 'where'
        if (isset($condicion['join']) && !empty($condicion['join'])) {
            
            if (isset($condicion['join']['tipo'])) {
                $this->db->join($condicion['join']['tabla'],$condicion['join']['condicion'],$condicion['join']['tipo']);
            }else{
                $this->db->join($condicion['join']['tabla'],$condicion['join']['condicion']);
            }
        }

        //Si están definidas varias cláusula 'where'
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

    public function ValidarConsulta($condicion = array())
    {
        $query = $this->ExtraerConsulta($condicion);

        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

}