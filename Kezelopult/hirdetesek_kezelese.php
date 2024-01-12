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
                        if(confirm('Az hirdetés sikeresen törölve lett!')) document.location = 'hirdetes_kezeles';
                        else(document.location = 'hirdetes_kezeles')
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
                                                if ($csomag_szoveg == 'Prémium előfizető') {
                                                    echo "<li id='hirdetes_kiemelese'><i class='fa-solid fa-star'></i>Hirdetés kiemelése</li>";
                                                }
                                                 echo "   
                                                    <li id='hirdetes_modositasa'><i class='fa-solid fa-file-signature'></i>Hirdetés módosítása</li>
                                                    <li class='torles' onClick='torles$postID()'><i class='fa-solid fa-trash'></i>Hirdetés törlése</li>
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
                                    <div class='buttons'><button id='megsem_button'>Mégsem</button>
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