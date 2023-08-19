<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Lista de los más vendidos</h3>
        <hr>
    
    <div class="container text-center bg-white rounded p-3"> <!-- contenedor de fondo blanco -->
    <div>
        <?php if (session()->getFlashdata('Mensaje')) { ?>
            <div class='alert alert-success alert-dismissible fade show text-center mx-4 mt-4 pt-3 pb-3' role='alert' id='mensaje'>
                <?= session()->getFlashdata('Mensaje'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <table id="mytable" class="table table-bordred table-striped table-hover">
            <thead>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Vendidos</th>
            </thead>

            <tbody class="table-group-divider">
                <?php foreach($mas_vendidos as $row) { ?>
                <tr>
                    <td class="border-start"><img src="<?php echo base_url('assets/img/catalogo/subidas/'.$row['producto_imagen']); ?>" alt="" height="100" width="100"></td>
                    <td ><?php echo $row['producto_descripcion']; ?></td>
                    <td ><?php echo $row['categoria_descripcion']; ?></td>
                    <td >$ <?php echo number_format($row['producto_precio'], 2, ',', '.'); ?></td>
                    <td ><?php echo $row['producto_stock']; ?></td>
                    <td class="border-end"><?php echo $row['producto_vendidos']; ?></td>
                </tr>
                <?php } // fin foreach?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</section>
