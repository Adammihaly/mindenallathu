<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/hirdetes_kezeles.css">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>
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
                Lorem Ipsum
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
                    <p>Lorem Ispum</p>
                </div>
                <div class="notif"><i class="fa-solid fa-bell"></i></div>
            </header>
            <section class="main_content">
                <h1>Hirdetések kezelése(<span id="szam">5</span>/5)</h1>
                <div class="column_wrapper">
                    <article class="item">
                        <img src="../img/gugya.png">
                        <div class="content_wrapper">
                            <h3>Hirdetés neve</h3>
                            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores, corrupti! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex non veniam eum iste praesentium saepe quos architecto aut repellendus ducimus!</p>
                            <div class="funkciok">
                                <ul>
                                    <li id="hirdetes_kiemelese"><i class="fa-solid fa-star"></i>Hirdetés kiemelése</li>
                                    <li id="hirdetes_modositasa"><i class="fa-solid fa-file-signature"></i>Hirdetés módosítása</li>
                                    <li class="torles"><i class="fa-solid fa-trash"></i>Hirdetés törlése</li>
                                </ul>
                            </div>
                            <div id="kiemelve_block">Kiemelve</div>
                        </div>
                    </article>

                    <article class="item">
                        <img src="../img/gugya.png">
                        <div class="content_wrapper">
                            <h3>Hirdetés neve</h3>
                            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores, corrupti! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex non veniam eum iste praesentium saepe quos architecto aut repellendus ducimus!</p>
                            <div class="funkciok">
                                <ul>
                                    <li id="hirdetes_kiemelese"><i class="fa-solid fa-star"></i>Hirdetés kiemelése</li>
                                    <li id="hirdetes_modositasa"><i class="fa-solid fa-file-signature"></i>Hirdetés módosítása</li>
                                    <li class="torles"><i class="fa-solid fa-trash"></i>Hirdetés törlése</li>
                                </ul>
                            </div>
                            <div id="kiemelve_block">Kiemelve</div>
                        </div>
                    </article>

                    <article class="item">
                        <img src="../img/gugya.png">
                        <div class="content_wrapper">
                            <h3>Hirdetés neve</h3>
                            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores, corrupti! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex non veniam eum iste praesentium saepe quos architecto aut repellendus ducimus!</p>
                            <div class="funkciok">
                                <ul>
                                    <li id="hirdetes_kiemelese"><i class="fa-solid fa-star"></i>Hirdetés kiemelése</li>
                                    <li id="hirdetes_modositasa"><i class="fa-solid fa-file-signature"></i>Hirdetés módosítása</li>
                                    <li class="torles"><i class="fa-solid fa-trash"></i>Hirdetés törlése</li>
                                </ul>
                            </div>
                            <div id="kiemelve_block">Kiemelve</div>
                        </div>
                    </article>

                    <article class="item">
                        <img src="../img/gugya.png">
                        <div class="content_wrapper">
                            <h3>Hirdetés neve</h3>
                            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores, corrupti! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex non veniam eum iste praesentium saepe quos architecto aut repellendus ducimus!</p>
                            <div class="funkciok">
                                <ul>
                                    <li id="hirdetes_kiemelese"><i class="fa-solid fa-star"></i>Hirdetés kiemelése</li>
                                    <li id="hirdetes_modositasa"><i class="fa-solid fa-file-signature"></i>Hirdetés módosítása</li>
                                    <li class="torles"><i class="fa-solid fa-trash"></i>Hirdetés törlése</li>
                                </ul>
                            </div>
                            <div id="kiemelve_block">Kiemelve</div>
                        </div>
                    </article>

                    <article class="item">
                        <img src="../img/gugya.png">
                        <div class="content_wrapper">
                            <h3>Hirdetés neve</h3>
                            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores, corrupti! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex non veniam eum iste praesentium saepe quos architecto aut repellendus ducimus!</p>
                            <div class="funkciok">
                                <ul>
                                    <li id="hirdetes_kiemelese"><i class="fa-solid fa-star"></i>Hirdetés kiemelése</li>
                                    <li id="hirdetes_modositasa"><i class="fa-solid fa-file-signature"></i>Hirdetés módosítása</li>
                                    <li class="torles"><i class="fa-solid fa-trash"></i>Hirdetés törlése</li>
                                </ul>
                            </div>
                            <div id="kiemelve_block">Kiemelve</div>
                        </div>
                    </article>

                </div>
            </section>
        </main>

    </div>


    <div id="torles_wrapper">
        <div class="torles_block">
            <i class="fa-solid fa-trash"></i>
            <h2>Biztos benne, hogy törli a hirdetést?</h2>
            <p>"<label id="hirdetes_cime_torles">Hirdetes cime</label>" hirdetés véglegesen törlésre kerül. A hirdetés letörlése visszavonhatatlan művelet. Biztosan szeretné törölni?</p>
            <div class="buttons"><button id="megsem_button">Mégsem</button><button id="torles_button">Törlés</button></div>
        </div>
    </div>

    <script src="../js/hirdetes_kezelese.js"></script>
    <script src="../js/navbar.js"></script>

</body>
</html>