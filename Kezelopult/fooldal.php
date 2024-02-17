<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezelőpult</title>
    <link rel="stylesheet" href="../css/fooldalStyle.css">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>
    <script defer src="../js/fooldalScript.js"></script>
    <script defer src="../js/navbar.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
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
            if ($_GET['error']  == 'none') {
                echo "           
                    <script type='text/javascript'>
                        if(confirm('Az hirdetés sikeresen közzé lett téve!')) document.location = 'fooldal';
                        else(document.location = 'fooldal')
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
                <div class="notif"><i class="fa-solid fa-star"></i></div>
            </header>

            <div class="main_content">
                <div class="kiemeles">
                    <p class="kiemelesCim">Emelje ki hirdetését, hogy állata hamarabb gazdira leljen!</p>
                    <p class="kiemelesLeiras">Legyen az ön hirdetése is kiemelt helyen, váltson csomagot most!</p>
                    <button>Kiemelés</button>
                </div>

                <div class="balSzoveg">
                    <p id="hirdeteseimSzoveg">Hirdetéseim (0/5)</p>
                </div>
                <section class="hirdeteseim">
                    
                    <?php 
                    mysqli_set_charset($conn, "utf8");
                    $sql = "SELECT * FROM posts WHERE torolve IS NULL AND profilID = $profilID;";
                        $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {


                                $kepek = $row['kepek'];
                                $ID = $row['ID'];
                                $kep = explode(",", $kepek);

                                echo "<a href='../hirdetes?id=$ID' class='hirdetesssss'>
                        <div class='hirdetesKep' style='background-image: url(../files/" . $kep[0] . ");'></div>
                        <p>" . $row['cim'] . "</p>
                    </a>";


                            }

                    ?>
                    

                </section>

                <div class="csik">&nbsp</div>

               <!-- <div class="balSzoveg">
                    <p>Utoljára megtekintett</p>
                </div>
                <section class="utoljaraMegtek">
                    <div class="megtekintett">
                        <div class="megtekintettKep"></div>
                        <p>Allat neve</p>
                    </div>
                    <div class="megtekintett">
                        <div class="megtekintettKep"></div>
                        <p>Allat nevee</p>
                    </div>
                    <div class="megtekintett">
                        <div class="megtekintettKep"></div>
                        <p>Allat neve</p>
                    </div>
                </section> -->

                <div class="csik">&nbsp</div>

                <section class="mobilLent">
                    <p class="balSzoveg">Legnépszerűbb hírdetések</p>
                    <p>x megtekintés</p>
                    <div class="megtekFelhasz">
                        <?php 
                    mysqli_set_charset($conn, "utf8");
                    $sql = "SELECT * FROM posts WHERE torolve IS NULL AND profilID = $profilID ORDER BY megtekintes;";
                        $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {


                                $kepek = $row['kepek'];
                                $kep = explode(",", $kepek);

                                echo "<div class='felhasznalo'>
                            <div class='felhasznaloKep' style='background-image: url(../files/$kep[0]);'></div>
                            <p>" . $row['cim'] . "</p>
                            <div class='dotsMenu'></div>
                        </div>";


                            }

                    ?>
                    </div>

                    <div class="csik">&nbsp</div>

                    <p class="balSzoveg">Jelenlegi csomag</p>
                    <div class="csomag">
                        <div class="elofizetes simpleElofizetes">
                            <p><?php echo $csomag_szoveg; ?></p>
                        </div>
                    </div>
                </section> 
            </div>
        </main>

        <section class="jobbNav">
            <p class="balSzoveg">Jelenlegi csomag</p>
            <div class="csomag">
                <div class="elofizetes premiumElofizetes">
                    <p><?php echo $csomag_szoveg; ?></p>
                </div>
            </div>
            <p class="balSzoveg">Legnépszerűbb hírdetések</p>
            <p id="kontaktok2">x megtekintés</p>
            <div class="megtekFelhasz" style="display: block;">
                <?php 
                    mysqli_set_charset($conn, "utf8");
                    $sql = "SELECT * FROM posts WHERE torolve IS NULL AND profilID = $profilID ORDER BY megtekintes;";
                        $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {


                                $kepek = $row['kepek'];
                                $kep = explode(",", $kepek);

                                echo "<div class='felhasznalo'>
                            <div class='felhasznaloKep' style='background-image: url(../files/$kep[0]);'></div>
                            <p>" . $row['cim'] . "</p>
                            <div class='dotsMenu'></div>
                        </div>";


                            }

                    ?>
            </div>
        </section>
    </div>
</body>
</html>