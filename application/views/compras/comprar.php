<h1>Comprar Entradas para: <?= $producto->nombre ?></h1>
    <p>Descripción: <?= $producto->descripcion ?></p>
    <p>Fecha: <?= date("d M Y", strtotime($producto->fecha)); ?></p>
    <p>Entradas disponibles: <?= $producto->cantidad ?></p>
    <p>¿Como llegar?</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13137.530711756035!2d-58.4477561!3d-34.5944836!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5eb6fb40a93%3A0x1fcab11b62b55896!2sMovistar%20Arena!5e0!3m2!1ses-419!2sar!4v1730419702430!5m2!1ses-419!2sar" width="150" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <br>

    <?= form_open('compras/procesar_compra') ?>
        <input type="hidden" name="producto_id" value="<?= $producto->id ?>">

        <label for="cantidad">Cantidad de entradas:</label>
        <input type="number" id="cantidad" name="cantidad" min="1" max="<?= $producto->cantidad ?>" required>

        <button type="submit">Comprar</button>
    <?= form_close() ?>

    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?= $this->session->flashdata('error'); ?></p>
    <?php endif; ?>