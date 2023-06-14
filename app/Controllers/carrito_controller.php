<?php
namespace App\Controllers;
use App\Models\ventas_cabecera_model;
use App\Models\ventas_detalle_model;
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
        $listaProd['productos'] = $productoModel->getProductosCliente();

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

        if($rowid == "all"){
            $cart->destroy();
        }else{
            $cart->remove($rowid);
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
        $productosCart = $cart->contents();
        $request = \Config\Services::request();
        $montoTotal = 0;

        foreach($productosCart as $producto){
            $montoTotal += $producto["price"] * $producto["qty"];
        }

        $venta_cabecera = new Ventas_cabecera_model();
        $idCabecera = $venta_cabecera->insert(["total_venta" => $montoTotal, "usuario_id" => session()->id_usuario]);

        $venta_detalle = new Ventas_detalle_model();
        $productoModel = new Productos_model();

        foreach($productosCart as $productoCart){
            $venta_detalle->insert(["venta_id" => $idCabecera, 
                                    "producto_id"=>$productoCart["id"],
                                    "cantidad" => $productoCart["qty"],
                                    "precio" => $productoCart["price"]]);
            $stockViejo = $productoModel->getProducto($producto["id"]);
            $stockActual = $stockViejo["stock"] - $producto["qty"];
            $productoModel->updateStock($producto["id"], $stockActual);
        }
        $cart->destroy();
        session()->setFlashdata('success', 'Compra realizada con Exito');
        return $this->response->redirect(base_url('/productos'));
    }

    public function sumar_carrito(){
        $cart = \Config\Services::cart();

        $cantidad = $cart->getItem($this->request->getGet("id"))["qty"];
        $cantidadMax = $cart->getItem($this->request->getGet("id"))["stock"];
        
        if($cantidad < $cantidadMax){ 
            $cart->update(array("rowid" => $this->request->getGet("id"),"qty" => $cantidad+1));
        }
        return redirect()->back()->withInput();
    }

    public function restar_carrito(){
        $cart = \Config\Services::cart();
        $productos = $cart->contents();
        $cantidad = $cart->getItem($this->request->getGet("id"))["qty"];
     
        if($cantidad > 1){ 
            $cart->update(array("rowid" => $this->request->getGet("id"), "qty" => $cantidad-1));
        }
        return redirect()->back()->withInput();
    }

    public function borrar_carrito(){
        $cart = \Config\Services::cart();
        $cart->destroy();

        return redirect()->to(base_url('muestro'));
    }

    public function devolver_carrito(){
        $cart = \Config\Services::cart();
        return $cart->contents();
    }

    public function eliminar_carrito(){
        $cart = \Config\Services::cart();
        $session = session();

        $cart->destroy();
        $session->set('cart', 0);

        return redirect()->to(base_url('muestro'));
    }

    public function carroCompra(){

        $session=session();
        $cart = \Config\Services::Cart();

        $productoModel = new Producto_Model();
        $data['producto'] = $productoModel->findAll();
        $data['cart'] = $this->request->getVar('cart');

        $dato = array('titulo' => 'Todos los Productos');
    
        echo view('front/head', $dato);
        echo view('front/navbar');
        echo view('back/carrito/carrito_parte_view',$data);
        echo view('front/pie');
    }
}