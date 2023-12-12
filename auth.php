<?php

function authenticateUser($client, $conn) {
    if (!isset($_SESSION['user_token']) && isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        if (isset($token['access_token'])) {
            $client->setAccessToken($token['access_token']);
            
            // További kód...

        } else {
            // Hiba: Az "access_token" kulcs nem található a válaszban.
            echo "<script>alert('Hiba az access token beolvasásakor. Lejárt munkamenet, kérlek próbáld újra.');</script>";
            die("Hiba az access token beolvasásakor");
        }

        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $userinfo = [
            'email' => $google_account_info['email'],
            'username' => $google_account_info['givenName'],
            'verifiedEmail' => $google_account_info['verifiedEmail'],
            'token' => $google_account_info['id'],
        ];

        // checking if user is already exists in database
        $sql = "SELECT * FROM users WHERE email ='{$userinfo['email']}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // user is exists
            $userinfo = mysqli_fetch_assoc($result);
            $token = $userinfo['token'];
        } else {
            // user is not exists

            $id = rand(10000,100000);
            $ip = getIPAddress();
            $verification_code = rand(10000,100000);
            $pwd = 'cfgvdrgth';
            $ver = 1;
            $pwdsecound = password_hash($pwd, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (ID, username, email, pwd, token, v_code, ver, ip) VALUES ($id, '{$userinfo['username']}', '{$userinfo['email']}', '$pwdsecound', '{$userinfo['token']}', $verification_code, $ver, '$ip')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $token = $userinfo['token'];
            } else {
                echo "<script>alert('User is not created');</script>";
                die();
            }
        }

        $_SESSION['user_token'] = $token;
    } else {
        $usertoken = $_SESSION['user_token'];
        // checking if user is already exists in database
        $sql = "SELECT * FROM users WHERE token = '$usertoken'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // user is exists
            $userinfo = mysqli_fetch_assoc($result);
        }
    }
}
