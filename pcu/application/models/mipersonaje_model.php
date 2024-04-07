<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mipersonaje_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Mostramos la información de mi personaje
    public function detalle_jugador() {
        $this->db->select('usuarios.Dinero, usuarios.Licencias, usuarios.Lenguajes, usuarios.Advertencias, usuarios.PuntosRol, usuarios.Baneado, usuarios.Coches, usuarios.Casas, usuarios.Negocio, usuarios.Taller, usuarios.Almacen, usuarios.Habilidad, usuarios.Apodo, usuarios.HorasJugadas, pcu_usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.id', $this->session->userdata('UsuarioID'));
        $this->db->join('pcu_usuarios', 'usuarios.id = pcu_usuarios.UsuarioID');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Comprobamos las llaves de los vehículos
    public function llaves_veh() {
        $this->db->select('Coches');
        $this->db->from('usuarios');
        $this->db->where('id', $this->session->userdata('UsuarioID'));
        $query = $this->db->get();
        $fila = $query->row();
        $llave = explode(',', $fila->Coches);
        if ($llave[0] != -1) {
            $llave_1 = $this->info_veh($llave[0]);
        } else {
            $llave_1 = '-1';
        }
        if ($llave[1] != -1) {
            $llave_2 = $this->info_veh($llave[1]);
        } else {
            $llave_2 = '-1';
        }
        if ($llave[2] != -1) {
            $llave_3 = $this->info_veh($llave[2]);
        } else {
            $llave_3 = '-1';
        }
        if ($llave[3] != -1) {
            $llave_4 = $this->info_veh($llave[3]);
        } else {
            $llave_4 = '-1';
        }
        if ($llave[4] != -1) {
            $llave_5 = $this->info_veh($llave[4]);
        } else {
            $llave_5 = '-1';
        }
        if ($llave[5] != -1) {
            $llave_6 = $this->info_veh($llave[5]);
        } else {
            $llave_6 = '-1';
        }
        $todo = array(
            $llave_1,
            $llave_2,
            $llave_3,
            $llave_4,
            $llave_5,
            $llave_6
        );
        return $todo;
    }
    
    //Obtenemos información de cada llave del vehículo
    public function info_veh($llave) {
        $this->db->where('id', $llave);
        $consulta = $this->db->get('vehiculos');
        return $consulta->result_array();
    }
    
    //Cargamos información del personaje
    public function detalle_personaje() {
        $this->db->select('usuarios.Apodo, usuarios.Datos, pcu_usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('id', $this->session->userdata('UsuarioID'));
        $this->db->join('pcu_usuarios', 'usuarios.id = pcu_usuarios.UsuarioID');
        $query = $this->db->get();
        return $query->result();
    }

    //Guardamos los datos de la edición del personaje
    public function guardar_personaje() {
        $datos = array(
            'apodo' => $this->input->post('apodo')
        );
        $this->db->where('id', $this->session->userdata('UsuarioID'));
        $this->db->update('usuarios', $datos);
        $datos2 = array(
            'procedencia' => $this->input->post('procedencia'),
            'altura' => $this->input->post('altura'),
            'peso' => $this->input->post('peso'),
            'colorojos' => $this->input->post('cojos'),
            'colorpelo' => $this->input->post('cpelo'),
            'descfisica' => $this->input->post('descfisica'),
            'descpsico' => $this->input->post('descpsico'),
            'historia' => $this->input->post('historia'),
            'comollegaste' => $this->input->post('comollegaste')
        );
        $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
        $this->db->update('pcu_usuarios', $datos2);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }
}
