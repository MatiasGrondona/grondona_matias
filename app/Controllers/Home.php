<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Controllers;
use App\Models\productos_model;
use App\Models\ofertas_model;

class Home extends BaseController
{
    public function index()
    {
        return $this->home();
    }
    
    public function home(){
        $data = array('titulo' => 'PetFun');
        $ofertasModel = new Ofertas_model();
        $prodOferta['productos'] = $ofertasModel->getOfertasActivas();
        
        $productoModel = new Productos_model();
        //$listaProd['productos'] = $productoModel->getTodosProductos();
        $listaProd['productos'] = $productoModel->getProductosCliente();

        return view('front/header', $data) 
        . view('front/navbar')
        . view('front/carrusel3', $prodOferta) 
        . view('back/producto/productos', $listaProd) 
        . view('front/pie');
    }

    public function panelControl(){
        $data = array('titulo' => 'Panel de Control');

        return view('front/header', $data) 
        . view('front/navbar')
        . view('front/adminDashboard')
        . view('front/pie');
    }
    
    public function login(){
        $data = array('titulo' => 'Inicial Sesión');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('front/login') 
        . view('front/pie');
    }

    public function nuevoUsuario(){
        $data = array('titulo' => 'Registro');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/usuario/nuevoUsuario') 
        . view('front/pie');
    }

    public function nosotros(){
        $data = array('titulo' => 'Quienes Somos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('front/nosotros') 
        . view('front/pie');
    }

    public function productos(){
        $data = array('titulo' => 'Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/productos') 
        . view('front/pie');
    }
    
    public function nuevoProducto(){
        $data = array('titulo' => 'Agregar Producto');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/nuevoProducto') 
        . view('front/pie');
    }

    public function administrarProductos(){
        $data = array('titulo' => 'Administrar Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/administrarProductos') 
        . view('front/pie');
    }

    public function inProgressViews(){
        $data = array('titulo' => 'Vistas en proceso');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('front/inProgressViews') 
        . view('front/pie');
    }

    public function contacto(){
        $data = array('titulo' => 'Contacto');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/contacto/contacto') 
        . view('front/pie');
    }

    public function terminos(){
        $data = array('titulo' => 'Terminos y Condiciones');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('front/terminos') 
        . view('front/pie');
    }

    public function comercializacion(){
        $data = array('titulo' => 'Comercialización');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('front/comercializacion') 
        . view('front/pie');
    }

    public function detalleProducto(){
        $data = array('titulo' => 'Nombre Producto');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/detalleProducto') 
        . view('front/pie');
    }
    
}