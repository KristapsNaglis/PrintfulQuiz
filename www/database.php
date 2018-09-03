<?php

//Create connection credentials
$db_host = 'localhost';
$db_name = 'printful-quiz';
$db_user = 'root';
$db_password = '';

//Create mySqli object
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

//Error handler
if ($mysqli->connect_error) {
    printf("Connect failed: $s\n, $mysqli->connect_error");
    exit();
}