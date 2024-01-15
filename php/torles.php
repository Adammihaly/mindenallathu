<?php

if (isset($_POST['del'])) {
	
	$postID = $_POST['postid'];

	error_reporting(0);
ini_set('display_errors', 0);

session_start();
require_once 'conn.php';

    if (isset($_SESSION['ID'])) {
            $profilID = $_SESSION['ID'];
        }
        else
        {
            header("Location: ../bejelentkezes");
            exit();
        }

        $sql = "UPDATE posts SET torolve = 1 WHERE ID = $postID";
	mysqli_query($conn, $sql);


		$sql = "SELECT * FROM users WHERE ID = $profilID;";
	$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {

			$posts = $row['posts'];
		}


	$posts = $posts - 1;

	$sql = "UPDATE users SET posts = '$posts' WHERE ID = $profilID";
	mysqli_query($conn, $sql);

	header("Location: ../Kezelopult/hirdetesek_kezelese?error=noned");
		exit();

}
else
{
	header("Location: ../kezelopult/hirdetesek_kezelese");
	exit();
}