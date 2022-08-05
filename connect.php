<?php
$server   = 'localhost';
$username = 'root';
$password = '';
$database = 'db_tugasweb';

$conn = new mysqli($server, $username, $password, $database);

if($conn->connect_error)
{
	die('GAGAL TERHUBUNG'. $conn->connect_error);
}

?>