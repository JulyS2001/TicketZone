<h1 class="text-center text-white my-5"><?php echo $title ?></h1>
      <div clas="table-responsive px-5">
        <table class="table table-bordered table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

              <?php if(!empty($productos)): ?>
                <?php foreach($productos as $producto): ?>
                    <tr>
                      <th scope="row"><?php echo $producto->id; ?></th>
                      <td><?php echo $producto->nombre; ?></td>
                      <td><?php echo '$' . $producto->precio; ?></td>
                      <td>
                        <div class="d-flex">
                        <a class="btn btn-primary me-2" href="<?php echo base_url('productos/show/') . $producto->id; ?>">Ver</a> 
                        <?php if($this->session->userdata('role') == 'admin'): ?>
                        <a class="btn btn-warning me-2" href="<?php echo base_url('productos/edit/') . $producto->id; ?>">Editar</a>
                        <form action="<?php echo base_url('productos/delete/') . $producto->id; ?>" method="POST">
                          <button class="btn btn-danger" type="submit">Borrar</button>
                          <?php endif; ?>
                        </form>
                        </div>

                      </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center fs-5">No hay entradas disponibles en este momento.</td>
                    </tr>

                <?php  endif; ?>     
          </tbody>
        </table>
      </div>
