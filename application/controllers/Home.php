<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){

		parent::__construct();
		$this->load->model('producto_model');
	}

    public function index() {

        $data['title'] = 'Inicio';
        $data['innerViewPath'] = 'home/inicio';  // Ruta relativa de la vista de inicio
        $data['productos'] = $this->producto_model->get_productos();
        $this->load->view('layouts/main', $data); // Carga `main.php` con la vista de inicio
    }
}