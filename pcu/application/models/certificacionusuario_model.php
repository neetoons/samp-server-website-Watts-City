<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certificacionusuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Listamos preguntas tipo test al usuario
    public function listar_preguntas() {
        $aciertos = 10;
        $info = $this->input->post('edad') . ', ' . $this->input->post('sexo') . ', ' . $this->session->userdata('nivel') . ', ' . $this->session->userdata('respeto') . ', 1';
        $datos = array(
            'Apodo' => $this->input->post('apodo'),
            'Datos' => $info
        );
        $this->db->where('id', $this->session->userdata('UsuarioID'));
        $this->db->update('usuarios', $datos);

        $datos2 = array(
            'raza' => $this->input->post('raza'),
            'altura' => $this->input->post('altura'),
            'peso' => $this->input->post('peso'),
            'colorojos' => $this->input->post('cojos'),
            'colorpelo' => $this->input->post('cpelo'),
            'procedencia' => $this->input->post('procedencia'),
            'descfisica' => $this->input->post('descfisica'),
            'descpsico' => $this->input->post('descpsico'),
            'historia' => $this->input->post('historia'),
            'comollegaste' => $this->input->post('comollegaste')
        );
        $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
        $this->db->update('pcu_usuarios', $datos2);

        $this->session->set_userdata('raza', $this->input->post('raza'));
        $this->session->set_userdata('edad', $this->input->post('edad'));
        $this->session->set_userdata('sexo', $this->input->post('sexo'));
        return true;
        }

    //Validamos el 
    public function validar_test() {
        $i = 0;
        $aciertos = 10;
        while ($i < 10) {
            $i++;
            if ($this->input->post('respuesta_' . $i) == md5('respuesta_' . $i . '_' . $this->input->post('pregunta_' . $i))) {
                $aciertos++;
            }
        }
        if ($aciertos >= 10) {
            //Pasa el test
            $datos = array(
                'Baneado' => 0
            );
            $this->db->where('id', $this->session->userdata('UsuarioID'));
            $this->db->update('usuarios', $datos);
            return -1;
        }
        $this->db->query('UPDATE pcu_usuarios SET int_test = int_test+1 WHERE UsuarioID = "' . $this->session->userdata('UsuarioID') . '"');
        return $aciertos;
    }

    //Guardamos los datos establecidos por primera vez al personaje
    public function configurar_personaje() {
        $info = $this->input->post('edad') . ', ' . $this->input->post('sexo') . ', ' . $this->session->userdata('nivel') . ', ' . $this->session->userdata('respeto') . ', 1';
        $datos = array(
            'Apodo' => $this->input->post('apodo'),
            'Datos' => $info
        );
        $this->db->where('id', $this->session->userdata('UsuarioID'));
        $this->db->update('usuarios', $datos);

        $datos2 = array(
            'raza' => $this->input->post('raza'),
            'altura' => $this->input->post('altura'),
            'peso' => $this->input->post('peso'),
            'colorojos' => $this->input->post('cojos'),
            'colorpelo' => $this->input->post('cpelo'),
            'procedencia' => $this->input->post('procedencia'),
            'descfisica' => $this->input->post('descfisica'),
            'descpsico' => $this->input->post('descpsico'),
            'historia' => $this->input->post('historia'),
            'comollegaste' => $this->input->post('comollegaste')
        );
        $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
        $this->db->update('pcu_usuarios', $datos2);

        $this->session->set_userdata('raza', $this->input->post('raza'));
        $this->session->set_userdata('edad', $this->input->post('edad'));
        $this->session->set_userdata('sexo', $this->input->post('sexo'));
        return true;
    }

    //Listamos preguntas de desarrollo al usuario
    public function listar_preguntas_desarrollo() {
        $this->db->where('estado', '0');
        $this->db->order_by('PreID', 'RANDOM');
        $this->db->limit(6);
        $query = $this->db->get('pcu_pregcerts');
        return $query->result();
    }

    //Validamos la certificación (Enviamos la certificación ha revisar)
    public function validar_certificacion() {
        $fecha = date('d/m/Y - H:i:s');
        $consulta = $this->db->query("SELECT * FROM pcu_certificar WHERE UsuarioID = '" . $this->session->userdata('UsuarioID') . "'");
        if ($consulta->num_rows() > 0) {
            //Si ya existe en la base de datos actualizamos
            $datos = array(
                'respuesta_1' => $this->input->post('respuesta_1'),
                'respuesta_2' => $this->input->post('respuesta_2'),
                'respuesta_3' => $this->input->post('respuesta_3'),
                'respuesta_4' => $this->input->post('respuesta_4'),
                'respuesta_5' => $this->input->post('respuesta_5'),
                'respuesta_6' => $this->input->post('respuesta_6'),
                'fecha' => $fecha,
                'corregida' => 0
            );
            $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
            $this->db->update('pcu_certificar', $datos);
        } else {
            //Si no existe en la base de datos creamos un nuevo registro
            $datos = array(
                'UsuarioID' => $this->session->userdata('UsuarioID'),
                'pregunta_1' => $this->input->post('pregunta_1'),
                'respuesta_1' => $this->input->post('respuesta_1'),
                'pregunta_2' => $this->input->post('pregunta_2'),
                'respuesta_2' => $this->input->post('respuesta_2'),
                'pregunta_3' => $this->input->post('pregunta_3'),
                'respuesta_3' => $this->input->post('respuesta_3'),
                'pregunta_4' => $this->input->post('pregunta_4'),
                'respuesta_4' => $this->input->post('respuesta_4'),
                'pregunta_5' => $this->input->post('pregunta_5'),
                'respuesta_5' => $this->input->post('respuesta_5'),
                'pregunta_6' => $this->input->post('pregunta_6'),
                'respuesta_6' => $this->input->post('respuesta_6'),
                'fecha' => $fecha
            );
            $this->db->insert('pcu_certificar', $datos);
        }
        return true;
    }

    //Incrementamos el intento de la parte de desarrollo
    public function intentos_preguntas() {
        $this->db->set('int_cert', 'int_cert+1', FALSE);
        $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
        $this->db->update('pcu_usuarios');
        return true;
    }

    //Comprobamos el estado de la certificación
    public function estado_certificacion() {
        $consulta = $this->db->query("SELECT * FROM pcu_certificar WHERE UsuarioID = '" . $this->session->userdata('UsuarioID') . "'");
        if ($consulta->num_rows() > 0) {
            //Certificación enviada, comprobamos su estado
            $fila = $consulta->row();
            if ($fila->corregida == 0) {
                //Aún no esta corregida
                return 1;
            } else {
                //Esta corregida
                return 2;
            }
        } else {
            //Aún no ha enviado la certificación
            //Ya esta certificado, redirigimos
            $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
            $query = $this->db->get('pcu_certificacion');
            if ($query->num_rows() > 0) {
                $this->session->unset_userdata('certificar_test');
                $this->session->unset_userdata('certificar_cuenta');
            } 
            $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
            $consulta = $this->db->get('bans');
            if ($consulta->num_rows() > 0) {
                //Jugador baneado
                $this->session->sess_destroy();
                redirect(base_url());
            }
            return false;
        }
    }

    //Comprobamos si el jugador tiene cambios de nombre
    public function cambios_nombre() {
        $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
        $this->db->where('cambio_nombre >', '0');
        $query = $this->db->get('pcu_usuarios');
        if ($query->num_rows() > 0) {
            //Si que tiene cambios de nombre
            return true;
        } else {
            //No tiene cambios de nombre
            return false;
        }
    }

    //Listamos certificación al usuario
    public function listar_certificacion() {
        $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
        $query = $this->db->get('pcu_certificar');
        return $query->result();
    }

    //Cambiar nombre del usuario
    public function cambiar_nombre() {
        $this->db->where('Nombre', $this->input->post('nuevonombre'));
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            //ERROR, el nombre ya existe
            return false;
        } else {
            //CORRECTO, el nombre no existe
            $nombre = $this->input->post('nuevonombre');
            //Almacenes
            $datos = array(
                'Comprador' => $nombre
            );
            $this->db->where('Comprador', $this->session->userdata('nombre'));
            $this->db->update('almacenes', $datos);
            //Casas
            $datos2 = array(
                'Comprador' => $nombre
            );
            $this->db->where('Comprador', $this->session->userdata('nombre'));
            $this->db->update('casas', $datos2);
            //Negocios
            $datos3 = array(
                'Comprador' => $nombre
            );
            $this->db->where('Comprador', $this->session->userdata('nombre'));
            $this->db->update('negocios', $datos3);
            //Vehiculos
            $datos4 = array(
                'Dueno' => $nombre
            );
            $this->db->where('Dueno', $this->session->userdata('nombre'));
            $this->db->update('vehiculos', $datos4);
            //Usuarios
            $datos5 = array(
                'Nombre' => $nombre
            );
            $this->db->where('Nombre', $this->session->userdata('nombre'));
            $this->db->update('usuarios', $datos5);
            //Eliminamos delitos
            $this->db->where('Nombre', $this->session->userdata('nombre'));
            $this->db->delete('delitos');
            //Reseteamos cambio de nombre
            $datos6 = array(
                'cambio_nombre' => 'cambio_nombre-1'
            );
            $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
            $this->db->update('pcu_usuarios', $datos6);
            //Registramos historial
            $fecha = date('d/m/Y - H:i:s');
            $datos7 = array(
                'UsuarioID' => $this->session->userdata('UsuarioID'),
                'nombre_viejo' => $this->session->userdata('nombre'),
                'nombre_nuevo' => $nombre,
                'fecha' => $fecha
            );
            $this->db->insert('pcu_cambiosnombre', $datos7);
            $this->session->set_userdata('nombre', $nombre);
            return true;
        }
    }

    //El usuario responde la certificacion
    public function responder_certificacion() {
        $fecha = date('d/m/Y - H:i:s');
        $datos = array(
            'respuesta_1' => $this->input->post('eresp_1'),
            'respuesta_2' => $this->input->post('eresp_2'),
            'respuesta_3' => $this->input->post('eresp_3'),
            'respuesta_4' => $this->input->post('eresp_4'),
            'respuesta_5' => $this->input->post('eresp_5'),
            'respuesta_6' => $this->input->post('eresp_6'),
            'fecha' => $fecha,
            'corregida' => 0
        );
        $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
        $this->db->update('pcu_certificar', $datos);
        return true;
    }

    //Cargamos información del jugador
    public function detalle_jugador() {
        $this->db->select('Apodo, Datos');
        $this->db->where('id', $this->session->userdata('UsuarioID'));
        $query = $this->db->get('usuarios');
        return $query->result();
    }

    //Cargamos información del personaje
    public function detalle_personaje() {
        $this->db->select('*');
        $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
        $query = $this->db->get('pcu_usuarios');
        return $query->result();
    }

}
