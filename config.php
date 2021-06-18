<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '12345');
define('DB_NAME', 'examcomplaints');
 
/* Attempt to connect to MySQL database */
$dbconnected = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($dbconnected === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}
?>