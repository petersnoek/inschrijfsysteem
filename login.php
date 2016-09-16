<?php 

require_once 'inc/session.php';		// start session
require_once 'inc/user_helpers.php';
require_once 'inc/blade.php';		// create $blade 
require_once 'inc/errors.php';		// take from $_SESSION['errors'], clear session, and store in $errors


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