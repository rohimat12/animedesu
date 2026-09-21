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

// Frontend Public Routes
$routes->get('/', 'Home::index');
$routes->get('/anime/(:segment)', 'Home::anime/$1');
$routes->get('/episode/(:segment)', 'Home::episode/$1');
$routes->get('/episode/(:segment)/(:segment)', 'Home::episode/$1/$2');
$routes->get('/page/(:segment)', 'Home::page/$1');
$routes->get('/categories', 'Home::categories');
$routes->get('/genre/(:segment)', 'Home::categories/$1');
$routes->get('/search', 'Home::search');
$routes->get('/api/search', 'Home::liveSearch');

// Authentication Routes
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginProcess', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');
$routes->get('/admin/logout', 'Auth::logout');

// Admin Panel Routes (Protected by AuthFilter)
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/anime', 'Admin::anime');
$routes->get('/admin/new-anime', 'Admin::new_anime');
$routes->get('/admin/new_anime', 'Admin::new_anime');
$routes->get('/admin/new-anime2', 'Admin::new_anime2');
$routes->get('/admin/new_anime2', 'Admin::new_anime2');
$routes->get('/admin/new-anime2/(:segment)', 'Admin::new_anime2/$1');
$routes->get('/admin/new_anime2/(:segment)', 'Admin::new_anime2/$1');
$routes->post('/admin/save_anime', 'Admin::save_anime');
$routes->post('/admin/update_anime/(:num)', 'Admin::update_anime/$1');
$routes->get('/admin/delete_anime/(:num)', 'Admin::delete_anime/$1');

// Admin Episode Routes
$routes->get('/admin/episode', 'Admin::episode');
$routes->get('/admin/new-episode', 'Admin::new_episode');
$routes->get('/admin/new_episode', 'Admin::new_episode');
$routes->post('/admin/save_episode', 'Admin::save_episode');
$routes->post('/admin/update_episode/(:num)', 'Admin::update_episode/$1');
$routes->get('/admin/delete_episode/(:num)', 'Admin::delete_episode/$1');

// Admin Page Routes
$routes->get('/admin/page', 'Admin::page');
$routes->get('/admin/new-page', 'Admin::new_page');
$routes->get('/admin/new_page', 'Admin::new_page');
$routes->post('/admin/save_page', 'Admin::save_page');
$routes->post('/admin/update_page/(:num)', 'Admin::update_page/$1');
$routes->get('/admin/delete_page/(:num)', 'Admin::delete_page/$1');

// Admin Additional
$routes->get('/admin/statistik', 'Admin::statistik');
$routes->get('/admin/setting', 'Admin::setting');
$routes->post('/admin/save_setting', 'Admin::save_setting');
$routes->post('/admin/save_account', 'Admin::save_account');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
