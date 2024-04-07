<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function validate() {
        //Obtener valores de los inputs
        $nombre = $this->security->xss_clean($this->input->post('nombre_login'));
        $clave = $this->security->xss_clean($this->input->post('clave_login'));

        //Comprobamos en la base de datos
        if ($nombre != NULL and $clave != NULL) {
            $this->db->where('Nombre', $nombre);
            $this->db->where('Password', md5($clave));
            $query = $this->db->get('usuarios');

            $this->db->select('usuarios.* , pcu_usuarios.email, pcu_usuarios.sub_admin');
            $this->db->from('usuarios');
            $this->db->where('Nombre', $nombre);
            $this->db->where('Password', md5($clave));
            $this->db->join('pcu_usuarios', 'usuarios.id = pcu_usuarios.UsuarioID');
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                //Login correcto, creamos la sessión
                $row = $query->row();
                if ($row->Baneado == 2) {
                    return 2;
                } else if ($row->Baneado == 1) {
                    return 99;
                }
                $datos_r = explode(",", $row->Datos);
                $fac = explode(",", $row->Faccion);
                $datos = array(
                    'UsuarioID' => $row->id,
                    'nombre' => $row->Nombre,
                    'clave' => $row->Password,
                    'skin' => $row->Skin,
                    'admin' => $row->Admin,
                    'subadmin' => $row->sub_admin,
                    'email' => $row->email,
                    'edad' => $datos_r[0],
                    'sexo' => $datos_r[1],
                    'nivel' => $datos_r[2],
                    'respeto' => $datos_r[3],
                    'faccion' => $fac[1],
                    'lider' => $fac[0],
                    'logged_in' => true
                );
                $this->session->set_userdata($datos);
                if ($row->Baneado == 3) {
                    $this->session->set_userdata('certificar_test', 'asd');
                }
                if ($row->Baneado == 4) {
                    $this->session->set_userdata('certificar_cuenta', 'asd');
                }
                $fecha = date('d/m/Y - H:i:s');
                $data = array(
                    'ult_pcu' => $fecha
                );
                $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
                $this->db->update('pcu_usuarios', $data);

                return true;
            }
        }
        return false;
    }

    public function recuperarclave() {
        //Obtener valores inputs
        $nombre = $this->security->xss_clean($this->input->post('nombre_reclave'));
        $correo = $this->security->xss_clean($this->input->post('correo_reclave'));

        //Comprobamos en la base de datos
        if ($nombre != NULL && $correo != NULL) {
            $this->db->select('id');
            $this->db->where('Nombre', $nombre);
            $query = $this->db->get('usuarios');
            $row = $query->row_array();

            $query2 = $this->db->query("SELECT * FROM pcu_usuarios WHERE UsuarioID = '" . $row['id'] . "' AND email = '" . $correo . "'");
            if ($query2->num_rows() > 0) {

                //El nombre coincide con el email
                $this->load->library('general_library');
                $this->load->library('email');
                $codigo = $this->general_library->CadenaAleatoria(10, 1, 1, 0);
                $fecha = date('d/m/Y - H:i:s');

                $this->db->where('valor', $correo);
                $this->db->where('tipo', '3');
                $query3 = $this->db->get('pcu_confirmar');

                if ($query3->num_rows() > 0) {
                    //Como ya existe en la base de datos cargamos los datos
                    $row2 = $query3->row();

                    $config['mailtype'] = 'html';
                    $this->email->initialize($config);
                    $this->email->from('soporte@wattsrp.com', 'Watts City');
                    $this->email->to($correo);
                    $this->email->subject('Confirmación de la recuperación de contraseña');
                    $this->email->message('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <title>Bienvenido a la comunidad</title> <meta name="viewport" content="width=device-width"/> </head> <body> <table class="body"> <tr> <td class="center" align="center" valign="top"> <table class="header" align="center"> <tr> <td class="center" align="center"> <table class="container" align="center"> <tr> <td> <table class="row "> <tr> <td class="wrapper vertical-middle"> <table class="six columns"> <tr> <td class="vertical-middle"> <a href="http://wattsrp.com/"> </a> </td> </tr> </table> </td> <td class="wrapper vertical-middle last"> <table class="six columns"> <tr> <td> <table class="wrapper social-icons" align="right"> <tr> <td class="vertical-middle"> <a href="https://www.facebook.com/wattscityrp/?ref=hl"> <img src="http://wattsrp.com/assets/img/social/facebook.png" alt="social icon"/> </a> </td> <td class="vertical-middle"> </a> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class="container content" align="center"> <tr> <td> <table class="row note"> <tr> <td class="wrapper last"> <h4>¡Confirmar recuperación de la contraseña - Watts City RP!</h4> <p>Estimado ' . $nombre . ',</p> <p>Si te ha llegado este email es porque has solicitado recuperar tu contraseña. Si crees que se trara de un error o bien no has solicitado nada, ponte rápidamente en contacto con un miembro del equipo de <strong>Watts City RP</strong>.</p> <p>Para confirmar la recuperaci&oacute;n pulsa el siguiente enlace:</p> <table class="twelve columns" style="margin-bottom: 10px"> <tr> <td class="panel"> <a href="' . base_url() . 'confirmar/recuperarclave/' . $row2->codigo . '/' . $correo . '">' . base_url() . 'confirmar/recuperarclave/' . $row2->codigo . '/' . $correo . '</a> </td> <td class="expander"> </td> </tr> </table> <p><strong>IMPORTANTE:</strong> Si tienes problemas para confirmar la recuperaci&oacute;n de contraseña ponte en contando con el equipo de Watts City RP.</p> <p>Un saludo cordial.</p> </td> </tr> </table> <span class="devider"> </span> <table class="row"> <tr> <td class="wrapper last"> <table class="twelve columns"> <tr> <td> <p>Equipo de Watts City RP</p>  </td> <td class="expander"> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class="footer" align="center"> <tr> <td class="center" align="center"> <table class="container" align="center"> <tr> <td> <table class="row"> <tr> <td class="wrapper last"> <span style="font-size:12px;"> <i>No conteste este email, ha sido automáticamente generado por el sistema.</i> </span> </td> </tr> </table> <table class="row"> <tr> <td class="wrapper"> <table class="four columns"> <tr> <td class="vertical-middle"> &copy; Watts City RP 2013 - 2016. </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table>');
                    $this->email->send();
                } else {
                    //No existe en la base de datos
                    $campos = array(
                        'UsuarioID' => $row['id'],
                        'codigo' => $codigo,
                        'fecha' => $fecha,
                        'valor' => $correo,
                        'tipo' => 3
                    );
                    $this->db->insert('pcu_confirmar', $campos);

                    $config['mailtype'] = 'html';
                    $this->email->initialize($config);
                    $this->email->from('soporte@wattsrp.com', 'Watts City RP');
                    $this->email->to($correo);
                    $this->email->subject('Confirmación de la recuperación de contraseña');
                    $this->email->message('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <title>Bienvenido a la comunidad</title> <meta name="viewport" content="width=device-width"/> </head> <body> <table class="body"> <tr> <td class="center" align="center" valign="top"> <table class="header" align="center"> <tr> <td class="center" align="center"> <table class="container" align="center"> <tr> <td> <table class="row "> <tr> <td class="wrapper vertical-middle"> <table class="six columns"> <tr> <td class="vertical-middle"> <a href="http://wattsrp.com/"> </a> </td> </tr> </table> </td> <td class="wrapper vertical-middle last"> <table class="six columns"> <tr> <td> <table class="wrapper social-icons" align="right"> <tr> <td class="vertical-middle"> <a href="#"> <a href="https://www.facebook.com/wattscityrp/?ref=hl"> <img src="http://wattsrp.com/assets/img/social/facebook.png" alt="social icon"/> </a> </td> <td class="vertical-middle"> </a> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class="container content" align="center"> <tr> <td> <table class="row note"> <tr> <td class="wrapper last"> <h4>¡Confirmar recuperación de la contraseña - Watts City RP!</h4> <p>Estimado ' . $nombre . ',</p> <p>Si te ha llegado este email es porque has solicitado recuperar tu contraseña. Si crees que se trara de un error o bien no has solicitado nada, ponte rápidamente en contacto con un miembro del equipo de <strong>Watts City RP</strong>.</p> <p>Para confirmar la recuperaci&oacute;n pulsa el siguiente enlace:</p> <table class="twelve columns" style="margin-bottom: 10px"> <tr> <td class="panel"> <a href="' . base_url() . 'confirmar/recuperarclave/' . $codigo . '/' . $correo . '">' . base_url() . 'confirmar/recuperarclave/' . $codigo . '/' . $correo . '</a> </td> <td class="expander"> </td> </tr> </table> <p><strong>IMPORTANTE:</strong> Si tienes problemas para confirmar la recuperaci&oacute;n de contraseña ponte en contando con el equipo de Watts City RP.</p> <p>Un saludo cordial.</p> </td> </tr> </table> <span class="devider"> </span> <table class="row"> <tr> <td class="wrapper last"> <table class="twelve columns"> <tr> <td> <p>Equipo de Watts City RP</p> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class="footer" align="center"> <tr> <td class="center" align="center"> <table class="container" align="center"> <tr> <td> <table class="row"> <tr> <td class="wrapper last"> <span style="font-size:12px;"> <i>No conteste este email, ha sido automáticamente generado por el sistema.</i> </span> </td> </tr> </table> <table class="row"> <tr> <td class="wrapper"> <table class="four columns"> <tr> <td class="vertical-middle"> &copy; Watts City RP 2013 - 2016. </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table>');
                    $this->email->send();
                }
                return true;
            }
            return false;
        }
    }

    public function confirmarreclave($codigo, $correo) {
        $this->db->select('UsuarioID');
        $this->db->where('codigo', $codigo);
        $this->db->where('valor', $correo);
        $this->db->where('tipo', '3');
        $query = $this->db->get('pcu_confirmar');

        //Comprobamos que exista en la base de datos
        if ($query->num_rows() > 0) {
            //Existe
            $row = $query->row_array();
            $this->load->library('email');
            $this->load->library('general_library');
            $clave = $this->general_library->CadenaAleatoria(10, 1, 1, 0);

            $this->db->where('codigo', $codigo);
            $this->db->where('tipo', '3');
            $this->db->delete('pcu_confirmar');

            $datos = array(
                'Password' => md5($clave)
            );
            $this->db->where('id', $row['UsuarioID']);
            $this->db->update('usuarios', $datos);

            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('soporte@wattsrp.com', 'Watts City RP');
            $this->email->to($correo);
            $this->email->subject('Nueva contraseña');
            $this->email->message('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" ""> <html xmlns=""> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <title>Bienvenido a la comunidad</title> <meta name="viewport" content="width=device-width"/> </head> <body> <table class="body"> <tr> <td class="center" align="center" valign="top"> <table class="header" align="center"> <tr> <td class="center" align="center"> <table class="container" align="center"> <tr> <td> <table class="row "> <tr> <td class="wrapper vertical-middle"> <table class="six columns"> <tr> <td class="vertical-middle"> <a href="http://wattsrp.com/"> </a> </td> </tr> </table> </td> <td class="wrapper vertical-middle last"> <table class="six columns"> <tr> <td> <table class="wrapper social-icons" align="right"> <tr> <td class="vertical-middle"> <a href="https://www.facebook.com/wattscityrp/?ref=hl"> <img src="http://wattsrp.com/assets/img/social/facebook.png" alt="social icon"/> </a> </td> <td class="vertical-middle">  </a> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class="container content" align="center"> <tr> <td> <table class="row note"> <tr> <td class="wrapper last"> <h4>¡Nueva contraseña - Watts City RP!</h4> <p>Estimado usuario,</p> <p>La nueva contraseña para acceder a su cuenta es: <strong>' . $clave . '</strong></p><p><strong>IMPORTANTE:</strong> Si tienes problemas para confirmar la recuperaci&oacute;n de contraseña ponte en contando con el equipo de Watts City RP.</p> <p>Un saludo cordial.</p> </td> </tr> </table> <span class="devider"> </span> <table class="row"> <tr> <td class="wrapper last"> <table class="twelve columns"> <tr> <td> <p>Equipo de Watts City RP</p> </td> <td class="expander"> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class="footer" align="center"> <tr> <td class="center" align="center"> <table class="container" align="center"> <tr> <td> <table class="row"> <tr> <td class="wrapper last"> <span style="font-size:12px;"> <i>No conteste este email, ha sido automáticamente generado por el sistema.</i> </span> </td> </tr> </table> <table class="row"> <tr> <td class="wrapper"> <table class="four columns"> <tr> <td class="vertical-middle"> &copy; Watts City RP 2013 - 2016. </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table>');
            $this->email->send();
            return true;
        } else {
            //No existe
            return false;
        }
    }

    public function crearcuenta() {
        $nombre = $this->security->xss_clean($this->input->post('nombre_reg'));
        $correo = $this->security->xss_clean($this->input->post('correo_reg'));
        $clave = $this->security->xss_clean($this->input->post('clave_reg'));

        if ($nombre != NULL && $correo != NULL && $clave != NULL) {
            //Comprobamos que el nombre contenga estos caracteres
            $permitidos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';
            for ($i = 0; $i < strlen($nombre); $i++) {
                if (strpos($permitidos, substr($nombre, $i, 1)) === false) {
                    return 2;
                }
            }
            //Comprobamos si esta el nombre en uso
            $this->db->where('Nombre', $nombre);
            $query = $this->db->get('usuarios');
            if ($query->num_rows() > 0) {
                return 3;
            }
            //Comprobamos si esta el email en uso
            $this->db->where('email', $correo);
            $query2 = $this->db->get('pcu_usuarios');
            if ($query2->num_rows() > 0) {
                return 4;
            }

            //Creamos nueva cuenta
            $this->load->library('email');
            $this->load->library('general_library');
            $codigo = $this->general_library->CadenaAleatoria(10, 1, 1, 0);
            $fecha = date('d/m/Y - H:i:s');

            $campos = array(
                'Nombre' => $nombre,
                'Password' => md5($clave),
                'Baneado' => 2
            );
            $this->db->insert('usuarios', $campos);

            $pswd = sha1(strtolower($nombre) . $clave);
            $salt = substr(md5(mt_rand()), 0, 4);

            $forumDb = array(
                    "member_name" => $nombre,
                    "date_registered" => time(),
                    "email_address" => $correo,
                    "passwd" => $pswd,
                    "password_salt" => $salt,
                    "is_activated" => 1,
                    "avatar" => "skins/26.png",
                    "real_name" => str_replace('_', ' ', $nombre)
                );

            $this->db->insert('forum_members', $forumDb);

            $this->db->select('id');
            $this->db->where('Nombre', $nombre);
            $query3 = $this->db->get('usuarios');
            $row = $query3->row_array();

            $campos2 = array(
                'UsuarioID' => $row['id'],
                'email' => $correo,
                'ingreso' => $fecha
            );
            $this->db->insert('pcu_usuarios', $campos2);

            $campos3 = array(
                'UsuarioID' => $row['id'],
                'codigo' => $codigo,
                'fecha' => $fecha
            );
            $this->db->insert('pcu_confirmar', $campos3);

            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('soporte@wattsrp.com', 'Watts City RP');
            $this->email->to($correo);
            $this->email->subject('Confirmar cuenta - ' . $nombre);
            $this->email->message('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <title>Bienvenido a la comunidad</title> <meta name="viewport" content="width=device-width"/> </head> <body> <table class="body"> <tr> <td class="center" align="center" valign="top"> <table class="header" align="center"> <tr> <td class="center" align="center"> <table class="container" align="center"> <tr> <td> <table class="row "> <tr> <td class="wrapper vertical-middle"> <table class="six columns"> <tr> <td class="vertical-middle"> <a href="http://wattsrp.com"> </a> </td> </tr> </table> </td> <td class="wrapper vertical-middle last"> <table class="six columns"> <tr> <td> <table class="wrapper social-icons" align="right"> <tr> <td class="vertical-middle"> <a href="https://www.facebook.com/wattscityrp/?ref=hl"> <img src="http://wattsrp.com/assets/img/social/facebook.png" alt="social icon"/> </a> </td> <td class="vertical-middle"> </a> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class="container content" align="center"> <tr> <td> <table class="row note"> <tr> <td class="wrapper last"> <h4>&#161;Bienvenido a Watts City RP!</h4> <p>Estimado ' . $nombre . ',</p> <p>Te damos la bienvenida a la comunidad de <strong>Watts City RP</strong>, acabas de registrar una cuenta y ya te queda menos para poder entrar a jugar al servidor. El siguiente paso que deber&aacute;s hacer ser&aacute; confirmar tu direcci&oacute;n de correo electr&oacute;nico, que lo podr&aacute;s hacer pulsando el enlace de aqu&iacute; abajo.</p> <table class="twelve columns" style="margin-bottom: 10px"> <tr> <td class="panel"> <a href="' . base_url() . 'confirmar/correo/' . $codigo . '">' . base_url() . 'confirmar/correo/' . $codigo . '</a> </td> <td class="expander"> </td> </tr> </table> <p><strong>IMPORTANTE:</strong> Si tienes problemas para confirmar tu direcci&oacute;n de correo elect&oacute;nico ponte en contando con el equipo de Watts City RP.</p> <p>Un saludo cordial.</p> </td> </tr> </table> <span class="devider"> </span> <table class="row"> <tr> <td class="wrapper last"> <table class="twelve columns"> <tr> <td> <p>Equipo de Watts City RP</p> <img src="http://Watts City-rp.es/foro/styles/Arrow/imageset/site_logo.png" alt=""/> </td> <td class="expander"> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class="footer" align="center"> <tr> <td class="center" align="center"> <table class="container" align="center"> <tr> <td> <table class="row"> <tr> <td class="wrapper last"> <span style="font-size:12px;"> <i>No conteste este email, ha sido autom&aacute;ticamente generado por el sistema.</i> </span> </td> </tr> </table> <table class="row"> <tr> <td class="wrapper"> <table class="four columns"> <tr> <td class="vertical-middle"> &copy; Watts City RP 2013 - 2016. </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table>');
            $this->email->send();
            return true;
        }
        return false;
    }

    public function confirmarcorreo($codigo) {
        $this->db->select('UsuarioID');
        $this->db->where('codigo', $codigo);
        $this->db->where('tipo', '0');
        $query = $this->db->get('pcu_confirmar');

        //Comprobamos que existe en la base de datos
        if ($query->num_rows() > 0) {
            $row = $query->row_array();

            $datos = array(
                'Baneado' => '3'
            );
            $this->db->where('id', $row['UsuarioID']);
            $this->db->update('usuarios', $datos);

            $this->db->where('codigo', $codigo);
            $this->db->delete('pcu_confirmar');
            return true;
        }
        return false;
    }

    //Obtenemos la id del jugador apartir de la id de la certificación
    public function obtener_id() {
        $this->db->select('id');
        $this->db->from('usuarios');
        $this->db->where('Nombre', $this->input->post('nombre_login'));
        $consulta = $this->db->get();
        $fila = $consulta->row();
        return $fila->id;
    }

    //Obtenemos el ban del jugador
    public function obtener_ban() {
        $id_usuario = $this->obtener_id();
        $this->db->select('bans.*, usuarios.Nombre');
        $this->db->where('bans.UsuarioID', $id_usuario);
        $this->db->join('usuarios', 'bans.AdminID = usuarios.id');
        $consulta = $this->db->get('bans');
        return $consulta->result();
    }

}
