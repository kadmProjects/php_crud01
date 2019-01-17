<?php

$servername = 'localhost';
$username = 'root';
$password = '123456';

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
	die('Connection failed: '. mysqli_connect_error());
}


