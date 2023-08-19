<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Registro de usuario</h3>
        <hr>
        <div class="container col-lg-8 col-xl-6 col-md-10 col-sm-12 mx-auto">
            <div class="card h-100">

                <?php echo form_open('registrar_usuario') ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->getFlashdata('Mensaje')) { ?>
                    <div class='alert alert-success alert-dismissible fade show mx-4 mt-4 pt-3 pb-3' role='alert' id='mensaje'>
                        <?= session()->getFlashdata('Mensaje'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                
                <?php if(isset($validations)){?>
                    <div class='alert alert-danger alert-dismissible fade show mx-4 mt-4 pt-3 pb-3' role='alert' id='mensaje'>
                        <?=$validations->listErrors();?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php }?>

                <div class="col p-3">
                    <div class="form-group mb-3">
                        <label for="nombre">Ingrese su nombre:</label>
                        <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Nombre', 'value' => set_value('nombre')]); ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="apellido">Ingrese su apellido:</label>
                        <?php echo form_input(['name' => 'apellido', 'id' => 'apellido', 'class' => 'form-control', 'placeholder' => 'Apellido', 'value' => set_value('apellido')]); ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="telefono">Ingrese su teléfono:</label>
                        <?php echo form_input(['name' => 'telefono', 'id' => 'telefono', 'class' => 'form-control', 'placeholder' => 'Teléfono', 'value' => set_value('telefono')]); ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="telefono">Ingrese su DNI:</label>
                        <?php echo form_input(['name' => 'dni', 'id' => 'dni', 'class' => 'form-control', 'placeholder' => 'DNI', 'value' => set_value('dni')]); ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="mail">Ingrese su correo:</label>
                        <?php echo form_input(['name' => 'mail', 'id' => 'mail', 'class' => 'form-control', 'placeholder' => 'Correo', 'value' => set_value('mail')]); ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="pass">Ingrese una contraseña:</label>
                        <?php echo form_input(['type'=>'password', 'name' => 'pass', 'id' => 'pass', 'class' => 'form-control', 'placeholder' => 'Contraseña', 'value' => set_value('pass')]); ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="repass">Repita la contraseña:</label>
                        <?php echo form_input(['type'=>'password', 'name' => 'repass', 'id' => 'repass', 'class' => 'form-control', 'placeholder' => 'Repetir contraseña', 'value' => set_value('repass')]); ?>
                    </div> 
                    <div class="form-group mt-3">
                        <?php echo form_submit('botonContacto', 'Registrarse', "class='btn btn-success'");?>    
                    </div> 
                </div>
            
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
</section>
