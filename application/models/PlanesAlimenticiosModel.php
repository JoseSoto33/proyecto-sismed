<?php

class PlanesAlimenticiosModel extends CI_Model {/*CI: CodeIgniter*/

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
    public function AgregarCita()
    {
        unset($_POST['examenes']);
        $_POST['id_paciente'] = (!empty($_POST['id_paciente']))? $_POST['id_paciente'] : null;
        if($this->db->insert("citas", $_POST)){
           
            return true;
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

    public function ExtraerListaSustitutos()
    {
        $result=$this->db->get_where("lista_sustitutos", array("estatus"=>TRUE));
        if ($result->num_rows()> 0) {
            return $result->result_array();
        }
        return null;
    }

    public function ExtraerListaRacion($id_lista){
        $result=$this->db->get_where("lista_racion", array("id_lista"=>$id_lista));
        if ($result->num_rows()> 0) {
            return $result->result_array();
        }
        return null;
    }

    public function ExtraerListaEquivalente(){
        $result=$this->db->get("lista_equivalente");
        if ($result->num_rows()> 0) {
            return $result->result_array();
        }
        return null;
    }

    public function ExtraerListaMedida(){
        $result=$this->db->get("lista_medida");
        if ($result->num_rows()> 0) {
            return $result->result_array();
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

}