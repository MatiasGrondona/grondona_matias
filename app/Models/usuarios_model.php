<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model {
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre', 'apellido', 'email', 'usuario', 'pass', 'perfil_id', 'baja'];
    /*protected $allowedFields = ['nombre', 'apellido', 'email', 'usuario', 'pass', 'perfil_id', 'baja', 'created_at']; */

    public function getBuilderUsuarios(){
        // connect() es un metod que te permite conectar a la base de datos
        $db = \Config\Database::connect();
        // $builder es una instancia de la clase QueryBuilder de CodeIgniter
        $builder = $db->table('usuarios');
        //Hace una consulta a la base de datos
        $builder->select('*');
        //retorna el builder
        return $builder;
    }

    public function getUsuario($id = null){
        $builder = $this->getBuilderUsuarios();
        $builder->where('usuarios.id_usuario', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }
}
