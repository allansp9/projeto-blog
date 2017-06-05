<?php
defined('BASEPATH') OR exit('No direct script access allowed');




$route['filmes/update'] = 'filmes/update';
$route['filmes/create'] = 'filmes/create';
$route['filmes/(:any)'] = 'filmes/view/$1';
$route['filmes'] = 'filmes/index';

$route['listas/create'] = 'listas/create';
$route['listas'] = 'listas/index';
$route['listas/filmes/(:any)'] = 'listas/filmes/$1';

$route['default_controller'] = 'filmes';

$route['(:any)'] = 'filmes/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
