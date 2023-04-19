<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = array('titulo' => 'Design Testing');

        return view('header', $data) . view('navbar') . view('administrarProductos') . view('footer');
    }
    
    public function home(){
        $data = array('titulo' => 'PetFun');
        return view('header', $data) . view('navbar') . view('front/carrusel_y_login') . view('productos') . view('footer');
    }

    public function login(){
        $data = array('titulo' => 'Login');
        return view('header', $data) . view('navbar') . view('login') . view('footer');
    }

    public function nosotros(){
        $data = array('titulo' => 'Quienes Somos');
        return view('header', $data) . view('navbar') . view('nosotros') . view('footer');
    }

    public function productos(){
        $data = array('titulo' => 'Productos');
        return view('header', $data) . view('navbar') . view('productos') . view('footer');
    }
    
    public function nuevoProducto(){
        $data = array('titulo' => 'Agregar Producto');
        return view('header', $data) . view('navbar') . view('nuevoProducto') . view('footer');
    }

    public function administrarProductos(){
        $data = array('titulo' => 'Administrar Productos');
        return view('header', $data) . view('navbar') . view('administrarProductos') . view('footer');
    }

    public function inProgressViews(){
        $data = array('titulo' => 'Vistas en proceso');
        return view('header', $data) . view('navbar') . view('inProgressViews') . view('footer');
    }

    public function contacto(){
        $data = array('titulo' => 'Contacto');
        return view('header', $data) . view('navbar') . view('front/contacto') . view('footer');
    }
    
}

