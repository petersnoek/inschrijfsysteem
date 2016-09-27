<?php 

require_once 'inc/session.php';
require_once 'inc/blade.php';
require_once 'inc/dbconnection.php';	// geeft mij een $db variabele, een werkende PDO verbinding

// haal events uit de database mbv PDO
$statement = $db->prepare('SELECT * FROM events;');
$statement->execute();
$countrows = $statement->rowCount();
$events = $statement->fetchAll(PDO::FETCH_ASSOC);

// tell blade to create HTML from the template "login.blade.php"
require_once 'inc/errors.php';
echo $blade->view()->make('events')
	->with('events', $events)
	->withErrors($errors)->render();