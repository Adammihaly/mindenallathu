<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindenállat - Hitelesítés</title>
    <link rel="stylesheet" href="css/reg.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>


    <?php

        if(isset($_GET['un']))
        {
            $un = $_GET['un'];
        }
        else
        {
            header("Location: regisztracio");
            exit();
        }

    ?>


    <div class="container">
        <div class="container-register" >
            <span class="register-title">Hitelesítés</span>
            <form action="php/ver.php" method="POST">
                <label>Kedves felhasználó! Emailben küldtünk neked egy kódot, melyt az itt látható mezőbe kell beírnod a regisztráció véglegesítése érdekében.</label>
                <div class="input-box">

                    <label for="username" class="input-title">Hitelesítő kód:</label>
                    <input required type="text" name="code" placeholder="Pl: 256987" class="input">
                    <?php echo "<input type='hidden' name='un' value='$un'>"; ?>
                </div>          
            <div class="input-button">
                <button name="submit">Befejezés!</button>
            </div>
            </form>
        </div>
        <div class="container-picture"></div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>