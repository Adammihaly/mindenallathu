<?php

    error_reporting(0);
    ini_set('display_errors', 0);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload1.php';


if(isset($_POST["sub"])) {
	
	require_once 'functions.inc.php';
    require_once 'conn.php';
    require_once 'bis.php';


	$name = $_POST['felhasznalonev'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
    $pwds = $_POST['pwds'];
    $id = rand(10000,100000);
    $token = rand(10000000000000000,199999999999999999);
    $ip = getIPAddress(); 
    $verification_code = rand(10000,100000);


    if ($pwd != $pwds) {
        header("Location: ../regisztracio?error=pwdnm");
        exit();
    }


    $name = bis($name);  
    $pwd = vedelem_sql($pwd);      
    $email = bis($email);        
	  
		
        
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
        header("Location: ../regisztracio?error=wrongemail");
        exit();
  }


		if (uidLetezik($conn, $name, $email) !== false) {
            header("Location: ../regisztracio?error=uidEx");
            exit();
		}

		$mail = new PHPMailer(true);
 
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'mail.nethely.hu';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'system@codeefyit.com';
 
            //SMTP password
            $mail->Password = 'CodITfee0025';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = "tls";
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 1025;
 
            //Recipients
            $mail->setFrom('system@codeefyit.com', 'mindenallat.hu');
 
            //Add a recipient
            $mail->addAddress($email, $name);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            

            $mail->Subject = 'Email cim hitelesitese';
            $mail->Body    = '<p style="font-size: 26px;">Kedves regisztrálni kívánó ' . $name . '!</p><br><br> <p style="font-size: 20px;"> Ahhoz, hogy a továbbiakban folytatni tudd a regisztrációt a mindenallat.hu oldalán, meg kell erősítened az email címed.<br>Kérlek írd be a következő megerősítő kódot a megnyílt hitelesítő ablakba:</p><br><br><br><br>
 <b style="font-size: 40px;">' . $verification_code . '</b> <br><br><br><br><br><br> 

<i style="font-size: 18px;">Amennyiben nem nyílt meg a hitelesítő ablak kérlek próbáld újra, vagy keresd fel  ügyfél szolgálatunk web oldalunkon, illetve a mindenallathu@gmail.com vagy a support@mindenallat.hu címen! Amennyiben nem hitelesíted egy megadott időn belül fiókodat az adat bázisból ki fogja rendszerünk törölni. Kellemes időtöltést kívánunk.</i>
 ';
 
            $mail->send();



		createUser($conn, $id, $name, $email, $pwd, $token, $ip, $verification_code);

}
catch (Exception $e) {
            echo "<script type='text/javascript'>alert('Hiba lépett fel: $e')</script>";
        }
}

else
{
      header("Location: ../regisztracio?error=problem");
            exit();
}