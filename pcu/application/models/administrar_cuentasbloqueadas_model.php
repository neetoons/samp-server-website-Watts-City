<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Administrar_cuentasbloqueadas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    //Lista de cuentas bloqueadas
    public function listar_cuentasbloqueadas() {
        $this->db->select('bans.*, usuarios.Nombre');
        $this->db->from('bans');
        $this->db->join('usuarios','bans.UsuarioID = usuarios.id');
        $consulta = $this->db->get();
        return $consulta->result();
    }

}
