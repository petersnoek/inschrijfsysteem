<?php

require_once 'inc/session.php';
require 'inc/dbconnection.php';
require 'inc/user_helpers.php';

// logout the user
LogOut();
header('Location: login.php');
exit;	

