<?php 
    class pages extends Controller{
        public function __construct(){
            //echo "Controlador paginas cargado";
            $this->articuloModelo = $this->modelo('Articulo');
        }
        public function index(){
            $articulos = $this->articuloModelo->obtenerArticulos();
            
            $datos = [
                'titulo' => 'Welcome to my MVC',
                'articulos' => $articulos
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