<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certificartest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->index();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('certificartest_model');
    }

    public function index() {
        if ($this->session->userdata('subadmin') == 2 || $this->session->userdata('admin') >= 4) {
            //Es admin
        } else {
            //No es admin, redirigimos
            redirect(base_url());
        }
    }

    //Mostramos listado de preguntas test
    public function test() {
        $parametros['preguntas'] = $this->certificartest_model->lista_pregtest();

        $datos['titulo'] = 'Gestionar preguntas test';
        $datos['titulo_header'] = 'Gestionar preguntas test';
        $datos['descipcion_header'] = 'Gestión de preguntas test del proceso de certificación';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Certificadores</a><i class="fa fa-angle-right"></i></li><li><a href="">Gestionar preguntas de test</a></li>';
        $parametros['total_preguntas'] = $this->certificartest_model->ContarRegistros('pcu_pregtest');
        $parametros['total_activadas'] = $this->certificartest_model->ContarRegistros('pcu_pregtest', '0');
        $parametros['total_desactivadas'] = $this->certificartest_model->ContarRegistros('pcu_pregtest', '1');
        $js['archivosjs'] = '
                <script src="' . base_url() . 'assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
		<script src="' . base_url() . 'assets/scripts/custom/certificar.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'CertificarTest.init();';

        $this->load->view('header_view', $datos);
        $this->load->view('certificar/test_view', $parametros);
        $this->load->view('footer_view', $js);
    }

    //Editar pregunta test
    public function editar_test($id_test) {
        $id_limpio = $this->security->xss_clean($id_test);
        $parametros['detalle'] = $this->certificartest_model->editar_test($id_limpio);
        if ($parametros['detalle']) {
            $datos['titulo'] = 'Editar pregunta test Nº ' . $id_limpio;
            $datos['titulo_header'] = 'Gestionar preguntas test';
            $datos['descipcion_header'] = 'Gestión de preguntas test del proceso de certificación';
            $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Certificadores</a><i class="fa fa-angle-right"></i></li><li><a href="' . base_url() . 'certificar/gestionar/test">Gestionar preguntas de test</a><i class="fa fa-angle-right"></i></li><li><a href="">Editar Nº ' . $id_limpio . '</a></li>';
            $js['archivosjs'] = '';
            $js['funcionesjs'] = '';

            $this->load->view('header_view', $datos);
            $this->load->view('certificar/e_test_view', $parametros);
            $this->load->view('footer_view', $js);
        } else {
            redirect('certificar/gestionar/test');
        }
    }

    //Guardar edicion test
    public function guardar_test() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->certificartest_model->guardar_test();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Pregunta editada correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al guardar los datos, vuelve a intentarlo.</div>');
            }
        }
        redirect('certificar/gestionar/test');
    }

    //Visualizar el contenido para crear pregunta
    public function vercrear_test() {
        $datos['titulo'] = 'Crear pregunta test';
        $datos['titulo_header'] = 'Gestionar preguntas test';
        $datos['descipcion_header'] = 'Gestión de preguntas test del proceso de certificación';
        $datos['direcciones_header'] = '<i class="fa fa-angle-right"></i><li><a href="">Certificadores</a><i class="fa fa-angle-right"></i></li><li><a href="' . base_url() . 'certificar/gestionar/test">Gestionar preguntas de test</a><i class="fa fa-angle-right"></i></li><li><a href="">Crear pregunta</a></li>';
        $js['archivosjs'] = '';
        $js['funcionesjs'] = '';

        $this->load->view('header_view', $datos);
        $this->load->view('certificar/c_test_view');
        $this->load->view('footer_view', $js);
    }

    //Crear nueva pregunta para el test
    public function crear_test() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->certificartest_model->crear_test();
            if ($resultado) {
                //Correcto
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Pregunta creada correctamente.</div>');
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error al guardar los datos, vuelve a intentarlo.</div>');
            }
        }
        redirect('certificar/gestionar/test');
    }

    //Eliminar pregunta del test
    public function eliminar_test($id_test) {
        $id_limpio = $this->security->xss_clean($id_test);
        $resultado = $this->certificartest_model->eliminar_test($id_limpio);

        if ($resultado) {
            //Correcto
            $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Pregunta eliminada correctamente.</div>');
        } else {
            //Errores
            $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> Se ha producido un error intentar eliminar la pregunta, vuelve a intentarlo.</div>');
        }
        redirect('certificar/gestionar/test');
    }

}
