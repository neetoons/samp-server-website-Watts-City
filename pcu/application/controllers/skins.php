<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Skins extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('Administrar_skins_model', 'admskins_model');
    }
    
    //Lista de ropa usual disponible segun el sexo y la raza
    public function ropa_usual() {
        $parametros['listado'] = $this->admskins_model->ropa_usual();
        $datos['titulo'] = 'Ropa usual';
        $datos['titulo_header'] = 'Ropa usual';
        $datos['descipcion_header'] = 'Cambiar ropa usual';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Ropa usual</a></li>';
        $js['archivosjs'] = '';
        $js['funcionesjs'] = '';

        $this->load->view('header_view', $datos);
        $this->load->view('skins/skins_view', $parametros);
        $this->load->view('footer_view', $js);
    }
    
    //Validamos el cambio de ropa
    public function validar_cropa() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->admskins_model->cambiar_ropausual();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> La ropa de tu personaje se ha cambiado correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar cambiar de ropa a tu personaje, vuelve a intentarlo.</div>');
            }
        }
        redirect('cambiar/ropa-usual');
    }
    
    //Lista de ropa de trabajo disponible
    public function ropa_trabajo() {
        $parametros['listado'] = $this->admskins_model->ropa_trabajo();
        $datos['titulo'] = 'Ropa trabajo';
        $datos['titulo_header'] = 'Ropa trabajo';
        $datos['descipcion_header'] = 'Cambiar ropa de trabajo';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Ropa trabajo</a></li>';
        $js['archivosjs'] = '';
        $js['funcionesjs'] = '';

        $this->load->view('header_view', $datos);
        $this->load->view('skins/ropatrabajo_view', $parametros);
        $this->load->view('footer_view', $js);
    }
    
    //Validamos el cambio de ropa
    public function validar_jobcropa() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->admskins_model->cambiar_ropatrabajo();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> La ropa de trabajo de tu personaje se ha cambiado correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar cambiar de ropa a tu personaje, vuelve a intentarlo.</div>');
            }
        }
        redirect('cambiar/ropa-trabajo');
    }
}
