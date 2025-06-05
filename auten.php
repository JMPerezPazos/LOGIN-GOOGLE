<?php
require 'config.php';

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        // Obtener datos del usuario
        $oauth = new Google_Service_Oauth2($client);
        $userData = $oauth->userinfo->get();

        echo "<h3>Bienvenido, " . $userData->name . "</h3>";
        echo "<p>Email: " . $userData->email . "</p>";
        echo "<img src='" . $userData->picture . "' alt='Foto'>";
    } else {
        echo "Error al obtener token: " . $token['error'];
    }
} else {
    echo "No se recibió código de autenticación.";
}
?>
