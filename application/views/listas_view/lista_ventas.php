<h1 class="text-center text-white my-5"><?php echo $title ?></h1>
      <div clas="table-responsive px-5">
        <table class="table table-bordered table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Cliente</th>
              <th scope="col">Entrada</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Fecha de compra</th>
            </tr>
          </thead>
          <tbody>

              <?php if(!empty($ventas)): ?>
                <?php foreach($ventas as $venta): ?>
                    <tr>
                      <th scope="row"><?php echo $venta->id; ?></th>
                      <td><?php echo $venta->cliente; ?></td>
                      <td><?php echo $venta->espectaculo; ?></td>
                      <td><?php echo $venta->cantidad; ?></td>
                      <td><?php echo $venta->fecha_compra; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center fs-5">No hay ventas en este momento.</td>
                    </tr>

                <?php  endif; ?>     
          </tbody>
        </table>
      </div>
