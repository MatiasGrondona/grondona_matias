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

    public function getTodosProductos(){
        $builder = $this->getBuilderProductos();
        return $builder->where(['baja' => 'NO'])->get()->getResult();
    }

    public function getProductosBaja(){
        $builder = $this->getBuilderProductos();
        return $builder->where(['baja' => 'SI'])->get()->getResult();
    }

    public function getProductosOferta(){
        $builder = $this->getBuilderProductos();
        $builder-join('ofertas', 'ofertas.id_producto = productos.id_producto');
        return $builder->where(['baja' => 'NO'])->get()->getResult();
    }

    public function getProducto($id = null){
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id_producto', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function getStock($id = null){
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id_producto', $id);
        //$builder->select('stock');
        $query = $builder->get();
        //$query = $builder->get();
        return $query->getRowArray();
    }

    public function updateStock($id = null, $stock_actual = null){
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id_producto', $id);
        $builder->set('productos.stock', $stock_actual);
        $builder->update();
    }
}
