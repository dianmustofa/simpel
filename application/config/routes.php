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

$route['home'] = 'home/index';
$route['home/details/(:any)'] = 'home/details/$1';

$route['login'] = 'auth';
$route['tambah-akun'] = 'auth/user_add';
$route['profile'] = 'auth/profile';

$route['dashboard'] = 'dashboard/index';
$route['tentang'] = 'dashboard/tentang';
$route['literasi'] = 'dashboard/literasi';
$route['user'] = 'dashboard/user';

$route['isu'] = 'perencanaan/isu';
$route['isu/review/(:any)'] = 'perencanaan/isu_review/$1';
$route['isu/simpan'] = 'perencanaan/simpan';
$route['isu/edit/(:any)'] = 'perencanaan/edit/$1';
$route['isu-update/(:num)'] = 'perencanaan/update/$1';

$route['usulan'] = 'usulan/index';
$route['usulan-simpan/(:num)'] = 'usulan/simpan/$1';
$route['usulan/review/(:any)'] = 'usulan/usulan_review/$1';
$route['usulan/update_setuju_ajax'] = 'usulan/update_setuju_ajax';
$route['usulan/edit/(:any)'] = 'usulan/edit/$1';
$route['usulan-update/(:num)'] = 'usulan/update/$1';

$route['verifikasi-usulan'] = 'usulan/verifikasi';
$route['verifikasi-simpan/(:num)'] = 'usulan/simpan_verifikasi/$1';
$route['verifikasi/detail/(:any)'] = 'usulan/verifikasi_detail/$1';
$route['verifikasi/review/(:any)'] = 'usulan/verifikasi_review/$1';
$route['verifikasi/edit/(:any)'] = 'usulan/verifikasi_edit/$1';
$route['verifikasi-update/(:num)'] = 'usulan/verifikasi_update/$1';

$route['monitoring'] = 'monitoring/index';
$route['monitoring/review/(:any)'] = 'monitoring/monitoring_review/$1';
$route['monitoring-simpan/(:num)'] = 'monitoring/simpan/$1';
$route['monitoring/edit/(:any)'] = 'monitoring/edit/$1';
$route['monitoring-update/(:num)'] = 'monitoring/update/$1';

$route['laporan-tahunan'] = 'laporan/index';
$route['laporan/edit/(:any)'] = 'laporan/edit/$1';
$route['laporan-update/(:num)'] = 'laporan/update/$1';