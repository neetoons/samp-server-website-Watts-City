<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Administrar_facciones_model extends CI_Model {

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

    //Listamos todos los miembros que pertenecen a la facción
    public function listar_miembros($id_faccion) {
        $consulta = $this->db->query("SELECT id, Nombre, Faccion, Uniforme FROM usuarios WHERE Faccion LIKE '_," . $id_faccion . "%'");
        return $consulta->result();
    }

    //Listamos todas las facciones disponibles
    public function listar_facciones() {
        $consulta = $this->db->get('facciones');
        return $consulta->result();
    }

    //Contar todos los miembros que pertenecen a una facción
    public function contar_miembros($id_faccion) {
        $consulta = $this->db->query("SELECT COUNT(*) FROM usuarios WHERE Faccion LIKE '_," . $id_faccion . "%'");
        $result = $consulta->row_array();
        return $result['COUNT(*)'];
    }

    //Ver facción
    public function ver_faccion($id) {
        $this->db->from('facciones');
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Guardar facción
    public function guardar_faccion() {
        $this->db->from('actualizaciones');
        $this->db->where('valor', $this->input->post('id_faccion'));
        $this->db->where('tipo', '1');
        $consulta = $this->db->get();
        if ($consulta->num_rows() == 0) {
            $i_datos = array(
                'valor' => $this->input->post('id_faccion'),
                'tipo' => '1'
            );
            $this->db->insert('actualizaciones', $i_datos);
        }

        $datos = array(
            'Nombre' => $this->input->post('nombre'),
            'tipo' => $this->input->post('tipo'),
            'lider' => $this->input->post('lider'),
            'estado' => $this->input->post('estado'),
            'Rango1' => $this->input->post('rango1'),
            'Rango2' => $this->input->post('rango2'),
            'Rango3' => $this->input->post('rango3'),
            'Rango4' => $this->input->post('rango4'),
            'Rango5' => $this->input->post('rango5'),
            'Rango6' => $this->input->post('rango6'),
            'Rango7' => $this->input->post('rango7'),
            'Rango8' => $this->input->post('rango8'),
            'Sueldo1' => $this->input->post('sueldo1'),
            'Sueldo2' => $this->input->post('sueldo2'),
            'Sueldo3' => $this->input->post('sueldo3'),
            'Sueldo4' => $this->input->post('sueldo4'),
            'Sueldo5' => $this->input->post('sueldo5'),
            'Sueldo6' => $this->input->post('sueldo6'),
            'Sueldo7' => $this->input->post('sueldo7'),
            'Sueldo8' => $this->input->post('sueldo8')
        );
        $this->db->where('id', $this->input->post('id_faccion'));
        $this->db->update('facciones', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }

    //Lista todas las skins disponibles de esa facción
    public function listar_skins($id_faccion) {
        $this->db->from('pcu_skinstrabajo');
        $this->db->where('id_faccion', $id_faccion);
        $this->db->where('estado', '0');
        $this->db->order_by('SkinID', 'asc');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Cargamos todos los detalles del miembro actual
    public function editar_miembro($id_jugador) {
        $this->db->select('id, Nombre, Faccion, Uniforme');
        $this->db->from('usuarios');
        $this->db->where('id', $id_jugador);
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Guardar miembro de la edición
    public function guardar_miembro() {
        $this->db->select('id, Faccion, Jugando');
        $this->db->from('usuarios');
        $this->db->where('id', $this->input->post('id_jugador'));
        $consulta = $this->db->get();
        $fila = $consulta->row();
        $fac = explode(',', $fila->Faccion);
        if ($fila->Jugando > 0) { //El jugador esta en el juego, actualizamos
            $this->db->from('actualizaciones');
            $this->db->where('valor', $fila->id);
            $this->db->where('tipo', '3');
            $consulta2 = $this->db->get();
            if ($consulta2->num_rows() == 0) {
                $i_datos = array(
                    'valor' => $fila->id,
                    'tipo' => '3',
                    'msg1' => $this->general_library->NombreReal($this->session->userdata('nombre')),
                    'msg2' => $fac[1],
                    'msg3' => $this->input->post('rango'),
                    'msg4' => '1'
                );
                $this->db->insert('actualizaciones', $i_datos);
            }
        }
        $datos = array(
            'Uniforme' => $this->input->post('skin'),
            'Faccion' => $fac[0] . ',' . $fac[1] . ',' . $this->input->post('rango')
        );
        $this->db->where('id', $this->input->post('id_jugador'));
        $this->db->update('usuarios', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }

    //Expulsa miembro
    public function expulsar_miembro($id_jugador) {
        if ($this->general_library->jugando($id_jugador) > 0 && $this->general_library->comprobar_actualizaciones($id_jugador, 4) > 0) { //El jugador esta jugando y no tiene actualizaciones
            $i_datos = array(
                'valor' => $id_jugador,
                'tipo' => '4',
                'msg1' => $this->general_library->NombreReal($this->session->userdata('nombre')),
                'msg2' => '1'
            );
            $this->db->insert('actualizaciones', $i_datos);
        }
        $datos = array(
            'Uniforme' => '26',
            'Faccion' => '0,0,0'
        );
        $this->db->where('id', $id_jugador);
        $this->db->update('usuarios', $datos);
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }

    //Agrega miembro
    public function agregar_miembro() {
        $this->db->select('id, Faccion, Trabajo, Jugando');
        $this->db->from('usuarios');
        $this->db->where('Nombre', $this->input->post('nombre_ju'));
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            $fila = $consulta->row();
            $fac = explode(',', $fila->Faccion);
            $job = explode(',', $fila->Trabajo);
            if ($fac[1] == 0 && $job[0] == 0) {
                //No tiene ni trabajo ni facción, se agrega
                if ($fila->Jugando > 0) {
                    //El jugador esta jugando, actualizamos
                    $this->db->from('actualizaciones');
                    $this->db->where('valor', $fila->id);
                    $this->db->where('tipo', '2');
                    $consulta2 = $this->db->get();
                    if ($consulta2->num_rows() == 0) {
                        $i_datos = array(
                            'valor' => $fila->id,
                            'tipo' => '2',
                            'msg1' => $this->general_library->NombreReal($this->session->userdata('nombre')),
                            'msg2' => $this->input->post('id_faccion_ju'),
                            'msg3' => $this->input->post('rango_ju'),
                            'msg4' => '1'
                        );
                        $this->db->insert('actualizaciones', $i_datos);
                    }
                }
                $datos = array(
                    'Uniforme' => '26',
                    'Faccion' => '0,' . $this->input->post('id_faccion_ju') . ',' . $this->input->post('rango_ju')
                );
                $this->db->where('Nombre', $this->input->post('nombre_ju'));
                $this->db->update('usuarios', $datos);
                if ($this->db->affected_rows()) {
                    return true;
                }
            } else {
                //Tiene trabajo o facción no se agrega
                return 99;
            }
        }
        return false;
    }
    
    //Comprobamos facciones
    public function comprobar_facciones($id_jugador) {
        $this->db->select('Faccion');
        $this->db->from('usuarios');
        $this->db->where('id', $id_jugador);
        $consulta = $this->db->get();
        $fila = $consulta->row();
        $fac = explode(',', $fila->Faccion);
        if($fac[1] == $this->session->userdata('lider')) {
            return true;
        }
        return false;
    }

}
