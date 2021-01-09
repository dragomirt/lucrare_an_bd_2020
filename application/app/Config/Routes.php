<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/testadd', 'Home::addUser');
$routes->post('/contact', 'Home::contact');

//Admin
$routes->get('/admin', 'Admin::main');
$routes->get('/admin/requests', 'Admin::requests');
$routes->get('/admin/users', 'Admin::users');
$routes->get('/admin/users/create', 'Admin::showCreate');

// Users
$routes->post('admin/users/create', 'Admin::processUserCreate');
$routes->get('/admin/users/(:num)', 'Admin::usersShow/$1');
$routes->get('/admin/users/edit/(:num)', 'Admin::usersEdit/$1');
$routes->post('/admin/users/edit', 'Admin::usersEditProcessing');

// Option types
$routes->get('/admin/option_types', 'Admin::showOptionTypes');
$routes->get('/admin/option_types/create', 'Admin::addOptionTypeShow');
$routes->post('/admin/option_types/create', 'Admin::processOptionTypeCreate');
$routes->get('/admin/option_types/remove/(:num)', 'Admin::removeOptionType/$1');

// Listings
$routes->get('/admin/listings', 'Admin\ListingsController::index');
$routes->get('/admin/listings/create', 'Admin\ListingsController::create');
$routes->post('/admin/listings/create', 'Admin\ListingsController::addEntry');
$routes->get('/admin/listings/remove/(:num)', 'Admin\ListingsController::remove/$1');
$routes->get('/admin/listings/edit/(:num)', 'Admin\ListingsController::showEdit/$1');
$routes->post('/admin/listings/edit', 'Admin\ListingsController::edit');
$routes->get('/admin/listings/(:num)', 'Admin\ListingsController::show/$1');

// Exchanges
$routes->get('/admin/exchanges','Admin\ExchangeController::index');
$routes->get('/admin/exchanges/(:num)','Admin\ExchangeController::show/$1');
$routes->get('/admin/exchanges/create','Admin\ExchangeController::showCreate');
$routes->post('/admin/exchanges/create','Admin\ExchangeController::create');
$routes->get('/admin/exchanges/remove/(:num)','Admin\ExchangeController::remove/$1');
$routes->get('/admin/exchanges/edit/(:num)','Admin\ExchangeController::showEdit/$1');
$routes->post('/admin/exchanges/edit','Admin\ExchangeController::edit');

// Reports
$routes->get('/admin/reports', 'Admin\ReportsController::index');

$routes->get('/admin/reports/time', 'Admin\ReportsController::showTime');
$routes->post('/admin/reports/time', 'Admin\ReportsController::time');


/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
