<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindenállat - Regisztráció</title>
    <link rel="stylesheet" href="css/reg.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="img/logo2.webp">


    <meta name="description" content="A oldalt azért hoztuk létre elsősorban, mint azt a szlogenünk is jelzi, hogy minden állat megtalálja a gazdáját!
Az oldalunkon megtalálható szinte az összes állat listája,
amelyet eladásra tudnak kínálni!
Magánszemélyként és tenyésztőként is felteheti a hirdetését ezzel segítve azokat,
akik éppen az Ön által keresett álla fajtát szeretnék megvásárolni!
Célunk, hogy egy piacvezető állatokat hirdető oldal legyünk, ami nagyban hozzájárul
az állatok adás-vételében!
A gyorsabb és hatékonyabb eladás érdekében a kiemelt hirdetést is használhatja,
amely még hatékonyabban segíti az eladásban!">


        <meta name="keywords" content="lakasetterem, lakásétterem, étterem, étkezés loadeat, loadeatcom, kaja, ennivaló, menü, etterem, soklakasetterem, lakáséttermek, éttermek, kereső, hírdető, hirdetes, etkeztetes, etteremtulaj, vendég, vendeg, ügyfél, ugyfel, asztalfoglalas, asztalfoglalás">

        <meta name="author" content="mindenallat.hu">
        <link rel="canonical" href="https://mindenallat.com">


        <meta property="og:title" content="mindenallat.hu" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="A oldalt azért hoztuk létre elsősorban, mint azt a szlogenünk is jelzi, hogy minden állat megtalálja a gazdáját!
Az oldalunkon megtalálható szinte az összes állat listája,
amelyet eladásra tudnak kínálni!
Magánszemélyként és tenyésztőként is felteheti a hirdetését ezzel segítve azokat,
akik éppen az Ön által keresett álla fajtát szeretnék megvásárolni!
Célunk, hogy egy piacvezető állatokat hirdető oldal legyünk, ami nagyban hozzájárul
az állatok adás-vételében!
A gyorsabb és hatékonyabb eladás érdekében a kiemelt hirdetést is használhatja,
amely még hatékonyabban segíti az eladásban!" />
        <meta property="og:url" content="https://mindenallat.hu" />
        <meta property="og:image" content="img/bg.webp" />

    

    
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z39QDQJX2R"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z39QDQJX2R');
</script>

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