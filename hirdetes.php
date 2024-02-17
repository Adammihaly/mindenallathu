<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reszletek.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>

    <title>Hirdetés</title>
</head>
<body>

    <header>
        <h1>Mindenallat.hu</h1>
        <ul>
            <a href="hirdetesek" style="text-decoration: none; color: white;">Hirdetések</a>
            <a href="Kezelopult/fooldal" style="text-decoration: none; color: white;">Hirdetés feladása</a>
        </ul>
        <ol>
            <a>Keresés</a>
            
        </ol>
    </header>

    <?php

    if (!isset($_GET['id'])) {
        header("Location: index");
        exit();
    }
    else
    {
        $postID = $_GET['id'];
    }

    require_once 'php/conn.php';


        mysqli_set_charset($conn, "utf8");

            $sql = "SELECT * FROM posts WHERE ID = $postID;";
                $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) 
                        {
                            $cim = $row['cim'];
                            $allat_kat = $row['allat_kat'];
                            $allat_fele = $row['allat_fele'];
                            $allat_fajta = $row['allat_fajta'];
                            $allat_kora = $row['allat_kora'];
                            $allat_neme = $row['allat_neme'];
                            $allat_szine = $row['allat_szine'];
                            $allat_ara = $row['allat_ara'];
                            $kepek_temp = $row['kepek'];
                            $kepek = explode(",", $kepek_temp);
                            $allat_leiras = $row['allat_leiras'];
                            $teny_nev = $row['teny_nev'];
                            $teny_email = $row['teny_email'];
                            $teny_tel = $row['teny_tel'];
                            $teny_cim = $row['teny_cim'];
                            $megtekintes = $row['megtekintes'];

                            $megtekintes = $megtekintes + 1;
                        }

                        $sql = "UPDATE posts SET megtekintes = '$megtekintes' WHERE ID = '$postID';";
                            $result = $conn->query($sql);


    ?>

    <header class="mobil_nav">
        <i id="hamburger" class="fa-solid fa-bars" onclick="showPopUp()"></i>
        <h1>Mindenallat.hu</h1>

        <div id="popup">
            <div class="linkek">
                <a>Kategóriák</a>
                <a>Hirdetés feladása</a>
                <a>Keresés</a>
                <a>Bejelentkezés</a>
            </div>
        </div>

        <i id="notification" class="fa-solid fa-bell"></i>

    </header>


    <main>
        <aside>

            <?php

                foreach ($kepek as $kep => $value) {
                    if ($value != null) {
                      echo "<img src='./files/$value' alt='hirdetes kepe' onclick='changeImage(this)'>";
                    }
                }

            ?>

        </aside>
        <img id="nagykep" class="nagykep" alt="">
        <article>
            <h1><?php echo $cim; ?></h1>
            <label><?php echo $allat_ara; ?> Ft</label>
            <h4>Leírás</h4>
            <p class="leiras"><?php echo $allat_leiras; ?></p>
            <h4>Tulajdonságok</h4>
            <div class="adatok">
                <div>
                    <p>Állat faja: <strong><?php echo $allat_fajta; ?></strong></p>
                    <p>Állat neme: <strong><?php echo $allat_neme; ?></strong></p>
                    <p>Állat kategóriája: <strong><?php echo $allat_kat; ?></strong></p>
                </div>
                <div>
                    <p>Állat kora: <strong><?php echo $allat_kora; ?> hónap</strong></p>
                    <p>Állat féle: <strong><?php echo $allat_fele; ?></strong></p>
                    <p>Állat színe: <strong><?php echo $allat_szine; ?></strong></p>
                </div>
            </div>
        </article>
    </main>

    <footer>
        <section>
            <h1>Tenyésztő adatai</h1>
            <p>Név: <strong><?php echo $teny_nev; ?></strong></p>
            <p>Email cím: <strong><?php echo $teny_email; ?></strong></p>
            <p>Telefonszám: <strong><?php echo $teny_tel; ?></strong></p>
            <p>Lokáció: <strong><?php echo $teny_cim; ?></strong></p>
            <a href="mailto:<?php echo $teny_email; ?>" style="text-decoration: none;">Kapcsolat</a>
        </section>
    </footer>
    
    <script src="./js/reszletek.js"></script>

</body>
</html>