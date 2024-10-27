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
$route['manualbook'] = 'dashboard/manualbook';
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

$route['aspek'] = 'setting/aspek';
$route['aspek/edit/(:any)'] = 'setting/edit_aspek/$1';
$route['aspek-update/(:num)'] = 'setting/update_aspek/$1';

$route['aset-lahan'] = 'setting/asetlahan';
$route['asetlahan/edit/(:any)'] = 'setting/edit_asetlahan/$1';
$route['asetlahan-update/(:num)'] = 'setting/update_asetlahan/$1';

$route['instansi-pelaksana'] = 'setting/instansipelaksana';
$route['instansipelaksana/edit/(:any)'] = 'setting/edit_instansipelaksana/$1';
$route['instansipelaksana-update/(:num)'] = 'setting/update_instansipelaksana/$1';

$route['isu-lingkungan'] = 'setting/isulingkungan';
$route['isulingkungan/edit/(:any)'] = 'setting/edit_isulingkungan/$1';
$route['isulingkungan-update/(:num)'] = 'setting/update_isulingkungan/$1';

$route['kelurahan'] = 'setting/kelurahan';
$route['kelurahan/edit/(:any)'] = 'setting/edit_kelurahan/$1';
$route['kelurahan-update/(:num)'] = 'setting/update_kelurahan/$1';

$route['lingkup-pekerjaan'] = 'setting/pekerjaan';
$route['pekerjaan/edit/(:any)'] = 'setting/edit_pekerjaan/$1';
$route['pekerjaan-update/(:num)'] = 'setting/update_pekerjaan/$1';

$route['program'] = 'setting/program';
$route['program/edit/(:any)'] = 'setting/edit_program/$1';
$route['program-update/(:num)'] = 'setting/update_program/$1';

$route['rw'] = 'setting/rw';
$route['rw/edit/(:any)'] = 'setting/edit_rw/$1';
$route['rw-update/(:num)'] = 'setting/update_rw/$1';

$route['sumber-pendanaan'] = 'setting/sumberpendanaan';
$route['sumberpendanaan/edit/(:any)'] = 'setting/edit_sumberpendanaan/$1';
$route['sumberpendanaan-update/(:num)'] = 'setting/update_sumberpendanaan/$1';