<?php

// Sesión iniciada. Todavía no se especificamente para que es
session_start();

// Si hay una sesion iniciada, no va al login sino va al contenido
if(isset($_SESSION['user'])) {
    header("location:contenido.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
</head>
<body>
<div class="container">
    <h1 class="text-center mt-3">Login</h1>
    <form action="" method="post">
        <div class="form-row">
            <div class="col">
                <label for="usuario">Usuario: </label>
                <input type="text" class="form-control" name="usuario">
            </div>
            <div class="col">
                <label for="pass">Contraseña: </label>
                <input type="password" class="form-control" name="pass">
            </div>
        </div>
        <button type="submit" name="login" class="mt-2 btn btn-primary">Iniciar sesión</button>
    </form>
    <div>
        <p>No está registrado? <a href="index.php">Registro</a> </p>
    </div>
    <?php
        require_once "./Base.php";

        //Base de datos
        $host="localhost";
        $usuario="root";
        $pass="";
        $bd="alumnos";
        $port="3307";
        $base=new Base($host,$usuario,$pass,$bd,$port);

        // Operacion de registro de usuario proveniente de index.php
        if(isset($_POST['submit'])){
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $usuario=$_POST['usuario'];
//            $pass=password_hash($_POST['pass'],PASSWORD_BCRYPT);
            $pass=$_POST['pass'];
            $base->registrarUsuario($nombre,$apellido,$usuario,$pass);
            echo "Registrado";
        }

        // Inicia sesión. Si está ok redirecciona a contenido.php. Sino se queda
        if(isset($_POST['login'])){
            if($base->usuarioCorrecto($_POST['usuario']) && $base->contraseniaCorrecta($_POST['usuario'],$_POST['pass'])) {
                $_SESSION['user']=$_POST['usuario'];
                header("location:contenido.php");
            }
            else echo "Mal";
        }
    ?>
</div>
</body>
</html>