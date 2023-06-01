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

    public function add(){
        $cart = \Config\Services::cart();

        $request = \Config\Services::request();
        $cart->insert(array(
            'id' => $request->getPost('id'),
            'qty' => 1,
            'price' => $request->getPost('precio_venta'),
            'name' => $request->getPost('nombre_prod'),
        ));
        return redirect()->back()->withInput();
    }

    public function actualiza_carrito(){
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        $cart->update(array(
            'id' => $request->getPost('id'),
            'qty' => 1,
            'price' => $request->getPost('precio_venta'),
            'name' => $request->getPost('nombre_prod'),
        ));
        return redirect()->back()->withInput();
    }
}