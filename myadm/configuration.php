<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');    // MySQL server hostname
define('DB_USERNAME', 'root');    // MySQL username
define('DB_PASSWORD', '');   // MySQL password
define('DB_NAME', 'inflbrand');   // MySQL database name
define('DB_PORT', 3308);   // MySQL port number 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
