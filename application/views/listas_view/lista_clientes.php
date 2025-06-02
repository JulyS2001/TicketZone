<h1 class="text-center text-white my-5"><?php echo $title ?></h1>
      <div clas="table-responsive px-5">
        <table class="table table-bordered table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">Cliente</th>
              <th scope="col">Email</th>
              <th scope="col">Entradas compradas</th>
              <th scope="col">Fecha de registro</th>
            </tr>
          </thead>
          <tbody>

              <?php if(!empty($usuarios)): ?>
                <?php foreach($usuarios as $usuario): ?>
                    <tr>
                      <th scope="row"><?php echo $usuario->id; ?></th>
                      <td><?php echo $usuario->email; ?></td>
                      <td><?php echo $usuario->total_compras; ?></td>
                      <td><?php echo $usuario->fecha_registro; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center fs-5">No hay usuarios.</td>
                    </tr>

                <?php  endif; ?>     
          </tbody>
        </table>
      </div>