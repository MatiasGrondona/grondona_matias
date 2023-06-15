<?php
namespace App\Controllers;
use App\Models\usuarios_model;
use App\Models\productos_model;
use App\Models\ofertas_model;
use App\Models\size_model;
use CodeIgniter\Controller;

class Productos_controller extends Controller {

    public function __construct() {
        helper(['form', 'url', 'html']);
    }

    public function index(){

        $productoModel = new Productos_model();
        $listaProd['productos'] = $productoModel->getTodosProductos();

        //$listaProd['productos'] = $this->db->get('productos')->result_array();
        /*
        echo '<pre>'; 
            print_r($listaProd); 
        echo '<pre>';
        */

        $data = array('titulo' => 'Administrar Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/administrarProductos', $listaProd) 
        . view('front/pie');
    }

    public function agregarProductoView(){
        $sizeModel = new Size_model();
        $listaProd['tamaño'] = $sizeModel->getSizes();

        $productoModel = new Productos_model();
        $listaProd['obj'] = $productoModel->orderBy('id_producto', 'DESC')->findAll();

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
            'imagen' => 'uploaded[imagen]|max_size[imagen,5120]|mime_in[imagen,image/jpg,image/jpeg,image/png]|ext_in[imagen,png,jpg,jpeg]|is_image[imagen]'
        ],);

        $sizeModel = new Size_model();
        $data['tamaño'] = $sizeModel->getSizes();

        $productoModel = new Productos_model();

        if (!$input) {
            session()->setFlashdata('danger', 'hay un error con alguno de los campos');
            $data['titulo']='Agregar Producto'; 
             echo view('front/header',$data);
             echo view('front/navbar');
             echo view('back/producto/nuevoProducto', ['validation' => $this->validator], $data);
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

    public function listadoProductosCliente(){
        $productoModel = new Productos_model();
        //$listaProd['productos'] = $productoModel->getTodosProductos();
        $listaProd['productos'] = $productoModel->getProductosCliente();

        $data = array('titulo' => 'Listado de Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/Productos', $listaProd) 
        . view('front/pie');
    }

    public function adminProductosBaja(){
        $productoModel = new Productos_model();
        $listaProd['productos'] = $productoModel->getProductosBaja();

        $data = array('titulo' => 'Administrar Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/administrarProductosBaja', $listaProd) 
        . view('front/pie');
    }

    public function editarProducto($id){
        $sizeModel = new Size_model();
        $producto['tamaño'] = $sizeModel->getSizes();

        $productoModel = new Productos_model();
        $producto['producto'] = $productoModel->getProducto($id);

        $data = array('titulo' => 'Editar Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/editarProducto', $producto) 
        . view('front/pie');
    }

    public function editarProductoForm(){
        $productoModel = new Productos_model();
        $id = $this->request->getVar('id_producto');
        $imagen = $this->request->getFile('imagen_nueva');
        //return print_r($imagen );
        //return print_r($imagen->getName());

        //al intentar obtener el nombre de la imagen retorna vacio con lo cual la funcion empty tendria que funcionar
        if (empty($imagen->getName())) {
            // Update the product without changing the image
            $productoData = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'descripcion'=> $this->request->getVar('descripcion'),
                'size'=> $this->request->getVar('size'),
                'precio_costo'=> $this->request->getVar('precio_costo'),
                'precio_venta'=> $this->request->getVar('precio_venta'),
                'stock_min'=> $this->request->getVar('stock_min'),
                'stock'=> $this->request->getVar('stock'),
            ];
        } else {
           
            // Process the uploaded image
            //$_FILES['imagen_nueva']
            $nombre_aleatorio = $imagen->getRandomName();
            $imagen->move(ROOTPATH.'assets/upload',$nombre_aleatorio);
    
            // Update the product with the new image
            $productoData = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'descripcion'=> $this->request->getVar('descripcion'),
                'size'=> $this->request->getVar('size'),
                'precio_costo'=> $this->request->getVar('precio_costo'),
                'precio_venta'=> $this->request->getVar('precio_venta'),
                'stock_min'=> $this->request->getVar('stock_min'),
                'stock'=> $this->request->getVar('stock'),
                'imagen' => $imagen->getName(),
            ];
        }
        $productoModel->update($id, $productoData);

        session()->setFlashdata('success', 'Producto editado con Exito');
        return $this->response->redirect(base_url('/adminProductos'));
    }
    
    public function bajaProducto($id){
        $productoModel = new Productos_model();
        $data = ['baja' => 'SI'];

        $productoModel->update($id, $data);

        return $this->response->redirect(base_url('/adminProductos'));
    }

    public function altaProducto($id){
        $productoModel = new Productos_model();
        $data = ['baja' => 'NO'];

        $productoModel->update($id, $data);

        return $this->response->redirect(base_url('/adminProductosBaja'));
    }

    public function verProducto($id){
        $productoModel = new Productos_model();

        $producto['producto'] = $productoModel->getProducto($id);

        $data = array('titulo' => 'Detalle Producto');

        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/detalleProducto', $producto) 
        . view('front/pie');
    }
}