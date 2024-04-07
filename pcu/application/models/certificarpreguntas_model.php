<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certificarpreguntas_model extends CI_Model {

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
    
    //Genera un listado de todas las preguntas de desarrollo
    public function listar_preguntas() {
        $this->db->select('pcu_pregcerts.* , usuarios.Nombre');
        $this->db->from('pcu_pregcerts');
        $this->db->join('usuarios', 'pcu_pregcerts.autor = usuarios.id');
        $consulta = $this->db->get();
        return $consulta->result();
    }
    
    //Muestra detalle de la pregunta por su ID
    public function detalle_pregunta($id_pregunta) {
        $this->db->select('pcu_pregcerts.* , usuarios.Nombre');
        $this->db->from('pcu_pregcerts');
        $this->db->where('pcu_pregcerts.PreID', $id_pregunta);
        $this->db->join('usuarios', 'pcu_pregcerts.autor = usuarios.id');
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
        return false;
    }
    
    //Guardamos los datos de la edicion de la pregunta de desarrollo
    public function guardar_pregunta() {
        $datos = array(
            'pregunta' => $this->input->post('pregunta'),
            'estado' => $this->input->post('estado')
        );
        $this->db->where('PreID', $this->input->post('preguntaid'));
        if($this->db->update('pcu_pregcerts', $datos) == true) {
            return true;
        }
        return false;
    }
    
    //Crear nueva pregunta de desarrollo
    public function crear_pregunta() {
        $datos = array(
            'pregunta' => $this->input->post('pregunta'),
            'autor' => $this->session->userdata('UsuarioID'),
            'estado' => $this->input->post('estado'),
        );
        if($this->db->insert('pcu_pregcerts', $datos) == true) {
            return true;
        }
        return false;
    }
    
    //Eliminar pregunta de desarrollo
    public function eliminar_pregunta($id_pregunta) {
        $this->db->where('PreID', $id_pregunta);
        $this->db->delete('pcu_pregcerts');
        return $this->db->affected_rows();
    }

}
