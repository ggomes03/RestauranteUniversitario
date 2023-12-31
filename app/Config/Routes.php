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
$routes->get('login', 'Login::index');
$routes->post('authentication', 'Login::auth');
$routes->get('register', 'Login::register');
$routes->post('signup', 'Login::signup');
$routes->get('logout', 'Login::logout');

$routes->get('prad', 'Prad::index');

$routes->get('createTickets', 'Tickets::index');
$routes->get('defineQuantitiesView', 'Tickets::defineQuantitiesView');
$routes->post('defineQuantities', 'Tickets::defineQuantities');
$routes->get('createTickets', 'Tickets::index');
$routes->post('createSale', 'Tickets::createSale');
$routes->post('insertTickets', 'Tickets::insertTickets');
$routes->get('sale', 'Tickets::sale');
$routes->get('validateTicket', 'Tickets::validateTicketsView');
$routes->post('validate', 'Tickets::validateTicket');

$routes->get('student', 'Student::index');
$routes->get('buytickets', 'Student::buytickets');
$routes->post('buy', 'Student::buy');
$routes->get('extract', 'Student::extract');

$routes->get('ticketsTest', 'Tests\TicketsTest::index');

$routes->get('answerform', 'Forms::answerform');
$routes->post('answerform', 'Student::index');

$routes->get('feedback', 'Feedback::feedbackview');
// Rota para o menu
$routes->get('menu', 'ProcessarMenu::index');
$routes->post('processaMenu', 'ProcessarMenu::processaMenu');

$routes->get('report', 'Prad::report');

$routes->get('users', 'Users::index');

$routes->get('setAdm/(:num)', 'Users::setAdm/$1');
$routes->get('setStudent/(:num)', 'Users::setStudent/$1');
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
