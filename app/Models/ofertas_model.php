<?php
namespace App\Models;
use CodeIgniter\Model;

class Ofertas_model extends Model {
    protected $table = 'ofertas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_producto', 'descuento', 'precio_oferta', 'baja'];
}