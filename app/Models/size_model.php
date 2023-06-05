<?php
namespace App\Models;
use CodeIgniter\Model;

class Size_model extends Model{
    protected $table ='size';
    protected $primaryKey = 'id_tamaño';
    protected $allowedFields = ['size'];

    public function getSizes(){
        return $this->findAll();
    }
}