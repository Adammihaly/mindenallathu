<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hírdetés feladás</title>
    <link rel="stylesheet" href="../css/hirdetes_megadasa.css">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script type="text/javascript" src="../js/posztolas.js" defer></script>

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

        mysqli_set_charset($conn, "utf8");
        $sql = "SELECT * FROM users WHERE ID = $profilID;";
$result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $posts = $row['posts'];
        if ($posts == null) {
            $posts = 0;
        }
        $fnev = $row['username'];
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
                <h1>Hirdetés feladása(<span id="szam">1</span>/5)</h1>
                <form action="../php/post.php" enctype="multipart/form-data" method="POST" >
                    <section class="card" id="elso">
                        <div class="overflow_wrap">
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Hirdetés címe<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <input type="text" id="hirdetes_cim" class="bevitel" name="hirdetes_cime" placeholder="Add meg a hirdetésed nevét" required maxlength="70">
                                        <p>Egy jó cím növeli az eladás esélyeit. Próbáld egyértelműen megnevezni a hirdetésed tárgyát, és kerüld az "eladó", "kiadó" vagy hasonló kifejezéseket.</p>
                                    </div>
                                    <label id="hiba_uzenet">Minimum 12, maximum 70 karakter lehet.</label>
                                </div>
                            </div>
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Állat katergóriája<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <select id="allat_kategoriaja" name="allat_kategoriaja" class="bevitel" required>
                                            <option value="" disabled selected hidden>Válasszon egy kategóriát</option>
                                            <option value="Haziallat">Háziállat</option>
                                            <option value="Haszonallat">Haszonállat</option>
                                            <option value="Diszallat">Díszállat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Állat féle<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <select id="allat_fele" name="allat_fele" class="bevitel" required>
                                            <option value="" disabled selected hidden>Válasszon egy fajtát</option>
                                        </select>
                                    </div>
                                </div>
                            </div>      
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Állat fajta<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <select id="allat_fajtaja" name="allat_fajtaja" class="bevitel" required>
                                            <option value="" disabled selected hidden>Válasszon egy fajtát</option>
                                        </select>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </section>

                    <section class="card" id="masodik">
                        <div class="overflow_wrap">
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Állat kora<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <input type="number" class="bevitel" id="allat_kora" name="allat_kora" placeholder="Adja meg az állat pontos életkorát hónapokban" required min="1" max="1000">
                                        <p>Fontos, hogy állatának életkorát hónapban adja meg. Így az összes állat életkora azonosan megtekinthető. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Állat neme<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <select id="allat_neme" name="allat_neme" class="bevitel" required>
                                            <option value="" disabled selected hidden>Válassza ki az állat nemét</option>
                                            <option value="Hím">Hím</option>
                                            <option value="Nőstény">Nőstény</option>
                                        </select>                               
                                    </div>
                                </div>
                            </div>
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Állat színe<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <input type="text"  class="bevitel" id="allat_szine" name="allat_szine" placeholder="Adja meg  az állat szinét" required>
                                        <p>Kérjük, hogy törekedjen minél érthetőbben és egyszerűbben megadni állata szinét. Egyszerre több színt is felsorolhat viszont ne használjon kevésbé ismert kombinációkat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Állat ára<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <input type="number" class="bevitel" id="allat_ara" name="allat_ara" placeholder="Add meg az állat árát" required>
                                        <p>Az árak forintban értendők és az áfát is tartalmazzák.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="card" id="harmadik">
                        <div class="overflow_wrap">
                            <div class="nagyobb_field">
                                <div class="field_wrapper">
                                    <p class="cim">Képek<span style="color: red;"> *</span></p>
                                    <label>A több, jó minőségű kép feltöltése növeli az eladás sikerességét, hiszen a képekkel rendelkező hírdetésekre akár 10x többen kattintanak! Figyelj, a csatolni kivánt kép mérete minimum 640 * 640, maximum 1920 * 1920 pixel lehet! <br> Kérjük, ne használj internetről  letöltött katalógusképeket!</label>
                                    <input type="file"  name="kep_input[]" id="kep_input" accept=".jpg, .jpeg, .png, .webp" multiple="multiple" required>
                                </div>
                            </div>
                            <div class="nagyobb_field">
                                <div class="field_wrapper">
                                    <p class="cim">Leirás az állatról<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <textarea  id="allat_leiras" name="allat_leiras" rows="4" cols="80" placeholder="Adjon meg pontos leírást az állatáról" required ></textarea>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="card" id="negyedik">
                        <div class="overflow_wrap">
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Hirdető teljes neve<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <input type="text" id="tenyeszto_nev" class="bevitel" name="tenyeszto_nev" placeholder="Adja meg a teljes nevét!" required>
                                    </div>
                                </div>
                            </div>
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Hirdető email címe<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <input type="email" id="tenyeszto_email" class="bevitel" name="tenyeszto_email" placeholder="Adja meg email címet!" required>
                                    </div>
                                </div>
                            </div>
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Hirdető telefonszáma<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <input type="tel" id="tenyeszto_telefon" class="bevitel" name="tenyeszto_telefon" placeholder="+36" required>
                                    </div>
                                </div>
                            </div>      
                            <div class="inputfield">
                                <div class="field_wrapper">
                                    <p class="cim">Hirdetés helyszíne<span style="color: red;"> *</span></p>
                                    <div class="input_wrapper">
                                        <input type="text" id="lokacio" class="bevitel" name="lokacio" placeholder="5400, Szolnok, Radnóti utca 42." required>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </section>


                    <section class="card" id="otodik">
                        <div class="overflow_wrap">
                            <div class="nagyobb_field">
                                <div class="field_wrapper">
                                    <p class="cim">Kiemelés</p>
                                    <div class="input_wrapper">
                                        <label>Ön rendelkezik prémium csomaggal így lehetősége van kiemelni a hídetését, mellyel több emberhez juthat el. Állata hamarabb találhat gazdára, hiszen többen fogják megnézni az ön hírdetését. Emelje ki a hírdetését, hogy kitünjön a többi közül.</label>
                                        <button type="button" id="kiemeles">Hírdetés kiemelése</button>
                                        <label id="info">Hamarosan...</label>
                                    </div>
                                </div>
                            </div>
                    </section>

                    <div class="gombok">
                        <button id="hatra" type="button">Vissza</button>
                        <button type="submit" name="submit_gomb" id="submit_gomb" onclick="validateForm()">Hirdetés feladása</button> 
                        <button id="elore" type="button">Tovább</button>   
                    </div>
                </form>
            </section>
        </main>

    </div>

    <script src="../js/hirdetes_megadasa.js"></script>
    <script src="../js/navbar.js"></script>
</body>
</html>