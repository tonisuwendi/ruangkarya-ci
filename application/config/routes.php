<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['administrator/categories/add'] = 'administrator/add_categories';
$route['administrator/category/(:num)'] = 'administrator/edit_categories/$1';
$route['administrator/category/(:num)/delete'] = 'administrator/delete_category/$1';
$route['administrator/projects/add'] = 'administrator/add_projects';