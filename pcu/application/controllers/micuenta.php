<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Micuenta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('micuenta_model');
    }

    //Cargamos por defecto la pagina de mi perfil
    public function index() {
        $parametros['resultados'] = $this->micuenta_model->detalles_personaje();
        $parametros['accesos'] = $this->micuenta_model->lista_accesos();
        $datos['titulo'] = 'Mi cuenta';
        $datos['titulo_header'] = 'Mi cuenta';
        $datos['descipcion_header'] = 'Gestión de tu cuenta y propiedades';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Mi cuenta</a></li>';
        $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
            <script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
            <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/scripts/custom/micuenta.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'Micuenta.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('micuenta_view', $parametros);
        $this->load->view('footer_view', $js);
    }

    //Validamos el formulario de cambiar clave
    public function validar_cambiar_clave() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->session->userdata('clave') === md5($this->input->post('clave_actual'))) {
                $resultado = $this->micuenta_model->cambiar_clave();
                if ($resultado) {
                    //Correcto
                    $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Contraseña cambiada correctamente.</div>');
                } else {
                    //Errores
                    $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar cambiar la contraseña, por favor vuelvelo a intentar.</div>');
                }
            } else {
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> La contraseña introducida no coincide con la actual.</div>');
            }
        }
        redirect('micuenta#cambiar_clave');
    }

    //Validar el formulario de cambiar email
    public function validar_cambiar_email() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->micuenta_model->cambiar_email();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Se ha enviado un email a la vieja dirección de correo electrónico para confirmar el cambio del mismo.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar cambiar la dirección de correo electrónico, por favor vuelvelo a intentar.</div>');
            }
        }
        redirect('micuenta#cambiar_email');
    }
    
}
