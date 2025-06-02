<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Producto_model extends CI_Model {
    public function __construct(){

        parent::__construct();
        $this->load->database();
    }

    public function get_productos(){

        $query = $this->db->get('productos');
        return $query->result();
    }

    public function get_producto_por_id($id){
        $query = $this->db->get_where('productos',['id' => $id]);
        return $query->row();
    }

    public function añadir_producto($producto_data){

        $this->db->insert('productos', $producto_data);
        
    }

    public function update_producto($id, $producto_data){
        $this->db->update('productos', $producto_data, ['id' => $id]);
    }
    
    public function delete_producto($id){
        $this->db->delete('productos',['id' => $id]);
    }

    public function reducir_stock($id, $cantidad){
        $this->db->set('cantidad', 'cantidad - ' . (int)$cantidad, FALSE);
        $this->db->where('id',$id);
        return $this->db->update('productos');
    }
    
}