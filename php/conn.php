<?php

$serverName = 'localhost';
$dBUsername = 'root';
$dBPassword = '';
$dBName = 'mindenallat';

	$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

	if (!$conn) {
		die("Conection failed: " . mysqli_connect_error());
	}

try {
    $pdo = new PDO("mysql:host=$serverName;dbname=$dBName;charset=utf8", $dBUsername, $dBPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}