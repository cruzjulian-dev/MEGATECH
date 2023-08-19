<section>
<div class="container-fluid bg-light"> <!-- contenedor fondo gris -->

    <div class="container p-3 w-75 text-center"> <!-- contenedor del titulo y espaciado -->
        <h3>Catálogo de productos</h3>
        <hr>
        <div class="container text-center bg-white rounded p-3"> <!-- contenedor de fondo blanco -->

            <br><h2><?php echo $categoria['categoria_descripcion']; ?></h2>

            <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 g-3">            
                <?php foreach($producto as $row) { ?>
                    <?php if($row['producto_estado'] == 1) {?>
                        <div class="col">
                                <div class="card h-100">
                                    <img src="<?php echo base_url("./assets/img/catalogo/subidas/".$row['producto_imagen']); ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title"><?php echo $row['producto_descripcion']; ?></h6>
                                        <?php 
                                                    if($row['producto_stock'] == 0){
                                                            echo '<span class="badge bg-danger">Sin Stock</span>';
                                                    } elseif ($row['producto_stock'] <= 10) {
                                                            echo '<span class="badge bg-warning">Últimas unidades</span>';
                                                    } else {
                                                    echo '<span class="badge bg-success">Hay Stock</span>';
                                                    }
                                        ?>
                                        <p class="card-text">Stock: <?php echo $row['producto_stock']; ?></p>
                                        <h5 class="card-text">$ <?php echo number_format($row['producto_precio'], 2, ',', '.');?> </h5>
                                        <?php if(session('login') && session()->perfil == 1){
                                            echo form_open('add_cart');
                                                echo form_hidden('id', $row['producto_id']);
                                                echo form_hidden('descripcion', $row['producto_descripcion']);
                                                echo form_hidden('precio', $row['producto_precio']);
                                                if($row['producto_stock'] != 0){
                                                    echo form_submit('comprar', 'Agregar al carrito', "class='btn btn-success'");
                                                }
                                                
                                            echo form_close();
                                        } ?>
                                    </div>
                                </div>
                        </div>
                    <?php } ?>
                <?php } // fin foreach?>
            </div>

    
        </div>
    </div>
</div>

</section>

