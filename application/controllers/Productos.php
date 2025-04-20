<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('producto_model');
	}

// Metodos para manejar una tabla

// Index -> muestra la lista de productos -> VISTA
      public function index(){

		$mainData = [
			'title' => 'Lista de entradas', //title es una variable
			'innerViewPath' => 'productos/index', 
			'productos' => $this->producto_model->get_productos()
		];

		$this->load->view('layouts/main', $mainData);

	  }

// show -> muestra un solo producto -> VISTA	  
	  public function show($id){

		$producto = $this->producto_model->get_producto_por_id($id);

		if($producto == null){
			show_404();
		}
		
		$mainData = [
			'title' => 'Entrada #' . $id,
			'innerViewPath' => 'productos/show',
			'producto' => $producto
		];

		$this->load->view('layouts/main', $mainData);

	  }

// create -> entrada de datos para nuevo producto -> form VISTA	  
	  public function create(){

		if($this->session->userdata('role') != 'admin'){
			show_error('No estas autorizado.');
		}

		$mainData = [
			'title' => 'Crear Entrada', 
			'innerViewPath' => 'productos/create'

		];

		$this->load->view('layouts/main', $mainData);

	  }

// store -> procesa los datos del nuevo produco y los almacena -> PROCESO
	  public function store(){

		if($this->session->userdata('role') != 'admin'){
			show_error('No estas autorizado.');
		}
		
		$config = [
			'upload_path' => 'assets/img/',
			'allowed_types' => 'jpg|jpeg|png'
		];

		$this->load->library('upload', $config);

		if($this->upload->do_upload('txtimagen')){
			 $this->upload->data('file_name');

		}else{
			echo $this->upload->display_errors();
		}

		$file_data = $this->upload->data();

		

		$producto_data = [

			'nombre' => $this->input->post('nombre'),
			'precio' => $this->input->post('precio'),
			'descripcion' => $this->input->post('descripcion'),
			'cantidad' => $this->input->post('cantidad'),
			'fecha' => $this->input->post('fecha'),
			'imagen' => $file_data['file_name']
		];

		$this->producto_model->añadir_producto($producto_data);
		redirect('productos');
		
	  }

// edit -> entrada de datos para editar un producto existente -> form VISTA	  
	  public function edit($id){

		if($this->session->userdata('role') != 'admin'){
			show_error('No estas autorizado.');
		}
			
		$producto = $this->producto_model->get_producto_por_id($id);

		if($producto == null){
			show_404();
		}
		
		$mainData = [
			'title' => 'Editar producto #' . $id,
			'innerViewPath' => 'productos/edit',
			'producto' => $producto
		];

		$this->load->view('layouts/main', $mainData);
	
	  }

// update -> procesa los nuevos datos del producto editado -> PROCESO	  
	  public function update($id){

		if($this->session->userdata('role') != 'admin'){
			show_error('No estas autorizado.');
		}

		$producto_data = [
			'nombre' => $this->input->post('nombre'),
			'precio' => $this->input->post('precio'),
			'descripcion' => $this->input->post('descripcion'),
			'cantidad' => $this->input->post('cantidad'),
			'fecha' => $this->input->post('fecha')
		];

		$this->producto_model->update_producto($id, $producto_data);
		redirect('productos');

	  }

// delete -> borra un producto -> PROCESO	  
	  public function delete($id){

		if($this->session->userdata('role') != 'admin'){
			show_error('No estas autorizado.');
		}

		$this->producto_model->delete_producto($id);
		redirect('productos');

	  }

	  public function entradas(){

		$mainData = [
			'title' => 'Todas las entradas', 
			'innerViewPath' => 'productos/entradas', 
			'productos' => $this->producto_model->get_productos()
		];

		$this->load->view('layouts/main', $mainData);

	  }


}
