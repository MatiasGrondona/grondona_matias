<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Usuarios_controller extends Controller {

    public function __construct() {
        helper(['form', 'url']);
    }

    public function index() 
    {
        echo "Hola mundo";
    }

    public function prueba(){
        echo "Hola mundo";
    }

    public function create(){
        $data =array('titulo' => 'Registro');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/usuario/nuevoUsuario') 
        . view('front/pie');
    }
}
?>