<?php
namespace App\Controllers;
use App\Models\usuarios_model;
use App\Models\productos_model;
use App\Models\ofertas_model;
use App\Models\size_model;
use CodeIgniter\Controller;

class Ofertas_controller extends Controller {

    public function __construct() {
        helper(['form', 'url', 'html']);
    }

    public function ofertasAdmin(){
        $ofertaModel = new Ofertas_model();
        $listaProd['ofertas'] = $ofertaModel->getOfertasActivas();

        $data = array('titulo' => 'Ofertas Activas');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/ofertasAdmin', $listaProd) 
        . view('front/pie');
    }

    public function ofertasAdminBaja(){
        $ofertaModel = new Ofertas_model();
        $listaProd['ofertas'] = $ofertaModel->getOfertasBaja();

        $data = array('titulo' => 'Ofertas de Baja');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/ofertasAdminBaja', $listaProd) 
        . view('front/pie');
    }

    public function nueva_oferta_view($id_producto){
        $productoModel = new productos_model();
        $producto['producto'] = $productoModel->getProducto($id_producto);

        $data = array('titulo' => 'Nueva Oferta');

        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/ofertas/nueva_oferta', $producto)  
        . view('front/pie');
    }

    public function nueva_oferta_save(){
        $input = $this->validate([
            'id_producto'   => 'required',
            'descuento' => 'required|min_length[1]|max_length[2]',
            'precio_oferta'    => 'required|min_length[1]|max_length[10.2]'
        ],);

        $formModel = new Ofertas_model();
        $id_producto = (['id_producto' => $this->request->getVar('id_producto')]);
     
        if (!$input) {
            session()->setFlashdata('danger', 'hay un error con alguno de los campos');
            $productoModel = new productos_model();
            $producto['producto'] = $productoModel->getProducto($id_producto);
            $data['titulo']='Nueva Oferta'; 
            echo view('front/header',$data);
            echo view('front/navbar');
            echo view('back/ofertas/nueva_oferta',$producto, ['validation' => $this->validator]);
            echo view('front/pie');
        } else {
            $formModel->save([
                'id_producto' => $this->request->getVar('id_producto'),
                'descuento'=> $this->request->getVar('descuento'),
                'precio_oferta'=> $this->request->getVar('precio_oferta'),
            ]);
            $productoModel = new Productos_model();
            $tiene_oferta = ['tiene_oferta' => 'SI'];

            $productoModel->update($id, $tiene_oferta);
            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
            session()->setFlashdata('success', 'Oferta Agregada con exito');
            return $this->response->redirect(base_url('/ofertasAdmin'));
        }
    }

    public function dar_baja_oferta($id_oferta){
        $ofertaModel = new Ofertas_model();
        $data = ['baja_oferta' => 'SI'];

        $ofertaModel->update($id_oferta, $data);

        //consigo el id del id_producto de la oferta que estoy editando y le cambio el campo tiene_oferta a 'SI'
        $productoModel = new Productos_model();
        $oferta_producto = ['tiene_oferta' => 'NO'];
        $ofertaModel->Where(['id_oferta' => $id_oferta]);
        $producto = $ofertaModel->get()->getRowArray();
        $id_prod = $producto['id_producto'];
        $productoModel->update($id_prod, $oferta_producto);

        return $this->response->redirect(base_url('/ofertasAdmin'));
    }

    public function dar_alta_oferta($id_oferta){
        $ofertaModel = new Ofertas_model();
        $data = ['baja_oferta' => 'NO'];

        $ofertaModel->update($id_oferta, $data);

        //consigo el id del id_producto de la oferta que estoy editando y le cambio el campo tiene_oferta a 'SI'
        $productoModel = new Productos_model();
        $oferta_producto = ['tiene_oferta' => 'SI'];
        $ofertaModel->Where(['id_oferta' => $id_oferta]);
        $producto = $ofertaModel->get()->getRowArray();
        $id_prod = $producto['id_producto'];
        $productoModel->update($id_prod, $oferta_producto);

        return $this->response->redirect(base_url('/ofertasAdminBaja'));
    }
}