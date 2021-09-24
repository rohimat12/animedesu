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
// $routes->get('/(:segment)', 'Home::index');
$routes->get('/admin/', 'Admin::index');
// $routes->get('/admin/(:num)', 'Admin::index');
// $routes->get('/admin/(:alfa)', 'Admin::index');
$routes->get('/admin/new-anime', 'Admin::new_anime');
$routes->get('/admin/new-anime2', 'Admin::new_anime2');
$routes->get('/admin/new-anime2/(:segment)', 'Admin::new_anime2/$1');
$routes->get('/admin/anime', 'Admin::anime');
$routes->get('/admin/new-episode', 'Admin::new_episode');
$routes->get('/admin/episode', 'Admin::episode');
$routes->get('/admin/episode/(:segment)/(:segment)', 'Admin::episode/$1/$2');
$routes->get('/admin/new-page', 'Admin::new_page');
$routes->get('/admin/page', 'Admin::page');
$routes->get('/anime/(:segment)', 'Home::anime/$1');
$routes->get('/episode/(:segment)', 'Home::episode/$1');
$routes->get('/page/(:segment)', 'Home::page/$1');

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
