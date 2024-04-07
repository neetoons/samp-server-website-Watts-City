<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Administrar_skinsfaccion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->index();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('administrar_skinsfaccion_model', 'admskinsfacc_model');
    }
    
    public function index() {
        if (!$this->session->userdata('admin') >= 5) {
            //No es admin, redirigimos
            redirect(base_url());
        }
    }
    
    //Listamos todos los skins que hay en la base de datos
    public function listar_skins() {
        $parametros['resultados'] = $this->admskinsfacc_model->listar_skins();
        $datos['titulo'] = 'Administrar skins facción';
        $datos['titulo_header'] = 'Administrar skins facción';
        $datos['descipcion_header'] = 'Gestión total de la selección de skins de facción del PCU';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Administrar</a><i class="fa fa-angle-right"></i></li><li><a href="">Skins facción</a></li>';
        $parametros['skins_total'] = $this->admskinsfacc_model->ContarRegistros('pcu_skinstrabajo');
        $parametros['skins_activas'] = $this->admskinsfacc_model->ContarRegistros('pcu_skinstrabajo', '0');
        $parametros['skins_desactivas'] = $this->admskinsfacc_model->ContarRegistros('pcu_skinstrabajo', '1');
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/scripts/custom/skins.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'Skins.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('administrar/skinsfaccion/administrar_skinsfaccion_view', $parametros);
        $this->load->view('footer_view', $js);
    }
    
    //Añadir un nuevo skin
    public function añadir_skin() {
        $parametros['lista'] = $this->admskinsfacc_model->listar_skins();
        $parametros['facciones'] = $this->admskinsfacc_model->listar_facciones();
        
        $datos['titulo'] = 'Añadir skin facción';
        $datos['titulo_header'] = 'Administrar skins facción';
        $datos['descipcion_header'] = 'Gestión total de la selección de skins de facción del PCU';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Administrar</a><i class="fa fa-angle-right"></i></li><li><a href="">Skins facción</a></li>';
        $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/scripts/custom/skins.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'AddSkins.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('administrar/skinsfaccion/add_administrar_skinsfaccion_view', $parametros);
        $this->load->view('footer_view', $js);
    }
    
    //Validar la creación del nuevo skin
    public function validar_addskin() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->admskinsfacc_model->añadir_skin();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Skin de facción añadido correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al añadir el skin, vuelve a intentarlo.</div>');
            }
        }
        redirect('administrar/skinsfaccion');
    }
    
    //Editar skin
    public function editar_skin($id_skin) {
        $id_limpio = $this->security->xss_clean($id_skin);
        $parametros['detalle'] = $this->admskinsfacc_model->editar_skin($id_limpio);
        $parametros['facciones'] = $this->admskinsfacc_model->listar_facciones();
        
        if ($parametros['detalle']) {
            $datos['titulo'] = 'Editar skin Nº ' . $id_limpio;
            $datos['titulo_header'] = 'Administrar skins facción';
            $datos['descipcion_header'] = 'Gestión total de la selección de skins de facción del PCU';
            $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Administrar</a><i class="fa fa-angle-right"></i></li><li><a href="">Skins</a><i class="fa fa-angle-right"></i></li><li><a href="">Editar ID '.$id_limpio.'</a></li>';
            $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/scripts/custom/skins.js" type="text/javascript"></script>';
            $js['funcionesjs'] = 'EditarSkin.init();';

            $this->load->view('header_view', $datos);
            $this->load->view('administrar/skinsfaccion/edit_administrar_skins_view', $parametros);
            $this->load->view('footer_view', $js);
        } else {
            redirect('administrar/skinsfaccion');
        }
    }
    
    //Guardamos la edicion del skin
    public function guardar_skin() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->admskinsfacc_model->guardar_skin();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Skin de facción editado correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al guardar los datos, vuelve a intentarlo.</div>');
            }
        }
        redirect('administrar/skinsfaccion');
    }
    
    //Eliminar skin
    public function eliminar_skin($id_skin) {
        $id_limpio = $this->security->xss_clean($id_skin);
        $resultado = $this->admskinsfacc_model->eliminar_skin($id_limpio);

        if ($resultado) {
            //Correcto
            $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Skin de facción eliminado correctamente.</div>');
        } else {
            //Errores
            $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error intentar eliminar el skin, vuelve a intentarlo.</div>');
        }
        redirect('administrar/skinsfaccion');
    }

}

