<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Venta_model');
        $this->load->model('Usuario_model');
    }

    public function lista_ventas(){
        $data = [
            'title' => 'Lista de Ventas',
            'ventas' => $this->Venta_model->get_ventas(),
            'innerViewPath' => 'listas_view/lista_ventas'
        ];
        $this->load->view('layouts/main', $data);
    }

    public function lista_clientes(){
        $data = [
            'title' => 'Lista de Clientes',
            'usuarios' => $this->Usuario_model->get_clientes_con_compras(),
            'innerViewPath' => 'listas_view/lista_clientes'
        ];
        $this->load->view('layouts/main', $data);
    }
}