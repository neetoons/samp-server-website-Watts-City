<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Certificarcuentas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->index();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('certificarcuentas_model', 'certcuentas_model');
    }

    public function index() {
        if (($this->session->userdata('admin') == 1 && $this->session->userdata('subadmin') == 1 || $this->session->userdata('subadmin') == 2) || $this->session->userdata('admin') >= 4) {
            //Es admin
        } else {
            //No es admin, redirigimos
            redirect(base_url());
        }
    }

    //Listamos todas las cuentas pendientes de certificar
    public function listar_cuentas() {
        $parametros['cuentas'] = $this->certcuentas_model->listar_cuentas();

        $datos['titulo'] = 'Certificar cuentas';
        $datos['titulo_header'] = 'Certificar cuentas';
        $datos['descipcion_header'] = 'Listado de cuentas por certificar<';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Certificadores</a><i class="fa fa-angle-right"></i></li><li><a href="">Condiciones</a></li>';
        $parametros['total_cuentas'] = $this->certcuentas_model->ContarRegistros('pcu_certificar', '0');
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/scripts/custom/certificar.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'CertificarCuentasLista.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('certificar/lista_certificarcuentas_view', $parametros);
        $this->load->view('footer_view', $js);
    }

    //Mostramos la certificación de la cuenta deseada
    public function ver_cuenta($id) {
        $id_limpio = $this->security->xss_clean($id);
        $parametros['detalle'] = $this->certcuentas_model->ver_cuenta($id_limpio);
        if ($parametros['detalle']) {
            $parametros['jugador'] = $this->certcuentas_model->datos_jugador($this->certcuentas_model->obtener_id($id));

            $datos['titulo'] = 'Certificar cuentas';
            $datos['titulo_header'] = 'Certificar cuentas';
            $datos['descipcion_header'] = 'Listado de cuentas por certificar';
            $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Certificadores</a><i class="fa fa-angle-right"></i></li><li><a href="' . base_url() . 'certificar/cuentas">Certificar cuentas</a><i class="fa fa-angle-right"></i></li><li><a href="">Ver ID ' . $id_limpio . '</a></li>';
            $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
                <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>    
		<script src="' . base_url() . 'assets/scripts/custom/certificar.js" type="text/javascript"></script>';
            $js['funcionesjs'] = 'CertificarCuentasVer.init();';

            $this->load->view('header_view', $datos);
            $this->load->view('certificar/ver_certificarcuentas_view', $parametros);
            $this->load->view('footer_view', $js);
        } else {
            redirect('certificar/cuentas');
        }
    }

    //Validamos la respuesta del formulario
    public function validar_respuesta() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->certcuentas_model->validar_respuesta();
            $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Certificación respondida correctamente.</div>');
        }
        redirect('certificar/cuentas');
    }

}
