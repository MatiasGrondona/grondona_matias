<?php
namespace App\Models;
use CodeIgniter\Model;

class Ventas_cabecera_model extends Model {
    protected $table ='ventas_cabecera';
    protected $primaryKey ='id';
    protected $allowedFields = ['fecha', 'usuario_id', 'total_venta'];

    public function getBuilderVentas(){
        // connect() es un metod que te permite conectar a la base de datos
        $db = \Config\Database::connect();
        // $builder es una instancia de la clase QueryBuilder de CodeIgniter
        $builder = $db->table('ventas_cabecera');
        //Hace una consulta a la base de datos
        $builder->select('*');
        // hace el join de la tabla usuarios
        $builder->join('usuarios', 'ventas_cabecera.usuario_id = usuarios.id_usuario');
        //retorna el builder
        return $builder;
    }

    public function getVentas(){
        $builder = $this->getBuilderVentas();
        return $builder->get()->getResult();
    }

    public function getComprasCliente($id_cliente){
        $builder = $this->getBuilderVentas();
        return $builder->where('usuario_id', $id_cliente)->get()->getResult();
    }
}