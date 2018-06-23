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
    public function AgregarPlanAlimenticio($id_usuario,$prescripcion)
    {
        $this->db->set("id_usuario",$id_usuario);
        $this->db->set("prescripcion_dietetica",trim($prescripcion));
        if($this->db->insert("plan_alimenticio")){
           
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function AgregarRacionSustituto($id_plan_alimenticio,$racion,$medida)
    {
        $this->db->set("id_plan_alimenticio",$id_plan_alimenticio);
        $this->db->set("id_racion",$racion);
        $this->db->set("id_medida",$medida);
        
        if($this->db->insert("lista_racion_sustituto")){
         return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function AgregarTurnoEquivalente($turno,$turno_equivalente,$id_lista_racion_sustituto)
    {
        $this->db->set("id_equivalente",$turno_equivalente);
        $this->db->set("turno_comida",$turno);
        $this->db->set("id_sustituto",$id_lista_racion_sustituto);

        if($this->db->insert("turno_equivalente")){
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

    public function ExtraerRecomendaciones(){
        $this->db->order_by('id','ASC');
        $result=$this->db->get("recomendaciones");
        if ($result->num_rows()> 0) {
            return $result->result_array();
        }
        return null;

    }
    public function ExtraerListaRecomendaciones($id_recomendacion){
        $this->db->select('lista_recomendaciones.*');
        $this->db->join('relacion_recomendaciones_lista', 'id_lista = lista_recomendaciones.id');
        $this->db->where('relacion_recomendaciones_lista.id_recomendaciones', $id_recomendacion);

        $result=$this->db->get("lista_recomendaciones");
        if ($result->num_rows()> 0) {
            return $result->result_array();
        }
        return null;

    }

    public function ExtraerCuadroRecomendaciones($id_recomendacion){
        $this->db->select('alimentos_recomendaciones.descripcion as alimento, cuadro_recomendaciones.*');
        $this->db->join('alimentos_recomendaciones', 'id_alimentos = alimentos_recomendaciones.id');
        $this->db->where('cuadro_recomendaciones.id_recomendaciones', $id_recomendacion);

        $result=$this->db->get("cuadro_recomendaciones");
        if ($result->num_rows()> 0) {
            return $result->result_array();
        }
        return null;
    }

}