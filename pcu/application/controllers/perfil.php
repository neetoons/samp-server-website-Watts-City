<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('perfil_model');
    }

    public function ver($nombre) {
        $resultado = $this->perfil_model->perfil($nombre);
        if ($resultado) {
            //El perfil existe
            $parametros['resultado'] = $resultado;
            
            $datos['titulo'] = 'Perfil de '.$this->general_library->NombreReal($nombre);
            $datos['titulo_header'] = 'Perfil de '.$this->general_library->NombreReal($nombre);
            $datos['descipcion_header'] = '';
            $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Ver perfil</a><i class="fa fa-angle-right"></i></li><li><a href="">'.$this->general_library->NombreReal($nombre).'</a></li>';
            $js['archivosjs'] = '';
            $js['funcionesjs'] = '';
            
            $this->load->view('header_view', $datos);
            $this->load->view('perfil_view', $parametros);
            $this->load->view('footer_view', $js);
        } else {
            redirect(base_url());
        }
    }
    
    public function buscar_personaje() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            redirect('perfil/'.$this->input->post('buscadordtrp'));
        }
        redirect(base_url());
    }

}
