<?php
    //Clase controlador principal
    //Se encarga de poder cargar los modelos y las vistas
    class Controller{
        //cargar modelo
        public function modelo($modelo){
            //carga 
            require_once '../app/models/'.$modelo.'.php';
            //Instanciar el modelo
            return new $modelo();
        }
        public function view($vista,$datos = []){
            if(file_exists('../app/views/'.$vista.'.php')){
                require_once '../app/views/'.$vista.'.php';
            }else{
                die('view doesnt exists');
            }
            
        }
        
    }
?>