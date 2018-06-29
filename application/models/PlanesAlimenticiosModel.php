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
    public function AgregarPlanAlimenticio($id_usuario,$prescripcion,$recomendacion)
    {
        $this->db->set("id_usuario",$id_usuario);
        $this->db->set("prescripcion_dietetica",trim($prescripcion));
        $this->db->set("id_recomendaciones",$recomendacion);
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

    public function GuardarMenuPlan($id_plan_alimenticio,$horaD=null, $horaMD=null, $horaA=null, $horaMA=null, $horaC=null, $horaMC=null){

        if(!empty($horaD)) $this->db->set('hora_desayuno',$horaD);
        if(!empty($horaMD)) $this->db->set('hora_merienda_desayuno',$horaMD);
        if(!empty($horaA)) $this->db->set('hora_almuerzo',$horaA);
        if(!empty($horaMA)) $this->db->set('hora_merienda_almuerzo',$horaMA);
        if(!empty($horaC)) $this->db->set('hora_cena',$horaC);
        if(!empty($horaMC)) $this->db->set('hora_merienda_cena',$horaMC);

        $this->db->set('id_plan_alimenticio',$id_plan_alimenticio);
        $this->db->insert('menu_plan');
    }

    public function ExtraerPlanesAlimenticios($condicion = array())
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
            $this->db->from("plan_alimenticio");
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

    public function EliminarPlan($id){
    
        $this->db->where("MD5(concat('sismed',id))",$id);

        if($this->db->delete('plan_alimenticio')){
            return true;
        }
        return false;

    }

}