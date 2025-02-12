<?php

$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "ojt_db";
$connection  = "";



$connection = mysqli_connect($db_server, $db_username, $db_password, $db_name);

if ($connection->connect_error) {
    die("Connection failed: " . $connection ->connect_error);
  } 

?>