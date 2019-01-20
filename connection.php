<?php

$servername = 'localhost';
$username = 'root';
$password = '123456';
$database = "php_crud01";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
	die('Connection failed: '. mysqli_connect_error());
}


