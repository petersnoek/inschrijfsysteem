<?php 

require_once 'inc/session.php';			// start session
require_once 'inc/user_helpers.php';	// helper functions
require_once 'inc/blade.php';			// creates $blade 


if ( IsLoggedInSession()==true ) {
	// stuur direct door naar main pagina
    $_SESSION['errors'][] = "U bent al ingelogd!";
	header('location: main.php');
	exit;
}
else
{
	// get errors from session
	if ( isset ($_SESSION['errors'])) {
		$errors = $_SESSION['errors'];
		$_SESSION['errors'] = array();	// remove all errors
	}
	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('login')->withErrors($errors)->render();
}