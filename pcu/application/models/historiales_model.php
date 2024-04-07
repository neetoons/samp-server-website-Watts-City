<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Historiales_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    //Listamos registros de cambios de nombre
    public function listar_cambiosdenombre() {
        $consulta = $this->db->get('pcu_cambiosnombre');
        return $consulta->result();
    }
    
    //Listamos registros de expulsados
    public function listar_expulsados() {
        $consulta = $this->db->get('expulsiones');
        return $consulta->result();
    }
    
    //Listamos registros de accesos
    public function listar_accesos() {
        $consulta = $this->db->get('accesos');
        return $consulta->result();
    }

}
