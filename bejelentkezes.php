<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindenállat - Bejelentkezés</title>
    <link rel="stylesheet" href="css/reg.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>


    <?php

    require_once 'config.php';
    require_once 'fconfig.php';
    require_once 'php/functions.inc.php';
    require_once 'auth2.php';
    require_once 'php/conn.php';

    authenticateFacebookUser($fb, $fb_helper, $accessToken, $conn);


  // replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used
  $fb_login_url = $fb_helper->getLoginUrl('http://localhost/allat/bejelentkezes', $permissions);


    if (isset($_GET['error'])) {
        if ($_GET['error'] == "notv") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('A bejelentkezés sikertelen volt, mivel nincs hitelesítve a megadott fiók. Kérlek próbáld újra.')) document.location = 'bejelentkezes';
            else(document.location = 'bejelentkezes')
        </script> ";
        }
    }
    if (isset($_GET['true'])) {
        if ($_GET['true'] == "t") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('A regisztráció sikeres volt. Mostmár be tudsz jelentkezni.')) document.location = 'bejelentkezes';
            else(document.location = 'bejelentkezes')
        </script> ";
        }
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "wronguser") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('Nem megfelelő bejelentkezési adatok. Kérlek próbáld újra.')) document.location = 'bejelentkezes';
            else(document.location = 'bejelentkezes')
        </script> ";
        }
    } 
    ?>


    <div class="container">
        <div class="container-register" >
            <span class="register-title">Bejelentkezés</span>
            <form action="./php/login.php" method="POST">
                <div class="input-box">
                    <label for="username" class="input-title">Felhasználónév vagy email:</label>
                    <input type="text" id="username" name="username" placeholder="Felhasználónév vagy Email" class="input">
                </div>

                <div class="input-box">
                    <label for="email" class="input-title">Jelszó :</label>
                    <input required type="password" id="password" name="pwd" placeholder="Jelszó" class="input">
                    </div>

                    <div class="input-box">
                        <p class="input-fiok">Nincs még fiókod? <br>
                            <a href="regisztracio" class="input-box-link reset-pw">Regisztrálj!</a>
                        </p>
                            <a href="" class="input-box-link reset-pw">Elfelejtettem a jelszavam</a>
                    </div>

                    <div class="input-socials">
                        <a href="<?php echo "" . $client->createAuthUrl() . ""; ?>" class="input-google" style="text-decoration: none;">
                            <img src="./img/icons8-google-50.png">
                            <p>Bejelentkezés Google fiókkal</p>
                        </a>
                        <a href="<?php echo "$fb_login_url"; ?>" class="input-facebook" style="text-decoration: none; color: white;">
                            <img src="./img/icons8-facebook-50.png">
                            <p>Bejelentkezés Facebookal</p>
                        </a>
                    </div>
            
            <div class="input-button">
                <button name="sub">Bejelentkezés</button>
            </div>
            </form>
        </div>
        <div class="container-picture"></div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>