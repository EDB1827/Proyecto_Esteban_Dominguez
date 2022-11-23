<?php

class CONNECT
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

    function getListaSelect($tabla, $c_idx, $c_value, $where='')
    {
        $this->stmt = $this->pdo->prepare('SELECT ' . $c_idx . ',' . $c_value . ' FROM ' . $tabla .' '.$where);
        $this->stmt->execute();

        $lista = array();
        while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[$row[$c_idx]] = $row[$c_value];
        }
        return $lista;
    }

    function insert($nif, $nombre, $apellidos,$clave, $correo,$telefono, $admin1){
        $sql = "INSERT INTO tareas (cod_tarea,nif_cif,nombre,telefono,descripcion,correo,poblacion,codigoPostal,
        provincia,estado,fechaCreacion,operarioEncargado,fechaRealizacion,anotacionesAnt,anotacionesPos)
        VALUES(0,'48937837R','Víctor Martínez Domínguez','657121379','Caer muro','victor1@gmail.com','Valverde del Camino',
        '21600','Huelva','P','2022-11-21','Rafael Hinestrosa','2022-11-22','Muro en mal estado','Muro derribado')";
    $resultado = $this->db->prepare($sql);
    $resultado->execute(array());

    }
    
}
 ?>