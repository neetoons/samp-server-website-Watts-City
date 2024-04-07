<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Administrar_cuentas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Contar registros de la tabla
    public function ContarRegistros($tabla, $where = -1) {
        if ($where > -1) {
            //No es null
            $this->db->where($where);
            $this->db->from($tabla);
            $total = $this->db->count_all_results();
        } else {
            //Es null
            $total = $this->db->count_all($tabla);
        }
        return $total;
    }

    //Lista de cuentas de la base de datos
    public function listar_cuentas() {
        $this->db->select('id, Nombre, Baneado');
        $this->db->from('usuarios');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Obtenemos todos los detalle del jugador
    public function detalle_jugador($nombre) {
        $this->db->select('usuarios.*, pcu_usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.Nombre', $nombre);
        $this->db->join('pcu_usuarios', 'usuarios.id = pcu_usuarios.UsuarioID');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Obtenemos la id a partir del nombre del jugador
    public function obtener_id($nombre) {
        $this->db->select('id');
        $this->db->from('usuarios');
        $this->db->where('Nombre', $nombre);
        $consulta = $this->db->get();
        $fila = $consulta->row();
        return $fila->id;
    }

    //Obtenemos la certificación del jugador
    public function obtener_certificacion($nombre) {
        $id = $this->obtener_id($nombre);
        $this->db->select('pcu_certificacion.*, usuarios.Nombre');
        $this->db->from('pcu_certificacion');
        $this->db->where('pcu_certificacion.UsuarioID', $id);
        $this->db->join('usuarios', 'pcu_certificacion.certificador = usuarios.id');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Obtenemos todos los accesos que ha echo el jugador
    public function obtener_accesos($nombre) {
        $id = $this->obtener_id($nombre);
        $this->db->select('*');
        $this->db->from('accesos');
        $this->db->where('idjugador', $id);
        $this->db->limit(60);
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Comprobamos las llaves de los vehículos
    public function llaves_veh($nombre) {
        $id = $this->obtener_id($nombre);
        $this->db->select('Coches');
        $this->db->from('usuarios');
        $this->db->where('id', $id);
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

    //Guardamos los datos de la edición del personaje
    public function guardar_personaje() {
        $posiciones = $this->input->post('posicion').','.$this->input->post('interior').','.$this->input->post('virtualworld');
        $datos = $this->input->post('edad').','.$this->input->post('sexo').','.$this->input->post('nivel').','.$this->input->post('respeto').','.$this->input->post('payday');
        $necesidades = $this->input->post('hambre').','.$this->input->post('energia').','.$this->input->post('alcohol');
        $dinero = $this->input->post('cartera').','.$this->input->post('banco');
        $faccion = $this->input->post('lider').','.$this->input->post('faccion').','.$this->input->post('rango');
        $licencias = $this->input->post('conduccion').','.$this->input->post('navegacion').','.$this->input->post('vuelo').','.$this->input->post('pesca').','.$this->input->post('caza').','.$this->input->post('armas').','.$this->input->post('camiones').','.$this->input->post('motos');
        $idiomas = $this->input->post('japones').','.$this->input->post('italiano').','.$this->input->post('ruso').','.$this->input->post('aleman').','.$this->input->post('frances').','.$this->input->post('chino');
        $datos = array(
            'Apodo' => $this->input->post('apodo'),
            'Posiciones' => $posiciones,
            'Datos' => $datos,
            'Skin' => $this->input->post('skin'),
            'Necesidades' => $necesidades,
            'Vida' => $this->input->post('vida'),
            'Chaleco' => $this->input->post('chaleco'),
            'Dinero' => $dinero,
            'Faccion' => $faccion,
            'PuntosRol' => $this->input->post('puntosrol'),
            'Admin' => $this->input->post('admin'),
            'Almacen' => $this->input->post('almacen'),
            'Taller' => $this->input->post('taller'),
            'Negocio' => $this->input->post('negocio'),
            'Casas' => $this->input->post('casas'),
            'Coches' => $this->input->post('vehiculos'),
            'Licencias' => $licencias,
            'Lenguajes' => $idiomas,
        );
        $this->db->where('id', $this->input->post('id_jugador'));
        $this->db->update('usuarios', $datos);
        
        $datos2 = array(
            'email' => $this->input->post('email'),
            'sub_admin' => $this->input->post('sub_admin'),
            'raza' => $this->input->post('raza'),
            'altura' => $this->input->post('altura'),
            'peso' => $this->input->post('peso'),
            'colorojos' => $this->input->post('colorojos'),
            'colorpelo' => $this->input->post('colorpelo'),
            'procedencia' => $this->input->post('procedencia'),
            'descfisica' => $this->input->post('descfisica'),
            'descpsico' => $this->input->post('descpsico'),
            'historia' => $this->input->post('historia'),
            'comollegaste' => $this->input->post('comollegaste'),
        );

        $this->db->where('UsuarioID', $this->input->post('id_jugador'));
        $this->db->update('pcu_usuarios', $datos2);
        return true;
    }

}
