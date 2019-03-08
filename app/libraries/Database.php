<?php 
    class Base{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASS;
        private $name = DB_NAME;
        
        private $dbh; //databaseHandler
        private $stmt; //statement
        private $error;
        
        public function __construct(){
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->name;
            //echo $dsn;
            $opciones = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            //crear instancia PDO
            try{
                $this->dbh = new PDO($dsn, $this->user,$this->password,$opciones);
                //$this->dbh->exec('set names utf-8');
            } catch (PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
        //preparamos consulta
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }
        
        //vinculamos la consulta con bind
        public function bind($parametro,$valor,$tipo = null){
            if(is_null($tipo)){
                switch(true){
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                        break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                        break;
                    case is_int ($valor):
                        $tipo = PDO::PARAM_NULL;
                        break;
                    default:
                        $tipo = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($parametro,$valor,$tipo);
        }
        //ejecutamos la consulta
        public function execute(){
            return $this->stmt->execute();
        }
        
        //obtenemos los registros
        public function registros(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        //obtener un solo registro
        public function registro(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
        //obtener cantidad de filas con rowCount
        public function rowCount(){
            $this->execute();
            return $this->stmt->rowCount();
        }
        
    }
?>