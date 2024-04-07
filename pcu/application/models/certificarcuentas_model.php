<?php

class Certificarcuentas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Contar registros de la tabla
    public function ContarRegistros($tabla, $where = -1) {
        if ($where > -1) {
            //No es null
            $this->db->where('corregida', $where);
            $this->db->from($tabla);
            $total = $this->db->count_all_results();
        } else {
            //Es null
            $total = $this->db->count_all($tabla);
        }
        return $total;
    }

    //Listar cuentas por certificar
    public function listar_cuentas() {
        $this->db->select('pcu_certificar.* , usuarios.Nombre, pcu_usuarios.int_cert, pcu_usuarios.int_test');
        $this->db->from('pcu_certificar');
        $this->db->where('pcu_certificar.corregida = 0');
        $this->db->join('usuarios', 'pcu_certificar.UsuarioID = usuarios.id');
        $this->db->join('pcu_usuarios', 'pcu_certificar.UsuarioID = pcu_usuarios.UsuarioID');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Obtenemos el nombre del certificador y lo mostramos
    public function nombre_certificador($id) {
        $this->db->select('Nombre');
        $this->db->from('usuarios');
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        $fila = $consulta->row();
        return $fila->Nombre;
    }

    //Mostramos información de la cuenta deseada
    public function ver_cuenta($id) {
        $this->db->select('pcu_certificar.*, usuarios.Nombre, pcu_usuarios.int_cert, pcu_usuarios.int_test');
        $this->db->from('pcu_certificar');
        $this->db->where('CertificarID', $id);
        $this->db->join('usuarios', 'pcu_certificar.UsuarioID = usuarios.id');
        $this->db->join('pcu_usuarios', 'pcu_certificar.UsuarioID = pcu_usuarios.UsuarioID');
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
        return false;
    }

    //Obtenemos la id del jugador apartir de la id de la certificación
    public function obtener_id($id) {
        $this->db->select('UsuarioID');
        $this->db->from('pcu_certificar');
        $this->db->where('CertificarID', $id);
        $consulta = $this->db->get();
        $fila = $consulta->row();
        return $fila->UsuarioID;
    }

    //Obtenemos el nombre del jugador apartir de su ID
    public function obtener_nombre($id) {
        $this->db->select('Nombre');
        $this->db->from('usuarios');
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        $fila = $consulta->row();
        return $fila->Nombre;
    }

    //Obtenemos los datos del jugador
    public function datos_jugador($id) {
        $this->db->select('pcu_usuarios.*, usuarios.Apodo, usuarios.Datos');
        $this->db->from('pcu_usuarios');
        $this->db->where('pcu_usuarios.UsuarioID', $id);
        $this->db->join('usuarios', 'pcu_usuarios.UsuarioID = usuarios.id');
        $consulta = $this->db->get();
        return $consulta->result();
    }

    //Validamos la respuesta del certificador
    public function validar_respuesta() {
        $opcion = $this->input->post('opcion');
        $id = $this->input->post('idcert');
        $id_usuario = $this->obtener_id($id);
        if ($opcion == 1) {
            //Aceptar
            $this->aceptar_cuenta($id, $id_usuario);
        } else if ($opcion == 2) {
            //Rechazar
            $this->rechazar_cuenta($id);
        } else if ($opcion == 3) {
            //Bloquear
            $this->bloquear_cuenta($id, $id_usuario);
        } else if ($opcion == 4) {
            //Cambio de nombre
            $this->cambio_nombre($id, $id_usuario);
        }
        return true;
    }

    //Respuesta del certificador - cambio de nombre
    public function cambio_nombre($id, $id_usuario) {
        $datos = array(
            'comentario' => $this->input->post('respcert'),
            'corregida' => 1,
            'certificador' => $this->session->userdata('UsuarioID')
        );
        $this->db->where('CertificarID', $id);
        $this->db->update('pcu_certificar', $datos);
        $datos2 = array(
            'cambio_nombre' => 1
        );
        $this->db->where('UsuarioID', $id_usuario);
        $this->db->update('pcu_usuarios', $datos2);
    }

    //Respuesta del certificador - rechazar cuenta
    public function rechazar_cuenta($id) {
        $datos = array(
            'comentario' => $this->input->post('respcert'),
            'corregida' => 1,
            'certificador' => $this->session->userdata('UsuarioID')
        );
        $this->db->where('CertificarID', $id);
        $this->db->update('pcu_certificar', $datos);
    }

    //Respuesta del certificador - aceptar cuenta
    public function aceptar_cuenta($id, $id_usuario) {
        $fecha = date('d/m/Y - H:i:s');
        //Cargamos los datos de la certificación
        $this->db->from('pcu_certificar');
        $this->db->where('CertificarID', $id);
        $consulta = $this->db->get();
        $fila = $consulta->row();
        //Insertamos datos en la nueva tabla
        $datos = array(
            'UsuarioID' => $fila->UsuarioID,
            'pregunta_1' => $fila->pregunta_1,
            'respuesta_1' => $fila->respuesta_1,
            'pregunta_2' => $fila->pregunta_2,
            'respuesta_2' => $fila->respuesta_2,
            'pregunta_3' => $fila->pregunta_3,
            'respuesta_3' => $fila->respuesta_3,
            'pregunta_4' => $fila->pregunta_4,
            'respuesta_4' => $fila->respuesta_4,
            'pregunta_5' => $fila->pregunta_5,
            'respuesta_5' => $fila->respuesta_5,
            'pregunta_6' => $fila->pregunta_6,
            'respuesta_6' => $fila->respuesta_6,
            'certificador' => $this->session->userdata('UsuarioID'),
            'comentario' => $this->input->post('respcert'),
            'fecha' => $fecha
        );
        $this->db->insert('pcu_certificacion', $datos);
        //Eliminamos la tabla antigua
        $this->db->where('CertificarID', $id);
        $this->db->delete('pcu_certificar');
        //Actualizamos la certificacion del usuario
        $datos2 = array(
            'Baneado' => 0
        );
        $this->db->where('id', $id_usuario);
        $this->db->update('usuarios', $datos2);
    }

    //Respuesta del certificador - bloquear cuenta
    public function bloquear_cuenta($id, $id_usuario) {
        $fecha = date('d/m/Y - H:i:s');
        //Añadimos registro en la tabla de bans
        $datos = array(
            'UsuarioID' => $id_usuario,
            'AdminID' => $this->session->userdata('UsuarioID'),
            'razon' => $this->input->post('respcert'),
            'fecha' => $fecha,
            'TipoBan' => '1'
        );
        $this->db->insert('bans', $datos);
        //Actualizamos el campo de baneado en la tabla usuarios
        $datos2 = array(
            'Baneado' => 1
        );
        $this->db->where('id', $id_usuario);
        $this->db->update('usuarios', $datos2);
        //Eliminamos registro en la tabla de pcu_certificar
        $this->db->where('CertificarID', $id);
        $this->db->delete('pcu_certificar');
    }

}
