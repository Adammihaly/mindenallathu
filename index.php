<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mindenállat.hu | Kezdőlap</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">


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

use PHPMailer\PHPMailer\PHPMailer;
				    use PHPMailer\PHPMailer\SMTP;
				    use PHPMailer\PHPMailer\Exception;

				    require './vendor/autoload1.php';

error_reporting(0);
ini_set('display_errors', 0);

	require_once 'php/conn.php';

	mysqli_set_charset($conn, "utf8");
        $sql = "SELECT * FROM posts";
$result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $datum = $row['datum'];
        $postid = $row['ID'];
        $profilID = $row['profilID'];
        $hirdetescime = $row['cim'];

        $maiDatum = date("Y-m-d");

				$elmult30Nap = date("Y-m-d", strtotime("-30 days"));
				$elmult25Nap = date("Y-m-d", strtotime("-25 days"));

				if ($datum <= $elmult30Nap) {
				    
						$sql = "SELECT * FROM users WHERE ID = $profilID;";
							$result = $conn->query($sql);
								while ($row = $result->fetch_assoc()) {

									$posts = $row['posts'];
								}


							$posts = $posts - 1;

							$sqlll = "UPDATE users SET posts = '$posts' WHERE ID = $profilID";
							mysqli_query($conn, $sqlll);

							$sqlt = "UPDATE posts SET torolve = 1 WHERE ID = $postid";
							mysqli_query($conn, $sqlt);

				} else if($datum <= $elmult25Nap){
				    
					$sqlp = "SELECT * FROM users WHERE ID = $profilID";
$result = $conn->query($sqlp);
    while ($rowp = $result->fetch_assoc()) {

    				$email = $rowp['email'];
    				$username = $rowp['username'];

    				

				    $mail = new PHPMailer(true);
 
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'mindenallathu@gmail.com';
 
            //SMTP password
            $mail->Password = 'poqnskooqroptxnr';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = "tls";
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;
 
            //Recipients
            $mail->setFrom('mindenallathu@gmail.com', 'mindenallat.hu');
 
            //Add a recipient
            $mail->addAddress($email, $username);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            

            $mail->Subject = 'Hirdetes torles';
            $mail->Body    = '<p style="font-size: 26px;">Kedves ' . $username . '!</p><br><br> <p style="font-size: 20px;"> A mindenallat.hu oldalon a következő hirdetésed öt nap múlva törlésre kerül:</p><br><br><br><br>
 <b style="font-size: 40px;">Hirdetés címe: ' . $hirdetescime . '</b> <br><br><br><br><br><br> 

<i style="font-size: 18px;">Miért törlődik a hirdetés?<br>Minden hirdetés 30 napig lehet kint, ezt követően rendszerünk autómatikusan törli, annak érdekében, hogy az ne legyen elavult. Ezt az email-t követő hatodik napon belül törlődni fog rendszerünkből. Természetesen új hirdetést lehet kitenni a meglévő helyére. Amennyiben kérdésed van keresd fel ügyfélszolgálatunk.</i>
 ';
 
            $mail->send();

}
catch (Exception $e) {
            echo "<script type='text/javascript'>alert('Hiba lépett fel: $e')</script>";
        }
}

				}
        
    }

?>



	<section class="menu">
	 	<div class="con">
	 		<div class="left_menu"><a href="#" title="mindenallat.hu"><img src="img/logo2.webp" alt="website_logo"></a></div>
	 		<div class="right_menu">
	 			<div class="pc">
	 			<a href="#" class="">Kezdőlap</a>
	 			<a href="hirdetesek" class="">Hirdetések</a>

	 			<?php 

	 			session_start();

	 			if (isset($_SESSION['ID'])) {
	 				echo "<a href='Kezelopult/fooldal' class='cta'>Kezelőpult</a>";
	 			}
	 			else
	 			{
	 				echo "<a href='bejelentkezes' class=''>Bejelentkezés</a>
	 			<a href='regisztracio' class='cta'>+ HIRDETÉSFELADÁS</a>";
	 			}

	 			?>

	 			
	 			</div>
	 			<div class="mobile">
  <button class="hamburger-button" id="mobile"><i class="bi bi-list"></i></button>
</div>

	 		</div>
	 	</div>
	 </section> 

	 <section class="mobile_menu" id="mobile_menu">
	 	<img src="img/logo2.webp"><br>
	 	
	 			<a href="#" class="">Kezdőlap</a><br><br>
	 			<a href="hirdetesek" class="">Hirdetések</a><br><br>
	 			<?php 

	 			if (isset($_SESSION['ID'])) {
	 				echo "<a href='Kezelopult/fooldal' class=''>Kezelőpult</a><br><br>";
	 			}
	 			else
	 			{
	 				echo "<a href='bejelentkezes' class=''>Bejelentkezés</a></a><br><br>
	 			<a href='regisztracio' class=''>+ HIRDETÉSFELADÁS</a></a><br><br>";
	 			}

	 			?>
	 			<a href="#" class="" id="close">Bezárás</a>

	 </section>

	 <section class="fejlec">
	 	<div class="fejlec_con">
		 	<h1>MINDENÁLLAT.HU</h1>
		 	<h2>Hogy minden állat gazdára találjon...</h2>
		 	<p></p>
		 	<div class="flex">
		 	<a href="regisztracio" class="cta2">+ HIRDETÉSFELADÁS</a>
		 	<a href="hirdetesek" class="">HIRDETÉSEK MEGTEKINTÉSE</a>
		 	</div>
	 	</div>
	 </section>

	 <section class="kiemelt">
	 	<div class="con">
	 		<h3>Kiemelt hirdetések</h3>
	 		<div class="flex_kiemelt">
	 	<?php		

	 			mysqli_set_charset($conn, "utf8");
        $sql = "SELECT * FROM posts WHERE torolve IS NULL LIMIT 6";
					$result = $conn->query($sql);
					if ($result->num_rows < 1) {
						echo "<br><br><p style='margin-bottom: 5%; font-size: 130%;'>Nincs jelenleg egy kiemelt hirdetés se...</p><br><br>";
					}
		    		while ($row = $result->fetch_assoc()) {

		        	$cim = $row['cim'];
		        	$ar = $row['allat_ara'];
		        	$kepek = $row['kepek'];
		        	$postid = $row['ID'];
		        	$torolve = $row['torolve'];
		        	$kep = explode(",", $kepek);

		        	if ($torolve != 1) {
		        		echo "
		        	<a href='./hirdetes?id=$postid'>
					<img src='./files/$kep[0]'>
					<div class='layer'></div>
					<div class='details'>
						<h1>$cim</h1>
						<h3>$ar Ft</h3>
					</div>
				</a>
		        	";
		        	}

		        	
		        
		    		}

		    		?>

	 		</div>
	 	</div>
	 </section>

	 <section class="rek_h">
	 	<img src="img/diszallatok.jpg" alt="allatok">
	 	<div class="con_rek">
	 		<h2>Keresed a számodra tökéletes állatot?</h2>
	 		<p>Engedd, hogy elrepítsünk téged egy színes és sokszínű világba, ahol nemcsak háziállatok, hanem haszonállatok is szerepet kapnak. Fedezd fel weboldalunk végtelen választékát, és találd meg azt az állatot, ami igazi társad lehet az életed során. Hozz létre egy különleges kapcsolatot, vagy válassz egy haszonállatot, amely segít mindennapi életedben. A lehetőségek itt végtelenek, és a tökéletes társ csak egy kattintásnyira van tőled!</p>
	 		<a href="#">KÖRÜLNÉZEK!</a>
	 	</div>
	 </section>


	 <section class="hasznalat">
	 	<div class="con_hasznalat">
	 		<h1>Használat</h1>
	 		<p>A szűrők segítségével feltétel nélkül megtekintheti, böngészheti a számára érdekesnek talált tartalmakat, hirdetéseket!
A hirdetések feladásához regisztráció szükséges, melyet könnyedén megtehet az oldalon a Regisztráció fülre kattintva! 
A hirdetés feladásnál a Szabályzati feltételek tudatában, az engedély nélküli állatok hirdetésére van lehetőség, melyet szigorú keretek között ellenőrzünk! 
A hirdetésfeladás ingyenesen elérhető a megfelelő keretek között, de van lehetőség kiemelt hirdetés feladására, amelyről bővebb tájékoztatást és árakat a Kiemelt hirdetések menüpont alatt talál! 
</p>
	 		<a href="regisztracio">Feladok egy hirdetést</a>
	 	</div>
	 </section>


	 <section class="footer">
	 	<div class="footer_con">
	 		<div class="items">
	 			<h3>Dokumentációk</h3><br>
	 			<a href="pdf/ASZF.pdf">ÁSZF</a><br>
	 			<a href="pdf/adatvedelminyilatkozat.pdf">Adatvédelem</a><br>
	 			<a href="pdf/allattartasirendelet.pdf">Állattartási rendelet</a><br>
	 			<a href="pdf/mukodesiszabalyzat.pdf">Működési tájékoztató</a><br>
	 		</div>
	 		<div class="items">
	 			<h3>Népszerű oldalak</h3><br>
	 			<a href="">Kezdőlap</a><br>
	 			<a href="bejelentkezes">Bejelentkezés</a><br>
	 			<a href="regisztracio">Regisztráció</a><br>
	 			<a href="hirdetesek">Hirdetések</a><br>
	 		</div>
	 		<div class="items">
	 			<h3>Kapcsolat</h3><br>
	 			<a href="">Email: support@mindenallat.hu</a><br>
	 			<a href="">Tel: +36704555274</a><br>
	 		</div>
	 	</div>
	 	<p>MINDENALLAT.HU - 2024 | <a href="https://codeefyit.com" style="color: black;">A weboldalt készítette és forgalmazza a Codeefy</a></p>
	 </section>


<script type="text/javascript">
	
document.addEventListener("DOMContentLoaded", function() {
  const mobileButton = document.getElementById("mobile");
  const mobileMenu = document.getElementById("mobile_menu");
  const closeBtn = document.getElementById("close");

  mobileButton.addEventListener("click", function() {
    mobileMenu.classList.add("visible");
  });

  closeBtn.addEventListener("click", function() {
    mobileMenu.classList.remove("visible");
  });
});



</script>
</body>
</html>