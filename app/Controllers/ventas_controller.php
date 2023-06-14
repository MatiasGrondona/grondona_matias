<?php
namespace App\Controllers;
use App\Models\usuarios_model;
use CodeIgniter\Controller;

class Ventas_controller extends Controller {

    public function __construct() {
        helper(['form', 'url', 'html']);
    }

    public function nuevaVenta(){
        $ventas = new Ventas_cabecera_model();

        $nueva_venta = ['id_usuario' => $session->get('id_usuario'), 'total_venta' => $total];
        $venta_id = $ventas->insert($nueva_venta);
    }

    public function ver_facturas($venta_id){
        $detalle_venta = new Ventas_detalle_model();
        $data['titulo'] = "Detalle Compra";
        $infoVenta['ventas'] = $detalle_venta->getDetalle($venta_id);

        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/compras/vista_compras', $infoVenta) 
        . view('front/pie');
    }
}