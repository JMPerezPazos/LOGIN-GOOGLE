<?php
    require_once 'vendor/autoload.php';
   
    //creamos un cliente
    $client = new Google_Client();
    $client ->setClientId($clientID);
    $client ->setClientSecret($clientSecret);
    $client ->setRedirectUri($redirectUri);
    $client ->addScope("email");
    $client ->addScope("profile");
?>
