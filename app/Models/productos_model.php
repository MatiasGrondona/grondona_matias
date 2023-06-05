<?php
namespace App\Models;
use CodeIgniter\Model;

class Productos_model extends Model {
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['nombre_prod', 'descripcion', 'size', 'precio_costo', 'precio_venta', 'stock_min', 'stock', 'imagen', 'tiene_oferta', 'baja'];
    
    public function getBuilderProductos(){
        // connect() es un metod que te permite conectar a la base de datos
        $db = \Config\Database::connect();
        // $builder es una instancia de la clase QueryBuilder de CodeIgniter
        $builder = $db->table('productos');
        //Hace una consulta a la base de datos
        $builder->select('*');
        // hace el join de la tabla productos
        $builder->join('size', 'productos.size = size.id_tamaño');
        //retorna el builder
        return $builder;
    }

    public function getTodosProdutos(){
        $builder = $this->getBuilderProductos();
        $builder->where('productos.baja', 'NO');
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function getProduto($id = null){
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateStock($id = null, $stock_actual = null){
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id', $id);
        $builder->set('productos.stock', $stock_actual);
        $builder->update();
    }
}
