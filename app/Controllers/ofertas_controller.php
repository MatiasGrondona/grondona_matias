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

        $data = array('titulo' => 'Administrar Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/ofertasAdmin', $listaProd) 
        . view('front/pie');
    }

    public function ofertasAdminBaja(){
        $ofertaModel = new Ofertas_model();
        $listaProd['ofertas'] = $ofertaModel->getOfertasBaja();

        $data = array('titulo' => 'Administrar Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/producto/ofertasAdminBaja', $listaProd) 
        . view('front/pie');
    }

    public function nueva_oferta_view(){

    }

    public function nueva_oferta_save(){

    }

    public function dar_baja_oferta($id_oferta){
        $ofertaModel = new Ofertas_model();
        $data = ['baja_oferta' => 'SI'];

        $ofertaModel->update($id_oferta, $data);

        return $this->response->redirect(base_url('/ofertasAdmin'));
    }

    public function dar_alta_oferta($id_oferta){
        $ofertaModel = new Ofertas_model();
        $data = ['baja_oferta' => 'NO'];

        $ofertaModel->update($id_oferta, $data);

        return $this->response->redirect(base_url('/ofertasAdminBaja'));
    }
}