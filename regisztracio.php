<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindenállat - Regisztráció</title>
    <link rel="stylesheet" href="css/reg.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>

    <?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once 'config.php';
    require_once 'php/functions.inc.php';
    require_once 'php/conn.php';


    if (isset($_GET['error'])) {
        if ($_GET['error'] == "pwdnm") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('A regisztráció sikertelen volt, mivel nem eggyezik a két jelszó. Kérlek próbáld újra.')) document.location = 'regisztracio';
            else(document.location = 'regisztracio')
        </script> ";
        }
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "wrongemail") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('A regisztráció sikertelen volt, mivel egy nem létező email cíet használtál. Kérlek próbáld újra.')) document.location = 'regisztracio';
            else(document.location = 'regisztracio')
        </script> ";
        }
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "uidEx") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('A regisztráció sikertelen volt, mivel ez a felhasználónév vagy email cím már használatban van. Kérlek próbáld újra.')) document.location = 'regisztracio';
            else(document.location = 'regisztracio')
        </script> ";
        }
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "problem") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('Rendszerhiba lépett fel. Kérlek próbáld újra.')) document.location = 'regisztracio';
            else(document.location = 'regisztracio')
        </script> ";
        }
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "stmtfailed") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('Rendszerhiba lépett fel. Kérlek próbáld újra.')) document.location = 'regisztracio';
            else(document.location = 'regisztracio')
        </script> ";
        }
    }

    ?>



    <div class="container">
        <div class="container-register" >
            <span class="register-title">Regisztráció</span>
            <form action="php/register.php" method="POST">
                <div class="input-box">
                    <label for="username" class="input-title">Felhasználónév :</label>
                    <input type="text" id="username" name="felhasznalonev" placeholder="Felhasználónév" class="input" minlength="4" maxlength="40">
                </div>


                <div class="input-box">
                <label for="email" class="input-title">Email :</label>
                <input required type="email" id="email" name="email" placeholder="E-mail cím" class="input" minlength="7" maxlength="50">
                </div>

                <div class="input-box">
                    <label for="email" class="input-title">Jelszó :</label>
                    <input required type="password" id="password" name="pwd" placeholder="Jelszó" class="input" minlength="6" maxlength="40">
                    </div>

                    <div class="input-box">
                        <label for="email" class="input-title">Jelszó ismét :</label>
                        <input required type="password" id="password" name="pwds" placeholder="Jelszó" class="input" minlength="6" maxlength="40">
                        </div>
                    <p class="input-fiok">Van már fiókod?
                        <a href="bejelentkezes" class="input-box-link reset-pw">Jelentkezz be!</a>
                    </p>
                    
            
            <div class="input-aszf">
                <input type="checkbox" required>
                <p>Elolvastam és elfogadtam az <a href="pdf/adatvedelminyilatkozat.pdf" class="input-box-link" aria-required="true">adatvédelmi nyilatkozatot</a> és az
                    <a href="pdf/ASZF.pdf" class="input-box-link" aria-required="true">Általános Szerződési Feltételeket</a>
                </p>
            </div> 


            <div class="input-socials">
                        <a href="<?php echo "" . $client->createAuthUrl() . ""; ?>" class="input-google" style="text-decoration: none;">
                            <img src="./img/icons8-google-50.png">
                            <p>Bejelentkezés Google fiókkal</p>
                        </a>
                        <a href="#" class="input-facebook" style="text-decoration: none; color: white;">
                            <img src="./img/icons8-facebook-50.png">
                            <p>Bejelentkezés Facebookal</p>
                        </a>
                    </div>

            <div class="input-button">
                <button name="sub">Regisztráció</button>
            </div>
            </form>
        </div>
        <div class="container-picture"></div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>