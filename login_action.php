<?php

require_once 'inc/session.php';
require_once 'inc/dbconnection.php';
require_once 'inc/user_helpers.php';

// redirect back to login with error if user didn't enter email
if ( empty($_POST['email']) ) {
	$_SESSION['errors'][] = 'Fout: geen e-mail ingevuld.';
}

// redirect back to login with error if user didn't enter pass
if ( empty($_POST['pass']) ) {
	$_SESSION['errors'][] = 'Fout: geen wachtwoord ingevuld.';
}

// check if user can be found
if (empty($_SESSION['errors'])) $resultarray = CheckUserIsValid($db, $_POST['email'], $_POST['pass']);

if ( $resultarray['result'] == 1 ) {
	LoginSession($resultarray['userId'], $resultarray['userEmail'], $resultarray['displayName']);

	// als gebruiker heeft aangevinkt "onthou mij", bewaar userId en userName dan in cookie
	if ( isset($_POST['remember']) && $_POST['remember'] == "checked") {
		RememberCookie($resultarray['userId'], $resultarray['userEmail'], $resultarray['displayName']);
	}

	header('Location: main.php');
	exit;	
}
else
{
	$_SESSION['errors'][] = 'Fout: combinatie van e-mail en wachtwoord niet gevonden, of account niet actief.';
	header('Location: login.php');
	exit;
}
