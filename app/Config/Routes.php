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
$routes->get('/', 'Home::index');

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
//Vistas basicas de la web que no requieren back end
$routes->get('home', 'Home::home');
$routes->get('nosotros', 'Home::nosotros');
$routes->get('terminos', 'Home::terminos');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('inProgressViews', 'Home::inProgressViews');
$routes->get('panelControl', 'Home::panelControl');

//Vistas de productos cliente
$routes->get('productos', 'productos_controller::listadoProductosCliente');
$routes->get('verProducto/(:num)', 'productos_controller::verProducto/$1');

//ruta para iniciar sesion
$routes->get('login', 'login_controller::index');
$routes->get('nuevoUsuario', 'Home::nuevoUsuario');
$routes->post('enviar_login', 'login_controller::auth');
$routes->post('cerrar_sesion', 'login_controller::logout');
$routes->post('enviar_form', 'usuarios_controller::formValidation');

//rutas para la administracion de los usuarios
$routes->get('adminUsuarios', 'usuarios_controller::adminUsuarios');
$routes->get('adminUsuariosBaja', 'usuarios_controller::adminUsuariosBaja');
$routes->get('bajaUsuario/(:num)', 'usuarios_controller::bajaUsuario/$1');
$routes->get('bajaUsuarioCliente/(:num)', 'usuarios_controller::bajaUsuarioCliente/$1');
$routes->get('altaUsuario/(:num)', 'usuarios_controller::altaUsuario/$1');
$routes->get('editarUsuario/(:num)', 'usuarios_controller::editarUsuario/$1');
$routes->post('editarUsuarioForm', 'usuarios_controller::editarUsuarioForm');

//Rutas para administrar productos
$routes->get('adminProductos', 'productos_controller::index');
$routes->get('adminProductosBaja', 'productos_controller::adminProductosBaja');
$routes->get('vistaAgregarProducto', 'productos_controller::agregarProductoView');
$routes->post('agregarProducto', 'productos_controller::agregarProducto');
$routes->get('editarProducto/(:num)', 'productos_controller::editarProducto/$1');
$routes->post('editarProductoForm', 'productos_controller::editarProductoForm');
$routes->get('eliminarProducto/(:num)', 'productos_controller::bajaProducto/$1');
$routes->get('altaProducto/(:num)', 'productos_controller::altaProducto/$1');

//Vistas para el manejo de mensajes del formulario de contacto. 
$routes->get('contacto', 'mensaje_controller::index');
$routes->post('enviarMensaje', 'mensaje_controller::enviarMensaje');
$routes->get('administrarMensajes', 'mensaje_controller::adminMensajes');
$routes->get('administrarMensajesLeidos', 'mensaje_controller::adminMensajesLeidos');
$routes->get('leerMensaje/(:num)', 'mensaje_controller::leerMensaje/$1');
$routes->get('mensajeNoLeido/(:num)', 'mensaje_controller::mensajeNoLeido/$1');
$routes->get('verMensaje/(:num)','mensaje_controller::verMensaje/$1');

/*
* Rutas del carrito
*/
$routes->get('vista_compras/(:num)', 'ventas_controller::ver_factura/$1');
//muestra todos los productos del catalogo
$routes->get('/todos_p', 'carrito_controller::catalogo');
//carga la vista carrito_parte_view
$routes->get('/muestro', 'carrito_controller::muestra');
//actualiza los datos del carrito
$routes->get('/carrito_actualiza','carrito_controller::actualiza_carrito');
//agregar los items al carrito
$routes->post('/carrito_agrega', 'carrito_controller::add');
//elimina un ítem seleccionado
$routes->get('carrito_elimina/(:any)','carrito_controller::remove/$1');
//eliminar todo el carrito
$routes->get('/borrar','carrito_controller::borrar_carrito');
//muestra las compras una vez que realizamos la misma
$routes->get('/carrito-comprar', 'carrito_controller::comprar_carrito');


//RUTAS DE VENTAS
$routes->get('ver_ventas_admin', 'ventas_controller::ver_ventas_admin');
$routes->get('ver_detalle_venta_admin/(:num)', 'ventas_controller::ver_detalle_venta_admin/$1');
$routes->get('ver_compras_cliente/(:num)', 'ventas_controller::ver_compras_cliente/$1');
$routes->get('ver_detalle_compra_cliente/(:num)', 'ventas_controller::ver_detalle_compra_cliente/$1');

//RUTAS OFERTAS
$routes->get('nueva_oferta_view/(:num)', 'ofertas_controller::nueva_oferta_view/$1');
$routes->post('nueva_oferta_save', 'ofertas_controller::nueva_oferta_save');
$routes->get('dar_baja_oferta/(:num)', 'ofertas_controller::dar_baja_oferta/$1');
$routes->get('dar_alta_oferta/(:num)', 'ofertas_controller::dar_alta_oferta/$1');
$routes->get('ofertasAdmin', 'ofertas_controller::ofertasAdmin');
$routes->get('ofertasAdminBaja', 'ofertas_controller::ofertasAdminBaja');