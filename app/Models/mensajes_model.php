<?php
namespace App\Models;
use CodeIgniter\Model;

class Mensajes_model extends Model {
    protected $table = 'mensajes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'mensaje', 'leído'];

    public function getBuilderMensajes(){
        // connect() es un metod que te permite conectar a la base de datos
        $db = \Config\Database::connect();
        // $builder es una instancia de la clase QueryBuilder de CodeIgniter
        $builder = $db->table('mensajes');
        //Hace una consulta a la base de datos
        $builder->select('*');
        return $builder;
    }

    public function getMensaje($id = null) {
        $builder = $this->getBuilderMensajes();
        $builder->where('mensajes.id', $id);
        $query = $builder->get();
        return $query->getRowArray();
        
    }
}