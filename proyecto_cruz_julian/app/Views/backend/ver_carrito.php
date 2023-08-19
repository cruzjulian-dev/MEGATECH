<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Carrito de compras</h3>
        <hr>
    
    <div class="container text-center bg-white rounded p-3"> <!-- contenedor de fondo blanco -->
    <div>
        <?php $cart = \Config\Services::cart(); ?>

        <?php if (session()->getFlashdata('Mensaje')) { ?>
                    <div class='alert alert-success alert-dismissible fade show mx-4 mt-4 pt-3 pb-3' role='alert' id='mensaje'>
                        <?= session()->getFlashdata('Mensaje'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <br>
        <?php } ?>

        <?php if (session()->getFlashdata('MensajeStock')) { ?>
                    <div class='alert alert-danger alert-dismissible fade show mx-4 mt-4 pt-3 pb-3' role='alert' id='mensaje'>
                        <?= session()->getFlashdata('MensajeStock'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <br>
        <?php } ?>

        
        
        <?php if ($cart->contents() == NULL) { ?>
            <h4><a href="<?php echo base_url('catalogo/0'); ?>" class="btn btn-primary m-0 p-1" role="button">Visitar el catálogo de productos</a></h4>
            <div class='alert alert-warning alert-dismissible fade show text-center mx-4 mt-5 pt-3 pb-3' role='alert' id='mensaje'> El carrito está vacio.</div>
            <br>
            <br>
            <br>
        <?php } else { ?>
            <table id="mytable" class="table table-bordred table-striped table-hover">


                <?php if($cart1 = $cart->contents()) ?>
                <thead>
                    <td ><b>Nº Item</b></td>
                    <td ><b>Descripcion</b></td>
                    <td ><b>Precio</b></td>
                    <td ><b>Cantidad</b></td>
                    <td ><b>Subtotal</b></td>
                    <td ><b>Operación</b></td>
                </thead>

                <tbody class="table-group-divider">
                    <?php 
                        $total = 0;
                        $i = 1;
                        foreach($cart1 as $item) { ?>
                    <tr>
                        <td class="border-end border-start"><?php echo $i++; ?></td>
                        <td class="border-end"><?php echo $item['name']; ?></td>
                        <td class="border-end"><?php echo $item['price']; ?></td>
                        <td class="border-end"><?php echo $item['qty']; ?></td>
                        <td class="border-end"><?php echo $item['subtotal']; $total = $total + $item['subtotal']?></td>
                        <td class="border-end"><?php echo anchor('borrar/'.$item['rowid'], 'Eliminar'); ?></td>
                    </tr>
                    
                    <?php } // fin foreach?>

                    <tr>
                    <td class="border-start border-top border-bottom border-end"><a href="<?php echo base_url('borrar/all'); ?>" class="btn btn-danger m-0 p-1"> Vaciar Carrito </a></td>
                        <td class="border-top border-bottom">                  </td>
                        <td class="border-top border-bottom">                 </td>
                        <td class="border-end border-top border-bottom"></td>
                        
                        <td class="border-end border-top border-bottom"><b>Total Compra:</b> $ <?php echo number_format($total, 2, ',', '.');?></td>
                        <td class="border-end border-top border-bottom"><a href="<?php echo base_url('comprar/'. $total); ?>" class="btn btn-success m-1 p-1" role="button"> Comprar </a></td>
                    </tr>

                </tbody>
            </table>

            <br>
            <table>
                <tbody>       
                    <tr>
                    <td><h4><a href="catalogo/0" class="btn btn-primary m-0 p-1" role="button">Ir al catálogo de productos</a></h4></td>
                    </tr>
                </tbody>
            </table>

            <br><br><br>
        <?php } //final if ?>
    </div>
    </div>
</div>
</section>
