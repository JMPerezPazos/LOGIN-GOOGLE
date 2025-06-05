<html>
    <head>eliminar2.php</head>
    <body>
    <?php
        include ("conexion.php");
        $sSQL="DELETE FROM usuarios WHERE email ='{$_POST['email']}'";
        mysqli_query($conex,$sSQL);
    ?>

        <h1><div align="center">Registro Borrado</div></h1>
        <a href="TP LOGIN LUPPINO, DOBARRO Y PEREZ PAZOS.html">Registrarse</a>
    </body>
</html>