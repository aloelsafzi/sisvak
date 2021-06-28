<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
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


$routes->get('/', 'Login::index');
$routes->post('/Login', 'Login::auth');
$routes->get('/Login', 'Login::logout');

$routes->get('/Dashboard', 'Dashboard::index');

$routes->get('/Warga', 'Warga::index');
$routes->get('/Warga', 'Warga::tambahWarga');
$routes->post('/Warga', 'Warga::saveWarga');
$routes->get('/Warga', 'Warga::editWarga');
$routes->post('/Warga', 'Warga::updateWarga');
$routes->get('/Warga', 'Warga::deleteWarga');

$routes->get('/TempatVaksinasi', 'TempatVaksinasi::index');
$routes->get('/TempatVaksinasi', 'TempatVaksinasi::tambahTempat');
$routes->get('/TempatVaksinasi', 'TempatVaksinasi::editTempat');
$routes->post('/TempatVaksinasi', 'TempatVaksinasi::saveData');
$routes->post('/TempatVaksinasi', 'TempatVaksinasi::updateTempat');

$routes->get('/KeteranganVaksinasi', 'KeteranganVaksinasi::index');
$routes->get('/KeteranganVaksinasi', 'KeteranganVaksinasi::updateStatus');

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
