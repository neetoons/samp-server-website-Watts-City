<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->comprobar_login();
    }

    public function index() {
        $this->load->view('login_view');
    }

    //Comprobar login
    public function comprobar_login() {
        if ($this->session->userdata('logged_in')) {
            //Si esta logeado lo enviamos al home
            redirect(base_url());
        }
    }

    //Validamos login
    public function validar() {
        $this->load->model('login_model');
        $resultado = $this->login_model->validate();

        if ($resultado == 1) {
            // Usuario validado
            redirect(base_url());
        } else if ($resultado == 2) {
            $this->session->set_flashdata('e_login', '1');
            redirect('login');
        } else if ($resultado == 99) {
            $baneados = $this->login_model->obtener_ban();
            foreach ($baneados as $ban) {
                $this->session->set_flashdata('baneado', '<p><strong>Cuenta bloqueada</strong></p><p>Su cuenta fue bloqueada por <i>'.$ban->Nombre.'</i>.</p><p><strong>Razón: </strong>'.$ban->razon.'</p><p>Si crees que ha sido un error ponte en contacto con el equipo de Watts City por medio del foro.</p>');
            }
            redirect('login');
        } else {
            // Usuario no validado
            $this->session->set_flashdata('error_login', '<div class="alert alert-danger"><button class="close" data-close="alert"></button><span>Introduce el nombre y/o la contraseña.</span></div>');
            redirect('login');
        }
    }

    //Recuperar contraseña
    public function recuperar_clave() {
        $this->load->model('login_model');
        $resultado = $this->login_model->recuperarclave();
        /* this->load->view('login_view');
          $this->output->enable_profiler(TRUE); */
        if ($resultado) {
            $this->session->set_flashdata('e_reclave', '1');
            redirect('login');
        } else {
            //No existe mostramos error
            $this->session->set_flashdata('e_reclave', '2');
            redirect('login');
        }
    }

    //Confirmar recuperar contraseña
    public function confirmar_reclave($codigo, $correo) {
        $this->load->model('login_model');
        $resultado = $this->login_model->confirmarreclave($codigo, $correo);

        if ($resultado) {
            //Correcto
            $this->session->set_flashdata('e_confreclave', '1');
            redirect('login');
        } else {
            //Incorrecto
            $this->session->set_flashdata('e_confreclave', '2');
            redirect('login');
        }
    }

    //Registro de nueva cuenta
    public function registro() {
        $this->load->model('login_model');
        $resultado = $this->login_model->crearcuenta();

        if ($resultado == 1) {
            //Correcto
            $this->session->set_flashdata('e_registro', '1');
            redirect('login');
        } else if ($resultado == 2) {
            //Caracteres invalidos en el nombre
            $this->session->set_flashdata('error_registro', '<div class="alert alert-danger"><button class="close" data-close="alert"></button><span>Formato de nombre incorrecto. (Nombre_Apellido)</span></div>');
        } else if ($resultado == 3) {
            //Nombre en uso
            $this->session->set_flashdata('error_registro', '<div class="alert alert-danger"><button class="close" data-close="alert"></button><span>Nombre en uso, elige otro.</span></div>');
        } else if ($resultado == 4) {
            //Email en uso
            $this->session->set_flashdata('error_registro', '<div class="alert alert-danger"><button class="close" data-close="alert"></button><span>Email en uso, elige otro.</span></div>');
        } else {
            //Error al crear la cuenta
            $this->session->set_flashdata('error_registro', '<div class="alert alert-danger"><button class="close" data-close="alert"></button><span>Hubo un error al crear la cuenta.</span></div>');
        }
        $this->session->set_flashdata('error_registrojs', '<script>$("#form-login").toggle("blind"); $(".register-form").show("blind");</script>');
        redirect('login');
    }

    //Confirmar registro
    public function confirmar_correo($codigo) {
        $this->load->model('login_model');
        $resultado = $this->login_model->confirmarcorreo($codigo);

        if ($resultado) {
            //Correcto
            $this->session->set_flashdata('e_confreg', '1');
        } else {
            //Error
            $this->session->set_flashdata('e_confreg', '2');
        }
        redirect('login');
    }

}
