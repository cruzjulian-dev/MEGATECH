<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Home Controller
$routes->get('/', 'Home::index');
$routes->get('contacto', 'Home::contacto');
$routes->get('nosotros', 'Home::nosotros');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('terminos', 'Home::terminos');
$routes->get('preguntas_freq', 'Home::preguntas_freq');
$routes->get('catalogo', 'Home::catalogo');
$routes->get('catalogo/(:num)', 'Home::vista_catalogo/$1');

// Consulta Controller
$routes->get('ver_consultas', 'ConsultaController::vista_consultas');
$routes->post('registrar_consulta', 'ConsultaController::registrar_consulta');
$routes->get('marcar_visto/(:num)', 'ConsultaController::consulta_visto/$1');
$routes->get('marcar_novisto/(:num)', 'ConsultaController::consulta_noVisto/$1');


// Persona Controller
$routes->get('ingresar', 'PersonaController::vista_ingresar');
$routes->get('registrarse', 'PersonaController::vista_registrarse');
$routes->get('salir', 'PersonaController::cerrar_sesion');
$routes->post('login', 'PersonaController::login_usuario');
$routes->post('registrar_usuario', 'PersonaController::registrar_usuario');
$routes->get('mis_compras', 'PersonaController::mis_compras');
$routes->get('detalle_compra/(:num)', 'PersonaController::detalle_compra/$1');


// Admin Controller
$routes->get('agregar_producto', 'AdminController::vista_agregarProducto');
$routes->get('admin_panel', 'AdminController::vista_admin');
$routes->post('registrar_producto', 'AdminController::registrar_producto');


// Producto Controller
$routes->get('gestionar_productos', 'ProductoController::vista_gestionarProductos');
$routes->get('editar_producto/(:num)', 'ProductoController::vista_editarProducto/$1');
$routes->get('activar_producto/(:num)', 'ProductoController::activar_prod/$1');
$routes->get('eliminar_producto/(:num)', 'ProductoController::eliminar_prod/$1');
$routes->post('actualizar_producto', 'ProductoController::actualizar_prod');

// Carrito Controller
$routes->get('ver_carrito', 'CarritoController::vista_carrito');
$routes->post('add_cart', 'CarritoController::agregar_carrito');
$routes->get('borrar/(:any)', 'CarritoController::borrar_carrito/$1');

// Ventas Controller
$routes->get('comprar/(:num)', 'VentaController::guardar_venta/$1');
$routes->get('listar_ventas', 'VentaController::listar_ventas');
$routes->get('ver_detalle/(:num)', 'VentaController::ver_detalle/$1');
$routes->get('mas_vendidos', 'VentaController::listar_masVendidos');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
