<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Panel Administrativo</h3>
        <hr>
        <div class="container text-center bg-white rounded p-3"> <!-- contenedor de fondo blanco -->
            <div class="d-flex mx-auto col-xl-6 col-sm-12 col-lg-8 col-md-10">
                
                <img src="<?php echo base_url('assets/img/panel_admin.jpg'); ?>" alt="" class="d-block w-100">
                
                <br>
            </div>
            <h4>Bienvenido <?php echo session('nombre');?>. ¿Qué desea hacer?</h4>
            <br>
            <div class="row p-3">

                <div class="col-sm-12 col-md-6 col-xl-6 align-self-center">
                    <h1><a href="<?php echo base_url('listar_ventas'); ?>" class="btn btn-primary m-3 p-2" role="button">Listar Ventas</a></h1>
                </div>

                <div class="col-sm-12 col-md-6 col-xl-6 mx-auto">
                    <h1><a href="<?php echo base_url('mas_vendidos'); ?>" class="btn btn-primary m-3 p-2" role="button">Listar Mas Vendidos</a></h1> 
                </div>

            </div>
            <div class="row p-3">

                <div class="col-sm-12 col-md-6 col-xl-6 align-self-center">
                    <h1><a href="<?php echo base_url('agregar_producto'); ?>" class="btn btn-primary m-3 p-2" role="button">Agregar un Producto</a></h1>
                </div>

                <div class="col-sm-12 col-md-6 col-xl-6 mx-auto">
                    <h1><a href="<?php echo base_url('gestionar_productos'); ?>" class="btn btn-primary m-3 p-2" role="button">Gestionar Productos</a></h1>
                </div>

            </div>

            <div class="row p-3">

                <div class="col-sm-12 col-md-6 col-xl-6 align-self-center">
                    <h1><a href="<?php echo base_url('ver_consultas'); ?>" class="btn btn-primary m-3 p-2" role="button">Ver Consultas</a></h1>
                </div>

                <div class="col-sm-12 col-md-6 col-xl-6 mx-auto">
                    <h1><a href="<?php echo base_url('catalogo/0'); ?>" class="btn btn-primary m-3 p-2" role="button">Ver Catálogo</a></h1>
                </div>

            </div>
        </div>
    </div>
</div>
</section>
