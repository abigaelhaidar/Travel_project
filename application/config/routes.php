<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route untuk login admin
// Auth
$route['login'] = 'Auth';
$route['logout'] = 'Auth/logout';
$route['dashboard'] = 'Admin';

// Route untuk halaman paket wisata admin
$route['paket_wisata'] = 'Admin/paket_wisata';

// wisata user
$route['destinasi-karimunjawa'] = 'Home/destinasi_karimunjawa';


$route['detail-paket/(:num)'] = 'Home/detail_paket/$1';

$route['admin/itinerary/(:num)'] = 'admin/itinerary/$1';
$route['admin/add_itinerary/(:num)'] = 'admin/add_itinerary/$1';
$route['admin/edit_itinerary/(:num)'] = 'admin/edit_itinerary/$1';
$route['admin/delete_itinerary/(:num)'] = 'admin/delete_itinerary/$1';

$route['booking_paket'] = 'home/booking_paket'; // Form booking wisata
$route['booking_paket/simpan'] = 'home/simpan_pesanan'; // Proses simpan booking
$route['admin/pesanan'] = 'admin/pesanan_wisata'; // Daftar pesanan wisata di admin
$route['data_booking_paket'] = 'admin/data_booking_paket';


