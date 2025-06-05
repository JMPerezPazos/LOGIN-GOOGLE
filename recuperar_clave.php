<html>
    <head>RECUPERAR CLAVE<head>
    <body>
        <form action="recuperar_clave.php" method="post">
            Email<input type="email" name="email" placeholder="ingrese el email">
            <br><input type="submit" value="enviar">
        </form>
            <a href="TP LOGIN LUPPINO, DOBARRO Y PEREZ PAZOS.html">Registrarse</a>
            <a href="login.php">Iniciar Sesion</a>
        <?php
        include("conexion.php");

            if (isset($_POST['email']) && !empty($_POST['email'])){

                $email = mysqli_real_escape_string($conex,$_POST['email']);
                $c = "SELECT *, IFNULL(email, 'usuarios') as email FROM usuarios WHERE email = '$email' LIMIT 1";
                $f= mysqli_query($conex,$c);
                $a= mysqli_fetch_assoc($f);
                if (!$a){
                    $_SESSION['ERROR'] = 'Usuario inexistente';
                    die();
                }

            $token = md5($a['email'] . time() . rand(1000, 9999));
		    $clave_nueva = rand(10000000, 99999999);
		    $idusuario = $a['email'];
		    $c2 = "INSERT INTO recuperar (email, token, fecha_alta, clave_nueva) VALUES ('$email', '$token', NOW(), '$clave_nueva') ON DUPLICATE KEY UPDATE token='$token', clave_nueva='$clave_nueva'";
            mysqli_query($conex, $c2);
            }
        $link = "http://localhost/TP_LOGIN/recuperar_clave_confirmar.php?e=$email&t=$token";

        $mensaje = <<<EMAIL
		    <p>Hola {$a['email']}</p>
		    <p>Has solicitado recuperar tu contraseña. El sistema te ha generado una nueva clave que es: <code style='background: lightyellow; color: darkred; padding: 1px 2px;'>$clave_nueva</code></p>
		    <p>Pero antes de poder usarla, deberás hacer <a href='$link'>clic en este vínculo</a> o copiar este código en la URL de tu navegador</p>
		    <code style='background: black; color: white; padding: 4px;'>$link</code>
		    <p>Si tú no has hecho esta solicitud, ignora el presente mensaje</p>
		EMAIL;

		echo $mensaje;
        ?>

    </body>
<html>

