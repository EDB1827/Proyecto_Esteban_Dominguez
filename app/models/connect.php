<?php
$dsn = 'mysql:dbname=gestion_tarea;host=localhost';
$user = 'root';
$passwd = '';

try {
    $pdo = new PDO($dsn, $user, $passwd);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}
?>
