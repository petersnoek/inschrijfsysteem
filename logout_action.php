<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';
require 'inc/user_helpers.php';

// redirect back to login with error if user didn't enter email
if ( isset($_SESSION['userId'])==false || empty($_SESSION['userId']) ) {
	$_SESSION['userId'] = null;
	$_SESSION['userEmail'] = null;	
	unset($_SESSION['userId']);
	unset($_SESSION['userEmail']);	
	header('Location: login.php');
	exit;	
}
else
{
	$_SESSION['errors'][] = 'Fout: kan niet uitloggen, er is geen gebruiker ingelogd.';
	header('Location: login.php');
	exit;	
}
