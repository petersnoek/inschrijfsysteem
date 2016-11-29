<?php 

require_once 'inc/session.php';
require_once 'inc/blade.php';


// tell blade to create HTML from the template "login.blade.php"
// get errors from session
if ( isset ($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = array();	// remove all errors
}
echo $blade->view()->make('main')->withErrors($errors)->render();