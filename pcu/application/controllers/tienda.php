<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tienda extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('tienda_model');
    }

    //Cargamos por defecto la pagina de mi perfil
    public function index() {
        $parametros['resultados'] = $this->tienda_model->detalles_personaje();
        $parametros['accesos'] = $this->tienda_model->lista_accesos();
        $datos['titulo'] = 'Tienda';
        $datos['titulo_header'] = 'Tienda';
        $datos['descipcion_header'] = 'Con tus compras ayudas al servidor.';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Tienda</a></li>';
        $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
            <script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
            <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/scripts/custom/micuenta.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'Tienda.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('tienda_view', $parametros);
        $this->load->view('footer_view', $js);
    }

    //Paysafecard
    public function validar_cambiar_clave() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
                    //Correcto
                    $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Cupón enviado correctamente. Si todo está bien, recibirás tus coins en un lapso de 72 horas, gracias por tu compra.</div>');
                    } else {
                    //Errores
                    $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar enviar el cupón, por favor intenta otra vez.</div>');
        }
        redirect('tienda#comprar_paysafecard');
    }

    //PayPal
    public function validar_comprar_paypal() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->tienda_model->comprar_paypal();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Email enviado correctamente. Si todo está bien, recibirás tus coins en un lapso de 72 horas, gracias por tu compra.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar enviar la dirección de correo electrónico, por favor vuelvelo a intentar.</div>');
            }
        }
        redirect('tienda#comprar_paypal');
    }
    
}
