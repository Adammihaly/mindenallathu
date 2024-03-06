<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/szalagStyle.css">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>
    <script defer src="../js/szalagScript.js"></script>
    <script defer src="../js/navbar.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Csomagváltás</title>
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
                <div class="kep">
                    <img src="../img/martin-schmidli-qg8ihPPQkKo-unsplash.png" alt="">
                    <p id="szalagszoveg" class="szalag">KÜLÖNLEGES ÁR</p>
                </div>
                <div class="content">
                    <div class="cim">
                        <h1>Szalag</h1>
                        <div><b>2890 Ft / </b><span>hónap</span></div>
                    </div>
                    <div class="leiras">
                        <h2>Leírás</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus earum est voluptatibus eum quisquam vitae velit eligendi ad! Iusto iure quos nam repellat, sunt velit quis deserunt debitis consectetur perspiciatis.</p>
                    </div>
                    <select name="szalag" id="szalagddlist">
                        <option value="" disabled selected>Válassza ki mit írjon a szalagon</option>
                        <option value="kulonleg">KÜLÖNLEGES ÁR</option>
                        <option value="fajtiszta">FAJTISZTA</option>
                        <option value="ritka">RITKA</option>
                    </select>
                    <button class="gomb">Ezt választom</button>
                </div>
            </section>
        </main>
    </div>
</body>
</html>