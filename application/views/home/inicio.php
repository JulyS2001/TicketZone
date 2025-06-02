<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<br>

<div class="top1">
   <h1>¡TICKET ZONE!</h1>
</div>
<div class="top2">
   <h1>Tu puerta a momentos inolvidables, directo a los mejores eventos, conciertos y espectáculos.</h1>

</div>


<div class="present">
    <h1>Conocé nuestros espectáculos destacados</h1>
    <p>¡Descubrí los mejores precios en entradas!</p>
</div>

<?php $productosLimit = array_slice($productos, 0, 4) ?>

<div class="container">
<?php foreach($productosLimit as $producto):?>
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