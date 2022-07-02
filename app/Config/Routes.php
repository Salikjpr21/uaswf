<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/lab1', 'Home::detail1');
$routes->get('/lab2', 'Home::detail2');
$routes->get('/lab3', 'Home::detail3');
$routes->get('/register', 'Home::register');
// $routes->post('/insert', 'Home::insertAjax');
$routes->get('/form', 'Home::getForm');
$routes->get('/masuk', 'Home::login');
$routes->post('/cek', 'Home::cek');
$routes->post('/daftar', 'Home::daftar');
$routes->get('/keluar', 'Home::logout');
$routes->get('/user', 'Home::profile');

$routes->get('/admin/masuk', 'Otentikasi::index');
$routes->post('/admin/cek', 'Otentikasi::login');
$routes->get('/admin/keluar', 'Otentikasi::logout');
$routes->get('/admin/', 'Admin::index', ['filter' => 'auth']);
$routes->get('/admin/about', 'About::index)', ['filter' => 'auth']);
$routes->get('/admin/user', 'User::index', ['filter' => 'auth']);
$routes->get('/admin/user/create', 'User::create', ['filter' => 'auth']);
$routes->get('/admin/user/data', 'User::getData', ['filter' => 'auth']);
$routes->get('/admin/user/form', 'User::getForm', ['filter' => 'auth']);
$routes->get('/admin/user/form/(:segment)', 'User::edit/$1', ['filter' => 'auth']);
$routes->get('/admin/user/(:segment)', 'User::detail/$1', ['filter' => 'auth']);
$routes->post('/admin/user/insert', 'User::insert', ['filter' => 'auth']);
$routes->put('/admin/user/(:segment)', 'User::update/$1', ['filter' => 'auth']);
$routes->delete('/admin/user/(:segment)', 'User::hapus/$1', ['filter' => 'auth']);
$routes->get('/admin/jadwal', 'Jadwal::index', ['filter' => 'auth']);
$routes->get('/admin/jadwal/create', 'Jadwal::create', ['filter' => 'auth']);
$routes->get('/admin/jadwal/data', 'Jadwal::getData', ['filter' => 'auth']);
$routes->get('/admin/jadwal/form', 'Jadwal::getForm', ['filter' => 'auth']);
$routes->get('/admin/jadwal/form/(:segment)', 'Jadwal::edit/$1', ['filter' => 'auth']);
$routes->get('/admin/jadwal/(:segment)', 'Jadwal::detail/$1', ['filter' => 'auth']);
$routes->post('/admin/jadwal/insert', 'Jadwal::insert', ['filter' => 'auth']);
$routes->put('/admin/jadwal/(:segment)', 'Jadwal::update/$1', ['filter' => 'auth']);
$routes->delete('/admin/jadwal/(:segment)', 'Jadwal::hapus/$1', ['filter' => 'auth']);

$routes->post('admin/user/insertAjax', 'User::insertAjax');
$routes->post('admin/jadwal/insertAjax', 'Jadwal::insertAjax');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
