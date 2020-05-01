<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['search'] = 'home/search';
$route['project/(:any)'] = 'project/index/$1';
$route['categories/(:any)'] = 'categories/index/$1';
$route['administrator/categories/add'] = 'administrator/add_categories';
$route['administrator/category/(:num)'] = 'administrator/edit_categories/$1';
$route['administrator/category/(:num)/delete'] = 'administrator/delete_category/$1';
$route['administrator/projects/add'] = 'administrator/add_projects';
$route['administrator/project/(:num)'] = 'administrator/edit_projects/$1';
$route['administrator/project/(:num)/delete'] = 'administrator/delete_project/$1';
$route['administrator/setting/logo'] = 'administrator/logo_setting';
$route['administrator/setting/favicon'] = 'administrator/favicon_setting';
$route['administrator/setting/banner'] = 'administrator/banner_setting';
$route['administrator/setting/text'] = 'administrator/text_setting';