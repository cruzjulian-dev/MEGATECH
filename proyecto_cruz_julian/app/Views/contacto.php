<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Contacto</h3>
        <hr>
        <div class="row bg-white rounded row-cols-lg-1 row-cols-xl-2 row-cols-md-1 row-cols-sm-1 row-cols-xs-1 d-flex"> <!-- contenedor de fondo blanco -->
            <div class="col border-end link-secondary p-4">
                <h4>Información de contacto</h4> <br>
                <b> <h5><b>Empresa:</b> MEGATECH Informática</h5> </b>
                <h5><b>Whatsapp:</b> +54 3795-212154</h5>
                <h5><b>Domicilio legal:</b> 9 de Julio 1419, Corrientes, Argentina.</h6>
                <h5><b>Correo:</b> ventas@megatech.com</h5>
                <h5><b>Titular:</b> Julian Cruz</h5>
                <br>
                <div class="d-flex">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2475.8385972291667!2d-58.83157775020318!3d-27.467460559161694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d0a76673%3A0x7ee3cad2e80e6cd1!2s9%20de%20Julio%201419%2C%20W3400AZB%20Corrientes!5e0!3m2!1ses-419!2sar!4v1682000808378!5m2!1ses-419!2sar" width="900" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			    </div>

                
            </div>

            <div class="col p-3">
                <div>
                    <h4>Dejanos tu consulta</h4> <hr>
                </div>
                <?php echo form_open('registrar_consulta'); ?>

                <?php $validation = \Config\Services::validation(); ?>

                <?php if(isset($validations)){?>
                    <div class="alert alert-danger alert-dismissible fade show mx-4 mt-4 pt-3 pb-3" role="alert">
                        <?=$validations->listErrors();?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                
                <?php if (session()->getFlashdata('Mensaje')) { ?>
                    <div class='alert alert-success alert-dismissible fade show mx-4 mt-4 pt-3 pb-3' role='alert' id='mensaje'>
                        <?= session()->getFlashdata('Mensaje'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <div class="form-group mb-3">
                    <label class="mb-1" for="nombre">Ingrese su nombre completo:</label>
                    <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Nombre completo', 'value' => set_value('nombre')]); ?>
                </div>


                <div class="form-group mb-3">
                    <label class="mb-1" for="mail">Ingrese su correo electrónico:</label>
                    <?php echo form_input(['name' => 'mail', 'id' => 'mail', 'class' => 'form-control', 'placeholder' => 'Correo electrónico', 'value' => set_value('mail')]); ?>
                </div>

                <div class="form-group mb-3">
                    <label class="mb-1" for="asunto">Asunto:</label>
                    <?php echo form_input(['name' => 'asunto', 'id' => 'asunto', 'class' => 'form-control', 'placeholder' => 'Su motivo de consulta', 'value' => set_value('asunto')]); ?>
                </div>

                <div class="form-group mb-3">
                    <label class="mb-1" for="consulta">Consulta</label>
                    <?php echo form_textarea(['name' => 'consulta', 'id' => 'consulta', 'class' => 'form-control', 'placeholder' => 'Su consulta aqui...', 'value' => set_value('consulta')]); ?>
                </div>

                <?php echo form_submit('botonContacto', 'Enviar', "class='btn btn-success'");?>
                <?php echo form_close();?>

            </div>

        </div>
    </div>

</div>


</section>