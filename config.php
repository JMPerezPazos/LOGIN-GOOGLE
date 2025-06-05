<?php
    require_once 'vendor/autoload.php';
    
    $clientID= '543600671002-uhssfsdgk879oenqv03s3pmkcok567j5.apps.googleusercontent.com';
    $clientSecret ='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';
    $redirectUri = 'http://localhost/TP_LOGIN/auten.php';

    //creamos un cliente
    $client = new Google_Client();
    $client ->setClientId($clientID);
    $client ->setClientSecret($clientSecret);
    $client ->setRedirectUri($redirectUri);
    $client ->addScope("email");
    $client ->addScope("profile");
?>