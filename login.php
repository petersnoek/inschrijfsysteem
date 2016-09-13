<?php 

require_once 'inc/session.php';
require_once 'inc/user_helpers.php';


// configure blade engine
require 'vendor/autoload.php';
use Philo\Blade\Blade;
$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new Blade($views, $cache);

// if session contains errors, copy them to $errors variable
if ( isset ($_SESSION['errors'])) {
	$errors = $_SESSION['errors'];
	$_SESSION['errors'] = array();	// remove all errors
}

if ( IsLoggedInSession()==true ) {
	// stuur direct door naar main pagina
	header('location: main.php');
	exit;
}
else
{
	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('login')->withErrors($errors)->render();
}