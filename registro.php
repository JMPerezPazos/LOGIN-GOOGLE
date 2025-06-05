<?php
    include("conexion.php");
    if(isset($_POST['enviar'])){
        if(strlen($_POST['email']>=1 && strlen($_POST['password']))){
            $nombre =trim($_POST['nombre']);
            $apellido =trim($_POST['apellido']);
            $email =trim($_POST['email']);
            $pass =trim($_POST['password']);
            $usuario =trim($_POST['usuario']);
            $pass_cifrada = password_hash($pass,PASSWORD_DEFAULT, array('cost' => 12));
            $consulta ="INSERT INTO usuarios (email, contraseña, nombre, apellido, usuario) Values ('$email','$pass_cifrada','$nombre','$apellido','$usuario')";
            $resultado =mysqli_query($conex,$consulta);
            if($resultado){
                echo'<h3 class="ok">Te registraste exitosamente</h3>';
            } else{
                echo'<h3 class="bad">A ocurrido un erroe en la base de datos</h3>';
            }} else{
                echo'<h3 class="ok">Por favor, complete todos los campos</h3>';
        }
    }
?>
<a href="TP LOGIN LUPPINO, DOBARRO Y PEREZ PAZOS.html">Iniciar Sesion</a>