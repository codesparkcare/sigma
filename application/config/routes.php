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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Public Dedicated Pages
$route['about'] = 'welcome/about';
$route['services'] = 'welcome/services';
$route['service/(:num)'] = 'welcome/service_detail/$1';
$route['projects'] = 'welcome/projects';
$route['project/(:num)'] = 'welcome/project_detail/$1';
$route['contact'] = 'welcome/contact';

// Admin Routes
$route['admin'] = 'admin/index';
$route['admin/about'] = 'admin/about';
$route['admin/contact_settings'] = 'admin/contact_settings';
$route['admin/sliders'] = 'admin/sliders';
$route['admin/add_slider'] = 'admin/add_slider';
$route['admin/edit_slider/(:num)'] = 'admin/edit_slider/$1';
$route['admin/delete_slider/(:num)'] = 'admin/delete_slider/$1';
$route['admin/toggle_slider/(:num)'] = 'admin/toggle_slider/$1';

$route['admin/services'] = 'admin/services';
$route['admin/add_service'] = 'admin/add_service';
$route['admin/edit_service/(:num)'] = 'admin/edit_service/$1';
$route['admin/delete_service/(:num)'] = 'admin/delete_service/$1';
$route['admin/toggle_service/(:num)'] = 'admin/toggle_service/$1';

$route['admin/projects'] = 'admin/projects';
$route['admin/add_project'] = 'admin/add_project';
$route['admin/edit_project/(:num)'] = 'admin/edit_project/$1';
$route['admin/delete_project/(:num)'] = 'admin/delete_project/$1';
$route['admin/toggle_project/(:num)'] = 'admin/toggle_project/$1';
$route['admin/toggle_project_featured/(:num)'] = 'admin/toggle_project_featured/$1';

$route['admin/reviews'] = 'admin/reviews';
$route['admin/add_review'] = 'admin/add_review';
$route['admin/edit_review/(:num)'] = 'admin/edit_review/$1';
$route['admin/delete_review/(:num)'] = 'admin/delete_review/$1';
$route['admin/toggle_review/(:num)'] = 'admin/toggle_review/$1';

$route['admin/enquiries'] = 'admin/enquiries';
$route['admin/update_enquiry_status/(:num)'] = 'admin/update_enquiry_status/$1';
$route['admin/delete_enquiry/(:num)'] = 'admin/delete_enquiry/$1';
