<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';
require 'inc/user_helpers.php';

// redirect back to login with error if user didn't enter email
if ( empty($_POST['email']) ) {
	$_SESSION['errors'][] = 'Fout: geen e-mail ingevuld.';
}

// redirect back to login with error if user didn't enter pass
if ( empty($_POST['pass']) ) {
	$_SESSION['errors'][] = 'Fout: geen wachtwoord ingevuld.';
}

// check if user can be found
if (empty($_SESSION['errors'])) $result = CheckUserIsValid($db, $_POST['email'], $_POST['pass']);

if ( $result == 1 ) {
	LoginSession($userId, $_POST['email']);
	header('Location: main.php');
	exit;	
}
else
{
	$_SESSION['errors'][] = 'Fout: combinatie van e-mail en wachtwoord niet gevonden, of account niet actief.';
	header('Location: login.php');
	exit;
}
