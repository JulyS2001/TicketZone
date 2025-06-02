<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h1 class="text-center text-white my-5"><?php echo "Entrada #" . $producto->nombre; ?> </h1>
      <div clas="table-responsive px-5">
        <table class="table table-bordered table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Fecha</th>
              <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td><?php echo $producto->id; ?></td>
                <td><?php echo $producto->nombre; ?></td>
                <td><?php echo '$' . $producto->precio; ?></td>
                <?php if($producto->cantidad > 0): ?>
                    <td><?php echo $producto->cantidad . " disponibles"; ?></td>
                  <?php else: ?>
                    <td><?php echo 'Agotado'; ?></td>
                <?php endif; ?>    
                <td><?php echo $producto->fecha; ?></td>
                <td><?php echo $producto->descripcion; ?></td>
                 <td>
                <div class="d-flex">
                <?php if($producto->cantidad > 0): ?>
                <a class="btn btn-primary me-2" href="<?php echo base_url('compras/comprar/') . $producto->id; ?>">Comprar</a> 
                  <?php else: ?>
                    <a class="btn btn-primary me-2" href="#">Comprar</a> 
                     <?php endif; ?>
                       <?php if($this->session->userdata('role') == 'admin'): ?>
                         <a class="btn btn-warning me-2" href="<?php echo base_url('productos/edit/') . $producto->id; ?>">Editar</a>
                          <form action="<?php echo base_url('productos/delete/') . $producto->id; ?>" method="POST">
                          <button class="btn btn-danger" type="submit">Borrar</button>
                          <?php endif; ?>
                        </form>
                        </div>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
