<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(false);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index');
$routes->get('/login', 'HomeController::login');
$routes->post('/login/process', 'HomeController::processlogin', ["filter" => "noauth"]);
$routes->get('/logout', 'HomeController::logout');

$routes->get('/Tambah_Karyawan', 'AdminController::Tambah_Karyawan', ["filter" => "auth"]);
$routes->get('/Tambah_Akun', 'AdminController::Tambah_Akun', ["filter" => "auth"], ["filter" => "auth"]);

$routes->get('/Admin', 'AdminKaryawanController::list_karyawan', ["filter" => "auth"]);
$routes->get('/list_karyawan', 'AdminKaryawanController::list_karyawan', ["filter" => "auth"]);
$routes->get('/detail_karyawan/(:num)', 'AdminKaryawanController::detail_karyawan/$1', ["filter" => "auth"]);
$routes->get('/hapus_karyawan/(:num)', 'AdminKaryawanController::hapus_karyawan/$1', ["filter" => "auth"]);
$routes->post('/hapus_karyawan/ya/(:num)', 'AdminKaryawanController::hapus_karyawan/$1', ["filter" => "auth"]);
$routes->post('/tambahk_proses', 'AdminKaryawanController::process_addkaryawan', ["filter" => "auth"]);
$routes->post('/tambaha_process', 'AdminKaryawanController::process_addakun', ["filter" => "auth"]);

//tugas karyawan
$routes->get('/tambah_tugas', 'AdminTugasController::tambah_tugas', ["filter" => "auth"]);
$routes->post('/tambaht_proses', 'AdminTugasController::process_addtugas', ["filter" => "auth"]);
$routes->get('/list_tugas', 'AdminTugasController::tampil_tugas', ["filter" => "auth"]);



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
