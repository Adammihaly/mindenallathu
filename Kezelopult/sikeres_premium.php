<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sikeres_premiumStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <title>Document</title>
</head>
<body>


<?php

session_start();

    if (isset($_SESSION['ID'])) {
            $profilID = $_SESSION['ID'];
        }
        else
        {
            header("Location: ../bejelentkezes");
            exit();
        }

?>


    <div class="wrapper">
        <span>Gratulálunk! Ön innentől prémium felhasználó!</span>
        <div class="elofizetes">
            <p>Premium előfizető</p>
        </div>
        <button>Vissza a kezelőpultra</button>
    </div>
</body>
</html>