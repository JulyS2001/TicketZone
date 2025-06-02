<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('Usuario_model');
	}


    public function register_form(){

        if($this->session->userdata('logged_in')){
            show_error('Ya iniciaste sesion.');
        }

        $main_data = [
            'title' => 'Registro',
            'innerViewPath' => 'auth/register_form'
        ];

        $this->load->view('layouts/main', $main_data);
    }

    public function register(){

        if($this->session->userdata('logged_in')){
            show_error('Ya iniciaste sesion.');
        }

        $this->form_validation->set_rules('email', 'EMAIL', 'required');
        $this->form_validation->set_rules('password', 'PASSWORD', 'required');
        $this->form_validation->set_rules('confirm-password', 'CONFIRM-PASSWORD', 'required|matches[password]');

        $this->form_validation->set_message('required', 'El %s es obligatorio.');
        $this->form_validation->set_message('matches', 'La %s no coincide.');
        
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            redirect('auth/register_form');
        }

        $usuario_data = [
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => 'customer'
        ];

        $this->Usuario_model->add_usuario($usuario_data);

        $this->session->set_flashdata('success', 'El usuario ha sido registrado con exito.');
        redirect('auth/login_form');
    }

    public function login_form(){

        if($this->session->userdata('logged_in')){
            show_error('Ya iniciaste sesion.');
        }

        $main_data = [
            'title' => 'Login',
            'innerViewPath' => 'auth/login_form'
        ];

        $this->load->view('layouts/main', $main_data);
    }

    public function login(){

        if($this->session->userdata('logged_in')){
            show_error('Ya iniciaste sesion.');
        }

        
        $this->form_validation->set_rules('email', 'EMAIL', 'required');
        $this->form_validation->set_rules('password', 'PASSWORD', 'required');

        $this->form_validation->set_message('required', 'El %s es obligatorio.');
        
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            redirect('auth/register_form');
        }

        $usuario = $this->Usuario_model->get_usuario($this->input->post('email'));
        
        if($usuario != null && password_verify($this->input->post('password'), $usuario->password)){
            $this->session->set_userdata('id', $usuario->id);
            $this->session->set_userdata('email', $usuario->email);
            $this->session->set_userdata('role', $usuario->role);
            $this->session->set_userdata('logged_in', true);
            redirect('home');
        }else{
            $this->session->set_flashdata('errors', ['login_error' => 'Datos incorrectos']);
            redirect('auth/login_form');
        }
    }

    public function logout(){

        $this->session->sess_destroy();
        redirect('auth/login_form');
    }


}