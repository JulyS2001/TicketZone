<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Usuario_model extends CI_Model {
    
    public function __construct(){

        parent::__construct();
        $this->load->database();
    }

    public function add_usuario($usuario_data){

        $this->db->insert('usuarios', $usuario_data);
    }

    public function get_usuario($email){
        
        $query = $this->db->get_where('usuarios', ['email' => $email]);
        return $query->row();
    }

    public function get_clientes(){
        
        $this->db->where('role', 'customer');
        $query = $this->db->get('usuarios');
        return $query->result();
    }

    public function get_clientes_con_compras() {
        $this->db->select('usuarios.id, usuarios.nombre, usuarios.email, usuarios.fecha_registro, IFNULL(SUM(ventas.cantidad), 0) AS total_compras');
        $this->db->from('usuarios');
        $this->db->join('ventas', 'usuarios.id = ventas.usuario_id', 'left'); // Unir con ventas
        $this->db->where('usuarios.role', 'customer');
        $this->db->group_by('usuarios.id'); // Agrupar por usuario
        $query = $this->db->get();
        return $query->result();
    }
    
}