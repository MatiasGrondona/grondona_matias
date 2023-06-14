<?php
namespace App\Controllers;
use App\Models\usuarios_model;
use App\Models\ventas_cabecera_model;
use App\Models\ventas_detalle_model;
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

    public function ver_ventas_admin(){
        $ventas = new Ventas_cabecera_model();
        $lista_ventas['ventas'] = $ventas->getVentas();

        $data['titulo'] = "Todas las ventas";

        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/ventas/ventas_admin', $lista_ventas) 
        . view('front/pie');
    }

    public function ver_detalle_venta_admin($id_compra){
        $detalle_venta = new Ventas_detalle_model();
        $lista_ventas['venta'] = $detalle_venta->getDetalle($id_compra);

        $data['titulo'] = "Detalle de la venta";

        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/ventas/detalle_venta_admin', $lista_ventas) 
        . view('front/pie');
    }

    public function ver_compras_cliente($id_cliente){
        $compras_cliente = new Ventas_cabecera_model();
        $lista_compras['compras'] = $compras_cliente->getComprasCliente($id_cliente);

        $data['titulo'] = "Todas las compras realizadas";

        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/ventas/ventas_usuario', $lista_compras)  
        . view('front/pie');
    }

    public function ver_detalle_compra_cliente($id_compra){
        $detalle_compra = new Ventas_detalle_model();
        $detalle['compra'] = $detalle_compra->getDetalle($id_compra);

        $data['titulo'] = "Detalle de la Compra";

        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/ventas/detalle_venta_usuario', $detalle) 
        . view('front/pie');
    }
}