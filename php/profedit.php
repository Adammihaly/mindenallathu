<?php

error_reporting(0);
ini_set('display_errors', 0);

require_once 'conn.php';
require_once 'functions.inc.php';
	session_start();

if (isset($_POST['sub'])) {
	
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];

	if (!isset($_SESSION['ID'])) {
		header("Location: ../bejelentkezes");
		exit();
	}
	else
	{
		$profilID = $_SESSION['ID'];
		$felhasznalonev = $_SESSION['Felhasznalonev'];
	}

		if ($felhasznalonev != $name) {
			if (uidLetezikk($conn, $name) !== false) {

			header("Location: ../Kezelopult/profil_modositasa?error=uidExists");
			exit();

			}
		}	


		$pwdsecound = password_hash($pwd, PASSWORD_DEFAULT);

			$sql = "UPDATE users SET username = '$name', pwd = '$pwdsecound' WHERE ID = '$profilID';";
			$result = $conn->query($sql);

			header("location: ../Kezelopult/profil_modositasa?error=none") ;
			exit();


}
else
{
	header("Location: ../Kezelopult/profil_modositasa?error=set");
	exit();
}