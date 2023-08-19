<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Editar Producto</h3>
        <hr>
        <div class="container col-lg-8 col-xl-6 col-md-10 col-sm-12 mx-auto">
            <div class="card h-100">

                <?php $validation = \Config\Services::validation(); ?>

                <?php if (session()->getFlashdata('Mensaje')) { ?>
                <div class='alert alert-success alert-dismissible fade show mx-4 mt-4 pt-3 pb-3' role='alert' id='mensaje'>
                    <?= session()->getFlashdata('Mensaje'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>

                <?php echo form_open_multipart('actualizar_producto') ?>

                <div class="col p-3">

                    <div class="form-group mb-3">
                        <label for="descripcion" for="descripcion" class="form-label">Descripcion:</label>
                        <input type="descripcion" name="descripcion" placeholder="Descripcion" value="<?= $producto['producto_descripcion']; ?>" class="form-control" id="descripcion">
                        <?php if ($validation->getError('descripcion')) { ?>
                            <div class='alert alert-danger pt-1 pb-1 mb-3'>
                                <?= $error = $validation->getError('descripcion'); ?>
                            </div>
                        <?php } ?>
                    </div>


                    <div class="form-group mb-3 input-group">
                        <label for="precio" class="input-group form-label">Precio:</label>
                        <span class="input-group-text">$</span>
                        <input type="text" name="precio" id="precio" placeholder="Precio" value="<?= $producto['producto_precio'];  ?>" class="form-control" id="precio">
                        <?php if ($validation->getError('precio')) { ?>
                            <div class='alert alert-danger pt-1 pb-1 mb-3'>
                                <?= $error = $validation->getError('precio'); ?>
                            </div>
                        <?php } ?>
                    </div>



                    <div class="form-group mb-3">
                        <label for="categoria" class="mb-3">Categoria:</label>
                        <?php
                        $lista['0'] = 'Seleccione categoría';
                        foreach ($categorias as $row) {
                            $lista[$row['categoria_id']] = $row['categoria_descripcion'];
                        }
                        $sel = $producto['producto_categoria'];
                        echo form_dropdown('categoria', $lista, $sel, 'class="form-control"');
                        ?>
                        <?php if ($validation->getError('categoria')) { ?>
                        <div class='alert alert-danger pt-1 pb-1 mb-3'>
                            <?= $error = $validation->getError('categoria'); ?>
                        </div>
                        <?php } ?>
                    </div>
                    

                    <div class="form-group">
                        <label for="imagen" class="form-label d-block">Imagen: (Ancho/Alto máximo permitido 900x900)</label>
                        <input class="form-control" name="imagen" type="file" id="imagen">
                        <img class="mb-3 mt-1" src="<?php echo base_url('/assets/img/catalogo/subidas/' . $producto['producto_imagen']); ?>" width="100" height="100" alt="">
                        <?php if ($validation->getError('imagen')) { ?>
                            <div class='alert alert-danger pt-1 pb-1 mb-3'>
                                <?= $error = $validation->getError('imagen'); ?>
                            </div>
                        <?php } ?>
                    </div>


                    <div class="form-group mb-3">
                        <label for="stock" class="form-label">Stock:</label>
                        <input type="number" name="stock" placeholder="Stock" value="<?= $producto['producto_stock']; ?>" class="form-control" id="stock">
                        <?php if ($validation->getError('stock')) { ?>
                            <div class='alert alert-danger pt-1 pb-1 mb-3'>
                                <?= $error = $validation->getError('stock'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="vendidos" class="form-label">Cantidad de vendidos:</label>
                        <input type="number" name="vendidos" placeholder="Vendidos" value="<?= $producto['producto_vendidos']; ?>" class="form-control" id="vendidos">
                        <?php if ($validation->getError('vendidos')) { ?>
                            <div class='alert alert-danger pt-1 pb-1 mb-3'>
                                <?= $error = $validation->getError('vendidos'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    

                    <?php echo form_hidden('producto_id', $producto['producto_id']);?>
                    
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                    
                </div>
            
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
</section>
