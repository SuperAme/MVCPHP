<?php 
    class pages extends Controller{
        public function __construct(){
            //echo "Controlador paginas cargado";
        }
        public function index(){
            $datos = [
                'titulo' => 'Welcome to my MVC'
            ];
            $this->view('Pages/ini',$datos);
        }
        public function articulo($num_registro){
            $this->view('Pages/articulo');
        }
        public function actualizar($num_registro){
            echo $num_registro;
        }
    }
?>