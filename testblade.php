<?php 

// load neccesary files
require 'vendor/autoload.php';
use Philo\Blade\Blade;

// configure blade engine
$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';
$blade = new Blade($views, $cache);

// pass data
$vars = [
	'name' => 'Samantha', 
	'address' => 'Mijn nieuwe adres',
	'products' => [ 'pname' => 'Fatboy Lamzac', 'pname' => 'BigBag' ]
];

// output everything
echo $blade->view()->make('layout')->with($vars)->render();