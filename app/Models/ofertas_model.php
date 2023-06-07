<?php
namespace App\Models;
use CodeIgniter\Model;

class Ofertas_model extends Model {
    protected $table = 'ofertas';
    protected $primaryKey = 'id_oferta';
    protected $allowedFields = ['id_producto', 'descuento', 'precio_oferta', 'baja_oferta'];

    public function getBuilderOfertas(){
        // connect() es un metod que te permite conectar a la base de datos
        $db = \Config\Database::connect();
        // $builder es una instancia de la clase QueryBuilder de CodeIgniter
        $builder = $db->table('ofertas');
        //Hace una consulta a la base de datos
        $builder->select('*');
        // hace el join de la tabla productos
        $builder->join('productos', 'ofertas.id_producto = productos.id_producto');
        //retorna el builder
        return $builder;
    }

    public function getOfertasActivas(){
        $builder = $this->getBuilderOfertas();
        return $builder->where(['baja_oferta' => 'NO'])->get()->getResult();
    }
}

