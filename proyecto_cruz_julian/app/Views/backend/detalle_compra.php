<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Detalle de la Compra</h3>
        <hr>
    
    <div class="container text-center bg-white rounded p-3"> <!-- contenedor de fondo blanco -->
    <div>
        <h4><a href="<?php echo base_url('mis_compras'); ?>" class="btn btn-primary m-0 p-1" role="button">Volver a Mis Compras</a></h4>
        <table id="mytable" class="table table-bordred table-hover">
            <thead>
                <th>ID Venta</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </thead>

            <?php $totalCompra = 0; ?>
            <tbody class="table-group-divider">
                <?php foreach($detalle as $row) { ?>
                <tr>
                    <td class="border-start"><?php echo $row['venta_id']; ?></td>
                    <td ><?php echo $row['producto_descripcion']; ?></td>
                    <td ><?php echo $row['detalle_cantidad']; ?></td>
                    <td ><?php echo number_format($row['detalle_precioUnitario'], 2, ',', '.'); ?></td>
                    <td ><?php echo number_format($row['detalle_precioTotal'], 2, ',', '.'); ?></td>
                    <?php $totalCompra = $totalCompra + $row['detalle_precioTotal'] ?>
                </tr>
                <?php } // fin foreach?>
                
                <tr>
                    <td>

                    </td>
                </tr>

                <tr>
                    <td class="border-start border-top border-bottom">     </td>
                    <td class="border-top border-bottom">                  </td>
                    <td class="border-top border-bottom">                 </td>
                    <td class="border-top border-bottom "> <b>Total de la Compra:</b> </td>
                    <td class="border-end border-top border-bottom"> <b>$ <?php echo number_format($totalCompra, 2, ',', '.');?></b></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
</section>
