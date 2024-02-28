<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/hirdetes_kezeles.css">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Hirdetések kezelése</title>


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

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
            if ($_GET['error']  == 'noned') {
                echo "           
                    <script type='text/javascript'>
                        if(confirm('Az hirdetés sikeresen törölve lett!')) document.location = 'hirdetesek_kezelese';
                        else(document.location = 'hirdetesek_kezelese')
                    </script> 
                ";
            }
        }

        if (isset($_GET['error'])) {
            if ($_GET['error']  == 'nonee') {
                echo "           
                    <script type='text/javascript'>
                        if(confirm('Az hirdetés sikeresen módosítva lett!')) document.location = 'hirdetesek_kezelese';
                        else(document.location = 'hirdetesek_kezelese')
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
            <header>
                <div class="profil">
                    <img class="profilkep"></img>
                    <p><?php echo $fnev; ?></p>
                </div>
                <div class="notif"><i class="fa-solid fa-bell"></i></div>
            </header>
            <section class="main_content">
                <h1>Hirdetések kezelése(<span id="szam">5</span>/5)</h1>
                <div class="column_wrapper">


                    <?php 
                        mysqli_set_charset($conn, "utf8");
                       $sql = "SELECT * FROM posts WHERE torolve IS NULL AND profilID = $profilID;";
                        $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {

                                $cim = $row['cim'];
                                $kepek = $row['kepek'];
                                $kep = explode(",", $kepek);
                                $leiras = $row['allat_leiras'];
                                $postID = $row['ID'];

                                echo "
                                    <article class='item'>
                                        <img src='../files/$kep[0]'>
                                        <div class='content_wrapper'>
                                            <h3>$cim</h3>
                                            <p>$leiras</p>
                                            <div class='funkciok'>
                                                <ul>
                                                ";
                                                
                                                    echo "<li id='hirdetes_kiemelese'><i class='fa-solid fa-star'></i>Kiemelés</li>";

                                                 echo "   
                                                    <li id='hirdetes_modositasa'><i class='fa-solid fa-file-signature'></i><form action='hirdetes_modositasa' method='GET'>
                                                    <input type='hidden' name='id' value='$postID'>
                                                    <button style='background-color: unset; border: none; cursor: pointer; font-size: 100%; color: rgb(67, 158, 188); font-weight:bold;'>Módosítás</button></form></li> 
                                                    <li class='torles' onClick='torles$postID()'><i class='fa-solid fa-trash'></i>Törlés</li>
                                                </ul>
                                            </div>
                                            <div id='kiemelve_block'>Kiemelve</div>
                                        </div>
                                    </article>  
                        <script type='text/javascript'>
                            function torles$postID () {

                                var torles_wrapper = document.getElementById('torlesw$postID');

                                if (torles_wrapper) 
                                {
                                    torles_wrapper.style.display = (torles_wrapper.style.display === 'flex') ? 'none' : 'flex';
                                }
                            }
                        </script>
                        <div class='torles_wrapper' id='torlesw$postID'>
                            <form action='../php/torles.php' method='POST'>
                                <div class='torles_block'>
                                    <i class='fa-solid fa-trash'></i>
                                    <h2>Biztos benne, hogy törli a hirdetést?</h2>
                                    <p>'$cim' hirdetés véglegesen törlésre kerül. A hirdetés letörlése visszavonhatatlan művelet. Biztosan szeretné törölni?</p>
                                    <div class='buttons'><a href='./hirdetesek_kezelese' id='megsem_button'>Mégsem</a>
                                        <input type='hidden' name='postid' value='$postID'>
                                        <button id='torles_button' name='del'>Törlés</button>             
                                    </div>
                                </div>
                            </form>
                        </div>"  ;
                                

                            } 

                    ?>


                    

                </div>
            </section>
        </main>

    </div>




    <script src="../js/hirdetes_kezelese.js"></script>
    <script src="../js/navbar.js"></script>

</body>
</html>