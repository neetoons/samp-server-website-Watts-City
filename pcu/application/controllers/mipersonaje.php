<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mipersonaje extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('mipersonaje_model');
    }

    //Por defecto mostramos la pagina de mi personaje
    public function index() {
        $parametros['datos'] = $this->mipersonaje_model->detalle_jugador();
        $parametros['llaves_veh'] = $this->mipersonaje_model->llaves_veh();

        $datos['titulo'] = 'Mi personaje';
        $datos['titulo_header'] = 'Mi personaje';
        $datos['descipcion_header'] = 'Información general y pertenencias';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Mi personaje</a></li>';
        $js['archivosjs'] = '';
        $js['funcionesjs'] = '';

        $this->load->view('header_view', $datos);
        $this->load->view('mipersonaje_view', $parametros);
        $this->load->view('footer_view', $js);
    }

    //Mostramos formulario para editar mi personaje
    public function editar() {
        $parametros['resultado'] = $this->mipersonaje_model->detalle_personaje();

        $datos['titulo'] = 'Editar mi personaje';
        $datos['titulo_header'] = 'Mi personaje';
        $datos['descipcion_header'] = 'Información general y pertenencias';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Mi personaje</a><i class="fa fa-angle-right"></i></li><li><a href="">Editar</a></li>';
        $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/scripts/custom/micuenta.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'EditarPersonaje.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('editar_mipersonaje_view', $parametros);
        $this->load->view('footer_view', $js);
    }

    //Validamos la edición del personaje
    public function validar_edicion() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->mipersonaje_model->guardar_personaje();
            if ($resultado) {
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Personaje editado correctamente.</div>');
            } else {
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar guardar los datos, por favor vuelve a intentarlo.</div>');
            }
        }
        redirect('editar/mipersonaje');
    }

}
