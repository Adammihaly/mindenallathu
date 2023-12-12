<?php


require_once 'config.php';
require_once 'fconfig.php';
require_once 'php/functions.inc.php';
require_once 'php/conn.php';

$permissions = ['email'];

function authenticateFacebookUser($fb, $fb_helper, $accessToken, $conn) {



if (isset($accessToken))
{
  if (!isset($_SESSION['fuser_token'])) 
  {
    //get short-lived access token
    $_SESSION['fuser_token'] = (string) $accessToken;
    
    //OAuth 2.0 client handler
    $oAuth2Client = $fb->getOAuth2Client();
    
    //Exchanges a short-lived access token for a long-lived one
    $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['fuser_token']);
    $_SESSION['fuser_token'] = (string) $longLivedAccessToken;
    
    //setting default access token to be used in script
    $fb->setDefaultAccessToken($_SESSION['fuser_token']);
  } 
  else 
  {
    $fb->setDefaultAccessToken($_SESSION['fuser_token']);
  }
  
  
  //redirect the user to the index page if it has $_GET['code']
  if (isset($_GET['code'])) 
  {
    header('Location: ./');
  }
  
  
  try {
    $fb_response = $fb->get('/me?fields=name,first_name,last_name,email');
    $fb_response_picture = $fb->get('/me/picture?redirect=false&height=200');
    
    $fb_user = $fb_response->getGraphUser();
    $picture = $fb_response_picture->getGraphUser();
    
        $_SESSION['user_name'] = $fb_user->getProperty('name');
        $_SESSION['user_email'] = $fb_user->getProperty('email');
        $_SESSION['user_token'] = $fb_user->getProperty('id');

        $fb_id = $_SESSION['user_token'];
        

         // checking if user is already exists in database
  $sql = "SELECT * FROM users WHERE email ='{$fb_user->getProperty('email')}'";
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

    $sql = "INSERT INTO users (ID, username, email, pwd, token, v_code, ver, ip) VALUES ($id, '{$fb_user->getProperty('name')}', '{$fb_user->getProperty('email')}', '$pwdsecound', '{$fb_id}', $verification_code, $ver, '$ip')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $token = $fb_user->getProperty('access_token');
    } else {
      echo "User is not created";
      die();
    }
  }

  header("Location: kezelopult.php");
  exit();
    
    
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Facebook API Error: ' . $e->getMessage();
    session_destroy();
    // redirecting user back to app login page
    header("Location: ./");
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK Error: ' . $e->getMessage();
    exit;
  }
} 

}