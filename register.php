<?php 

require_once 'inc/session.php';			// start session
require_once 'inc/user_helpers.php';	// helper functions
require_once 'inc/blade.php';			// creates $blade 


if ( IsLoggedInSession()==true ) {
	// stuur direct door naar main pagina
	$_SESSION['errors'][] = "Je bent al ingelogd, klik <a href='main.php'>hier</a> om direct door te gaan.";
}

// get errors from session
if ( isset ($_SESSION['errors'])) {
	$errors = $_SESSION['errors'];
	$_SESSION['errors'] = array();	// remove all errors
}

echo $blade->view()->make('register')->withErrors($errors)->render();
