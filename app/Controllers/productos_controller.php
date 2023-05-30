<?php
namespace App\Controllers;
use App\Models\usuarios_model;
use App\Models\productos_model;
use CodeIgniter\Controller;

class Productos_controller extends Controller {

    public function __construct() {
        helper(['form', 'url', 'html']);
    }

    public function index(){
        $productoModel = new Productos_model();
        $listaProd['productos'] = $productoModel->orderBy('id', 'DESC')->findAll();

        //$listaProd['productos'] = $this->db->get('productos')->result_array();

        $data = array('titulo' => 'Administrar Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/administrarProductos', $listaProd) 
        . view('front/pie');
    }

    public function agregarProductoView(){
        $productoModel = new Productos_model();
        $listaProd['obj'] = $productoModel->orderBy('id', 'DESC')->findAll();

        $data['titulo']='Alta Producto';
        $data = array('titulo' => 'Administrar Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/nuevoProducto', $listaProd) 
        . view('front/pie');
    }

    public function agregarProducto(){
        $input = $this->validate([
            'nombre_prod'   => 'required|min_length[3]|max_length[100]',
            'descripcion' => 'required|min_length[3]|max_length[500]',
            'size'    => 'required',
            'precio_costo'  => 'required',
            'precio_venta'     => 'required',
            'stock_min'    => 'required',
            'stock'     => 'required',
            'imagen' => 'required|uploaded[imagen]|max_size[imagen,5120]|mime_in[imagen,image/jpg,image/jpeg,image/png]|ext_in[imagen,png,jpg,jpeg]|is_image[imagen]'
        ],);

        $productoModel = new Productos_model();

        if (!$input) {
            session()->setFlashdata('success', 'error falla el input');
            $data['titulo']='Agregar Producto'; 
             echo view('front/header',$data);
             echo view('front/navbar');
             echo view('back/producto/nuevoProducto', ['validation' => $this->validator]);
             echo view('front/pie');

        } else {
            $imagen = $this->request->getFile('imagen');
            $nombre_aleatorio = $imagen->getRandomName();
            $imagen->move(ROOTPATH.'assets/upload', $nombre_aleatorio);
        
            $productoData = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'descripcion'=> $this->request->getVar('descripcion'),
                'size'=> $this->request->getVar('size'),
                'precio_costo'=> $this->request->getVar('precio_costo'),
                'precio_venta'=> $this->request->getVar('precio_venta'),
                'stock_min'=> $this->request->getVar('stock_min'),
                'stock'=> $this->request->getVar('stock'),
                'imagen'=> $imagen->getName(),
            ];
            $producto = new Productos_model();
            $producto->insert($productoData);

            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
            session()->setFlashdata('success', 'Producto Agregado con Exito');
            return $this->response->redirect(base_url('/adminProductos'));
        }
    }

    public function editarProducto(){

    }
    
    public function eliminarProducto(){

    }

    public function listadoProductosCliente(){
        $productoModel = new Productos_model();
        $listaProd['productos'] = $productoModel->orderBy('id', 'DESC')->findAll();

        $data = array('titulo' => 'Listado de Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/Productos', $listaProd) 
        . view('front/pie');
    }
}