<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Mis Compras</h3>
        <hr>
    
    <div class="container text-center bg-white rounded p-3"> <!-- contenedor de fondo blanco -->
    <div>

    <?php if ($compras == NULL) { ?>
            <h4><a href="<?php echo base_url('catalogo/0'); ?>" class="btn btn-primary m-0 p-1" role="button">Visitar el catálogo de productos</a></h4>
            <div class='alert alert-warning alert-dismissible fade show text-center mx-4 mt-5 pt-3 pb-3' role='alert' id='mensaje'> No tiene ninguna compra realizada. Click en el Botón para comprar ahora!</div>
            
            
            <br>
            <br>
            <br>
        <?php } else { ?>
            <table id="mytable" class="table table-bordred table-striped table-hover">
        <table id="mytable" class="table table-bordred table-hover">
            <thead>
                <th>ID Venta</th>
                <th>Fecha</th>
                <th>Correo del Usuario</th>
                <th>Nombre y Apellido</th>
                <th>Total Compra</th>
                <th>Opciones</th>
            </thead>

            <?php $totalVendido = 0; ?>

            <tbody class="table-group-divider">
                <?php foreach($compras as $row) { ?>
                <tr>
                    <td class="border-start"><?php echo $row['venta_id']; ?></td>
                    <td ><?php echo $row['venta_fecha']; ?></td>
                    <td ><?php echo $row['persona_mail']; ?></td>
                    <td ><?php echo $row['persona_nombre'].' '.$row['persona_apellido']; ?></td>
                    <td >$ <?php echo number_format($row['venta_total'], 2, ',', '.'); ?></td>
                    <td class="border-end">
                        <a href="<?php echo base_url('detalle_compra/'.$row['venta_id']); ?>" class="btn btn-primary m-0 pt-0 pb-0" role="button">Ver Detalle</a>
                    </td>
                    <?php $totalVendido = $totalVendido + $row['venta_total'] ?>
                </tr>
                <?php } // fin foreach?>

                <tr>
                    <td>

                    </td>
                </tr>

                <tr>
                    <td class="border-start border-top border-bottom">     </td>
                    <td class="border-top border-bottom">                  </td>
                    <td class="border-top border-bottom">                  </td>
                    <td class="border-top border-bottom">                 </td>
                    <td class="border-top border-bottom "> <b>Total Comprado:</b> </td>
                    <td class="border-end border-top border-bottom"> <b>$ <?php echo number_format($totalVendido, 2, ',', '.');?></b></td>
                </tr>
            </tbody>
        </table>
        <?php } //final if ?>
    </div>
    </div>
</div>
</section>
