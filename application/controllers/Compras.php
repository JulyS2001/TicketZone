<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Producto_model');
        $this->load->model('Venta_model');
        $this->load->library('email', $config);
    }

    public function comprar($producto_id){

        //Verificar que el usuario este logeuado
        if (!$this->session->userdata('logged_in')) {  
            $this->session->set_flashdata('error', 'Es necesario iniciar sesión para realizar una compra.');
            // Si no está logueado, redirige al login
            redirect('Auth/login_form');
        }

        $data = [
            'title' => 'Comprar',
            'producto' => $this->Producto_model->get_producto_por_id($producto_id),
            'innerViewPath' => 'compras/comprar'
        ];
        $this->load->view('layouts/main',$data);
    }

    public function procesar_compra(){
        $producto_id = $this->input->post('producto_id');
        $cantidad = $this->input->post('cantidad');

        $producto = $this->Producto_model->get_producto_por_id($producto_id);

        if($producto->cantidad >= $cantidad){
            $this->Producto_model->reducir_stock($producto_id, $cantidad);

            $venta = [
                'usuario_id' => $this->session->userdata('id'),
                'espectaculo_id' => $producto_id,
                'cantidad' => $cantidad,
                'fecha_compra' => date('Y-m-d')
            ];

            $this->Venta_model->registrar_venta($venta);

            $this->_enviar_email_confirmacion($venta, $producto);

            $this->session->set_flashdata('success','Compra realizada con éxito');
            redirect('compras/confirmacion');
        }else{

            $this->session->set_flashdata('error','No hay suficientes entradas disponibles.');
            redirect('compras/comprar/' . $producto_id);
        }
    }
       
    public function _enviar_email_confirmacion($venta, $producto) {
        $this->email->from('sistemaentradas@gmail.com', 'Nombre del sitio');
        $this->email->to($this->session->userdata('email')); // Email del usuario logueado
        $this->email->subject('Confirmación de Compra de Entradas');

        $mensaje = "Gracias por tu compra.\n\nDetalles:\n";
        $mensaje .= "Espectáculo: " . $producto->nombre . "\n";
        $mensaje .= "Cantidad de Entradas: " . $venta->cantidad . "\n";
        $mensaje .= "Fecha del Evento: " . $producto->fecha . "\n";
        $mensaje .= "Fecha de Compra: " . $venta->fecha_compra . "\n\n";
        $mensaje .= "¡Disfruta el espectáculo!";

        $this->email->message($mensaje);
        $this->email->send();
    }

    public function confirmacion() {
        $data = [
            'title' => 'Compra Exitosa',
            'innerViewPath' => 'compras/confirmacion'
        ];
        $this->load->view('layouts/main', $data);
    }
}