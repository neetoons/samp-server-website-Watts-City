<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Administrar_facciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->index();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('administrar_facciones_model', 'admfacs_model');
    }

    public function index() {
        if (!$this->session->userdata('admin') >= 5) {
            //No es admin, redirigimos
            redirect(base_url());
        }
    }

    //Listar todas las facciones disponibles
    public function listar_facciones() {
        $parametros['facciones'] = $this->admfacs_model->listar_facciones();
        $parametros['facciones_total'] = $this->admfacs_model->ContarRegistros('facciones');
        $parametros['facciones_activas'] = $this->admfacs_model->ContarRegistros('facciones', '0');
        $parametros['facciones_desactivas'] = $this->admfacs_model->ContarRegistros('facciones', '1');

        $datos['titulo'] = 'Administrar facciones';
        $datos['titulo_header'] = 'Administrar facciones';
        $datos['descipcion_header'] = 'Gestión de facciones del servidor';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Administrar</a><i class="fa fa-angle-right"></i></li><li><a href="">Facciones</a></li>';
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript"></script>';
        $js['funcionesjs'] = '';

        $this->load->view('header_view', $datos);
        $this->load->view('administrar/facciones/administrar_facciones_view', $parametros);
        $this->load->view('footer_view', $js);
    }

    //Cargamos todos los datos de la facción seleccionada
    public function ver_faccion($id_faccion) {
        $id_limpio = $this->security->xss_clean($id_faccion);
        $parametros['detalle'] = $this->admfacs_model->ver_faccion($id_limpio);
        if ($parametros['detalle']) {
            $parametros['miembros'] = $this->admfacs_model->listar_miembros($id_limpio);
            $parametros['skins'] = $this->admfacs_model->listar_skins($id_limpio);

            $datos['titulo'] = 'Administrar facciones';
            $datos['titulo_header'] = 'Administrar facciones';
            $datos['descipcion_header'] = 'Gestión de facciones del servidor';
            $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Administrar</a><i class="fa fa-angle-right"></i></li><li><a href="' . base_url() . 'administrar/facciones">Facciones</a><i class="fa fa-angle-right"></i></li><li><a href="">Ver ID ' . $id_limpio . '</a></li>';
            $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>';
            $js['funcionesjs'] = '';

            $this->load->view('header_view', $datos);
            $this->load->view('administrar/facciones/ver_administrar_facciones_view', $parametros);
            $this->load->view('footer_view', $js);
        } else {
            redirect('administrar/facciones');
        }
    }

    //Validamos la edición de la faccion
    public function validar_edicion() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->admfacs_model->guardar_faccion();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Facción editada correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar guardar los datos, vuelve a intentarlo.</div>');
            }
        }
        redirect('administrar/facciones');
    }

    //Editar miembro de la faccion
    public function editar_miembro($id_faccion, $id_jugador) {
        $id_limpio = $this->security->xss_clean($id_jugador);
        $parametros['detalles'] = $this->admfacs_model->editar_miembro($id_limpio);
        if ($parametros['detalles']) {
            $parametros['skins'] = $this->admfacs_model->listar_skins($id_faccion);
            $parametros['faccion'] = $this->admfacs_model->ver_faccion($id_faccion);

            $datos['titulo'] = 'Administrar facciones';
            $datos['titulo_header'] = 'Administrar facciones';
            $datos['descipcion_header'] = 'Gestión de facciones del servidor';
            $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Administrar</a><i class="fa fa-angle-right"></i></li><li><a href="' . base_url() . 'administrar/facciones">Facciones</a><i class="fa fa-angle-right"></i></li><li><a href="">Editar miembro</a></li>';
            $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>';
            $js['funcionesjs'] = '';

            $this->load->view('header_view', $datos);
            $this->load->view('administrar/facciones/editarmiembro_administrar_facciones_view', $parametros);
            $this->load->view('footer_view', $js);
        } else {
            redirect('administrar/facciones');
        }
    }

    //Guardamos los cambios de la edicion del miembro
    public function guardar_miembro() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->admfacs_model->guardar_miembro();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Miembro de la facción editado correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar guardar los datos, vuelve a intentarlo.</div>');
            }
            redirect('administrar/facciones/ver/' . url_title($this->input->post('id_faccion')));
        }
        redirect('administrar/facciones');
    }

    //Expulsa miembro de la facción
    public function expulsar_miembro($id_faccion, $id_jugador) {
        $resultado = $this->admfacs_model->expulsar_miembro($id_jugador);
        if ($resultado) {
            //Correcto
            $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Miembro expulsado de la facción.</div>');
        } else {
            //Errores
            $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al intentar guardar los datos, vuelve a intentarlo.</div>');
        }
        redirect('administrar/facciones/ver/' . url_title($id_faccion));
    }

    //Agrega miembro a la facción
    public function agregar_miembro() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->admfacs_model->agregar_miembro();
            if ($resultado == 1) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Miembro agregado a la facción correctamente.</div>');
            } else if ($resultado == 99) {
                //Jugador tiene facción o trabajo
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> El jugador ya está en una facción o tiene un trabajo.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> El jugador no existe.</div>');
            }
            redirect('administrar/facciones/ver/' . url_title($this->input->post('id_faccion_ju')));
        }
        redirect('administrar/facciones');
    }

}
