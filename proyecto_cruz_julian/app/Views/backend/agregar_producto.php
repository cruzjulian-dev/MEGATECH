<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Agregar Producto</h3>
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

                <?php echo form_open_multipart('registrar_producto') ?>

                <div class="col p-3">
                    <div class="form-group mb-3">
                        <label for="descripcion">Descripción:</label>
                        <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Descripcion', 'value' => set_value('descripcion')]); ?>
                    </div>
                    <?php if ($validation->getError('descripcion')) { ?>
                        <div class='alert alert-danger pt-1 pb-1 mb-3'>
                            <?= $error = $validation->getError('descripcion'); ?>
                        </div>
                     <?php } ?>


                    <div class="form-group mb-3">
                        <label for="precio">Precio:</label>
                        <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'placeholder' => 'Precio', 'value' => set_value('precio')]); ?>
                    </div>

                    <?php if ($validation->getError('precio')) { ?>
                        <div class='alert alert-danger pt-1 pb-1 mb-3'>
                            <?= $error = $validation->getError('precio'); ?>
                        </div>
                     <?php } ?>

                     
                    <div class="form-group mb-3">
                        <label for="categoria">Categoría:</label>
                        <?php
                            $lista['0'] = 'Seleccione categoría';

                            foreach($producto as $row) {
                                
                                $categoria_id = $row['categoria_id'];
                                $categoria_desc = $row['categoria_descripcion'];

                                $lista[$categoria_id] = $categoria_desc;
                            }

                            echo form_dropdown('categoria', $lista, '0', 'class="form_control"');
						?>
                    </div>

                    <?php if ($validation->getError('categoria')) { ?>
                        <div class='alert alert-danger pt-1 pb-1 mb-3'>
                            <?= $error = $validation->getError('categoria'); ?>
                        </div>
                     <?php } ?>
                     

                    <div class="form-group mb-3">
                        <label for="imagen">Imagen: (Ancho/Alto máximo permitido 900x900)</label>
                        <?php echo form_input(['type' => 'file', 'name' => 'imagen', 'id' => 'imagen', 'class' => 'form-control', 'value' => set_value('imagen')]); ?>
                    </div>
                    <?php if ($validation->getError('imagen')) { ?>
                        <div class='alert alert-danger pt-1 pb-1 mb-3'>
                            <?= $error = $validation->getError('imagen'); ?>
                        </div>
                     <?php } ?>

                     <div class="form-group mb-3">
                        <label for="stock">Stock:</label>
                        <?php echo form_input(['type' => 'number', 'name' => 'stock', 'id' => 'stock', 'class' => 'form-control', 'placeholder' => 'Stock', 'value' => set_value('stock')]); ?>
                    </div>

                    <?php if ($validation->getError('stock')) { ?>
                        <div class='alert alert-danger pt-1 pb-1 mb-3'>
                            <?= $error = $validation->getError('stock'); ?>
                        </div>
                     <?php } ?>

                     
                     <div class="form-group mb-3">
                        <label for="vendidos">Cantidad de vendidos:</label>
                        <?php echo form_input(['type' => 'number', 'name' => 'vendidos', 'id' => 'vendidos', 'class' => 'form-control', 'placeholder' => 'Vendidos', 'value' => set_value('vendidos')]); ?>
                    </div>

                    <?php if ($validation->getError('vendidos')) { ?>
                        <div class='alert alert-danger pt-1 pb-1 mb-3'>
                            <?= $error = $validation->getError('vendidos'); ?>
                        </div>
                     <?php } ?>


                    <div class="form-group mt-3">
                        <?php echo form_submit('botonContacto', 'Agregar producto', "class='btn btn-success'");?>    
                    </div> 
                </div>
            
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
</section>
