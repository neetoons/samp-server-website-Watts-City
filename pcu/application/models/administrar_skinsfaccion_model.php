<?php

class Administrar_skinsfaccion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Contar registros de la tabla
    public function ContarRegistros($tabla, $where = -1) {
        if ($where > -1) {
            //No es null
            $this->db->where('estado', $where);
            $this->db->from($tabla);
            $total = $this->db->count_all_results();
        } else {
            //Es null
            $total = $this->db->count_all($tabla);
        }
        return $total;
    }

    //Lista de todos los skins disponibles en la base de datos
    public function listar_skins() {
        $this->db->select('pcu_skinstrabajo.*, facciones.Nombre');
        $this->db->from('pcu_skinstrabajo');
        $this->db->join('facciones', 'pcu_skinstrabajo.id_faccion = facciones.id');
        $consulta = $this->db->get();
        return $consulta->result();
    }
    
    //Lista topas las facciones legales disponibles
    public function listar_facciones() {
        $this->db->select('id, Nombre');
        $this->db->from('facciones');
        $this->db->where('tipo', '0');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Añadimos un nuevo skin
    public function añadir_skin() {
        $datos = array(
            'id_faccion' => $this->input->post('faccion'),
            'SkinID' => $this->input->post('id_skin'),
            'estado' => $this->input->post('estado')
        );
        $this->db->insert('pcu_skinstrabajo', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }
    
    //Mostramos todos los detalles de dicho skin
    public function editar_skin($id) {
        $this->db->from('pcu_skinstrabajo');
        $this->db->where('id_skintrabajo', $id);
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
        return false;
    }
    
    //Guardamos la modificacion del skin
    public function guardar_skin() {
        $datos = array(
            'id_faccion' => $this->input->post('faccion'),
            'SkinID' => $this->input->post('id_skin'),
            'estado' => $this->input->post('estado')
        );
        $this->db->where('id_skintrabajo', $this->input->post('sqlid'));
        $this->db->update('pcu_skinstrabajo', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }
    
    //Eliminar skin
    public function eliminar_skin($id_skin) {
        $this->db->where('id_skintrabajo', $id_skin);
        $this->db->delete('pcu_skinstrabajo');
        return $this->db->affected_rows();
    }
}
