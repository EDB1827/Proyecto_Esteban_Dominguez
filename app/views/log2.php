<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    
    <form action="../controller/validar_login.php" method="post">
    <h3>Login</h3> <br>
    <label>Usuario</label>
    <input type="text" name="correo" class="form-control"> <br>
    <label>Contraseña</label>
    <input type="text" name="clave" class="form-control"> <br>
    <button class="btn btn-primary mb-3" type="submit">Enviar</button>
    </form>

</body>
</html>