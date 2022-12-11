<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controller/borrar_tarea.php" method="post">
        <h3>¿Estas seguro de querer borrar la tarea <?= $_GET['id'] ?> ?</h3>
        <a href="../controller/borrar_tarea.php?id=<?= $_GET['id'] ?>">Si</a>
        <a href="..//controller/procesar_lista_tarea.php">No</a>
    </form>
</body>

</html>