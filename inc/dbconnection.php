<?php
/* CREATE A VALID DATABASE CONNECTION */

$mysql_host = 'mysql.hostinger.nl';
$mysql_dbname = 'u303290623_db';
$mysql_user = 'u303290623_user';
$mysql_pass = 'U;vRF4Cv+8En';

$db = new PDO('mysql:host='. $mysql_host.';dbname='.$mysql_dbname.';charset=utf8mb4', $mysql_user, $mysql_pass);

// print MySQL version
// $statement = $db->query('SELECT version();');
// foreach($statement as $row) {
//     print_r($row);
// }

// $statement = $db->query('SELECT * from users;');
// foreach($statement as $row) {
//     print_r($row);
// }