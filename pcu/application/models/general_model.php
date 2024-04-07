<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class General_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Obtener nombre apartir de la id del jugador
    public function obtener_nombre($id) {
        $this->db->select('Nombre');
        $this->db->from('usuarios');
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        $fila = $consulta->row();
        return $fila->Nombre;
    }

    //Comprobar si el jugador esta conectado al servidor
    public function jugando($id_jugador) {
        $this->db->select('Jugando');
        $this->db->from('usuarios');
        $this->db->where('id', $id_jugador);
        $consulta = $this->db->get();
        $fila = $consulta->row();
        return $fila->Jugando;
    }

    public function comprobar_actualizaciones($valor, $tipo) {
        $this->db->from('actualizaciones');
        $this->db->where('valor', $valor);
        $this->db->where('tipo', $tipo);
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            return false;
        }
        return true;
    }

}
