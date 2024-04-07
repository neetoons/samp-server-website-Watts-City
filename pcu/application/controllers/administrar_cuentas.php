<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Administrar_cuentas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->index();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('administrar_cuentas_model', 'admcuentas_model');
    }
    
    public function index() {
        if (!$this->session->userdata('admin') >= 2) {
            //No es admin, redirigimos
            redirect(base_url());
        }
    }
    
    //Listamos todas las cuentas disponibles de la base de datos
    public function listar_cuentas() {
        $parametros['cuentas'] = $this->admcuentas_model->listar_cuentas();

        $datos['titulo'] = 'Administrar cuentas';
        $datos['titulo_header'] = 'Administrar cuentas';
        $datos['descipcion_header'] = 'Gestión de cuentas del servidor';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Administrar</a><i class="fa fa-angle-right"></i></li><li><a href="">Gestionar cuentas</a></li>';
        $parametros['total_cuentas'] = $this->admcuentas_model->ContarRegistros('usuarios');
        $parametros['total_activadas'] = $this->admcuentas_model->ContarRegistros('usuarios', 'Baneado = 0');
        $parametros['total_certificar'] = $this->admcuentas_model->ContarRegistros('usuarios', 'Baneado = 2 OR Baneado = 3');
        $parametros['total_bloqueadas'] = $this->admcuentas_model->ContarRegistros('usuarios', 'Baneado = 1');
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/scripts/custom/administrar_cuentas.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'AdministrarCuentas.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('administrar/cuentas/administrar_cuentas_view', $parametros);
        $this->load->view('footer_view', $js);
    }
    
    //Mostramos todos los detalles del jugador
    public function ver_cuenta($nombre) {
        $parametros['datos'] = $this->admcuentas_model->detalle_jugador($nombre);
        $parametros['certificacion'] = $this->admcuentas_model->obtener_certificacion($nombre);
        $parametros['accesos'] = $this->admcuentas_model->obtener_accesos($nombre);
        $parametros['llaves_veh'] = $this->admcuentas_model->llaves_veh($nombre);
        
        $datos['titulo'] = 'Ver cuenta '.$this->general_library->NombreReal($nombre);
        $datos['titulo_header'] = 'Administrar cuentas';
        $datos['descipcion_header'] = 'Gestión de cuentas del servidor';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Administrar</a><i class="fa fa-angle-right"></i></li><li><a href="'.base_url().'administrar/cuentas/ver/'.$nombre.'">Gestionar cuentas</a><i class="fa fa-angle-right"></i></li><li><a href="">'.$this->general_library->NombreReal($nombre).'</a></li>';
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/scripts/custom/administrar_cuentas.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'AdministrarVerCuentas.init();';
        
        $this->load->view('header_view', $datos);
        $this->load->view('administrar/cuentas/ver_administrar_cuentas_view',$parametros);
        $this->load->view('footer_view', $js);
    }
    
    public function editar_cuenta($nombre) {
        $parametros['datos'] = $this->admcuentas_model->detalle_jugador($nombre);
        
        $datos['titulo'] = 'Editar cuenta '.$this->general_library->NombreReal($nombre);
        $datos['titulo_header'] = 'Administrar cuentas';
        $datos['descipcion_header'] = 'Gestión de cuentas del servidor';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Administrar</a><i class="fa fa-angle-right"></i></li><li><a href="'.base_url().'administrar/cuentas/ver/'.$nombre.'">Gestionar cuentas</a><i class="fa fa-angle-right"></i></li><li><a href="">'.$this->general_library->NombreReal($nombre).'</a></li>';
        $js['archivosjs'] = '';
        $js['funcionesjs'] = '';
        
        $this->load->view('header_view', $datos);
        $this->load->view('administrar/cuentas/editar_administrar_cuentas_view',$parametros);
        $this->load->view('footer_view', $js);
    }
    
    //Validamos la edición de la cuenta
    public function validar_edicion() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->admcuentas_model->guardar_personaje();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Personaje editado correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar guardar los datos, vuelve a intentarlo.</div>');
            }
        }
        redirect('administrar/cuentas');
    }

}
