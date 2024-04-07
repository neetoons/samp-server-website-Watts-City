<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tienda_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('email');
    }

    //Obtenemos los detalles del personaje
    public function detalles_personaje() {
        $this->db->select('pcu_usuarios.* , usuarios.Apodo, usuarios.Baneado');
        $this->db->from('pcu_usuarios');
        $this->db->where('pcu_usuarios.UsuarioID', $this->session->userdata('UsuarioID'));
        $this->db->join('usuarios', 'pcu_usuarios.UsuarioID = usuarios.id');
        $query = $this->db->get();
        return $query->result();
    }

    //Obtenemos la lista de accesos del jugador
    public function lista_accesos() {
        $this->db->where('idjugador', $this->session->userdata('UsuarioID'));
        $this->db->limit(60);
        $query = $this->db->get('accesos');
        return $query->result();
    }

    //Comprar por Paysafecard
    public function cambiar_clave() {
        $datos = array(
           // 'Password' => md5($this->input->post('nueva_clave'))
        );
        $this->db->where('id', $this->session->userdata('UsuarioID'));
        $this->db->update('usuarios', $datos);
        if ($this->db->affected_rows()) {
            $this->session->set_userdata('clave', md5($this->input->post('nueva_clave')));
            return true;
        }
        return false;
    }

    //Comprar por PayPal
    public function comprar_paypal() {
        $fecha = date('d/m/Y - H:i:s');
        $datos = array(
            //'email' => $this->input->post('email')
        );
        $this->db->where('UsuarioID', $this->session->userdata('UsuarioID'));
        $this->db->update('pcu_usuarios', $datos);
        //$this->session->set_userdata('email', $this->input->post('email'));
        
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('soporte@wattsrp.com', 'Watts City');
        $this->email->to($this->session->userdata('email'));
        $this->email->subject('Compra de WC Coins via PayPal');
        $this->email->message('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <title>Bienvenido a la comunidad</title> <meta name="viewport" content="width=device-width"/> </head> <body> <table class="body"> <tr> <td class="center" align="center" valign="top"> <table class="header" align="center"> <tr> <td class="center" align="center"> <table class="container" align="center"> <tr> <td> <table class="row "> <tr> <td class="wrapper vertical-middle"> <table class="six columns"> <tr> <td class="vertical-middle"> <a href="'.base_url().'"> <img src="'.base_url().'assets/img/logo.png" width="86" height="14" border="0" alt=""/> </a> </td> </tr> </table> </td> <td class="wrapper vertical-middle last"> <table class="six columns"> <tr> <td> <table class="wrapper social-icons" align="right"> <tr> <td class="vertical-middle"> <a href="#"> <img src="'.base_url().'assets/img/email/social_facebook.png" alt="social icon"/> </a> </td> <td class="vertical-middle"> <a href="#"> <img src="'.base_url().'assets/img/email/social_twitter.png" alt="social icon"/> </a> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class="container content" align="center"> <tr> <td> <table class="row note"> <tr> <td class="wrapper last"> <h4>¡Cambio de correo electrónico - Watts City!</h4> <p>Estimado '.$this->session->userdata('nombre').',</p> <p>Si te ha llegado este email es porque has solicitado un cambio en la dirección de correo electrónico. Si crees que se trara de un error o bien no has solicitado ningun cambio de email, pornte rápidamente en contacto con un miembro del equipo de <strong>Watts City RP</strong>.</p> <p>El nuevo correo electr&oacute;nico de la cuenta es:</p> <table class="twelve columns" style="margin-bottom: 10px"> <tr> <td class="panel"> '.$this->input->post('email').' </td> <td class="expander"> </td> </tr> </table> <p><strong>IMPORTANTE:</strong> Si tienes problemas para confirmar tu dirección de correo electónico ponte en contando con el equipo de Watts City RP.</p> <p>Un saludo cordial.</p> </td> </tr> </table> <span class="devider"> </span> <table class="row"> <tr> <td class="wrapper last"> <table class="twelve columns"> <tr> <td> <p>Equipo de Watts City RP</p> </td> <td class="expander"> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> <table class="footer" align="center"> <tr> <td class="center" align="center"> <table class="container" align="center"> <tr> <td> <table class="row"> <tr> <td class="wrapper last"> <span style="font-size:12px;"> <i>No conteste este email, ha sido automáticamente generado por el sistema.</i> </span> </td> </tr> </table> <table class="row"> <tr> <td class="wrapper"> <table class="four columns"> <tr> <td class="vertical-middle"> &copy; Watts City RP 2013 - 2016. </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table>');
        $this->email->send();
        if ($this->db->affected_rows()) {
            $this->session->set_userdata('email', $this->input->post('email'));
            return true;
        }
        return false;
    }

}
