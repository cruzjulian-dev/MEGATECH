<section>
    <?php $cart = \Config\Services::cart(); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- poner que a partir de 900px se esconda items menu, centrar logo y que a partir de 300px se esconda el logo.-->
    <div class="container-fluid">                    
        <div class="d-flex">
                <button class="navbar-toggler order-md-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('/');?>"><img src="<?php echo base_url('./assets/img/logo-mega.png') ?>" width="236px" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">

            <?php if(session('login')){  // si esta logeado ?>

                <?php if(session()->perfil == '1') { // si es usuario ?>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/');?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('nosotros');?>">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('contacto');?>">Contacto</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('mis_compras');?>">Mis Compras</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catálogo</a>
                        <ul class="dropdown-menu">

                            <?php foreach($categorias_dropdown as $row) { ?>
                                <li><a class="dropdown-item" href="<?php echo base_url('catalogo/'.$row['categoria_id']);?>"><?php echo $row['categoria_descripcion'] ?></a></li>
                            <?php } ?>
                            <hr>
                            <li><a class="dropdown-item" href="<?php echo base_url('catalogo/0');?>">Ver todos</a></li>
                        </ul>
                    </li> 
                    

                <?php } else { // administrador ?>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/');?>">Inicio</a>
                        </li>                
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Funciones administrativas</a>
                            <ul class="dropdown-menu">
                                <li>
                                <a class="dropdown-item" href="<?php echo base_url('ver_consultas');?>">Ver consultas</a>
                                </li>

                                <li>
                                <a class="dropdown-item" href="<?php echo base_url('agregar_producto');?>">Agregar producto</a>
                                </li>

                                <li>
                                <a class="dropdown-item" href="<?php echo base_url('gestionar_productos');?>">Gestionar productos</a>
                                </li>
                                
                                <li>
                                <a class="dropdown-item" href="<?php echo base_url('listar_ventas');?>">Listar ventas</a>
                                </li>

                                <li>
                                <a class="dropdown-item" href="<?php echo base_url('mas_vendidos');?>">Listar más vendidos</a>
                                </li>

                                <li>
                                    <hr><a class="dropdown-item" href="<?php echo base_url('admin_panel');?>">Panel Administrador</a>
                                </li>  
                            </ul>
                        </li>        
                        
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catálogo</a>
                            <ul class="dropdown-menu">

                                <?php foreach($categorias_dropdown as $row) { ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url('catalogo/'.$row['categoria_id']);?>"><?php echo $row['categoria_descripcion'] ?></a></li>
                                <?php } ?>
                                <hr>
                                <li><a class="dropdown-item" href="<?php echo base_url('catalogo/0');?>">Ver todos</a></li>
                            </ul>
                        </li>

                <?php }?>

            <?php } else { // si no esta registrado ?>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/');?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('nosotros');?>">Quienes somos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('contacto');?>">Contacto</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catálogo</a>
                            <ul class="dropdown-menu">

                                <?php foreach($categorias_dropdown as $row) { ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url('catalogo/'.$row['categoria_id']);?>"><?php echo $row['categoria_descripcion'] ?></a></li>
                                <?php } ?>
                                <hr>
                                <li><a class="dropdown-item" href="<?php echo base_url('catalogo/0');?>">Ver todos</a></li>
                            </ul>
                        </li> 
                    <?php } ?>
            </ul>

            <ul class="navbar-nav ms-auto">
                
                <li class="nav-item">
                    <?php if(session('login')){ ?>
                        <?php if(session()->perfil == 1){ // es cliente ?>
                        <li class="nav-item">

                            <a class="nav-link" href="<?php echo base_url('ver_carrito');?>"><img src="<?php echo base_url('./assets/img/icn-nav-cart.png')?>" alt=""> Carrito <?php $cart->totalitems(); ?></a>
                            
                            
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <img src="<?php echo base_url('./assets/img/icn-nav-user.png') ?>" alt=""> Bienvenido <?php echo session('nombre');?> </a>
                            <ul class="dropdown-menu">                                
                                <li><a class="dropdown-item" href="<?php echo base_url('salir');?>">Salir</a></li>
                            </ul>
                        </li>
                        <?php } else { // es admin?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <img src="<?php echo base_url('./assets/img/icn-nav-user.png')?>" alt=""> Bienvenido <?php echo session('nombre');?> </a>
                            <ul class="dropdown-menu">                              
                                <li><a class="dropdown-item" href="<?php echo base_url('salir');?>">Salir</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo base_url('./assets/img/icn-nav-user.png')?>" alt=""> Area de usuario</a>
                            <ul class="dropdown-menu">                                
                                <li><a class="dropdown-item" href="<?php echo base_url('ingresar');?>">Ingresar</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('registrarse');?>">Registrarse</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </li>  
            </ul>
        </div>
    </div>
    </nav>
</section>