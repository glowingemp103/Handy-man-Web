<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Home');
$routes->get('/aboutUs', 'AboutUs');

$routes->get('/handymanService', 'HandymanService');
$routes->get('/electricianService', 'ElectricianService');
$routes->get('/plumbingService', 'PlumbingService');
$routes->get('/repairService', 'RepairService');
$routes->get('/acMaintenance', 'AcMaintenance');
$routes->get('/carPenter', 'CarPenter');


$routes->get('/company', 'Company');
$routes->get('/teamMember', 'TeamMember');
$routes->get('/portfolio', 'Portfolio');
$routes->get('/pricingPlan', 'PricingPlan');
$routes->get('/faq', 'Faq');
$routes->get('/contactUs', 'ContactUs');
$routes->get('/getQuote', 'GetQuote');

$routes->post('contactUs/sendMessage', 'ContactUs::sendMessage');
// $routes->post('api/contactUs/sendMessage', 'ContactUs::sendMessage');
// $routes->post('contactUs/sendMessage', 'ContactUs::sendMessage');


