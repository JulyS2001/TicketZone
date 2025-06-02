<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h1 class="text-white my-5"><?php echo $title;  ?></h1>
<form action="<?php echo base_url('productos/update/') . $producto->id; ?>" method="POST" class="text-light bg-dark rounded-4 border border-light p-4">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre:</label>
    <input type="text" class="form-control bg-white text-dark border" id="name" name="nombre" value="<?php echo $producto->nombre;?>" placeholder="Ingrese el nombre">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Precio:</label>
    <input type="text" class="form-control bg-white text-dark border" id="price" name="precio" value="<?php echo $producto->precio;?>" placeholder="Ingrese el precio">
  </div>
  <div class="mb-3">
    <label for="cantidad" class="form-label">Cantidad:</label>
    <input type="text" class="form-control bg-white text-dark border" id="cantidad" name="cantidad" value="<?php echo $producto->cantidad; ?>" placeholder="Ingrese la cantidad">
  </div>
  <div class="mb-3">
    <label for="fecha" class="form-label">Fecha:</label>
    <input type="date" class="form-control bg-white text-dark border" id="fecha" name="fecha" value="<?php echo $producto->fecha; ?>" placeholder="Ingrese la fecha">
  </div>
  <div class="mb-3">
    <label for="descripcion" class="form-label">descripcion:</label>
    <input type="text-tarea" class="form-control bg-white text-dark border" id="descripcion" name="descripcion" value="<?php echo $producto->descripcion; ?>" placeholder="Ingrese la descripcion">
  </div>
  <div class="d-flex justify-content-center p-2">
    <button type="submit" class="btn btn-primary">Actualizar producto</button>
  </div>
</form>