<?php
$host = 'localhost';
$user = 'cs3878';
$password = 't1FacAI4LCe0dbDm';
$database = 'cs3878_db';

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
