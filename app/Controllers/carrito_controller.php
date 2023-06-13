<?php
namespace App\Controllers;
use App\Models\ventasCabecera_model;
use App\Models\ventasDetalle_model;
use App\Models\productos_model;
use App\Models\usuarios_model;
use CodeIgniter\Controller;

class Carrito_controller extends BaseController {
    public function __construct(){
        helper(['form', 'url', 'cart']);

        $sessions = session();
        $cart = \Config\Services::cart();
        $cart->contents();
    }

    public function index(){

    }

    public function catalogo(){
        $session = session();

        $data = array('titulo' => 'todos los productos');
        $productoModel = new Productos_model();
        $listaProd['productos'] = $productoModel->getTodosProductos();

        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/Productos', $listaProd) 
        . view('front/pie');
    }

    public function add(){
        $cart = \Config\Services::cart();

        $request = \Config\Services::request();
        $cart->insert(array(
            'id' => $request->getPost('id_producto'),
            'qty' => 1,
            'price' => $request->getPost('precio_venta'),
            'name' => $request->getPost('nombre_prod'),
        ));
        return redirect()->back()->withInput();
    }

    public function remove($rowid){
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();

        if($rowid = "all"){
            $cart->destroy();
        }else{
            $cart-remove($rowid);
        }

        return redirect()->back()->withInput();
    }

    public function actualiza_carrito(){
        $cart = \Config\Services::cart();

        $request = \Config\Services::request();

        $cart->update(array(
            'id' => $request->getPost('id_producto'),
            'qty' => 1,
            'price' => $request->getPost('precio_venta'),
            'name' => $request->getPost('nombre_prod'),
        ));
        return redirect()->back()->withInput();
    }

    public function muestra(){
        helper(['form', 'url', 'cart']);
        $cart = \Config\Services::cart();
        $cart = $cart->contents();

        $data = array('titulo' => 'Confirmar Compra');
        /*
        $session = session();
        $nombre = $session()->get('nombre');
        $email = $session()->get('email');
        $perfil_id = $session()->get('perfil_id');
        */
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/carrito/carrito_parte_view') 
        . view('front/pie');
    }

    public function comprar_carrito(){
        $cart = \Config\Services::cart();
        $productos = $cart->contents();
        $request = \Config\Services::request();
        $montoTotal = 0;

        foreach($productos as $producto){
            $montoTotal += $producto["price"] * $producto["qty"];
        }

        $venta_cabecera = new Ventas_cabecera_model();
        $idCabecera = $venta_cabecera->insert(["total_venta" => $montoTotal, "usuario_id" => session()->id]);

        $venta_detalle = new Ventas_detalle_model();
        $productoModel = new Productos_model();

        foreach($productos as $producto){
            $venta_detalle->insert(["venta_id" => $id_cabecera, 
                                    "producto_id"=>$producto["id"],
                                    "stock" => $producto["qty"],
                                    "precio" => $producto["price"]]);
            $productoModel->update($producto["id"], ["stock" => $producto["stock"] - $producto["qty"]]);
        }
    }
}