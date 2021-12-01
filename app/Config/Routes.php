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
$routes->setDefaultController('Student');
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
$routes->get('/', 'Student::index');
$routes->get('generateQR', 'QRCodeGenerator::generate');
$routes->post('signin', 'Student::signin');

$routes->group('signup', function($routes){
    $routes->get('/', 'Student::signup');
    $routes->post('submit', 'Student::register');
});

$routes->get('signout', 'Student::signout');
$routes->get('home', 'Home::index', ['filter' => 'auth']);
$routes->get('about', 'Home::about', ['filter' => 'auth']);
$routes->get('poll', 'Poll::index', ['filter' => 'auth']);
$routes->get('vote', 'Vote::index', ['filter' => 'auth']);
$routes->post('vote/register_vote', 'Vote::registerVote', ['filter' => 'auth']);
$routes->get('vote/form/(:any)', 'Vote::voteForm/$1', ['filter' => 'auth']);

$routes->group('account', ['filter' => 'auth'], function($routes){
    $routes->get('/', 'Account::index');
    $routes->post('update_image', 'Account::updatePic');
    $routes->get('disp_name', 'Account::displayNameModal');
    $routes->get('disp_sex', 'Account::displaySexModal');
    $routes->get('disp_email', 'Account::displayEmailModal');
    $routes->get('disp_class', 'Account::displayClassModal');
    $routes->get('disp_uname', 'Account::displayUnameModal');
    $routes->post('update_name', 'Account::updateName');
    $routes->post('update_sex', 'Account::updateSex');
    $routes->post('update_email', 'Account::updateEmail');
    $routes->post('update_class', 'Account::updateClass');
    $routes->post('update_uname', 'Account::updateUname');
});

$routes->group('admin', function($routes){
    $routes->get('/', 'Admin::index');
    $routes->post('signin', 'Admin::signin');
    $routes->get('logout', 'Admin::logout');
    $routes->group('position', ['filter' => 'adminauth'],function($routes){
        $routes->get('/', 'Position::index');
        $routes->get('new', 'Position::displayAddPosition');
        $routes->post('edit', 'Position::displayEditPosition');
        $routes->post('confirm_delete', 'Position::displayDeletePosition');
        $routes->post('save', 'Position::create');
        $routes->post('update', 'Position::update');
        $routes->post('delete', 'Position::delete');
    });
    $routes->group('candidate', ['filter' => 'adminauth'],function($routes){
        $routes->get('/', 'Candidate::index');
        $routes->get('new', 'Candidate::displayAddCandidate');
        $routes->post('edit', 'Candidate::displayEditCandidate');
        $routes->post('confirm_delete', 'Candidate::displayDeleteCandidate');
        $routes->post('save', 'Candidate::create');
        $routes->post('update', 'Candidate::update');
        $routes->post('delete', 'Candidate::delete');
    });
    $routes->group('poll', ['filter' => 'adminauth'],function($routes){
        $routes->get('/', 'Poll::summary');
    });
});

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
