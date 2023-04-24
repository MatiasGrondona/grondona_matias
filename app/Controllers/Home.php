<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return $this->home();
    }
    
    public function home(){
        $data = array('titulo' => 'PetFun');
        return view('front/header', $data) . view('front/navbar') . view('front/productos') . view('front/pie');
    }

    public function login(){
        $data = array('titulo' => 'Inicial Sesión');
        return view('front/header', $data) . view('front/navbar') . view('front/login') . view('front/pie');
    }

    public function nosotros(){
        $data = array('titulo' => 'Quienes Somos');
        return view('front/header', $data) . view('front/navbar') . view('front/nosotros') . view('front/pie');
    }

    public function productos(){
        $data = array('titulo' => 'Productos');
        return view('front/header', $data) . view('front/navbar') . view('front/productos') . view('front/pie');
    }
    
    public function nuevoProducto(){
        $data = array('titulo' => 'Agregar Producto');
        return view('front/header', $data) . view('front/navbar') . view('front/nuevoProducto') . view('front/pie');
    }

    public function administrarProductos(){
        $data = array('titulo' => 'Administrar Productos');
        return view('front/header', $data) . view('front/navbar') . view('front/administrarProductos') . view('front/pie');
    }

    public function inProgressViews(){
        $data = array('titulo' => 'Vistas en proceso');
        return view('front/header', $data) . view('front/navbar') . view('front/inProgressViews') . view('front/carruselCartas') . view('front/pie');
    }

    public function contacto(){
        $data = array('titulo' => 'Contacto');
        return view('front/header', $data) . view('front/navbar') . view('front/contacto') . view('front/pie');
    }
    public function terminos(){
        $data = array('titulo' => 'Terminos y Condiciones');
        return view('front/header', $data) . view('front/navbar') . view('front/terminos') . view('front/pie');
    }

    public function comercializacion(){
        $data = array('titulo' => 'Comercialización');
        return view('front/header', $data) . view('front/navbar') . view('front/comercializacion') . view('front/pie');
    }
    
}

