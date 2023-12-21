<?php
/* 
| Developed by: Tauseef Ahmad
| Last Upate: 13-12-2020 04:46 PM
| Facebook: www.facebook.com/ahmadlogs
| Twitter: www.twitter.com/ahmadlogs
| YouTube: https://www.youtube.com/channel/UCOXYfOHgu-C-UfGyDcu5sYw/
| Blog: https://ahmadlogs.wordpress.com/
 */ 
 
error_reporting(E_ALL);
    ini_set('display_errors', 1);
 
 // Include the autoloader provided in the SDK
require_once(__DIR__.'/Facebook/autoload.php');

define('APP_ID', '899225278486630');
define('APP_SECRET', '8fc1e16e11164fe3445c855cf90aae48');
define('API_VERSION', 'v2.5');
define('FB_BASE_URL', 'https://mindenallat.hu/kezelopult');

define('BASE_URL', 'https://mindenallat.hu/kezelopult');

if(!session_id()){
    session_start();
}


// Call Facebook API
$fb = new Facebook\Facebook([
 'app_id' => APP_ID,
 'app_secret' => APP_SECRET,
 'default_graph_version' => API_VERSION,
]);


// Get redirect login helper
$fb_helper = $fb->getRedirectLoginHelper();


// Try to get access token
try {
    if(isset($_SESSION['fuser_token']))
        {$accessToken = $_SESSION['fuser_token'];}
    else
        {$accessToken = $fb_helper->getAccessToken();}
} catch(FacebookResponseException $e) {
     echo 'Facebook API Error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK Error: ' . $e->getMessage();
      exit;
}

?>