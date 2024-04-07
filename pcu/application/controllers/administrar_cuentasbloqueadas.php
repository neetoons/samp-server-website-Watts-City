<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Administrar_cuentasbloqueadas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->index();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('administrar_cuentasbloqueadas_model', 'admcbans_model');
    }
    
    public function index() {
        if (!$this->session->userdata('admin') >= 4) {
            //No es admin, redirigimos
            redirect(base_url());
        }
    }
    
    //Listar cuentas bloqueadas
    public function listar_cuentasbloqueadas() {
        $parametros['bloqueadas'] = $this->admcbans_model->listar_cuentasbloqueadas();

        $datos['titulo'] = 'Cuentas bloqueadas';
        $datos['titulo_header'] = 'Cuentas bloqueadas';
        $datos['descipcion_header'] = 'Gestión de cuentas de cuentas bloqueadas';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Administrar</a><i class="fa fa-angle-right"></i></li><li><a href="">Cuentas bloqueadas</a></li>';
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/scripts/custom/administrar_cuentasbloqueadas.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'AdministrarCuentasBloqueadas.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('administrar/cuentasbloqueadas/administrar_cuentasbloqueadas_view', $parametros);
        $this->load->view('footer_view', $js);
    }
    
}
