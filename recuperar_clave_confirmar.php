<?php
    include("conexion.php");

    $email = $_GET['e'];
    $token = $_GET['t'];

    $c = "SELECT clave_nueva FROM recuperar WHERE email='$email' AND token='$token' LIMIT 1 ";
    $f = mysqli_query( $conex, $c );
    $a = mysqli_fetch_assoc($f);
    if( ! $a ){
	    echo $_SESSION['error'] = 'Solicitud no encontrada';
	    //header("Location: ../);
	    die( );
}

//OBTENEMOS LA CLAVE Y ACTUALIZAMOS AL USUARIO

    $clave = $a['clave_nueva'];
    //$clave_=sha1($clave);
    $clave_ = password_hash($clave,PASSWORD_DEFAULT, array("cost"=>10));
    $c2 = "UPDATE usuarios SET contraseña='$clave_' WHERE email='$email' LIMIT 1";
    mysqli_query($conex, $c2);

    $c3 = "DELETE FROM recuperar WHERE email='$email' LIMIT 1";
    mysqli_query($conex, $c3);
    echo $_SESSION['rta'] = 'Contraseña actualizada satisfactoriamente, ya se puede loguear';
?>
<html>
    <body>
        <a href="Login.php">Login</a>