<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Historiales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->index();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('historiales_model');
    }

    public function index() {
        if (!$this->session->userdata('admin') >= 3) {
            //No es admin, redirigimos
            redirect(base_url());
        }
    }

    //Cargamos el log de cambios de nombre
    public function cambiosdenombre() {
        $parametros['resultados'] = $this->historiales_model->listar_cambiosdenombre();

        $datos['titulo'] = 'Historial de cambios de nombre';
        $datos['titulo_header'] = 'Historial de cambios de nombre';
        $datos['descipcion_header'] = 'Se reflejan todos los cambios de nombre realizados por los jugadores';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Historiales</a><i class="fa fa-angle-right"></i></li><li><a href="">Cambios de nombre</a></li>';
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/scripts/custom/historiales.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'CambiosNombre.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('historiales/cambiosdenombre_view', $parametros);
        $this->load->view('footer_view', $js);
    }
    
    //Cargamos el log de expulsados
    public function expulsados() {
        $parametros['resultados'] = $this->historiales_model->listar_expulsados();

        $datos['titulo'] = 'Historial de expulsados';
        $datos['titulo_header'] = 'Historial de expulsados';
        $datos['descipcion_header'] = 'Se reflejan todos los jugadores expulsados';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Historiales</a><i class="fa fa-angle-right"></i></li><li><a href="">Expulsados</a></li>';
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/scripts/custom/historiales.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'CambiosNombre.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('historiales/expulsados_view', $parametros);
        $this->load->view('footer_view', $js);
    }
    
    //Cargamos el log de accesos
    public function accesos() {
        $parametros['resultados'] = $this->historiales_model->listar_accesos();

        $datos['titulo'] = 'Historial de accesos';
        $datos['titulo_header'] = 'Historial de accesos';
        $datos['descipcion_header'] = 'Historial de accesos al servidor por parte de los jugadores';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Historiales</a><i class="fa fa-angle-right"></i></li><li><a href="">Accesos</a></li>';
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/scripts/custom/historiales.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'Accesos.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('historiales/accesos_view', $parametros);
        $this->load->view('footer_view', $js);
    }

}
