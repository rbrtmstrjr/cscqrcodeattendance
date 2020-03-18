<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['render/(:any)'] = 'render/view/$1';
$route['default_controller'] = 'Students';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
