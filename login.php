<?php 

require_once 'inc/session.php';			// start session
require_once 'inc/user_helpers.php';	// helper functions
require_once 'inc/blade.php';			// creates $blade 


if ( IsLoggedInSession()==true ) {
	// stuur direct door naar main pagina
	header('location: main.php');
	exit;
}
else
{
	// haal errors op uit $_SESSION['errors'] en stop in $errors variabele
	require_once 'inc/errors.php';		// take from $_SESSION['errors'], clear session, and store in $errors

	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('login')->withErrors($errors)->render();
}