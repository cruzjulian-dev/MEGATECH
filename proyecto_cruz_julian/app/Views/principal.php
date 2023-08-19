<section> <!-- a partir de sm 576px se esconde carusell-->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner d-none d-sm-block">
        <div class="carousel-item active">
        <a href="<?php echo base_url('catalogo/1');?>"><img src="./assets/img/cpu.png" class="d-block w-100" alt="..."></a>
        </div>
        <div class="carousel-item">
        <a href="<?php echo base_url('catalogo/2');?>"><img src="./assets/img/gpu.png" class="d-block w-100" alt="..."></a>
        </div>
        <div class="carousel-item">
        <a href="<?php echo base_url('catalogo/5');?>"><img src="./assets/img/pc-armadas.png" class="d-block w-100" alt="..."></a>
        </div>
    </div>
    <button class="carousel-control-prev d-none d-sm-block" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next d-none d-sm-block" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
    </div>
</section>



<section>


<div class="container-fluid bg-light">
    <div class="container p-3 w-75 text-center"> <!-- contenedor del titulo y espaciado -->
        <h3>Bienvenido a MEGATECH</h3>
        <hr>
    <div class="container text-center bg-white rounded p-3"> <!-- contenedor de fondo blanco -->
        <br><h3>Más vendidos</h3>
        <div class="row row-cols-1 row-cols-md-4 row-cols-sm-2 g-3">
            <?php $i=0; ?>       
                <?php foreach($vendidos as $row) { ?>
                    <?php if($row['producto_estado'] == 1 && $i < 4) {?>
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
                    <?php $i++ ?>
                <?php } // fin foreach?>
        </div>

        <br><br><h3>Nuevos ingresos</h3>
        <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 g-3">     
                <?php $i=0; ?>       
                <?php foreach($ingresos as $row) { ?>
                    <?php if($row['producto_estado'] == 1 && $i < 4) {?>
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
                    <?php $i++ ?>
                <?php } // fin foreach?>
        </div>

    </div>
</div>

</section>

