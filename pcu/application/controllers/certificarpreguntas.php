<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certificarpreguntas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->index();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('certificarpreguntas_model', 'certpregs_model');
    }

    public function index() {
        if ($this->session->userdata('subadmin') == 2 || $this->session->userdata('admin') >= 4) {
            //Es admin
        } else {
            //No es admin, redirigimos
            redirect(base_url());
        }
    }

    //Mostramos el listado de preguntas test
    public function listar_preguntas() {
        $parametros['preguntas'] = $this->certpregs_model->listar_preguntas();

        $datos['titulo'] = 'Gestionar preguntas de desarrollo';
        $datos['titulo_header'] = 'Gestionar preguntas de desarrollo';
        $datos['descipcion_header'] = 'Gestión de preguntas de desarrollo del proceso de certificación';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Certificadores</a><i class="fa fa-angle-right"></i></li><li><a href="">Gestionar preguntas de desarrollo</a></li>';
        $parametros['total_preguntas'] = $this->certpregs_model->ContarRegistros('pcu_pregcerts');
        $parametros['total_activadas'] = $this->certpregs_model->ContarRegistros('pcu_pregcerts', '0');
        $parametros['total_desactivadas'] = $this->certpregs_model->ContarRegistros('pcu_pregcerts', '1');
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/scripts/custom/certificar.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'CertificarDesarrollo.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('certificar/preguntas_view', $parametros);
        $this->load->view('footer_view', $js);
    }

    //Mostramos detalle de una pregunta de desarrollo
    public function detalle_pregunta($id_pregunta) {
        $id_limpio = $this->security->xss_clean($id_pregunta);
        $parametros['detalle'] = $this->certpregs_model->detalle_pregunta($id_limpio);
        if ($parametros['detalle']) {
            $datos['titulo'] = 'Editar pregunta desarrollo Nº ' . $id_limpio;
            $datos['titulo_header'] = 'Gestionar preguntas de desarrollo';
            $datos['descipcion_header'] = 'Gestión de preguntas de desarrollo del proceso de certificación';
            $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Certificadores</a><i class="fa fa-angle-right"></i></li><li><a href="' . base_url() . 'certificar/gestionar/desarrollo">Gestionar preguntas de desarrollo</a><i class="fa fa-angle-right"></i></li><li><a href="">Editar Nº ' . $id_limpio . '</a></li>';
            $js['archivosjs'] = '';
            $js['funcionesjs'] = '';

            $this->load->view('header_view', $datos);
            $this->load->view('certificar/e_preguntas_view', $parametros);
            $this->load->view('footer_view', $js);
        } else {
            redirect('certificar/gestionar/desarrollo');
        }
    }

    //Guardamos la edicion de la pregunta de desarrollo
    public function guardar_pregunta() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->certpregs_model->guardar_pregunta();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Pregunta editada correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al guardar los datos, vuelve a intentarlo.</div>');
            }
        }
        redirect('certificar/gestionar/desarrollo');
    }

    //Visualizar el contenido para crear pregunta
    public function vercrear_pregunta() {
        $datos['titulo'] = 'Crear pregunta de desarrollo';
        $datos['titulo_header'] = 'Gestionar preguntas de desarrollo';
        $datos['descipcion_header'] = 'Gestión de preguntas de desarrollo del proceso de certificación';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Certificadores</a><i class="fa fa-angle-right"></i></li><li><a href="' . base_url() . 'certificar/gestionar/desarrollo">Gestionar preguntas de desarrollo</a><i class="fa fa-angle-right"></i></li><li><a href="">Crear pregunta</a></li>';
        $js['archivosjs'] = '';
        $js['funcionesjs'] = '';

        $this->load->view('header_view', $datos);
        $this->load->view('certificar/c_preguntas_view');
        $this->load->view('footer_view', $js);
    }

    //Crear nueva pregunta de desarrollo
    public function crear_pregunta() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->certpregs_model->crear_pregunta();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Pregunta creada correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al guardar los datos, vuelve a intentarlo.</div>');
            }
        }
        redirect('certificar/gestionar/desarrollo');
    }

    //Eliminar pregunta de desarrollo
    public function eliminar_pregunta($id_pregunta) {
        $id_limpio = $this->security->xss_clean($id_pregunta);
        $resultado = $this->certpregs_model->eliminar_pregunta($id_limpio);
        if ($resultado) {
            //Correcto
            $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Pregunta eliminada correctamente.</div>');
        } else {
            //Errores
            $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error intentar eliminar la pregunta, vuelve a intentarlo.</div>');
        }
        redirect('certificar/gestionar/desarrollo');
    }

}
