<?php
    /*Mapear URL ingresada en el navegador
    1.-Controlador
    2.-Métodos
    3.-Párametro*/
    class Core{
        protected $controladorActual = 'pages';
        protected $metodoActual = 'index';
        protected $parametro = [];
        //busca en controlador si existe el controlador
        public function __construct(){
            $url = $this->getUrl();
            //echo ucwords($url[0]);
            //print_r($this->getUrl());
            if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                //si existe se sete como controlador por defecto
                //echo 'yeah';
                $this->controladorActual = ucwords($url[0]);
                
                unset($url[0]);
            }//echo '../app/controllers/'.ucwords($url[0]).'php';
            //requerir controlador
            require_once '../app/controllers/'.$this->controladorActual. '.php';
            $this->controladorActual = new $this->controladorActual;
            
            //verificar la segunda parte de la URL que sería el método
            if (isset($url[1])){
                if (method_exists($this->controladorActual, $url[1])){
                    $this->metodoActual = $url[1];
                    unset($url[1]);
                }
            }
            //echo $this->metodoActual;
            $this->parametros = $url ? array_values($url) : [];
            //llamar callback con para,etros
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }
        
        public function getUrl(){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
?>