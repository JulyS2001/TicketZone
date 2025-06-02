<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="present">
    <h1>Todas las Entradas</h1>
    <p>Descubre los próximos eventos y compra tus entradas fácilmente.</p>
</div>
<div class="container">
<?php foreach($productos as $producto):?>
<div class="caja">
   <div>
      <h1><?php echo $producto->nombre;?></h1>
   </div>
   <div>
      <img class="imag" src="<?php echo base_url('assets/img/'. $producto->imagen);?>">
   </div>
   <div> 
     <a class="btn btn-primary me-2" href="<?php echo base_url('productos/show/').$producto->id; ?>">+Info</a>
   </div>

</div>
<?php endforeach;?>
</div>










