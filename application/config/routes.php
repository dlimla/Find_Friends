<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//-----------standard routes ---------------

$route['default_controller'] = 'LoginRegCtrl';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//----------- register routes --------------

$route['register'] = 'LoginRegCtrl/regValidation';

$route['regToLogin'] = 'LoginRegCtrl/regToLogin';

//------------- login routes --------------

$route['login'] = 'LoginRegCtrl/loginValidation';

$route['logOffUser'] = 'LoginRegCtrl/logOffUser';

//---------------------------------
$route['remove/(:any)'] = 'FriendsCtrl/removeFriend/$1';

$route['show/(:any)'] = 'FriendsCtrl/showProfile/$1';
$route['home'] = 'FriendsCtrl';

