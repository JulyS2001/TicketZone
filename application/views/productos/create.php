<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h1 class="text-white my-5"><?php echo $title;  ?></h1>
<form action="<?php echo base_url('productos/store'); ?>" method="POST" enctype="multipart/form-data" class="text-light bg-dark rounded-4 border border-light p-4">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre:</label>
    <input type="text" class="form-control bg-white text-dark border" id="name" name="nombre" placeholder="Ingrese el nombre">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Precio:</label>
    <input type="text" class="form-control bg-white text-dark border" id="price" name="precio" placeholder="Ingrese el precio">
  </div>
  <div class="mb-3">
    <label for="cantidad" class="form-label">Cantidad:</label>
    <input type="text" class="form-control bg-white text-dark border" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad">
  </div>
  <div class="mb-3">
    <label for="fecha" class="form-label">fecha:</label>
    <input type="date" class="form-control bg-white text-dark border" id="fecha" name="fecha" placeholder="Ingrese la fecha">
  </div>
  <div class="mb-3">
    <label for="descripcion" class="form-label">descripcion:</label>
    <input type="text-tarea" class="form-control bg-white text-dark border" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion">
  </div>
  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen:</label>
    <input type="file" class="form-control bg-white text-dark border" id="txtimagen" name="txtimagen" placeholder="Seleccione el archivo">
  </div>
  <div class="d-flex justify-content-center p-2">
    <button type="submit" class="btn btn-primary">Crear producto</button>
  </div>
</form>
<br><br>