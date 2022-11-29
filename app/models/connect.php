<?php

class Connect{
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

    function insert($tabla, $listaValues, $campos){//Función genérica insertar en bases de datos

        $cadena = '';

            foreach($campos AS $id=>$valor){

                $cadena .= "'" . $valor . "'";
                
                if($id < (count($campos) - 1)){  //Condicion para que cuando llegue al ultimo campo no ponga coma

                    $cadena .= ",";

                }
            }
            //echo $listaValues." ".$cadena;
            $sql = "INSERT INTO " . $tabla . "(" . $listaValues . ") VALUES(" . $cadena . ")"; 
        
            $resultado = $this->pdo->prepare($sql);
            $resultado->execute(array());

        }

        public function numFilas($tabla){

            $sql = "SELECT * FROM " . $tabla; 

            $resultado = $this->pdo->prepare($sql);
            $resultado->execute();
    
            $numFilas = $resultado->rowCount();

            return $numFilas;
        }

        public function resultadosPorPagina($tabla, $empezarDesde, $tamanioPagina){

            $queryLimite = "SELECT * FROM " . $tabla . " LIMIT " . $empezarDesde . "," . $tamanioPagina;

            $resultado = $this->pdo->prepare($queryLimite);
            $resultado->execute();

            //Almacenamos el resultado de fetchAll en una variable
            $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
    

            return $datos;
        }
        public function login($correo, $clave){
            $stmt = $this->pdo->query("SELECT nif FROM usuarios WHERE correo='" . $correo . "' AND clave='" . $clave . "'");
            return $stmt->fetch();
        }
    
}
 ?>