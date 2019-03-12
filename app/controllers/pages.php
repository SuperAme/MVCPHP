<?php 
    class pages extends Controller{
        public function __construct(){
            //echo "Controlador paginas cargado";
            //$this->articuloModelo = $this->modelo('Articulo');
        }
        public function index(){
            //$articulos = $this->articuloModelo->obtenerArticulos();
            
            $datos = [
                'titulo' => 'Welcome to my MVC',
                
            ];
            $this->view('Pages/ini',$datos);
        }
        
    }
?>