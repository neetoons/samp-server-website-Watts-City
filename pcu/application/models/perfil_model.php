<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Perfil_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function perfil($nombre) {
        $this->db->select('usuarios.Nombre, usuarios.Apodo, usuarios.Datos, usuarios.HorasJugadas, usuarios.Baneado, usuarios.Skin, pcu_usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.Nombre', $nombre);
        $this->db->join('pcu_usuarios', 'usuarios.id = pcu_usuarios.UsuarioID');
        $this->db->limit(1);
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
        return false;
    }

}
