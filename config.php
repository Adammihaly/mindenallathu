<?php

require_once 'vendor/autoload.php';
require_once 'php/conn.php';

session_start();

// init configuration
$clientID = '518007610379-c2f6d2j63its7s4ivjbnm4i4q5o8gmu3.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/allat/kezelopult';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Connect to database