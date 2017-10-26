<?php
/**
@author vetripandi
@copyright http:www.vetbossel.in
 */

require_once 'messages.php';

//site specific configuration declartion
define( 'BASE_PATH', 'http://localhost/php-quiz/');
define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'u179258046_adm');
define( 'DB_PASSWORD', '5k3z8tnMe17u');
define( 'DB_NAME', 'u179258046_bd');

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
