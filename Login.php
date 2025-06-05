<html>
    <head>LOGIN</head>
    <body>
        <form action="Login.php" method="post">
            <input type="text" name="usuario" placeholder="Usuario" required><br>
                <input type="password" name="password" placeholder="Contraseña" required><br>
                <input type="submit" value="Iniciar sesión">
        </form>
        <?php
            include("conexion.php");

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $usuario = $_POST['usuario'];
                $pass = $_POST['password']; // Asegurate que el input del form sea "password"

                $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
                $result = mysqli_query($conex, $sql);

                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    $pass_cifrada = $row['contraseña'];

                    echo "Contraseña ingresada: '$pass'<br>";
                    echo "Hash almacenado: '$pass_cifrada'<br>";

                    if (password_verify($pass, $pass_cifrada)) {
                        echo "Has iniciado sesión correctamente";
                    } else {
                        echo "Contraseña incorrecta";
                    }
            } else {
                echo "Usuario no encontrado";
            }
        }
        ?>
        <a href="TP LOGIN LUPPINO, DOBARRO Y PEREZ PAZOS.html">Registrarse</a>
        <a href="eliminar.php">Eliminar un usuario</a>
        <a href="Login.php">Login</a>
        <div class="enlace">
            <?php require('auten.php'); ?>
            <a href="<?php echo $client->createAuthUrl() ?>">Inciar Sesion Con Google</a>
        </div>
    </body>
</html>