<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certificartest_model extends CI_Model {

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

    //Genera un listado de todas las preguntas de tipo test
    public function lista_pregtest() {
        $this->db->select('pcu_pregtest.* , usuarios.Nombre');
        $this->db->from('pcu_pregtest');
        $this->db->join('usuarios', 'pcu_pregtest.autor = usuarios.id');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Muestra detalle de la pregunta por su ID
    public function editar_test($id_test) {
        $this->db->select('pcu_pregtest.* , usuarios.Nombre');
        $this->db->from('pcu_pregtest');
        $this->db->where('pcu_pregtest.TestID', $id_test);
        $this->db->join('usuarios', 'pcu_pregtest.autor = usuarios.id');
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
        return false;
    }
    
    //Guarda datos de la edicion
    public function guardar_test() {
        $datos = array(
            'pregunta' => $this->input->post('pregunta'),
            'A' => $this->input->post('A'),
            'B' => $this->input->post('B'),
            'C' => $this->input->post('C'),
            'D' => $this->input->post('D'),
            'resultado' => $this->input->post('resultado'),
            'estado' => $this->input->post('estado')
        );
        $this->db->where('TestID', $this->input->post('testid'));
        if($this->db->update('pcu_pregtest', $datos) == true) {
            return true;
        }
        return false;
    }
    
    //Crear nueva pregunta para el test
    public function crear_test() {
        $datos = array(
            'pregunta' => $this->input->post('pregunta'),
            'A' => $this->input->post('A'),
            'B' => $this->input->post('B'),
            'C' => $this->input->post('C'),
            'D' => $this->input->post('D'),
            'resultado' => $this->input->post('resultado'),
            'autor' => $this->session->userdata('UsuarioID'),
            'estado' => $this->input->post('estado'),
        );
        if($this->db->insert('pcu_pregtest', $datos) == true) {
            return true;
        }
        return false;
    }
    
    //Eliminar pregunta del test
    public function eliminar_test($id_pregunta) {
        $this->db->where('TestID', $id_pregunta);
        $this->db->delete('pcu_pregtest');
        return $this->db->affected_rows();
    }

}
