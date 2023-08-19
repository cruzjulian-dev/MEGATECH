<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Iniciar sesión</h3>
        <hr>
        <div class="container col-lg-8 col-xl-6 col-md-10 col-sm-12 mx-auto">
            <div class="card h-100">

                <?php echo form_open('login') ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->getFlashdata('Mensaje')) { ?>
                    <div class='alert alert-danger alert-dismissible fade show text-center mx-4 mt-4 pt-3 pb-3' role='alert' id='mensaje'>
                        <?= session()->getFlashdata('Mensaje'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <div class="col p-3">
                    <div class="form-group mb-3">
                        <label for="mail">Ingrese su correo:</label>
                        <?php echo form_input(['name' => 'mail', 'id' => 'mail', 'class' => 'form-control', 'placeholder' => 'Correo', 'value' => set_value('mail')]); ?>
                    </div>

                    <?php if ($validation->getError('mail')) { ?>
                        <div class='alert alert-danger pt-1 pb-1 mb-3'>
                            <?= $error = $validation->getError('mail'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mb-3">
                        <label for="pass">Ingrese su contraseña:</label>
                        <?php echo form_input(['type'=>'password', 'name' => 'pass', 'id' => 'pass', 'class' => 'form-control', 'placeholder' => 'Contraseña', 'value' => set_value('pass')]); ?>
                    </div>
                    
                    <?php if ($validation->getError('pass')) { ?>
                        <div class='alert alert-danger pt-1 pb-1'>
                            <?= $error = $validation->getError('pass'); ?>
                        </div>
                    <?php } ?>
  

                    <div class="form-group mt-3">
                        <?php echo form_submit('botonContacto', 'Ingresar', "class='btn btn-success'");?>    
                    </div> 
                </div>

                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
</section>
