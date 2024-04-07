<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certificacionusuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->index();
        $this->load->library('General_library');
        $this->general_library->comprobar_login();
        $this->load->model('Certificacionusuario_model', 'certuser_model');
    }

    public function index() {
        if ($this->session->userdata('certificar_test') == NULL && $this->session->userdata('certificar_cuenta') == NULL) {
            redirect(base_url());
        }
    }

    //Mostramos listado de preguntas test al usuario
    public function test() {
        $parametros['preguntas'] = $this->certuser_model->listar_preguntas();

        $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
	<script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
	<script src="' . base_url() . 'assets/scripts/custom/certificar.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'CertificarUsuarioTest.init();';

        $this->load->view('certificar/certificacionusuario_view', $parametros);
        $this->load->view('footer_view', $js);
    }

    //Validamos el examen tipo test del usuario
    public function validar_test() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->certuser_model->validar_test();
            if ($resultado == -1) {
                //Correcto
                $this->session->unset_userdata('certificar_test');
                $this->session->set_userdata('certificar_cuenta', 'asd');
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Enhorabuena has superado el examen tipo test correctamente, procede con el siguiente paso.</div>');
                redirect(base_url());
            } else {
                //Errores
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> No has logrado pasar el proceso de certificación. Solo has acertado <strong>' . $resultado . ' / 10 preguntas</strong>, vuelvelo a intentar</div>');
            }
        }
        redirect('certificar/test');
    }

    //Mostramos la segunda parte del proceso de certificacion
    public function desarrollo() {
        if ($this->session->userdata('edad') != 0) {
            //Tiene configurado el personaje, comprobamos el estado de la certificación
            $estado = $this->certuser_model->estado_certificacion();
            if ($estado == 0) {
                //Aún no ha enviado la certificacón
                $parametros['preguntas'] = $this->certuser_model->listar_preguntas_desarrollo();
                $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/scripts/custom/certificar.js" type="text/javascript"></script>';
                $js['funcionesjs'] = 'CertificarUsuarioDesarrollo.init();';
                $this->load->view('certificar/desarrollo_certificacionusuario_view', $parametros);
                $this->load->view('footer_view', $js);
            } else if ($estado == 1) {
                //No esta corregida
                $js['archivosjs'] = '';
                $js['funcionesjs'] = '';
                $this->load->view('certificar/nocorregida_certificacionusuario_view');
                $this->load->view('footer_view', $js);
            } else {
                //Esta corregida, comprobamos si tiene cambios de nombre
                $resultado = $this->certuser_model->cambios_nombre();
                $datos['certificacion'] = $this->certuser_model->listar_certificacion();
                if ($resultado) {
                    //Tiene cambios de nombre
                    $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
                    <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
                    <script src="' . base_url() . 'assets/scripts/custom/certificar.js" type="text/javascript"></script>';
                    $js['funcionesjs'] = 'CertificarUsuarioCambiarNombre.init();';
                    $this->load->view('certificar/cambiarnombre_certificacionusuario_view', $datos);
                    $this->load->view('footer_view', $js);
                } else {
                    //No tiene cambios de nombre
                    $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
                        <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
                       <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
                        <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
                        <script src="' . base_url() . 'assets/scripts/custom/certificar.js" type="text/javascript"></script>';
                    $js['funcionesjs'] = 'CertificarUsuarioResponder.init();';
                    $this->load->view('certificar/responder_certificacionusuario_view', $datos);
                    $this->load->view('footer_view', $js);
                }
            }
        } else {
            //No tiene configurado el personaje, mostramos edición del personaje
            $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/scripts/custom/certificar.js" type="text/javascript"></script>';
            $js['funcionesjs'] = 'CertificarUsuarioPersonaje.init();';

            $this->load->view('certificar/f_editpers_certificacionusuario_view');
            $this->load->view('footer_view', $js);
        }
    }

    //Guardamos los datos establecidos por primera vez al personaje
    public function configurar_personaje() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->certuser_model->configurar_personaje();
            $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Tu personaje se ha configurado correctamente.</div>');
        }
        redirect('certificar/cuenta');
    }

    //Validamos la certificación (Enviamos la certificación ha revisar)
    public function validar_certificacion() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->certuser_model->validar_certificacion();
            $this->certuser_model->intentos_preguntas();
            $this->session->set_flashdata('msj', '<div class="note note-success"><h4 class="block">Registro terminado</h4><p>Ya puedes ingresar al servidor.</p><p><strong>Gracias por preferirnos.</strong></p></div>');
        }
        redirect('certificar/cuenta');
    }

    //Validamos el cambio de nombre y actualizamos información
    public function validar_cambio_nombre() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $resultado = $this->certuser_model->cambiar_nombre();
            if ($resultado) {
                //El nombre no existe, se cambia correctamente
                $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Nombre cambiado correctamente, puedes seguir con el proceso de certificación.</div>');
            } else {
                //El nombre existe, no se puede cambiar
                $this->session->set_flashdata('msj', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> El nombre introducido ya esta en uso, por favor elige otro.</div>');
            }
        }
        redirect('certificar/cuenta');
    }

    //Validamos la respuesta de la certificación
    public function validar_responder_certificacion() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->certuser_model->responder_certificacion();
            $this->certuser_model->intentos_preguntas();
            $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Tu cuenta se ha registrado correctamente.</div>');
        }
        redirect('certificar/cuenta');
    }

    //Mostramos edición del personaje
    public function vereditar_personaje() {
        $datos['usuarios'] = $this->certuser_model->detalle_jugador();
        $datos['pcu_usuarios'] = $this->certuser_model->detalle_personaje();
        $js['archivosjs'] = '<script src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
            <script src="' . base_url() . 'assets/scripts/custom/certificar.js" type="text/javascript"></script>';
        $js['funcionesjs'] = 'CertificarEditarPersonaje.init();';

        $this->load->view('certificar/e_editpers_certificacionusuario_view', $datos);
        $this->load->view('footer_view', $js);
    }
    
    //Guardamos la información del personaje
    public function validar_editpers() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->certuser_model->configurar_personaje();
            $this->session->set_flashdata('msj', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-check margin-right-10"></span> <strong>¡Éxito!</strong> Personaje editado correctamente.</div>');
        }
        redirect('certificar/cuenta/editar/personaje');
    }

}
