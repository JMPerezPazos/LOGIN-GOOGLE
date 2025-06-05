<html>
<head><title>Eliminar.php</title></head>
<body>
<div align="center">
    <h1>Borrar un registro</h1>
    <br><br>

    <form method="POST" action="eliminar2.php">
        <select name="email">
            <?php
            include("conexion.php");

            $sSQL = "SELECT email FROM usuarios ORDER BY email";
            $result = mysqli_query($conex, $sSQL);

            while($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row['email'] . '">' . $row['email'] . '</option>';
            }

            mysqli_free_result($result);
            ?>
        </select>
        <br><br>
        <input type="submit" value="Borrar">
    </form>
</div>
<a href="TP LOGIN LUPPINO, DOBARRO Y PEREZ PAZOS.html">Añadir un nuevo registro</a><br>
<a href="eliminar.php">Borrar un registro</a><br>
</body>
</html>
