<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mindenállat.hu | Hirdetések</title>
	<link rel="stylesheet" type="text/css" href="css/hirdetesek.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">
	<script type="text/javascript" src="js/hirdetesek.js" defer></script>


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

</head>
<body>

	<section class="menu">
	 	<div class="con">
	 		<div class="left_menu"><a href="#" title="mindenallat.hu"><img src="img/logo2.webp" alt="website_logo"></a></div>
	 		<div class="right_menu">
	 			<div class="pc">
	 			<a href="index" class="">Kezdőlap</a>
	 			<a href="#" class="">Hirdetések</a>
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
	 	
	 			<a href="index" class="">Kezdőlap</a><br><br>
	 			<a href="#" class="">Hirdetések</a><br><br>
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
		 	<h1>HIRDETÉSEK</h1>
		 	<h2>Keresgélj állatok között kedved szerint</h2>
		 	<div class="flex">
		 	<a href="#" class="cta2">+ HIRDETÉSFELADÁS</a>
		 	<a href="#" class="">REGISZTRÁCIÓ</a>
		 	</div>
	 	</div>
	 </section>

	 <section class="kiemelt">
	 	<div class="con">


	 		<?php 

	 	

	 		require_once 'php/conn.php';

	 		if (isset($_GET['s']) == 'true') {

	 			$allat_kortol = 0;
	 			$allat_korig = 20;
	 			$sql = "SELECT * FROM posts WHERE";
	 			$conditions = array();
	 			$allat_artol = null;
	 			$allat_arig = null;
	 			$arvan = 0;
	 			$korvan = 0;
	 			$allat_neme = null;
	 			$allat_szin = null;
	 			$allat_fajta = null;
	 			
	 			if (isset($_GET['allatok']) AND $_GET['allatok'] != null) {
	 				$allat_fele = $_GET['allatok'];
	 				$conditions[] = "allat_fele = :allat_fele";
	 			}
	 			if (isset($_GET['faj']) AND $_GET['faj'] !== null AND $_GET['faj'] != 'Összes') {
	 				$allat_fajta = $_GET['faj'];
	 				$conditions[] = "allat_fajta = :allat_fajta";
	 			}
	 			if (isset($_GET['kortol']) AND $_GET['kortol'] != null) {
	 				$allat_kortol = $_GET['kortol'];
	 				$korvan = 1;
	 			}
	 			if (isset($_GET['korig']) AND $_GET['korig'] != null) {
	 				$allat_korig = $_GET['korig'];
	 				$korvan = 1;
	 			}
	 			if (isset($_GET['nem']) AND $_GET['nem'] != null) {
	 				$allat_neme = $_GET['nem'];
	 				$conditions[] = "allat_neme = :allat_neme";
	 			}
	 			if (isset($_GET['artol']) AND $_GET['artol'] != null) {
	 				$allat_artol = $_GET['artol'];
	 				$arvan = 1;
	 			}
	 			if (isset($_GET['arig']) AND $_GET['arig'] != null) {
	 				$allat_arig = $_GET['arig'];
	 				$arvan = 1;
	 			}
	 			if (isset($_GET['szin']) AND $_GET['szin'] != null) {
	 				$allat_szin = $_GET['szin'];
	 				$conditions[] = "allat_szine = :allat_szine";
	 			}

	 			$allat_alsokor = null;
	 			$allat_felsokor = null;
	 			$allat_kortol = intval($allat_kortol);
	 			$allat_korig = intval($allat_korig);
	 			$allat_alsokor = $allat_kortol * 12;
	 			$allat_felsokor = $allat_korig * 12;



	 		}

	 		?>



	 		<section class="szurok">
	 			<div class="">

	 				<button class="kat" name="" id="button_pet">Háziállat</button>
	 				<button class="kat" name="" id="button_benefit">Haszonállat</button>
	 				<button class="kat" name="" id="button_ornament">Díszállat</button>
	 				<button class="kat" name="" id="button_other">Egyéb</button>

	 				<form action="hirdetesek">
	 					<select name="allatok" id="allatok" class="allatok">
	 						<option value='' selected='selected' disabled='disabled'>Válassz állatot</option>
						</select>
	 					<select name="faj" id="faj" class="faj">
	 						<option value='' selected='selected' disabled='disabled'>Válassz fajt</option>
						</select>
						<br>
						<label>Kor -tól:</label> <input type="number" name="kortol" class="kortol" placeholder="Kor -tól">
						<label>Kor -ig:</label> <input type="number" name="korig" class="korig" placeholder="Kor -ig">
						<select name="nem" id="faj" class="faj">
	 						<option value='' selected='selected' disabled='disabled'>Válassz nemet</option>
  						<option value="Hím">Hím</option>
  						<option value="Nőstény">Nőstény</option>
						</select>
						<br>
						<label> &nbsp;&nbsp;Ár -tól:</label> <input type="number" name="artol" class="kortol" placeholder="Ár -tól">
						<label> &nbsp;&nbsp;Ár -ig:</label> <input type="number" name="arig" class="korig" placeholder="Ár -ig">
						<select name="szin" id="faj" class="faj">
	 						<option value='' selected='selected' disabled='disabled'>Válassz színt</option>
  						<option value="Fekete">Fekete</option>
  						<option value="Fehér">Fehér</option>
						</select>
						<br>
						<input type="hidden" name="s" value="true">
						<button class="szures_gomb" name="sub">Szűrők alkalmazása</button>
	 				</form>
	 			</div>
	 		</section>

	 		<div class="flex_kiemelt">

	 			<?php 
	 				if (isset($_GET['s']) == 'true') {
	 					if (!empty($conditions)) {
    					$sql .= " " . implode(" AND ", $conditions);
						}

						$statement = $pdo->prepare($sql);

						if ($allat_fele !== null) {
						    $statement->bindParam(':allat_fele', $allat_fele);
						}
						if ($allat_fajta !== null AND $allat_fajta != 'Összes') {
						    $statement->bindParam(':allat_fajta', $allat_fajta);
						}
						if ($allat_neme !== null) {
						    $statement->bindParam(':allat_neme', $allat_neme);
						}
						if ($allat_szin !== null) {
						    $statement->bindParam(':allat_szine', $allat_szin);
						}

						$statement->execute();
		    		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

		        	$cim = $row['cim'];
		        	$ar = $row['allat_ara'];
		        	$kepek = $row['kepek'];
		        	$postid = $row['ID'];
		        	$allat_ara_p = $row['allat_ara'];
		        	$allat_kora_p = $row['allat_kora'];
		        	$kep = explode(",", $kepek);
		        	$mehet = 0;

		        	if ($arvan == 1) {


				        	if ($allat_artol != null AND $allat_arig != null) {
				        		if ($allat_artol < $allat_ara_p AND $allat_ara_p < $allat_arig) {
				        			$mehet = $mehet + 1;
				        		}
				        	}

				        	if ($allat_artol != null AND $allat_arig == null) {
				        		if ($allat_artol < $allat_ara_p) {
				        			$mehet = $mehet + 1;
				        		}
				        	}

				        	if ($allat_artol == null AND $allat_arig != null) {
				        		if ($allat_arig > $allat_ara_p) {
				        			$mehet = $mehet + 1;
				        		}
				        	}

		        	}


		        	if ($korvan == 1) {


					        	if ($allat_alsokor != null AND $allat_felsokor != null) {
					        		if ($allat_alsokor < $allat_kora_p AND $allat_kora_p < $allat_felsokor) {
					        			$mehet = $mehet + 1;
					        		}
					        	}

					        	if ($allat_alsokor != null AND $allat_felsokor == null) {
					        		if ($allat_alsokor < $allat_kora_p) {
					        			$mehet = $mehet + 1;
					        		}
					        	}

					        	if ($allat_alsokor == null AND $allat_felsokor != null) {
					        		if ($allat_felsokor > $allat_kora_p) {
					        			$mehet = $mehet + 1;
					        		}
					        	}

		        }

		        

		        	if ($arvan == 1 AND $korvan == null) {
		        		if ($mehet == 1) {
		        		
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
		        	else if ($korvan == 1 AND $arvan == null) {
		        		if ($mehet == 1) {
		        		
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
		        	else if($arvan == 1 AND $korvan == 1){
		        		 if($mehet == 2) {
		        		
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
		        	else if($arvan == null AND $korvan == null){
		        		 if($mehet == 0) {
		        		
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


		        
		    		}
	 				}
	 				else
	 				{

	 				mysqli_set_charset($conn, "utf8");
        $sql = "SELECT * FROM posts";
					$result = $conn->query($sql);
		    		while ($row = $result->fetch_assoc()) {

		        	$cim = $row['cim'];
		        	$ar = $row['allat_ara'];
		        	$kepek = $row['kepek'];
		        	$postid = $row['ID'];
		        	$kep = explode(",", $kepek);

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
	 			<a href="">Bejelentkezés</a><br>
	 			<a href="">Regisztráció</a><br>
	 			<a href="">Hirdetések</a><br>
	 		</div>
	 		<div class="items">
	 			<h3>Kapcsolat</h3><br>
	 			<a href="">Email: minta@gmail.com</a><br>
	 			<a href="">Tel: +381 69 17 60 672</a><br>
	 		</div>
	 	</div>
	 	<p>MINDENALLAT.HU - 2023 | A weboldalt készítette Mihály Ádám</p>
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