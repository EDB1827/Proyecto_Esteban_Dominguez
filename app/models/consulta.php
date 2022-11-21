<?php

class consulta
{
    public $stmt;
    public $pdo;
    static $_instance;
 
    /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
    public function __construct(){
       $this->conectar();
    }
 
    /*Evitamos el clonaje del objeto. Patrón Singleton*/
    public function __clone(){ }
 
    /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
    public static function getInstance(){
       if (!(self::$_instance instanceof self)){
          self::$_instance=new self();
       }
       return self::$_instance;
    }
 
    /*Realiza la conexión a la base de datos.*/
    public function conectar(){
     $dsn = 'mysql:dbname=gestion_tarea;host=localhost';
     $user = 'root';
     $passwd = '';
     
     try {
         $this->pdo = new PDO($dsn, $user, $passwd);
     } catch (PDOException $e) {
         echo 'Falló la conexión: ' . $e->getMessage();
     }
    }
    function getProvincia(){
     $this->stmt = $this->pdo->prepare('SELECT codPoblacion,nombre FROM poblacion');
     $this->stmt->execute();
 
     $provincias = array();
     while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
         $provincias[$row['codPoblacion']] = $row['nombre'];
     }
     return $provincias;
 }

 function getOperarios(){
    $this->stmt = $this->pdo->prepare('SELECT nombre, apellidos FROM usuario WHERE admin1 = 0');
    $this->stmt->execute();
    $operarios = array();
    while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
        $operarios[$row['nombre']] = $row['apellidos'];
    }
    return $operarios;
}
 
 }
 ?>
