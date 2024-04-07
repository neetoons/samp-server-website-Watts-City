<?php

class Administrar_skins_model extends CI_Model {

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
        $consulta = $this->db->get('pcu_skins');
        return $consulta->result();
    }

    //Añadimos un nuevo skin
    public function añadir_skin() {
        $datos = array(
            'SkinID' => $this->input->post('id_skin'),
            'sexo' => $this->input->post('sexo'),
            'estado' => $this->input->post('estado')
        );
        $this->db->insert('pcu_skins', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }
    
    //Mostramos todos los detalles de dicho skin
    public function editar_skin($id) {
        $this->db->from('pcu_skins');
        $this->db->where('SkinID', $id);
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
        return false;
    }
    
    //Guardamos la modificacion del skin
    public function guardar_skin() {
        $datos = array(
            'sexo' => $this->input->post('sexo'),
            'estado' => $this->input->post('estado')
        );
        $this->db->where('SkinID', $this->input->post('id_skin'));
        $this->db->update('pcu_skins', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }
    
    //Eliminar skin
    public function eliminar_skin($id_skin) {
        $this->db->where('SkinID', $id_skin);
        $this->db->delete('pcu_skins');
        return $this->db->affected_rows();
    }
    
    //Lista de ropa usual disponible segun el sexo y la raza
    public function ropa_usual() {
        $this->db->select('*');
        $this->db->from('pcu_skins');
        $this->db->where('estado', '0');
        $this->db->where('sexo', $this->session->userdata('sexo'));
        $consulta = $this->db->get();
        return $consulta->result();
    }
    
    //El jugador cambia la ropa de su personaje
    public function cambiar_ropausual() {
        $datos = array(
            'Skin' => $this->input->post('ropausual')
        );
        $this->db->where('id', $this->session->userdata('UsuarioID'));
        $this->db->update('usuarios', $datos);
        if ($this->db->affected_rows()) {
            $this->session->set_userdata('skin', $this->input->post('ropausual'));
            return true;
        }
    }
    
    //Lista de ropa de trabajo
    public function ropa_trabajo() {
        $this->db->select('*');
        $this->db->from('pcu_skinstrabajo');
        $this->db->where('estado', '0');
        $this->db->where('id_faccion', $this->session->userdata('faccion'));
        $consulta = $this->db->get();
        return $consulta->result();
    }
    
    //El jugador cambia la ropa de trabajo
    public function cambiar_ropatrabajo() {
        $datos = array(
            'Uniforme' => $this->input->post('ropatrabajo')
        );
        $this->db->where('id', $this->session->userdata('UsuarioID'));
        $this->db->update('usuarios', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
    }
}
