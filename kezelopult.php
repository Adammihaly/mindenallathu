<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mindenállat.hu | Kezelőpult</title>
	<link rel="stylesheet" type="text/css" href="css/kezelopult.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">

</head>
<body>

<?php
require_once 'config.php';
require_once 'php/functions.inc.php';
require_once 'auth.php';



authenticateUser($client, $conn);


if (!isset($_SESSION['user_token'])) {
	header("Location: bejelentkezes");
	exit();
}


?>

<a href="php/logout.php">Kijelentkezes</a>


</body>
</html>