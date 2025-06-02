<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Venta_model extends CI_Model {
    
    public function __construct(){

        parent::__construct();
        $this->load->database();
    }

    public function registrar_venta($data){
        return $this->db->insert('ventas', $data);
    }

    public function get_ventas(){
        $this->db->select('ventas.id, usuarios.email as cliente, productos.nombre as espectaculo, ventas.cantidad, ventas.fecha_compra');
        $this->db->from('ventas');
        $this->db->join('usuarios', 'ventas.usuario_id = usuarios.id');
        $this->db->join('productos', 'ventas.espectaculo_id = productos.id');
        $query = $this->db->get();
        return $query->result();
    }
}