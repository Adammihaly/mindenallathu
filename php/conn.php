<?php

$serverName = 'mysql.omega:3306 ';
$dBUsername = 'mindenallathu';
$dBPassword = 'MindenAllatHu15';
$dBName = 'mindenallathu';

	$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

	if (!$conn) {
		die("Conection failed: " . mysqli_connect_error());
	}