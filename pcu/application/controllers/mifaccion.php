<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mifaccion extends CI_Controller {

    public function __construct() {
	parent::__construct();
	$this->index();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('administrar_facciones_model', 'admfacc_model');
    }
    
    public function index() {
        if (!$this->session->userdata('faccion') != 0) {
            //No tiene faccion, redirigimos
            redirect(base_url());
        }
    }
    
    //Lista de miembros
    public function listar_miembros() {
	$parametros['miembros'] = $this->admfacc_model->listar_miembros($this->session->userdata('faccion'));
        $parametros['detalle'] = $this->admfacc_model->ver_faccion($this->session->userdata('faccion'));

        $datos['titulo'] = 'Mi facción';
        $datos['titulo_header'] = 'Mi facción';
        $datos['descipcion_header'] = 'Lista de todos los miembros pertenecientes a la facción';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Mi facción</a></li>';
        $js['archivosjs'] = '';
        $js['funcionesjs'] = '';

        $this->load->view('header_view', $datos);
        $this->load->view('mifaccion_view', $parametros);
        $this->load->view('footer_view', $js);
    }

}
