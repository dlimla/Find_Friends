<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//---------------standard routes -----------------------

$route['default_controller'] = 'loginRegCtrl';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//---------------- register routes ---------------------

//this route takes the user to the successful controller which inserts the data into the database
$route['register'] = 'loginRegCtrl/regValidation';

//then when the user pushes "log in" this route takes the userto log in as a new user to log in
$route['regToLogin'] = 'loginRegCtrl/regToLogin';

//------------------ login routes ----------------------

//this route sends the post data from the main page to the loginvalidation method to check if the user is in the system
$route['login'] = 'loginRegCtrl/loginValidation';

$route['logOffUser'] = 'loginRegCtrl/logOffUser';

//------------------------------------------------------


