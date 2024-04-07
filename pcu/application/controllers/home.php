<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
    }

    public function index() {
        $datos['titulo'] = 'Entrada';
        $datos['titulo_header'] = 'Inicio';
        $datos['descipcion_header'] = 'Panel de entrada';
        $datos['direcciones_header'] = ''/*'<i class="fa fa-angle-right"></i>'*/;
        $js['archivosjs'] = '';
        $js['funcionesjs'] = '';
        
        $this->load->view('header_view', $datos);
        $this->load->view('home_view');
        $this->load->view('footer_view', $js);
    }

    //Cerrar sesión
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
