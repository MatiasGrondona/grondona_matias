<?php
namespace App\Models;
use CodeIgniter\Model;

class Productos_model extends Model {
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_prod', 'descripcion', 'size','precio_costo', 'precio_venta', 'stock_min', 'stock', 'imagen', 'tiene_oferta', 'baja'];
}
