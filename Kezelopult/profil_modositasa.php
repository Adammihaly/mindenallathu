<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profil_modositasa.css">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Profil módosítása</title>

    <link rel="icon" type="image/x-icon" href="../img/logo2.webp">


    <meta name="description" content="A oldalt azért hoztuk létre elsősorban, mint azt a szlogenünk is jelzi, hogy minden állat megtalálja a gazdáját!
Az oldalunkon megtalálható szinte az összes állat listája,
amelyet eladásra tudnak kínálni!
Magánszemélyként és tenyésztőként is felteheti a hirdetését ezzel segítve azokat,
akik éppen az Ön által keresett álla fajtát szeretnék megvásárolni!
Célunk, hogy egy piacvezető állatokat hirdető oldal legyünk, ami nagyban hozzájárul
az állatok adás-vételében!
A gyorsabb és hatékonyabb eladás érdekében a kiemelt hirdetést is használhatja,
amely még hatékonyabban segíti az eladásban!">


        <meta name="keywords" content="elado allat, állatok, állat, piac, elahely, vétel, vásárlás, háziállat, haszonállat, kutya, macska, eladó, mindenallat.hu">

        <meta name="author" content="mindenallat.hu">
        <link rel="canonical" href="https://mindenallat.hu">


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
        <meta property="og:image" content="../img/bg.webp" />

        
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

error_reporting(0);
ini_set('display_errors', 0);

session_start();
require_once '../php/conn.php';

    if (isset($_SESSION['ID'])) {
            $profilID = $_SESSION['ID'];
        }
        else
        {
            header("Location: ../bejelentkezes");
            exit();
        }

        if (isset($_GET['error'])) {
            if ($_GET['error']  == 'none') {
                echo "           
                    <script type='text/javascript'>
                        if(confirm('A módosítás sikeres volt!')) document.location = 'profil_modositasa';
                        else(document.location = 'profil_modositasa')
                    </script> 
                ";
            }
        }

        if (isset($_GET['error'])) {
            if ($_GET['error']  == 'uidExists') {
                echo "           
                    <script type='text/javascript'>
                        if(confirm('A módosítás sikertelen volt, mivel a felhasználónév már foglalt!')) document.location = 'profil_modositasa';
                        else(document.location = 'profil_modositasa')
                    </script> 
                ";
            }
        }

        if (isset($_GET['error'])) {
            if ($_GET['error']  == 'set') {
                echo "           
                    <script type='text/javascript'>
                        if(confirm('Hiba lépett fel a rendszerben.')) document.location = 'profil_modositasa';
                        else(document.location = 'profil_modositasa')
                    </script> 
                ";
            }
        }

        mysqli_set_charset($conn, "utf8");
        $sql = "SELECT * FROM users WHERE ID = $profilID;";
$result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $posts = $row['posts'];
        if ($posts == null) {
            $posts = 0;
        }
        $fnev = $row['username'];
        $email = $row['email'];
        $csomag = $row['csomag'];
        if ($csomag == null) {
            $csomag_szoveg = 'Simple felhasználó';
        }
        else if($csomag == 1) {
            $csomag_szoveg = 'Prémium előfizető';
        }
    }

?>
    
    <nav>
        <div class="logo">Mindenallat.hu</div>
        <div class="nav_item">
            <ul>
                <li id="kezdolap"><i class="fa-solid fa-house"></i>Kezdőlap</li>
                <li id="kezelopult_nav"><i class="fa-solid fa-shapes"></i>Kezelőpult</li>
                <li id="hirdetes_feleadasa_nav"><i class="fa-solid fa-file-circle-plus"></i>Hirdetés feladása</li>
                <li id="profil_modositasa_nav"><i class="fa-solid fa-user"></i>Profil módosítása</li>
                <li id="csomagvalasztas_nav"><i class="fa-solid fa-bag-shopping"></i>Csomagválasztás</li>
                <li id="hirdetesek_kezelese_nav"><i class="fa-solid fa-file-signature"></i>Hirdetések kezelése</li>
                <li id="sugokozpont_nav"><i class="fa-solid fa-star"></i>Súgóközpont</li>
                <li id="kijelentkezes_nav" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Kijelentkezés</li>

            </ul>
        </div>
    </nav>

    <nav id="felugroablak">    
        <div class="profil_mobil">
            <div class="nev_kep">
                <img class="profilkep">
                <?php echo $fnev; ?>
            </div>
        </div>
        <hr>
        <div class="nav_item">
            <ul>
                <li id="kezdolap"><i class="fa-solid fa-house"></i>Kezdőlap</li>
                <li id="kezelopult_nav"><i class="fa-solid fa-shapes"></i>Kezelőpult</li>
                <li id="hirdetes_feleadasa_nav"><i class="fa-solid fa-file-circle-plus"></i>Hirdetés feladása</li>
                <li id="profil_modositasa_nav"><i class="fa-solid fa-user"></i>Profil módosítása</li>
                <li id="csomagvalasztas_nav"><i class="fa-solid fa-bag-shopping"></i>Csomagválasztás</li>
                <li id="hirdetesek_kezelese_nav"><i class="fa-solid fa-file-signature"></i>Hirdetések kezelése</li>
                <li id="sugokozpont_nav"><i class="fa-solid fa-star"></i>Súgóközpont</li>
                <li id="kijelentkezes_nav"><i class="fa-solid fa-arrow-right-from-bracket"></i>Kijelentkezés</li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">

        <nav class="mobilnezet">
            <div class="baloldal">
                <div class="notif"><i class="fa-solid fa-bars" id="Hamburger" onclick="mobilnavigacio()"></i></div>
                <p>Mindenallat.hu</p>
            </div>
            <div class="jobboldal">
                <div class="notif"><i class="fa-solid fa-bell"></i></div>
            </div>
        </nav>
        
        <main>
            <form action="../php/profedit.php" method="POST">
            <header>
                <div class="profil">
                    <img class="profilkep"></img>
                    <p><?php echo $fnev; ?></p>
                </div>
                <div class="notif"><i class="fa-solid fa-bell"></i></div>
            </header>
            <section class="main_content">
                <h1>Fiók beállításai</h1>
                <div class="content_wrapper">
                    <div class="content">
                        <div class="grid">
                            
                            <fieldset>
                                <legend>Új felhasználónév</legend>
                                <input id="teljesnev_input" type="text" name="name" placeholder="PL: <?php echo $fnev; ?>" value="<?php echo $fnev; ?>" required>
                            </fieldset>
                            <fieldset>
                                <legend>Új jelszó</legend>
                                <input id="jelszo_input" type="password" name="pwd" placeholder="***************" required>
                            </fieldset>
                            <!-- <fieldset>
                                <legend>Új email cím</legend>
                                <input id="email_input" type="email" placeholder="PL: <?php //echo $email; ?>" value="<?php //echo $email; ?>">
                            </fieldset> 
                            <fieldset>
                                <legend>Csomagok</legend>
                                <input id="csomagok_input" type="text" readonly placeholder="<?php echo $csomag_szoveg; ?>">
                                <?php 

                                if ($csomag_szoveg != 'Prémium előfizető') {
                                   echo "<button id='csomagvaltas_gomb'>+</button>";
                                }

                                ?> -->
                                
                            </fieldset>
                        </div>
                        <!-- Csak ha van minden ami figmaba -->
                        <!-- <div class="grid">
                            <div class="first_col">
                                <fieldset>
                                    <legend>Teljes név</legend>
                                    <input id="teljesnev_input" type="text" placeholder="Farkas Bertalan">
                                </fieldset>
                                <fieldset>
                                    <legend>Telefonszám</legend>
                                    <input id="telefonszam_input" type="text" placeholder="+36 34 30 2929">
                                </fieldset>
                                <fieldset>
                                    <legend>Jelszó</legend>
                                    <input id="jelszo_input" type="password" placeholder="***************">
                                </fieldset>
                                <fieldset>
                                    <legend>Születési dátum</legend>
                                    <input id="szul_datum_input" type="text" placeholder="2000.05.02">
                                </fieldset>
                            </div>
                            <div class="second_col">
                                <fieldset>
                                    <legend>Email cím</legend>
                                    <input id="email_input" type="email" placeholder="valami@gmail.com">
                                </fieldset>
                                <fieldset>
                                    <legend>Lokáció</legend>
                                    <input id="lokacio_input" type="text" placeholder="5400 Szolnok, Radnóti utca 13.">
                                </fieldset>
                                <fieldset>
                                    <legend>Csomagok</legend>
                                    <input id="csomagok_input" type="text" readonly placeholder="Simple felhasználó">
                                    <button>+</button>  
                                </fieldset>
                                <fieldset>
                                    <legend>Bankkártya</legend>
                                    <input id="bankkartya" type="text" placeholder="5223 2233 2330 9994">
                                    <button><i class="fa-solid fa-trash"></i></button>
                                </fieldset>
                            </div>
                            <div class="upload_image">
                                <h4>Profilkép megváltoztatása</h4>
                                <input  id="image_input" type="file"  accept="image/*">
                            </div>
                        </div> -->
                    </div>
                    <div class="mentes"><button name="sub">Mentés</button>
                    </div>
                </div>
                    
            </section>
            </form>
        </main>

    </div>

</body>

    <script src="../js/navbar.js"></script>
    <script src="../js/profil_modositasa.js"></script>
</html>