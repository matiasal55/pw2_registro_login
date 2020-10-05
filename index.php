<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-3">Registro</h1>
        <form action="login.php" method="post">
            <div class="form-row">
                <div class="col">
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="col">
                    <label for="apellido">Apellido: </label>
                    <input type="text" class="form-control" name="apellido">
                </div>
            </div>
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
            <button type="submit" name="submit" class="mt-2 btn btn-primary">Registro</button>
        </form>
        <div>
            <p>Ya está registrado? <a href="login.php">Login</a> </p>
        </div>
    </div>
</body>
</html>