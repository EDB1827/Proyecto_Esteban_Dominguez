<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>¿Estas seguro de querer borrar la tarea <?= $_GET['id'] ?> ?</h3>
    <a href="../controllers/controlador_borrar.php?id=<?= $_GET['id'] ?>">Si</a>
    <a href="..//controllers/procesarlistaTareas.php">No</a>
</body>

</html>