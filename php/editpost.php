<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'conn.php';
	session_start();

	if (isset($_SESSION['ID'])) {
		$profilID = $_SESSION['ID'];
	}
	else
	{
		header("Location: ../bejelentkezes");
		exit();
	}

if (isset($_POST['submit_gomb'])) {
	
	$postID = $_POST['postid'];
	$cim = $_POST['hirdetes_cime'];
	$allat_kat = $_POST['allat_kategoriaja'];
	$allat_fele = $_POST['allat_fele'];
	$allat_fajtaja = $_POST['allat_fajtaja'];
	$allat_kora = $_POST['allat_kora'];
	$allat_neme = $_POST['allat_neme'];
	$allat_szine = $_POST['allat_szine'];
	$allat_ara = $_POST['allat_ara'];
	$allat_kepek = '';
	$allat_leiras = $_POST['allat_leiras'];
	$tenyeszto_nev = $_POST['tenyeszto_nev'];
	$tenyeszto_email = $_POST['tenyeszto_email'];
	$tenyeszto_telefon = $_POST['tenyeszto_telefon'];
	$lokacio = $_POST['lokacio'];

	if(isset($_FILES['kep_input']['name']) && is_array($_FILES['kep_input']['name'])) {
    $fileCount = count($_FILES['kep_input']['name']);
    
    	if($fileCount > 5) {
    	header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=filecount");
		exit();
    	}
    	else
    	{
    		$allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
    		$maxFileSize = 7 * 1024 * 1024; // 7 Megabyte
    
    			foreach ($_FILES['kep_input']['name'] as $key => $imageName) {
       				$tempFileName = $_FILES['kep_input']['tmp_name'][$key];
        			$fileSize = $_FILES['kep_input']['size'][$key];
        			$fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        
        				if (!in_array($fileExtension, $allowedExtensions)) {
            				header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=wrongfile");
							exit();
        				} 
        				elseif ($fileSize > $maxFileSize) {
            				header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=filesize");
							exit();
        				} 
        				else {
            				
            				$fileError = $_FILES['kep_input']['error'][$key];
            					if ($fileError == 0) {
                					$fileNewName = uniqid('', true) . ".webp";
                					$fileDestination = '../files/' . pathinfo($fileNewName, PATHINFO_FILENAME) . '.webp';

                						if ($fileExtension !== 'webp') {
                   							$image = imagecreatefromstring(file_get_contents($tempFileName));
                   							imagewebp($image, $fileDestination);
                    						imagedestroy($image);
                						}
                						move_uploaded_file($tempFileName, $fileDestination);               
               							$allat_kepek = $allat_kepek . $fileNewName . ',';
        						}
    						}
    			}
    	}
    }


    $sqlSelectImages = "SELECT * FROM posts WHERE ID = $postID";
	$result = $conn->query($sqlSelectImages);
	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();
		$imageNames = $row['kepek'];

		    if ($imageNames) {

		        $imageNamesArray = explode(',', $imageNames);

		        $filesDirectory = "../files/";
			        foreach ($imageNamesArray as $imageName) {

			        	if ($imageName != null) {	

				            $filePath = $filesDirectory . $imageName;
					            if (file_exists($filePath)) {

					                unlink($filePath);
					            }
					         }
			        }
		    }
	}	


$update_sql = "UPDATE posts SET cim=?, allat_kat=?, allat_fele=?, allat_fajta=?, allat_kora=?, allat_neme=?, allat_szine=?, allat_ara=?, kepek=?, allat_leiras=?, teny_nev=?, teny_email=?, teny_tel=?, teny_cim=? WHERE ID=?";
$update_stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($update_stmt, $update_sql)) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

mysqli_set_charset($conn, "utf8");
mysqli_stmt_bind_param($update_stmt, "sssssssssssssss", $cim, $allat_kat, $allat_fele, $allat_fajtaja, $allat_kora, $allat_neme, $allat_szine, $allat_ara, $allat_kepek, $allat_leiras, $tenyeszto_nev, $tenyeszto_email, $tenyeszto_telefon, $lokacio, $postID);
mysqli_stmt_execute($update_stmt);
mysqli_stmt_close($update_stmt);

	header("Location: ../Kezelopult/hirdetesek_kezelese?error=nonee");
	exit();

}
else
{
	header("Location: ../Kezelopult/hirdetesek_kezelese?error=error");
	exit();
}